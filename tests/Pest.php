<?php

use BeastBytes\CodPhp\Element\ClassConstantElement;
use BeastBytes\CodPhp\Element\ClassElement;
use BeastBytes\CodPhp\Element\EnumElement;
use BeastBytes\CodPhp\Element\InterfaceElement;
use BeastBytes\CodPhp\Element\MethodElement;
use BeastBytes\CodPhp\Tests\Support\Files\Classes\TestClass;
use BeastBytes\CodPhp\Tests\Support\Files\Classes\TestClass2;
use BeastBytes\CodPhp\Tests\Support\Files\Classes\TestClass3;
use BeastBytes\CodPhp\Tests\Support\Files\Classes\TestClass4;
use BeastBytes\CodPhp\Tests\Support\Files\Classes\TestClass5;
use BeastBytes\CodPhp\Tests\Support\Files\Enums\TestBackedEnum;
use BeastBytes\CodPhp\Tests\Support\Files\Interfaces\TestInterface;
use BeastBytes\CodPhp\Tests\TestCase;

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "pest()" function to bind different classes or traits.
|
*/

pest()->extend(TestCase::class)->in('Feature');

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to check that values meet certain conditions. The
| "expect()" function gives you access to a set of "expectations" methods that you can use
| to assert different things. Of course, you may extend the Expectation API at any time.
|
*/

expect()->extend('toBeElements', function (array $elements, ?string $type = null) {
    $this->toBeArray();

    if (count($this->value) !== count($elements)) {
        test()->fail(sprintf('Expected %d elements, found %d', count($elements), count($this->value)));
    }

    foreach ($elements as $element) {
        if (!in_array($element, array_keys($this->value))) {
            test()->fail(sprintf('`%s` not found in elements', $element));
        }

        if (is_string($type) && !$this->value[$element] instanceof $type) {
            test()->fail(sprintf('`%s` not instanceof %s', $element, $type));
        }
    }

    return $this;
});

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code specific to your
| project that you don't want to repeat in every file. Here you can also expose helpers as
| global functions to help you to reduce the number of lines of code in your test files.
|
*/

/**
 * @return array
 */
function elements(): array
{
    return [
        new ClassElement(new ReflectionClass(TestClass::class)),
        new ClassElement(new ReflectionClass(TestClass2::class)),
        new ClassElement(new ReflectionClass(TestClass3::class)),
        new ClassElement(new ReflectionClass(TestClass4::class)),
        new ClassElement(new ReflectionClass(TestClass5::class)),
        new EnumElement(new ReflectionClass(TestBackedEnum::class)),
        new InterfaceElement(new ReflectionClass(TestInterface::class)),
    ];
}
