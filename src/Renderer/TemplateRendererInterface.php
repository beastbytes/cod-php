<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Renderer;

use BeastBytes\CodPhp\Writer\WriterInterface;

/** Interface for template renderers. */
interface TemplateRendererInterface
{
    /** @var string Template file extension used by the renderer. */
    public string $extension { get; }

    /**
     * Render a template.
     *
     * @param WriterInterface $writer Writer instance to be bound to the renderer; `$this` in the template.
     * @param string $template Template to render.
     * @param array $parameters Template parameters.
     * @return string
     */
    public function render(WriterInterface $writer, string $template, array $parameters): string;
}