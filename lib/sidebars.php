<?php

function onlinekhabar_sidebar_widgets(){
register_sidebar(array(
    'id' =>'primary-sidebar',
    'name' => esc_html__('Primary Sidebar', 'onlinekhabar'),
    'description' => esc_html__('This Sidebar appears in the blog posts page.', 'onlinekhabar'),
    'before_widget' => '<section id="%1$s" class="c-sidebar-widget u-margin-bottom-20 %2$s">',
    'after_widget' => '</section>',
    'before_title' => '<h3>',
    'after_title' => '</h3>'
));
}

$footer_layout = sanitize_text_field(get_theme_mod('onlinekhabar_footer_layout', '3,3,3,3'));
$footer_layout = preg_replace('/\s+/', '', $footer_layout);
$columns = explode(',', $footer_layout);
$footer_background = onlinekhabar_sanitize_footer_background(get_theme_mod( 'onlinekhabar_footer_background', 'dark' ));
$widget_theme = '';
if($footer_background == 'light'){
    $widget_theme = 'c-footer-widget--dark';
}else{
    $widget_theme = 'c-footer-widget--light';
}

foreach ($columns as $i => $columns) {
    register_sidebar(array(
        'id' =>'footer-sidebar-' . ($i + 1),
    'name' => sprintf(esc_html__('Footer Widgets Column %s', 'onlinekhabar'), $i + 1),
    'description' => esc_html__('Footer Widgets', 'onlinekhabar'),
    'before_widget' => '<section id="%1$s" class="c-footer-widget' . $widget_theme . '%2$s">',
    'after_widget' => '</section>',
    'before_title' => '<h5 class="h5">',
    'after_title' => '</h5>'
    ));
}
add_action('widgets_init', 'onlinekhabar_sidebar_widgets');