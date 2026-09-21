---
title: CodPhp
lastUpdated: 2026-09-21 20:39:45
description: CodPhp Symfony Console command.
head:
  - - meta
    - name: element-type
      content: Class
  - - meta
    - name: Generator
      content: CodPhp
---

# <span class="cod-php-modifier">final</span> class `CodPhp`

<a  href="https://github.com/beastbytes/cod-php/tree/master/src/cod-php.html">Source Code</a>

CodPhp Symfony Console command.



<table><tbody><tr><th>Namespace</th><td>BeastBytes\CodPhp\Command</td></tr><tr><th>Inheritance</th><td>

BeastBytes\CodPhp\Command\CodPhp<br>Symfony\Component\Console\Command\Command

</td></tr><tr><th>Implements</th><td>

Symfony\Component\Console\Command\SignalableCommandInterface

</td></tr></tbody></table>

## Constants

| Name | Value | Description | Defined In |
|-|-|-|-|
| FAILURE | 1 |  | Symfony\Component\Console\Command\Command |
| INVALID | 2 |  | Symfony\Component\Console\Command\Command |
| SUCCESS | 0 |  | Symfony\Component\Console\Command\Command |

## Methods

### __invoke()
Run the Symfony console command.

<table><tbody><tr><td colspan="3"><span class="cod-php-visibility">public</span>  function __invoke(<span class="cod-php-type">Symfony\Component\Console\Input\InputInterface</span> $input, <span class="cod-php-type">Symfony\Component\Console\Output\OutputInterface</span> $output, <span class="cod-php-type"><a  href="https://www.php.net/manual/en/language.types.string.php">string</a>|<a  href="https://www.php.net/manual/en/language.types.null.php">null</a></span> $namespace = null, <span class="cod-php-type"><a  href="https://www.php.net/manual/en/language.types.string.php">string</a>|<a  href="https://www.php.net/manual/en/language.types.null.php">null</a></span> $configFile = null, <span class="cod-php-type"><a  href="https://www.php.net/manual/en/language.types.array.php">array</a>|<a  href="https://www.php.net/manual/en/language.types.null.php">null</a></span> $exclude = null, <span class="cod-php-type"><a  href="https://www.php.net/manual/en/language.types.array.php">array</a>|<a  href="https://www.php.net/manual/en/language.types.null.php">null</a></span> $match = null, <span class="cod-php-type"><a  href="https://www.php.net/manual/en/language.types.string.php">string</a>|<a  href="https://www.php.net/manual/en/language.types.null.php">null</a></span> $outputDir = null, <span class="cod-php-type"><a  href="https://www.php.net/manual/en/language.types.string.php">string</a>|<a  href="https://www.php.net/manual/en/language.types.null.php">null</a></span> $inheritanceLevel = null, <span class="cod-php-type"><a  href="https://www.php.net/manual/en/language.types.string.php">string</a>|<a  href="https://www.php.net/manual/en/language.types.null.php">null</a></span> $errorLevel = null, <span class="cod-php-type"><a  href="https://www.php.net/manual/en/language.types.string.php">string</a>|<a  href="https://www.php.net/manual/en/language.types.null.php">null</a></span> $baseUrl = null, <span class="cod-php-type"><a  href="https://www.php.net/manual/en/language.types.string.php">string</a>|<a  href="https://www.php.net/manual/en/language.types.null.php">null</a></span> $writer = null, <span class="cod-php-type"><a  href="https://www.php.net/manual/en/language.types.string.php">string</a>|<a  href="https://www.php.net/manual/en/language.types.null.php">null</a></span> $templateRenderer = null, <span class="cod-php-type"><a  href="https://www.php.net/manual/en/language.types.string.php">string</a>|<a  href="https://www.php.net/manual/en/language.types.null.php">null</a></span> $templateDir = null, <span class="cod-php-type"><a  href="https://www.php.net/manual/en/language.types.string.php">string</a>|<a  href="https://www.php.net/manual/en/language.types.null.php">null</a></span> $language = null): <span class="type"><a  href="https://www.php.net/manual/en/language.types.integer.php">int</a></span></td></tr><tr><td>$input</td><td>Symfony\Component\Console\Input\InputInterface</td><td></td></tr><tr><td>$output</td><td>Symfony\Component\Console\Output\OutputInterface</td><td></td></tr><tr><td>$namespace</td><td><a  href="https://www.php.net/manual/en/language.types.string.php">string</a>|<a  href="https://www.php.net/manual/en/language.types.null.php">null</a></td><td>Namespace containing source files.</td></tr><tr><td>$configFile</td><td><a  href="https://www.php.net/manual/en/language.types.string.php">string</a>|<a  href="https://www.php.net/manual/en/language.types.null.php">null</a></td><td>Configuration file</td></tr><tr><td>$exclude</td><td><a  href="https://www.php.net/manual/en/language.types.array.php">array</a>|<a  href="https://www.php.net/manual/en/language.types.null.php">null</a></td><td>Path(s) to Exclude from source files.</td></tr><tr><td>$match</td><td><a  href="https://www.php.net/manual/en/language.types.array.php">array</a>|<a  href="https://www.php.net/manual/en/language.types.null.php">null</a></td><td>Match pattern(s) for source files.</td></tr><tr><td>$outputDir</td><td><a  href="https://www.php.net/manual/en/language.types.string.php">string</a>|<a  href="https://www.php.net/manual/en/language.types.null.php">null</a></td><td>Output directory.</td></tr><tr><td>$inheritanceLevel</td><td><a  href="https://www.php.net/manual/en/language.types.string.php">string</a>|<a  href="https://www.php.net/manual/en/language.types.null.php">null</a></td><td>Level of Inheritance to show.</td></tr><tr><td>$errorLevel</td><td><a  href="https://www.php.net/manual/en/language.types.string.php">string</a>|<a  href="https://www.php.net/manual/en/language.types.null.php">null</a></td><td>Error Reporting level.</td></tr><tr><td>$baseUrl</td><td><a  href="https://www.php.net/manual/en/language.types.string.php">string</a>|<a  href="https://www.php.net/manual/en/language.types.null.php">null</a></td><td>Base URL for source code links.</td></tr><tr><td>$writer</td><td><a  href="https://www.php.net/manual/en/language.types.string.php">string</a>|<a  href="https://www.php.net/manual/en/language.types.null.php">null</a></td><td>FQCN of the Writer class.</td></tr><tr><td>$templateRenderer</td><td><a  href="https://www.php.net/manual/en/language.types.string.php">string</a>|<a  href="https://www.php.net/manual/en/language.types.null.php">null</a></td><td>FQCN of the template renderer class.</td></tr><tr><td>$templateDir</td><td><a  href="https://www.php.net/manual/en/language.types.string.php">string</a>|<a  href="https://www.php.net/manual/en/language.types.null.php">null</a></td><td>Template directory.</td></tr><tr><td>$language</td><td><a  href="https://www.php.net/manual/en/language.types.string.php">string</a>|<a  href="https://www.php.net/manual/en/language.types.null.php">null</a></td><td>PHP Manual language for type links.</td></tr><tr><td>return</td><td><a  href="https://www.php.net/manual/en/language.types.integer.php">int</a></td><td>Exit code</td></tr></tbody></table>

Declared in BeastBytes\CodPhp\Command\CodPhp


---

Generated by <a  target="_blank"  href="https://github.com/BeastBytes/CodPhp">CodPhp</a>