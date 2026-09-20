<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Type\Extensions;

/**
 * Links to PHP Mail extensions documentation.
 *
 * @link https://www.php.net/manual/en/refs.remote.mail.php
 */
enum Mail: string
{
    case IMAPConnection = 'https://www.php.net/manual/{lang}/class.imap-connection.php';
}
