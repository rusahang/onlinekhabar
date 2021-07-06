<?php

function onlinekhabar_setup_theme(){
    add_theme_support( 'starter-content', [
        'widgets'                   =>  [
            // Place three core-defined widgets in the sidebar area.
            'onlinekhabar_sidebar'            =>  [
                'text_business_info', 'search', 'text_about',
            ]
        ],

        // Create the custom image attachments used as post thumbnails for pages.
        'attachments'               =>  [
            'image-about'           =>  [
                'post_title'        =>  __( 'About', 'onlinekhabar' ),
                'file'              =>  'assets/images/1.jpg', // URL relative to the template directory.
            ],
        ],

        // Specify the core-defined pages to create and add custom thumbnails to some of them.
        'posts'                     =>  [
            'home'                  =>  array(
                'thumbnail'         => '{{image-about}}',
            ),
            'about'                 =>  array(
                'thumbnail'         => '{{image-about}}',
            ),
            'contact'               => array(
                'thumbnail'         => '{{image-about}}',
            ),
            'blog'                  => array(
                'thumbnail'         => '{{image-about}}',
            ),
            'homepage-section'      => array(
                'thumbnail'         => '{{image-about}}',
            ),
        ],

        // Default to a static front page and assign the front and posts pages.
        'options'                   =>  [
            'show_on_front'         => 'page',
            'page_on_front'         => '{{home}}',
            'page_for_posts'        => '{{blog}}',
        ],

        // Set the front page section theme mods to the IDs of the core-registered pages.
        'theme_mods'                =>  [
            'onlinekhabar_facebook_handle'    =>  'onlinekhabar',
            'onlinekhabar_twitter_handle'     =>  'onlinekhabar',
            'onlinekhabar_instagram_handle'   =>  'onlinekhabar',
            'onlinekhabar_email'              =>  'onlinekhabar',
            'onlinekhabar_phone_number'       =>  'onlinekhabar',
            'onlinekhabar_header_show_search' =>  'yes',
            'onlinekhabar_header_show_cart'   =>  'yes',
        ],
    ]);
    register_nav_menu('header', __('Header Menu', 'onlinekhabar'));
}

if(has_nav_menu('header')) {
    wp_nav_menu([
        'menu' => 'Top Header',
        'theme_location' => 'header',
        'container' => '',
        'fallback_cb' => false,
        'depth' => 1,
    ]);
}