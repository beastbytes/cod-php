<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Type;

/**
 * Links to PHP type documentation.
 *
 * @link https://www.php.net/manual/en/language.types.php
 */
enum PhpType: string
{
    case array = 'https://www.php.net/manual/{lang}/language.types.array.php';
    case bool = 'https://www.php.net/manual/{lang}/language.types.boolean.php';
    case callable = 'https://www.php.net/manual/{lang}/language.types.callable.php';
    case Closure = 'https://www.php.net/manual/{lang}/class.closure.php';
    case false = 'https://www.php.net/manual/{lang}/reserved.constants.php#constant.false';
    case float = 'https://www.php.net/manual/{lang}/language.types.float.php';
    case int = 'https://www.php.net/manual/{lang}/language.types.integer.php';
    case iterable = 'https://www.php.net/manual/{lang}/language.types.iterable.php';
    case mixed = 'https://www.php.net/manual/{lang}/language.types.mixed.php';
    case never = 'https://www.php.net/manual/{lang}/language.types.never.php';
    case null = 'https://www.php.net/manual/{lang}/language.types.null.php';
    case object = 'https://www.php.net/manual/{lang}/language.types.object.php';
    case resource = 'https://www.php.net/manual/{lang}/language.types.resource.php';
    case self = 'self';
    case static = 'static';
    case string = 'https://www.php.net/manual/{lang}/language.types.string.php';
    case true = 'https://www.php.net/manual/{lang}/reserved.constants.php#constant.true';
    case void = 'https://www.php.net/manual/{lang}/language.types.void.php';

    // Exceptions
    case ArgumentCountError = 'https://www.php.net/manual/{lang}/class.argumentcounterror.php';
    case ArithmeticError = 'https://www.php.net/manual/{lang}/class.arithmeticerror.php';
    case AssertionError = 'https://www.php.net/manual/{lang}/class.assertionerror.php';
    case ClosedGeneratorException = 'https://www.php.net/manual/{lang}/class.closedgeneratorexception.php';
    case CompileError = 'https://www.php.net/manual/{lang}/class.compileerror.php';
    case DivisionByZeroError = 'https://www.php.net/manual/{lang}/class.divisionbyzeroerror.php';
    case Error = 'https://www.php.net/manual/{lang}/class.error.php';
    case ErrorException = 'https://www.php.net/manual/{lang}/class.errorexception.php';
    case Exception = 'https://www.php.net/manual/{lang}/class.exception.php';
    case FiberError = 'https://www.php.net/manual/{lang}/class.fibererror.php';
    case ParseError = 'https://www.php.net/manual/{lang}/class.parseerror.php';
    case RequestParseBodyException = 'https://www.php.net/manual/{lang}/class.requestparsebodyexception.php';
    case TypeError = 'https://www.php.net/manual/{lang}/class.typeerror.php';
    case UnhandledMatchError = 'https://www.php.net/manual/{lang}/class.unhandledmatcherror.php';
    case ValueError = 'https://www.php.net/manual/{lang}/class.valueerror.php';
}