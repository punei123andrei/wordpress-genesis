<?php

namespace TheThemeName\Requirements;

use TheThemeName\Requirements\Exception\MissingDependenciesException;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class DependencyChecker
{
    /**
     * Define the plugins that our plugin requires
     *
     * @since 1.0.0
     * @var string[]
     */
    public const REQUIRED_PLUGINS = [

    ];

    /**
     * Check if all required plugins are active. If not, throw an exception.
     * @throws MissingDependenciesException
     */
    public function check(): void
    {
        $missing_plugins = $this->getMissingPluginList();

        if (!empty($missing_plugins)) {
            throw new MissingDependenciesException($missing_plugins);
        }
    }

    /**
     * Iterates the list of required plugins and returns the names of inactive
     * @return string[] Names of plugins that are required but are not active.
     */
    private function getMissingPluginList(): array
    {
        $missingPlugins = array_filter(
            self::REQUIRED_PLUGINS,
            [$this, 'isPluginInactive'],
            ARRAY_FILTER_USE_BOTH
        );

        return array_keys($missingPlugins);
    }

    /**
     * Checks if a plugin's main file is absent from the list of active plugins' main files reported by WordPress.
     * @param string $mainPluginFilePath Path to main plugin file, as defined in self::REQUIRED_PLUGINS.
     * @return bool Whether a plugin is inactive.
     */
    private function isPluginInactive(string $mainPluginFilePath): bool
    {
        return !in_array($mainPluginFilePath, $this->getActivePlugins());
    }

    /**
     * Gets the list of active plugins' main files from WordPress.
     * @return string[] Returns an array of active plugins' main files.
     */
    private function getActivePlugins(): array
    {
        return apply_filters('active_plugins', get_option('active_plugins'));
    }
}
