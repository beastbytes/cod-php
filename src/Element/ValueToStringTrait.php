<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Element;

use function array_is_list;
use function gettype;
use function is_array;
use function str_replace;
use function substr;
use function var_export;

/**
 * Provides the string representation of a value.
 *
 * @internal
 */
trait ValueToStringTrait
{
    private function valueToString(mixed $value): string
    {
        if (is_array($value)) {
            return $this->arrayToString($value);
        }

        $value = var_export($value, true);

        return str_replace('NULL', 'null', $value);
    }

    private function arrayToString(array $array, int $depth = 0): string
    {
        if (empty($array)) {
            return '[]';
        }

        $result = '[';

        foreach ($array as $key => $value) {
            if (!array_is_list($array)) {
                $result .= (is_string($key)) ? "'{$key}' => " : "{$key} => ";
            }

            $result .= match (gettype($value)) {
                'array' => $this->arrayToString($value, $depth + 1),
                'boolean' => $value ? 'true' : 'false',
                'NULL' => 'null',
                'string' => "'{$value}'",
                default => (string) $value,
            };

            $result .= ', ';
        }

        return substr($result, 0, -2) . ']';
    }
}