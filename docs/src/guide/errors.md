# Errors

**CodPhp** can collect errors, and the built-in templates use this feature to report errors found in the documentation.

What counts as an error and at what level is determined by and in the templates.

Errors in **CodPhp** are intended to aid in creating good and complete documentation, but they are not prescriptive;
that is to say, it's not required to resolve all (or any) of them.

It may be - say - that a property name defines exactly what that property is and represents - 
that's a great property name, and having a summary for it adds nothing to a users understanding.
Whereas, a class not having a summary is probably something that should be fixed.

## Error Level

Errors are always collected, but how they are reported is determined by the *Error Level*.

There are three error levels: `Error`, `Warning`, and `Notice`.
**CodPhp** only collects errors at or above the error level specified;
setting the error level to `None` disables error collection.

In the default templates:

* **Error** - a class, enum, interface, or trait without a summary.
* **Warning** - a constant, method, or property without a summary.
* **Notice** - a class, enum, interface, trait, or method without a description.

The recommendation is to report all errors during development, then, when the documentation is in the desired state,
set the error level to `None` for a release.

## Error Output

A summary of errors is output to the console on command completion (unless the verbosity level suppresses output).

The collected errors are output to the console on completion if **CodPhp** is run in verbose mode
(`-v` option or `verbosity` = `VERBOSITY_VERBOSE` configuration).

The generated documentation contains errors at the location found, depending on the *Error Level*.

Errors categorised by error level are written to `<outputDir>/_errors_/cod-php.json` for use in CI/CD pipelines.

## cod-php.json Schema

```json
{
  "$schema": "https://example.com",
  "title": "CodPhp Errors",
  "type": "object",
  "properties": {
    "summary": {
      "type": "object",
      "properties": {
        "Error": {
          "type": "integer",
          "description": "Count of errors"
        },
        "Warning": {
          "type": "integer",
          "description": "Count of warnings"
        },
        "Notice": {
          "type": "integer",
          "description": "Count of notices"
        }
      }
    },
    "details": {
      "type": "object",
      "properties": {
        "Error": {
          "type": ["object"],
          "description": "Errors",
          "properties": {
            "level": {
              "type": "string",
              "description": "Error level"
            },
            "message": {
              "type": "string",
              "description": "Error message"
            },
            "element-type": {
              "type": "string",
              "description": "Element type",
              "enum": ["Class", "ClassConstant", "Enum", "EnumCase", "Interface", "Method", "Parameter", "Property", "Trait"]
            },
            "fqcn": {
              "type": "string",
              "description": "Fully Qualified Class Name of the object containing the error",
              "pattern": "^([a-zA-Z_][a-zA-Z0-9_]*\\\\)+[a-zA-Z_][a-zA-Z0-9_]*$"
            }
          }
        },
        "Warning": {
          "type": ["object"],
          "description": "Warnings",
          "properties": {
            "level": {
              "type": "string",
              "description": "Error level"
            },
            "message": {
              "type": "string",
              "description": "Error message"
            },
            "element-type": {
              "type": "string",
              "description": "Element type",
              "enum": ["Class", "ClassConstant", "Enum", "EnumCase", "Interface", "Method", "Parameter", "Property", "Trait"]
            },
            "fqcn": {
              "type": "string",
              "description": "Fully Qualified Class Name of the object containing the error",
              "pattern": "^([a-zA-Z_][a-zA-Z0-9_]*\\\\)+[a-zA-Z_][a-zA-Z0-9_]*$"
            }
          }
        },
        "Notice": {
          "type": ["object"],
          "description": "Notices",
          "properties": {
            "level": {
              "type": "string",
              "description": "Error level"
            },
            "message": {
              "type": "string",
              "description": "Error message"
            },
            "element-type": {
              "type": "string",
              "description": "Element type",
              "enum": ["Class", "ClassConstant", "Enum", "EnumCase", "Interface", "Method", "Parameter", "Property", "Trait"]
            },
            "fqcn": {
              "type": "string",
              "description": "Fully Qualified Class Name of the object containing the error",
              "pattern": "^([a-zA-Z_][a-zA-Z0-9_]*\\\\)+[a-zA-Z_][a-zA-Z0-9_]*$"
            }
          }
        }
      }
    }
  }
}
```