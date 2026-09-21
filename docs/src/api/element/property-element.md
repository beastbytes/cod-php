---
title: PropertyElement
lastUpdated: 2026-09-21 13:27:17
description: Represents a Property structural element.
head:
  - - meta
    - name: element-type
      content: Class
  - - meta
    - name: Generator
      content: CodPhp
---

# <span class="cod-php-modifier">final</span> class `PropertyElement`

<a  href="https://github.com/beastbytes/cod-php/tree/master/src/property-element.html">Source Code</a>

Represents a Property structural element.



<table><tbody><tr><th>Namespace</th><td>BeastBytes\CodPhp\Element</td></tr><tr><th>Inheritance</th><td>

BeastBytes\CodPhp\Element\PropertyElement<br>[BeastBytes\CodPhp\Element\Element](element.md)

</td></tr><tr><th>Uses</th><td>

[BeastBytes\CodPhp\Element\DeclaringClassTrait](declaring-class-trait.md)<br>[BeastBytes\CodPhp\Element\DefaultValueTrait](default-value-trait.md)<br>[BeastBytes\CodPhp\Element\TypeTrait](type-trait.md)

</td></tr></tbody></table>


## Properties

### $allowsNull
`true` if the type allows `null`, `false` if not.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.boolean.php">bool</a> | Read |  |

Declared in BeastBytes\CodPhp\Element\PropertyElement

---



### $canBeRead
`true` if the property can be read, `false` if not.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.boolean.php">bool</a> | Read |  |

Declared in BeastBytes\CodPhp\Element\PropertyElement

#### Related

* <a  target="_blank"  href="property-element#canbewritten">$canBeWritten</a>
---



### $canBeWritten
`true` if the property can be written, `false` if not.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.boolean.php">bool</a> | Read |  |

Declared in BeastBytes\CodPhp\Element\PropertyElement

#### Related

* <a  target="_blank"  href="property-element#canberead">$canBeRead</a>
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



### $declaringClass
Declaring class of the element.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="ClassElement.md">BeastBytes\CodPhp\Element\ClassElement</a> | Read |  |

Declared in BeastBytes\CodPhp\Element\PropertyElement

---



### $defaultValue
String representation of the default value of a parameter or property element or `null` if the property does not have a default value.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.string.php">string</a>\|<a  href="https://www.php.net/manual/en/language.types.null.php">null</a> | Read |  |

Declared in BeastBytes\CodPhp\Element\PropertyElement

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
Property description

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.string.php">string</a>\|<a  href="https://www.php.net/manual/en/language.types.null.php">null</a> | Read |  |

Declared in BeastBytes\CodPhp\Element\PropertyElement

#### Related

* <a  target="_blank"  href="element#hasdescription">$hasDescription</a>
---



### $elementType
Type of element.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.string.php">string</a> | Read |  |

Declared in [BeastBytes\CodPhp\Element\Element](element)

---



### $hasDefaultValue
`true` if the property has a default value, `false` if not.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.boolean.php">bool</a> | Read |  |

Declared in BeastBytes\CodPhp\Element\PropertyElement

#### Related

* <a  target="_blank"  href="default-value-trait#defaultvalue">$defaultValue</a>
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

Declared in BeastBytes\CodPhp\Element\PropertyElement

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