<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp;

use BeastBytes\CodPhp\Error\ErrorLevel;
use BeastBytes\CodPhp\Type\Language;

use function array_filter;
use function array_key_exists;
use function array_merge;
use function file_exists;
use function is_string;

/** Configuration object */
final class Config
{
    /**
     * @var array $config Configuation values indexed by key
     * @psalm-var array{
     *    baseUrl?: ?string, // Base URL for source code links
     *    errorLevel?: ErrorLevel, // Error reporting level
     *    exclude?: list<string>, // Directories to ignore
     *    inheritanceLevel?: InheritanceLevel, // Level of Inherited methods and properties
     *    language?: Language, // PHP Manual language for type links
     *    match?: list<string>, // Directories to ignore
     *    namespace: string, // Namespace to process
     *    outputDir?: string, // Output directory
     *    templateDir?: string, // Template directory
     *    writer?: string // FQCN of the Writer class
     * } $config
     */
    private array $config = [];

    /**
     * Create a configuration object, optionally initialising it from a configuration file.
     *
     * @param ?string $config Path to a file that returns a configuaration array
     */
    public function __construct(?string $config = null)
    {
        if (is_string($config) && file_exists($config)) {
            $this->config = (array) require $config;
        }
    }

    /**
     * Get the value of a configuration key.
     *
     * @param string $key Key to get.
     * @param mixed|null $default A return value if the key does not exist.
     * @return mixed
     */
    public function get(string $key, mixed $default = null): mixed
    {
        return $this->has($key) ? $this->config[$key] : $default;
    }

    /**
     * Check if a configuration key exists.
     *
     * @param string $key Key to check
     * @return bool `true` if the key exists, `false` if not
     */
    public function has(string $key): bool
    {
        return array_key_exists($key, $this->config);
    }

    /**
     * Merge this configuration with another; the other configuration takes precedence.
     *
     * @param Config $config The configuration to merge.
     * @return self
     */
    public function merge(Config $config): self
    {
        $this->config = array_merge($this->config, $config->asArray());
        return $this;
    }

    /**
     * Set the value of a configuration key.
     *
     * @param string $key Key to set.
     * @param mixed $value Value.
     * @return self
     */
    public function set(string $key, mixed $value): self
    {
        $this->config[$key] = $value;
        return $this;
    }

    /**
     * Returns an array of configuration `key => value` pairs with `null` values filtered out.
     *
     * @internal
     * @see merge()
     */
    public function asArray(): array
    {
        return array_filter($this->config, fn ($value) => $value !== null);
    }
}