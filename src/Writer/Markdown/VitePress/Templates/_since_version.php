<?php

declare(strict_types=1);

use BeastBytes\CodPhp\Element\Element;
use BeastBytes\CodPhp\Writer\Writer;

/**
 * @var Element $element
 * @var Writer $this
 */

$md = '';

if ($element->hasTag('since')):
    $md .= '**Since:** ' . $element->since . PHP_EOL . PHP_EOL;
endif;

if ($element->hasTag('version')):
    $md .= '**Version:** ' . $element->version . PHP_EOL . PHP_EOL;
endif;

echo $md;