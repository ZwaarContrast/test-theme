<?php
/**
 * The template used to display Tag Archive pages
 *
 * Please see /external/zc-utilities.php for info on ZC_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Zwaar Contrast Boilerplate
 * @since 		Zwaar Contrast Boilerplate 1.0
 */

ZC_Utilities::get_template_parts( array( 'parts/shared/redirection_conditions','parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php if ( have_posts() ): ]
	while ( have_posts() ) : the_post(); ?>
		<a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a>
		<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time>
		<?php the_content();
	endwhile; 
else: ?>
	<h2>No posts to display in <?php echo single_tag_title( '', false ); ?></h2>
<?php endif; 

ZC_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>