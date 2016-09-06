<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package 	WordPress
 * @subpackage 	Zwaar Contrast Boilerplate
 * @since 		Zwaar Contrast Boilerplate 1.0
 */
?>
<?php ZC_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<h1><?php _e('Page not found','zwaarcontrast'); ?></h1>
<p><?php _e('The page you are trying to visit does not exist.','zwaarcontrast'); ?></p>

<?php ZC_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>