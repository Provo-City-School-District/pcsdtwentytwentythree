<?php
/*==========================================================================================
Load Stylesheets and Scripts
============================================================================================*/
function pcsd_parent_styles() {
  wp_enqueue_style( 'parent-style', get_stylesheet_uri(), '', '1.0.0', false);
}
function pcsd_parent_scripts() {
  //register scripts
  wp_register_script( 'global-scripts', get_template_directory_uri() .'/assets/js/scripts.js', array('jquery'), '1.0.0', true);
  //callscripts
  wp_enqueue_script( 'global-scripts');
}
add_action('wp_enqueue_scripts', 'pcsd_parent_styles', 9000);
add_action('wp_enqueue_scripts', 'pcsd_parent_scripts', 9001);

/*==========================================================================================
  Theme Functions & Configurations
============================================================================================*/
//  Theme Setup
require get_template_directory() . '/theme-includes/theme-functions/theme-cms-setup.php';
// Breadcrumbs
require get_template_directory() . '/theme-includes/theme-functions/breadcrumbs.php';

//  ShortCodes
require get_template_directory() . '/theme-includes/theme-functions/shortcodes.php';
