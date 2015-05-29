<?php

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

// Show posts of 'post', 'page' and 'movie' post types on home page
add_action( 'pre_get_posts', 'add_my_post_types_to_query' );
function add_my_post_types_to_query( $query ) {
  if ( is_home() && $query->is_main_query() )
    $query->set( 'post_type', array( 'post', 'page', 'movie' ) );
  return $query;
}

// Edit post formats
//add_action( 'after_setup_theme', 'add_post_formats', 20 );
//function add_post_formats() {
    //add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video', 'popup1', 'popup2', 'popup3' ) );
//}

//add_action( 'after_setup_theme', 'childtheme_formats', 11 );
//function childtheme_formats(){
     //add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link' ) );
//}

 





?>