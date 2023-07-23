<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Spark Multipurpose
 */
$postformat = get_post_format();
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
			<?php the_excerpt(); ?>
		</div>
		<div class="btns">
			<a href="<?php the_permalink(); ?>" class="btn btn-primary">
				<span><?php echo esc_html( $blogreadmore_btn ); ?><i class="fas fa-long-arrow-alt-right"></i></span>
			</a>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->