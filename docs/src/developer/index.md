# Developers

This section provides information useful to developers of writers, template renderers, and templates.

## Overview

The Writer and Template Renderer are fully decoupled. This allows any Writer - which determines the output format -
to be used with any Template Renderer - which renders templates of a given format. Templates are where the two meet;
they are written in the format targeted by the Template Renderer and output documentation in the Writer's output format.

### Writer

A Writer is responsible for rendering templates using a template renderer and writing the rendering results.
A Writer writes rendering results in a specific output format,
e.g. [Markdown](https://www.markdownlang.com/), [reStructuredText](https://docutils.sourceforge.io/rst.html), etc.
It may also target a specific platform; e.g. the built-in `VitePress` writer.

### Template and Template Renderer

Templates are written to support a specific template renderer,
e.g. `.php` templates are rendered using the built-in `PhpTemplateRenderer`.

A set of templates will render to the required output format, 
e.g. the built-in `.php` templates render to [Markdown](https://www.markdownlang.com/).
If the desired output format is [reStructuredText](https://docutils.sourceforge.io/rst.html)
a set of templates that render to [reStructuredText](https://docutils.sourceforge.io/rst.html) is required.

To use - say - `.latte` templates,
a template renderer capable of rendering [Latte](https://latte.nette.org/) templates is required;
similarly, `.twig` templates require a [Twig](https://twig.symfony.com/) template renderer, 
and so on for other template formats.

Related:

* [Template Development](template.md)
* [Template Renderer Development](template-renderer.md)
* [Writer Development](writer.md)