<?php

declare(strict_types=1);

use BeastBytes\CodPhp\Element\ObjectElement;
use BeastBytes\CodPhp\Error\ErrorLevel;
use BeastBytes\CodPhp\Writer\Writer;

/**
 * @var ?string $baseUrl
 * @var ObjectElement $element
 * @var string $namespace
 * @var ErrorLevel $errorLevel
 * @var Writer $this
 */

echo sprintf(
    <<<FRONT_MATTER
    ---
    title: %s
    lastUpdated: %s
    description: %s
    head:
      - - meta
        - name: element-type
          content: %s
      - - meta
        - name: Generator
          content: CodPhp
    ---
    
    
    FRONT_MATTER,
    $element->name,
    new DateTimeImmutable()->format('Y-m-d H:i:s'),
    str_replace(PHP_EOL, ' ', (string) $element->summary),
    $element->elementType,
);