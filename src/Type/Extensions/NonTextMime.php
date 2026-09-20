<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Type\Extensions;

/**
 * Links to PHP Non-Text Mime extensions documentation.
 *
 * @link https://www.php.net/manual/en/refs.utilspec.nontext.php
 */
enum NonTextMime : string
{
    // wkhtmltox
    case wkhtmltox_PDF_Converter = 'https://www.php.net/manual/{lang}/class.wkhtmltox-pdf-converter.php';
    case wkhtmltox_PDF_Object = 'https://www.php.net/manual/{lang}/class.wkhtmltox-pdf-object.php';
    case wkhtmltox_Image_Converter = 'https://www.php.net/manual/{lang}/class.wkhtmltox-image-converter.php';

    // XLSWriter
    case Vtiful_Kernel_Excel = 'https://www.php.net/manual/{lang}/class.vtiful-kernel-excel.php';
    case Vtiful_Kernel_Format = 'https://www.php.net/manual/{lang}/class.vtiful-kernel-format.php';
}