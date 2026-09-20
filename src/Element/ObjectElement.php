<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Element;

use BeastBytes\CodPhp\InheritanceLevel;
use phpDocumentor\Reflection\DocBlock\Tags\Method;
use phpDocumentor\Reflection\DocBlock\Tags\Property;
use phpDocumentor\Reflection\DocBlock\Tags\PropertyRead;
use phpDocumentor\Reflection\DocBlock\Tags\PropertyWrite;
use ReflectionClass;
use ReflectionClassConstant;
use ReflectionMethod;

use function array_diff_key;
use function array_fill;
use function array_map;
use function array_pop;
use function array_push;
use function array_shift;
use function count;
use function explode;
use function implode;
use function in_array;
use function ksort;
use function min;
use function trim;
use function str_starts_with;
use function strlen;
use function substr;

/** Abstract class for object - class, enum, interface, and trait - structural elements. */
abstract class ObjectElement extends Element
{
    /** @var array<string, ClassElement|InterfaceElement> $ancestors Ancestors of the element indexed by FQCN. */
    public array $ancestors = [] {
        get {
            if (empty($this->ancestors)) {
                /** @var ReflectionClass|false $parentClass */
                $parentClass = $this->reflector->getParentClass();

                if ($parentClass instanceof ReflectionClass) {
                    $parent = $this instanceof ClassElement
                        ? new ClassElement($parentClass)
                        : new InterfaceElement($parentClass);

                    $this->ancestors = [...[$parent->fqcn => $parent], ...$parent->ancestors];
                } else {
                    $this->ancestors = [];
                }
            }

            return $this->ancestors;
        }
    }

    /** @var bool $canHaveMethodTag `true` if the element can have a `@method` tag, `false` if not. */
    public bool $canHaveMethodTag {
        get => $this instanceof ClassElement;
    }

    /** @var bool $canHavePropertyTag `true` if the element can have a `@property`, `@property-read`, or `@property-write` tag, `false` if not. */
    public bool $canHavePropertyTag {
        get => $this instanceof ClassElement || $this instanceof TraitElement;
    }

    /**
     * @var ClassConstantElement[] $constants Public constants defined in the element. Enum cases are **not** included - use the `cases` property.
     * @see ObjectElement::$hasConstants
     */
    public array $constants = [] {
        get {
            if (empty($this->constants)) {
                foreach ($this->reflector->getReflectionConstants(ReflectionClassConstant::IS_PUBLIC) as $constant) {
                    $constant = new ClassConstantElement($constant);
                    $constant->rootNamespace = $this->rootNamespace;

                    $this->constants[$constant->name] = $constant;
                }

                if ($this instanceof EnumElement) { // Remove Enum cases
                    $this->constants = array_diff_key($this->constants, $this->cases);
                }

                ksort($this->constants);
            }

            return $this->constants;
        }
    }

    /** @var string $fqcn FQCN of the element's object */
    public string $fqcn {
        get => $this->reflector->getName();
    }

    /**
     * @var bool $hasAncestors `true` if the element has ancestors, `false` if not.
     * @see ObjectElement::$ancestors
     */
    public bool $hasAncestors {
        get => !empty($this->ancestors);
    }

    /**
     * @var bool $hasConstants `true` if the element has public constants, `false` if not.
     * @see ObjectElement::$constants
     */
    public bool $hasConstants {
        get => !empty($this->constants);
    }

    /**
     * @var bool $hasMethods `true` if the element has methods, `false` if not.
     * @see ObjectElement::$methods
     */
    public bool $hasMethods {
        get => !empty($this->methods);
    }

    /**
     * @var bool $hasSubclasses `true` if the element has subclasses, `false` if not.
     * @see ObjectElement::$subclasses
     */
    public bool $hasSubclasses {
        get => !empty($this->subclasses);
    }

    /** @var bool $implementsInterfaces `true` if the element implements interfaces, `false` if not. */
    public bool $implementsInterfaces {
        get => !empty($this->interfaces);
    }

    /** @var ObjectElement[] The inheritance path for the element; $this and its ancestors. */
    public array $inheritance {
        get => [$this, ...$this->ancestors];
    }

    /**
     * @var InterfaceElement[] $interfaces Interfaces implemented by the element.
     * @see InterfaceElement
     */
    public array $interfaces = [] {
        get {
            if (empty($this->interfaces)) {
                $this->interfaces = array_map(function ($interface) {
                    return new InterfaceElement($interface);
                }, $this->reflector->getInterfaces());

                ksort($this->interfaces);
            }

            return $this->interfaces;
        }
    }

    /** @var InheritanceLevel $inheritanceLevel Inheritence level to show. */
    public InheritanceLevel $inheritanceLevel;

    /**
     * @var MethodElement[] $methods Methods implemented by the element.
     * @see ObjectElement::$hasMethods
     */
    public array $methods = [] {
        get {
            if (empty($this->methods)) {
                /** @var ReflectionMethod $method */
                foreach ($this->reflector->getMethods(ReflectionClassConstant::IS_PUBLIC) as $method) {
                    if ($method->isInternal()) { // This *is not* the `@internal` tag
                        continue; // Don't document internal methods
                    }

                    $method = new MethodElement($method);
                    $method->rootNamespace = $this->rootNamespace;

                    if ($method->isInApi
                        && (
                            $this->inheritanceLevel === InheritanceLevel::All
                            || ($this->inheritanceLevel === InheritanceLevel::Namespace && str_starts_with(
                                $method->declaringClass->namespace,
                                $this->rootNamespace
                            ))
                            || (
                                $this->inheritanceLevel === InheritanceLevel::Element
                                && $method->declaringClass->fqcn === $this->fqcn
                            )
                        )
                    ) {
                        $this->methods[$method->name] = $method;
                    }
                }

                ksort($this->methods);
            }

            return $this->methods;
        }
    }

    /** @var Method[] $methodTags Array of `@method` tags */
    public array $methodTags {
        get => $this->canHaveMethodTag ? $this->docBlock->getTagsByName('method') : [];
    }

    /** @var string $name Element name. */
    public string $name {
        get => $this->reflector->getShortName();
    }

    /** @var string $namespace Object namespace. */
    public string $namespace {
        get => $this->reflector->getNamespaceName();
    }

    /** @var Property[] $propertyTags Array of `@property` tags */
    public array $propertyTags {
        get => $this->canHavePropertyTag ? $this->docBlock->getTagsByName('property') : [];
    }

    /** @var PropertyRead[] $propertyReadTags Array of `@property-read` tags */
    public array $propertyReadTags {
        get => $this->canHavePropertyTag ? $this->docBlock->getTagsByName('property-read') : [];
    }

    /** @var PropertyWrite[] $propertyWriteTags Array of `@property-write` tags */
    public array $propertyWriteTags {
        get => $this->canHavePropertyTag ? $this->docBlock->getTagsByName('property-write') : [];
    }

    /**
     * @var ObjectElement[] $subclasses Subclasses of the element.
     * @see ObjectElement::$subclasses
     */
    public array $subclasses = [] {
        get {
            if (empty($this->subclasses)) {
                foreach ($this->getElements(static::class) as $element) {
                    if ($element->isSubclassOf($this)) {
                        $this->subclasses[$element->fqcn] = $element;
                    }
                }

                ksort($this->subclasses, SORT_STRING);
            }

            return $this->subclasses;
        }
    }

    /**
     * @var TraitElement[] $traits Traits used by the element.
     * @see ObjectElement::$usesTraits
     * @see TraitElement
     */
    public array $traits = [] {
        get {
            if (empty($this->traits)) {
                $this->traits = array_map(function ($trait) {
                    return new TraitElement($trait);
                }, $this->reflector->getTraits());

                ksort($this->traits);
            }

            return $this->traits;
        }
    }

    /**
     * @var bool $usesTraits `true` if the element uses traits, `false` if not.
     * @see ObjectElement::$traits
     */
    public bool $usesTraits {
        get => !empty($this->traits);
    }

    /**
     * Returns the relative path from this element to the given element.
     *
     * @param string|ObjectElement $destination The FQCN or element to get the path to.
     * @return ?string Relative path to the element from this element or `null` if $element is this element.
     */
    public function pathTo(string|ObjectElement $destination): ?string
    {
        $from = $this->fqcn;
        $to = $destination instanceof Element ? $destination->fqcn : $destination;
        $to = trim($to, '\\');

        if (str_starts_with($to, $this->rootNamespace) && $from !== $to) {
            $from = explode('\\', trim(substr($from, strlen($this->rootNamespace)), '\\'));
            array_pop($from); // Remove the last token; it's the object, not part of the path

            $to = explode('\\', trim(substr($to, strlen($this->rootNamespace)), '\\'));
            $destination = array_pop($to); // Remove the last token; the destination object

            $count = min(count($from), count($to)); // Use the shortest path for the count

            // Remove common steps from `to`
            for ($common = 0; $count && $from[$common] === $to[0]; $common++, $count--) {
                array_shift($to);
            }

            // The number of directory levels to go up is the length of `from` minus the number of common steps
            $path = array_fill(0, count($from) - $common, '..');
            // Add the remaining `to` steps to the path
            array_push($path, ...$to);
            // and the destination
            $path[] = $destination;

            return implode('/', $path);
        }

        return null;
    }

    protected function implements(InterfaceElement $element): bool
    {
        return $this->reflector->implementsInterface($element->reflector);
    }

    protected function uses(TraitElement $element): bool
    {
        return in_array($element, $this->traits);
    }

    private function isSubclassOf(ObjectElement $element): bool
    {
        return $this->reflector->isSubclassOf($element->reflector);
    }
}
