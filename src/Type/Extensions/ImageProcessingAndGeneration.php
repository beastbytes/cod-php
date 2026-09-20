<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Type\Extensions;

/**
 * Links to PHP Image Processing and Generation extensions documentation.
 *
 * @link https://www.php.net/manual/en/refs.utilspec.image.php
 */
enum ImageProcessingAndGeneration: string
{
    // GD
    case GdImage = 'https://www.php.net/manual/{lang}/class.gdimage.php';
    case GdFont = 'https://www.php.net/manual/{lang}/class.gdfont.php';

    //Gmagik
    case Gmagick = 'https://www.php.net/manual/{lang}/class.gmagick.php';
    case GmagickDraw = 'https://www.php.net/manual/{lang}/class.gmagickdraw.php';
    case GmagickPixel = 'https://www.php.net/manual/{lang}/class.gmagickpixel.php';
    case GmagickException = 'https://www.php.net/manual/{lang}/class.gmagickexception.php';
    case GmagickPixelException = 'https://www.php.net/manual/{lang}/class.gmagickpixelexception.php';

    //ImagMagik: string
    case Imagick = 'https://www.php.net/manual/{lang}/class.imagick.php';
    case ImagickDraw = 'https://www.php.net/manual/{lang}/class.imagickdraw.php';
    case ImagickDrawException = 'https://www.php.net/manual/{lang}/class.imagickdrawexception.php';
    case ImagickException = 'https://www.php.net/manual/{lang}/class.imagickexception.php';
    case ImagickKernel = 'https://www.php.net/manual/{lang}/class.imagickkernel.php';
    case ImagickKernelException = 'https://www.php.net/manual/{lang}/class.imagickkernelexception.php';
    case ImagickPixel = 'https://www.php.net/manual/{lang}/class.imagickpixel.php';
    case ImagickPixelException = 'https://www.php.net/manual/{lang}/class.imagickpixelexception.php';
    case ImagickPixelIterator = 'https://www.php.net/manual/{lang}/class.imagickpixeliterator.php';
    case ImagickPixelIteratorException = 'https://www.php.net/manual/{lang}/class.imagickpixeliteratorexception.php';
}