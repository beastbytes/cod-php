---
title: TraitElement
lastUpdated: 2026-09-24 19:00:07
description: Represents a trait structural element.
head:
  - - meta
    - name: element-type
      content: Class
  - - meta
    - name: Generator
      content: CodPhp
---

# <span class="cod-php-modifier">final</span> class `TraitElement`

<a  href="https://github.com/beastbytes/cod-php/blob/master/src/Element/TraitElement.php">Source Code</a>

Represents a trait structural element.

<table><tbody><tr><th>Namespace</th><td>BeastBytes\CodPhp\Element</td></tr><tr><th>Inheritance</th><td>

BeastBytes\CodPhp\Element\TraitElement<br>[BeastBytes\CodPhp\Element\ObjectElement](object-element.md)<br>[BeastBytes\CodPhp\Element\Element](element.md)

</td></tr><tr><th>Uses</th><td>

[BeastBytes\CodPhp\Element\PropertyTrait](property-trait.md)<br>[BeastBytes\CodPhp\Element\ThrowsTrait](throws-trait.md)

</td></tr></tbody></table>


## Properties

### $ancestors
Ancestors of the element indexed by FQCN.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.array.php">array</a> | Read | [] |

Declared in [BeastBytes\CodPhp\Element\ObjectElement](object-element)

---



### $canHaveMethodTag
`true` if the element can have a `@method` tag, `false` if not.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.boolean.php">bool</a> | Read |  |

Declared in [BeastBytes\CodPhp\Element\ObjectElement](object-element)

---



### $canHavePropertyTag
`true` if the element can have a `@property`, `@property-read`, or `@property-write` tag, `false` if not.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.boolean.php">bool</a> | Read |  |

Declared in [BeastBytes\CodPhp\Element\ObjectElement](object-element)

---



### $constants
Public constants defined in the element. Enum cases are **not** included - use the `cases` property.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.array.php">array</a> | Read | [] |

Declared in [BeastBytes\CodPhp\Element\ObjectElement](object-element)

#### Related

* <a  target="_blank"  href="object-element#hasconstants">$hasConstants</a>
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
Element description or `null` if the element does not have a description.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.string.php">string</a>\|<a  href="https://www.php.net/manual/en/language.types.null.php">null</a> | Read |  |

Declared in [BeastBytes\CodPhp\Element\Element](element)

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



### $fqcn
FQCN of the element's object

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.string.php">string</a> | Read |  |

Declared in [BeastBytes\CodPhp\Element\ObjectElement](object-element)

---



### $hasAncestors
`true` if the element has ancestors, `false` if not.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.boolean.php">bool</a> | Read |  |

Declared in [BeastBytes\CodPhp\Element\ObjectElement](object-element)

#### Related

* <a  target="_blank"  href="object-element#ancestors">$ancestors</a>
---



### $hasConstants
`true` if the element has public constants, `false` if not.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.boolean.php">bool</a> | Read |  |

Declared in [BeastBytes\CodPhp\Element\ObjectElement](object-element)

#### Related

* <a  target="_blank"  href="object-element#constants">$constants</a>
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



### $hasMethods
`true` if the element has methods, `false` if not.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.boolean.php">bool</a> | Read |  |

Declared in [BeastBytes\CodPhp\Element\ObjectElement](object-element)

#### Related

* <a  target="_blank"  href="object-element#methods">$methods</a>
---



### $hasProperties
`true` if the element's object has has properties, `false` if not.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.boolean.php">bool</a> | Read |  |

Declared in BeastBytes\CodPhp\Element\TraitElement

#### Related

* <a  target="_blank"  href="property-trait#properties">$properties</a>
---



### $hasSubclasses
`true` if the element has subclasses, `false` if not.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.boolean.php">bool</a> | Read |  |

Declared in [BeastBytes\CodPhp\Element\ObjectElement](object-element)

#### Related

* <a  target="_blank"  href="object-element#subclasses">$subclasses</a>
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



### $implementsInterfaces
`true` if the element implements interfaces, `false` if not.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.boolean.php">bool</a> | Read |  |

Declared in [BeastBytes\CodPhp\Element\ObjectElement](object-element)

---



### $inheritance
The inheritance path for the element; $this and its ancestors.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.array.php">array</a> | Read |  |

Declared in [BeastBytes\CodPhp\Element\ObjectElement](object-element)

---



### $inheritanceLevel
Inheritence level to show.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="../InheritanceLevel.md">BeastBytes\CodPhp\InheritanceLevel</a> | Read/Write |  |

Declared in [BeastBytes\CodPhp\Element\ObjectElement](object-element)

---



### $interfaces
Interfaces implemented by the element.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.array.php">array</a> | Read | [] |

Declared in [BeastBytes\CodPhp\Element\ObjectElement](object-element)

#### Related

* <a  target="_blank"  href="interface-element">InterfaceElement</a>
---



### $isInApi
`true` if the element is in the API, `false` if not.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.boolean.php">bool</a> | Read |  |

Declared in [BeastBytes\CodPhp\Element\Element](element)

---



### $isUsed
`true` is the trait is used, `false` if not.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.boolean.php">bool</a> | Read |  |

Declared in BeastBytes\CodPhp\Element\TraitElement

#### Related

* <a  target="_blank"  href="trait-element#usedby">$usedBy</a>
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



### $methodTags
Array of `@method` tags

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.array.php">array</a> | Read |  |

Declared in [BeastBytes\CodPhp\Element\ObjectElement](object-element)

---



### $methods
Methods implemented by the element.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.array.php">array</a> | Read | [] |

Declared in [BeastBytes\CodPhp\Element\ObjectElement](object-element)

#### Related

* <a  target="_blank"  href="object-element#hasmethods">$hasMethods</a>
---



### $name
Element name.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.string.php">string</a> | Read |  |

Declared in [BeastBytes\CodPhp\Element\ObjectElement](object-element)

---



### $namespace
Object namespace.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.string.php">string</a> | Read |  |

Declared in [BeastBytes\CodPhp\Element\ObjectElement](object-element)

---



### $properties
Properties of the element indexed by FQCN.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.array.php">array</a> | Read | [] |

Declared in BeastBytes\CodPhp\Element\TraitElement

---



### $propertyReadTags
Array of `@property-read` tags

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.array.php">array</a> | Read |  |

Declared in [BeastBytes\CodPhp\Element\ObjectElement](object-element)

---



### $propertyTags
Array of `@property` tags

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.array.php">array</a> | Read |  |

Declared in [BeastBytes\CodPhp\Element\ObjectElement](object-element)

---



### $propertyWriteTags
Array of `@property-write` tags

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.array.php">array</a> | Read |  |

Declared in [BeastBytes\CodPhp\Element\ObjectElement](object-element)

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



### $subclasses
Subclasses of the element.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.array.php">array</a> | Read | [] |

Declared in [BeastBytes\CodPhp\Element\ObjectElement](object-element)

#### Related

* <a  target="_blank"  href="object-element#subclasses">$subclasses</a>
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



### $throwsException
`true` if the element throws an exception, `false` if not.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.boolean.php">bool</a> | Read |  |

Declared in BeastBytes\CodPhp\Element\TraitElement

#### Related

* <a  target="_blank"  href="throws-trait#throwstags">$throwsTags</a>
---



### $throwsTags
Array of `Throws` tags.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.array.php">array</a> | Read |  |

Declared in BeastBytes\CodPhp\Element\TraitElement

#### Related

* <a  target="_blank"  href="throws-trait#throwsexception">$throwsException</a>
---



### $traits
Traits used by the element.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.array.php">array</a> | Read | [] |

Declared in [BeastBytes\CodPhp\Element\ObjectElement](object-element)

#### Related

* <a  target="_blank"  href="object-element#usestraits">$usesTraits</a>
* <a  target="_blank"  href="trait-element">TraitElement</a>
---



### $usedBy
Elements that use this trait.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.array.php">array</a> | Read | [] |

Declared in BeastBytes\CodPhp\Element\TraitElement

#### Related

* <a  target="_blank"  href="trait-element#isused">$isUsed</a>
---



### $usesTraits
`true` if the element uses traits, `false` if not.

| Type | Read/Write | Default |
|-|:-:|-|
| <a  href="https://www.php.net/manual/en/language.types.boolean.php">bool</a> | Read |  |

Declared in [BeastBytes\CodPhp\Element\ObjectElement](object-element)

#### Related

* <a  target="_blank"  href="object-element#traits">$traits</a>
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

### pathTo()
Returns the relative path from this element to the given element.

<table><tbody><tr><td colspan="3"><span class="cod-php-visibility">public</span>  function pathTo(<span class="cod-php-type"><a  href="ObjectElement.md">BeastBytes\CodPhp\Element\ObjectElement</a>|<a  href="https://www.php.net/manual/en/language.types.string.php">string</a></span> $destination): <span class="type"><a  href="https://www.php.net/manual/en/language.types.string.php">string</a>|<a  href="https://www.php.net/manual/en/language.types.null.php">null</a></span></td></tr><tr><td>$destination</td><td><a  href="ObjectElement.md">BeastBytes\CodPhp\Element\ObjectElement</a>|<a  href="https://www.php.net/manual/en/language.types.string.php">string</a></td><td>The FQCN or element to get the path to.</td></tr><tr><td>return</td><td><a  href="https://www.php.net/manual/en/language.types.string.php">string</a>|<a  href="https://www.php.net/manual/en/language.types.null.php">null</a></td><td>Relative path to the element from this element or `null` if $element is this element.</td></tr></tbody></table>

Declared in [BeastBytes\CodPhp\Element\ObjectElement](object-element)


---

Generated by <a  target="_blank"  href="https://github.com/beastbytes/cod-php">CodPhp</a>