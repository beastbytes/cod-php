<?php

use BeastBytes\CodPhp\Element\ClassElement;
use BeastBytes\CodPhp\Error\Collection;
use BeastBytes\CodPhp\Error\Error;
use BeastBytes\CodPhp\Error\ErrorLevel;
use BeastBytes\CodPhp\Tests\Support\Files\Classes\TestClass;
use BeastBytes\CodPhp\Tests\Support\Files\Classes\TestClass2;
use BeastBytes\CodPhp\Tests\Support\Files\Classes\TestClass3;
use BeastBytes\CodPhp\Tests\Support\Files\Classes\TestClass4;

beforeEach(function () {
    Collection::clear();
});

test('Collection addError', function () {
    $error = Collection::addError(
        'Test Error',
        new ClassElement(new ReflectionClass(TestClass::class))
    );

    expect(Collection::hasErrors())->toBeTrue()
        ->and(Collection::getErrors())->toBeArray()
        ->and(Collection::getErrors())->toBe(['Error' => [$error]])
        ->and(Collection::hasErrors(ErrorLevel::Error))->toBeTrue()
        ->and(Collection::getErrors(ErrorLevel::Error))->toBe([$error])
        ->and(Collection::hasErrors(ErrorLevel::Warning))->toBeFalse()
        ->and(Collection::getErrors(ErrorLevel::Warning))->toBe([])
        ->and(Collection::hasErrors(ErrorLevel::Notice))->toBeFalse()
        ->and(Collection::getErrors(ErrorLevel::Notice))->toBe([])
        ->and($error)->toBeInstanceOf(Error::class)
        ->and($error->message)->toBe('Test Error')
        ->and($error->level)->toBe(ErrorLevel::Error)
    ;
});

test('Collection addWarning', function () {
    $error = Collection::addWarning(
        'Test Warning',
        new ClassElement(new ReflectionClass(TestClass::class))
    );

    expect(Collection::hasErrors())->toBeTrue()
        ->and(Collection::getErrors())->toBeArray()
        ->and(Collection::getErrors())->toBe(['Warning' => [$error]])
        ->and(Collection::hasErrors(ErrorLevel::Error))->toBeFalse()
        ->and(Collection::getErrors(ErrorLevel::Error))->toBe([])
        ->and(Collection::hasErrors(ErrorLevel::Warning))->toBeTrue()
        ->and(Collection::getErrors(ErrorLevel::Warning))->toBe([$error])
        ->and(Collection::hasErrors(ErrorLevel::Notice))->toBeFalse()
        ->and(Collection::getErrors(ErrorLevel::Notice))->toBe([])
        ->and($error)->toBeInstanceOf(Error::class)
        ->and($error->message)->toBe('Test Warning')
        ->and($error->level)->toBe(ErrorLevel::Warning)
    ;
});

test('Collection addNotice', function () {
    $error = Collection::addNotice(
        'Test Notice',
        new ClassElement(new ReflectionClass(TestClass::class))
    );

    expect(Collection::hasErrors())->toBeTrue()
        ->and(Collection::getErrors())->toBeArray()
        ->and(Collection::getErrors())->toBe(['Notice' => [$error]])
        ->and(Collection::hasErrors(ErrorLevel::Error))->toBeFalse()
        ->and(Collection::getErrors(ErrorLevel::Error))->toBe([])
        ->and(Collection::hasErrors(ErrorLevel::Warning))->toBeFalse()
        ->and(Collection::getErrors(ErrorLevel::Warning))->toBe([])
        ->and(Collection::hasErrors(ErrorLevel::Notice))->toBeTrue()
        ->and(Collection::getErrors(ErrorLevel::Notice))->toBe([$error])
        ->and($error)->toBeInstanceOf(Error::class)
        ->and($error->message)->toBe('Test Notice')
        ->and($error->level)->toBe(ErrorLevel::Notice)
    ;
});

test('Collection add multiple errors', function () {
    $error = Collection::addError(
        'Test Error',
        new ClassElement(new ReflectionClass(TestClass::class))
    );
    $error1 = Collection::addError(
        'Test Error 1',
        new ClassElement(new ReflectionClass(TestClass::class))
    );
    $warning = Collection::addWarning(
        'Test Warning',
        new ClassElement(new ReflectionClass(TestClass::class))
    );
    $notice = Collection::addNotice(
        'Test Notice',
        new ClassElement(new ReflectionClass(TestClass::class))
    );

    expect(Collection::hasErrors())->toBeTrue()
        ->and(Collection::getErrors())->toBeArray()
        ->and(Collection::getErrors())->toBe([
            'Error' => [$error, $error1],
            'Warning' => [$warning],
            'Notice' => [$notice]
        ])
        ->and(Collection::hasErrors(ErrorLevel::Error))->toBeTrue()
        ->and(Collection::getErrors(ErrorLevel::Error))->toBe([$error, $error1])
        ->and(Collection::hasErrors(ErrorLevel::Warning))->toBeTrue()
        ->and(Collection::getErrors(ErrorLevel::Warning))->toBe([$warning])
        ->and(Collection::hasErrors(ErrorLevel::Notice))->toBeTrue()
        ->and(Collection::getErrors(ErrorLevel::Notice))->toBe([$notice])
        ->and($error)->toBeInstanceOf(Error::class)
        ->and($error->message)->toBe('Test Error')
        ->and($error->level)->toBe(ErrorLevel::Error)
        ->and($error1)->toBeInstanceOf(Error::class)
        ->and($error1->message)->toBe('Test Error 1')
        ->and($error1->level)->toBe(ErrorLevel::Error)
        ->and($warning)->toBeInstanceOf(Error::class)
        ->and($warning->message)->toBe('Test Warning')
        ->and($warning->level)->toBe(ErrorLevel::Warning)
        ->and($notice)->toBeInstanceOf(Error::class)
        ->and($notice->message)->toBe('Test Notice')
        ->and($notice->level)->toBe(ErrorLevel::Notice)
    ;
});

test('Collection asJson', function () {
    Collection::addError(
        'Test Error',
        new ClassElement(new ReflectionClass(TestClass::class))
    );
    Collection::addError(
        'Test Error 1',
        new ClassElement(new ReflectionClass(TestClass2::class))
    );
    Collection::addWarning(
        'Test Warning',
        new ClassElement(new ReflectionClass(TestClass3::class))
    );
    Collection::addNotice(
        'Test Notice',
        new ClassElement(new ReflectionClass(TestClass4::class))
    );

    expect(Collection::asJson())->toBe(
        '{'
            . '"summary":{'
                . '"Error":2,'
                . '"Warning":1,'
                . '"Notice":1'
            . '},'
            . '"details":{'
                . '"Error":['
                    . '{'
                        . '"level":"Error",'
                        . '"message":"Test Error",'
                        . '"element-type":"Class",'
                        . '"element-name":"TestClass",'
                        . '"fqcn":"' . str_replace('\\', '\\\\', TestClass::class) . '",'
                        . '"context":[]'
                    . '},'
                    . '{'
                        . '"level":"Error",'
                        . '"message":"Test Error 1",'
                        . '"element-type":"Class",'
                        . '"element-name":"TestClass2",'
                        . '"fqcn":"' . str_replace('\\', '\\\\', TestClass2::class) . '",'
                        . '"context":[]'
                    . '}'
                . '],'
                . '"Warning":['
                    . '{'
                        . '"level":"Warning",'
                        . '"message":"Test Warning",'
                        . '"element-type":"Class",'
                        . '"element-name":"TestClass3",'
                        . '"fqcn":"' . str_replace('\\', '\\\\', TestClass3::class) . '",'
                        . '"context":[]'
                    . '}'
                . '],'
                . '"Notice":['
                    . '{'
                        . '"level":"Notice",'
                        . '"message":"Test Notice",'
                        . '"element-type":"Class",'
                        . '"element-name":"TestClass4",'
                        . '"fqcn":"' . str_replace('\\', '\\\\', TestClass4::class) . '",'
                        . '"context":[]'
                    . '}'
                . ']'
            . '}'
        . '}'
    );
});
