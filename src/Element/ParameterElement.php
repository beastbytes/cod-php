<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Element;

use ReflectionParameter;

/** Represents a Parameter structural element. */
final class ParameterElement extends Element
{
    use DefaultValueTrait;
    use TypeTrait;

    /** @var string $description Parameter description. */
    public string $description {
        get => $this->description;
    }

    /** @var bool $hasDefaultValue `true` if the parameter has a default value, `false` if not. */
    public bool $hasDefaultValue {
        get => $this->reflector->isDefaultValueAvailable();
    }

    /** @var bool $isPassedByReference `true` if the parameter is passed by reference, `false` if not. */
    public bool $isPassedByReference {
        get => $this->reflector->isPassedByReference();
    }

    /** @var bool $isVariadic `true` if the parameter is variadic, `false` if not. */
    public bool $isVariadic {
        get => $this->reflector->isVariadic();
    }

    /**
     * Create a parameter element.
     *
     * @param ReflectionParameter $reflector Para
     * @param string $description Parameter description
     */
    public function __construct(ReflectionParameter $reflector, string $description)
    {
        parent::__construct($reflector);

        $this->description = $description;
    }
}