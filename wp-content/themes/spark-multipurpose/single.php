<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Spark Multipurpose
 */

$post_sidebar =  get_theme_mod( 'spark_multipurpose_blog_single_template_sidebar','no-center-content' );

$single_post_elements = get_theme_mod('spark_multipurpose_single_post_bottom_elements', 
	array(
		'author_box',
		'pagination',
		'comment',
		'related_posts',
	));

get_header();
if ( have_posts() ) :
	/* Start the Loop */
	while ( have_posts() ) : the_post();
?>
<section id="titlebar-section" class="titlebar-section breadcrumb-section section text-center <?php echo esc_attr($post_sidebar); ?>">
	<div class="container">
		<div class="d-grid">
			<div class="inner-section-wrap breadcrumb_wrapper">
				<h1 class="section-title"><?php the_title(  ); ?></h1>                                
				<nav id="breadcrumb" class="breadcrumb">
					<?php do_action( 'spark_multipurpose_post_meta', 10 ); ?>
				</nav>
			</div>

		</div>
	</div>
</section>
<?php endwhile; endif; ?>

<div class="container">
	<div class="d-grid d-blog-grid-column-2 sidebar-<?php echo esc_attr($post_sidebar); ?>">
		<?php if( $post_sidebar == 'left' && is_active_sidebar('sidebar-2') ){ get_sidebar('left'); } ?>
		<div id="primary" class="content-area">
			<main id="main" class="site-main">
				<div class="articlesListing">	
					<?php
						if ( have_posts() ) :
							/* Start the Loop */
							while ( have_posts() ) :
								the_post();
								/*
								 * Include the Post-Type-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
								 */
								get_template_part( 'template-parts/content', 'single' );

							endwhile;
							
							if ( 'post' == get_post_type() ):

								foreach ($single_post_elements as $element) {

									$template_function_name = "spark_multipurpose_single_{$element}";

									$template_function_name();
								}	
							endif;						


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