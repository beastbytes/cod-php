# Configuration

**CodPhp** has three levels of configuration: default values, a configuration file, and command-line options.

The only required parameter is the `namespace` to document. 

## Configuration Precedence

The precedence of Configuration values - from highest to lowest - is:

1. Command Line
2. Configuration File
3. Default Values

## Configuration File

Using a configuration file is recommended as it allows **CodPhp** to be included in automated workflows
and ensures consistency of the generated documentation.

The configuration file returns an array of options (keys) and their values.

The default configuration file is `cod-php.php` in the project root directory.

### Options

To use default values for optional values, either omit the option or set its value to `null`.

#### namespace
*(string, required)*

Namespace to document.

---

#### baseUrl
*(string, default: `null`)*

Base URL for source code links.

If provided, class, enum, interface, and trait documentation will contain a link to the source code.

---

#### exclude
*(string[], default: `['./tests/**', './vendor/**']`)*

Path(s) to exclude from source files.

---

#### inheritance
*(BeastBytes\CodPhp\Inheritance, default: `BeastBytes\CodPhp\Inheritance::All`)*

Level of inheritance to show in classes and interfaces.

One of:

* BeastBytes\CodPhp\Inheritance::All - Show all inherited methods and properties, including those from vendor packages
* BeastBytes\CodPhp\Inheritance::Namespace - Show inherited methods and properties defined in the namespace
* BeastBytes\CodPhp\Inheritance::Element - Show only methods and properties defined in the class

---

### language
*(BeastBytes\CodPhp\Language, default: `BeastBytes\CodPhp\Language::English`)*

PHP Manual language for type links.

One of:

* BeastBytes\CodPhp\Language::Brazilian
* BeastBytes\CodPhp\Language::Chinese
* BeastBytes\CodPhp\Language::English
* BeastBytes\CodPhp\Language::French
* BeastBytes\CodPhp\Language::German
* BeastBytes\CodPhp\Language::Italian
* BeastBytes\CodPhp\Language::Japanese
* BeastBytes\CodPhp\Language::Turkish
* BeastBytes\CodPhp\Language::Russian
* BeastBytes\CodPhp\Language::Ukrainian

---

#### match
*(string[], default: `['**.php']`)*

Pattern(s) to match for source files.

---

#### outputDir
*(string, default: `'./docs/api'`)*

Output directory.

---

#### errorLevel
*(BeastBytes\CodPhp\ErrorLevel, default: `BeastBytes\CodPhp\ErrorLevel::Error`)*

Minimum error level. Only errors above or equal to this level are reported.

One of:
* BeastBytes\CodPhp\ErrorLevel::Error - Show only errors
* BeastBytes\CodPhp\ErrorLevel::Warning - Show errors and warnings
* BeastBytes\CodPhp\ErrorLevel::Notice - Show errors, warnings, and notices
* BeastBytes\CodPhp\ErrorLevel::None - Do not show any errors

What counts as an error and at what level is defined in the Writer's templates.

For example, a class not having a summary maybe considered an `error`, while not having a description may be a `notice`.

---

#### templateDir
*(string, default: `'./Templates'` relative to the Writer directory)*

Template directory.

---

#### templateRenderer
*(string, default: `null` - use the built-in PHP template renderer)*

Template renderer.

---

#### verbosity
*(int, default: Symfony\Component\Console\Output\OutputInterface::VERBOSITY_NORMAL)*

Verbosity level.

One of:
* Symfony\Component\Console\Output\OutputInterface::VERBOSITY_SILENT - Suppress all output 
* Symfony\Component\Console\Output\OutputInterface::VERBOSITY_QUIET - Show only console errors
* Symfony\Component\Console\Output\OutputInterface::VERBOSITY_NORMAL - Normal output
* Symfony\Component\Console\Output\OutputInterface::VERBOSITY_VERBOSE - Verbose output

---

#### writer
*string, default: `null` - Use the built-in Writer)*

Writer FQCN.

### Example Configuration File

```php

use BeastBytes\CodPhp\InheritanceLevel;
use Symfony\Component\Console\Output\OutputInterface;

// CodPhp Configuration.
return [
    'baseUrl' => 'https://example.com/cod-php/api', // Base URL for source code links. Default - no source links generated
    'errorLevel' => null, // Reporting level. Default: ErrorLevel::Error
    'exclude' => null, // Directories to ignore. Default ['./tests/**', './vendor/**']
    'inheritance' => InheritanceLevel::Namespace, // Level of Inheritance to show. Default Inheritance::All
    'language' => null, // PHP Manual language for type links. Default Language::English
    'match' => null, // File patterns to match. Default ['**.php']
    'namespace' => 'BeastBytes\\CodPhp', // Namespace to document
    'outputDir' => './docs/src/api', // Output path. Default './docs/api'
    'templateDir' => null, // Directory containing templates. Default './Templates' relative to the Writer
    'templateRenderer' => null, // Template renderer FQCN. Default: 'BeastBytes\\CodPhp\\Writer\\PhpTemplateRenderer'
    'verbosity' => OutputInterface::VERBOSITY_VERBOSE
];
```
