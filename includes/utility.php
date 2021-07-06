<?php

if( !function_exists( 'onlinekhabar_plugin_activated_check' ) ){
  function onlinekhabar_plugin_activated_check( $plugin_file_name ){
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    return is_plugin_active( $plugin_file_name );
  }
}