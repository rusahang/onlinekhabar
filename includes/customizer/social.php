<?php

function onlinekhabar_social_customizer_section( $wp_customize ){
    $wp_customize->add_setting( 'onlinekhabar_facebook_handle', [ 
        'default'   =>  '',
        'sanitize_callback' => 'sanitize_text_field'
    ]);

    $wp_customize->add_setting( 'onlinekhabar_twitter_handle', array(
        'default'                   =>  '',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_setting( 'onlinekhabar_instagram_handle', array(
        'default'                   =>  '',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_setting( 'onlinekhabar_email', array(
        'default'                   =>  '',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_setting( 'onlinekhabar_phone_number', array(
        'default'                   =>  '',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_section( 'onlinekhabar_social_section', [
        'title'     =>  __( 'onlinekhabar Social Settings', 'onlinekhabar' ),
        'priority'  =>  30,
        'panel'     =>  'onlinekhabar'
    ]);

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'onlinekhabar_social_facebook_input',
        array(
            'label'          => __( 'Facebook Handle', 'onlinekhabar' ),
            'section'        => 'onlinekhabar_social_section',
            'settings'       => 'onlinekhabar_facebook_handle'
        )
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'onlinekhabar_social_twitter_input',
        array(
            'label'                 =>  __( 'Twitter Handle', 'onlinekhabar' ),
            'section'               => 'onlinekhabar_social_section',
            'settings'              => 'onlinekhabar_twitter_handle',
            'type'                  =>  'text'
        )
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'onlinekhabar_social_instagram_input',
        array(
            'label'                 =>  __( 'Instagram Handle', 'onlinekhabar' ),
            'section'               => 'onlinekhabar_social_section',
            'settings'              => 'onlinekhabar_instagram_handle',
            'type'                  =>  'text'
        )
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'onlinekhabar_social_email_input',
        array(
            'label'                 =>  __( 'Email', 'onlinekhabar' ),
            'section'               => 'onlinekhabar_social_section',
            'settings'              => 'onlinekhabar_email',
            'type'                  =>  'text'
        )
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'onlinekhabar_social_phone_number_input',
        array(
            'label'                 =>  __( 'Phone Number', 'onlinekhabar' ),
            'section'               => 'onlinekhabar_social_section',
            'settings'              => 'onlinekhabar_phone_number',
            'type'                  =>  'text'
        )
    ));
}