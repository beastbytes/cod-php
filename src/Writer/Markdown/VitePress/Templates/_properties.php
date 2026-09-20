<?php

declare(strict_types=1);

use BeastBytes\CodPhp\Element\ClassElement;
use BeastBytes\CodPhp\Element\TraitElement;
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
 * @var Writer $this
 */

$md = '';
$properties = [];

if ($element->hasProperties):
    $md .= '## Properties' . PHP_EOL . PHP_EOL;

    foreach ($element->properties as $property):
        $properties[] = $property->name;

        $md .= $this->render(
            '_property',
            compact('baseUrl', 'element', 'property', 'namespace', 'errorLevel', 'language')
        );

        $md .= PHP_EOL . PHP_EOL;
    endforeach;
endif;

if ($element->canHavePropertyTag):
    if ($element->hasTag('property')):
        $md .= '### Overloaded Properties' . PHP_EOL . PHP_EOL;
        $md .= '| Property | Description |' . PHP_EOL;
        $md .= '|-|-|' . PHP_EOL;

        foreach ($element->propertyTags as $propertyTag):
            if (in_array($propertyTag->getName(), $properties, true)):
                continue; // don't document concrete properties
            endif;

            $md .= sprintf(
                '| <span class="type">%s</span> $%s | %s |',
                str_replace('|', '\\|', Helpers::type($propertyTag->getType(), $element, $language)),
                $propertyTag->getVariableName(),
                $propertyTag->getDescription()
            );
        endforeach;

        $md .= PHP_EOL . PHP_EOL;
    endif;

    if ($element->hasTag('property-read')):
        $md .= '### Overloaded Read Properties' . PHP_EOL . PHP_EOL;
        $md .= '| Property | Description |' . PHP_EOL;
        $md .= '|-|-|' . PHP_EOL;

        foreach ($element->propertyReadTags as $propertyTag):
            if (in_array($propertyTag->getName(), $properties, true)):
                continue; // don't document concrete properties
            endif;

            $md .= sprintf(
                '| <span class="type">%s</span> $%s | %s |',
                str_replace('|', '\\|', Helpers::type($propertyTag->getType(), $element, $language)),
                $propertyTag->getVariableName(),
                $propertyTag->getDescription()
            );
        endforeach;

        $md .= PHP_EOL . PHP_EOL;
    endif;

    if ($element->hasTag('property-write')):
        $md .= '### Overloaded Write Properties' . PHP_EOL . PHP_EOL;
        $md .= '| Property | Description |' . PHP_EOL;
        $md .= '|-|-|' . PHP_EOL;

        foreach ($element->propertyWriteTags as $propertyTag):
            if (in_array($propertyTag->getName(), $properties, true)):
                continue; // don't document concrete properties
            endif;

            $md .= sprintf(
                '| <span class="type">%s</span> $%s | %s |',
                str_replace('|', '\\|', Helpers::type($propertyTag->getType(), $element, $language)),
                $propertyTag->getVariableName(),
                $propertyTag->getDescription()
            );
        endforeach;

        $md .= PHP_EOL . PHP_EOL;
    endif;
endif;

echo $md;