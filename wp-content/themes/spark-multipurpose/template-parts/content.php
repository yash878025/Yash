<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Spark Multipurpose
 */
$postformat = get_post_format();
$post_description = get_theme_mod( 'spark_multipurpose_post_description_options', 'excerpt' );
$post_content_type 	= apply_filters( 'spark_multipurpose_content_type', $post_description );
$alignment = get_theme_mod('spark_multipurpose_blog_alignment', 'text-center');

if( function_exists( 'pll_register_string' ) ){ 
    $blogreadmore_btn = pll__( get_theme_mod( 'spark_multipurpose_blogtemplate_btn', 'Continue Reading' ) );
}else{ 
    $blogreadmore_btn = get_theme_mod( 'spark_multipurpose_blogtemplate_btn', 'Continue Reading' );
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('article ' .$alignment); ?>>
	<?php
        spark_multipurpose_post_format_media( $postformat );
	?>
	<div class="box-content">
		<?php 
			the_title( '<h3 class="title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); 
			if ( 'post' === get_post_type() ){ do_action( 'spark_multipurpose_post_meta', 10 ); } 
		?>
		<div class="entry-content">
			<?php
				if( is_single( ) ){
					the_content( sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'spark-multipurpose' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					) );
				}else{
					if ( 'excerpt' === $post_content_type ) {
						the_excerpt();
					} elseif ( 'content' === $post_content_type ) {
						the_content( sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'spark-multipurpose' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							get_the_title()
						) );
					}
				}
			?>
		</div>
		<?php if( ! is_single( ) ){ if ( 'excerpt' === $post_content_type ) { ?>
	        <div class="btns">
				<a href="<?php the_permalink(); ?>" class="btn btn-primary">
					<span><?php echo esc_html( $blogreadmore_btn ); ?><i class="fas fa-long-arrow-alt-right"></i></span>
				</a>
			</div>
		<?php } } ?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->