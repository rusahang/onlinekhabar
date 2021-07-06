<?php

function onlinekhabar_buddypress_profile_tabs(){
  if( !onlinekhabar_plugin_activated_check( 'recipe/index.php' ) ){
    return;
  }

  global $bp;

  bp_core_new_nav_item([
    'name'                    =>  esc_html__( 'Recipes', 'onlinekhabar' ),
    'slug'                    =>  'recipes',
    'position'                =>  100,
    'screen_function'         =>  'onlinekhabar_recent_recipes_tab',
    'show_for_displayed_user' =>  true,
    'item_css_id'             =>  'onlinekhabar_user_recipes',
    'default_subnav_slug'     =>  'recipes'
  ]);
}