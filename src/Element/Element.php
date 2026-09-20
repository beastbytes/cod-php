<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Element;

use BeastBytes\CodPhp\Util\Link;
use PhpDocumentor\Reflection\DocBlock;
use phpDocumentor\Reflection\DocBlock\Tag;
use phpDocumentor\Reflection\DocBlock\Tags\Link as LinkTag;
use phpDocumentor\Reflection\DocBlock\Tags\See as SeeTag;
use phpDocumentor\Reflection\DocBlockFactory;
use phpDocumentor\Reflection\Types\ContextFactory;
use ReflectionClass;
use Reflector;

use function array_filter;
use function is_string;

/**
 * Base class for all structural elements.
 *
 * Provides properties and methods common to all structural elements.
 *
 * @psalm-suppress PropertyNotSetInConstructor
 */
abstract class Element
{
    /** @var ContextFactory|null $contextFactory Context Factory. */
    private static ?ContextFactory $contextFactory = null;

    /**
     * Element copyright or null if the element does not have a `@copyright` tag.
     *
     * @var ?string $copyright
     * @see Element::hasTag()
     */
    public ?string $copyright {
        get => $this->hasDocBlock && $this->hasTag('copyright')
            ? (string) $this->getTag('copyright')
            : null
        ;
    }

    /**
     * Element deprecation notice or `null` if the element does not have a `@deprecated` tag.
     *
     * @var ?string $deprecationNotice
     * @see Element::hasTag()
     */
    public ?string $deprecationNotice {
        get => $this->hasDocBlock && $this->docBlock->hasTag('deprecated')
            ? (string) $this->getTag('deprecated')
            : null
        ;
    }

    /**
     * @var ?string $description Element description or `null` if the element does not have a description.
     * @see Element::$hasDescription
     */
    public ?string $description {
        get {
            if ($this->hasDocBlock) {
                $description = (string) $this->docBlock->getDescription();

                if ($description !== '') {
                    return $description;
                }
            }

            return null;
        }
    }

    /** @var string $elementType Type of element. */
    public string $elementType {
        get => substr(new ReflectionClass($this)->getShortName(), 0, -7);
    }

    /**
     * @var bool $hasDescription `true` if the element has a description, `false` if not.
     * @see Element::$description
     */
    public bool $hasDescription {
        get => $this->hasDocBlock && !empty($this->description);
    }

    /**
     * @var bool $hasDocBlock `true` if the element has a docBlock, `false` if not.
     * @see Element::$docBlock
     */
    public bool $hasDocBlock {
        get => $this->docBlock !== null;
    }

    /**
     * @var bool $hasSummary `true` if the element has a summary, `false` if not.
     * @see Element::$summary
     */
    public bool $hasSummary {
        get => !empty($this->summary);
    }

    /** @var bool $isInApi `true` if the element is in the API, `false` if not. */
    public bool $isInApi {
        get => !$this->hasDocBlock
            || $this->hasTag('api')
            || (!$this->hasTag('ignore') && !$this->hasTag('internal'))
        ;
    }

    /**
     * @var Link[] $linkTags `@link` tags normalised to `Link` objects.
     * @see Link
     */
    public array $linkTags {
        get {
            /** @var LinkTag[] $tags */
            $tags = $this->hasDocBlock ? $this->docBlock->getTagsByName('link') : [];

            foreach ($tags as &$tag) {
                $tag = new Link($tag, $this);
            }

            return $tags;
        }
    }

    /** @var string $name Name of the element. */
    public string $name {
        get => $this->reflector->getName();
    }

    /** @var ?string $namespace Namespace of the element. */
    public ?string $namespace {
        get => method_exists($this->reflector, 'getNamespaceName') ? $this->reflector->getNamespaceName() : null;
    }

    /** @var string $rootNamespace Root namespace being documented. */
    public string $rootNamespace;

    /**
     * @var Link[] $seeTags `@see` tags normalised to `Link` objects.
     * @see Link
     */
    public array $seeTags {
        get {
            /** @var SeeTag[] $tags */
            $tags = $this->hasDocBlock ? $this->docBlock->getTagsByName('see') : [];

            foreach ($tags as &$tag) {
                $tag = new Link($tag, $this);
            }

            return $tags;
        }
    }

    /**
     * @var ?string $since Content of the element's `@since` tag, or `null` if the element does not have a `@since` tag.
     * @see hasTag()
     */
    public ?string $since {
        get => $this->hasDocBlock && $this->hasTag('since')
            ? (string) $this->getTag('since')
            : null
        ;
    }

    /**
     * @var ?string $summary Element summary or `null` if the element does not have a summary.
     * @see Element::$hasDobBlock
     */
    public ?string $summary {
        get {
            if ($this->hasDocBlock) {
                $summary = $this->docBlock->getSummary();

                if ($summary !== '') {
                    return $summary;
                }
            }

            return null;
        }
    }

    /**
     * @var ?string $version Content of the element's `@version` tag, or `null` if the element does not have a `@version` tag.
     * @see hasTag()
     */
    public ?string $version {
        get => $this->hasDocBlock && $this->hasTag('version')
            ? (string) $this->getTag('version')
            : null
        ;
    }

    /** @var ?DocBlock The element docblock. */
    protected ?DocBlock $docBlock = null;

    /** @var ?DocBlockFactory $docBlockFactory DocBlock factory. */
    private static ?DocBlockFactory $docBlockFactory = null;

    /** @var ObjectElement[] $elements Object elements in namespace. */
    private static array $elements;

    /**
     * Sets the elements.
     *
     * @param ObjectElement[] $elements Object elements.
     * @return void
     * @internal
     */
    public static function setElements(array $elements): void
    {
        self::$elements = $elements;
    }

    /**
     * Create an element.
     *
     * @param Reflector $reflector Element reflector object.
     * @internal
     */
    public function __construct(protected Reflector $reflector)
    {
        if (self::$docBlockFactory === null) {
            self::$contextFactory = new ContextFactory();
            self::$docBlockFactory = DocBlockFactory::createInstance();
        }

        if (!$this instanceof ParameterElement) { // Parameters do not have docBlocks
            /** @var false|string $docComment */
            $docComment = $this->reflector->getDocComment();

            if (is_string($docComment)) {
                $this->docBlock = self::$docBlockFactory->create(
                    $docComment,
                    self::$contextFactory->createFromReflector($reflector)
                );
            }
        }
    }

    /**
     * Returns a value indicating whether the element has the specified tag.
     *
     * @param string $tag Name of the tag.
     * @return bool `true` if the element has the specified taf, `false` if not.
     */
    public function hasTag(string $tag): bool
    {
        return $this->hasDocBlock && $this->docBlock->hasTag($tag);
    }

    /**
     * Returns object elements, optionally filtered by element type.
     *
     * @param ?string $type Type (FQCN) of element to return; `null` returns all elements.
     * @return ObjectElement[] Object elements.
     */
    public function getElements(?string $type = null): array
    {
        if (is_string($type)) {
            return array_filter(self::$elements, fn (ObjectElement $element) => $element instanceof $type);
        }

        return self::$elements;
    }

    private function getTag(string $name): Tag
    {
        return $this->getTags($name)[0];
    }

    private function getTags(string $name): array
    {
        return $this->docBlock->getTagsByName($name);
    }
}