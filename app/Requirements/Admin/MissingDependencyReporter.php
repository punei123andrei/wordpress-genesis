<?php

namespace TheThemeName\Requirements\Admin;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Displays a notice about unmet plugin dependencies in the admin dashboard.
 */
class MissingDependencyReporter
{

    /**
     * The capability required to see the "unmet plugin dependencies" notice.
     * @var string
     */
    public const CAPABILITY_REQUIRED_TO_SEE_NOTICE = 'activate_plugins';

    /**
     * Names of the plugins that are required but are not active.
     * @var string[]
     */
    private array $missingPluginNames;

    /**
     * Missing_Dependency_Reporter constructor.
     * @param string[] $missingPluginNames Names of the plugins that are required but are not active.
     */
    public function __construct(array $missingPluginNames)
    {
        $this->missingPluginNames = $missingPluginNames;
    }

    /**
     * Hook into the admin dashboard hook for displaying notices.0
     */
    public function init(): void
    {
        add_action('admin_notices', [$this, 'displayAdminNotice']);
    }

    /**
     * Render the "missing plugins" template if the current user has the required capability.
     */
    public function displayAdminNotice(): void
    {
        if (current_user_can(self::CAPABILITY_REQUIRED_TO_SEE_NOTICE)) {
            $this->renderTemplate();
        }
    }

    /**
     * View template for display.
     */
    private function renderTemplate(): void
    {
        $message = '<strong>Error:</strong> The following required plugins are not active: %s. Please activate these plugins.';
        $template = '<div class="error notice"><p>';
        $template .= sprintf(
            wp_kses(__($message, 'sameday'), ['strong' => [], 'em' => []]), esc_html(implode(', ', $this->missingPluginNames))
        );
        $template .= '</p></div>';
        echo $template;
    }
}
