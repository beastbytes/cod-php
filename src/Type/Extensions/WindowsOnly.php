<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Type\Extensions;

/**
 * Links to PHP Windows only extensions documentation.
 *
 * @link https://www.php.net/manual/en/refs.utilspec.windows.php
 */
enum WindowsOnly : string
{
    // COM and .Net (Windows)
    case com = 'https://www.php.net/manual/{lang}/class.com.php'; //The com class
    case dotnet = 'https://www.php.net/manual/{lang}/class.dotnet.php'; //The dotnet class
    case variant = 'https://www.php.net/manual/{lang}/class.variant.php'; //variant class
    case COMPersistHelper = 'https://www.php.net/manual/{lang}/class.compersisthelper.php'; //The COMPersistHelper class
    case com_exception = 'https://www.php.net/manual/{lang}/class.com-exception.php'; //The com_exception class
    case com_safearray_proxy = 'https://www.php.net/manual/{lang}/class.com-safearray-proxy.php'; //The com_safearray_proxy class

    // win32service
    case Win32ServiceException = 'https://www.php.net/manual/{lang}/class.win32serviceexception.php';
    case Win32Service_RightInfo = 'https://www.php.net/manual/{lang}/class.win32service-rightinfo.php';
}