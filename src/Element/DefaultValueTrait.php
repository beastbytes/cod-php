<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Element;

use function array_is_list;
use function gettype;
use function is_array;
use function str_replace;
use function substr;
use function var_export;

/** Provides the string representation of the default value of a parameter or property element. */
trait DefaultValueTrait
{
    use ValueToStringTrait;

    /**
     * @var ?string $defaultValue String representation of the default value of a parameter or property element or `null` if the property does not have a default value.
     * @see ParameterElement::$hasDefaultValue
     * @see PropertyElement::$hasDefaultValue
     */
    public ?string $defaultValue {
        get => $this->hasDefaultValue ? $this->valueToString($this->reflector->getDefaultValue()) : null;
    }
}