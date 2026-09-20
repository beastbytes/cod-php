<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Type\Extensions;

/**
 * Links to PHP Web Services extensions documentation.
 *
 * @link https://www.php.net/manual/en/refs.webservice.php
 */
enum WebServices: string
{
    // OAuth
    case OAuth = 'https://www.php.net/manual/{lang}/class.oauth.php';
    case OAuthProvider = 'https://www.php.net/manual/{lang}/class.oauthprovider.php';
    case OAuthException = 'https://www.php.net/manual/{lang}/class.oauthexception.php';

    // SOAP
    case SoapClient = 'https://www.php.net/manual/{lang}/class.soapclient.php';
    case SoapServer = 'https://www.php.net/manual/{lang}/class.soapserver.php';
    case SoapFault = 'https://www.php.net/manual/{lang}/class.soapfault.php';
    case SoapHeader = 'https://www.php.net/manual/{lang}/class.soapheader.php';
    case SoapParam = 'https://www.php.net/manual/{lang}/class.soapparam.php';
    case SoapVar = 'https://www.php.net/manual/{lang}/class.soapvar.php';
    case Soap_Sdl = 'https://www.php.net/manual/{lang}/class.soap-sdl.php';
    case Soap_Url = 'https://www.php.net/manual/{lang}/class.soap-url.php';

    // Yar
    case Yar_Server = 'https://www.php.net/manual/{lang}/class.yar-server.php';
    case Yar_Client = 'https://www.php.net/manual/{lang}/class.yar-client.php';
    case Yar_Concurrent_Client = 'https://www.php.net/manual/{lang}/class.yar-concurrent-client.php';
    case Yar_Server_Exception = 'https://www.php.net/manual/{lang}/class.yar-server-exception.php';
    case Yar_Server_Output_Exception = 'https://www.php.net/manual/{lang}/class.yar-server-output-exception.php';
    case Yar_Server_Packager_Exception = 'https://www.php.net/manual/{lang}/class.yar-server-packager-exception.php';
    case Yar_Server_Protocol_Exception = 'https://www.php.net/manual/{lang}/class.yar-server-protocol-exception.php';
    case Yar_Server_Request_Exception = 'https://www.php.net/manual/{lang}/class.yar-server-request-exception.php';
    case Yar_Client_Exception = 'https://www.php.net/manual/{lang}/class.yar-client-exception.php';
    case Yar_Client_Packager_Exception = 'https://www.php.net/manual/{lang}/class.yar-client-packager-exception.php';
    case Yar_Client_Protocol_Exception = 'https://www.php.net/manual/{lang}/class.yar-client-protocol-exception.php';
    case Yar_Client_Transport_Exception = 'https://www.php.net/manual/{lang}/class.yar-client-transport-exception.php';
}