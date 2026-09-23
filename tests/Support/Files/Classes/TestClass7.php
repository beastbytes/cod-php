<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Tests\Support\Files\Classes;

class TestClass7
{
    /**
     * This method has a badly formed `@param` tag - missing `$` from variable name
     * @param int x Badly formed tag
     * @return void
     */
    public function test(int $x): void {}
}