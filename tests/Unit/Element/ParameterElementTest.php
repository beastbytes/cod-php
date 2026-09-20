<?php

use BeastBytes\CodPhp\Element\ClassElement;
use BeastBytes\CodPhp\Element\ParameterElement;
use BeastBytes\CodPhp\InheritanceLevel;
use BeastBytes\CodPhp\Tests\Support\Files\Classes\TestClass6;

describe(ParameterElement::class, function () {
    test('Parameter Element', function (ParameterElement $element, array $expected) {
        expect($element)->toBeInstanceOf(ParameterElement::class)
            ->and($element->hasDefaultValue)->toBe($expected['hasDefaultValue'])
            ->and($element->isPassedByReference)->toBe($expected['isPassedByReference'])
            ->and($element->isVariadic)->toBe($expected['isVariadic'])
            ->and($element->allowsNull)->toBe($expected['allowsNull'])
            ->and($element->type)->toBeInstanceOf($expected['type'])

        ;
    })
        ->with('elements')
    ;
});

dataset('elements', function () {
    $class = new ClassElement(new ReflectionClass(TestClass6::class));
    $class->rootNamespace = __NAMESPACE__;
    $class->inheritanceLevel = InheritanceLevel::Namespace;

    foreach ($class->methods as $method) {
        foreach ($method->parameters as $parameter) {
            $expected = match($method->name . $parameter->name) {
                'ap1' => [
                    'hasDefaultValue' => false,
                    'defaultValue' => null,
                    'isPassedByReference' => false,
                    'isVariadic' => false,
                    'allowsNull' => false,
                    'type' => ReflectionNamedType::class,
                ],
                'ap2' => [
                    'hasDefaultValue' => false,
                    'defaultValue' => null,
                    'isPassedByReference' => true,
                    'isVariadic' => false,
                    'allowsNull' => false,
                    'type' => ReflectionNamedType::class,
                ],
                'ap3' => [
                    'hasDefaultValue' => true,
                    'defaultValue' => 'null',
                    'isPassedByReference' => false,
                    'isVariadic' => false,
                    'allowsNull' => true,
                    'type' => ReflectionNamedType::class,
                ],
                'ap4' => [
                    'hasDefaultValue' => true,
                    'defaultValue' => '[]',
                    'isPassedByReference' => false,
                    'isVariadic' => false,
                    'allowsNull' => false,
                    'type' => ReflectionNamedType::class,
                ],
                'bp1' => [
                    'hasDefaultValue' => false,
                    'defaultValue' => null,
                    'isPassedByReference' => false,
                    'isVariadic' => false,
                    'allowsNull' => true,
                    'type' => ReflectionNamedType::class,
                ],
                'cp1' => [
                    'hasDefaultValue' => false,
                    'defaultValue' => null,
                    'isPassedByReference' => false,
                    'isVariadic' => false,
                    'allowsNull' => false,
                    'type' => ReflectionUnionType::class,
                ],
                'dp1' => [
                    'hasDefaultValue' => false,
                    'defaultValue' => null,
                    'isPassedByReference' => false,
                    'isVariadic' => false,
                    'allowsNull' => false,
                    'type' => ReflectionIntersectionType::class,
                ],
                'ep1' => [
                    'hasDefaultValue' => false,
                    'defaultValue' => null,
                    'isPassedByReference' => false,
                    'isVariadic' => true,
                    'allowsNull' => false,
                    'type' => ReflectionNamedType::class,
                ],
            };

            yield $method->name . ':' . $parameter->name => [$parameter, $expected];
        };
    }
});