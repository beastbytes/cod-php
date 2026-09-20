<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Type\Extensions;

/**
 * Links to PHP Cryptography extensions documentation.
 *
 * @link https://www.php.net/manual/en/refs.crypto.php
 */
enum Cryptography: string
{
    // Hash
    case HashContext = 'https://www.php.net/manual/{lang}/class.hashcontext.php';

    // OpenSSL
    case OpenSSLCertificate = 'https://www.php.net/manual/{lang}/class.opensslcertificate.php';
    case OpenSSLCertificateSigningRequest = 'https://www.php.net/manual/{lang}/class.opensslcertificatesigningrequest.php';
    case OpenSSLAsymmetricKey = 'https://www.php.net/manual/{lang}/class.opensslasymmetrickey.php';

    // Rnp
    case RnpFFI = 'https://www.php.net/manual/{lang}/class.rnpffi.php';

    // Sodium
    case SodiumException = 'https://www.php.net/manual/{lang}/class.sodiumexception.php';
}