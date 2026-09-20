<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Tests\Support\Files\Classes;

class TestClass6
{
    public array $array;
    public int $int = 5;
    public ?int $nullInt = 5;
    public string $string = 'string';
    public ?TestClass2 $testClass2 = null;
    public int|float $union;
    public TestClass&TestClass2 $intersection;
    public int $tripled {
        get => $this->int * 3;
    }
    public int $writeOnly {
        set => $this->writeOnly = $value;
    }

    public function a(int $p1, string &$p2, TestClass2|null $p3 = null, array $p4 = []): void
    {
        $this->int = $p1;
        $this->string = $p2;
        $this->testClass2 = $p3;
        $this->array = $p4;
    }

    public function b(?int $p1): void
    {
        $this->nullInt = $p1;
    }

    public function c(int|float $p1): void
    {
        $this->union = $p1;
    }

    public function d(TestClass&TestClass2 $p1): void
    {
        $this->intersection = $p1;
    }

    public function e(string ...$p1): void
    {
        $this->array = $p1;
    }
}