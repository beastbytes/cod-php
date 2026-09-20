<?php

use BeastBytes\CodPhp\Config;

test('Config', function () {
    $config = new Config();

    expect($config)->toBeInstanceOf(Config::class)
        ->and($config->has('key'))->toBeFalse()
        ->and($config->get('key'))->toBeNull()
        ->and($config->get('key', 'default'))->toBe('default')
    ;

    $config = $config->set('key', 'value');

    expect($config)->toBeInstanceOf(Config::class)
        ->and($config->has('key'))->toBeTrue()
        ->and($config->get('key'))->toBe('value')
        ->and($config->get('key', 'default'))->toBe('value')
    ;
});

test('Config file', function () {
    $config = new Config(__DIR__ . '/../Support/cod-php.php');

    expect($config)->toBeInstanceOf(Config::class)
        ->and($config->has('key'))->toBeTrue()
        ->and($config->has('key2'))->toBeTrue()
        ->and($config->has('key3'))->toBeTrue()
        ->and($config->has('key4'))->toBeFalse()
        ->and($config->get('key'))->toBe('value')
        ->and($config->get('key2'))->toBe('value2')
        ->and($config->get('key3'))->toBe('value3')
    ;
});

test('Config as Array', function () {
    $config = new Config()
        ->set('key', 'value')
        ->set('key2', 'value2')
        ->set('key3', null)
    ;

    expect($config->asArray())->toBeArray()
        ->and($config->asArray())->toBe(['key' => 'value', 'key2' => 'value2'])
    ;
});

test('Merge Config', function () {
    $config = new Config()
        ->set('key', 'value')
        ->set('key2', 'value2')
        ->set('key3', 'value3')
    ;

    $config2 = new Config()
        ->set('key', 'newValue')
        ->set('key4', 'value4')
        ->set('key5', null)
    ;

    expect($config->has('key'))->toBeTrue()
        ->and($config->has('key2'))->toBeTrue()
        ->and($config->has('key3'))->toBeTrue()
        ->and($config->has('key4'))->toBeFalse()
        ->and($config->has('key5'))->toBeFalse()
        ->and($config->get('key'))->toBe('value')
        ->and($config->get('key2'))->toBe('value2')
        ->and($config->get('key3'))->toBe('value3')
    ;

    $config->merge($config2);

    expect($config->has('key'))->toBeTrue()
        ->and($config->has('key2'))->toBeTrue()
        ->and($config->has('key3'))->toBeTrue()
        ->and($config->has('key4'))->toBeTrue()
        ->and($config->has('key5'))->toBeFalse()
        ->and($config->get('key'))->toBe('newValue')
        ->and($config->get('key2'))->toBe('value2')
        ->and($config->get('key3'))->toBe('value3')
        ->and($config->get('key4'))->toBe('value4')
    ;
});
