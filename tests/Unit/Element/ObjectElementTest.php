<?php

use BeastBytes\CodPhp\Element\ClassConstantElement;
use BeastBytes\CodPhp\Element\ClassElement;
use BeastBytes\CodPhp\Element\Element;
use BeastBytes\CodPhp\Element\EnumElement;
use BeastBytes\CodPhp\Element\InterfaceElement;
use BeastBytes\CodPhp\Element\MethodElement;
use BeastBytes\CodPhp\Element\ObjectElement;
use BeastBytes\CodPhp\Element\TraitElement;
use BeastBytes\CodPhp\InheritanceLevel;
use BeastBytes\CodPhp\Tests\Support\Files\Classes\TestClass;
use BeastBytes\CodPhp\Tests\Support\Files\Classes\TestClass2;
use BeastBytes\CodPhp\Tests\Support\Files\Classes\TestClass3;
use BeastBytes\CodPhp\Tests\Support\Files\Classes\TestClass4;
use BeastBytes\CodPhp\Tests\Support\Files\Classes\TestClass5;
use BeastBytes\CodPhp\Tests\Support\Files\Enums\TestBackedEnum;
use BeastBytes\CodPhp\Tests\Support\Files\Interfaces\TestInterface;
use BeastBytes\CodPhp\Tests\Support\Files\Traits\TestTrait;

const ROOT_NAMESPACE = 'BeastBytes\\CodPhp\\Tests';

describe(ObjectElement::class, function () {
    test('Object Element type and name', function (ObjectElement $element, array $expected): void {
        expect($element)->toBeInstanceOf(ObjectElement::class)
            ->and($element)->toBeInstanceOf(Element::class)
            ->and($element->fqcn)->toBe($expected['fqcn'])
            ->and($element->name)->toBe($expected['name'])
            ->and($element->namespace)->toBe($expected['namespace'])
        ;
    })
        ->with('elements')
    ;

    test('Object Element Constants', function (ObjectElement $element, array $expected): void {
        expect($element->hasConstants)->toBe($expected['hasConstants'])
            ->and($element->constants)->toBeElements(($expected['constants']), ClassConstantElement::class);
        ;
    })
        ->with('elements')
    ;

    test('Object Element Methods', function (ObjectElement $element, array $expected): void {
        expect($element->hasMethods)->toBe($expected['hasMethods'])
            ->and($element->methods)->toBeElements($expected['methods'], MethodElement::class);
        ;
    })
        ->with('elements')
    ;

    test('Object Element Interfaces', function (ObjectElement $element, array $expected): void {
        expect($element->implementsInterfaces)->toBe($expected['implementsInterfaces'])
            ->and($element->interfaces)->toBeElements($expected['interfaces'], InterfaceElement::class)
        ;
    })
        ->with('elements')
    ;

    test('Object Element Traits', function (ObjectElement $element, array $expected): void {
        expect($element->usesTraits)->toBe($expected['usesTraits'])
            ->and($element->traits)->toBeElements($expected['traits'], TraitElement::class)
        ;
    })
        ->with('elements')
    ;

    test('Object Element inheritance', function (ObjectElement $element, array $expected): void {
        expect($element->hasAncestors)->toBe($expected['hasAncestors'])
            ->and($element->ancestors)->toBeElements($expected['ancestors'])
            ->and($element->hasSubclasses)->toBe($expected['hasSubclasses'])
            ->and($element->subclasses)->toBeElements($expected['subclasses'])
        ;
    })
        ->with('elements')
    ;

    test('Object Element pathTo another element', function (ObjectElement $element, array $expected): void {
        expect($element->pathTo(
            new EnumElement(new ReflectionClass(TestBackedEnum::class))
        ))->toBe($expected['pathTo']);
    })
        ->with('elements')
    ;

    test('Object Element - Method and Property tags', function (ObjectElement $element, array $expected): void {
        expect($element->canHaveMethodTag)->toBe($expected['canHaveMethodTag'])
            ->and($element->canHavePropertyTag)->toBe($expected['canHavePropertyTag']);

    })
        ->with('elements')
    ;
});

dataset('elements', function () {
    foreach ([
        'TestClass' => [
            'element' => new ClassElement(new ReflectionClass(TestClass::class)),
            'expected' => [
                'fqcn' => TestClass::class,
                'name' => 'TestClass',
                'namespace' => 'BeastBytes\CodPhp\Tests\Support\Files\Classes',
                'hasConstants' => true,
                'constants' => ['BAR', 'FOO'],
                'hasMethods' => true,
                'methods' => ['method1', 'method3', 'method5'],
                'implementsInterfaces' => false,
                'interfaces' => [],
                'hasAncestors' => false,
                'ancestors' => [],
                'inheritance' => [],
                'hasSubclasses' => false,
                'subclasses' => [],
                'usesTraits' => false,
                'traits' => [],
                'pathTo' => '../Enums/TestBackedEnum',
                'canHaveMethodTag' => true,
                'canHavePropertyTag' => true,
            ]
        ],
        'TestClass2' => [
            'element' => new ClassElement(new ReflectionClass(TestClass2::class)),
            'expected' => [
                'fqcn' => TestClass2::class,
                'name' => 'TestClass2',
                'namespace' => 'BeastBytes\CodPhp\Tests\Support\Files\Classes',
                'hasConstants' => false,
                'constants' => [],
                'hasMethods' => true,
                'methods' => ['__construct', 'add', 'subtract', 'multiply', 'divide', 'setter'],
                'implementsInterfaces' => true,
                'interfaces' => [TestInterface::class],
                'hasAncestors' => true,
                'ancestors' => [TestClass3::class, TestClass4::class],
                'inheritance' => [],
                'hasSubclasses' => false,
                'subclasses' => [],
                'usesTraits' => false,
                'traits' => [],
                'pathTo' => '../Enums/TestBackedEnum',
                'canHaveMethodTag' => true,
                'canHavePropertyTag' => true,
            ]
        ],
        'TestClass3' => [
            'element' => new ClassElement(new ReflectionClass(TestClass3::class)),
            'expected' => [
                'fqcn' => TestClass3::class,
                'name' => 'TestClass3',
                'namespace' => 'BeastBytes\CodPhp\Tests\Support\Files\Classes',
                'hasConstants' => false,
                'constants' => [],
                'hasMethods' => false,
                'methods' => [],
                'implementsInterfaces' => true,
                'interfaces' => [TestInterface::class],
                'hasAncestors' => true,
                'ancestors' => [TestClass4::class],
                'inheritance' => [],
                'hasSubclasses' => true,
                'subclasses' => [TestClass2::class],
                'usesTraits' => true,
                'traits' => [TestTrait::class],
                'pathTo' => '../Enums/TestBackedEnum',
                'canHaveMethodTag' => true,
                'canHavePropertyTag' => true,
            ]
        ],
        'TestClass4' => [
            'element' => new ClassElement(new ReflectionClass(TestClass4::class)),
            'expected' => [
                'fqcn' => TestClass4::class,
                'name' => 'TestClass4',
                'namespace' => 'BeastBytes\CodPhp\Tests\Support\Files\Classes',
                'hasConstants' => false,
                'constants' => [],
                'hasMethods' => false,
                'methods' => [],
                'implementsInterfaces' => false,
                'interfaces' => [],
                'hasAncestors' => false,
                'ancestors' => [],
                'inheritance' => [],
                'hasSubclasses' => true,
                'subclasses' => [TestClass3::class, TestClass2::class],
                'usesTraits' => false,
                'traits' => [],
                'pathTo' => '../Enums/TestBackedEnum',
                'canHaveMethodTag' => true,
                'canHavePropertyTag' => true,
            ]
        ],
         'TestClass5' => [
             'element' => new ClassElement(new ReflectionClass(TestClass5::class)),
             'expected' => [
                 'fqcn' => TestClass5::class,
                 'name' => 'TestClass5',
                 'namespace' => 'BeastBytes\CodPhp\Tests\Support\Files\Classes',
                 'hasConstants' => true,
                 'constants' => ['ARRAY', 'FALSE', 'FLOAT', 'INTEGER', 'STRING', 'TRUE'],
                 'hasMethods' => false,
                 'methods' => [],
                 'implementsInterfaces' => false,
                 'interfaces' => [],
                 'hasAncestors' => false,
                 'ancestors' => [],
                 'inheritance' => [],
                 'hasSubclasses' => false,
                 'subclasses' => [],
                 'usesTraits' => true,
                 'traits' => [TestTrait::class],
                 'pathTo' => '../Enums/TestBackedEnum',
                 'canHaveMethodTag' => true,
                 'canHavePropertyTag' => true,
             ]
         ],
         'TestInterface' => [
            'element' => new InterfaceElement(new ReflectionClass(TestInterface::class)),
            'expected' => [
                'fqcn' => TestInterface::class,
                'name' => 'TestInterface',
                'namespace' => 'BeastBytes\CodPhp\Tests\Support\Files\Interfaces',
                'hasConstants' => false,
                'constants' => [],
                'hasMethods' => false,
                'methods' => [],
                'implementsInterfaces' => false,
                'interfaces' => [],
                'hasAncestors' => false,
                'ancestors' => [],
                'inheritance' => [],
                'hasSubclasses' => false,
                'subclasses' => [],
                'usesTraits' => false,
                'traits' => [],
                'pathTo' => '../Enums/TestBackedEnum',
                'canHaveMethodTag' => false,
                'canHavePropertyTag' => false,
            ]
        ]
    ] as $test => $params) {
        $params['element']->setElements(elements());
        $params['element']->inheritanceLevel = InheritanceLevel::Namespace;
        $params['element']->rootNamespace = ROOT_NAMESPACE;
        yield $test => $params;
    }
});