<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Util;

use BeastBytes\CodPhp\Element\ClassConstantElement;
use BeastBytes\CodPhp\Element\Element;
use BeastBytes\CodPhp\Element\MethodElement;
use BeastBytes\CodPhp\Element\ObjectElement;
use BeastBytes\CodPhp\Element\PropertyElement;
use phpDocumentor\Reflection\DocBlock\Description;
use phpDocumentor\Reflection\DocBlock\Tags\Link as LinkTag;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Fqsen;
use phpDocumentor\Reflection\DocBlock\Tags\See as SeeTag;
use ReflectionClass;
use ReflectionException;
use RuntimeException;

use function array_pop;
use function count;
use function explode;
use function str_contains;
use function str_ends_with;
use function str_repeat;
use function str_starts_with;
use function substr;

/**
 * Immutable data object that normalises phpDocumentor Link and See tags.
 *
 * @link https://docs.phpdoc.org/guide/references/phpdoc/tags/link.html#link Link tag
 * @link https://docs.phpdoc.org/guide/references/phpdoc/tags/see.html#see See tag
 *
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class Link
{
    /** @var string $content Content of the link */
    public string $content {
        get => $this->content;
    }

    public ?Description $description {
        get => $this->description;
    }

    /** @var Element $element Element the link is from.
     */
    public Element $element {
        get => $this->element;
    }

    /** @var bool $isToDoc `true` if the link is to hand-written documentation, `false` if not. */
    public bool $isToDoc {
        get => str_starts_with($this->uri, 'doc://');
    }

    /** @var bool $isToExternal `true` if the link is to an external URI, `false` if not. */
    public bool $isToExternal {
        get => str_starts_with($this->uri, 'http://') || str_starts_with($this->uri, 'https://');
    }

    /** @var bool $isToConstant `true` if the link is to a constant element, `false` if not. */
    public bool $isToConstant {
        get => str_contains($this->uri, '::') && !$this->isToMethod && !$this->isToProperty;
    }

    /** @var bool $isToMethod `true` if the link is to a method element, `false` if not. */
    public bool $isToMethod {
        get {
            if (str_contains($this->uri, '::')) {
                $uri = explode('::', $this->uri);
                $end = array_pop($uri);
                return str_ends_with($end, '()');
            }

            return false;
        }
    }

    /** @var bool $isToProperty `true` if the link is to a property element, `false` if not. */
    public bool $isToProperty {
        get {
            if (str_contains($this->uri, '::')) {
                $uri = explode('::', $this->uri);
                $end = array_pop($uri);
                return str_starts_with($end, '$');
            }

            return false;
        }
    }

    /** @var string $uri Link URI */
    public string $uri {
        get => $this->uri;
    }

    /**
     * Create a `Link` object.
     *
     * @param LinkTag|SeeTag $tag Tag containg link information.
     * @param Element $element Element the link is from.
     * @throws ReflectionException
     */
    public function __construct(LinkTag|SeeTag $tag, Element $element)
    {
        $this->element = $element;
        $this->description = $tag->getDescription();

        if ($tag instanceof LinkTag) {
            $this->content = $this->uri = $tag->getLink();
        } else { // SeeTag
            $reference = $tag->getReference();

            if ($reference instanceof Fqsen) {
                // Because you can't get the name out of the reference via the API
                $this->content = new ReflectionClass($reference)
                    ->getProperty('fqsen')
                    ->getValue($reference)
                    ->getName()
                ;

                if ($element instanceof ObjectElement) {
                    $this->uri = $element->pathTo((string) $reference);
                } else {
                    /** @var ClassConstantElement|MethodElement|PropertyElement $element */
                    $this->uri = $element->declaringClass->pathTo((string) $reference);
                }
            } else { // Url
                $uri = (string) $reference;
                $this->content = substr($uri, 6);

                if (str_starts_with($uri, 'doc')) { // local documentation
                    $up = str_repeat(
                        '../',
                        count(
                            explode('\\', substr($element->fqcn, strlen($element->rootNamespace) + 1))
                        )
                    );

                    $this->uri = substr($uri, 0, 6) . $up . substr($uri, 6);
                } elseif (str_starts_with($uri, 'http')) { // external link
                    $this->content = $this->uri = $uri;
                } else {
                    throw new RuntimeException('Unsupported URI scheme: ' . $uri);
                }
            }
        }
    }
}