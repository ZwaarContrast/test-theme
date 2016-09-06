<?php

/**
 * Zwaar Contrast Settings
 *
 * @package     WordPress
 * @subpackage  Zwaar Contrast Boilerplate
 * @since       Zwaar Contrast Boilerplate 1.0
 *
 * We've included a number of default settings which we always set when using wordpress.
 *
 */
 
/* ========================================================================================================================

PHP Memory limit

======================================================================================================================== */

ini_set('memory_limit','128M');




/* ========================================================================================================================

Remove useless stuff from the <head> section

======================================================================================================================== */

remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wp_generator');
if(isset($sitepress)){
    remove_action('wp_head', array($sitepress,'meta_generator_tag'));
}
remove_action('wp_head', 'feed_links_extra', 3 );

/* ========================================================================================================================
    
AJAX for frontend

======================================================================================================================== */

//Add the url to admin ajax for ajax calls
add_action('wp_head','pluginname_ajaxurl');
function pluginname_ajaxurl() {
?>
    <script type="text/javascript">
        var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
    </script>
<?php
}

/* ========================================================================================================================

Add excerpt support for pages

======================================================================================================================== */

add_action( 'init', 'zc_add_excerpts_to_pages' );
function zc_add_excerpts_to_pages() {
    add_post_type_support( 'page', 'excerpt' );
}

/* ========================================================================================================================

Do not include default CSS templates for WPML plugin language selectors e.d.

======================================================================================================================== */

//We use WPML a lot, but we never need the default styling.
define('ICL_DONT_LOAD_NAVIGATION_CSS', true);
define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);


/* ========================================================================================================================

Disable the admin bar (Because it's the most annoying thing of all...)

======================================================================================================================== */

function zc_disable_admin_bar() {
    add_filter( 'show_admin_bar', '__return_false' );
}
add_action( 'init', 'zc_disable_admin_bar' , 9 );




/* ========================================================================================================================

Add and remove classes in the appropriate places

======================================================================================================================== */

//Add the page slug to body class attribute
add_filter( 'body_class', array( 'ZC_Utilities', 'add_slug_to_body_class' ) );




/* ========================================================================================================================

Set headers

======================================================================================================================== */
function zwaarcontrast_add_headers($headers)
{
    //Set X-UA-Compatible header
    if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){
        $headers['X-UA-Compatible'] = 'IE=edge,chrome=1';
    }

    //Add Keep-Alive header
    $headers['Connection'] = 'Keep-alive';

    return $headers;
}
add_filter('wp_headers', 'zwaarcontrast_add_headers');





/* ========================================================================================================================

Set theme support parameters

======================================================================================================================== */

add_theme_support('post-thumbnails');
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'custom-header' );
add_theme_support( 'custom-background' );
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form' ) );
//add_theme_support( 'post-formats' );





/* ========================================================================================================================
    
Image settings
    
======================================================================================================================== */

//Add default image sizes
if(function_exists('add_image_size')){
    add_image_size( 'header_large', 1600);
}

//Default link type for images set to none
update_option('image_default_link_type','none');

//Remove links from images that already have links
add_filter( 'the_content', 'attachment_image_link_remove_filter' );
function attachment_image_link_remove_filter( $content ) {
    $content =
    preg_replace(
        array('{<a(.*?)(wp-att|wp-content/uploads)[^>]*><img}',
        '{ wp-image-[0-9]*" /></a>}'),
        array('<img','" />'),
        $content
    );
    return $content;
}

//Set JPEG quality to 100%
add_filter( 'jpeg_quality', 'best_jpeg_quality' );
function best_jpeg_quality() {
    return 100;
}


/* ========================================================================================================================

Add custom post types to tag pages

======================================================================================================================== */
function zwaarcontrast_add_custom_types( $query ) {
    if( is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {

        // this gets all post types:
        $post_types = get_post_types();

        // alternately, you can add just specific post types using this line instead of the above:
        // $post_types = array( 'post', 'your_custom_type' );

        //Set all post types to turn op in queries
        $query->set( 'post_type', $post_types );
        return $query;
    }
}
add_filter( 'pre_get_posts', 'zwaarcontrast_add_custom_types' );


/* ========================================================================================================================
    
Change the default URL of the search

======================================================================================================================== */

// function change_search_url( $search_rewrite ) {
//     if( !is_array( $search_rewrite ) ) { return $search_rewrite; }
//     $new_array = array();
//     foreach( $search_rewrite as $pattern => $s_query_string ) {
//         $new_array[ str_replace( 'search/', 'zoeken/', $pattern ) ] = $s_query_string;
//     }
//     $search_rewrite = $new_array;
//     unset( $new_array );
//     return $search_rewrite;
// }
// add_filter("search_rewrite_rules", "change_search_url");


/* ========================================================================================================================

Enable WP 3.0 menus

======================================================================================================================== */

//Top menu
$menuname = 'Top Menu';
register_nav_menu( 'top_menu', $menuname );

$menu_exists = wp_get_nav_menu_object( $menuname );
// If it doesn't exist, let's create it.
if( !$menu_exists){
    $menu_id = wp_create_nav_menu($menuname);
}

/* ========================================================================================================================
    
Login screen

======================================================================================================================== */


// Url of image which appears in login screen must point to Zwaar Contrast
function wpc_url_login(){
    return "http://www.zwaarcontrast.nl/"; // Link to Zwaar Contrast
}
add_filter('login_headerurl', 'wpc_url_login');

/* ========================================================================================================================
    
Wordpress dashboard and admin menu

======================================================================================================================== */

//Remove unnessecary widgets from dashboard
add_action('wp_dashboard_setup', 'wpc_dashboard_widgets');
function wpc_dashboard_widgets() {
    global $wp_meta_boxes;
    // Today widget
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
    // Last comments
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
    // Incoming links
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
    // Plugins
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
    // Quickpress
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
    // Wordpress blog
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
    // Other news
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);

    remove_action('welcome_panel', 'wp_welcome_panel');
    $user_id = get_current_user_id();
    if (0 !== get_user_meta( $user_id, 'show_welcome_panel', true ) ) {
        update_user_meta( $user_id, 'show_welcome_panel', 0 );
    }
}


//Remove unwanted sections from the admin menu
add_action( 'admin_menu', 'zwaarcontrast_remove_menu_pages' );
function zwaarcontrast_remove_menu_pages() {
    //Remove tools
    //remove_menu_page('tools.php');
}

/* ========================================================================================================================
    
Wordpress editor styling

======================================================================================================================== */
// function zwaarcontrast_add_editor_styles() {
//     add_editor_style( get_template_directory_uri().'/css/editor-style.css' );
// }
// add_action( 'init', 'zwaarcontrast_add_editor_styles' );


/* ========================================================================================================================
    
Add template column to Pages overview

======================================================================================================================== */

function zc_custom_pages_columns($columns) {
    //Add page template column
    $columns['page_template'] = __('Page Template', 'zwaarcontrast');
    
    /** Remove a Author, Comments Columns **/
    unset(
        $columns['author'],
        $columns['comments']
    );
    return $columns;
}
add_filter('manage_pages_columns', 'zc_custom_pages_columns');

//Fill the page template column
function zc_show_page_template_column($column_name, $post_id){

    if( $column_name == 'page_template' ) {
        $page_template  = get_post_meta($post_id, '_wp_page_template', true); // file name      
        $templates = get_page_templates();
        $result = array_search($page_template, $templates); // get template nice name
        if(!$result){
            echo __('default','zwaarcontrast');
        }else{
            echo $result;
        }
    }
}   
add_action('manage_pages_custom_column','zc_show_page_template_column',10,2);


/* ========================================================================================================================
    
Edit editor capabilities so the backend will be less cluttered with stuff people should not touch.

======================================================================================================================== */

// get the "editor" role object
$editor = get_role( 'editor' );

// add user management to this role object
$editor->add_cap( 'remove_users' );
$editor->add_cap( 'list_users' );
$editor->add_cap( 'edit_users' );
$editor->add_cap( 'delete_users' );
$editor->add_cap( 'create_users' );

$editor->add_cap( 'edit_theme_options' );

if(ZC_Utilities::check_user_role('editor')){
    //Remove unwanted items from admin menu
    add_action( 'admin_menu', 'zwaarcontrast_editor_remove_menu_pages' );
}

function zwaarcontrast_editor_remove_menu_pages() {
    remove_submenu_page('themes.php','theme-editor.php');
    remove_submenu_page('themes.php','themes.php');
    remove_submenu_page('themes.php','customize.php');
}


//Like a wiseman at Zwaar Contrast once said: "one should never be able to create a force stronger than himself."
//(In other words. Remove roles from the "new user" screen which are higher in rank than the current logged in user.)
function zwaarcontrast_filter_editable_roles($roles) {
    if(current_user_can('administrator')){
        return $roles;
    }
    foreach ($roles as $role => $details) :
        if(!current_user_can($role)):
            unset ($roles[$role]);
            break;
        endif;
    endforeach; //foreach $wp_roles;
    return $roles;
}
add_filter('editable_roles', 'zwaarcontrast_filter_editable_roles');

// If someone is trying to edit or delete and admin and that user isn't an admin, don't allow it
function zwaarcontrast_map_meta_cap( $caps, $cap, $user_id, $args ){
    switch( $cap ){
        case 'edit_user':
        case 'remove_user':
        case 'promote_user':
            if( isset($args[0]) && $args[0] == $user_id )
                break;
            elseif( !isset($args[0]) )
                $caps[] = 'do_not_allow';
            $other = new WP_User( absint($args[0]) );
            if( $other->has_cap( 'administrator' ) ){
                if(!current_user_can('administrator')){
                    $caps[] = 'do_not_allow';
                }
            }
            break;
        case 'delete_user':
        case 'delete_users':
            if( !isset($args[0]) )
                break;
            $other = new WP_User( absint($args[0]) );
            if( $other->has_cap( 'administrator' ) ){
                if(!current_user_can('administrator')){
                    $caps[] = 'do_not_allow';
                }
            }
            break;
        default:
            break;
    }
    return $caps;
}
add_filter( 'map_meta_cap', 'zwaarcontrast_map_meta_cap',10,4);

function remove_caption_padding( $width ) {
        return $width - 10;
    }
    add_filter('img_caption_shortcode_width', 'remove_caption_padding' );


/* ========================================================================================================================
    
We want empty searches to remain on the search page

======================================================================================================================== */
add_filter( 'request', 'search_request_filter' );
function search_request_filter( $query_vars ) {
    if( isset( $_GET['s'] ) && empty( $_GET['s'] ) ) {
        $query_vars['s'] = " ";
    }
    return $query_vars;
}