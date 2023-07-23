<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Spark Multipurpose
 */
get_header(); ?>
<div class="container">
	<div class="d-grid d-blog-grid-column-1">
		<div id="primary" class="content-area text-center">
			<main id="main" class="site-main">
				<div class="articlesListing">
					<section class="error-404 not-found">
						<header class="page-header">
							<h1><?php esc_html_e('404','spark-multipurpose'); ?></h1>
							<h2 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'spark-multipurpose' ); ?></h2>
						</header><!-- .page-header -->
						<div class="page-content">
							<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'spark-multipurpose' ); ?></p>							
						</div><!-- .page-content -->
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary">
							<span><?php esc_html_e('Back To Home','spark-multipurpose'); ?></span>
							<i class="fas fa-long-arrow-alt-right"></i>
						</a>
					</section><!-- .error-404 -->
				</div>
			</main><!-- #main -->
		</div><!-- #primary --><!-- #primary -->
	</div>
</div>
<?php get_footer();