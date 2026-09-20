<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Type;

/**
 * Language codes for use when generating links to PHP types
 *
 * @link https://www.php.net/docs.php
 */
enum Language: string
{
    case Brazilian = 'pt_BR';
    case Chinese = 'zh';
    case English = 'en'; // Well, American
    case French = 'fr';
    case German = 'de';
    case Italian = 'it';
    case Japanese = 'ja';
    case Russian = 'ru';
    case Turkish = 'tr';
    case Ukrainian = 'uk';
}