<?php

// Add Featured Thumbnails in Admin
add_theme_support('post-thumbnails', array(
  'post',
  'page',
  'custom-post-type-name',
));

// Modify Excerpt Dots
function new_excerpt_more( $more ) {
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

// Excerpt Length
function my_excerpt_length_short( $length ) { return 16; }
add_filter( 'excerpt_length', 'my_excerpt_length_short', 999 );

// Reformat Comment Dates
function wpse_comment_date_18350375( $date ) {
  $date = date("M d, Y");
  return $date;
}
add_filter( 'get_comment_date', 'wpse_comment_date_18350375' );

function redirect_comments( $location, $commentdata ) {
  if(!isset($commentdata) || empty($commentdata->comment_post_ID) ){
    return $location;
  }
  $post_id = $commentdata->comment_post_ID;
  // if('my-custom-post' == get_post_type($post_id)){
    return wp_get_referer()."#anchor-comments";
  // }
  return $location;
}
add_filter( 'comment_post_redirect', 'redirect_comments', 10,2 );

// Remove comment author link
function remove_comment_author_link( $return, $author, $comment_ID ) {
	return $author;
}
add_filter( 'get_comment_author_link', 'remove_comment_author_link', 10, 3 );

// Register Menu
function register_my_menu() {
  register_nav_menu('header-menu',__( 'Main Menu' ));
}
add_action( 'init', 'register_my_menu' );

// Register Post Type = Quotes
function quotes_post_type()
{
    $labels = array(
        'name' => 'Quotes',
        'singluar' => 'Quote',
        'add_new' => 'Add Quote',
        'all_items' => 'All Quotes',
        'edit_item' => 'Edit Quote',
        'add_new_item' => 'Add Quote',
        'new_item' => 'New Quote',
        'view_item' => 'View Quote',
        'search_item' => 'Search Quote'
    );

    $args = array (
        'labels' => $labels,
        'public' => true,
				'show_in_menu' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'quotes'],
        'publicly_queryable' => true,
        'query_var' => true,
        'capability_type' => 'post',
        'supports'     => array('thumbnail', 'title', 'editor', 'excerpt', 'author'),
        'taxonomies' => array('category')
    );
    register_post_type('quotes', $args);
}
add_action('init', 'quotes_post_type');
