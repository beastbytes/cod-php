---
title: WriterInterface
lastUpdated: 2026-09-24 18:43:48
description: An interface for Writer classes.
head:
  - - meta
    - name: element-type
      content: Interface
  - - meta
    - name: Generator
      content: CodPhp
---

# interface `WriterInterface`

<a  href="https://github.com/beastbytes/cod-php/blob/master/src/Writer/WriterInterface.php">Source Code</a>

An interface for Writer classes.

# interface `WriterInterface`

<a  href="https://github.com/beastbytes/cod-php/blob/master/src/Writer/WriterInterface.php">Source Code</a>

An interface for Writer classes.

<table><tbody><tr><th>Namespace</th><td>BeastBytes\CodPhp\Writer</td></tr><tr><th>Inheritance</th><td>

BeastBytes\CodPhp\Writer\WriterInterface

</td></tr><tr><th>Implemented by</th><td>

[BeastBytes\CodPhp\Writer\Markdown\VitePress\Writer](markdown/vite-press/writer.md)<br>[BeastBytes\CodPhp\Writer\Markdown\Writer](markdown/writer.md)<br>[BeastBytes\CodPhp\Writer\Writer](writer.md)

</td></tr></tbody></table>


## Properties

### $outputDir
Output directory.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.string.php">string</a> | Write |  |

Declared in BeastBytes\CodPhp\Writer\WriterInterface

---



### $templateDir
Template directory.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.string.php">string</a> | Write |  |

Declared in BeastBytes\CodPhp\Writer\WriterInterface

---



### $templateRenderer
Template Renderer.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="../Renderer/TemplateRendererInterface.md">BeastBytes\CodPhp\Renderer\TemplateRendererInterface</a> | Write |  |

Declared in BeastBytes\CodPhp\Writer\WriterInterface

---



## Methods

### render()
Render a template and return the result.

<table><tbody><tr><td colspan="3"><span class="cod-php-modifier">abstract</span> <span class="cod-php-visibility">public</span>  function render(<span class="cod-php-type"><a  href="https://www.php.net/manual/en/language.types.string.php">string</a></span> $template, <span class="cod-php-type"><a  href="https://www.php.net/manual/en/language.types.array.php">array</a></span> $parameters): <span class="type"><a  href="https://www.php.net/manual/en/language.types.string.php">string</a></span></td></tr><tr><td>$template</td><td><a  href="https://www.php.net/manual/en/language.types.string.php">string</a></td><td>Template to render.</td></tr><tr><td>$parameters</td><td><a  href="https://www.php.net/manual/en/language.types.array.php">array</a></td><td>Template parameters.</td></tr><tr><td>return</td><td><a  href="https://www.php.net/manual/en/language.types.string.php">string</a></td><td></td></tr></tbody></table>

Declared in BeastBytes\CodPhp\Writer\WriterInterface


---

### writeElement()
Render an element and write the result to the output directory.

<table><tbody><tr><td colspan="3"><span class="cod-php-modifier">abstract</span> <span class="cod-php-visibility">public</span>  function writeElement(<span class="cod-php-type"><a  href="../Element/ObjectElement.md">BeastBytes\CodPhp\Element\ObjectElement</a></span> $element, <span class="cod-php-type"><a  href="https://www.php.net/manual/en/language.types.array.php">array</a></span> $parameters): <span class="type"><a  href="https://www.php.net/manual/en/language.types.void.php">void</a></span></td></tr><tr><td>$element</td><td><a  href="../Element/ObjectElement.md">BeastBytes\CodPhp\Element\ObjectElement</a></td><td>Element to render</td></tr><tr><td>$parameters</td><td><a  href="https://www.php.net/manual/en/language.types.array.php">array</a></td><td>Template parameters</td></tr><tr><td>return</td><td><a  href="https://www.php.net/manual/en/language.types.void.php">void</a></td><td></td></tr></tbody></table>

Declared in BeastBytes\CodPhp\Writer\WriterInterface


---

### writeIndex()
Render an index page for the elements and write the result to the output directory.

<table><tbody><tr><td colspan="3"><span class="cod-php-modifier">abstract</span> <span class="cod-php-visibility">public</span>  function writeIndex(<span class="cod-php-type"><a  href="https://www.php.net/manual/en/language.types.array.php">array</a></span> $elements, <span class="cod-php-type"><a  href="https://www.php.net/manual/en/language.types.array.php">array</a></span> $parameters): <span class="type"><a  href="https://www.php.net/manual/en/language.types.void.php">void</a></span></td></tr><tr><td>$elements</td><td><a  href="https://www.php.net/manual/en/language.types.array.php">array</a></td><td>Namespace elements</td></tr><tr><td>$parameters</td><td><a  href="https://www.php.net/manual/en/language.types.array.php">array</a></td><td>Template parameters</td></tr><tr><td>return</td><td><a  href="https://www.php.net/manual/en/language.types.void.php">void</a></td><td></td></tr></tbody></table>

Declared in BeastBytes\CodPhp\Writer\WriterInterface


---

### writeOther()
Render other relevant document(s) and/or files if required.

<table><tbody><tr><td colspan="3"><span class="cod-php-modifier">abstract</span> <span class="cod-php-visibility">public</span>  function writeOther(<span class="cod-php-type"><a  href="https://www.php.net/manual/en/language.types.array.php">array</a></span> $elements, <span class="cod-php-type"><a  href="https://www.php.net/manual/en/language.types.array.php">array</a></span> $parameters): <span class="type"><a  href="https://www.php.net/manual/en/language.types.void.php">void</a></span></td></tr><tr><td>$elements</td><td><a  href="https://www.php.net/manual/en/language.types.array.php">array</a></td><td>Namespace elements</td></tr><tr><td>$parameters</td><td><a  href="https://www.php.net/manual/en/language.types.array.php">array</a></td><td>Template parameters</td></tr><tr><td>return</td><td><a  href="https://www.php.net/manual/en/language.types.void.php">void</a></td><td></td></tr></tbody></table>

Declared in BeastBytes\CodPhp\Writer\WriterInterface


---

Generated by <a  target="_blank"  href="https://github.com/beastbytes/cod-php">CodPhp</a>