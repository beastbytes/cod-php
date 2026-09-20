<?php

use BeastBytes\CodPhp\Element\ClassElement;
use BeastBytes\CodPhp\Element\EnumElement;
use BeastBytes\CodPhp\Element\InterfaceElement;
use BeastBytes\CodPhp\Tests\Support\Files\Classes\TestClass;
use BeastBytes\CodPhp\Tests\Support\Files\Classes\TestClass2;
use BeastBytes\CodPhp\Tests\Support\Files\Classes\TestClass3;
use BeastBytes\CodPhp\Tests\Support\Files\Classes\TestClass4;
use BeastBytes\CodPhp\Tests\Support\Files\Classes\TestClass5;
use BeastBytes\CodPhp\Tests\Support\Files\Enums\TestBackedEnum;
use BeastBytes\CodPhp\Tests\Support\Files\Enums\TestUnitEnum;
use BeastBytes\CodPhp\Tests\Support\Files\Interfaces\TestInterface;

describe(InterfaceElement::class, function () {
    test('Interface Element', function (InterfaceElement $element, array $expected) {
        expect($element)->toBeInstanceOf(InterfaceElement::class)
            ->and(array_keys($element->implementedBy))->toBe($expected['implementedBy'])
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
    ];

    $interfaceElement = new InterfaceElement(new ReflectionClass(TestInterface::class));
    $interfaceElement::setElements($elements);

    yield 'Interface' => [
        'element' => $interfaceElement,
        'expected' => [
            'implementedBy' => [
                'BeastBytes\CodPhp\Tests\Support\Files\Classes\TestClass2',
                'BeastBytes\CodPhp\Tests\Support\Files\Classes\TestClass3',
            ],
        ]
    ];
});
