<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Element;

use ReflectionType;

use function ksort;

/** Represents an Enum structural element. */
final class EnumElement extends ObjectElement
{
    /** @var ?ReflectionType $backingType The Backing type or `null` if not backed */
    public ?ReflectionType $backingType {
        get => $this->reflector->getBackingType();
    }

    /** @var bool $isBacked `true` if the enum is backed, `false` if not */
    public bool $isBacked {
        get => $this->reflector->isBacked();
    }

    /** @var EnumCaseElement[] $cases Cases */
    public array $cases = [] {
        get {
            if (empty($this->cases)) {
                foreach ($this->reflector->getCases() as $case) {
                    $this->cases[$case->getValue()->name] = new EnumCaseElement($case);
                }

                ksort($this->cases);
            }

            return $this->cases;
        }
    }
}