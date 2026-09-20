<?php

use BeastBytes\CodPhp\Element\ClassElement;
use BeastBytes\CodPhp\Element\PropertyElement;
use BeastBytes\CodPhp\InheritanceLevel;
use BeastBytes\CodPhp\Tests\Support\Files\Classes\TestClass6;

describe(PropertyElement::class, function () {
    test('Property Element', function (PropertyElement $element, array $expected) {
        expect($element)->toBeInstanceOf(PropertyElement::class)
            ->and($element->name)->toBe($expected['name'])
            ->and($element->hasDefaultValue)->toBe($expected['hasDefaultValue'])
            ->and($element->defaultValue)->toBe($expected['defaultValue'])
            ->and($element->type->allowsNull())->toBe($expected['allowsNull'])
            ->and($element->canBeRead)->toBe($expected['canBeRead'])
            ->and($element->canBeWritten)->toBe($expected['canBeWritten'])
        ;
    })
        ->with('elements')
    ;
});

dataset('elements', function () {
    $class = new ClassElement(new ReflectionClass(TestClass6::class));
    $class->rootNamespace = __NAMESPACE__;
    $class->inheritanceLevel = InheritanceLevel::Namespace;
    $properties = $class->properties;

    foreach ($properties as $property) {
        $expected = match ($property->name) {
            'array' => [
                'name' => 'array',
                'hasDefaultValue' => false,
                'defaultValue' => null,
                'allowsNull' => false,
                'canBeRead' => true,
                'canBeWritten' => true,
            ],
            'int' => [
                'name' => 'int',
                'hasDefaultValue' => true,
                'defaultValue' => '5',
                'allowsNull' => false,
                'canBeRead' => true,
                'canBeWritten' => true,
            ],
            'nullInt' => [
                'name' => 'nullInt',
                'hasDefaultValue' => true,
                'defaultValue' => '5',
                'allowsNull' => true,
                'canBeRead' => true,
                'canBeWritten' => true,
            ],
            'string' => [
                'name' => 'string',
                'hasDefaultValue' => true,
                'defaultValue' => "'string'",
                'allowsNull' => false,
                'canBeRead' => true,
                'canBeWritten' => true,
            ],
            'testClass2' => [
                'name' => 'testClass2',
                'hasDefaultValue' => true,
                'defaultValue' => 'null',
                'allowsNull' => true,
                'canBeRead' => true,
                'canBeWritten' => true,
            ],
            'union' => [
                'name' => 'union',
                'hasDefaultValue' => false,
                'defaultValue' => null,
                'allowsNull' => false,
                'canBeRead' => true,
                'canBeWritten' => true,
            ],
            'intersection' => [
                'name' => 'intersection',
                'hasDefaultValue' => false,
                'defaultValue' => null,
                'allowsNull' => false,
                'canBeRead' => true,
                'canBeWritten' => true,
            ],
            'tripled' => [
                'name' => 'tripled',
                'hasDefaultValue' => false,
                'defaultValue' => null,
                'allowsNull' => false,
                'canBeRead' => true,
                'canBeWritten' => false,
            ],
            'writeOnly' => [
                'name' => 'writeOnly',
                'hasDefaultValue' => false,
                'defaultValue' => null,
                'allowsNull' => false,
                'canBeRead' => false,
                'canBeWritten' => true,
            ]
        };

        yield $property->name => [$property, $expected];
    }
});