<?php
function onlinekhabar_theme_support(){
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
    add_theme_support( 'customize-selective-refresh-widgets' );
    add_theme_support( 'custom-logo', array(
        'height' => 70,
        'width' => 288,
        'flex-height' => true,
        'flex-width' => true,
    ));
    add_theme_support('woocommerce');
    
    add_theme_support('post-formats', array(
        'aside',
        'image',
        'video',
        'quote',
        'link',
        'gallery',
        'audio',
    ));
    add_theme_support( 'align-wide' );
    add_image_size('onlinekhabar-blog-image', 1200, 0);

    if (function_exists('quads_register_ad')){
        quads_register_ad( array(
            'location' => 'onlinekhabar_header',
            'description' => 'onlinekhabar Header position') );
        quads_register_ad( array(
            'location' => 'onlinekhabar_content_top',
            'description' => 'onlinekhabar Single post content Footer position') );
        quads_register_ad(array(
            'location' => 'onlinekhabar_content_footer',
            'description' => 'onlinekhabar Single post content Top position'));
    }
}
add_action('after_setup_theme', 'onlinekhabar_theme_support');