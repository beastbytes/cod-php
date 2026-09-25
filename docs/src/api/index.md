---
title: Index
lastUpdated: 2026-09-25 20:11:02
description: API Index
head:
  - - meta
    - name: element-type
      content: all
  - - meta
    - name: Generator
      content: CodPhp
---

# Index for BeastBytes\CodPhp

## Classes

| Class | Description |
|-|-|
| [BeastBytes\CodPhp\CodPhp](cod-php) | CodPhp application runner for Symfony Console |
| [BeastBytes\CodPhp\Command\CodPhp](command/cod-php) | CodPhp Symfony Console command. |
| [BeastBytes\CodPhp\Config](config) | Configuration object |
| [BeastBytes\CodPhp\Element\ClassConstantElement](element/class-constant-element) | Represents a Class Constant structural element. |
| [BeastBytes\CodPhp\Element\ClassElement](element/class-element) | Represents a Class structural element. |
| [BeastBytes\CodPhp\Element\Element](element/element) | Base class for all structural elements. |
| [BeastBytes\CodPhp\Element\EnumCaseElement](element/enum-case-element) | Represents an EnumBackedCase or EnumUnitCase structural element. |
| [BeastBytes\CodPhp\Element\EnumElement](element/enum-element) | Represents an Enum structural element. |
| [BeastBytes\CodPhp\Element\InterfaceElement](element/interface-element) | Represents an Interface structural element. |
| [BeastBytes\CodPhp\Element\InvalidTagException](element/invalid-tag-exception) | Exception thrown if a tag is invalid |
| [BeastBytes\CodPhp\Element\MethodElement](element/method-element) | Represents a Method structural element. |
| [BeastBytes\CodPhp\Element\ObjectElement](element/object-element) | Abstract class for object - class, enum, interface, and trait - structural elements. |
| [BeastBytes\CodPhp\Element\ParameterElement](element/parameter-element) | Represents a Parameter structural element. |
| [BeastBytes\CodPhp\Element\PropertyElement](element/property-element) | Represents a Property structural element. |
| [BeastBytes\CodPhp\Element\TraitElement](element/trait-element) | Represents a trait structural element. |
| [BeastBytes\CodPhp\Error\Collection](error/collection) | Collection of Error objects. |
| [BeastBytes\CodPhp\Error\Error](error/error) | Represents a structural element documentation error. |
| [BeastBytes\CodPhp\Parser](parser) | Creates an array of ObjectElements from the given files. |
| [BeastBytes\CodPhp\Renderer\PhpTemplateRenderer](renderer/php-template-renderer) | Renders PHP templates. |
| [BeastBytes\CodPhp\Renderer\RenderFailedException](renderer/render-failed-exception) | Exception thrown if the rendering of a template fails. |
| [BeastBytes\CodPhp\Util\Link](util/link) | Immutable data object that normalises phpDocumentor Link and See tags. |
| [BeastBytes\CodPhp\Writer\Markdown\Helpers](writer/markdown/helpers) | Static helper functions for the writer. |
| [BeastBytes\CodPhp\Writer\Markdown\VitePress\Writer](writer/markdown/vite-press/writer) | Writer that generates documentation in Markdown format and configuration for use with the VitePress static site generator. |
| [BeastBytes\CodPhp\Writer\Markdown\Writer](writer/markdown/writer) | Abstract Writer that generates documentation in Markdown format. |
| [BeastBytes\CodPhp\Writer\OutputFileNotWrittenException](writer/output-file-not-written-exception) | Exception thrown if writing an output file fails. |
| [BeastBytes\CodPhp\Writer\TemplateNotFoundException](writer/template-not-found-exception) | Exception thrown if a template cannot be found. |
| [BeastBytes\CodPhp\Writer\Writer](writer/writer) | Base Writer class that provides properties and methods common to all concrete Writer classes. |

## Interfaces

| Interface | Description |
|-|-|
| [BeastBytes\CodPhp\Renderer\TemplateRendererInterface](renderer/template-renderer-interface) | Interface for template renderers. |
| [BeastBytes\CodPhp\Writer\WriterInterface](writer/writer-interface) | An interface for Writer classes. |

## Traits

| Trait | Description |
|-|-|
| [BeastBytes\CodPhp\Element\DeclaringClassTrait](element/declaring-class-trait) | Provides the declaring class of an element. |
| [BeastBytes\CodPhp\Element\DefaultValueTrait](element/default-value-trait) | Provides the string representation of the default value of a parameter or property element. |
| [BeastBytes\CodPhp\Element\ModifierTrait](element/modifier-trait) | Provides element modifiers, e.g. visibility, readonly, static, etc. |
| [BeastBytes\CodPhp\Element\PropertyTrait](element/property-trait) | Provides information about and the properties of an element. |
| [BeastBytes\CodPhp\Element\ThrowsTrait](element/throws-trait) | Provides information about and the exceptions thrown by an element. |
| [BeastBytes\CodPhp\Element\TypeTrait](element/type-trait) | Provides information about and the type of a parameter or property. |

## Enums

| Enum | Description |
|-|-|
| [BeastBytes\CodPhp\Element\Visibility](element/visibility) | PHP visibility. |
| [BeastBytes\CodPhp\Error\ErrorLevel](error/error-level) | Used to define the maximum error reporting level. |
| [BeastBytes\CodPhp\InheritanceLevel](inheritance-level) | Inheritance level of methods and properties included in elements. |
| [BeastBytes\CodPhp\Type\Extensions\CompressionAndArchive](type/extensions/compression-and-archive) | Links to PHP Compression and Archive extensions documentation. |
| [BeastBytes\CodPhp\Type\Extensions\Cryptography](type/extensions/cryptography) | Links to PHP Cryptography extensions documentation. |
| [BeastBytes\CodPhp\Type\Extensions\DateTime](type/extensions/date-time) | Links to PHP DateTime extensions documentation. |
| [BeastBytes\CodPhp\Type\Extensions\FileSystem](type/extensions/file-system) | Links to PHP File System extensions documentation. |
| [BeastBytes\CodPhp\Type\Extensions\Gui](type/extensions/gui) | Links to PHP Gui extensions documentation. |
| [BeastBytes\CodPhp\Type\Extensions\HumanLanguage](type/extensions/human-language) | Links to PHP Human Language extensions documentation. |
| [BeastBytes\CodPhp\Type\Extensions\ImageProcessingAndGeneration](type/extensions/image-processing-and-generation) | Links to PHP Image Processing and Generation extensions documentation. |
| [BeastBytes\CodPhp\Type\Extensions\Mail](type/extensions/mail) | Links to PHP Mail extensions documentation. |
| [BeastBytes\CodPhp\Type\Extensions\Mathematical](type/extensions/mathematical) | Links to PHP type documentation. |
| [BeastBytes\CodPhp\Type\Extensions\NonTextMime](type/extensions/non-text-mime) | Links to PHP Non-Text Mime extensions documentation. |
| [BeastBytes\CodPhp\Type\Extensions\OtherBasicExtensions](type/extensions/other-basic-extensions) | Links to PHP Other Basic extensions documentation. |
| [BeastBytes\CodPhp\Type\Extensions\OtherServices](type/extensions/other-services) | Links to PHP Other Services extensions documentation. |
| [BeastBytes\CodPhp\Type\Extensions\Php](type/extensions/php) | Links to PHP PHP extensions documentation. |
| [BeastBytes\CodPhp\Type\Extensions\ProcessControl](type/extensions/process-control) | Links to PHP Process Control extensions documentation. |
| [BeastBytes\CodPhp\Type\Extensions\SearchEngine](type/extensions/search-engine) | Links to PHP Search Engine extensions documentation. |
| [BeastBytes\CodPhp\Type\Extensions\Sessions](type/extensions/sessions) | Links to PHP Sessions extensions documentation. |
| [BeastBytes\CodPhp\Type\Extensions\TextProcessing](type/extensions/text-processing) | Links to PHP Text Processing extensions documentation. |
| [BeastBytes\CodPhp\Type\Extensions\VariableAndType](type/extensions/variable-and-type) | Links to PHP Variable and Type extensions documentation. |
| [BeastBytes\CodPhp\Type\Extensions\WebServices](type/extensions/web-services) | Links to PHP Web Services extensions documentation. |
| [BeastBytes\CodPhp\Type\Extensions\WindowsOnly](type/extensions/windows-only) | Links to PHP Windows only extensions documentation. |
| [BeastBytes\CodPhp\Type\Extensions\Xml](type/extensions/xml) | Links to PHP XML extensions documentation. |
| [BeastBytes\CodPhp\Type\Language](type/language) | Language codes for use when generating links to PHP types |
| [BeastBytes\CodPhp\Type\PhpType](type/php-type) | Links to PHP type documentation. |

---

Generated by <a  target="_blank"  href="https://github.com/beastbytes/cod-php">CodPhp</a>