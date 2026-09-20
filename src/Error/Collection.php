<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Error;

use BeastBytes\CodPhp\Element\Element;
use BeastBytes\CodPhp\Error\Collection as ErrorCollection;
use JsonException;

use function array_key_exists;
use function count;
use function json_encode;

/**
 * Collection of Error objects.
 *
 * @see Error
 */
final class Collection
{
    /** @var array<string, Error[]> $errors Collected errors. */
    private static array $errors = [];

    /**
     * Returns a collection of errors as a JSON object.
     *
     * @throws JsonException
     * @link https://www.json.org JSON specification.
     */
    public static function asJson(): string
    {
        return json_encode(
            [
                'summary' => [
                    'Error' => count(ErrorCollection::getErrors(ErrorLevel::Error)),
                    'Warning' => count(ErrorCollection::getErrors(ErrorLevel::Warning)),
                    'Notice' => count(ErrorCollection::getErrors(ErrorLevel::Notice))
                ],
                'details' => self::$errors
            ],
            JSON_THROW_ON_ERROR
        );
    }

    /**
     * Add an `error` to the collection.
     *
     * @param string $message Error message.
     * @param Element $element Element causing the error.
     * @param array<string, mixed> $context Additional information about the error.
     * @return Error
     */
    public static function addError(string $message, Element $element, array $context = []): Error
    {
        return self::add($message, $element, ErrorLevel::Error, $context);
    }

    /**
     * Add a `warning` to the collection.
     *
     * @param string $message Error message.
     * @param Element $element Element causing the error.
     * @param array<string, mixed> $context Additional information about the error.
     * @return Error
     */
    public static function addWarning(string $message, Element $element, array $context = []): Error
    {
        return self::add($message, $element, ErrorLevel::Warning, $context);
    }

    /**
     * Add a `notice` to the collection.
     *
     * @param string $message Error message.
     * @param Element $element Element causing the error.
     * @param array<string, mixed> $context Additional information about the error.
     * @return Error
     */
    public static function addNotice(string $message, Element $element, array $context = []): Error
    {
        return self::add($message, $element, ErrorLevel::Notice, $context);
    }

    /** @internal Used for testing */
    public static function clear(): void
    {
        self::$errors = [];
    }

    /**
     * Returns an array of `Error` objects.
     *
     * The array is either an array of `Error` objects at the specified level, or an array of arrays of `Error` objects index by error level.
     *
     * @param ErrorLevel|null $level Error level to return, or all error levels if `null`.
     * @return array|Error[]|Error[][] Errors in the collection, either at the specified error level, or indexed by error level
     */
    public static function getErrors(?ErrorLevel $level = null): array
    {
        if ($level === null) {
            return self::$errors;
        }

        if (array_key_exists($level->name, self::$errors)) {
            return self::$errors[$level->name];
        }

        return [];
    }

    /**
     * Returns a boolean indicating whether the collection contains errors.
     *
     * Reports on a particular error level if `$level` is an `ErrorLevel`, or all error levels if `$level === null`.
     *
     * @param ErrorLevel|null $level The error level to report, or all error levels if `null`.
     * @return bool Whether the collection has errors at the specified error level.
     */
    public static function hasErrors(?ErrorLevel $level = null): bool
    {
        return $level === null ? !empty(self::$errors) : array_key_exists($level->name, self::$errors);
    }

    private static function add(string $message, Element $element, ErrorLevel $level, array $context): Error
    {
        $error = new Error($message, $element, $level, $context);

        if (!array_key_exists($level->name, self::$errors)) {
            self::$errors[$level->name] = [];
        }

        self::$errors[$level->name][] = $error;
        return $error;
    }
}