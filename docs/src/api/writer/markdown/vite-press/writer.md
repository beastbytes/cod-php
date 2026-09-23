---
title: Writer
lastUpdated: 2026-09-23 10:29:05
description: Writer that generates documentation in Markdown format and configuration for use with the VitePress static site generator.
head:
  - - meta
    - name: element-type
      content: Class
  - - meta
    - name: Generator
      content: CodPhp
---

# <span class="cod-php-modifier">final</span> class `Writer`

<a  href="https://github.com/beastbytes/cod-php/blob/master/src/Writer/Markdown/VitePress/Writer.php">Source Code</a>

Writer that generates documentation in Markdown format and configuration for use with the VitePress static site generator.

<table><tbody><tr><th>Namespace</th><td>BeastBytes\CodPhp\Writer\Markdown\VitePress</td></tr><tr><th>Inheritance</th><td>

BeastBytes\CodPhp\Writer\Markdown\VitePress\Writer<br>[BeastBytes\CodPhp\Writer\Markdown\Writer](../writer.md)<br>[BeastBytes\CodPhp\Writer\Writer](../../writer.md)

</td></tr><tr><th>Implements</th><td>

[BeastBytes\CodPhp\Writer\WriterInterface](../../writer-interface.md)

</td></tr></tbody></table>


## Properties

### $outputDir
Base output directory for rendered templates.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.string.php">string</a> | Write |  |

Declared in [BeastBytes\CodPhp\Writer\Writer](../../writer)

---



### $templateDir
Template directory relative to the Writer.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.string.php">string</a> | Write |  |

Declared in BeastBytes\CodPhp\Writer\Markdown\VitePress\Writer

---



### $templateRenderer
Template renderer

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="../../../Renderer/TemplateRendererInterface.md">BeastBytes\CodPhp\Renderer\TemplateRendererInterface</a> | Write |  |

Declared in [BeastBytes\CodPhp\Writer\Writer](../../writer)

---



## Methods

### render()
Render a template and return the result.

<table><tbody><tr><td colspan="3"><span class="cod-php-visibility">public</span>  function render(<span class="cod-php-type"><a  href="https://www.php.net/manual/en/language.types.string.php">string</a></span> $template, <span class="cod-php-type"><a  href="https://www.php.net/manual/en/language.types.array.php">array</a></span> $parameters = []): <span class="type"><a  href="https://www.php.net/manual/en/language.types.string.php">string</a></span></td></tr><tr><td>$template</td><td><a  href="https://www.php.net/manual/en/language.types.string.php">string</a></td><td>Template to render.</td></tr><tr><td>$parameters</td><td><a  href="https://www.php.net/manual/en/language.types.array.php">array</a></td><td>Template parameters.</td></tr><tr><td>return</td><td><a  href="https://www.php.net/manual/en/language.types.string.php">string</a></td><td></td></tr><tr><td>throws</td><td><a  href="https://www.php.net/manual/en/class.throwable.php">Throwable</a></td><td></td></tr></tbody></table>

Declared in [BeastBytes\CodPhp\Writer\Writer](../../writer)


---

### writeElement()
Render an element and write the result to the output directory.

<table><tbody><tr><td colspan="3"><span class="cod-php-visibility">public</span>  function writeElement(<span class="cod-php-type"><a  href="../../../Element/ObjectElement.md">BeastBytes\CodPhp\Element\ObjectElement</a></span> $element, <span class="cod-php-type"><a  href="https://www.php.net/manual/en/language.types.array.php">array</a></span> $parameters): <span class="type"><a  href="https://www.php.net/manual/en/language.types.void.php">void</a></span></td></tr><tr><td>$element</td><td><a  href="../../../Element/ObjectElement.md">BeastBytes\CodPhp\Element\ObjectElement</a></td><td>Element to render.</td></tr><tr><td>$parameters</td><td><a  href="https://www.php.net/manual/en/language.types.array.php">array</a></td><td>Template parameters.</td></tr><tr><td>return</td><td><a  href="https://www.php.net/manual/en/language.types.void.php">void</a></td><td></td></tr><tr><td>throws</td><td><a  href="https://www.php.net/manual/en/class.throwable.php">Throwable</a></td><td></td></tr></tbody></table>

Declared in [BeastBytes\CodPhp\Writer\Writer](../../writer)


---

### writeIndex()
Write the API index file.

<table><tbody><tr><td colspan="3"><span class="cod-php-visibility">public</span>  function writeIndex(<span class="cod-php-type"><a  href="https://www.php.net/manual/en/language.types.array.php">array</a></span> $elements, <span class="cod-php-type"><a  href="https://www.php.net/manual/en/language.types.array.php">array</a></span> $parameters): <span class="type"><a  href="https://www.php.net/manual/en/language.types.void.php">void</a></span></td></tr><tr><td>$elements</td><td><a  href="https://www.php.net/manual/en/language.types.array.php">array</a></td><td>Namespace elements.</td></tr><tr><td>$parameters</td><td><a  href="https://www.php.net/manual/en/language.types.array.php">array</a></td><td>Template parameters.</td></tr><tr><td>return</td><td><a  href="https://www.php.net/manual/en/language.types.void.php">void</a></td><td></td></tr><tr><td>throws</td><td><a  href="https://www.php.net/manual/en/class.throwable.php">Throwable</a></td><td></td></tr></tbody></table>

Declared in [BeastBytes\CodPhp\Writer\Writer](../../writer)


---

### writeOther()
Write other documents.

<table><tbody><tr><td colspan="3"><span class="cod-php-visibility">public</span>  function writeOther(<span class="cod-php-type"><a  href="https://www.php.net/manual/en/language.types.array.php">array</a></span> $elements, <span class="cod-php-type"><a  href="https://www.php.net/manual/en/language.types.array.php">array</a></span> $parameters = []): <span class="type"><a  href="https://www.php.net/manual/en/language.types.void.php">void</a></span></td></tr><tr><td>$elements</td><td><a  href="https://www.php.net/manual/en/language.types.array.php">array</a></td><td>Namespace elements.</td></tr><tr><td>$parameters</td><td><a  href="https://www.php.net/manual/en/language.types.array.php">array</a></td><td>Template parameters.</td></tr><tr><td>return</td><td><a  href="https://www.php.net/manual/en/language.types.void.php">void</a></td><td></td></tr><tr><td>throws</td><td><a  href="https://www.php.net/manual/en/class.throwable.php">Throwable</a></td><td></td></tr></tbody></table>

Declared in BeastBytes\CodPhp\Writer\Markdown\VitePress\Writer


---

Generated by <a  target="_blank"  href="https://github.com/beastbytes/cod-php">CodPhp</a>