<?php

use BeastBytes\CodPhp\Element\EnumCaseElement;
use BeastBytes\CodPhp\Element\EnumElement;
use BeastBytes\CodPhp\InheritanceLevel;
use BeastBytes\CodPhp\Tests\Support\Files\Enums\TestBackedEnum;
use BeastBytes\CodPhp\Tests\Support\Files\Enums\TestUnitEnum;

describe(EnumCaseElement::class, function () {
    test('Enum Case', function (EnumCaseElement $element, array $expected) {
        expect($element)->toBeInstanceOf(EnumCaseElement::class)
            ->and($element->name)->toBe($expected['name'])
            ->and($element->value)->toBe($expected['value'])
        ;
    })
        ->with('elements')
    ;
});

dataset('elements', function () {
    $backedEnum = new EnumElement(new ReflectionEnum(TestBackedEnum::class));
    $backedEnum->inheritanceLevel = InheritanceLevel::Namespace;
    $backedEnum->rootNamespace = __NAMESPACE__;

    $unitEnum = new EnumElement(new ReflectionEnum(TestUnitEnum::class));
    $unitEnum->inheritanceLevel = InheritanceLevel::Namespace;
    $unitEnum->rootNamespace = __NAMESPACE__;

    foreach ([$backedEnum, $unitEnum] as $enum) {
        foreach ($enum->cases as $name => $case) {
            $params = [
                'element' => $case,
                'expected' => [
                    'name' => $name,
                    'value' => $enum->isBacked
                        ? match($name) {
                            'Case1b' => 1,
                            'Case2b' => 2,
                            'Case3b' => 3,
                            'Case4b' => 4,
                            'Case5b' => 5,
                        }
                        : null
                    ,
                ],
            ];

            yield $name => $params;
        }
    }
});