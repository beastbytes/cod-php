<?php

declare(strict_types=1);

use BeastBytes\CodPhp\Element\InterfaceElement;
use BeastBytes\CodPhp\Error\ErrorLevel;
use BeastBytes\CodPhp\Type\Language;
use BeastBytes\CodPhp\Writer\Markdown\Helpers;
use BeastBytes\CodPhp\Writer\Writer;

/**
 * @var ?string $baseUrl
 * @var InterfaceElement $element
 * @var ErrorLevel $errorLevel
 * @var Language $language
 * @var string $namespace
 * @var Writer $this
 */

$md = $this->render(
    '_object-header',
    compact('baseUrl', 'element', 'namespace', 'errorLevel')
);

$md .= '<table><tbody>';
$md .= sprintf('<tr><th>Namespace</th><td>%s</td></tr>', $element->namespace);
$md .= sprintf('<tr><th>Inheritance</th><td>%s</td></tr>', Helpers::tdList($element, 'inheritance', $language));
$md .= sprintf('<tr><th>Implemented by</th><td>%s</td></tr>', Helpers::tdList($element, 'implementedBy'));
$md .= '</tbody></table>' . PHP_EOL . PHP_EOL;

$md .= $this->render(
    '_constants',
    compact('baseUrl', 'element', 'namespace', 'errorLevel', 'language')
);
$md .= $this->render(
    '_properties',
    compact('baseUrl', 'element', 'namespace', 'errorLevel', 'language')
);
$md .= $this->render(
    '_methods',
    compact('baseUrl', 'element', 'namespace', 'errorLevel', 'language')
);

echo $md;