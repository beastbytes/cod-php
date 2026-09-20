<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Type\Extensions;

/**
 * Links to PHP DateTime extensions documentation.
 *
 * @link https://www.php.net/manual/en/refs.calendar.php
 */
enum DateTime: string
{
    case DateTime = 'https://www.php.net/manual/{lang}/class.datetime.php';
    case DateTimeImmutable = 'https://www.php.net/manual/{lang}/class.datetimeimmutable.php';
    case DateTimeInterface = 'https://www.php.net/manual/{lang}/class.datetimeinterface.php';
    case DateTimeZone = 'https://www.php.net/manual/{lang}/class.datetimezone.php';
    case DateInterval = 'https://www.php.net/manual/{lang}/class.datetnterval.php';
    case DatePeriod = 'https://www.php.net/manual/{lang}/class.dateperiod.php';

    // Date/Time Exceptions
    case DateError = 'https://www.php.net/manual/{lang}/class.dateerror.php';
    case DateException = 'https://www.php.net/manual/{lang}/class.dateexception.php';
    case DateInvalidOperationException = 'https://www.php.net/manual/{lang}/class.dateinvalidoperationexception.php';
    case DateInvalidTimeZoneException = 'https://www.php.net/manual/{lang}/class.dateinvalidtimezoneexception.php';
    case DateMalformedIntervalStringException = 'https://www.php.net/manual/{lang}/class.datemalformedintervalstringexception.php';
    case DateMalformedPeriodStringException = 'https://www.php.net/manual/{lang}/class.datemalformedperiodstringexception.php';
    case DateMalformedStringException = 'https://www.php.net/manual/{lang}/class.datemalformedstringexception.php';
    case DateObjectError = 'https://www.php.net/manual/{lang}/class.dateobjecterror.php';
    case DateRangeError = 'https://www.php.net/manual/{lang}/class.daterangeerror.php';
}