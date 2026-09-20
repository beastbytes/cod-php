<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Element;

use phpDocumentor\Reflection\DocBlock\Tags\Throws;

/** Provides information about and the exceptions thrown by an element. */
trait ThrowsTrait
{
    /**
     * @var bool $throwsException `true` if the element throws an exception, `false` if not.
     * @see ThrowsTrait::$throwsTags
     */
    public bool $throwsException {
        get => $this->hasDocBlock && $this->docBlock->hasTag('throws');
    }

    /**
     * @var Throws[] $throwsTags Array of `Throws` tags.
     * @see ThrowsTrait::$throwsException
     */
    public array $throwsTags {
        get => $this->docBlock->getTagsByName('throws');
    }
}