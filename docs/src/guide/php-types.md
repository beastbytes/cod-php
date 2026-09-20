# PHP Types

**CodPhp** links [PHP built-in types](https://www.php.net/manual/en/language.types.php) and Extension classes 
to the relevant pages of the [PHP documentation](https://www.php.net/docs.php).

By default, **CodPhp** links to the English documentation; to link to one of the other supported languages
(
[Brazilian Portuguese](https://www.php.net/manual/pt_BR/),
[Chinese (Simplified)](https://www.php.net/manual/zh/), 
[French](https://www.php.net/manual/fr/), 
[German](https://www.php.net/manual/de/), 
[Spanish](https://www.php.net/manual/es/), 
[Italian](https://www.php.net/manual/it/), 
[Turkish](https://www.php.net/manual/tr/), 
[Japanese](https://www.php.net/manual/ja/), 
[Russian](https://www.php.net/manual/ru/), 
and [Ukrainian](https://www.php.net/manual/uk/)
)
set the `language` option in the [configuration](configuration.md)
or `--language` (`-p`) on the [command-line](usage.md#command-line-options).

>[!Note]
>Links in **CodPhp** documentation are to [PHP English](https://www.php.net/manual/en/) documentation.

## Typing Extension Classes

Some extension class names are `namespacced`, 
for example the [`Random`](https://www.php.net/manual/en/book.random.php) extension classes all begin with `Random\`.
For **CodPhp** to type these the name must be aliased with backslashes (`\`) changed to underscores (`_`).
For example, to use [`Random\Randomizer`](https://www.php.net/manual/en/class.random-randomizer.php) alias it to
`Random_Randomizer`, and to use [`Random\Engine\Secure`](https://www.php.net/manual/en/class.random-engine-secure.php)
alias it to `Random_Engine_Secure`.