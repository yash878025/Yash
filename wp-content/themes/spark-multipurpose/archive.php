<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Spark Multipurpose
 */

$layout = get_theme_mod( 'spark_multipurpose_blogtemplate_layout', 'default' );

$post_sidebar =  get_theme_mod( 'spark_multipurpose_blog_template_sidebar','right' );

$column =  get_theme_mod( 'spark_multipurpose_post_column','1' );

get_header(); ?>
<div class="container">
	<div class="d-grid d-blog-grid-column-2 sidebar-<?php echo esc_attr($post_sidebar); ?> layout-<?php echo esc_attr($layout); ?>">
		<?php if( $post_sidebar == 'left' && is_active_sidebar('sidebar-2') ){ get_sidebar('left'); } ?>
		<div id="primary" class="content-area">
			<main id="main" class="site-main">
				<div class="innerwrapper">	
					<?php
						if ( have_posts() ) :?>
							<div class="articlesListing d-grid d-grid-column-<?php echo esc_attr($column);?>">
								<?php 
									/* Start the Loop */
									while ( have_posts() ) : the_post();
										/*
										* Include the Post-Type-specific template for the content.
										* If you want to override this in a child theme, then include a file
										* called content-___.php (where ___ is the Post Type name) and that will be used instead.
										*/
										// Post Display Layout
										get_template_part( 'template-parts/content', get_post_format() );
									
									endwhile;

							echo "</div>";

							the_posts_pagination( 
			            		array(
								    'prev_text' => sprintf( esc_html__(  '%s', 'spark-multipurpose' ), '<i class="fas fa-arrow-left"></i> <span>Prev</span>' ),
								    'next_text' => sprintf( esc_html__(  '%s', 'spark-multipurpose' ), '<span>Next</span> <i class="fas fa-long-arrow-alt-right"></i>' ),
								)
				            );

						else :

							get_template_part( 'template-parts/content', 'none' );
							
						endif;
					?>
				</div><!-- Articales Listings -->
			</main><!-- #main -->
		</div><!-- #primary -->
		<?php if( $post_sidebar == 'right' && is_active_sidebar('sidebar-1') ){ get_sidebar('right'); } ?>
	</div>
</div>
<?php get_footer();