<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open() ?>
    <?php get_template_part('template-parts/header/social-header'); ?>
    <a class="u-skip-link" href="#content"> <?php esc_attr_e('Skip to content', 'onlinekhabar'); ?></a>
    <header role="banner" class="u-margin-bottom-40">
        <div class="c-header">
            <div class="o-container u-flex u-align-justify u-align-middle">
                <!-- Logo ============================================= -->
                <div class="c-header__logo">
                    <?php if(has_custom_logo()){
                    the_custom_logo();
                }else{ ?>
                    <a class="c-header__blogname"
                        href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html(bloginfo('name')); ?>
                    </a>
                    <?php } ?>
                    <div class="logo-date-holder"><?php echo date(get_option('date_format')); ?></div>
                </div>
                <!-- #logo end -->
                <?php
                if( get_theme_mod( 'onlinekhabar_header_show_search' ) ){ ?>
                <!-- Top Search ============================================= -->
                <?php get_search_form(true); ?>
                <!-- #top-search end -->
                <?php } ?>
                <!-- Ads ============================================= -->
                <div class="top-advert">
                    <?php
                    if( function_exists( 'quads_ad' ) ){
                        echo quads_ad([ 'location' => 'onlinekhabar_header' ]); } ?>
                </div>
                <!-- #Ads end -->
            </div>
        </div>
        <!-- Start Main Navigation Menu -->
        <div class="c-navigation">
            <div class="o-container">
                <nav class="header-nav" role="navigation"
                    aria-label="<?php esc_attr_e( 'Main Navigation', 'onlinekhabar' ) ?>">
                    <?php wp_nav_menu( array('theme_location' => 'main-menu') ) ?>
                    <?php get_template_part('template-parts/header/top-cart') ?>
                </nav>
            </div>
        </div>
        <!-- End Main Navigation Menu -->
    </header>
    <div id="content">