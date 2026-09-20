<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Writer\Markdown;

use BeastBytes\CodPhp\Writer\Writer as BaseWriter;

/** Abstract Writer that generates documentation in Markdown format. */
abstract class Writer extends BaseWriter
{
    private const string OUTPUT_EXTENSION = 'md';

    /** @var string Base output directory for rendered templates. */
    protected string $outputExtension {
        get => self::OUTPUT_EXTENSION;
    }
}