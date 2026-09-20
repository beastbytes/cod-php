<?php

use BeastBytes\CodPhp\Element\ClassElement;
use BeastBytes\CodPhp\Element\EnumElement;
use BeastBytes\CodPhp\Element\TraitElement;
use BeastBytes\CodPhp\Tests\Support\Files\Classes\TestClass;
use BeastBytes\CodPhp\Tests\Support\Files\Classes\TestClass2;
use BeastBytes\CodPhp\Tests\Support\Files\Classes\TestClass3;
use BeastBytes\CodPhp\Tests\Support\Files\Classes\TestClass4;
use BeastBytes\CodPhp\Tests\Support\Files\Classes\TestClass5;
use BeastBytes\CodPhp\Tests\Support\Files\Enums\TestBackedEnum;
use BeastBytes\CodPhp\Tests\Support\Files\Enums\TestUnitEnum;
use BeastBytes\CodPhp\Tests\Support\Files\Traits\TestTrait;
use BeastBytes\CodPhp\Tests\Support\Files\Traits\TestTrait2;

describe(TraitElement::class, function () {
    test('Trait Element', function (TraitElement $element, array $expected) {
        expect($element)->toBeInstanceOf(TraitElement::class)
            ->and($element->isUsed)->toBe($expected['isUsed'])
            ->and(array_keys($element->usedBy))->toBe($expected['usedBy'])
        ;
    })
        ->with('elements')
    ;
});

dataset('elements', function () {
    $elements = [
        new ClassElement(new ReflectionClass(TestClass::class)),
        new ClassElement(new ReflectionClass(TestClass2::class)),
        new ClassElement(new ReflectionClass(TestClass3::class)),
        new ClassElement(new ReflectionClass(TestClass4::class)),
        new ClassElement(new ReflectionClass(TestClass5::class)),
        new EnumElement(new ReflectionEnum(TestBackedEnum::class)),
        new EnumElement(new ReflectionEnum(TestUnitEnum::class)),
        new TraitElement(new ReflectionClass(TestTrait::class)),
        new TraitElement(new ReflectionClass(TestTrait2::class)),
    ];

    $traitElement = new TraitElement(new ReflectionClass(TestTrait::class));
    $traitElement2 = new TraitElement(new ReflectionClass(TestTrait2::class));
    $traitElement::setElements($elements);

    foreach ([
        'Trait' => [
            'element' => $traitElement,
            'expected' => [
                'isUsed' => true,
                'usedBy' => [TestClass3::class], // not TestClass5 as it's not in the API
            ]
        ],
       'Trait2' => [
            'element' => $traitElement2,
            'expected' => [
                'isUsed' => false,
                'usedBy' => [],
            ]
        ],
    ] as $test => $params) {
        yield $test => $params;
    }
});