<?php

use BeastBytes\CodPhp\Element\ClassElement;
use BeastBytes\CodPhp\Element\Element;
use BeastBytes\CodPhp\Tests\Support\Files\Classes\TestClass;
use BeastBytes\CodPhp\Tests\Support\Files\Classes\TestClass2;
use BeastBytes\CodPhp\Tests\Support\Files\Classes\TestClass3;
use BeastBytes\CodPhp\Tests\Support\Files\Classes\TestClass4;
use BeastBytes\CodPhp\Tests\Support\Files\Classes\TestClass5;

describe(Element::class, function () {
    test('Element type and name', function (Element $element, array $expected): void {
        expect($element)->toBeInstanceOf(Element::class)
            ->and($element->elementType)->toBe($expected['elementType'])
            ->and($element->name)->toBe($expected['name']);
        ;
    })
        ->with('elements')
    ;

    test('DocBlock and Tags', function (Element $element, array $expected) {
        expect($element->hasDocBlock)->toBe($expected['hasDocBlock'])
            ->and($element->isInApi)->toBe($expected['isInApi'])
            ->and($element->hasTag('api'))->toBe($expected['hasTag']['api'])
            ->and($element->hasTag('deprecated'))->toBe($expected['hasTag']['deprecated'])
            ->and($element->hasTag('link'))->toBe($expected['hasTag']['link'])
            ->and($element->hasTag('see'))->toBe($expected['hasTag']['see'])
            ->and($element->hasTag('since'))->toBe($expected['hasTag']['since'])
            ->and($element->hasTag('version'))->toBe($expected['hasTag']['version'])
            ->and($element->description)->toBe($expected['description'])
            ->and($element->deprecationNotice)->toBe($expected['deprecationNotice'])
            ->and($element->summary)->toBe($expected['summary'])
            ->and($element->since)->toBe($expected['since'])
            ->and($element->version)->toBe($expected['version'])

        ;
    })
        ->with('elements')
    ;
});

dataset('elements', function () {
    foreach ([
         'TestClass' => [
             'element' => new ClassElement(new ReflectionClass(TestClass::class)),
             'expected' => [
                 'elementType' => 'Class',
                 'name' => 'TestClass',
                 'isInApi' => true,
                 'hasDocBlock' => true,
                 'hasTag' => [
                     'api' => false,
                     'copyright' => true,
                     'deprecated' => true,
                     'ignore' => false,
                     'internal' => false,
                     'link' => true,
                     'see' => true,
                     'since' => true,
                     'version' => true,
                 ],
                 'copyright' => '2026 BeastBytes',
                 'description' => 'A dummy class for testing CodPhp with class level tags.',
                 'deprecationNotice' => '99.0.99 Test deprecation notice',
                 'summary' => 'A test class for CodPhp.',
                 'since' => '1.0.0',
                 'version' => '1.0.1',
             ]
         ],
         'TestClass2' => [
             'element' => new ClassElement(new ReflectionClass(TestClass2::class)),
             'expected' => [
                 'elementType' => 'Class',
                 'name' => 'TestClass2',
                 'isInApi' => true,
                 'hasDocBlock' => false,
                 'hasTag' => [
                     'api' => false,
                     'copyright' => false,
                     'deprecated' => false,
                     'ignore' => false,
                     'internal' => false,
                     'link' => false,
                     'see' => false,
                     'since' => false,
                     'version' => false,
                 ],
                 'copyright' => null,
                 'description' => null,
                 'deprecationNotice' => null,
                 'summary' => null,
                 'since' => null,
                 'version' => null,
             ]
         ],
         'TestClass3' => [
             'element' => new ClassElement(new ReflectionClass(TestClass3::class)),
             'expected' => [
                 'elementType' => 'Class',
                 'name' => 'TestClass3',
                 'isInApi' => true,
                 'hasDocBlock' => true,
                 'hasTag' => [
                     'api' => true,
                     'copyright' => false,
                     'deprecated' => false,
                     'ignore' => false,
                     'internal' => false,
                     'link' => false,
                     'see' => false,
                     'since' => false,
                     'version' => false,
                 ],
                 'copyright' => null,
                 'description' => null,
                 'deprecationNotice' => null,
                 'summary' => null,
                 'since' => null,
                 'version' => null,
             ]
         ],
         'TestClass4' => [
             'element' => new ClassElement(new ReflectionClass(TestClass4::class)),
             'expected' => [
                 'elementType' => 'Class',
                 'name' => 'TestClass4',
                 'isInApi' => false,
                 'hasDocBlock' => true,
                 'hasTag' => [
                     'api' => false,
                     'copyright' => false,
                     'deprecated' => false,
                     'ignore' => true,
                     'internal' => false,
                     'link' => false,
                     'see' => false,
                     'since' => false,
                     'version' => false,
                 ],
                 'copyright' => null,
                 'description' => null,
                 'deprecationNotice' => null,
                 'summary' => null,
                 'since' => null,
                 'version' => null,
             ]
         ],

         'TestClass5' => [
             'element' => new ClassElement(new ReflectionClass(TestClass5::class)),
             'expected' => [
                 'elementType' => 'Class',
                 'name' => 'TestClass5',
                 'isInApi' => false,
                 'hasDocBlock' => true,
                 'hasTag' => [
                     'api' => false,
                     'deprecated' => false,
                     'ignore' => false,
                     'internal' => true,
                     'link' => false,
                     'see' => false,
                     'since' => false,
                     'version' => false,
                 ],
                 'copyright' => null,
                 'description' => null,
                 'deprecationNotice' => null,
                 'summary' => null,
                 'since' => null,
                 'version' => null,
             ]
         ],
    ] as $test => $params) {
        yield $test => $params;
    }
});