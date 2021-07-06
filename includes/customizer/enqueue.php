<?php

function onlinekhabar_customize_preview_init(){
    wp_enqueue_script(
        'onlinekhabar_theme_customizer',
        get_theme_file_uri( '/assets/css/bundle.css' ),
        [ 'jquery', 'customize-preview' ],
        false,
        true 
    );
}