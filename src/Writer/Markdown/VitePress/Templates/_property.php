<?php

declare(strict_types=1);

use BeastBytes\CodPhp\Element\ClassElement;
use BeastBytes\CodPhp\Element\PropertyElement;
use BeastBytes\CodPhp\Element\TraitElement;
use BeastBytes\CodPhp\Error\Collection as ErrorCollection;
use BeastBytes\CodPhp\Error\ErrorLevel;
use BeastBytes\CodPhp\Type\Language;
use BeastBytes\CodPhp\Writer\Markdown\Helpers;
use BeastBytes\CodPhp\Writer\Writer;

/**
 * @var ?string $baseUrl
 * @var ClassElement|TraitElement $element
 * @var ErrorLevel $errorLevel
 * @var Language $language
 * @var string $namespace
 * @var PropertyElement $property
 * @var Writer $this
 */

$md = sprintf('### $%s' . PHP_EOL , $property->name);

if ($property->hasDescription):
    $md .= $property->description . PHP_EOL . PHP_EOL;
else:
    $md .= Helpers::error(
        ErrorCollection::addWarning('No Description', $property, ['parent' => $element->fqcn]),
        $errorLevel
    );
endif;

if ($property->hasTag('version')):
    $md .= '**Version:** ' . $property->version . PHP_EOL . PHP_EOL;
endif;

if ($property->hasTag('since')):
    $md .= '**Since:** ' . $property->since . PHP_EOL . PHP_EOL;
endif;

if ($property->hasTag('deprecated')):
    $md .= Helpers::deprecationNotice($property);
endif;

$md .= '| Type | Read/Write | Default |' . PHP_EOL;
$md .= '|-|:-:|-|' . PHP_EOL;

$accessibility = [
    $property->canBeRead ? 'Read' : '',
    $property->canBeWritten ? 'Write' : '',
];

$md .= sprintf(
    '| %s | %s | %s |' . PHP_EOL . PHP_EOL,
    str_replace('|', '\\|', Helpers::type($property->type, $element, $language)),
    trim(implode('/', $accessibility), '/'),
    $property->hasDefaultValue ? $property->defaultValue : ''
);

$md .= sprintf('Declared in %s' . PHP_EOL . PHP_EOL, Helpers::linkElements($element, $property->declaringClass));
$links = $this->render('_links', ['element' => $property]);

if (!empty($links)):
    $md .= sprintf('#### Related' . PHP_EOL . PHP_EOL . '%s', $links);
endif;

echo $md . '---' . PHP_EOL . PHP_EOL;