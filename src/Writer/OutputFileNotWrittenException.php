<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Writer;

use RuntimeException;

/** Exception thrown if writing an output file fails. */
final class OutputFileNotWrittenException extends RuntimeException {}