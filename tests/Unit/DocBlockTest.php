<?php

use BeastBytes\CodPhp\Element\ClassElement;
use BeastBytes\CodPhp\Tests\Support\Files\Classes\TestClass;
use phpDocumentor\Reflection\DocBlock\Tags\Deprecated;
use phpDocumentor\Reflection\DocBlock\Tags\Since;
use phpDocumentor\Reflection\DocBlock\Tags\Version;

test('Description and Summary', function () {
    $element = new ClassElement(new ReflectionClass(TestClass::class));

    expect($element->elementType)->toBe('Class')
        ->and($element->name)->toBe('TestClass')
        ->and($element->hasDocBlock)->toBeTrue()
        ->and($element->hasSummary)->toBeTrue()
        ->and($element->summary)->toBe('A test class for CodPhp.')
        ->and($element->hasDescription)->toBeTrue()
        ->and($element->description)->toBe('A dummy class for testing CodPhp with class level tags.')
    ;
});

test('Class Tags', function () {
    $element = new ClassElement(new ReflectionClass(TestClass::class));

    expect($element->elementType)->toBe('Class')
        ->and($element->hasDocBlock)->toBeTrue()
        ->and($element->hasTag('since'))->toBeTrue()
        ->and((string) $element->since)->toBe('1.0.0')
        ->and($element->hasTag('version'))->toBeTrue()
        ->and((string) $element->version)->toBe('1.0.1')
        ->and($element->hasTag('deprecated'))->toBeTrue()
        ->and((string) $element->deprecationNotice)->toBe('99.0.99 Test deprecation notice')
    ;
});
