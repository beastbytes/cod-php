<?php

use BeastBytes\CodPhp\Element\ClassConstantElement;
use BeastBytes\CodPhp\Tests\Support\Files\Classes\TestClass5;

describe(ClassConstantElement::class, function () {
    test('u', function (ClassConstantElement $element, array $expected) {
        expect($element)->toBeInstanceOf(ClassConstantElement::class)
            ->and($element->value)->toBe($expected['value'])
        ;
    })
        ->with('elements')
    ;
});

dataset('elements', function () {
    $ssalc = new ReflectionClass(TestClass5::class);

    foreach ([
        'bool false' => [
            'element' => new ClassConstantElement($ssalc->getReflectionConstant('FALSE')),
            'expected' => [
                'value' => 'false',
            ]
        ],
        'bool true' => [
            'element' => new ClassConstantElement($ssalc->getReflectionConstant('TRUE')),
            'expected' => [
                'value' => 'true',
            ]
        ],
        'float' => [
            'element' => new ClassConstantElement($ssalc->getReflectionConstant('FLOAT')),
            'expected' => [
                'value' => '1.23',
            ]
        ],
        'integer' => [
            'element' => new ClassConstantElement($ssalc->getReflectionConstant('INTEGER')),
            'expected' => [
                'value' => '10',
            ]
        ],
        'string' => [
            'element' => new ClassConstantElement($ssalc->getReflectionConstant('STRING')),
            'expected' => [
                'value' => "'string'",
            ]
        ],
        'array' => [
            'element' => new ClassConstantElement($ssalc->getReflectionConstant('ARRAY')),
            'expected' => [
                'value' => '[1, 2, 3]',
            ]
        ]
    ] as $test => $params) {
        yield $test => $params;
    }
});