<?php

declare(strict_types=1);

use BeastBytes\CodPhp\Element\Element;
use BeastBytes\CodPhp\Writer\Writer;

/**
 * @var Element $element
 * @var Writer $this
 */

$md = $this->render('_links', compact('element'));

if (!empty($links)):
    $md .= sprintf('## Related' . PHP_EOL . PHP_EOL . '%s', $links);
endif;

echo $md;