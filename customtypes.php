<?php
/**
 * Definitions for custom post types
 *
 * @package 	WordPress
 * @subpackage 	Zwaar Contrast Boilerplate
 * @since 		Zwaar Contrast Boilerplate 1.0
 */


/**
*
* Example => Register a new post type
* More info on this can be found here: http://codex.wordpress.org/Function_Reference/register_post_type
*
*/


// add_action('init', 'posttypename_register');   

// function posttypename_register() {   
// 	$labels = array( 'name' => _x('Post', 'post type general name'),
// 		'singular_name' => _x('Post', 'post type singular name'), 
// 		'add_new' => _x('Add New Post', 'blogpost'), 
// 		'add_new_item' => __('Add New Post'), 
// 		'edit_item' => __('Edit Post'), 
// 		'new_item' => __('New Post'), 
// 		'view_item' => __('View Post'), 
// 		'search_items' => __('Search Posts'), 
// 		'not_found' => __('Nothing found'), 
// 		'not_found_in_trash' => __('Nothing found in Trash'), 
// 		'parent_item_colon' => '' );   

// 	$args = array( 'labels' => $labels, 
// 		'menu_icon' => 'dashicons-backup', //See https://developer.wordpress.org/resource/dashicons for more dashicons
// 		'public' => true, //Is this post type public?
// 		'publicly_queryable' => true, //Is this post type queryable?
// 		'has_archive' => true, //Does this post type have an archive page?
// 		'show_ui' => true, //Admin post type UI?
// 		'show_in_menu' => true, //Show in admin menu?
// 		'query_var' => true, //Query var key for this post type (Can also be a string)
// 		'capability_type' => 'post', 
// 		'hierarchical' => false, //Can this post type have parent pages?
// 		'rewrite' => array('slug' => 'myposttype'), //Set slug
// 		'supports' => array('title','editor','thumbnail') //Add supports for this post type
// 	);   

// 	register_post_type( 'timespan' , $args ); 
// }

/**
*
* Example => Register a new taxonomy
* More info on this can be found here: http://codex.wordpress.org/Function_Reference/register_taxonomy
*
*/

// add_action( 'init', 'create_posttypename_taxonomies', 0 );

// function create_posttypename_taxonomies() {
// 	//Category taxonomy
//     register_taxonomy(
//         'taxonomyname',
//         'posttypename',
//         array(
//             'labels' => array(
//                 'name' => 'taxonomyname',
//                 'add_new_item' => 'Add New taxonomyname',
//                 'new_item_name' => "New taxonomyname"
//             ),
//             'show_ui' => true,
//             'show_tagcloud' => true,
//             'hierarchical' => true,
//             'rewrite' => array('slug' => 'taxonomyslug'),
//             'show_admin_column' => true
//         )
//     );
// }

?>