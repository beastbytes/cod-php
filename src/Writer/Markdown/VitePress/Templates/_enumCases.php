<?php

declare(strict_types=1);

use BeastBytes\CodPhp\Element\EnumElement;
use BeastBytes\CodPhp\Error\ErrorLevel;
use BeastBytes\CodPhp\Type\Language;
use BeastBytes\CodPhp\Writer\Writer;

/**
 * @var ?string $baseUrl
 * @var EnumElement $element
 * @var ErrorLevel $errorLevel
 * @var Language $language
 * @var string $namespace
 * @var Writer $this
 */

$md = '## Cases' . PHP_EOL . PHP_EOL;

if ($element->isBacked):
    $md .= '| Name | Value | Description |' . PHP_EOL;
    $md .= '|-|-|-|' . PHP_EOL;
    foreach ($element->cases as $case):
        $md .= sprintf(
            '| %s | %s | %s |' . PHP_EOL,
            $case->name,
            $case->value,
            $case->summary
        );
    endforeach;
else:
    $md .= '| Name | Description |' . PHP_EOL;
    $md .= '|-|-|' . PHP_EOL;
    foreach ($element->cases as $case):
        $md .= sprintf(
            '| %s | %s |' . PHP_EOL,
            $case->name,
            $case->summary
        );
    endforeach;
endif;

echo $md . PHP_EOL . '---' . PHP_EOL;