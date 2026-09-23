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
$methods = [];

if ($element->hasMethods):
    $md .= '## Methods' . PHP_EOL . PHP_EOL;

    foreach ($element->methods as $method):
        $methods[] = $method->name;

        $md .= $this->render(
            '_method',
            compact('baseUrl', 'element', 'method', 'namespace', 'errorLevel', 'language')
        );
        $md .= PHP_EOL . '---' . PHP_EOL . PHP_EOL;
    endforeach;
endif;

if ($element->canHaveMethodTag && $element->hasTag('method')):
    $md .= '### Overloaded Methods' . PHP_EOL . PHP_EOL;
    $md .= '| Method | Description |' . PHP_EOL;
    $md .= '|-|-|' . PHP_EOL;

    foreach ($element->methodTags as $methodTag):
        if (in_array($methodTag->getName(), $methods, true)):
            continue; // don't document concrete methods
        endif;

        $md .= sprintf(
            '| %s<span class="type">%s</span> %s%s(%s) | %s |',
            $methodTag->isStatic() ? 'static ' : '',
            Helpers::sanitise(Helpers::type($methodTag->getReturnType(), $element, $language), true),
            $methodTag->returnsReference() ? '&' : '',
            $methodTag->getName(),
            Helpers::parameters($methodTag, $element, $language),
            Helpers::sanitise((string) $methodTag->getDescription(), true)
        );
    endforeach;

    $md .= PHP_EOL . PHP_EOL;
endif;

echo $md;