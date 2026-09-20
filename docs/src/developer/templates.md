# Template Development

Templates are responsible for the information and layout shown in the generated documentation
and the rendering result in the desired output format.

There are three reasons for developing templates:

1. To support a template renderer;
   for example, [Latte](https://latte.nette.org) templates for a [Latte](https://latte.nette.org) template renderer.
2. To change the generated documentation output format.
3. To change the information, its layout, etc. rendered.

## Nested Templates

Handling nested templates is the responsibility of the template renderer.

`WriterInterface` specifies the `render()` method. This renders a template and returns its value as a string and can
be used to render partial templates

## Documentation Errors

Documentation errors are registered in templates using the [`ErrorCollection`](../api/error/collection.md) class;
call `ErrorCollection::addError()`, `ErrorCollection::addWarning()`, or `ErrorCollection::addNotice()` as appropriate.
What is considered an error, warning, or notice is the choice of the template developer.

## Attribution

While not a requirement, we would appreciate an attribution link to **CodPhp** in developed templates.