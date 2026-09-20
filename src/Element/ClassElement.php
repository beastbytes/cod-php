<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Element;

/** Represents a Class structural element. */
final class ClassElement extends ObjectElement
{
    use ModifierTrait;
    use PropertyTrait;
}