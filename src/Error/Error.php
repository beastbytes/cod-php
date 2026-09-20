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
    public function __construct(
        public private(set) string $message,
        public private(set) Element $element,
        public private(set) ErrorLevel $level,
        public private(set) array $context,
    ) {
    }

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