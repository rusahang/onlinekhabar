<?php

function onlinekhabar_register_required_plugins(){
 $plugins               = [
[
    'name'              => 'Adsense WP Quads',
    'slug'              => 'quick-adsense-reloaded',
    'required'          => true,
    'force_activation'  => false,
    'force_deativation' => false,
],
[
    'name'              => 'BuddyPress',
    'slug'              => 'buddypress',
    'required'          => true,
    'force_activation'  => false,
    'force_deativation' => false
],
[
    'name'            =>  'WooCommerce',
    'slug'            =>  'woocommerce',
    'required'        =>  true,
],
[
    'name'              => 'metaboxes',
    'slug'              => 'metaboxes',
    'source'            => 'https://github.com/rusahang/onlinekhabar/blob/master/plugins/onlinekhabar-metaboxes.zip',
    'required'          => true,
    'force_activation'  => false,
    'force_deativation' => false
],
[
    'name'              => 'portfolio',
    'slug'              => 'portfolio',
    'source'            => 'https://github.com/rusahang/onlinekhabar/blob/master/plugins/onlinekhabar-portfolio.zip', // The plugin source.
    'required'          => true,
    'force_activation'  => false,
    'force_deativation' => false
]
 ];
 $config                = [
     'id'               => 'onlinekhabar',
     'menu'             => 'tgmpa-install-plugins',
     'parent_slug'      => 'themes.php',
     'capability'       => 'edit_theme_options',
     'has_notices'      => true,
     'dismissable'      => true
 ];

 tgmpa($plugins, $config);
}