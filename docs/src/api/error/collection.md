---
title: Collection
lastUpdated: 2026-09-23 10:29:05
description: Collection of Error objects.
head:
  - - meta
    - name: element-type
      content: Class
  - - meta
    - name: Generator
      content: CodPhp
---

# <span class="cod-php-modifier">final</span> class `Collection`

<a  href="https://github.com/beastbytes/cod-php/blob/master/src/Error/Collection.php">Source Code</a>

Collection of Error objects.

<table><tbody><tr><th>Namespace</th><td>BeastBytes\CodPhp\Error</td></tr><tr><th>Inheritance</th><td>

BeastBytes\CodPhp\Error\Collection

</td></tr></tbody></table>


## Methods

### addError()
Add an `error` to the collection.

<table><tbody><tr><td colspan="3"><span class="cod-php-visibility">public</span> <span class="cod-php-modifier">static</span>  function addError(<span class="cod-php-type"><a  href="https://www.php.net/manual/en/language.types.string.php">string</a></span> $message, <span class="cod-php-type"><a  href="../Element/Element.md">BeastBytes\CodPhp\Element\Element</a></span> $element, <span class="cod-php-type"><a  href="https://www.php.net/manual/en/language.types.array.php">array</a></span> $context = []): <span class="type"><a  href="Error.md">BeastBytes\CodPhp\Error\Error</a></span></td></tr><tr><td>$message</td><td><a  href="https://www.php.net/manual/en/language.types.string.php">string</a></td><td>Error message.</td></tr><tr><td>$element</td><td><a  href="../Element/Element.md">BeastBytes\CodPhp\Element\Element</a></td><td>Element causing the error.</td></tr><tr><td>$context</td><td><a  href="https://www.php.net/manual/en/language.types.array.php">array</a></td><td>Additional information about the error.</td></tr><tr><td>return</td><td><a  href="Error.md">BeastBytes\CodPhp\Error\Error</a></td><td></td></tr></tbody></table>

Declared in BeastBytes\CodPhp\Error\Collection


---

### addNotice()
Add a `notice` to the collection.

<table><tbody><tr><td colspan="3"><span class="cod-php-visibility">public</span> <span class="cod-php-modifier">static</span>  function addNotice(<span class="cod-php-type"><a  href="https://www.php.net/manual/en/language.types.string.php">string</a></span> $message, <span class="cod-php-type"><a  href="../Element/Element.md">BeastBytes\CodPhp\Element\Element</a></span> $element, <span class="cod-php-type"><a  href="https://www.php.net/manual/en/language.types.array.php">array</a></span> $context = []): <span class="type"><a  href="Error.md">BeastBytes\CodPhp\Error\Error</a></span></td></tr><tr><td>$message</td><td><a  href="https://www.php.net/manual/en/language.types.string.php">string</a></td><td>Error message.</td></tr><tr><td>$element</td><td><a  href="../Element/Element.md">BeastBytes\CodPhp\Element\Element</a></td><td>Element causing the error.</td></tr><tr><td>$context</td><td><a  href="https://www.php.net/manual/en/language.types.array.php">array</a></td><td>Additional information about the error.</td></tr><tr><td>return</td><td><a  href="Error.md">BeastBytes\CodPhp\Error\Error</a></td><td></td></tr></tbody></table>

Declared in BeastBytes\CodPhp\Error\Collection


---

### addWarning()
Add a `warning` to the collection.

<table><tbody><tr><td colspan="3"><span class="cod-php-visibility">public</span> <span class="cod-php-modifier">static</span>  function addWarning(<span class="cod-php-type"><a  href="https://www.php.net/manual/en/language.types.string.php">string</a></span> $message, <span class="cod-php-type"><a  href="../Element/Element.md">BeastBytes\CodPhp\Element\Element</a></span> $element, <span class="cod-php-type"><a  href="https://www.php.net/manual/en/language.types.array.php">array</a></span> $context = []): <span class="type"><a  href="Error.md">BeastBytes\CodPhp\Error\Error</a></span></td></tr><tr><td>$message</td><td><a  href="https://www.php.net/manual/en/language.types.string.php">string</a></td><td>Error message.</td></tr><tr><td>$element</td><td><a  href="../Element/Element.md">BeastBytes\CodPhp\Element\Element</a></td><td>Element causing the error.</td></tr><tr><td>$context</td><td><a  href="https://www.php.net/manual/en/language.types.array.php">array</a></td><td>Additional information about the error.</td></tr><tr><td>return</td><td><a  href="Error.md">BeastBytes\CodPhp\Error\Error</a></td><td></td></tr></tbody></table>

Declared in BeastBytes\CodPhp\Error\Collection


---

### asJson()
Returns a collection of errors as a JSON object.

<table><tbody><tr><td colspan="3"><span class="cod-php-visibility">public</span> <span class="cod-php-modifier">static</span>  function asJson(): <span class="type"><a  href="https://www.php.net/manual/en/language.types.string.php">string</a></span></td></tr><tr><td>return</td><td><a  href="https://www.php.net/manual/en/language.types.string.php">string</a></td><td></td></tr><tr><td>throws</td><td><a  href="https://www.php.net/manual/en/class.jsonexception.php">JsonException</a></td><td></td></tr></tbody></table>

Declared in BeastBytes\CodPhp\Error\Collection

#### Related

* <a  target="_blank"  href="https://www.json.org">https://www.json.org</a> - JSON specification.



---

### getErrors()
Returns an array of `Error` objects.

The array is either an array of `Error` objects at the specified level, or an array of arrays of `Error` objects index by error level.

<table><tbody><tr><td colspan="3"><span class="cod-php-visibility">public</span> <span class="cod-php-modifier">static</span>  function getErrors(<span class="cod-php-type"><a  href="ErrorLevel.md">BeastBytes\CodPhp\Error\ErrorLevel</a>|<a  href="https://www.php.net/manual/en/language.types.null.php">null</a></span> $level = null): <span class="type"><a  href="https://www.php.net/manual/en/language.types.array.php">array</a></span></td></tr><tr><td>$level</td><td><a  href="ErrorLevel.md">BeastBytes\CodPhp\Error\ErrorLevel</a>|<a  href="https://www.php.net/manual/en/language.types.null.php">null</a></td><td>Error level to return, or all error levels if `null`.</td></tr><tr><td>return</td><td><a  href="https://www.php.net/manual/en/language.types.array.php">array</a></td><td>Errors in the collection, either at the specified error level, or indexed by error level</td></tr></tbody></table>

Declared in BeastBytes\CodPhp\Error\Collection


---

### hasErrors()
Returns a boolean indicating whether the collection contains errors.

Reports on a particular error level if `$level` is an `ErrorLevel`, or all error levels if `$level === null`.

<table><tbody><tr><td colspan="3"><span class="cod-php-visibility">public</span> <span class="cod-php-modifier">static</span>  function hasErrors(<span class="cod-php-type"><a  href="ErrorLevel.md">BeastBytes\CodPhp\Error\ErrorLevel</a>|<a  href="https://www.php.net/manual/en/language.types.null.php">null</a></span> $level = null): <span class="type"><a  href="https://www.php.net/manual/en/language.types.boolean.php">bool</a></span></td></tr><tr><td>$level</td><td><a  href="ErrorLevel.md">BeastBytes\CodPhp\Error\ErrorLevel</a>|<a  href="https://www.php.net/manual/en/language.types.null.php">null</a></td><td>The error level to report, or all error levels if `null`.</td></tr><tr><td>return</td><td><a  href="https://www.php.net/manual/en/language.types.boolean.php">bool</a></td><td>Whether the collection has errors at the specified error level.</td></tr></tbody></table>

Declared in BeastBytes\CodPhp\Error\Collection


---

Generated by <a  target="_blank"  href="https://github.com/beastbytes/cod-php">CodPhp</a>