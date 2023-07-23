<?php
/**
 * Template part for displaying front page section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Spark Multipurpose
 */
/**
 *  Blog Section.
*/
if (! function_exists( 'spark_multipurpose_blog' ) ):
    function spark_multipurpose_blog(){
        $title_style = get_theme_mod('spark_multipurpose_blog_title_align', 'text-center');
        $super_title = get_theme_mod('spark_multipurpose_blog_subtitle');
        $title = get_theme_mod('spark_multipurpose_blog_title');
        $blog_options = get_theme_mod('spark_multipurpose_blog_section_disable','enable');
        if( !empty( $blog_options ) && $blog_options == 'enable' ){
            $service_class = array(
                'section',
                'blog-section'
            );
            $type = get_theme_mod('spark_multipurpose_blog_bg_type');
            $bg_video           = get_theme_mod("spark_multipurpose_counter_bg_video", '1IaZy0sDLu0');
            if( $type == "video-bg" &&  $bg_video):
              $video_data = 'data-property="{videoURL:\'' . $bg_video . '\', mobileFallbackImage:\'https://img.youtube.com/vi/' . $bg_video . '/maxresdefault.jpg\'}"';
            else: 
              $video_data = '';
            endif;
            ?>
            <section id="blog-section" class="alignfull <?php echo esc_attr(implode(' ', $service_class)) ?>" <?php echo $video_data; ?>>
                <?php spark_multipurpose_add_top_seperator('blog'); ?>
                <div class="section-wrap">
                    <div class="container">
                        <div class="inner-section-wrap">
                            <?php spark_multipurpose_section_title( $super_title, $title, $title_style ); ?>
                            <div class="d-grid d-grid-column-3">
                                <?php
                                    $blog = get_theme_mod('spark_multipurpose_blog_categories');
                                    $cat_id = explode(',', $blog);
                                    $blog_posts = get_theme_mod('spark_multipurpose_posts_num', 'three');
                                    if ($blog_posts == 'three') {
                                        $post_num = 3;
                                    } else {
                                        $post_num = 6;
                                    }
                                    $args = array(
                                        'posts_per_page' => $post_num,
                                        'post_type' => 'post',
                                        'tax_query' => array(
                                            array(
                                                'taxonomy' => 'category',
                                                'field' => 'term_id',
                                                'terms' => $cat_id
                                            ),
                                        ),
                                    );
                                    $blog_query = new WP_Query ($args);
                                    
                                    if ( $blog_query->have_posts() ): while ( $blog_query->have_posts() ) : $blog_query->the_post();
                                   
                                    $blogreadmore_btn = get_theme_mod( 'spark_multipurpose_blog_home_btn', 'Continue Reading' );
                                    $date = get_theme_mod( 'spark_multipurpose_post_date_options', 'enable' );
                                ?>
                                    <div class="blog-item" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
                                        <article id="post-<?php the_ID(); ?>" <?php post_class('article'); ?>>
                                            <div class="blog-post-thumbnail">
                                                <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
                                                    <?php the_post_thumbnail('spark-multipurpose-medium'); ?>
                                                    <?php if( !empty($date) && $date =='enable' ){ ?><span class="blog-date"><?php echo get_the_date( "d M Y" ); ?></span><?php } ?>
                                                </a>
                                            </div>
                                            <div class="box-content <?php echo esc_attr(get_theme_mod('spark_multipurpose_home_blog_alignment', 'text-center') );?> ">
                                                <?php 
                                                    the_title( '<h4 class="title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' ); 
                                                    if ( 'post' === get_post_type() ){ do_action( 'spark_multipurpose_post_meta', 10 ); }  
                                                ?>
                                                <?php the_excerpt(); ?>
                                                <?php if( !empty( $blogreadmore_btn ) ){ ?>
                                                    <a href="<?php the_permalink(); ?>" class="btn btn-primary">
                                                        <?php echo esc_html( $blogreadmore_btn ); ?> <i class="fas fa-long-arrow-alt-right"></i>
                                                    </a>
                                                <?php } ?>
                                            </div>
                                        </article><!-- #post-<?php the_ID(); ?> -->
                                    </div>
                                <?php endwhile; endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php spark_multipurpose_add_bottom_seperator('blog'); ?>
        </section>
    <?php } }
endif;
add_action('spark_multipurpose_action_blog', 'spark_multipurpose_blog', 65);
do_action('spark_multipurpose_action_blog');
?>
<style>
    
</style>