<?php

function onlinekhabar_misc_customizer_section( $wp_customize ){
    $wp_customize->add_setting( 'onlinekhabar_header_show_search', [
        'default'       =>  'yes',
        'transport'     =>  'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    ]);

    $wp_customize->add_setting( 'onlinekhabar_header_show_cart', array(
        'default'       =>  'yes',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'     =>  'postMessage'
    ));

    $wp_customize->add_setting( 'onlinekhabar_footer_copyright_text', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'       =>  'Copyrights &copy; 2019 All Rights Reserved.',
    ));

    $wp_customize->add_setting( 'onlinekhabar_footer_tos_page', array(
        'default'       =>  0,
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_setting( 'onlinekhabar_footer_privacy_page', array(
        'default'       =>  0,
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_setting( 'onlinekhabar_show_header_popular_posts', [
        'default'       =>  false,
        'sanitize_callback' => 'sanitize_text_field'
    ]);

    $wp_customize->add_setting( 'onlinekhabar_popular_posts_widget_title', [
        'default'       =>  'Breaking News',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_setting( 'onlinekhabar_read_more_color', [
        'default'       =>  '#0e5dae',
        'sanitize_callback' => 'sanitize_text_field'
    ]);

    $wp_customize->add_setting( 'onlinekhabar_report_file', [
        'default'       =>  '',
        'sanitize_callback' => 'sanitize_text_field'
    ]);

    $wp_customize->add_section( 'onlinekhabar_misc_section', [
        'title'         =>  __( 'onlinekhabar Misc Settings', 'onlinekhabar' ),
        'priority'      =>  30,
        'panel'         =>  'onlinekhabar'
    ]);

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'onlinekhabar_header_show_search_input',
        array(
            'label'                 =>  __( 'Show Search Button in Header', 'onlinekhabar' ),
            'section'               => 'onlinekhabar_misc_section',
            'settings'              => 'onlinekhabar_header_show_search',
            'type'                  =>  'checkbox',
            'choices'               =>  [
                'yes'               =>  'Yes'
            ]
        )
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'onlinekhabar_header_show_cart_input',
        array(
            'label'                 =>  __( 'Show Cart Button in Header', 'onlinekhabar' ),
            'section'               => 'onlinekhabar_misc_section',
            'settings'              => 'onlinekhabar_header_show_cart',
            'type'                  =>  'checkbox',
            'choices'               =>  [
                'yes'               =>  'Yes'
            ]
        )
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'onlinekhabar_footer_copyright_text_input',
        array(
            'label'                 =>  __( 'Show Search Button in Header', 'onlinekhabar' ),
            'section'               => 'onlinekhabar_misc_section',
            'settings'              => 'onlinekhabar_footer_copyright_text',
        )
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'onlinekhabar_footer_tos_page_input',
        array(
            'label'                 =>  __( 'Footer TOS Page', 'onlinekhabar' ),
            'section'               => 'onlinekhabar_misc_section',
            'settings'              => 'onlinekhabar_footer_tos_page',
            'type'                  =>  'dropdown-pages'
        )
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'onlinekhabar_footer_privacy_page_input',
        array(
            'label'                 =>  __( 'Footer Privacy Policy Page', 'onlinekhabar' ),
            'section'               => 'onlinekhabar_misc_section',
            'settings'              => 'onlinekhabar_footer_privacy_page',
            'type'                  =>  'dropdown-pages'
        )
    ));

    $wp_customize->add_control(
        new WP_Customize_Color_Control( 
            $wp_customize, 
            'onlinekhabar_read_more_color_input', 
            array(
                'label'      => __( 'Read more link color', 'onlinekhabar' ),
                'section'    => 'onlinekhabar_misc_section',
                'settings'   => 'onlinekhabar_read_more_color',
            )
        ) 
    );

    $wp_customize->add_control(
        new WP_Customize_Upload_Control( 
            $wp_customize, 
            'onlinekhabar_report_file_input', 
            array(
                'label'      => __( 'File Report', 'onlinekhabar' ),
                'section'    => 'onlinekhabar_misc_section',
                'settings'   => 'onlinekhabar_report_file',
            ) 
        ) 
    );

    $wp_customize->add_control(
        new WP_Customize_Control( 
            $wp_customize, 
            'onlinekhabar_show_header_popular_posts_widget_input', 
            array(
                'label'     => __( 'Show Header Popular Posts Widget', 'onlinekhabar' ),
                'section'   => 'onlinekhabar_misc_section',
                'settings'  => 'onlinekhabar_show_header_popular_posts',
                'type'      =>  'checkbox',
                'choices'   =>  [
                    'yes'   =>  __( 'Yes', 'onlinekhabar' )
                ]
            ) 
        ) 
    );

    $wp_customize->add_control(
        new WP_Customize_Control( 
            $wp_customize, 
            'onlinekhabar_popular_posts_widget_title_input', 
            array(
                'label'     => __( 'Popular Posts Widget Title', 'onlinekhabar' ),
                'section'   => 'onlinekhabar_misc_section',
                'settings'  => 'onlinekhabar_popular_posts_widget_title',
            ) 
        ) 
    );
}