# CodPhp
A Reflection based PHP API Documentation Generator

<div style="text-align:center">

![logo](docs/src/assets/cod-php.svg)

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

For licence information see the [LICENCE](LICENCE.md) file.

Documentation is at https://beastbytes.github.io/cod-php/