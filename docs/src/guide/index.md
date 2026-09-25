# CodPhp

<div style="text-align:center">

![logo](../public/cod-php.svg)

</div>

**CodPhp** is an API document generator for PHP that uses [Reflection](https://www.php.net/manual/en/book.reflection.php) (hence the name)
to analyse files in a given namespace.
It uses a Writer, templates, and a template renderer to generate the documentation in any desired format;
out-of-the-box, **CodPhp** generates documentation in [Markdown](https://www.markdownlang.com/) suitable for use with [VitePress](https://vitepress.dev/).

## Features
* **Reflection analysis of the namespace** - **CodPhp** analyses all Classes, Enums, Interfaces, and Traits, and the Constants, Methods, and Properties in them.
* **PhpDoc docBlock parsing** - **CodPhp** parses docBlocks to extract element summary and/or description, and some tags.
* **Inheritance** - **CodPhp** shows inheritance for classes, interfaces, and traits, and class child-classes, interface implementation, and trait usage. 
* **Cross-referencing** - **CodPhp** generates links between elements in the namespace.
* **Type referencing** - **CodPhp** generates links to PHP types and extension classes and exceptions, and namespace defined types.
* **Source code links** - **CodPhp** optionally generates links to source code.
* **Error reporting** - **CodPhp** collects and reports errors found in the documentation.
* **Flexible templating and output formating** - **CodPhp** supports using a user defined template renderers, templates, and/or Writers, allowing documentation to be generated in any format. Out-of-the-box, **CodPhp** generates documentation in [Markdown](https://www.markdownlang.com/) suitable for use with [VitePress](https://vitepress.dev/).

## Supported DocBlock Tags
### Standard Tags
* `@api` - Includes an element in the API; documentation for the element is generated. **Note**: higher precedence than `@ignore` and `@internal`.
* `@copyright` - Generates a copyright notice.
* `@deprecated` - Generates a deprecation notice.
* `@ignore` - Excludes an element from the API; documentation for the element is *not* generated. Equivalent to `@internal`. **Note**: lower precedence than `@api`.
* `@internal` - Excludes an element from the API; documentation for the element is *not* generated. Equivalent to `@ignore`. **Note**: lower precedence than `@api`.
* `@link` - Generates a link to a URL.
* `@method` - Documents methods called via `_call` or `_callStatic`.
* `@property, @property-read, @property-write` - Documents properties accessed via `_get` and `_set`.
* `@return` - Documents a method return type.
* `@see` - Generates a link to another element, part of the documentation, or a URL.
* `@since` - Documents the package version an element was introduced or modified.
* `@throws` - Documents an Exception.
* `@version` - Documents the version of the element.

::: info
An element _should_ only have one of the `@api`, `@ignore`, `@internal` tags. 
If an element has an `@api` tag and either an `@ignore` or `@internal` tag, 
the `@api` tag takes precedence and documentation for the element is generated.

If an element does not have DocBlock or any of the `@api`, `@ignore` or `@internal` tags,
it is considered to be part of the API and documentation for the element is generated.
:::

### Custom Tags
*CodPhp* supports the use of custom tags of the form `@tagNane tagContent`.

::: info
Use of custom tags is template dependant; see the documentation for the templates being used.
:::

#### Built-in Templates
* `@default` - Can be applied to methods to define a default value if the method is not called. 

## Renderer, Templates, and Writer
### Out-of-the-box
**CodPhp** comes with a built-in template renderer that renders PHP templates, and a set of PHP templates and a Writer
that generate documentation in [Markdown](https://www.markdownlang.com/) suitable for use with [VitePress](https://vitepress.dev/),
and a [JSON5](https://json5.org/) file, `<outputDir>/_vitepress_/config.json5`, that provides
the API document tree for the `themeConfig.sidebar` setting in `config.mts`.

Each Class, Enum, Interface, and Trait, with their Constants, Cases, Methods and Parameters, and Properties,
is documented on its own page, with the documentation structured according to the namespace directory layout.

### Using Different Templates
Different templates 

The built-in templates can be replaced by providing
the directory of the templates to use in the [configuration](configuration.md#templatedir).

This allows use of a different template renderer, and/or generating documentation with a different layout, language,
or format, and using a different Writer.

### Using a Different Template Renderer
To use a different template rendering engine, 
such as [Latte](https://latte.nette.org/), [Twig](https://twig.symfony.com/), etc,
provide the Fully Qualified Class Name of a template renderer that uses that engine
and implements `TemplateRendererInterface` in the **CodPhp** [configuration](configuration.md#renderer).

::: info
Using a different template renderer requires templates written for it.
:::

::: tip REQUEST
If you create a template renderer, please let us know so we can link to it.
:::

### Using a Different Writer
To generate documentation in a format other than Markdown,
provide the Fully Qualified Class Name of a Writer that implements `WriterInterface`
by providing the Fully Qualified Class Name of the Writer in the **CodPhp** [configuration](configuration.md#writer)

::: info
Using a different Writer requires templates written for it and a template renderer for them.
:::

::: tip REQUEST
If you create a Writer, please let us know so we can link to it.
:::

## Example

The [**CodPhp** API documentation](../api/index.md) is generated using **CodPhp**.

## Glossary

* **Element** - a structural element that can be documented:
    * Class
    * Constant
    * Enum
    * Enum Case
    * Interface
    * Method
    * Property
    * Parameter
    * Trait
* **Object Element** - the sub-set of elements that are an _'object'_:
    * Class
    * Enum
    * Interface
    * Trait
* **Template** - a file that determines the content to show for an element.
* **Template Renderer** - a class that renders templates of a specific type, e.g. Latte, PHP, Twig, etc.
* **Writer** - a class that renders elements (using a template renderer) and writes the output files.