<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp;

/**
 * Inheritance level of methods and properties included in elements.
 */
enum InheritanceLevel
{
    /** Include methods and properties from all elements, including those not defined in the namespace */
    case All;
    /** Include methods and properties from all elements defined in the namespace */
    case Namespace;
    /** Include only methods and properties defined in the element */
    case Element;
}