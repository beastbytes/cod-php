<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Type\Extensions;

/**
 * Links to PHP Other Basic extensions documentation.
 *
 * @link https://www.php.net/manual/en/refs.basic.other.php
 */
enum OtherBasicExtensions : string
{
    // FANN (Fast Artificial Neural Network)
    case FANNConnection = 'https://www.php.net/manual/{lang}/class.fannconnection.php';

    // JSON
    case JsonException = 'https://www.php.net/manual/{lang}/class.jsonexception.php';
    case JsonSerializable = 'https://www.php.net/manual/{lang}/class.jsonserializable.php';

    // Simdjson
    case SimdJsonException = 'https://www.php.net/manual/{lang}/class.simdjsonexception.php';
    case SimdJsonValueError = 'https://www.php.net/manual/{lang}/class.simdjsonvalueerror.php';

    // Lua
    case LuaClosure = 'https://www.php.net/manual/{lang}/class.luaclosure.php';
    case LuaException = 'https://www.php.net/manual/{lang}/class.luaexception.php';

    // LuaSandbox
    case LuaSandbox = 'https://www.php.net/manual/{lang}/class.luasandbox.php';
    case LuaSandboxFunction = 'https://www.php.net/manual/{lang}/class.luasandboxfunction.php';
    case LuaSandboxError = 'https://www.php.net/manual/{lang}/class.luasandboxerror.php';
    case LuaSandboxErrorError = 'https://www.php.net/manual/{lang}/class.luasandboxerrorerror.php';
    case LuaSandboxFatalError = 'https://www.php.net/manual/{lang}/class.luasandboxfatalerror.php';
    case LuaSandboxMemoryError = 'https://www.php.net/manual/{lang}/class.luasandboxmemoryerror.php';
    case LuaSandboxRuntimeError = 'https://www.php.net/manual/{lang}/class.luasandboxruntimeerror.php';
    case LuaSandboxSyntaxError = 'https://www.php.net/manual/{lang}/class.luasandboxsyntaxerror.php';
    case LuaSandboxTimeoutError = 'https://www.php.net/manual/{lang}/class.luasandboxtimeouterror.php';

    // Random
    case Random_Randomizer = 'https://www.php.net/manual/{lang}/class.random-randomizer.php';
    case Random_IntervalBoundary = 'https://www.php.net/manual/{lang}/enum.random-intervalboundary.php';
    case Random_Engine = 'https://www.php.net/manual/{lang}/class.random-engine.php';
    case Random_CryptoSafeEngine = 'https://www.php.net/manual/{lang}/class.random-cryptosafeengine.php';
    case Random_Engine_Secure = 'https://www.php.net/manual/{lang}/class.random-engine-secure.php';
    case Random_Engine_Mt19937 = 'https://www.php.net/manual/{lang}/class.random-engine-mt19937.php';
    case Random_Engine_PcgOneseq128XslRr64 = 'https://www.php.net/manual/{lang}/class.random-engine-pcgoneseq128xslrr64.php';
    case Random_Engine_Xoshiro256StarStar = 'https://www.php.net/manual/{lang}/class.random-engine-xoshiro256starstar.php';
    case Random_RandomError = 'https://www.php.net/manual/{lang}/class.random-randomerror.php';
    case Random_BrokenRandomEngineError = 'https://www.php.net/manual/{lang}/class.random-brokenrandomengineerror.php';
    case Random_RandomException = 'https://www.php.net/manual/{lang}/class.random-randomexception.php';

    // Seaslog
    case SeasLog = 'https://www.php.net/manual/{lang}/class.seaslog.php';

    // Streams
    case php_user_filter = 'https://www.php.net/manual/{lang}/class.php-user-filter.php';
    case streamWrapper = 'https://www.php.net/manual/{lang}/class.streamwrapper.php';
    case StreamBucket = 'https://www.php.net/manual/{lang}/class.streambucket.php';

    // Swoole
    case Swoole_Async = 'https://www.php.net/manual/{lang}/class.swoole-async.php';
    case Swoole_Atomic = 'https://www.php.net/manual/{lang}/class.swoole-atomic.php';
    case Swoole_Buffer = 'https://www.php.net/manual/{lang}/class.swoole-buffer.php';
    case Swoole_Channel = 'https://www.php.net/manual/{lang}/class.swoole-channel.php';
    case Swoole_Client = 'https://www.php.net/manual/{lang}/class.swoole-client.php';
    case Swoole_Connection_Iterator = 'https://www.php.net/manual/{lang}/class.swoole-connection-iterator.php';
    case Swoole_Coroutine = 'https://www.php.net/manual/{lang}/class.swoole-coroutine.php';
    case Swoole_Coroutine_Lock = 'https://www.php.net/manual/{lang}/class.swoole-coroutine-lock.php';
    case Swoole_Event = 'https://www.php.net/manual/{lang}/class.swoole-event.php';
    case Swoole_Exception = 'https://www.php.net/manual/{lang}/class.swoole-exception.php';
    case Swoole_Http_Client = 'https://www.php.net/manual/{lang}/class.swoole-http-client.php';
    case Swoole_Http_Request = 'https://www.php.net/manual/{lang}/class.swoole-http-request.php';
    case Swoole_Http_Response = 'https://www.php.net/manual/{lang}/class.swoole-http-response.php';
    case Swoole_Http_Server = 'https://www.php.net/manual/{lang}/class.swoole-http-server.php';
    case Swoole_Lock = 'https://www.php.net/manual/{lang}/class.swoole-lock.php';
    case Swoole_Mmap = 'https://www.php.net/manual/{lang}/class.swoole-mmap.php';
    case Swoole_Module = 'https://www.php.net/manual/{lang}/class.swoole-module.php';
    case Swoole_MySQL = 'https://www.php.net/manual/{lang}/class.swoole-mysql.php';
    case Swoole_MySQL_Exception = 'https://www.php.net/manual/{lang}/class.swoole-mysql-exception.php';
    case Swoole_Process = 'https://www.php.net/manual/{lang}/class.swoole-process.php';
    case Swoole_Redis_Server = 'https://www.php.net/manual/{lang}/class.swoole-redis-server.php';
    case Swoole_Runtime = 'https://www.php.net/manual/{lang}/class.swoole-runtime.php';
    case Swoole_Serialize = 'https://www.php.net/manual/{lang}/class.swoole-serialize.php';
    case Swoole_Server = 'https://www.php.net/manual/{lang}/class.swoole-server.php';
    case Swoole_Table = 'https://www.php.net/manual/{lang}/class.swoole-table.php';
    case Swoole_Timer = 'https://www.php.net/manual/{lang}/class.swoole-timer.php';
    case Swoole_WebSocket_Frame = 'https://www.php.net/manual/{lang}/class.swoole-websocket-frame.php';
    case Swoole_WebSocket_Server = 'https://www.php.net/manual/{lang}/class.swoole-websocket-server.php';

    // Tidy
    case tidy = 'https://www.php.net/manual/{lang}/class.tidy.php';
    case tidyNode = 'https://www.php.net/manual/{lang}/class.tidynode.php';

    // Tokenizer
    case PhpToken = 'https://www.php.net/manual/{lang}/class.phptoken.php';

    // URI
    case Uri_Rfc3986_Uri = 'https://www.php.net/manual/{lang}/class.uri-rfc3986-uri.php';
    case Uri_WhatWg_Url = 'https://www.php.net/manual/{lang}/class.uri-whatwg-url.php';
    case Uri_UriComparisonMode = 'https://www.php.net/manual/{lang}/enum.uri-uricomparisonmode.php';
    case Uri_UriException = 'https://www.php.net/manual/{lang}/class.uri-uriexception.php';
    case Uri_UriError = 'https://www.php.net/manual/{lang}/class.uri-urierror.php';
    case Uri_InvalidUriException = 'https://www.php.net/manual/{lang}/class.uri-invaliduriexception.php';
    case Uri_WhatWg_InvalidUrlException = 'https://www.php.net/manual/{lang}/class.uri-whatwg-invalidurlexception.php';
    case Uri_WhatWg_UrlValidationError = 'https://www.php.net/manual/{lang}/class.uri-whatwg-urlvalidationerror.php';
    case Uri_WhatWg_UrlValidationErrorType = 'https://www.php.net/manual/{lang}/enum.uri-whatwg-urlvalidationerrortype.php';

    // V8 Javascript Engine Integration
    case V8Js = 'https://www.php.net/manual/{lang}/class.v8js.php';
    case V8JsException = 'https://www.php.net/manual/{lang}/class.v8jsexception.php';

    // Yet Another Framework
    case Yaf_Application = 'https://www.php.net/manual/{lang}/class.yaf-application.php';
    case Yaf_Bootstrap_Abstract = 'https://www.php.net/manual/{lang}/class.yaf-bootstrap-abstract.php';
    case Yaf_Dispatcher = 'https://www.php.net/manual/{lang}/class.yaf-dispatcher.php';
    case Yaf_Config_Abstract = 'https://www.php.net/manual/{lang}/class.yaf-config-abstract.php';
    case Yaf_Config_Ini = 'https://www.php.net/manual/{lang}/class.yaf-config-ini.php';
    case Yaf_Config_Simple = 'https://www.php.net/manual/{lang}/class.yaf-config-simple.php';
    case Yaf_Controller_Abstract = 'https://www.php.net/manual/{lang}/class.yaf-controller-abstract.php';
    case Yaf_Action_Abstract = 'https://www.php.net/manual/{lang}/class.yaf-action-abstract.php';
    case Yaf_View_Interface = 'https://www.php.net/manual/{lang}/class.yaf-view-interface.php';
    case Yaf_View_Simple = 'https://www.php.net/manual/{lang}/class.yaf-view-simple.php';
    case Yaf_Loader = 'https://www.php.net/manual/{lang}/class.yaf-loader.php';
    case Yaf_Plugin_Abstract = 'https://www.php.net/manual/{lang}/class.yaf-plugin-abstract.php';
    case Yaf_Registry = 'https://www.php.net/manual/{lang}/class.yaf-registry.php';
    case Yaf_Request_Abstract = 'https://www.php.net/manual/{lang}/class.yaf-request-abstract.php';
    case Yaf_Request_Http = 'https://www.php.net/manual/{lang}/class.yaf-request-http.php';
    case Yaf_Request_Simple = 'https://www.php.net/manual/{lang}/class.yaf-request-simple.php';
    case Yaf_Response_Abstract = 'https://www.php.net/manual/{lang}/class.yaf-response-abstract.php';
    case Yaf_Response_Cli = 'https://www.php.net/manual/{lang}/class.yaf-response-cli.php';
    case Yaf_Response_Http = 'https://www.php.net/manual/{lang}/class.yaf-response-http.php';
    case Yaf_Route_Interface = 'https://www.php.net/manual/{lang}/class.yaf-route-interface.php';
    case Yaf_Route_Map = 'https://www.php.net/manual/{lang}/class.yaf-route-map.php';
    case Yaf_Route_Regex = 'https://www.php.net/manual/{lang}/class.yaf-route-regex.php';
    case Yaf_Route_Rewrite = 'https://www.php.net/manual/{lang}/class.yaf-route-rewrite.php';
    case Yaf_Router = 'https://www.php.net/manual/{lang}/class.yaf-router.php';
    case Yaf_Route_Simple = 'https://www.php.net/manual/{lang}/class.yaf-route-simple.php';
    case Yaf_Route_Static = 'https://www.php.net/manual/{lang}/class.yaf-route-static.php';
    case Yaf_Route_Supervar = 'https://www.php.net/manual/{lang}/class.yaf-route-supervar.php';
    case Yaf_Session = 'https://www.php.net/manual/{lang}/class.yaf-session.php';
    case Yaf_Exception = 'https://www.php.net/manual/{lang}/class.yaf-exception.php';
    case Yaf_Exception_TypeError = 'https://www.php.net/manual/{lang}/class.yaf-exception-typeerror.php';
    case Yaf_Exception_StartupError = 'https://www.php.net/manual/{lang}/class.yaf-exception-startuperror.php';
    case Yaf_Exception_DispatchFailed = 'https://www.php.net/manual/{lang}/class.yaf-exception-dispatchfailed.php';
    case Yaf_Exception_RouterFailed = 'https://www.php.net/manual/{lang}/class.yaf-exception-routerfailed.php';
    case Yaf_Exception_LoadFailed = 'https://www.php.net/manual/{lang}/class.yaf-exception-loadfailed.php';
    case Yaf_Exception_LoadFailed_Module = 'https://www.php.net/manual/{lang}/class.yaf-exception-loadfailed-module.php';
    case Yaf_Exception_LoadFailed_Controller = 'https://www.php.net/manual/{lang}/class.yaf-exception-loadfailed-controller.php';
    case Yaf_Exception_LoadFailed_Action = 'https://www.php.net/manual/{lang}/class.yaf-exception-loadfailed-action.php';
    case Yaf_Exception_LoadFailed_View = 'https://www.php.net/manual/{lang}/class.yaf-exception-loadfailed-view.php';

    // Yaconf
    case Yaconf = 'https://www.php.net/manual/{lang}/class.yaconf.php';

    // Data Structures
    case Ds_Collection = 'https://www.php.net/manual/{lang}/class.ds-collection.php';
    case Ds_Hashable = 'https://www.php.net/manual/{lang}/class.ds-hashable.php';
    case Ds_Sequence = 'https://www.php.net/manual/{lang}/class.ds-sequence.php';
    case Ds_Vector = 'https://www.php.net/manual/{lang}/class.ds-vector.php';
    case Ds_Deque = 'https://www.php.net/manual/{lang}/class.ds-deque.php';
    case Ds_Map = 'https://www.php.net/manual/{lang}/class.ds-map.php';
    case Ds_Pair = 'https://www.php.net/manual/{lang}/class.ds-pair.php';
    case Ds_Set = 'https://www.php.net/manual/{lang}/class.ds-set.php';
    case Ds_Stack = 'https://www.php.net/manual/{lang}/class.ds-stack.php';
    case Ds_Queue = 'https://www.php.net/manual/{lang}/class.ds-queue.php';
    case Ds_PriorityQueue = 'https://www.php.net/manual/{lang}/class.ds-priorityqueue.php';
}