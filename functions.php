<?php
// Includes
require_once('lib/customize.php');
require_once('lib/helpers.php');
require_once('lib/enqueue-assets.php');
require_once('lib/sidebars.php');
require_once('lib/theme-support.php');
require_once('lib/navigation.php');
require_once('lib/comment-callback.php');
require_once('lib/most-recent-widget.php');
require_once('includes/register-plugins.php');
require_once('includes/libs/class-tgm-plugin-activation.php');
require_once('includes/setup.php');
require_once('includes/customizer/social.php');
require_once('includes/customizer/misc.php');
require_once( 'includes/buddypress/profile-tabs.php');
require_once( 'includes/buddypress/profile-posts.php');
require_once( 'includes/utility.php');


// Hooks
add_action( 'bp_setup_nav', 'onlinekhabar_buddypress_profile_tabs' );
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

add_action('tgmpa_register', 'onlinekhabar_register_required_plugins');

add_action('after_setup_theme', 'onlinekhabar_setup_theme');

function onlinekhabar_load_textdomain() {
    load_theme_textdomain('onlinekhabar', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'onlinekhabar_load_textdomain');

add_filter('register_post_type_args', 'onlinekhabar_filter_portfolio', 10, 2);
function onlinekhabar_filter_portfolio($args, $post_type){
if($post_type === 'onlinekhabar_portfolio'){
    $args['rewrite']['slug'] = get_theme_mod('onlinekhabar_portfolio_slug', 'portfolio');
}
return $args;
}

add_action('customize_save_after', 'onlinekhabar_customize_save_after');

add_action('init', 'onlinekhabar_flush_rewrite', 9999);
function onlinekhabar_flush_rewrite() {
    if(get_theme_mod('onlinekhabar_flush_flag', false)) {
        flush_rewrite_rules();
        set_theme_mod('onlinekhabar_flush_flag', false);
    }
}

function onlinekhabar_customize_save_after() {
    $old = get_post_type_object('onlinekhabar_portfolio')->rewrite['slug'];
    $new = get_theme_mod('onlinekhabar_portfolio_slug', 'portfolio');
    if($old !== $new) {
    set_theme_mod('onlinekhabar_flush_flag', true);
    }
}

if(!isset($content_width)) {
    $content_width = 800;
}

function onlinekhabar_content_width() {
    global  $content_width;
    global  $post;

    if(is_single() && $post->post_type === 'post'){
        $layout = onlinekhabar_meta( $post->ID, '_onlinekhabar_post_layout', 'full' );
        $sidebar = is_active_sidebar( 'primary-sidebar' );
        if($layout === 'sidebar' && !$sidebar) {
            $layout = 'full';
        }
        $content_width = $layout === 'full' ? 800 : 738;
    }
}

add_action('template_redirect', 'onlinekhabar_content_width');

function onlinekhabar_image_sizes($sizes, $size, $image_src, $image_meta, $attachment_id){
    $width = $size[0];
    global $content_width;
    global $post;
    $layout = 'full';

    if(is_single() && $post->post_type === 'post'){
        $layout = onlinekhabar_meta( $post->ID, '_onlinekhabar_post_layout', 'full' );
        $sidebar = is_active_sidebar( 'primary-sidebar' );
        if($layout === 'sidebar' && !$sidebar) {
            $layout = 'full';
        }
    }

    if($content_width <= $width){
        if($layout === 'full') {
            $sizes = '(max-width: 862px) calc(100vw - 1.25rem*2 - 0.625rem*2 -2px),  ' . $content_width . 'px';
    }elseif ($layout === 'sidebar') {
        $sizes = '(max-width: 640px) calc(100vw - 1.25rem*2 - 0.625rem*2 -2px),
        (max-width: 1200px) calc(100vw - 33.33333vw - 0.625*4 1.25rem*2 -2px)' . $content_width . 'px';
    }
} else {
    $sizes = '(max-width:' . ($width + 62) . 'px) calc(100vw - 1.25rem*2 - 0.625rem*2 -2px)' . $width . 'px';
}

return '$sizes';
}
add_filter('wp_calculate_image_sizes', 'onlinekhabar_image_sizes', 10, 5);

function onlinekhabar_handle_delete_post(){
    if(isset($_GET['action']) && $_GET['action'] === 'onlinekhabar_delete_post'){
        if(!isset($_GET['nonce']) || !wp_verify_nonce($_GET['nonce'], 'onlinekhabar_delete_post' . $_GET['post'])){
            return;
        }
        $post_id = isset($_GET['post']) ? $_GET['post'] : null;
        $post = get_post((int) $post_id);
        if(empty($post)){
            return;
        }
        if(!current_user_can('delete_post', $post_id)){
            return;
        }

        wp_trash_post($post_id);
        wp_safe_redirect(home_url() );

        die;
    }
}

add_action('init', 'onlinekhabar_handle_delete_post');

?>