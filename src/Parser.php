<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp;

use BeastBytes\CodPhp\Element\ClassElement;
use BeastBytes\CodPhp\Element\EnumElement;
use BeastBytes\CodPhp\Element\InterfaceElement;
use BeastBytes\CodPhp\Element\Element;
use BeastBytes\CodPhp\Element\ObjectElement;
use BeastBytes\CodPhp\Element\TraitElement;
use ReflectionClass;
use ReflectionEnum;
use ReflectionException;

use function file_get_contents;
use function in_array;
use function is_array;
use function is_string;
use function token_get_all;

/**
 * Creates an array of ObjectElements from the given files.
 *
 * @psalm-suppress LessSpecificReturnStatement
 * @psalm-suppress MoreSpecificReturnType
 */
final class Parser
{
    /**
     * Parse files that contain objects - class, enum, interface, or trait - into ObjectElements.
     *
     * @param list<string> $files Files to parse
     * @return array ObjectElements
     * @psalm-return array{string, ObjectElement}
     * @throws ReflectionException
     */
    public static function parse(array $files): array
    {
        /** @var array{string, ObjectElement} $elements */
        $elements = [];

        foreach ($files as $filename) {
            $fqcn = self::getFQCN($filename);

            if ($fqcn === null) {
                continue;
            }

            $reflectionClass = new ReflectionClass($fqcn);

            $element = match(true) {
                $reflectionClass->isEnum() => new EnumElement(new ReflectionEnum($fqcn)),
                $reflectionClass->isInterface() => new InterfaceElement($reflectionClass),
                $reflectionClass->isTrait() => new TraitElement($reflectionClass),
                default => new ClassElement($reflectionClass)
            };

            if ($element->isInApi) {
                $elements[$fqcn] = $element;
            }
        }

        return $elements;
    }

    /**
     * Returns the FQCN of the object in the file, or `null` if the file does not contain an object.
     *
     * @param string $filename The file to extract the FQCN from.
     * @return string|null
     * @psalm-return class-string|null
     */
    private static function getFQCN(string $filename): ?string
    {
        $fqcn = null;
        $content = file_get_contents($filename);

        if (is_string($content)) {
            $tokens = token_get_all($content);

            foreach ($tokens as $i => $token) {
                if (is_array($token)) {
                    if ($fqcn === null && $token[0] === T_NAMESPACE) {
                        while (true) {
                            if (
                                is_array($tokens[++$i])
                                && in_array(
                                    $tokens[$i][0],
                                    [T_NAME_QUALIFIED, T_STRING, T_NAME_FULLY_QUALIFIED],
                                    true
                                )
                            ) {
                                $fqcn = $tokens[$i][1];
                                break;
                            }
                        }
                    } elseif (
                        is_string($fqcn)
                        && in_array($token[0], [T_CLASS, T_ENUM, T_INTERFACE, T_TRAIT], true)
                    ) {
                        while (true) {
                            if (is_array($tokens[++$i]) && $tokens[$i][0] === T_STRING) {
                                /** @psalm-var class-string $fqcn */
                                $fqcn .= '\\' . $tokens[$i][1];
                                break 2;
                            }
                        }
                    }
                }
            }
        }

        return $fqcn;
    }
}