<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Element;

/** Provides the declaring class of an element. */
trait DeclaringClassTrait
{
    /** @var ClassElement Declaring class of the element. */
    public ClassElement $declaringClass {
        get {
            $class = new ClassElement($this->reflector->getDeclaringClass());
            $class->rootNamespace = $this->rootNamespace;
            return $class;
        }
    }
}