<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Element;

use PropertyHookType;

use function array_filter;
use function implode;

/** Represents a Property structural element. */
final class PropertyElement extends Element
{
    use DeclaringClassTrait;
    use DefaultValueTrait;
    use TypeTrait;

    /**
     * @var ?string $description Property description
     * @see Element::$hasDescription
     */
    public ?string $description {
        get {
            $description = [];

            if ($this->hasDocBlock) {
                $description[] = $this->docBlock->getSummary();
                $description[] = $this->docBlock->getDescription()->render();
                $description[] = $this->docBlock->hasTag('var')
                    ? $this->docBlock->getTagsByName('var')[0]->getDescription()->render()
                    : false
                ;

                return implode(PHP_EOL, array_filter($description));
            }

            return null;
        }
    }

    /**
     * @var bool $hasDefaultValue `true` if the property has a default value, `false` if not.
     * @see DefaultValueTrait::$defaultValue
     */
    public bool $hasDefaultValue {
        get => $this->reflector->hasDefaultValue();
    }

    /**
     * @var bool $canBeRead `true` if the property can be read, `false` if not.
     * @see PropertyElement::$canBeWritten
     */
    public bool $canBeRead {
        get => !$this->reflector->hasHooks()
            || $this->reflector->hasHook(PropertyHookType::Get)
        ;
    }

    /**
     * @var bool $canBeWritten `true` if the property can be written, `false` if not.
     * @see PropertyElement::$canBeRead
     */
    public bool $canBeWritten {
        get {
            if ($this->reflector->hasHooks()) {
                return $this->reflector->hasHook(PropertyHookType::Set);
            }

            return !(
                $this->reflector->isPrivateSet()
                || $this->reflector->isProtectedSet()
                || $this->reflector->isReadOnly()
            );
        }
    }
}