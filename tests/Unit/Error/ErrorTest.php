<?php

use BeastBytes\CodPhp\Element\ClassElement;
use BeastBytes\CodPhp\Error\Error;
use BeastBytes\CodPhp\Error\ErrorLevel;
use BeastBytes\CodPhp\Tests\Support\Files\Classes\TestClass;

test('Error', function () {
    $error = new Error(
        'Test error',
        new ClassElement(new ReflectionClass(TestClass::class)),
        ErrorLevel::Error,
        []
    );

    expect($error)->toBeInstanceOf(Error::class)
        ->and($error->message)->toBe('Test error')
        ->and($error->element)->toBeInstanceOf(ClassElement::class)
        ->and($error->level)->toBe(ErrorLevel::Error)
        ->and($error->context)->toBeArray()
        ->and($error->context)->toBe([])
    ;
});
