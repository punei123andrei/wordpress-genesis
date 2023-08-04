<?php

namespace TheThemeName\Requirements\Exception;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class MissingDependenciesException extends Exception
{

    /**
     * Names of the plugins that are required but are inactive.
     * @var string[]
     */
    private $missingPluginNames;

    /**
     * MissingDependenciesException constructor.
     * @param string[] $missingPluginNames
     */
    public function __construct($missingPluginNames)
    {
        parent::__construct();
        $this->missingPluginNames = $missingPluginNames;
    }

    /**
     * Returns the list of names of plugins that are required but are inactive
     * @return string[] Names of the plugins that are required but are inactive.
     */
    public function getMissingPluginNames()
    {
        return $this->missingPluginNames;
    }
}
