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


function new_excerpt_more( $output ) {
	return ' <a class="read-more" style="color:grey;text-transform:uppercase;padding-left:10px;color:#CCC;font-size:0.9em" href="'.get_permalink( get_the_ID() ).'">'.'Read More'.'</a>';
}
add_filter( 'get_the_excerpt', 'new_excerpt_more' );


?>