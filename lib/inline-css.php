<?php

$inline_styles_selectors = array (
    'a' => array(
        'color' => 'onlinekhabar_accent_color',
    ),
    'a.c-post__readmore'        => array(
        'color' => 'onlinekhabar_read_more_color'
    ),
    ':focus' => array(
        'outline-color' => 'onlinekhabar_accent_color',
    ),
    '.c-post.sticky' => array(
        'border-left-color' => 'onlinekhabar_accent_color',
    ),
    'button, input[type=submit], .header-nav .menu > .menu-item:not(.mega) .sub-menu .menu-item:hover > a' => array(
        'background-color' => 'onlinekhabar_accent_color',
    )
);

$inline_styles = "";

foreach ($inline_styles_selectors as $selector => $props) {
    $inline_styles .= "{$selector} {";
        foreach ($props as $prop => $value) {
            $inline_styles .= "{$prop}: " . sanitize_hex_color(get_theme_mod( $value, '#1e73be' )) . ";";
        }
    $inline_styles .= "} ";
}