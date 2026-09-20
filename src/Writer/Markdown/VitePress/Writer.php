<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Writer\Markdown\VitePress;

use BeastBytes\CodPhp\Element\ObjectElement;
use BeastBytes\CodPhp\Error\ErrorLevel;
use BeastBytes\CodPhp\Type\Language;
use BeastBytes\CodPhp\Writer\Markdown\Writer as MarkdownWriter;
use Override;
use Throwable;

use function array_merge;
use function compact;
use function pathinfo;
use function realpath;

/**
 * Writer that generates documentation in Markdown format and configuration for use with the VitePress static site generator.
 *
 * @psalm-suppress MissingConstructor
 */
final class Writer extends MarkdownWriter
{
    private const string PARTIAL_FILE_IDENTIFIER = '_';

    /** @var string Template directory relative to the Writer. */
    public string $templateDir {
        set => $this->templateDir = realpath(__DIR__ . DIRECTORY_SEPARATOR . $value);
    }

    /**
     * Write other documents.
     *
     * @param ObjectElement[] $elements Namespace elements.
     * @param array{
     *   baseUrl: string,
     *   errorLevel: ErrorLevel,
     *   language: Language,
     *   namespace: string,
     * } $parameters Template parameters.
     * @return void
     * @throws Throwable
     */
    #[Override]
    public function writeOther(array $elements, array $parameters = []): void
    {
        $this->writeFile(
            'vitepress/_config',
            array_merge($parameters, compact('elements')),
            '_vitepress_\\config',
            'json5'
        );
    }

    /**
     * @throws Throwable
     */
    #[Override]
    protected function afterRender(string $templateFile, array $parameters, string $output): string
    {
        if (pathinfo($templateFile)['filename'][0] !== self::PARTIAL_FILE_IDENTIFIER) {
            $output = $this->render('_header', $parameters)
                . $output
                . $this->render('_footer', $parameters)
            ;
        }

        return $output;
    }
}