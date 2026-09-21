<?php

declare(strict_types=1);

use BeastBytes\CodPhp\Element\MethodElement;
use BeastBytes\CodPhp\Element\ObjectElement;
use BeastBytes\CodPhp\Error\Collection as ErrorCollection;
use BeastBytes\CodPhp\Error\ErrorLevel;
use BeastBytes\CodPhp\Type\Language;
use BeastBytes\CodPhp\Writer\Markdown\Helpers;
use BeastBytes\CodPhp\Writer\Writer;

/**
 * @var ?string $baseUrl
 * @var ObjectElement $element
 * @var ErrorLevel $errorLevel
 * @var Language $language
 * @var MethodElement $method
 * @var string $namespace
 * @var Writer $this
 */

$md = sprintf('### %s()' . PHP_EOL , $method->name);

if ($method->hasSummary):
    $md .= $method->summary . PHP_EOL . PHP_EOL;
else:
    $md .= Helpers::error(
        ErrorCollection::addError('No Summary', $method, ['parent' => $element->fqcn]),
        $errorLevel
    );
endif;

if ($method->hasDescription):
    $md .= $method->description . PHP_EOL . PHP_EOL;
else:
    $md .= Helpers::error(
        ErrorCollection::addWarning('No Description', $method, ['parent' => $element->fqcn]),
        $errorLevel
    );
endif;

if ($method->hasTag('version')):
    $md .= '**Version:** ' . $method->version . PHP_EOL . PHP_EOL;
endif;

if ($method->hasTag('since')):
    $md .= '**Since:** ' . $method->since . PHP_EOL . PHP_EOL;
endif;

if ($method->hasTag('deprecated')):
    $md .= Helpers::deprecationNotice($method);
endif;

$md .= '<table><tbody>';

if ($method->isConstructor || $method->isDestructor):
    $md .= sprintf(
        '<tr><td colspan="%d">%sfunction %s(%s)</td></tr>',
        $method->hasParameters ? 3 : 1,
        Helpers::modifiers($method),
        $method->name,
        Helpers::parameters($method, $element, $language)
    );
else:
    $md .= sprintf(
        '<tr><td colspan="%d">%s function %s%s(%s): <span class="type">%s</span></td></tr>',
        $method->hasParameters || $method->hasReturnType ? 3 : 1,
        Helpers::modifiers($method),
        $method->returnsReference ? Helpers::SYMBOL_REFERENCE : '',
        $method->name,
        Helpers::parameters($method, $element, $language),
        Helpers::type($method->returnType, $element, $language)
    );
endif;

if ($method->hasParameters):
    foreach ($method->parameters as $name => $parameter):
        $md .= sprintf(
            '<tr><td>$%s</td><td>%s</td><td>%s</td></tr>',
            $name,
            Helpers::type($parameter->type, $element, $language),
            $parameter->description
        );
    endforeach;
endif;

if (!$method->isConstructor && !$method->isDestructor):
    $md .= sprintf(
        '<tr><td>return</td><td>%s</td><td>%s</td></tr>',
        Helpers::type($method->returnType, $element, $language),
        $method->returnValueDescription
    );
endif;

if ($method->throwsException):
    foreach ($method->throwsTags as $throws):
        $md .= sprintf(
            '<tr><td>throws</td><td>%s</td><td>%s</td></tr>',
            Helpers::type($throws->getType(), $element, $language),
            $throws->getDescription()
        );
    endforeach;
endif;

$md .= '</tbody></table>' . PHP_EOL . PHP_EOL;

$md .= sprintf('Declared in %s' . PHP_EOL . PHP_EOL, Helpers::linkElements($element, $method->declaringClass));
$links = $this->render('_links', ['element' => $method]);

if (!empty($links)):
    $md .= sprintf('#### Related' . PHP_EOL . PHP_EOL . '%s' . PHP_EOL . PHP_EOL, $links);
endif;

echo $md;