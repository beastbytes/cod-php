<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Type\Extensions;

/**
 * Links to PHP Other Services extensions documentation.
 *
 * @link https://www.php.net/manual/en/refs.remote.other.php
 */
enum OtherServices: string
{
    // Curl
    case CurlHandle = 'https://www.php.net/manual/{lang}/class.curlhandle.php';
    case CurlMultiHandle = 'https://www.php.net/manual/{lang}/class.curlmultihandle.php';
    case CurlShareHandle = 'https://www.php.net/manual/{lang}/class.curlsharehandle.php';
    case CurlSharePersistentHandle = 'https://www.php.net/manual/{lang}/class.curlsharepersistenthandle.php';
    case CURLFile = 'https://www.php.net/manual/{lang}/class.curlfile.php';
    case CURLStringFile = 'https://www.php.net/manual/{lang}/class.curlstringfile.php';

    // Event
    case Event = 'https://www.php.net/manual/{lang}/class.event.php';
    case EventBase = 'https://www.php.net/manual/{lang}/class.eventbase.php';
    case EventBuffer = 'https://www.php.net/manual/{lang}/class.eventbuffer.php';
    case EventBufferEvent = 'https://www.php.net/manual/{lang}/class.eventbufferevent.php';
    case EventConfig = 'https://www.php.net/manual/{lang}/class.eventconfig.php';
    case EventDnsBase = 'https://www.php.net/manual/{lang}/class.eventdnsbase.php';
    case EventHttp = 'https://www.php.net/manual/{lang}/class.eventhttp.php';
    case EventHttpConnection = 'https://www.php.net/manual/{lang}/class.eventhttpconnection.php';
    case EventHttpRequest = 'https://www.php.net/manual/{lang}/class.eventhttprequest.php';
    case EventListener = 'https://www.php.net/manual/{lang}/class.eventlistener.php';
    case EventSslContext = 'https://www.php.net/manual/{lang}/class.eventsslcontext.php';
    case EventUtil = 'https://www.php.net/manual/{lang}/class.eventutil.php';
    case EventException = 'https://www.php.net/manual/{lang}/class.eventexception.php';

    // FTP
    case FTP_Connection = 'https://www.php.net/manual/{lang}/class.ftp-connection.php';

    // Gearman
    case GearmanClient = 'https://www.php.net/manual/{lang}/class.gearmanclient.php';
    case GearmanJob = 'https://www.php.net/manual/{lang}/class.gearmanjob.php';
    case GearmanTask = 'https://www.php.net/manual/{lang}/class.gearmantask.php';
    case GearmanWorker = 'https://www.php.net/manual/{lang}/class.gearmanworker.php';
    case GearmanException = 'https://www.php.net/manual/{lang}/class.gearmanexception.php';

    // LDAP
    case LDAP_Connection = 'https://www.php.net/manual/{lang}/class.ldap-connection.php';
    case LDAP_Result = 'https://www.php.net/manual/{lang}/class.ldap-result.php';
    case LDAP_ResultEntry = 'https://www.php.net/manual/{lang}/class.ldap-result-entry.php';

    // Memcache
    case Memcache = 'https://www.php.net/manual/{lang}/class.memcache.php';

    // Memcached
    case Memcached = 'https://www.php.net/manual/{lang}/class.memcached.php';
    case MemcachedException = 'https://www.php.net/manual/{lang}/class.memcachedexception.php';

    //RRDtool
    case RRDCreator = 'https://www.php.net/manual/{lang}/class.rrdcreator.php';
    case RRDGraph = 'https://www.php.net/manual/{lang}/class.rrdgraph.php';
    case RRDUpdater = 'https://www.php.net/manual/{lang}/class.rrdupdater.php';

    // SNMP
    case SNMP = 'https://www.php.net/manual/{lang}/class.snmp.php';
    case SNMPException = 'https://www.php.net/manual/{lang}/class.snmpexception.php';

    // Sockets
    case Socket = 'https://www.php.net/manual/{lang}/class.socket.php';
    case AddressInfo = 'https://www.php.net/manual/{lang}/class.addressinfo.php';

    //Stomp Client
    case Stomp = 'https://www.php.net/manual/{lang}/class.stomp.php';
    case StompFrame = 'https://www.php.net/manual/{lang}/class.stompframe.php';
    case StompException = 'https://www.php.net/manual/{lang}/class.stompexception.php';

    //Support Vector Machine
    case SVM = 'https://www.php.net/manual/{lang}/class.svm.php';
    case SVMModel = 'https://www.php.net/manual/{lang}/class.svmmodel.php';
    case SVMException = 'https://www.php.net/manual/{lang}/class.svmexception.php';

    // Varnish
    case VarnishAdmin = 'https://www.php.net/manual/{lang}/class.varnishadmin.php';
    case VarnishStat = 'https://www.php.net/manual/{lang}/class.varnishstat.php';
    case VarnishLog = 'https://www.php.net/manual/{lang}/class.varnishlog.php';
    case VarnishException = 'https://www.php.net/manual/{lang}/class.varnishexception.php';

    // 0MQ messaging
    case ZMQ = 'https://www.php.net/manual/{lang}/class.zmq.php';
    case ZMQException = 'https://www.php.net/manual/{lang}/class.zmqexception.php';
    case ZMQContext = 'https://www.php.net/manual/{lang}/class.zmqcontext.php';
    case ZMQContextException = 'https://www.php.net/manual/{lang}/class.zmqcontextexception.php';
    case ZMQSocket = 'https://www.php.net/manual/{lang}/class.zmqsocket.php';
    case ZMQSocketException = 'https://www.php.net/manual/{lang}/class.zmqsocketexception.php';
    case ZMQPoll = 'https://www.php.net/manual/{lang}/class.zmqpoll.php';
    case ZMQPollException = 'https://www.php.net/manual/{lang}/class.zmqpollexception.php';
    case ZMQDevice = 'https://www.php.net/manual/{lang}/class.zmqdevice.php';
    case ZMQDeviceException = 'https://www.php.net/manual/{lang}/class.zmqdeviceexception.php';

    // ZooKeeper
    case Zookeeper = 'https://www.php.net/manual/{lang}/class.zookeeper.php';
    case ZookeeperConfig = 'https://www.php.net/manual/{lang}/class.zookeeperconfig.php';
    case ZookeeperException = 'https://www.php.net/manual/{lang}/class.zookeeperexception.php';
    case ZookeeperAuthenticationException = 'https://www.php.net/manual/{lang}/class.zookeeperauthenticationexception.php';
    case ZookeeperConnectionException = 'https://www.php.net/manual/{lang}/class.zookeeperconnectionexception.php';
    case ZookeeperMarshallingException = 'https://www.php.net/manual/{lang}/class.zookeepermarshallingexception.php';
    case ZookeeperNoNodeException = 'https://www.php.net/manual/{lang}/class.zookeepernonodeexception.php';
    case ZookeeperOperationTimeoutException = 'https://www.php.net/manual/{lang}/class.zookeeperoperationtimeoutexception.php';
    case ZookeeperSessionException = 'https://www.php.net/manual/{lang}/class.zookeepersessionexception.php';
}