<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Tests\Support\Files\Classes;

use BeastBytes\CodPhp\Tests\Support\Files\Interfaces\TestInterface;
use BeastBytes\CodPhp\Tests\Support\Files\Traits\TestTrait;

/** @api */
class TestClass3 extends TestClass4 implements TestInterface
{
    use TestTrait;
}