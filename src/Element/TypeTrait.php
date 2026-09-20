<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Element;

use ReflectionType;

/** Provides information about and the type of a parameter or property. */
trait TypeTrait
{
    /** @var bool `true` if the type allows `null`, `false` if not. */
    public bool $allowsNull {
        get => $this->reflector->allowsNull();
    }

    /** @var ReflectionType $type Parameter or property type. */
    public ReflectionType $type {
        get => $this->reflector->getType();
    }
}