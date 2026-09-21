---
title: ParameterElement
lastUpdated: 2026-09-21 21:00:19
description: Represents a Parameter structural element.
head:
  - - meta
    - name: element-type
      content: Class
  - - meta
    - name: Generator
      content: CodPhp
---

# <span class="cod-php-modifier">final</span> class `ParameterElement`

<a  href="https://github.com/beastbytes/cod-php/blob/master/src/Element/ParameterElement.php">Source Code</a>

Represents a Parameter structural element.



<table><tbody><tr><th>Namespace</th><td>BeastBytes\CodPhp\Element</td></tr><tr><th>Inheritance</th><td>

BeastBytes\CodPhp\Element\ParameterElement<br>[BeastBytes\CodPhp\Element\Element](element.md)

</td></tr><tr><th>Uses</th><td>

[BeastBytes\CodPhp\Element\DefaultValueTrait](default-value-trait.md)<br>[BeastBytes\CodPhp\Element\TypeTrait](type-trait.md)

</td></tr></tbody></table>


## Properties

### $allowsNull
`true` if the type allows `null`, `false` if not.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.boolean.php">bool</a> | Read |  |

Declared in BeastBytes\CodPhp\Element\ParameterElement

---



### $copyright
Element copyright or `null` if the element does not have a `@copyright` tag.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.string.php">string</a>\|<a  href="https://www.php.net/manual/en/language.types.null.php">null</a> | Read |  |

Declared in [BeastBytes\CodPhp\Element\Element](element)

#### Related

* <a  target="_blank"  href="element#hastag">hasTag()</a>
---



### $defaultValue
String representation of the default value of a parameter or property element or `null` if the property does not have a default value.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.string.php">string</a>\|<a  href="https://www.php.net/manual/en/language.types.null.php">null</a> | Read |  |

Declared in BeastBytes\CodPhp\Element\ParameterElement

#### Related

* <a  target="_blank"  href="parameter-element#hasdefaultvalue">$hasDefaultValue</a>
* <a  target="_blank"  href="property-element#hasdefaultvalue">$hasDefaultValue</a>
---



### $deprecationNotice
Element deprecation notice or `null` if the element does not have a `@deprecated` tag.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.string.php">string</a>\|<a  href="https://www.php.net/manual/en/language.types.null.php">null</a> | Read |  |

Declared in [BeastBytes\CodPhp\Element\Element](element)

#### Related

* <a  target="_blank"  href="element#hastag">hasTag()</a>
---



### $description
Parameter description.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.string.php">string</a> | Read |  |

Declared in BeastBytes\CodPhp\Element\ParameterElement

---



### $elementType
Type of element.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.string.php">string</a> | Read |  |

Declared in [BeastBytes\CodPhp\Element\Element](element)

---



### $hasDefaultValue
`true` if the parameter has a default value, `false` if not.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.boolean.php">bool</a> | Read |  |

Declared in BeastBytes\CodPhp\Element\ParameterElement

---



### $hasDescription
`true` if the element has a description, `false` if not.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.boolean.php">bool</a> | Read |  |

Declared in [BeastBytes\CodPhp\Element\Element](element)

#### Related

* <a  target="_blank"  href="element#description">$description</a>
---



### $hasDocBlock
`true` if the element has a docBlock, `false` if not.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.boolean.php">bool</a> | Read |  |

Declared in [BeastBytes\CodPhp\Element\Element](element)

#### Related

* <a  target="_blank"  href="element#docblock">$docBlock</a>
---



### $hasSummary
`true` if the element has a summary, `false` if not.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.boolean.php">bool</a> | Read |  |

Declared in [BeastBytes\CodPhp\Element\Element](element)

#### Related

* <a  target="_blank"  href="element#summary">$summary</a>
---



### $isInApi
`true` if the element is in the API, `false` if not.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.boolean.php">bool</a> | Read |  |

Declared in [BeastBytes\CodPhp\Element\Element](element)

---



### $isPassedByReference
`true` if the parameter is passed by reference, `false` if not.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.boolean.php">bool</a> | Read |  |

Declared in BeastBytes\CodPhp\Element\ParameterElement

---



### $isVariadic
`true` if the parameter is variadic, `false` if not.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.boolean.php">bool</a> | Read |  |

Declared in BeastBytes\CodPhp\Element\ParameterElement

---



### $linkTags
`@link` tags normalised to `Link` objects.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.array.php">array</a> | Read |  |

Declared in [BeastBytes\CodPhp\Element\Element](element)

#### Related

* <a  target="_blank"  href="../util/link">Link</a>
---



### $name
Name of the element.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.string.php">string</a> | Read |  |

Declared in [BeastBytes\CodPhp\Element\Element](element)

---



### $namespace
Namespace of the element.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.string.php">string</a>\|<a  href="https://www.php.net/manual/en/language.types.null.php">null</a> | Read |  |

Declared in [BeastBytes\CodPhp\Element\Element](element)

---



### $rootNamespace
Root namespace being documented.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.string.php">string</a> | Read/Write |  |

Declared in [BeastBytes\CodPhp\Element\Element](element)

---



### $seeTags
`@see` tags normalised to `Link` objects.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.array.php">array</a> | Read |  |

Declared in [BeastBytes\CodPhp\Element\Element](element)

#### Related

* <a  target="_blank"  href="../util/link">Link</a>
---



### $since
Content of the element's `@since` tag, or `null` if the element does not have a `@since` tag.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.string.php">string</a>\|<a  href="https://www.php.net/manual/en/language.types.null.php">null</a> | Read |  |

Declared in [BeastBytes\CodPhp\Element\Element](element)

#### Related

* <a  target="_blank"  href="has-tag()">hasTag</a>
---



### $summary
Element summary or `null` if the element does not have a summary.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.string.php">string</a>\|<a  href="https://www.php.net/manual/en/language.types.null.php">null</a> | Read |  |

Declared in [BeastBytes\CodPhp\Element\Element](element)

#### Related

* <a  target="_blank"  href="element#hasdobblock">$hasDobBlock</a>
---



### $type
Parameter or property type.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/class.reflectiontype.php">ReflectionType</a> | Read |  |

Declared in BeastBytes\CodPhp\Element\ParameterElement

---



### $version
Content of the element's `@version` tag, or `null` if the element does not have a `@version` tag.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.string.php">string</a>\|<a  href="https://www.php.net/manual/en/language.types.null.php">null</a> | Read |  |

Declared in [BeastBytes\CodPhp\Element\Element](element)

#### Related

* <a  target="_blank"  href="has-tag()">hasTag</a>
---



## Methods

### __construct()
Create a parameter element.

<table><tbody><tr><td colspan="3"><span class="cod-php-visibility">public</span> function __construct(<span class="cod-php-type"><a  href="https://www.php.net/manual/en/class.reflectionparameter.php">ReflectionParameter</a></span> $reflector, <span class="cod-php-type"><a  href="https://www.php.net/manual/en/language.types.string.php">string</a></span> $description)</td></tr><tr><td>$reflector</td><td><a  href="https://www.php.net/manual/en/class.reflectionparameter.php">ReflectionParameter</a></td><td>Para</td></tr><tr><td>$description</td><td><a  href="https://www.php.net/manual/en/language.types.string.php">string</a></td><td>Parameter description</td></tr></tbody></table>

Declared in BeastBytes\CodPhp\Element\ParameterElement


---

### getElements()
Returns object elements, optionally filtered by element type.

<table><tbody><tr><td colspan="3"><span class="cod-php-visibility">public</span>  function getElements(<span class="cod-php-type"><a  href="https://www.php.net/manual/en/language.types.string.php">string</a>|<a  href="https://www.php.net/manual/en/language.types.null.php">null</a></span> $type = null): <span class="type"><a  href="https://www.php.net/manual/en/language.types.array.php">array</a></span></td></tr><tr><td>$type</td><td><a  href="https://www.php.net/manual/en/language.types.string.php">string</a>|<a  href="https://www.php.net/manual/en/language.types.null.php">null</a></td><td>Type (FQCN) of element to return; `null` returns all elements.</td></tr><tr><td>return</td><td><a  href="https://www.php.net/manual/en/language.types.array.php">array</a></td><td>Object elements.</td></tr></tbody></table>

Declared in [BeastBytes\CodPhp\Element\Element](element)


---

### hasTag()
Returns a value indicating whether the element has the specified tag.

<table><tbody><tr><td colspan="3"><span class="cod-php-visibility">public</span>  function hasTag(<span class="cod-php-type"><a  href="https://www.php.net/manual/en/language.types.string.php">string</a></span> $tag): <span class="type"><a  href="https://www.php.net/manual/en/language.types.boolean.php">bool</a></span></td></tr><tr><td>$tag</td><td><a  href="https://www.php.net/manual/en/language.types.string.php">string</a></td><td>Name of the tag.</td></tr><tr><td>return</td><td><a  href="https://www.php.net/manual/en/language.types.boolean.php">bool</a></td><td>`true` if the element has the specified taf, `false` if not.</td></tr></tbody></table>

Declared in [BeastBytes\CodPhp\Element\Element](element)


---

Generated by <a  target="_blank"  href="https://github.com/BeastBytes/CodPhp">CodPhp</a>