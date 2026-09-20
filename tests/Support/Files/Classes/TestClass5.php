<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Tests\Support\Files\Classes;

use BeastBytes\CodPhp\Tests\Support\Files\Traits\TestTrait;

/** @internal */
class TestClass5
{
    use TestTrait;

    public const array ARRAY = [1, 2, 3];
    public const bool FALSE = false;
    public const float FLOAT = 1.23;
    public const int INTEGER = 10;
    public const string STRING = 'string';
    public const bool TRUE = true;
}