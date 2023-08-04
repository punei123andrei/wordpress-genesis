<?php

namespace TheThemeName\General;

/**
 * Class will hold all general logic
 */
class General
{

    /**
     * Init class
     */
    public function init(): void
    {
        // add_filter('tiny_mce_before_init', [$this, 'customizeTinyMce']);
        // add_filter('pre_get_posts', [$this, 'changePostsPerPageOnSearch']);
        // add_action('template_redirect', [$this, 'redirectArchives']);
        // add_filter('wp_nav_menu_items', [$this, 'customLanguageSwitcher'], 10, 2);

        // add_action('init', [$this, 'customRewrites']);
        // add_filter('request', [$this, 'alterSearchOnRequest']);
        // add_filter('template_redirect', [$this, 'redirectDefaultSearch']);

        // add_filter('wpseo_breadcrumb_separator', [$this, 'yoastBreadcrumbSeparator']);

    }

    /**
     * Add custom rewrite rules.
     */
    public function customRewrites(): void
    {
        global $wp_rewrite;

        $wp_rewrite->search_base = __('search', 'the-theme-name-text-domain');
        $wp_rewrite->pagination_base = __('page', 'the-theme-name-text-domain');

        $wp_rewrite->flush_rules();
    }


    /**
     * Change search query var
     * @param array $request
     * @return array
     */
    public function alterSearchOnRequest(array $request): array
    {
        // search string translated
        $search = __('search', 'the-theme-name-text-domain');

        // if our search string is found in request alter s
        if (isset($_REQUEST[$search])) {
            $request['s'] = $_REQUEST[$search];
        }

        return $request;
    }

    /**
     * Redirect default search param
     *
     */
    public function redirectDefaultSearch(): void
    {
        // this is the default search
        if (is_search() && !empty(get_query_var('s'))) {

            // current url
            $currentUrl = getCurrentUrl();

            // current language code
            $currentLangugeCode = apply_filters('wpml_current_language', null);

            // change current url by search param multilang
            $translatedUrl = changeSearchUrlByLang($currentUrl, $currentLangugeCode, 'the-theme-name-text-domain');

            // if there is a translated url just redirect to it
            if (!empty($translatedUrl)) {
                wp_redirect($translatedUrl);
                exit();
            }
        }
    }

    /**
     * Change posts per page on search results page
     *
     * @param object $query     Current query to alter
     *
     */
    public function changePostsPerPageOnSearch(object $query): void
    {
        if ($query->is_search() && $query->is_main_query() && !is_admin()) {
            $query->set('posts_per_page', 9);
        }
    }

    /**
     * Customize tinymce wp default
     *
     * @param  array $settings         Tinymce settings
     */
    public function customizeTinyMce(array $settings): array
    {
        $settings['toolbar1'] = 'formatselect,bold,italic,bullist,numlist,alignleft,aligncenter,alignright,link,pastetext,removeformat,outdent,indent,undo,redo,wp_help';
        $settings['toolbar2'] = '';

        return $settings;
    }

    /**
     * Redirect default archives and categories
     *
     * @return void
     */
    public function redirectArchives(): void
    {
        global $wp_query;

        // redirect to homepage if any archive / category / author pages
        if ((is_category() || is_archive() || is_author()) && !is_admin()) {
            $wp_query->set_404();
            status_header(404);
        }
    }

    /**
     * Custom language switcher
     *
     * @param string $items Language items
     * @param object $args Menu args object
     * @return string
     */
    public function customLanguageSwitcher(string $items, object $args): string
    {

        // get languages
        $languages = apply_filters('wpml_active_languages', null, 'skip_missing=0' );

        // if this is not our top menu just return $items
        if ($args->theme_location != 'topbar') {
            return $items;
        }

        $dropdownItems = '';

        $activeLanguage = '';

        if ($languages) {

            foreach ($languages as $language) {

                // if there is a search string, change lang url to include custom search strings
                $language['url'] = changeSearchUrlByLang($language['url'], $language['code'], 'the-theme-name-text-domain') ?: $language['url'];

                $link = '<a href="' . $language['url'] . '"><span class="wpml-ls-native" lang="' . $language['language_code'] . '"> ' . $language['native_name'] . '</span></a>';

                if(!$language['active']){
                    $dropdownItems .= '<li class="menu-item wpml-ls-item wpml-ls-menu-item">' . $link . '</li>';
                } else {
                    $activeLanguage = '<li id="" class="menu-item wpml-ls-item wpml-ls-current-language wpml-ls-menu-item wpml-ls-first-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-has-children">' . $link;
                }
            }

            return $items . $activeLanguage . '<ul class="sub-menu">' . $dropdownItems . '</ul></li>';
        }
    }

    /**
     * Change Yoast Seo breadcrumb separator using class
     */
    public function yoastBreadcrumbSeparator(): string
    {
        return '<span class="hero-breadcrumb-separator"></span>';
    }
}
