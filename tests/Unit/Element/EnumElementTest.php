<?php

use BeastBytes\CodPhp\Element\EnumElement;
use BeastBytes\CodPhp\Element\MethodElement;
use BeastBytes\CodPhp\InheritanceLevel;
use BeastBytes\CodPhp\Tests\Support\Files\Enums\TestBackedEnum;
use BeastBytes\CodPhp\Tests\Support\Files\Enums\TestUnitEnum;
use phpDocumentor\Reflection\Types\Integer;

describe(EnumElement::class, function () {
    test('Enum Element', function (EnumElement $element, array $expected) {
        expect($element)->toBeInstanceOf(EnumElement::class)
            ->and($element->isBacked)->toBe($expected['isBacked'])
            ->and(array_keys($element->cases))->toBe($expected['cases'])
            ->and(array_keys($element->constants))->toBe($expected['constants'])
            ->and($element->canHaveMethodTag)->toBeFalse()
            ->and($element->canHavePropertyTag)->toBeFalse()
        ;

        if ($element->isBacked) {
            expect((string) $element->backingType)->toBe($expected['backingType']);
        } else {
            expect($element->backingType)->toBeNull();
        }

        $methods = $element->methods;
        $method = array_pop($methods);

        expect($method)->toBeInstanceOf(MethodElement::class)
            ->and($method->name)->toBe($expected['methodName'])
        ;

    })
        ->with('elements')
    ;
});

/**
 * @throws ReflectionException
 */
dataset('elements', function () {
    $backedEnum = new EnumElement(new ReflectionEnum(TestBackedEnum::class));
    $backedEnum->inheritanceLevel = InheritanceLevel::Namespace;
    $backedEnum->rootNamespace = __NAMESPACE__;

    $unitEnum = new EnumElement(new ReflectionEnum(TestUnitEnum::class));
    $unitEnum->inheritanceLevel = InheritanceLevel::Namespace;
    $unitEnum->rootNamespace = __NAMESPACE__;

    foreach ([
        'Backed Enum' => [
            'element' => $backedEnum,
            'expected' => [
                'isBacked' => true,
                'backingType' => 'int',
                'cases' => ['Case1b', 'Case2b', 'Case3b', 'Case4b', 'Case5b'],
                'constants' => ['BACKED_ENUM_CONSTANT'],
                'methodName' => 'backedEnumMethod',
            ]
        ],
        'Unit Enum' => [
            'element' => $unitEnum,
            'expected' => [
                'isBacked' => false,
                'backingType' => null,
                'cases' => ['Case1u', 'Case2u', 'Case3u', 'Case4u', 'Case5u'],
                'constants' => ['UNIT_ENUM_CONSTANT'],
                'methodName' => 'unitEnumMethod',
            ]
        ],
    ] as $test => $params) {
        yield $test => $params;
    }
});
