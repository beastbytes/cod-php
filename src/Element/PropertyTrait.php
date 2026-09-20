<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Element;

use ReflectionClassConstant;

use function ksort;

/** Provides information about and the properties of an element. */
trait PropertyTrait
{
    /**
     * @var bool $hasProperties `true` if the element's object has has properties, `false` if not.
     * @see PropertyTrait::$properties
     */
    public bool $hasProperties {
        get => !empty($this->properties);
    }

    /** @var array<string, PropertyElement> Properties of the element indexed by FQCN. */
    public array $properties = [] {
        get {
            if (empty($this->properties)) {
                foreach ($this->reflector->getProperties(ReflectionClassConstant::IS_PUBLIC) as $property) {
                    $property = new PropertyElement($property);
                    $property->rootNamespace = $this->rootNamespace;

                    $this->properties[$property->name] = $property;
                }

                ksort($this->properties);
            }

            return $this->properties;
        }
    }
}