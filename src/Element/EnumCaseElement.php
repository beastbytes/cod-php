<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Element;

/** Represents an EnumBackedCase or EnumUnitCase structural element. */
final class EnumCaseElement extends Element
{
    /** @var string $name Case name. */
    public string $name {
        get => $this->reflector->getValue()->name;
    }

    /** @var int|string|null $value Case value for EnumBackedCase; `null` if not a backed Enum case. */
    public int|string|null $value {
        get => $this->reflector->getEnum()->getBackingType() === null
            ? null
            : $this->reflector->getBackingValue()
        ;
    }
}