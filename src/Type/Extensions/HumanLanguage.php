<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Type\Extensions;

/**
 * Links to PHP Human Language extensions documentation.
 *
 * @link https://www.php.net/manual/en/refs.international.php
 */
enum HumanLanguage: string
{
    // Enchant
    case EnchantBroker = 'https://www.php.net/manual/{lang}/class.enchantbroker.php';
    case EnchantDictionary = 'https://www.php.net/manual/{lang}/class.enchantdictionary.php';

    // Gender
    case Gender_Gender = 'https://www.php.net/manual/{lang}/class.gender.php';

    // Internationalization Functions
    case Collator = 'https://www.php.net/manual/{lang}/class.collator.php';
    case NumberFormatter ='https://www.php.net/manual/{lang}/class.numberformatter.php';

    // Pspell
    case PSpell_Dictionary = 'https://www.php.net/manual/{lang}/class.pspell-dictionary.php';
    case PSpell_Config = 'https://www.php.net/manual/{lang}/class.pspell-config.php';
}