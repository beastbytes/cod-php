<?php

declare(strict_types=1);

use BeastBytes\CodPhp\Element\EnumElement;
use BeastBytes\CodPhp\Error\ErrorLevel;
use BeastBytes\CodPhp\Type\Language;
use BeastBytes\CodPhp\Writer\Markdown\Helpers;
use BeastBytes\CodPhp\Writer\Writer;

/**
 * @var ?string $baseUrl
 * @var EnumElement $element
 * @var ErrorLevel $errorLevel
 * @var Language $language
 * @var string $namespace
 * @var Writer $this
*/

$md = '';
$md .= '<table><tbody>';
$md .= sprintf('<tr><th>Namespace</th><td>%s</td></tr>', $element->namespace);

if ($element->isBacked):
    $md .= sprintf(
        '<tr><th>Backing Type</th><td>%s</td></tr>',
        Helpers::type($element->backingType, $element, $language)
    );
endif;

$md .= '</tbody></table>' . PHP_EOL . PHP_EOL;

$md .= $this->render(
    '_constants',
    compact('baseUrl', 'element', 'namespace', 'errorLevel', 'language')
);
$md .= $this->render(
    '_enumCases',
    compact('baseUrl', 'element', 'namespace', 'errorLevel', 'language')
);
$md .= $this->render(
    '_methods',
    compact('baseUrl', 'element', 'namespace', 'errorLevel', 'language')
);

echo $md;