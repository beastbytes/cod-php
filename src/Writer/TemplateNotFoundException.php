<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Writer;

use RuntimeException;

/** Exception thrown if a template cannot be found. */
final class TemplateNotFoundException extends RuntimeException {}