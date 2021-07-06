<?php

function onlinekhabar_register_menus() {
    register_nav_menus( array(
        'main-menu' => esc_html__('Main Menu', 'onlinekhabar'),
        'footer-menu' => esc_html__('Footer Menu', 'onlinekhabar'),
    ) );
}
add_action( 'init', 'onlinekhabar_register_menus' );

function onlinekhabar_aria_hasdropdown($atts, $item, $args) {
    if($args->theme_location == 'main-menu') {
        if(in_array('menu-item-has-children', $item->classes)) {
            $atts['aria-haspopup'] = 'true';
            $atts['aria-expanded'] = 'false';
        }
    }
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'onlinekhabar_aria_hasdropdown', 10, 3 );

function onlinekhabar_submenu_button($dir = 'down', $title = 'down') {
    $button = '<button class="menu-button">';
    $button .= '<span class="u-screen-reader-text menu-button-show">' . sprintf(esc_html__('Show %s submenu', 'onlinekhabar'), $title) . '</span>';
    $button .= '<span aria-hidden="true" class="u-screen-reader-text menu-button-hide">' . sprintf(esc_html__('Hide %s submenu', 'onlinekhabar'), $title) . '</span>';
    $button .= '<i class="fa fa-angle-' . $dir . '" aria-hidden="true"></i>';
    $button .= '</button>';
    return $button;
}

function onlinekhabar_dropdown_icon($title, $item, $args, $depth) {
    if($args->theme_location == 'main-menu') {
        if(in_array('menu-item-has-children', $item->classes)) {
            if($depth == 0) {
                $title .= onlinekhabar_submenu_button('down', $title);
            } else {
                $title .= onlinekhabar_submenu_button('right', $title);
            }
        }
    }
    return $title;
}

add_filter( 'nav_menu_item_title', 'onlinekhabar_dropdown_icon', 10, 4 );