<?php

use BeastBytes\CodPhp\Writer\Markdown\Helpers;

test('Inline @link Tags', function (string $tagString, string $expected): void {
    expect(Helpers::sanitise($tagString))->toBe($expected);
})
    ->with('inline link tags')
;

dataset('inline link tags', function () {
    foreach ([
        'link' => [
            'tagString' => 'xxx {@link https://example.com} yyy',
            'expected' => 'xxx <a href="https://example.com" target="_blank">https://example.com</a> yyy'
        ],
        'link with description' => [
            'tagString' => 'xxx {@link https://example.com Inline Link Tag} yyy',
            'expected' => 'xxx <a href="https://example.com" target="_blank">Inline Link Tag</a> yyy'
        ],
        'links' => [
            'tagString' => 'xxx {@link https://example.com} yyy {@link https://example.com/tag} zzz',
            'expected' => 'xxx <a href="https://example.com" target="_blank">https://example.com</a> yyy <a href="https://example.com/tag" target="_blank">https://example.com/tag</a> zzz'
        ],
        'links with description' => [
            'tagString' => 'xxx {@link https://example.com Inline Link Tag} yyy {@link https://example.com/tag Another Inline Link Tag} zzz',
            'expected' => 'xxx <a href="https://example.com" target="_blank">Inline Link Tag</a> yyy <a href="https://example.com/tag" target="_blank">Another Inline Link Tag</a> zzz'
        ],
        'links, one with description' => [
            'tagString' => 'xxx {@link https://example.com Inline Link Tag} yyy {@link https://example.com/tag} zzz',
            'expected' => 'xxx <a href="https://example.com" target="_blank">Inline Link Tag</a> yyy <a href="https://example.com/tag" target="_blank">https://example.com/tag</a> zzz'
        ],
    ] as $test => $params) {
        yield $test => $params;
    }
});