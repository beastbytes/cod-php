<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Renderer;

use RuntimeException;

/** Exception thrown if the rendering of a template fails. */
final class RenderFailedException extends RuntimeException {}