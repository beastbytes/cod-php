<?php

declare(strict_types=1);

use BeastBytes\CodPhp\Element\ObjectElement;
use BeastBytes\CodPhp\Error\Collection as ErrorCollection;
use BeastBytes\CodPhp\Error\ErrorLevel;
use BeastBytes\CodPhp\Writer\Markdown\Helpers;
use BeastBytes\CodPhp\Writer\Writer;

/**
 * @var ?string $baseUrl
 * @var ObjectElement $element
 * @var string $namespace
 * @var ErrorLevel $errorLevel
 * @var Writer $this
 */

$md = sprintf(
    '# %s%s `%s`' . PHP_EOL . PHP_EOL,
    $element->elementType === 'Class' ? Helpers::modifiers($element) : '',
    strtolower($element->elementType),
    $element->name
);

if (is_string($baseUrl)):
    $md .= Helpers::sourceLink($baseUrl, $element) . PHP_EOL . PHP_EOL;
endif;

if ($element->hasSummary):
    $md .= $element->summary . PHP_EOL . PHP_EOL;
    $md .= $element->description . PHP_EOL . PHP_EOL;
else:
    $md .= Helpers::error(
        ErrorCollection::addError('No Summary', $element),
        $errorLevel
    );
endif;

if ($element->hasDescription):
    $md .= $element->description . PHP_EOL . PHP_EOL;
else:
    $md .= Helpers::error(
        ErrorCollection::addWarning('No Description', $element),
        $errorLevel
    );
endif;

$md .= $this->render('_since_version', compact('element'));

echo $md;