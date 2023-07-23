<?php
/**
 * Template part for displaying posts of blog template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Spark Multipurpose
 */
if( function_exists( 'pll_register_string' ) ){ 
    $blogreadmore_btn = pll__( get_theme_mod( 'spark_multipurpose_blogtemplate_btn', 'Continue Reading' ) );
}else{ 
    $blogreadmore_btn = get_theme_mod( 'spark_multipurpose_blogtemplate_btn', 'Continue Reading' );
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('blog-list-box'); ?>>
   <figure>
        <a href="<?php the_permalink(); ?>" class="link-icon">
          <?php 
            if (get_theme_mod('spark_multipurpose_blogtemplate_layout','full_right')== 'side_img') {
              the_post_thumbnail('spark-multipurpose-medium');
            }else{
              the_post_thumbnail('spark-multipurpose-slider'); 
            } 
          ?>
       	</a>
   </figure>
   <div class="blog-list-content">
      <?php the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
      <div class="blog-list-text-info">
         <?php if ( 'post' === get_post_type() ) : ?>
      			<div class="entry-meta">
      				<?php
      				if (get_theme_mod('spark_multipurpose_date',true) == true) { spark_multipurpose_posted_on(); }
      				if (get_theme_mod('spark_multipurpose_author',true) == true) { spark_multipurpose_posted_by(); }
      				if (get_theme_mod('spark_multipurpose_comment',true) == true) { spark_multipurpose_comments(); }
      				if (get_theme_mod('spark_multipurpose_category',true) == true) { spark_multipurpose_category(); }
      				if (get_theme_mod('spark_multipurpose_tags',true) == true) { spark_multipurpose_tag_list(); }
      				?>
      			</div><!-- .entry-meta -->
         <?php endif; ?>
      </div>
      <?php 
          the_excerpt(); 
          if (get_theme_mod('spark_multipurpose_blogtemplate_posts',true)== true ) :
       ?>
       <div class="button-bottom">
           <a href="<?php the_permalink(); ?>" class="btn_yellow link"><?php echo esc_html( $blogreadmore_btn ); ?></a>
       </div>
	   <?php endif; ?>
   </div>
</article><!-- #post-<?php the_ID(); ?> -->
