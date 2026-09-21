---
title: Helpers
lastUpdated: 2026-09-21 21:00:19
description: Static helper functions for the writer.
head:
  - - meta
    - name: element-type
      content: Class
  - - meta
    - name: Generator
      content: CodPhp
---

# <span class="cod-php-modifier">final</span> class `Helpers`

<a  href="https://github.com/beastbytes/cod-php/blob/master/src/Writer/Markdown/Helpers.php">Source Code</a>

Static helper functions for the writer.



<table><tbody><tr><th>Namespace</th><td>BeastBytes\CodPhp\Writer\Markdown</td></tr><tr><th>Inheritance</th><td>

BeastBytes\CodPhp\Writer\Markdown\Helpers

</td></tr></tbody></table>

## Constants

| Name | Value | Description | Defined In |
|-|-|-|-|
| SYMBOL_INTERSECTION | '&' |  | BeastBytes\CodPhp\Writer\Markdown\Helpers |
| SYMBOL_REFERENCE | '&' |  | BeastBytes\CodPhp\Writer\Markdown\Helpers |
| SYMBOL_UNION | '\|' |  | BeastBytes\CodPhp\Writer\Markdown\Helpers |
| SYMBOL_VARIADIC | '...' |  | BeastBytes\CodPhp\Writer\Markdown\Helpers |

## Methods

### a()
Generates an HTML `<a/>` tag.

<table><tbody><tr><td colspan="3"><span class="cod-php-visibility">public</span> <span class="cod-php-modifier">static</span>  function a(<span class="cod-php-type"><a  href="https://www.php.net/manual/en/language.types.string.php">string</a></span> $content, <span class="cod-php-type"><a  href="https://www.php.net/manual/en/language.types.string.php">string</a></span> $href, <span class="cod-php-type"><a  href="https://www.php.net/manual/en/language.types.array.php">array</a></span> $attributes = []): <span class="type"><a  href="https://www.php.net/manual/en/language.types.string.php">string</a></span></td></tr><tr><td>$content</td><td><a  href="https://www.php.net/manual/en/language.types.string.php">string</a></td><td>Link content</td></tr><tr><td>$href</td><td><a  href="https://www.php.net/manual/en/language.types.string.php">string</a></td><td>Link URL</td></tr><tr><td>$attributes</td><td><a  href="https://www.php.net/manual/en/language.types.array.php">array</a></td><td>HTML attributes</td></tr><tr><td>return</td><td><a  href="https://www.php.net/manual/en/language.types.string.php">string</a></td><td></td></tr></tbody></table>

Declared in BeastBytes\CodPhp\Writer\Markdown\Helpers


---

### deprecationNotice()
Generate a formatted deprecation message.

<table><tbody><tr><td colspan="3"><span class="cod-php-visibility">public</span> <span class="cod-php-modifier">static</span>  function deprecationNotice(<span class="cod-php-type"><a  href="../../Element/Element.md">BeastBytes\CodPhp\Element\Element</a></span> $element): <span class="type"><a  href="https://www.php.net/manual/en/language.types.string.php">string</a></span></td></tr><tr><td>$element</td><td><a  href="../../Element/Element.md">BeastBytes\CodPhp\Element\Element</a></td><td>Current element.</td></tr><tr><td>return</td><td><a  href="https://www.php.net/manual/en/language.types.string.php">string</a></td><td>Deprecation message.</td></tr></tbody></table>

Declared in BeastBytes\CodPhp\Writer\Markdown\Helpers


---

### error()
Generate a formatted error message.

No message is created if the error level is below `$minErrorLevel`.

<table><tbody><tr><td colspan="3"><span class="cod-php-visibility">public</span> <span class="cod-php-modifier">static</span>  function error(<span class="cod-php-type"><a  href="../../Error/Error.md">BeastBytes\CodPhp\Error\Error</a></span> $error, <span class="cod-php-type"><a  href="../../Error/ErrorLevel.md">BeastBytes\CodPhp\Error\ErrorLevel</a></span> $minErrorLevel): <span class="type"><a  href="https://www.php.net/manual/en/language.types.string.php">string</a></span></td></tr><tr><td>$error</td><td><a  href="../../Error/Error.md">BeastBytes\CodPhp\Error\Error</a></td><td>Error.</td></tr><tr><td>$minErrorLevel</td><td><a  href="../../Error/ErrorLevel.md">BeastBytes\CodPhp\Error\ErrorLevel</a></td><td>Minimum error level.</td></tr><tr><td>return</td><td><a  href="https://www.php.net/manual/en/language.types.string.php">string</a></td><td>Error message.</td></tr></tbody></table>

Declared in BeastBytes\CodPhp\Writer\Markdown\Helpers


---

### linkElements()
Generates a Markdown link between two elements or a FQCN to an element.

<table><tbody><tr><td colspan="3"><span class="cod-php-visibility">public</span> <span class="cod-php-modifier">static</span>  function linkElements(<span class="cod-php-type"><a  href="../../Element/ObjectElement.md">BeastBytes\CodPhp\Element\ObjectElement</a>|<a  href="https://www.php.net/manual/en/language.types.string.php">string</a></span> $from, <span class="cod-php-type"><a  href="../../Element/ObjectElement.md">BeastBytes\CodPhp\Element\ObjectElement</a></span> $to): <span class="type"><a  href="https://www.php.net/manual/en/language.types.string.php">string</a></span></td></tr><tr><td>$from</td><td><a  href="../../Element/ObjectElement.md">BeastBytes\CodPhp\Element\ObjectElement</a>|<a  href="https://www.php.net/manual/en/language.types.string.php">string</a></td><td>Start element or FQCN</td></tr><tr><td>$to</td><td><a  href="../../Element/ObjectElement.md">BeastBytes\CodPhp\Element\ObjectElement</a></td><td>Destination element</td></tr><tr><td>return</td><td><a  href="https://www.php.net/manual/en/language.types.string.php">string</a></td><td>Markdown link</td></tr></tbody></table>

Declared in BeastBytes\CodPhp\Writer\Markdown\Helpers


---

### linkList()
Generates a list of links.

<table><tbody><tr><td colspan="3"><span class="cod-php-visibility">public</span> <span class="cod-php-modifier">static</span>  function linkList(<span class="cod-php-type"><a  href="https://www.php.net/manual/en/language.types.array.php">array</a></span> $links, <span class="cod-php-type"><a  href="../../Element/Element.md">BeastBytes\CodPhp\Element\Element</a></span> $element): <span class="type"><a  href="https://www.php.net/manual/en/language.types.string.php">string</a></span></td></tr><tr><td>$links</td><td><a  href="https://www.php.net/manual/en/language.types.array.php">array</a></td><td>Links to list</td></tr><tr><td>$element</td><td><a  href="../../Element/Element.md">BeastBytes\CodPhp\Element\Element</a></td><td></td></tr><tr><td>return</td><td><a  href="https://www.php.net/manual/en/language.types.string.php">string</a></td><td>List of links</td></tr></tbody></table>

Declared in BeastBytes\CodPhp\Writer\Markdown\Helpers


---

### modifiers()
Returns formatted visibility and object modifiers.

<table><tbody><tr><td colspan="3"><span class="cod-php-visibility">public</span> <span class="cod-php-modifier">static</span>  function modifiers(<span class="cod-php-type"><a  href="../../Element/ClassElement.md">BeastBytes\CodPhp\Element\ClassElement</a>|<a  href="../../Element/MethodElement.md">BeastBytes\CodPhp\Element\MethodElement</a></span> $element, <span class="cod-php-type"><a  href="https://www.php.net/manual/en/language.types.boolean.php">bool</a></span> $capitalise = false): <span class="type"><a  href="https://www.php.net/manual/en/language.types.string.php">string</a></span></td></tr><tr><td>$element</td><td><a  href="../../Element/ClassElement.md">BeastBytes\CodPhp\Element\ClassElement</a>|<a  href="../../Element/MethodElement.md">BeastBytes\CodPhp\Element\MethodElement</a></td><td></td></tr><tr><td>$capitalise</td><td><a  href="https://www.php.net/manual/en/language.types.boolean.php">bool</a></td><td></td></tr><tr><td>return</td><td><a  href="https://www.php.net/manual/en/language.types.string.php">string</a></td><td>Formatted modifiers</td></tr></tbody></table>

Declared in BeastBytes\CodPhp\Writer\Markdown\Helpers


---

### parameters()
Returns the parameters for a method declaration.

<table><tbody><tr><td colspan="3"><span class="cod-php-visibility">public</span> <span class="cod-php-modifier">static</span>  function parameters(<span class="cod-php-type"><a  href="../../Element/MethodElement.md">BeastBytes\CodPhp\Element\MethodElement</a></span> $method, <span class="cod-php-type"><a  href="../../Element/ObjectElement.md">BeastBytes\CodPhp\Element\ObjectElement</a></span> $element, <span class="cod-php-type"><a  href="../../Type/Language.md">BeastBytes\CodPhp\Type\Language</a></span> $language): <span class="type"><a  href="https://www.php.net/manual/en/language.types.string.php">string</a></span></td></tr><tr><td>$method</td><td><a  href="../../Element/MethodElement.md">BeastBytes\CodPhp\Element\MethodElement</a></td><td>The method.</td></tr><tr><td>$element</td><td><a  href="../../Element/ObjectElement.md">BeastBytes\CodPhp\Element\ObjectElement</a></td><td>Method parent element.</td></tr><tr><td>$language</td><td><a  href="../../Type/Language.md">BeastBytes\CodPhp\Type\Language</a></td><td>PHP Manual language.</td></tr><tr><td>return</td><td><a  href="https://www.php.net/manual/en/language.types.string.php">string</a></td><td>Method declaration parameters</td></tr><tr><td>throws</td><td><a  href="https://https://www.php.net/manual/en/class.reflectionexception.php">ReflectionException</a></td><td></td></tr></tbody></table>

Declared in BeastBytes\CodPhp\Writer\Markdown\Helpers


---

### sourceLink()
Generate a link to object element source code;

<table><tbody><tr><td colspan="3"><span class="cod-php-visibility">public</span> <span class="cod-php-modifier">static</span>  function sourceLink(<span class="cod-php-type"><a  href="https://www.php.net/manual/en/language.types.string.php">string</a></span> $baseUrl, <span class="cod-php-type"><a  href="../../Element/ObjectElement.md">BeastBytes\CodPhp\Element\ObjectElement</a></span> $element): <span class="type"><a  href="https://www.php.net/manual/en/language.types.string.php">string</a></span></td></tr><tr><td>$baseUrl</td><td><a  href="https://www.php.net/manual/en/language.types.string.php">string</a></td><td>Source code base URL</td></tr><tr><td>$element</td><td><a  href="../../Element/ObjectElement.md">BeastBytes\CodPhp\Element\ObjectElement</a></td><td>Element to link to source</td></tr><tr><td>return</td><td><a  href="https://www.php.net/manual/en/language.types.string.php">string</a></td><td></td></tr></tbody></table>

Declared in BeastBytes\CodPhp\Writer\Markdown\Helpers


---

### tdList()
Generate a list for inclusion in a `<td/>` with items linked from the current element.

<table><tbody><tr><td colspan="3"><span class="cod-php-visibility">public</span> <span class="cod-php-modifier">static</span>  function tdList(<span class="cod-php-type"><a  href="../../Element/ObjectElement.md">BeastBytes\CodPhp\Element\ObjectElement</a></span> $element, <span class="cod-php-type"><a  href="https://www.php.net/manual/en/language.types.string.php">string</a></span> $property): <span class="type"><a  href="https://www.php.net/manual/en/language.types.string.php">string</a></span></td></tr><tr><td>$element</td><td><a  href="../../Element/ObjectElement.md">BeastBytes\CodPhp\Element\ObjectElement</a></td><td>Current element.</td></tr><tr><td>$property</td><td><a  href="https://www.php.net/manual/en/language.types.string.php">string</a></td><td>Property to list.</td></tr><tr><td>return</td><td><a  href="https://www.php.net/manual/en/language.types.string.php">string</a></td><td>List of items.</td></tr></tbody></table>

Declared in BeastBytes\CodPhp\Writer\Markdown\Helpers


---

### toKebabCase()
Converts a `camelCased` or `PascalCased` string to a `kebab-cased` string, e.g. `CodPhp` becomes `cod-php`.

<table><tbody><tr><td colspan="3"><span class="cod-php-visibility">public</span> <span class="cod-php-modifier">static</span>  function toKebabCase(<span class="cod-php-type"><a  href="https://www.php.net/manual/en/language.types.string.php">string</a></span> $string): <span class="type"><a  href="https://www.php.net/manual/en/language.types.string.php">string</a></span></td></tr><tr><td>$string</td><td><a  href="https://www.php.net/manual/en/language.types.string.php">string</a></td><td>`camelCased` or `PascalCased` string.</td></tr><tr><td>return</td><td><a  href="https://www.php.net/manual/en/language.types.string.php">string</a></td><td>`kebab-cased` string.</td></tr></tbody></table>

Declared in BeastBytes\CodPhp\Writer\Markdown\Helpers


---

### toWords()
Converts a string to space-separated words, e.g. `CodPhp` becomes `Cod Php`.

<table><tbody><tr><td colspan="3"><span class="cod-php-visibility">public</span> <span class="cod-php-modifier">static</span>  function toWords(<span class="cod-php-type"><a  href="https://www.php.net/manual/en/language.types.string.php">string</a></span> $string): <span class="type"><a  href="https://www.php.net/manual/en/language.types.string.php">string</a></span></td></tr><tr><td>$string</td><td><a  href="https://www.php.net/manual/en/language.types.string.php">string</a></td><td>String to convert.</td></tr><tr><td>return</td><td><a  href="https://www.php.net/manual/en/language.types.string.php">string</a></td><td>Converted string.</td></tr></tbody></table>

Declared in BeastBytes\CodPhp\Writer\Markdown\Helpers


---

### type()
Returns a string representation of a ReflectionType with a link to the type documentation.

Only PHP (including extensions) and intra-package types are linked; external packages are not.

<table><tbody><tr><td colspan="3"><span class="cod-php-visibility">public</span> <span class="cod-php-modifier">static</span>  function type(<span class="cod-php-type">phpDocumentor\Reflection\Type|<a  href="https://www.php.net/manual/en/class.reflectiontype.php">ReflectionType</a></span> $type, <span class="cod-php-type"><a  href="../../Element/ObjectElement.md">BeastBytes\CodPhp\Element\ObjectElement</a></span> $element, <span class="cod-php-type"><a  href="../../Type/Language.md">BeastBytes\CodPhp\Type\Language</a></span> $language): <span class="type"><a  href="https://www.php.net/manual/en/language.types.string.php">string</a></span></td></tr><tr><td>$type</td><td>phpDocumentor\Reflection\Type|<a  href="https://www.php.net/manual/en/class.reflectiontype.php">ReflectionType</a></td><td>ReflectionType to get a string representation of.</td></tr><tr><td>$element</td><td><a  href="../../Element/ObjectElement.md">BeastBytes\CodPhp\Element\ObjectElement</a></td><td>Element containing the type.</td></tr><tr><td>$language</td><td><a  href="../../Type/Language.md">BeastBytes\CodPhp\Type\Language</a></td><td>PHP Manual language.</td></tr><tr><td>return</td><td><a  href="https://www.php.net/manual/en/language.types.string.php">string</a></td><td>String representation of the ReflectionType.</td></tr><tr><td>throws</td><td><a  href="https://https://www.php.net/manual/en/class.reflectionexception.php">ReflectionException</a></td><td></td></tr></tbody></table>

Declared in BeastBytes\CodPhp\Writer\Markdown\Helpers


---

Generated by <a  target="_blank"  href="https://github.com/BeastBytes/CodPhp">CodPhp</a>