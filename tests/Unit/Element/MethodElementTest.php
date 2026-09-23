<?php

use BeastBytes\CodPhp\Element\ClassElement;
use BeastBytes\CodPhp\Element\MethodElement;
use BeastBytes\CodPhp\Element\ParameterElement;
use BeastBytes\CodPhp\InheritanceLevel;
use BeastBytes\CodPhp\Tests\Support\Files\Classes\TestClass2;

describe(MethodElement::class, function () {
    test('Method', function (MethodElement $element, array $expected) {
        expect($element)->toBeInstanceOf(MethodElement::class)
            ->and($element->isConstructor)->toBe($expected['isConstructor'])
            ->and($element->isDestructor)->toBe($expected['isDestructor'])
            ->and($element->hasReturnType)->toBe($expected['hasReturnType'])
            ->and($element->returnType?->getName())->toBe($expected['returnType'])
            ->and($element->hasParameters)->toBe($expected['hasParameters'])
            ->and($element->parameters)->toBeElements($expected['parameters'], ParameterElement::class);
        ;
    })
        ->with('elements')
    ;
});

dataset('elements', function () {
    $class = new ClassElement(new ReflectionClass(TestClass2::class));
    $class->rootNamespace = __NAMESPACE__;
    $class->inheritanceLevel = InheritanceLevel::Namespace;
    $methods = $class->methods;

    foreach ($methods as $method) {
        $expected = match ($method->name) {
            '__construct' => [
                'isConstructor' => true,
                'isDestructor' => false,
                'hasReturnType' => false,
                'returnType' => null,
                'hasParameters' => true,
                'parameters' => ['a', 'b'],
            ],
            '__toString' => [
                'isConstructor' => false,
                'isDestructor' => false,
                'hasReturnType' => true,
                'returnType' => 'string',
                'hasParameters' => false,
                'parameters' => [],
            ],
            'add' => [
                'isConstructor' => false,
                'isDestructor' => false,
                'hasReturnType' => true,
                'returnType' => 'int',
                'hasParameters' => false,
                'parameters' => [],
            ],
            'subtract' => [
                'isConstructor' => false,
                'isDestructor' => false,
                'hasReturnType' => true,
                'returnType' => 'int',
                'hasParameters' => false,
                'parameters' => [],
            ],
            'multiply' => [
                'isConstructor' => false,
                'isDestructor' => false,
                'hasReturnType' => true,
                'returnType' => 'int',
                'hasParameters' => true,
                'parameters' => ['c'],
            ],
            'divide' => [
                'isConstructor' => false,
                'isDestructor' => false,
                'hasReturnType' => true,
                'returnType' => 'float',
                'hasParameters' => false,
                'parameters' => [],
            ],
            'setter' => [
                'isConstructor' => false,
                'isDestructor' => false,
                'hasReturnType' => true,
                'returnType' => 'void',
                'hasParameters' => true,
                'parameters' => ['string'],
            ],
        };

        yield $method->name => [$method, $expected];
    }
});