<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Type\Extensions;

/**
 * Links to PHP Compression and Archive extensions documentation.
 *
 * @link https://www.php.net/manual/en/refs.compression.php
 */
enum CompressionAndArchive: string
{
    // Phar
    case Phar = 'https://www.php.net/manual/{lang}/class.phar.php';
    case PharData = 'https://www.php.net/manual/{lang}/class.phardata.php';
    case PharFileInfo = 'https://www.php.net/manual/{lang}/class.pharfileinfo.php';
    case PharException = 'https://www.php.net/manual/{lang}/class.pharexception.php';

    // Rar
    case RarArchive = 'https://www.php.net/manual/{lang}/class.rararchive.php';
    case RarEntry = 'https://www.php.net/manual/{lang}/class.rarentry.php';
    case RarException = 'https://www.php.net/manual/{lang}/class.rarexception.php';
    
    // Zlib
    case DeflateContext = 'https://www.php.net/manual/{lang}/class.deflatecontext.php';
    case InflateContext = 'https://www.php.net/manual/{lang}/class.inflatecontext.php';
}