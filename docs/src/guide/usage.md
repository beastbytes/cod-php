# Usage

>[!Note]
> The examples assume that **CodPhp** is run from the project root directory (recommended).

## Without a Configuration File
### Examples

The simplest command is to provide the namespace to document.

```shell
php ./vendor/bin/cod-php Namespace\\Project
```

---

Set the output directory.

```shell
php ./vendor/bin/cod-php Namespace\\Project -o ./docs/src/api
```

---

Link to source code in a repository.

```shell
php ./vendor/bin/cod-php Namespace\\Project -b https://example.com/repository/example-project/tree/main/src
```

### Command-line Options

| Option               | Shortcut | Description                                                                         | Configuration Equivalent        |
|----------------------|:--------:|-------------------------------------------------------------------------------------|---------------------------------|
| `--baseUrl=URL`      | `-b`     | Base URL for source code links.                                                     | `baseUrl`                       |
| `--config=PATH`      | `-c`     | Path to configuration file.                                                         | _no equivalent_                 |
| `--exclude=LIST`     | `-e`     | Comma separated list of path(s) to exclude from source files.                       | `exclude`                       |
| `--language=LANG`    | `-p`     | PHP manual language; 'en'\|'de'\|'fr'\|'it'\|'tr'\|'uk'\|'zh'\|'ja'\|'pt_BR'\|'ru'. | `language`                      |
| `--inheritance=WORD` | `-i`     | Level of inheritance to show; 'All'\|'Namespace'\|'Class'.                          | `inheritance`                   |
| `--error-level=WORD` | `-l`     | Error reporting level; 'Error'\|'Warning'\|'Notice'\|'None'.                        | `errorLevel`                    |
| `--match=LIST`       | `-m`     | Comma separated list of pattern(s) to match for source files.                       | `match`                         |
| `--output=PATH`      | `-o`     | Output directory.                                                                   | `outputDir`                     |
| `--quiet`            | `-q`     | Show only console errors.                                                           | `verbosity (VERBOSITY_QUIET)`   |
| `--silent`           |          | Suppress all output.                                                                | `verbosity (VERBOSITY_SILENT)`  |
| `--template=PATH`    | `-t`     | Template directory.                                                                 | `templateDir`                   |
| `--renderer=FQCN`    | `-r`     | Template renderer.                                                                  | `templateRenderer`              |
|                      | `-v`     | Verbose output.                                                                     | `verbosity (VERBOSITY_VERBOSE)` |
| `--writer=FQCN`      | `-w`     | FQCN of the Writer class.                                                           | `writer`                        |

>[!Note]
> `--quiet`/`-q`, `--silent`, and `-q` are mutually exclusive; only one or none may be specified.

## With a Configuration File

```shell
php ./vendor/bin/cod-php
```

>[!Note]
>Command-line argument or option can be used with, and will override settings in, a configuration file.