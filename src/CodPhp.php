<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp;

use BeastBytes\CodPhp\Command\CodPhp as Command;
use Exception;
use Symfony\Component\Console\Application;

/** CodPhp application runner for Symfony Console */
final class CodPhp
{
    /** Current version of the application. */
    public const string VERSION = '1.1.0';

    /**  Human-readable name of the application. */
    public const string NAME = 'CodPhp API Documentation Generator';

    /** Creates and runs the Symfony Console application.
     * @throws Exception
     */
    public static function runApplication(): void
    {
        $application = new Application(self::NAME, self::VERSION);

        $command = new Command();

        $application->addCommand($command);
        $application->setDefaultCommand($command->getName(), true);

        $application->run();
    }
}