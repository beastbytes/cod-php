<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Type\Extensions;

/**
 * Links to PHP File System extensions documentation.
 *
 * @link https://www.php.net/manual/en/refs.fileprocess.file.php
 */
enum FileSystem: string
{
    case finfo = 'https://www.php.net/manual/{lang}/class.finfo.php';
}
