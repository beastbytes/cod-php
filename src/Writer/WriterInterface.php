<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Writer;

use BeastBytes\CodPhp\Element\ObjectElement;
use BeastBytes\CodPhp\Renderer\TemplateRendererInterface;

/** An interface for Writer classes. */
interface WriterInterface
{
    /** @var string Output directory. */
    public string $outputDir { set; }

    /** @var string Template directory. */
    public string $templateDir { set; }

    /** @var TemplateRendererInterface Template Renderer. */
    public TemplateRendererInterface $templateRenderer { set; }

    /**
     * Render a template and return the result.
     *
     * @param string $template Template to render.
     * @param array $parameters Template parameters.
     * @return string
     */
    public function render(string $template, array $parameters): string;

    /**
     * Render an element and write the result to the output directory.
     *
     * @param ObjectElement $element Element to render
     * @param array<string, mixed> $parameters Template parameters
     * @return void
     */
    public function writeElement(ObjectElement $element, array $parameters): void;

    /**
     * Render an index page for the elements and write the result to the output directory.
     *
     * @param ObjectElement[] $elements Namespace elements
     * @param array<string, mixed> $parameters Template parameters
     * @return void
     */
    public function writeIndex(array $elements, array $parameters): void;

    /**
     * Render other relevant document(s) and/or files if required.
     *
     * @param ObjectElement[] $elements Namespace elements
     * @param array<string, mixed> $parameters Template parameters
     * @return void
     */
    public function writeOther(array $elements, array $parameters): void;
}