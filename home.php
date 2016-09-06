<?php
/**
 * The home template file
 *
 * Please see /external/zc-utilities.php for info on ZC_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Zwaar Contrast Boilerplate
 * @since 		Zwaar Contrast Boilerplate 1.0
 */
?>
<?php ZC_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
			<?php
				global $post;
				$args = array( 'suppress_filters' => 0,'numberposts' => '10', 'post_status'=>'publish');
				$recent_posts = get_posts( $args );
				if(count($recent_posts) === 0){?>
					No posts found!
				<?php }
				foreach( $recent_posts as $recent ):?>
					<?php
					$post = $recent; 
					setup_postdata($post); 
					?>

					<a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
					<?php the_excerpt(); ?>		
					
				<?php endforeach;
				wp_reset_postdata();
			?>

<?php ZC_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>