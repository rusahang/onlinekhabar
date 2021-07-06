<?php
function onlinekhabar_assets(){
    wp_enqueue_style('onlinekhabar-stylesheet', get_template_directory_uri() . 
    '/assets/css/bundle.css', array(), '1.0.0', 'all');

    include(get_template_directory() . '/lib/inline-css.php');
    wp_add_inline_style('onlinekhabar-stylesheet', $inline_styles);

    // wp_enqueue_script('jquery'); // there is no parameter because it's already exisiting handle in WordPress.
    wp_enqueue_script('onlinekhabar-scripts', get_template_directory_uri() . '/assets/js/bundle.js', array('jquery'), '1.0.0', true);

    if( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

add_action('wp_enqueue_scripts', 'onlinekhabar_assets');

function onlinekhabar_block_editor_assets() {
    wp_enqueue_style( 'onlinekhabar-block-editor-styles', get_template_directory_uri() . '/assets/css/editor.css', array(), '1.0.0', 'all' );
}

add_action( 'enqueue_block_editor_assets', 'onlinekhabar_block_editor_assets' );

function onlinekhabar_admin_assets(){
    wp_enqueue_style('onlinekhabar-admin-stylesheet', get_template_directory_uri() . 
    '/assets/css/admin.css', array(), '1.0.0', 'all');

    wp_enqueue_script('onlinekhabar-admin-scripts', get_template_directory_uri() . '/assets/js/admin.js', array(), '1.0.0', true);
}
add_action('admin_enqueue_scripts', 'onlinekhabar_admin_assets');

function onlinekhabar_customize_preview_js () {
    wp_enqueue_script( 'onlinekhabar-cutomize-preview', get_template_directory_uri() . '/assets/js/customize-preview.js', array('customize-preview', 'jquery'), '1.0.0' , true );

    include(get_template_directory() . '/lib/inline-css.php');
    wp_localize_script( 'onlinekhabar-cutomize-preview', 'onlinekhabar', array('inline-css' => $inline_styles_selectors) );
}

add_action( 'customize_preview_init', 'onlinekhabar_customize_preview_js' );