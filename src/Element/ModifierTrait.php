<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Element;

use Reflection;

/** Provides element modifiers, e.g. visibility, readonly, static, etc. */
trait ModifierTrait
{
    /** @var string[] Element modifiers */
    public array $modifiers {
        get => Reflection::getModifierNames($this->reflector->getModifiers());
    }
}