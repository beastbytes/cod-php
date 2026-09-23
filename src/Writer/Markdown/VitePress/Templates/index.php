<?php

declare(strict_types=1);

use BeastBytes\CodPhp\Element\ClassElement;
use BeastBytes\CodPhp\Element\EnumElement;
use BeastBytes\CodPhp\Element\InterfaceElement;
use BeastBytes\CodPhp\Element\TraitElement;
use BeastBytes\CodPhp\Error\ErrorLevel;
use BeastBytes\CodPhp\Type\Language;
use BeastBytes\CodPhp\Writer\Markdown\Helpers;
use BeastBytes\CodPhp\Writer\Writer;

/**
 * @var ?string $baseUrl
 * @var ClassElement[] $classes
 * @var EnumElement[] $enums
 * @var ErrorLevel $errorLevel
 * @var InterfaceElement[] $interfaces
 * @var Language $language
 * @var string $namespace
 * @var TraitElement[] $traits
 * @var Writer $this
 */

$md = sprintf('# Index for %s' . PHP_EOL . PHP_EOL, $namespace);

foreach ([$classes, $interfaces, $traits, $enums] as $elements):
    $md .= sprintf(
        '## %s%s' . PHP_EOL . PHP_EOL,
        $elements[0]->elementType,
        $elements[0] instanceof ClassElement ? 'es' : 's'
    );

    $md .= sprintf('| %s | Description |' . PHP_EOL, $elements[0]->elementType);
    $md .= '|-|-|' . PHP_EOL;
    foreach ($elements as $element):
        $md .= sprintf(
            '| %s | %s |' . PHP_EOL,
            Helpers::linkElements($namespace, $element),
            $element->hasSummary ? Helpers::sanitise($element->summary, true) : ''
        );
    endforeach;

    $md .= PHP_EOL;
endforeach;

echo $md . '---' . PHP_EOL . PHP_EOL;