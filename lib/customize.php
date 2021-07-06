<?php

function onlinekhabar_customize_register($wp_customize) {

    $wp_customize->get_setting('blogname')->transport = 'postMessage';

    $wp_customize->selective_refresh->add_partial('blogname', array(
        // 'settings' => array('blogname');
        'selector'=>'.c-header__blogname',
        'container_inclusive'=> false,
        'render_callback'=> function(){
            bloginfo('name');
        }
    ));

    /*##################  SINGLE SETTINGS ########################*/
    $wp_customize->add_section('onlinekhabar_single_blog_options', array(
        'title' => esc_html__('Single Blog Options', 'onlinekhabar'),
        'discription' => esc_html__('You can change single blog options from here.', 'onlinekhabar'),
        'active_callback' => 'onlinekhabar_show_single_blog_section'
    ));

    $wp_customize->add_setting('onlinekhabar_display_author_info', array(
        'default' => true,
        'transport' => 'postMessage',
        'sanitize_callback' => 'onlinekhabar_sanitize_checkbox'
    ));

    $wp_customize->add_control('onlinekhabar_display_author_info', array(
        'type' => 'checkbox',
        'label' => esc_html__( 'Show Author Info', 'onlinekhabar' ),
        'section' => 'onlinekhabar_single_blog_options'
    ));
    
    function onlinekhabar_sanitize_checkbox( $checked ) {
        return (isset($checked) && $checked === true) ? true : false;
    }

    function onlinekhabar_show_single_blog_section(){
        global $post;
        return is_single() && $post->post_type === 'post';
    }

    /*################## GENERAL SETTINGS ########################*/
    $wp_customize->add_section('onlinekhabar_general_options', array(
        'title' => esc_html__('General Options', 'onlinekhabar'),
        'discription' => esc_html__('You can change general options from here.', 'onlinekhabar')
    ));

    $wp_customize -> add_setting('onlinekhabar_accent_color', array(
        'default' => '#1e73be',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'onlinekhabar_accent_color', array(
        'label' => __( 'Accent Color', 'onlinekhabar' ),
        'section' => 'onlinekhabar_general_options',
    )));

    $wp_customize->add_setting('onlinekhabar_portfolio_slug', array(
        'default' => 'portfolio',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('onlinekhabar_portfolio_slug', array(
        'type' => 'text',
        'label' => esc_html__('Portfolio Slug', 'onlinekhabar'),
        'description' => esc_html__('Will appear in the archive url', 'onlinekhabar'),
        'section' => 'onlinekhabar_general_options',
    ));

    /*##################  SOCIAL SETTINGS ########################*/
    $wp_customize->get_section( 'title_tagline' )->title    =   'General';

    $wp_customize->add_panel( 'onlinekhabar', [
        'title'         =>  __( 'Social Setting Options ', 'onlinekhabar' ),
        'description'   =>  '<p>onlinekhabar Theme Settings</p>',
        'priority'      =>  160
    ]);

    onlinekhabar_social_customizer_section( $wp_customize );
    onlinekhabar_misc_customizer_section( $wp_customize );
    
    /*##################  FOOTER SETTINGS ########################*/

    $wp_customize->selective_refresh->add_partial('onlinekhabar_footer_partial', array(
        'settings' => array('onlinekhabar_footer_background', 'onlinekhabar_footer_layout'),
        'selector'=>'#footer',
        'container_inclusive'=> false,
        'render_callback'=> function(){
            get_template_part('template-parts/footer/widgets');
            get_template_part('template-parts/footer/info');
        }
    ));

    $wp_customize->add_section('onlinekhabar_footer_options', array(
        'title' => esc_html__('Footer Options', 'onlinekhabar'),
        'discription' => esc_html__('You can change footer options from here.', 'onlinekhabar')
    ));

    $wp_customize->add_setting('onlinekhabar_copyright_info', array(
        'default' => '',
        'sanitize_callback' => 'onlinekhabar_sanitize_copyright_info',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control('onlinekhabar_copyright_info', array(
        'text' => 'text',
        'label' => esc_html__('Copyright Info', 'onlinekhabar'),
        'section' => 'onlinekhabar_footer_options'
    ));

    $wp_customize->add_setting('onlinekhabar_footer_background', array(
        'default' => 'dark',
        'transport' => 'postMessage',
        'sanitize_callback' => 'onlinekhabar_sanitize_footer_background'
    ));

    $wp_customize->add_control('onlinekhabar_footer_background', array(
        'type' => 'select',
        'label' => esc_html__('Footer Background', 'onlinekhabar'),
        'choices'=> array(
            'light' => esc_html__('Light', 'onlinekhabar'),
            'dark' => esc_html__('Dark', 'onlinekhabar'),
        ),
        'section' => 'onlinekhabar_footer_options'
    ));

    $wp_customize->add_setting('onlinekhabar_footer_layout', array(
        'default' => '3,3,3,3',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',
        'validate_callback' => 'onlinekhabar_validate_footer_layout'
    ));

    $wp_customize->add_control('onlinekhabar_footer_layout', array(
        'text' => 'text',
        'label' => esc_html__('Footer Layout', 'onlinekhabar'),
        'section' => 'onlinekhabar_footer_options'
    ));

}
add_action('customize_register', 'onlinekhabar_customize_register');

function onlinekhabar_validate_footer_layout( $validity, $value) {
    if(!preg_match('/^([1-9]|1[012])(,([1-9]|1[012]))*$/', $value)) {
        $validity->add('invalid_footer_layout', esc_html__( 'Footer layout is invalid', 'onlinekhabar' ));
    }
    return $validity;
}

function onlinekhabar_sanitize_footer_background($input){
    $valid = array('light', 'dark');
    if(in_array($input, $valid, true)){
        return $input;
    }
    return 'dark';
}

function onlinekhabar_sanitize_copyright_info($input){
    $allowed = array('a' => array(
        'href' => array(),
        'title' => array()
    ));
    return wp_kses($input, $allowed);
}