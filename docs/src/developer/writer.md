# Writer Development

The Writer is responsible for rendering templates using a template renderer and writing the rendering result.

## Overview

**CodPhp** passes each `Object Element` found in the specified namespace to the `WriteElement()` method;
the order of the elements is unspecified and should not be relied on.
**CodPhp** then calls `WriteIndex()` followed by `WriteOther()`.

**CodPhp** provides a base [`Writer`](../api/writer/writer.md) that can be extended;
see the built-in [`VitePressWriter`](../api/vite-press/writer.md) for an example.

## Requirements

* Implement [`WriterInterface`](../api/writer-interface.md)

## Optional

* Extend [`Writer`](../api/writer/writer.md)

## Properties

Writer has three properties that are set by the [**CodPhp** command](../api/command/cod-php.md),
so the Writer can be sure that they are valid.

* $outputDir ([string](https://www.php.net/manual/en/language.types.array.php)) - the output directory where generated documents are written to. Relative to the current working directory.
* $templateDir ([string](https://www.php.net/manual/en/language.types.array.php)) - the directory containing templates. Relative to the directory of the concrete Writer class.
* $templateRenderer ([`TemplateRendererInterface`](../api/writer/template-renderer-interface.md)) - an instance of the [template-renderer](template-renderer.md).

---

## Methods

### render(): string

This method renders a template and returns the rendering result.

Use in templates for rendering partial templates.

[`TemplateRendererTrait`](../api/writer/template-renderer-trait.md) provides this method.

[`TemplateRendererTrait`](../api/writer/template-renderer-trait.md) provides two hooks in the rendering process.

* beforeRender() - called immediately before the template is rendered. Determines whether the rendering process should continue.
    * Parameters
        * $template ([string](https://www.php.net/manual/en/language.types.string.php)) - the filename of the template to be rendered.
        * $parameters ([array](https://www.php.net/manual/en/language.types.array.php)) - template parameters indexed by name.
    * Returns: [bool](https://www.php.net/manual/en/language.types.boolean.php) - `true` if the rendering process should continue, `false` if not.
    * Default: returns `true`.
* afterRender() - called immediately after the template has been rendered. *May* modify the rendering result. 
  * Parameters
    * $template ([string](https://www.php.net/manual/en/language.types.string.php)) - the filename of the template to be rendered.
    * $parameters ([array](https://www.php.net/manual/en/language.types.array.php)) - template parameters indexed by name.
    * $output ([string](https://www.php.net/manual/en/language.types.string.php)) - 
  * Returns: [string](https://www.php.net/manual/en/language.types.string.php) - Modified rendering result.
  * Default: returns the rendering result unmodified.

The Writer *may* override these hooks.
For example, the built-in [`VitePressWriter`](../api/vite-press/writer.md) overrides `afterRender()`
to add a header and footer to the rendering result of [ObjectElements](../api/element/object-element.md).

#### Parameters

* $template ([string](https://www.php.net/manual/en/language.types.string.php)) - Template to render.
* $parameters ([array](https://www.php.net/manual/en/language.types.array.php)) - template parameters indexed by name.

### writeElement(): void

This method is responsible for rendering and writing the rendering result for
[`ObjectElements`](../api/element/object-element.md). 
It is called by the [**CodPhp** command](../api/command/cod-php.md)
once for each [`ObjectElement`](../api/element/object-element.md) in the namespace.

[Writer\Writer](../api/writer/writer.md) provides this method.

#### Parameters

* $element ([`ObjectElement`](../api/element/object-element.md)) - the [`ObjectElement`](../api/element/object-element.md) to render and write
* $parameters ([array{string: mixed}](https://www.php.net/manual/en/language.types.array.php)) - parameters for the template indexed by name.
    * baseUrl ([string](https://www.php.net/manual/en/language.types.string.php)) - the base URL for source code links.
    * errorLevel ([`ErrorLevel`](../api/error/error-level.md)) - the minimum error level to report.
    * language ([`Language`](../api/language.md)) - the PHP documentation language for type links.
    * namespace ([string](https://www.php.net/manual/en/language.types.string.php)) - the namespace being rendered.

These should be passed to the template renderer.

---

### writeIndex(): void

This method is called by the [**CodPhp** command](../api/command/cod-php.md)
after all [`ObjectElements`](../api/element/object-element.md) have been processed.
It *may* generate an index page for the API.

The implementation in [`Writer\Writer`](../api/writer/writer.md) does nothing.
If extending [`Writer\Writer`](../api/writer/writer.md), override the method to generate an index page.

#### Parameters

* $elements ([`ObjectElement[]`](../api/element/object-element.md)) - all [`ObjectElements`](../api/element/object-element.md) indexed by their FQCN.
* $parameters ([array{string: mixed}](https://www.php.net/manual/en/language.types.array.php)) - parameters for the template indexed by name.
  * baseUrl ([string](https://www.php.net/manual/en/language.types.string.php)) - the base URL for source code links.
  * errorLevel ([`ErrorLevel`](../api/error/error-level.md)) - the minimum error level to report.
  * language ([`Language`](../api/language.md)) - the PHP documentation language for type links.
  * namespace ([string](https://www.php.net/manual/en/language.types.string.php)) - the namespace being rendered.

These should be passed to the template renderer.

---

### writeOther(): void

This method is called by the [**CodPhp** command](../api/command/cod-php.md)
after [`Writeindex()`](#writeindex).
It *may* generate other relevant files;
for example, the built-in writer generates a file that can be used in the [Sidebar](hhttps://vitepress.dev/reference/default-theme-sidebar)
section of the [VitePress configuration file](https://vitepress.dev/reference/site-config).

The implementation in [`Writer\Writer`](../api/writer/writer.md) does nothing.
If extending [`Writer\Writer`](../api/writer/writer.md), override to generate other files.

#### Parameters

* $elements ([`ObjectElement[]`](../api/element/object-element.md)) - all [`ObjectElements`](../api/element/object-element.md) indexed by their FQCN.
* $parameters ([array{string: mixed}](https://www.php.net/manual/en/language.types.array.php)) - parameters for the template indexed by name.
  * baseUrl ([string](https://www.php.net/manual/en/language.types.string.php)) - the base URL for source code links.
  * errorLevel ([`ErrorLevel`](../api/error/error-level.md)) - the minimum error level to report.
  * language ([`Language`](../api/language.md)) - the PHP documentation language for type links.
  * namespace ([string](https://www.php.net/manual/en/language.types.string.php)) - the namespace being rendered.

These should be passed to the template renderer.
