<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Writer\Markdown;

use BeastBytes\CodPhp\Element\ClassElement;
use BeastBytes\CodPhp\Element\Element;
use BeastBytes\CodPhp\Element\MethodElement;
use BeastBytes\CodPhp\Element\ObjectElement;
use BeastBytes\CodPhp\Element\ParameterElement;
use BeastBytes\CodPhp\Element\Visibility;
use BeastBytes\CodPhp\Error\Error;
use BeastBytes\CodPhp\Error\ErrorLevel;
use BeastBytes\CodPhp\Type\Language;
use BeastBytes\CodPhp\Type\PhpType;
use BeastBytes\CodPhp\Util\Link;
use phpDocumentor\Reflection\DocBlock\Description;
use phpDocumentor\Reflection\Type;
use ReflectionClass;
use ReflectionEnum;
use ReflectionException;
use ReflectionIntersectionType;
use ReflectionNamedType;
use ReflectionType;
use ReflectionUnionType;
use RuntimeException;
use Yiisoft\Files\FileHelper;
use Yiisoft\Files\PathMatcher\PathMatcher;

use function explode;
use function implode;
use function is_string;
use function mb_strtolower;
use function pathinfo;
use function preg_replace;
use function sprintf;
use function str_replace;
use function str_starts_with;
use function strlen;
use function ucfirst;

/** Static helper functions for the writer. */
final class Helpers
{
    public const string SYMBOL_INTERSECTION = '&';
    public const string SYMBOL_REFERENCE = '&';
    public const string SYMBOL_UNION = '|';
    public const string SYMBOL_VARIADIC = '...';

    private const string A = '<a %s>%s</a>';
    private const string CONTAINER = '::: %s %s' . PHP_EOL . '%s' . PHP_EOL . ':::' . PHP_EOL . PHP_EOL;
    private const string DEFAULT_VALUE = ' = %s';
    private const string EXTENSIONS_NAMESPACE = 'BeastBytes\\CodPhp\\Type\\Extensions\\';
    private const string FRAGMENT = '#%s';
    private const string LANGUAGE = '{lang}';
    private const string MD_DOC = '%s.md';
    private const string MD_LINK = '[%s](%s)';
    private const string MODIFIER = '<span class="cod-php-modifier">%s</span>';
    private const string SOURCE_URL = '%s%s.php';
    private const string TD_LIST = PHP_EOL. PHP_EOL . '%s' . PHP_EOL . PHP_EOL;
    private const string TYPE = '<span class="cod-php-type">%s</span> $%s%s%s%s';
    private const string VISIBILITY = '<span class="cod-php-visibility">%s</span>';

    /** @var array $extensions Extension Enums for typing */
    private static array $extensions = [];

    /**
     * Generates an HTML `<a/>` tag.
     *
     * @param string $content Link content
     * @param string $href Link URL
     * @param array $attributes HTML attributes
     * @return string
     */
    public static function a(string $content, string $href, array $attributes = []): string
    {
        $attributes['href'] = $href;

        $attrs = [];
        foreach ($attributes as $name => $value) {
            $attrs[] = sprintf(' %s="%s"', $name, $value);
        }

        return sprintf(self::A, implode(' ', $attrs), $content);
    }

    /**
     * Generate a formatted deprecation message.
     *
     * @param Element $element Current element.
     * @return string Deprecation message.
     */
    public static function deprecationNotice(Element $element): string
    {
        return sprintf(
            self::CONTAINER,
            'tip',
            'NOTICE',
            ucfirst((string) $element->deprecationNotice)
        );
    }

    /**
     * Generate a formatted error message.
     *
     * No message is created if the error level is below `$minErrorLevel`.
     *
     * @param Error $error Error.
     * @param ErrorLevel $minErrorLevel Minimum error level.
     * @return string Error message.
     */
    public static function error(Error $error, ErrorLevel $minErrorLevel): string
    {
        if ($error->level->value >= $minErrorLevel->value) {
            return sprintf(
                self::CONTAINER,
                match ($error->level) {
                    ErrorLevel::Error => 'danger',
                    ErrorLevel::Warning => 'warning',
                    ErrorLevel::Notice => 'tip',
                    ErrorLevel::None => '',
                },
                match ($error->level) {
                    ErrorLevel::Error => 'ERROR',
                    ErrorLevel::Warning => 'WARNING',
                    ErrorLevel::Notice => 'NOTICE',
                    ErrorLevel::None => '',
                },
                $error->message
            );
        }

        return '';
    }

    /**
     * Generates a Markdown link between two elements or a FQCN to an element.
     *
     * @param ObjectElement|string $from Start element or FQCN
     * @param ObjectElement $to Destination element
     * @return string Markdown link
     */
    public static function linkElements(ObjectElement|string $from, ObjectElement $to): string
    {
        if ($from instanceof ObjectElement) {
            $path = $from->pathTo($to);
        } else {
            $path = str_replace('\\', '/', substr($to->fqcn, strlen($from) + 1));
        }

        return is_string($path)
            ? sprintf(self::MD_LINK, $to->fqcn, self::toKebabCase($path))
            : $to->fqcn
        ;
    }

    /**
     * Generates a list of links.
     *
     * @param Link[] $links Links to list
     * @return string List of links
     */
    public static function linkList(array $links, Element $element): string
    {
        $list = [];

        foreach ($links as $link) {
            $content = $link->content;

            if ($link->isToExternal) {
                $href = $path = $link->uri;
            } elseif ($link->isToDoc) { // Non-API documentation
                $href = $path = sprintf(self::MD_DOC, substr($link->uri, 6));
            } else { // link to API element
                $uri = $link->uri;
                $uri = explode('::', $uri);
                $path = ($uri[0] !== $element->elementType ? self::toKebabCase($uri[0]) : '');

                if ($link->isToConstant) {
                    $fragment = self::toKebabCase($uri[1]);
                } elseif ($link->isToMethod) {
                    $content .= '()';
                    $fragment = strtolower(substr($uri[1], 0, -2));
                } elseif ($link->isToProperty) {
                    $content = '$' . $content;
                    $fragment = strtolower(substr($uri[1], 1));
                } else {
                    $fragment = null;
                }

                $href = $path . (is_string($fragment) ? sprintf(self::FRAGMENT, $fragment) : '');
            }

            $list[] = '* ' . self::a($content, $href, !empty($path) ? ['target' => '_blank'] : [])
                . ($link->description instanceof Description ? ' - ' . $link->description : '')
            ;
        }

        return implode(PHP_EOL, $list) . PHP_EOL;
    }

    /**
     * Returns formatted visibility and object modifiers.
     *
     * @param ClassElement|MethodElement $element
     * @param bool $capitalise
     * @return string Formatted modifiers
     */
    public static function modifiers(ClassElement|MethodElement $element, bool $capitalise = false): string
    {
        $modifiers = $element->modifiers;
        $ytilibisiv = new ReflectionEnum(Visibility::class);

        foreach ($modifiers as &$modifier) {
            if ($ytilibisiv->hasCase($modifier)) {
                $modifier = sprintf(self::VISIBILITY, $capitalise ? ucfirst($modifier) : $modifier);
            } else {
                $modifier = sprintf(self::MODIFIER, $capitalise ? ucfirst($modifier) : $modifier);
            }
        }

        return implode(' ', $modifiers) . ($modifiers ? ' ' : '');
    }

    /**
     * Returns the parameters for a method declaration.
     *
     * @param MethodElement $method The method.
     * @param ObjectElement $element Method parent element.
     * @param Language $language PHP Manual language.
     * @return string Method declaration parameters
     * @throws ReflectionException
     */
    public static function parameters(MethodElement $method, ObjectElement $element, Language $language): string
    {
        $parameters = [];

        /** @var ParameterElement $parameter */
        foreach ($method->parameters as $parameter) {
            $parameters[] = sprintf(
                self::TYPE,
                Helpers::type($parameter->type, $element, $language),
                $parameter->isPassedByReference ? self::SYMBOL_REFERENCE : '',
                $parameter->isVariadic ? self::SYMBOL_VARIADIC : '',
                $parameter->name,
                $parameter->hasDefaultValue ? sprintf(self::DEFAULT_VALUE, $parameter->defaultValue) : ''
            );
        }

        return implode(', ', $parameters);
    }

    /**
     * Sanitise a string for HTML, and optionally in a Markdown table.
     *
     * This function also resolves inline `@link` tags.
     *
     * @param string $string The string to sanitise.
     * @param bool $mdt Whether to additionally sanitise for use in a Markdown table
     * @return string Sanitised string
     */
    public static function sanitise(string $string, bool $mdt = false): string
    {
        $string = nl2br(htmlspecialchars($string));

        if ($mdt) {
            $string = str_replace('|', '\\|', $string);
        }

        return self::resolveInlineLink($string);
    }

    /**
     * Generate a link to object element source code;
     *
     * @param string $baseUrl Source code base URL
     * @param ObjectElement $element Element to link to source
     * @return string
     */
    public static function sourceLink(string $baseUrl, ObjectElement $element): string
    {
        return self::a(
            'Source Code',
            sprintf(
                self::SOURCE_URL,
                trim($baseUrl, '/'),
                str_replace('\\', '/', substr($element->fqcn, strlen($element->rootNamespace)))
            )
        );
    }

    /**
     * Generate a list for inclusion in a `<td/>` with items linked from the current element.
     *
     * @param ObjectElement $element Current element.
     * @param string $property Property to list.
     * @param ?Language $language PHP Manual language.
     * @return string List of items.
     */
    public static function tdList(ObjectElement $element, string $property, ?Language $language = null): string
    {
        $list = [];

        /** @var ObjectElement $item */
        foreach ($element->$property as $item) {
            $pathTo = $element->pathTo($item);

            if (is_string($pathTo)) {
                $list[] = sprintf(
                    self::MD_LINK,
                    $item->fqcn,
                    sprintf(self::MD_DOC, self::toKebabCase($pathTo))
                );
            } else {
                if ($language === null) {
                    throw new RuntimeException('`$language` must be set for PHP built-in types, classes and interfaces');
                }

                $href = self::phpType($item->fqcn, $language);

                if (is_string($href)) {
                    if (str_starts_with($href, 'http')) {
                        $list[] = sprintf(self::MD_LINK, $item->fqcn, $href);
                    } else {
                        $list[] = $item->fqcn;
                    }
                } else {
                    $list[] = $item->fqcn;
                }
            }
        }

        return sprintf(self::TD_LIST, implode('<br>', $list));
    }

    /**
     * Converts a `camelCased` or `PascalCased` string to a `kebab-cased` string, e.g. `CodPhp` becomes `cod-php`.
     *
     * @param string $string `camelCased` or `PascalCased` string.
     * @return string `kebab-cased` string.
     */
    public static function toKebabCase(string $string): string
    {
        $string = preg_replace('/(?<=\p{L})(\p{Lu})/u', '-\1', $string);

        if ($string === null) {
            throw new RuntimeException('`preg_replace` error');
        }

        return mb_strtolower($string);
    }

    /**
     * Converts a string to space-separated words, e.g. `CodPhp` becomes `Cod Php`.
     *
     * @param string $string String to convert.
     * @return string Converted string.
     */
    public static function toWords(string $string): string
    {
        $string = preg_replace('/(?<!\p{Lu})(\p{Lu})|(\p{Lu})(?=\p{Ll})/u', ' \0', $string);

        if ($string === null) {
            throw new RuntimeException('`preg_replace` error');
        }

        return $string;
    }

    /**
     * Returns a string representation of a ReflectionType with a link to the type documentation.
     *
     * Only PHP (including extensions) and intra-package types are linked; external packages are not.
     *
     * @param Type|ReflectionType $type ReflectionType to get a string representation of.
     * @param ObjectElement $element Element containing the type.
     * @param Language $language PHP Manual language.
     * @return string String representation of the ReflectionType.
     * @throws ReflectionException
     */
    public static function type(Type|ReflectionType $type, ObjectElement $element, Language $language): string
    {
        $types = [];

        if ($type instanceof Type) {
            $separator = '';
            $types[] = (string) $type;
        } else {
            if ($type instanceof ReflectionIntersectionType || $type instanceof ReflectionUnionType) {
                $separator = $type instanceof ReflectionIntersectionType
                    ? self::SYMBOL_INTERSECTION
                    : self::SYMBOL_UNION
                ;

                foreach ($type->getTypes() as $type) {
                    $types[] = $type->getName();
                }
            } elseif ($type instanceof ReflectionNamedType) {
                $separator = '';
                $types[] = $type->getName();
            } else {
                $separator = '';
                $types[] = '';
            }

            if ($type->allowsNull()) {
                $separator = self::SYMBOL_UNION;
                $types[] = 'null';
            }
        }

        foreach ($types as &$type) {
            $type = trim($type, '\\');

            $phpType = self::phpType($type, $language);

            if (is_string($phpType)) {
                if (str_starts_with($phpType, 'http')) {
                    $type = self::a($type, str_replace(self::LANGUAGE, $language->value, $phpType));
                } else {
                    $type = $phpType;
                }
            } else {
                $path = $element->pathTo(new ClassElement(new ReflectionClass($type)));
                $type = is_string($path) ? self::a($type, sprintf(self::MD_DOC, $path)) : $type;
            }
        }

        return implode($separator, $types);
    }

    private static function extensions(): array
    {
        if (empty(self::$extensions)) {
            foreach (FileHelper::findFiles(__DIR__ . '/../../Type/Extensions', [
                'filter' => new PathMatcher()
                    ->only('**.php'),
                'recursive' => true,
            ]) as $file) {
                self::$extensions[] = new ReflectionEnum(
                    self::EXTENSIONS_NAMESPACE . pathinfo($file, PATHINFO_FILENAME)
                );
            }
        }

        return self::$extensions;
    }

    /**
     * @throws ReflectionException
     */
    private static function phpExtension(string $type): ?string
    {
        foreach (self::extensions() as $extension) {
            if ($extension->hasCase($type)) {
                return $extension->getCase($type)->getBackingValue();
            }
        }

        return null;
    }

    /**
     * Returns the backing value `$type` is a PHP type - including classes and interfaces and this in extensions, or `null` if not.
     *
     * The return string is typically a URL to the `$type` PHP documentation; exceptions being if `$type` is `self` or `static`
     */
    private static function phpType(string $type, Language $language): ?string
    {
        $epytPhp = new ReflectionEnum(PhpType::class);

        if ($epytPhp->hasCase($type)) {
            $uri = $epytPhp->getCase($type)->getBackingValue();
        } else {
            $uri = self::phpExtension($type);
        }

        if (is_string($uri) && str_starts_with($uri, 'http')) {
            return str_replace(self::LANGUAGE, $language->value, $uri);
        }

        return $uri;
    }

    private static function resolveInlineLink(string $string): string
    {
        $regex = '|\{@link\s+(?<uri>[^\s}]+)\s*(?<text>.*?)}|';

        $matches = [];
        preg_match_all($regex, $string, $matches, PREG_SET_ORDER, 0);

        $links = [];
        foreach ($matches as $match) {
            $links[] = sprintf(
                '<a href="%s" target="_blank">%s</a>',
                $match['uri'],
                (bool) $match['text'] ? $match['text'] : $match['uri']
            );
        }

        foreach ($links as $link) {
            $string = preg_replace(['|\{.*?}|'], $link, $string, 1);
        }

        return $string;
    }
}