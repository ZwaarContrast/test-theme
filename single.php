<?php
/**
 * The Template for displaying all single posts
 *
 * Please see /external/zc-utilities.php for info on ZC_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Zwaar Contrast Boilerplate
 * @since 		Zwaar Contrast Boilerplate 1.0
 */
?>
<?php ZC_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post();
	the_title();
	the_content();
endwhile; ?>

<?php ZC_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>