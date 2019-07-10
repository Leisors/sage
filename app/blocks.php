<?php

namespace App;

function register_acf_block_types() {

    // acf_register_block_type([
    //     'name'              => 'simple-block',
    //     'title'             => __('Simple Block'),
    //     'description'       => __('Just a simple block.'),
    //     'render_callback'   => function() { echo template('partials.blocks.simple-block'); },
    //     'category'          => 'common',
    //     'icon'              => 'format-aside',
    //     'keywords'          => [ 'simple' ],
    // ]);

}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', __NAMESPACE__.'\\register_acf_block_types');
}