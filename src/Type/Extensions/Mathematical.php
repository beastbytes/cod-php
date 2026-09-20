<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Type\Extensions;

/**
 * Links to PHP type documentation.
 *
 * @link https://www.php.net/manual/en/refs.math.php
 */
enum Mathematical: string
{
    // BC Math
    case BcMathNumber = 'https://www.php.net/manual/{lang}/class.bcmath-number.php';

    // GNU Multiple Precision
    case GMP = 'https://www.php.net/manual/{lang}/class.gmp.php';
}