<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Type\Extensions;

/**
 * Links to PHP Process Control extensions documentation.
 *
 * @link https://www.php.net/manual/en/refs.fileprocess.process.php
 */
enum ProcessControl: string
{
    // Ev
    case Ev = 'https://www.php.net/manual/{lang}/class.ev.php';
    case EvCheck = 'https://www.php.net/manual/{lang}/class.evcheck.php';
    case EvChild = 'https://www.php.net/manual/{lang}/class.evchild.php';
    case EvEmbed = 'https://www.php.net/manual/{lang}/class.evembed.php';
    case EvFork = 'https://www.php.net/manual/{lang}/class.evfork.php';
    case EvIdle = 'https://www.php.net/manual/{lang}/class.evidle.php';
    case EvIo = 'https://www.php.net/manual/{lang}/class.evio.php';
    case EvLoop = 'https://www.php.net/manual/{lang}/class.evloop.php';
    case EvPeriodic = 'https://www.php.net/manual/{lang}/class.evperiodic.php';
    case EvPrepare = 'https://www.php.net/manual/{lang}/class.evprepare.php';
    case EvSignal = 'https://www.php.net/manual/{lang}/class.evsignal.php';
    case EvStat = 'https://www.php.net/manual/{lang}/class.evstat.php';
    case EvTimer = 'https://www.php.net/manual/{lang}/class.evtimer.php';
    case EvWatcher = 'https://www.php.net/manual/{lang}/class.evwatcher.php';

    //Process Control
    case Pcntl_QosClass = 'https://www.php.net/manual/{lang}/enum.pcntl-qosclass.php';

    // parallel
    case parallel_Runtime = 'https://www.php.net/manual/{lang}/class.parallel-runtime.php';
    case parallel_Future = 'https://www.php.net/manual/{lang}/class.parallel-future.php';
    case parallel_Channel = 'https://www.php.net/manual/{lang}/class.parallel-channel.php';
    case parallel_Events = 'https://www.php.net/manual/{lang}/class.parallel-events.php';
    case parallel_Events_Input = 'https://www.php.net/manual/{lang}/class.parallel-events-input.php';
    case parallel_Events_Event = 'https://www.php.net/manual/{lang}/class.parallel-events-event.php';
    case parallel_Events_Event_Type = 'https://www.php.net/manual/{lang}/class.parallel-events-event-type.php';
    case parallel_Sync = 'https://www.php.net/manual/{lang}/class.parallel-sync.php';

    // pthreads
    case Threaded = 'https://www.php.net/manual/{lang}/class.threaded.php';
    case Thread = 'https://www.php.net/manual/{lang}/class.thread.php';
    case Worker = 'https://www.php.net/manual/{lang}/class.worker.php';
    case Collectable = 'https://www.php.net/manual/{lang}/class.collectable.php';
    case Pool = 'https://www.php.net/manual/{lang}/class.pool.php';
    case Volatile = 'https://www.php.net/manual/{lang}/class.volatile.php';

    // Semaphore
    case SysvMessageQueue = 'https://www.php.net/manual/{lang}/class.sysvmessagequeue.php';
    case SysvSemaphore = 'https://www.php.net/manual/{lang}/class.sysvsemaphore.php';
    case SysvSharedMemory = 'https://www.php.net/manual/{lang}/class.sysvsharedmemory.php';

    // Shared Memory
    case Shmop = 'https://www.php.net/manual/{lang}/class.shmop.php';

    // Sync
    case SyncMutex = 'https://www.php.net/manual/{lang}/class.syncmutex.php';
    case SyncSemaphore = 'https://www.php.net/manual/{lang}/class.syncsemaphore.php';
    case SyncEvent = 'https://www.php.net/manual/{lang}/class.syncevent.php';
    case SyncReaderWriter = 'https://www.php.net/manual/{lang}/class.syncreaderwriter.php';
    case SyncSharedMemory = 'https://www.php.net/manual/{lang}/class.syncsharedmemory.php';
}