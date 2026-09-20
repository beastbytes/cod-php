<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Tests\Support\Files\Classes;

use RuntimeException;

class TestClass2 extends TestClass3
{
    private string $string;

    public function __construct(private readonly int $a, private readonly int $b)
    {
    }

    public function add(): int
    {
        return $this->a + $this->b;
    }

    public function subtract(): int
    {
        return $this->a - $this->b;
    }

    public function multiply(int $c = 0): int
    {
        return $this->a * $this->b * $c;
    }

    public function divide(): float
    {
        if ($this->b === 0) {
            throw new RuntimeException("Can't divide by zero");
        }

        return (float) $this->a / $this->b;
    }

    public function setter(string $string): void
    {
        $this->string = $string;
    }
}