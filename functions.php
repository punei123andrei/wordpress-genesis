<?php

namespace TheThemeName;

use function TheThemeName\asset;

/** Register The Auto Loader */
if (!file_exists($composer = __DIR__ . '/vendor/autoload.php')) {
    wp_die(__('Error locating autoloader. Please run <code>composer install</code>.', 'the-theme-name-text-domain'));
}
require $composer;

use TheThemeName\Admin\Admin;
use TheThemeName\Admin\AcfAutosize;
use TheThemeName\Theme\Theme;
use TheThemeName\Cleanup\Cleanup;
use TheThemeName\Block\Block;
use TheThemeName\Sidebar\Sidebar;
use TheThemeName\Post\Post;
use TheThemeName\Ajax\Ajax;
use TheThemeName\General\General;

/**
 * Theme config files, global scope
 * @var array
 */
$configFiles = [
    'acf'           => 'app/config/acf',
    'helpers'       => 'app/config/helpers',
    'imageSizes'    => 'app/config/imgsizes',
    'rewrites'      => 'app/config/rewrites',
    'security'      => 'app/config/security',
    'tables'        => 'app/config/tables',
];

foreach ($configFiles as $config) {
    require_once get_stylesheet_directory() . "/$config.php";
}

add_action('acf/init', function () {

    /**
     * Acf autoresize boxes in admin
     * @var AcfAutosize
     */
    $acfResize = new AcfAutosize();
    $acfResize->init();

    /**
     * Add options page
     */
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page([
            'page_title' => 'Theme General Settings',
            'menu_title' => 'Theme Settings',
            'menu_slug'  => 'theme-general-settings',
            'capability' => 'edit_posts',
            'redirect'   => false
        ]);
    }

});

/**
 * Cleanup logic
 */
$cleanup = new Cleanup();
$cleanup->init();

/**
 * Init theme
 */
$theme = new Theme();

/**
 * Init admin
 */
$admin = new Admin();

/**
 * Custom blocks
 */
$blocks = new Block();
$blocks->init();

/**
 * Custom sidebars
 */
$sidebar = new Sidebar();
$sidebar->init();

/**
 * Posts logic
 */
$posts = new Post();
$posts->init();

/**
 * Init Ajax
 */
$ajax = new Ajax();
$ajax->init();

/**
 * Init General
 */
$general = new General();
$general->init();

// ajax localisation
$getPostsByPostTypeLocalisation = [
    'ajaxurl'  => admin_url('admin-ajax.php'),
    'security' => wp_create_nonce('ajax_admin'),
];

// add blocks admin style and scripts
$admin->addAdminStyle('admin', mix('/css/admin.css'));
$admin->addAdminStyle('admin-blocks', mix('/css/editor-blocks.css'));
$admin->addAdminScriptLocalization('admin-acf-scripts', mix('/js/app-admin.js'), [], null, true, 'ajaxObject', $getPostsByPostTypeLocalisation);

// include tinymce settings to acf admin footer
$admin->actionAcfEnqueueAdminHeader(function () {
    ?>
        <script>
            const adminCss = '<?php echo asset('/css/tiny-mce-admin.css'); ?>';
        </script>
    <?php
});

// main theme style front end
$theme->addStyle('theme-style', mix('/css/style.css'));

// add blocks front end style
$theme->addStyle('blocks', mix('/css/blocks.css'));

// add theme and block front end script
$theme->addScript('themes', mix('/js/app.js'), [], null, true);

// add blocks image sizes
// $theme->addImageSize('the-theme-name-text-domain-section-banner', 2000, 1080, true);

/**
 * Add theme menus
 */
$theme->addNavMenus([
    'primary'   => __('Main Menu',  'the-theme-name-text-domain'),
    'footer'    => __('Footer Menu', 'the-theme-name-text-domain'),
]);

// remove support for excerpt in post
// $theme->removePostTypeSupport('post', 'excerpt');
