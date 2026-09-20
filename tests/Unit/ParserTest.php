<?php

use BeastBytes\CodPhp\Element\ClassElement;
use BeastBytes\CodPhp\Element\EnumElement;
use BeastBytes\CodPhp\Element\InterfaceElement;
use BeastBytes\CodPhp\Element\TraitElement;
use BeastBytes\CodPhp\Parser;
use BeastBytes\CodPhp\Tests\Support\Files\Classes\TestClass;
use BeastBytes\CodPhp\Tests\Support\Files\Classes\TestClass2;
use BeastBytes\CodPhp\Tests\Support\Files\Enums\TestBackedEnum;
use BeastBytes\CodPhp\Tests\Support\Files\Interfaces\TestInterface;
use BeastBytes\CodPhp\Tests\Support\Files\Traits\TestTrait;

test('Parser', function () {
    $files = [
        __DIR__ . '/../Support/Files/TestFile.php',
        __DIR__ . '/../Support/Files/Classes/TestClass2.php',
        __DIR__ . '/../Support/Files/Classes/TestClass.php',
        __DIR__ . '/../Support/Files/Enums/TestBackedEnum.php',
        __DIR__ . '/../Support/Files/Interfaces/TestInterface.php',
        __DIR__ . '/../Support/Files/Traits/TestTrait.php',
    ];

    $elements = Parser::parse($files);

    expect($elements)->toBeArray()
        ->and($elements)->toHaveCount(5)
        ->and($elements)->not->toHaveKey('BeastBytes\\CodPhp\\Tests\\Support\\Files\\TestFile')
        ->and($elements)->toHaveKey(TestClass::class)
        ->and($elements[TestClass::class])->toBeInstanceOf(ClassElement::class)
        ->and($elements)->toHaveKey(TestClass2::class)
        ->and($elements[TestClass2::class])->toBeInstanceOf(ClassElement::class)
        ->and($elements)->toHaveKey(TestBackedEnum::class)
        ->and($elements[TestBackedEnum::class])->toBeInstanceOf(EnumElement::class)
        ->and($elements)->toHaveKey(TestInterface::class)
        ->and($elements[TestInterface::class])->toBeInstanceOf(InterfaceElement::class)
        ->and($elements)->toHaveKey(TestTrait::class)
        ->and($elements[TestTrait::class])->toBeInstanceOf(TraitElement::class)
    ;
});
