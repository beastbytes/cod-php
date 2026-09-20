<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Type\Extensions;

/**
 * Links to PHP PHP extensions documentation.
 *
 * @link https://www.php.net/manual/en/refs.basic.php.php
 */
enum Php: string
{
    // APC User Cache
    case APCUIterator = "https://www.php.net/manual/{lang}/class.apcuiterator.php";

    // Componere
    case Componere_Abstract_Definition = "https://www.php.net/manual/{lang}/class.componere-abstract-definition.php";
    case Componere_Definition = "https://www.php.net/manual/{lang}/class.componere-definition.php";
    case Componere_Patch = "https://www.php.net/manual/{lang}/class.componere-patch.php";
    case Componere_Method = "https://www.php.net/manual/{lang}/class.componere-method.php";
    case Componere_Value = "https://www.php.net/manual/{lang}/class.componere-value.php";


    // Foreign Function Interface
    case FFI_CData = "https://www.php.net/manual/{lang}/class.ffi-cdata.php";
    case FFI_CType = "https://www.php.net/manual/{lang}/class.ffi-ctype.php";
    case FFI_Exception = "https://www.php.net/manual/{lang}/class.ffi-exception.php";
    case FFI_ParserException = "https://www.php.net/manual/{lang}/class.ffi-parserexception.php";

    // Yac
    case Yac = "https://www.php.net/manual/{lang}/class.yac.php";
}