<?php

declare(strict_types=1);

use BeastBytes\CodPhp\Element\ObjectElement;
use BeastBytes\CodPhp\Error\ErrorLevel;
use BeastBytes\CodPhp\Writer\Markdown\Helpers;
use BeastBytes\CodPhp\Writer\Writer;

/**
 * @var ?string $baseUrl
 * @var ObjectElement[] $elements
 * @var string $namespace
 * @var ErrorLevel $errorLevel
 * @var Writer $this
 */

// Sort into namespace and alphabetical order within a namespace
uksort($elements, function ($a, $b) {
    $pathA = explode('\\', $a);
    $nameA = array_pop($pathA);
    $pathA = implode('/', $pathA);

    $pathB = explode('\\', $b);
    $nameB = array_pop($pathB);
    $pathB = implode('/', $pathB);

    return ($pathA <=> $pathB) === 0 ? $nameA <=> $nameB : $pathA <=> $pathB;
});

echo sprintf(<<<VITEPRESS_CONFIG
/*
 * Vitepress Config for %s
 *
 * Copy the configuration below into the `themeConfiig/sidebar` section in `docs/.vitepress/config.mts`
 */
  
{
  text: 'API',
  base: '/api/',
  collapsed: true,
  link: "index",
  items: [
%s 
  ]
}

VITEPRESS_CONFIG,
    $namespace,
    renderElements($elements, $namespace)
);

/**
 * @param ObjectElement[] $elements
 * @param string $namespace
 * @param string $path
 * @param int $indent
 * @return string
 */
function renderElements(array &$elements, string $namespace, string $path = '', int $indent = 10): string
{
    $output = '';

    do {
        $key = array_key_first($elements);

        if (!str_starts_with($key, $namespace . $path)) {
            return $output;
        }

        $className = substr($key, strlen($namespace . $path) + 1);

        if (substr_count($className, '\\')) {
            $section = substr($className, 0, strpos($className, '\\'));
            $output .= sprintf(
                <<<SECTION
                  {
                    text: "%s",
                    base: "/api%s/",
                    collapsed: true,
                    items: [
                      %s
                    ]
                  },
                
                SECTION,
                Helpers::toWords($section),
                Helpers::toKebabCase(str_replace('\\', '/', $path) . '/' . $section),
                renderElements($elements, $namespace, $path . '\\' . $section, $indent + 1)
            );
        } else { // Render an element
            $element = array_shift($elements);
            $output .= sprintf(
                <<<ELEMENT
                    {
                      text: "%s",
                      link: "%s"
                    },

                ELEMENT,
                $element->name,
                Helpers::toKebabCase($element->name)
            );
        }
    } while (count($elements));

    return preg_replace('|},\n\n(\s*)]|', "}\n$1]", $output);
}