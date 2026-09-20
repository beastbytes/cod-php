<?php

declare(strict_types=1);

use BeastBytes\CodPhp\Element\Element;
use BeastBytes\CodPhp\Writer\Markdown\Helpers;
use BeastBytes\CodPhp\Writer\Writer;

/**
 * @var Element $element
 * @var Writer $this
 */

$md = '';

if ($element->hasTag('link')):
    $md .= Helpers::linkList($element->linkTags, $element);
endif;

if ($element->hasTag('see')):
    $md .= Helpers::linkList($element->seeTags, $element);
endif;

echo $md;