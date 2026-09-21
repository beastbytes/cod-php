<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Renderer;

use BeastBytes\CodPhp\Element\ObjectElement;
use BeastBytes\CodPhp\Writer\WriterInterface;
use Override;
use Throwable;

use function extract;
use function func_get_arg;
use function ob_end_clean;
use function ob_get_clean;
use function ob_get_level;
use function ob_implicit_flush;
use function ob_start;

/** Renders PHP templates. */
final class PhpTemplateRenderer implements TemplateRendererInterface
{
    private const string EXTENSION = 'php';
    private const string RENDER_FAILED = 'Failed to render `%s` with `%s`';

    /** @var string Template file extension. */
    public string $extension {
        get => self::EXTENSION;
    }

    /**
     * Render a PHP template.
     *
     * @param WriterInterface $writer Writer instance to be bound to the renderer; `$this` in the template.
     * @param string $template Template to render.
     * @param array{element: ObjectElement, ...} $parameters Template parameters.
     * @return string
     * @throws Throwable If render fails.
     * @psalm-suppress MoreSpecificImplementedParamType
     */
    #[Override]
    public function render(WriterInterface $writer, string $template, array $parameters): string
    {
        $renderer = function (): void {
            /** @psalm-suppress MixedArgument, PossiblyFalseArgument */
            extract(func_get_arg(1));
            /** @psalm-suppress UnresolvableInclude */
            require func_get_arg(0);
        };

        $obInitialLevel = ob_get_level();
        ob_start();
        ob_implicit_flush(false);
        try {
            /** @psalm-suppress PossiblyNullFunctionCall */
            $renderer->bindTo($writer)($template, $parameters);

            $content = ob_get_clean();

            if ($content === false) {
                throw new RenderFailedException(sprintf(
                    self::RENDER_FAILED,
                    $template,
                    $parameters['element']->fqcn
                ));
            }

            return $content;
        } catch (Throwable $e) {
            while (ob_get_level() > $obInitialLevel) {
                ob_end_clean();
            }
            throw $e;
        }
    }
}