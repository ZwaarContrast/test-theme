<?php
/**
 * The template for displaying Category Archive pages
 *
 * @package 	WordPress
 * @subpackage 	Zwaar Contrast Boilerplate
 * @since 		Zwaar Contrast Boilerplate 1.0
 */

ZC_Utilities::get_template_parts( array( 'parts/shared/redirection_conditions','parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php if ( have_posts() ): 
	echo single_cat_title( '', false ); 
	while ( have_posts() ) : the_post(); ?>

		<a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a>
		<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time>
		<?php the_content(); ?>
	<?php endwhile; 
else: ?>
	No posts to display in <?php echo single_cat_title( '', false );

endif; ?>

<?php ZC_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>