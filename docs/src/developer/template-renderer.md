# Template Renderer Development

The template renderer is responsible for rendering templates and returning the rendering result.

A template renderer renders a specific template type;
it is responsible for instantiating the template rendering engine if required.

**CodPhp** provides a PHP template renderer.

## Requirements

* Implement [`TemplateRendererInterface`](../api/writer/template-renderer-interface.md)

## Properties

* $extension (readonly, [string](https://www.php.net/manual/en/language.types.string.php)) - template file extension

## Methods

### render(): string

This method renders a template using the renderer's templating engine and returns the rendering result.

#### Parameters

* $writer ([`WriterInterface`](../api/writer-interface.md)) - Writer instance.
* $template ([string](https://www.php.net/manual/en/language.types.string.php)) - Template to render.
* $parameters ([array](https://www.php.net/manual/en/language.types.array.php)) - template parameters indexed by name. These should be passed to the template renderer.

::: tip
Pass the `WriterInterface` instance to the template.

The built-in PHP template renderer binds the `WriterInterface` instance which appears in the template as `$this`.

Other renderers may pass the `WriterInstance` to the template as a parameter; see the example below. 
:::

## Example

This is an example renderer for [Latte](https://latte.nette.org) templates.

```php
<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Writer;

use BeastBytes\CodPhp\Element\ObjectElement;
use BeastBytes\CodPhp\Renderer\TemplateRendererInterface;
use Latte\{ContentType,Engine};use Override;

use function sys_get_temp_dir;

/**
 * `LatteTemplateRenderer` renders Latte templates.
 */
final class LatteTemplateRenderer implements TemplateRendererInterface
{
    private const string EXTENSION = 'latte';

    public string $extension {
        get => self::EXTENSION;
    }

    private Engine $engine;

    public function __construct()
    {
        $this->engine = new Engine()
            ->setStrictParsing()
            ->setStrictTypes()
            ->setTempDirectory(sys_get_temp_dir())
            ->setContentType(ContentType::Text)
        ;
    }

    /**
     * Render a Latte template.
     *
     * @param WriterInterface $writer Writer instance.
     * @param string $template Template to render.
     * @param array{element: ObjectElement, ...} $parameters Template parameters.
     * @return string
     */
    #[Override]
    public function render(WriterInterface $writer, string $template, array $parameters): string
    {
        $parameters['writer'] = $writer;
        return $this->engine->renderToString($template, $parameters);
    }
}
```
