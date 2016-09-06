<?php
/**
 * The template for displaying Author Archive pages
 *
 * @package 	WordPress
 * @subpackage 	Zwaar Contrast Boilerplate
 * @since 		Zwaar Contrast Boilerplate 1.0
 */
?>
<?php ZC_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php if ( have_posts() ): the_post(); ?>

	<?php echo get_the_author() ; 

	if ( get_the_author_meta( 'description' ) ) : 
		echo get_avatar( get_the_author_meta( 'user_email' ) );
		echo get_the_author() ;
		the_author_meta( 'description' );
	endif; ?>

	<?php rewind_posts(); while ( have_posts() ) : the_post(); ?>
		<a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a>
		<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time>
		<?php the_content(); ?>
	<?php endwhile; ?>

<?php else: ?>
	No posts to display for <?php echo get_the_author() ; ?>
<?php endif; ?>

<?php ZC_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>