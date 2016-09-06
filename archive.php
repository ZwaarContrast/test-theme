<?php
/**
 * The template for displaying Archive pages.
 *
 * @package 	WordPress
 * @subpackage 	Zwaar Contrast Boilerplate
 * @since 		Zwaar Contrast Boilerplate 1.0
 */
?>
<?php ZC_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php if ( have_posts() ): 

		if ( is_day() ) : ?>
			<h2><?php _e('Archief:','zwaarcontrast');  echo  ' '.get_the_date( 'D M Y' ); ?></h2>							
	<?php elseif ( is_month() ) : ?>
		<h2><?php _e('Archief:','zwaarcontrast');  echo  ' '.get_the_date( 'M Y' ); ?></h2>	
	<?php elseif ( is_year() ) : ?>
		<h2><?php _e('Archief:','zwaarcontrast');  echo  ' '.get_the_date( 'Y' ); ?></h2>								
	<?php else : ?>
		<h2><?php _e('Archief:','zwaarcontrast'); ?></h2>	
	<?php endif; ?>

	<?php while ( have_posts() ) : the_post(); ?>
			<a class="" href="<?php esc_url( the_permalink() ); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a>
	<?php endwhile; ?>
<?php else: ?>
	No posts to display
<?php endif; ?>

<?php ZC_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>