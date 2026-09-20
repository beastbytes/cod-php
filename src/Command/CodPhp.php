<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Command;

use BeastBytes\CodPhp\Config;
use BeastBytes\CodPhp\Element\Element;
use BeastBytes\CodPhp\Error\Collection as ErrorCollection;
use BeastBytes\CodPhp\Error\ErrorLevel;
use BeastBytes\CodPhp\InheritanceLevel;
use BeastBytes\CodPhp\Parser;
use BeastBytes\CodPhp\Renderer\PhpTemplateRenderer;
use BeastBytes\CodPhp\Type\Language;
use BeastBytes\CodPhp\Writer\Markdown\VitePress\Writer;
use BeastBytes\CodPhp\Writer\WriterInterface;
use Exception;
use RuntimeException;
use Symfony\Component\Console\Attribute\Argument;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Attribute\Option;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Yiisoft\Files\FileHelper;
use Yiisoft\Files\PathMatcher\PathMatcher;

use function array_key_exists;
use function array_pop;
use function array_unshift;
use function constant;
use function count;
use function explode;
use function file_put_contents;
use function is_string;
use function join;
use function sprintf;

/** CodPhp Symfony Console command. */
#[AsCommand(
    name: 'generate:documentation',
    description: 'Generate API documentation',
)]
final class CodPhp extends Command
{
    /** @var string Configuration file. */
    private const string CONFIG_FILE = './cod-php.php';

    /** @var ErrorLevel Error level. */
    private const ErrorLevel ERROR_LEVEL = ErrorLevel::Error;

    /** @var array|string[] Default file exclude patterns. */
    private const array EXCLUDE = ['./tests/**', './vendor/**'];

    /** @var InheritanceLevel Show inherited methods and properties. */
    private const InheritanceLevel INHERITANCE_LEVEL = InheritanceLevel::All;

    /** @var Language PHP Manual language for type links. */
    private const Language LANGUAGE = Language::English;

    /** @var array|string[] Default file match patterns. */
    private const array MATCH = ['**.php'];

    /** @var string Output path. */
    private const string OUTPUT_DIR = './docs/api';

    /** @var int Output path permission. */
    private const int OUTPUT_PATH_PERMISSION = 0744;

    /** @var string Template directory */
    private const string TEMPLATE_DIR = './Templates';

    /** @var string FQCN of the default Renderer class. */
    private const string TEMPLATE_RENDERER = PhpTemplateRenderer::class;

    /** @var string FQCN of the default Writer class. */
    private const string WRITER = Writer::class;

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @param string|null $namespace Namespace containing source files.
     * @param string|null $configFile Configuration file
     * @param array|null $exclude Path(s) to Exclude from source files.
     * @param array|null $match Match pattern(s) for source files.
     * @param string|null $outputDir Output directory.
     * @param string|null $inheritanceLevel Level of Inheritance to show.
     * @param string|null $errorLevel Error Reporting level.
     * @param string|null $baseUrl Base URL for source code links.
     * @param string|null $writer FQCN of the Writer class.
     * @param string|null $templateRenderer FQCN of the template renderer class.
     * @param string|null $templateDir Template directory.
     * @param string|null $language PHP Manual language for type links.
     * @return int Exit code
     */
    public function __invoke(
        InputInterface $input,
        OutputInterface $output,
        #[Argument(
            description: 'Namespace containing source files.',
            name: 'namespace'
        )]
        ?string $namespace = null,
        #[Option(
            description: 'Configuration file',
            name: 'config',
            shortcut: 'c'
        )]
        ?string $configFile = null,
        #[Option(
            description: 'Path(s) to Exclude from source files.',
            name: 'exclude',
            shortcut: 'e'
        )]
        ?array $exclude = null,
        #[Option(
            description: 'Match pattern(s) for source files.',
            name: 'match',
            shortcut: 'm'
        )]
        ?array $match = null,
        #[Option(
            description: 'Output directory.',
            name: 'output',
            shortcut: 'o'
        )]
        ?string $outputDir = null,
        #[Option(
            description: 'Level of Inheritance to show.',
            name: 'inheritance',
            shortcut: 'i'
        )]
        ?string $inheritanceLevel = null,
        #[Option(
            description: 'Error Reporting level.',
            name: 'error-level',
            shortcut: 'l'
        )]
        ?string $errorLevel = null,
        #[Option(
            description: 'Base URL for source code links.',
            name: 'baseUrl',
            shortcut: 'b'
        )]
        ?string $baseUrl = null,
        #[Option(
            description: 'FQCN of the Writer class.',
            name: 'writer',
            shortcut: 'w'
        )]
        ?string $writer = null,
        #[Option(
            description: 'FQCN of the template renderer class.',
            name: 'renderer',
            shortcut: 'r'
        )]
        ?string $templateRenderer = null,
        #[Option(
            description: 'Template directory.',
            name: 'template',
            shortcut: 't'
        )]
        ?string $templateDir = null,
        #[Option(
            description: 'PHP Manual language for type links.',
            name: 'language',
            shortcut: 'p'
        )]
        ?string $language = null
    ): int {
        /*
         * Creates a Config with default values, then
         * merges that with a Config created from the config file - which takes precedence - then
         * merges the result with a config created from command-line values - which is top precedence.
         * `null` values are ignored.
         */
        $config = new Config()
            ->set('baseUrl', null)
            ->set('errorLevel', self::ERROR_LEVEL)
            ->set('exclude', self::EXCLUDE)
            ->set('inheritanceLevel', self::INHERITANCE_LEVEL)
            ->set('language', self::LANGUAGE)
            ->set('match', self::MATCH)
            ->set('outputDir', self::OUTPUT_DIR)
            ->set('templateDir', self::TEMPLATE_DIR)
            ->set('templateRenderer', self::TEMPLATE_RENDERER)
            ->set('verbosity', OutputInterface::VERBOSITY_NORMAL)
            ->set('writer', self::WRITER)
            ->merge(new Config($configFile ?? self::CONFIG_FILE))
            ->merge(
                new Config()
                ->set('baseUrl', $baseUrl)
                ->set(
                    'errorLevel',
                    is_string($errorLevel) ? constant("ErrorLevel::$errorLevel") : null
                )
                ->set('exclude', $exclude)
                ->set(
                    'inheritanceLevel',
                    is_string($inheritanceLevel)
                    ? constant("InheritanceLevel::$inheritanceLevel")
                    : null
                )
                ->set('language', is_string($language) ? constant("Language::$language") : null)
                ->set('match', $match)
                ->set('namespace', $namespace)
                ->set('outputDir', $outputDir)
                ->set('templateDir', $templateDir)
                ->set('templateRenderer', $templateRenderer)
                ->set(
                    'verbosity',
                    $output->getVerbosity() === OutputInterface::VERBOSITY_NORMAL ? null : $output->getVerbosity()
                )
                ->set('writer', $writer)
            )
        ;

        $output->setVerbosity((int) $config->get('verbosity'));

        $io = new SymfonyStyle($input, $output);

        try {
            FileHelper::ensureDirectory((string) $config->get('outputDir'), self::OUTPUT_PATH_PERMISSION);
            FileHelper::clearDirectory((string) $config->get('outputDir'));

            /** @psalm-suppress MixedMethodCall: Cannot call constructor on an unknown class */
            $writer = new ($config->get('writer'));

            if (!$writer instanceof WriterInterface) {
                throw new RuntimeException('Writer object must implement WriterInterface');
            }

            $writer->outputDir = $config->get('outputDir');
            $writer->templateDir = $config->get('templateDir');
            $writer->templateRenderer = new ($config->get('templateRenderer'));

            $io->writeln('Generating API documentation');
            $io->write(sprintf('Analysing %s namespace', $config->get('namespace')));

            $files = FileHelper::findFiles((string) $this->namespaceToDir($config->get('namespace')), [
                /** @psalm-suppress MixedArgument */
                'filter' => new PathMatcher()
                    ->only(...$config->get('match'))
                    ->except(...$config->get('exclude')),
                'recursive' => true,
            ]);

            try {
                $elements = Parser::parse($files);

                // Do this here as not all files may be an `element`
                $io->writeln(sprintf(': %d elements found', count($elements)));

                $io->writeLn('Generating documents');

                Element::setElements($elements);

                $templateParameters = [
                    'baseUrl' => $config->get('baseUrl'),
                    'errorLevel' => $config->get('errorLevel'),
                    'language' => $config->get('language'),
                    'namespace' => $config->get('namespace'),
                ];

                foreach ($io->progressIterate($elements) as $fqcn => $element) {
                    $element->rootNamespace = $config->get('namespace');
                    $element->inheritanceLevel = $config->get('inheritanceLevel');

                    $writer->writeElement($element, $templateParameters);
                }
            } catch (RuntimeException $e) {
                throw new RuntimeException($e->getMessage());
            }

            $io->writeln('Generating index');
            $writer->writeIndex($elements, $templateParameters);
            $writer->writeOther($elements, $templateParameters);

            if (ErrorCollection::hasErrors()) {
                $io->writeln(sprintf(
                    'Documentation errors found: Error: %d, Warning: %d, Notice: %d',
                    count(ErrorCollection::getErrors(ErrorLevel::Error)),
                    count(ErrorCollection::getErrors(ErrorLevel::Warning)),
                    count(ErrorCollection::getErrors(ErrorLevel::Notice)),
                ));

                $errorDir = (string) $config->get('outputDir') . DIRECTORY_SEPARATOR . '_errors_';

                FileHelper::ensureDirectory($errorDir);

                if (file_put_contents(
                    $errorDir . DIRECTORY_SEPARATOR . 'cod-php.json',
                    ErrorCollection::asJson(),
                    LOCK_EX
                ) === false) {
                    throw new RuntimeException('Failed to write `./_errors_/cod-php.json`');
                }

                if ($output->isVerbose()) {
                    foreach (ErrorCollection::getErrors() as $type => $errors) {
                        $io->writeln(sprintf('%s (%d)', ucfirst($type), count($errors)));

                        foreach ($errors as $error) {
                            $io->writeln(
                                sprintf(
                                    '`%s` %s%s: %s',
                                    $error->element->name,
                                    $error->element->elementType,
                                    array_key_exists('parent', $error->context)
                                        ? sprintf(' in `%s`', $error->context['parent'])
                                        : '',
                                    $error->message
                                )
                            );
                        }
                    }
                }
            } else {
                $io->writeln('No documentation errors found.');
            }

            $io->success(sprintf(
                'API documentation for %s generated in %s.',
                (string) $config->get('namespace'),
                (string) $config->get('outputDir'),
            ));

            return Command::SUCCESS;
        } catch (Exception $e) {
            $io->error($e->getMessage());
            return Command::FAILURE;
        }
    }

    private function namespaceToDir(string $namespace): string
    {
        $namespace .= '\\';
        $psr4 = include "vendor/composer/autoload_psr4.php";

        if (array_key_exists($namespace, $psr4)) {
            return array_pop($psr4[$namespace]);
        }

        throw new RuntimeException(sprintf('Namespace `%s` not found.', trim($namespace, '\\')));
    }
}