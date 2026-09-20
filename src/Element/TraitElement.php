<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Element;

use function ksort;

/** Represents a trait structural element. */
final class TraitElement extends ObjectElement
{
    use PropertyTrait;
    use ThrowsTrait;

    /**
     * @var bool `true` is the trait is used, `false` if not.
     * @see TraitElement::$usedBy
     */
    public bool $isUsed {
        get => !empty($this->usedBy);
    }

    /**
     * @var array<string, ObjectElement> Elements that use this trait.
     * @see TraitElement::$isUsed
     */
    public array $usedBy = [] {
        get {
            if (empty($this->usedBy)) {
                $classes = $this->getElements(ClassElement::class);
                $traits = $this->getElements(TraitElement::class);
                $elements = [...$classes, ...$traits];

                foreach ([...$classes, ...$traits] as $element) {
                    if ($element !== $this && $element->uses($this)) {
                        $this->usedBy[$element->fqcn] = $element;
                    }
                }

                ksort($this->usedBy, SORT_STRING);
            }

            return $this->usedBy;
        }
    }
}