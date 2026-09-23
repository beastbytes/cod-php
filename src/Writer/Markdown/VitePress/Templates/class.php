<?php

declare(strict_types=1);

use BeastBytes\CodPhp\Element\ClassElement;
use BeastBytes\CodPhp\Error\ErrorLevel;
use BeastBytes\CodPhp\Type\Language;
use BeastBytes\CodPhp\Writer\Markdown\Helpers;
use BeastBytes\CodPhp\Writer\Writer;

/**
 * @var ?string $baseUrl
 * @var ClassElement $element
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

if ($element->implementsInterfaces):
    $md .= sprintf('<tr><th>Implements</th><td>%s</td></tr>', Helpers::tdList($element, 'interfaces', $language));
endif;

if ($element->usesTraits):
    $md .= sprintf('<tr><th>Uses</th><td>%s</td></tr>', Helpers::tdList($element, 'traits'));
endif;

if ($element->hasSubclasses):
    $md .= sprintf('<tr><th>Subclasses</th><td>%s</td></tr>', Helpers::tdList($element, 'subclasses'));
endif;

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