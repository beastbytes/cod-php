<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Tests\Support\Files\Classes;

/**
 * A test class for CodPhp.
 *
 * A dummy class for testing CodPhp with class level tags.
 *
 * @link https://example.com A test link
 * @see BeastBytes\CodPhp\Tests\Support\Files\Classes\TestClass2 Another test class
 * @since 1.0.0
 * @version 1.0.1
 * @deprecated 99.0.99 Test deprecation notice
 * @copyright 2026 BeastBytes
 */
class TestClass
{
    public const string FOO = 'foo';
    public const string BAR = 'bar';
    protected const string BAZ = 'baz';
    private const string CAR = 'car';

    public function method1(): string
    {
        return 'method1';
    }

    /**
     * @return bool
     * @internal
     */
    public function method2(): bool
    {
        return true;
    }

    /**
     * @return bool
     * @api
     */
    public function method3(): bool
    {
        return true;
    }

    /**
     * @return bool
     * @ignore
     */
    public function method4(): bool
    {
        return true;
    }

    public function method5(): bool
    {
        return true;
    }

    protected function method10(): bool
    {
        return true;
    }

    private function method20(): bool
    {
        return true;
    }
}