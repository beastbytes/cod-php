<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Error;

use JsonSerializable;
use Override;

/** Used to define the maximum error reporting level. */
enum ErrorLevel: int implements JsonSerializable
{
    /** Report errors. */
    case Error = 2;
    /** Do not report any errors. */
    case None = 99;
    /** Report errors, warnings, and notices. */
    case Notice = 0;
    /** Report errors and warnings. */
    case Warning = 1;

    /** @internal Used in error collection JSON serialisation. */
    #[Override]
    public function jsonSerialize(): string
    {
        return $this->name;
    }
}