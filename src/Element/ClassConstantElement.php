<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Element;

use function gettype;

/** Represents a Class Constant structural element. */
final class ClassConstantElement extends Element
{
    use DeclaringClassTrait;
    use ValueToStringTrait;

    /** @var string $value Constant value. */
    public string $value {
        get => $this->valueToString($this->reflector->getValue());
    }
}