<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Element;

/** PHP visibility. */
enum Visibility
{
    /** @link https://better-php.net/manual/en/language.oop5.visibility Private */
    case private;
    /** @link https://better-php.net/manual/en/language.oop5.visibility Protected */
    case protected;
    /** @link https://better-php.net/manual/en/language.oop5.visibility Public */
    case public;
}