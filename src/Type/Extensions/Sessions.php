<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Type\Extensions;

/**
 * Links to PHP Sessions extensions documentation.
 *
 * @link https://www.php.net/manual/en/refs.basic.session.php
 */
enum Sessions: string
{
    // Sessions
    case SessionHandler = 'https://www.php.net/manual/{lang}/class.sessionhandler.php';
    case SessionHandlerInterface = 'https://www.php.net/manual/{lang}/class.sessionhandlerinterface.php';
    case SessionIdInterface = 'https://www.php.net/manual/{lang}/class.sessionidinterface.php';
    case SessionUpdateTimestampHandlerInterface =
        'https://www.php.net/manual/{lang}/class.sessionupdatetimestamphandlerinterface.php'
    ;
}