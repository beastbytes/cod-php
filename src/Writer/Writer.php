<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Writer;

use BeastBytes\CodPhp\Element\ClassElement;
use BeastBytes\CodPhp\Element\EnumElement;
use BeastBytes\CodPhp\Element\InterfaceElement;
use BeastBytes\CodPhp\Element\ObjectElement;
use BeastBytes\CodPhp\Element\TraitElement;
use BeastBytes\CodPhp\Error\ErrorLevel;
use BeastBytes\CodPhp\Renderer\TemplateRendererInterface;
use BeastBytes\CodPhp\Type\Language;
use Override;
use Throwable;
use Yiisoft\Files\FileHelper;

use function file_put_contents;
use function mb_strtolower;
use function pathinfo;
use function preg_replace;
use function sprintf;
use function strlen;
use function strtolower;
use function substr;

/**
 * Base Writer class that provides properties and methods common to all concrete Writer classes.
 *
 * @psalm-suppress MissingConstructor
 */
abstract class Writer implements WriterInterface
{
    private const string OUTPUT_FILE = '%s' . DIRECTORY_SEPARATOR . '%s.%s';
    private const string TEMPLATE = '%s' . DIRECTORY_SEPARATOR . '%s.%s';
    private const string TEMPLATE_NOT_FOUND = 'Template `%s.%s` not found in `%s`';
    private const string WRITE_FAILED = 'Failed to write `%s`';

    /** @var string Base output directory for rendered templates. */
    public string $outputDir {
        set => $this->outputDir = $value;
    }

    public string $templateDir;

    /** @var TemplateRendererInterface Template renderer */
    public TemplateRendererInterface $templateRenderer {
        set => $this->templateRenderer = $value;
    }

    /**
     * Render an element and write the result to the output directory.
     *
     * @param ObjectElement $element Element to render.
     * @param array{
     *   baseUrl: string,
     *   errorLevel: ErrorLevel,
     *   language: Language,
     *   namespace: string,
     * } $parameters Template parameters.
     * @return void
     * @throws Throwable
     * @psalm-suppress MoreSpecificImplementedParamType
     */
    #[Override]
    public function writeElement(ObjectElement $element, array $parameters): void
    {
        $parameters['element'] = $element;
        $this->writeFile(
            strtolower($element->elementType),
            $parameters,
            substr($element->fqcn, strlen($element->rootNamespace) + 1)
        );
    }

    /**
     * Write the API index file.
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
     * @psalm-suppress MoreSpecificImplementedParamType
     */
    #[Override]
    public function writeIndex(array $elements, array $parameters): void
    {
        $classes = array_filter(
            $elements,
            fn ($element): bool => $element instanceof ClassElement
        );
        $enums = array_filter(
            $elements,
            fn ($element): bool => $element instanceof EnumElement
        );
        $interfaces = array_filter(
            $elements,
            fn ($element): bool => $element instanceof InterfaceElement
        );
        $traits = array_filter(
            $elements,
            fn ($element): bool => $element instanceof TraitElement
        );

        usort($classes, fn (ClassElement $a, ClassElement $b) => $a->fqcn <=> $b->fqcn);
        usort($enums, fn (EnumElement $a, EnumElement $b) => $a->fqcn <=> $b->fqcn);
        usort($interfaces, fn (InterfaceElement $a, InterfaceElement $b) => $a->fqcn <=> $b->fqcn);
        usort($traits, fn (TraitElement $a, TraitElement $b) => $a->fqcn <=> $b->fqcn);

        $parameters['element'] = new class () {
            public string $name = 'Index';
            public string $summary = 'API Index';
            public string $elementType = '';
        };

        $this->writeFile(
            'index',
            array_merge($parameters, compact('classes', 'enums', 'interfaces', 'traits')),
            'index'
        );
    }

    /**
     * Called from the CodPhp command after writeIndex().
     * Override to generate any other required documents.
     *
     * All rendered elements, indexed by their FQCN, are contained in the `$elements` property.
     *
     * Call writeFile() to render a template.
     * If the output file extension differs from the Writer's default, set the `$extension` parameter in the call.
     *
     * @param ObjectElement[] $elements Namespace elements.
     * @param array{
     *   baseUrl: string,
     *   errorLevel: ErrorLevel,
     *   language: Language,
     *   namespace: string,
     * } $parameters Template parameters.
     * @return void
     * @psalm-suppress MoreSpecificImplementedParamType
     */
    #[Override]
    public function writeOther(array $elements, array $parameters): void
    {
    }

    /**
     * Render a template and return the result.
     *
     * @param string $template Template to render.
     * @param array<string, mixed> $parameters Template parameters.
     * @return string
     * @throws Throwable
     * @psalm-suppress MoreSpecificImplementedParamType
     */
    #[Override]
    public function render(string $template, array $parameters = []): string
    {
        $templateFile = $this->findTemplateFile($template);

        $output = '';

        if ($this->beforeRender($templateFile, $parameters)) {
            $output = $this->templateRenderer->render($this, $templateFile, $parameters);
            $output = $this->afterRender($templateFile, $parameters, $output);
        }

        return $output;
    }

    /**
     * Called immediately after a template has been rendered.
     *
     * Override this method to post-process the rendering result.
     *
     * @param string $templateFile Template file.
     * @param array<string, mixed> $parameters Template parameters.
     * @param string $output Rendering result.
     * @return string Post-processed rendering result.
     */
    protected function afterRender(string $templateFile, array $parameters, string $output): string
    {
        return $output;
    }

    /**
     * Called immediately before rendering a template.
     *
     * Override this method to decide whether the template should be rendered.
     *
     * @param string $templateFile Template file.
     * @param array<string, mixed> $parameters Template parameters.
     * @return bool `true` if the template should be rendered, `false` if not.
     */
    protected function beforeRender(string $templateFile, array $parameters): bool
    {
        return true;
    }

    /**
     * Renders a template and writes the output file.
     *
     * @param string $template Template to render.
     * @param array<string, mixed> $params Template parameters.
     * @param string $outputFile Output file without an extension
     * @param string|null $extension Output file extension. If `null` the $outputExtension property in the concrete Writer provides it.
     * @throws Throwable
     */
    protected function writeFile(
        string $template,
        array $params,
        string $outputFile,
        ?string $extension = null
    ): void {
        $output = $this->render($template, $params);

        $outputFile = $this->outputFile($outputFile, $extension ?? $this->outputExtension);

        if (file_put_contents($outputFile, $output, LOCK_EX) === false) {
            throw new OutputFileNotWrittenException(sprintf(self::WRITE_FAILED, $outputFile));
        }
    }

    private function findTemplateFile(string $template): string
    {
        $templateFile = sprintf(
            self::TEMPLATE,
            $this->templateDir,
            $template,
            $this->templateRenderer->extension
        );

        if (!is_file($templateFile)) {
            throw new TemplateNotFoundException(sprintf(
                self::TEMPLATE_NOT_FOUND,
                $template,
                $this->templateRenderer->extension,
                $this->templateDir
            ));
        }

        return $templateFile;
    }

    /**
     * Determines the output filename and ensures the directory exists.
     *
     * @param string $path Path to the file including basename
     * @param string $extension File extension
     * @return string Output file
     */
    private function outputFile(string $path, string $extension): string
    {
        /** @psalm-suppress PossiblyNullArgument */
        $file = mb_strtolower(preg_replace('/(?<=\p{L})(\p{Lu})/u', '-\1', $path));

        $filename = sprintf(
            self::OUTPUT_FILE,
            $this->outputDir,
            str_replace('\\', DIRECTORY_SEPARATOR, $file),
            $extension
        );

        FileHelper::ensureDirectory(pathinfo($filename, PATHINFO_DIRNAME));

        return $filename;
    }
}