<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class App extends Controller
{
    // protected $acf = false;

    // public function __construct()
    // {
    //     if( acf_get_valid_post_id( get_queried_object() )) {
    //         $this->acf = true;
    //     }
    // }

    public function siteName()
    {
        return get_bloginfo('name');
    }

    public static function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('Latest Posts', 'sage');
        }
        if (is_archive()) {
            return get_the_archive_title();
        }
        if (is_search()) {
            return sprintf(__('Search Results for %s', 'sage'), get_search_query());
        }
        if (is_404()) {
            return __('Not Found', 'sage');
        }
        return get_the_title();
    }
}
