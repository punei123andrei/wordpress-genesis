<?php

namespace TheThemeName\Requirements;

use TheThemeName\Requirements\Admin\MissingDependencyReporter;
use TheThemeName\Requirements\Exception\MissingDependenciesException;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class CheckPluginDependencies
{
    /**
     * Displays a notice in the admin dashboard.
     */
    public function setup(): void
    {
        try {
            $this->checkDependencies();
            $this->run();
        } catch (MissingDependenciesException $e) {
            $this->displayMissingDependenciesNotice($e);
        }
    }

    /**
     * Instantiates and runs the dependency checker.
     * @throws MissingDependenciesException
     */
    private function checkDependencies(): void
    {
        $dependencyChecker = new DependencyChecker();
        $dependencyChecker->check();
    }

    /**
     * Executes additions
     */
    private function run(): void
    {
        // add_action(), add_filter() etc.
    }

    /**
     * Instantiates and runs the MissingDependencyReporter.
     * Gets a list of missing plugins from the exception and feeds it to MissingDependencyReporter.
     * @param MissingDependenciesException $e
     */
    private function displayMissingDependenciesNotice(MissingDependenciesException $e): void
    {
        $missingDependencyReporter = new MissingDependencyReporter($e->getMissingPluginNames());
        $missingDependencyReporter->init();
    }
}
