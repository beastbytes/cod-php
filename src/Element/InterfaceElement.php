<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Element;

use function ksort;

/** Represents an Interface structural element. */
final class InterfaceElement extends ObjectElement
{
    use PropertyTrait;

    /** @var ObjectElement[] $implementedBy Object elements that implement the Iterface of this element. */
    public array $implementedBy = [] {
        get {
            if (empty($this->implementedBy)) {
                foreach ($this->getElements(ObjectElement::class) as $element) {
                    if ($element !== $this && $element->implements($this)) {
                        $this->implementedBy[$element->fqcn] = $element;
                    }
                }

                ksort($this->implementedBy, SORT_STRING);
            }

            return $this->implementedBy;
        }
    }
}