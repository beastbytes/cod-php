<?php

declare(strict_types=1);

use BeastBytes\CodPhp\Element\ObjectElement;
use BeastBytes\CodPhp\Error\ErrorLevel;
use BeastBytes\CodPhp\Type\Language;
use BeastBytes\CodPhp\Writer\Markdown\Helpers;
use BeastBytes\CodPhp\Writer\Writer;

/**
 * @var ?string $baseUrl
 * @var ObjectElement $element
 * @var ErrorLevel $errorLevel
 * @var Language $language
 * @var string $namespace
 * @var Writer $this
 */

$md = '';

if ($element->hasConstants):
    $md = '## Constants' . PHP_EOL . PHP_EOL;
    $md .= '| Name | Value | Description | Defined In |' . PHP_EOL;
    $md .= '|-|-|-|-|' . PHP_EOL;

    foreach ($element->constants as $constant):
        $md .= sprintf(
            '| %s | %s | %s | %s |' . PHP_EOL,
            $constant->name,
            str_replace('|', '\\|', $constant->value),
            $constant->summary,
            Helpers::linkElements($element, $constant->declaringClass)
        );
    endforeach;
endif;

echo $md . PHP_EOL;