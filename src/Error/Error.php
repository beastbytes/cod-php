<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Error;

use BeastBytes\CodPhp\Element\Element;
use BeastBytes\CodPhp\Element\MethodElement;
use BeastBytes\CodPhp\Element\ObjectElement;
use JsonSerializable;

/** Represents a structural element documentation error. */
final readonly class Error implements JsonSerializable
{
    /**
     * Create a new Error.
     *
     * @param string $message Error message.
     * @param Element $element Element with the error.
     * @param ErrorLevel $level Error level.
     * @param array<string, mixed> $context Context of the error.
     */
    public function __construct(
        public private(set) string $message,
        public private(set) Element $element,
        public private(set) ErrorLevel $level,
        public private(set) array $context,
    ) {
    }

    /** Used when generation JSON error report */
    public function jsonSerialize(): array
    {
        $json = [];
        $json['level'] = $this->level->jsonSerialize();
        $json['message'] = $this->message;
        $json['element-type'] = $this->element->elementType;
        $json['element-name'] = $this->element->name;
        $json['fqcn'] = (
            $this->element instanceof ObjectElement
                ? $this->element->fqcn
                : $this->element->declaringClass->fqcn
            );
        $json['context'] = $this->context;

        return $json;
    }
}