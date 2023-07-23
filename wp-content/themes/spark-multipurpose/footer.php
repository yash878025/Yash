<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Spark Multipurpose
 */
$type = get_theme_mod('spark_multipurpose_client_bg_type');
$bg_video = get_theme_mod("spark_multipurpose_counter_bg_video", '1IaZy0sDLu0');
if( $type == "video-bg" &&  $bg_video):
    $video_data = 'data-property="{videoURL:\'' . $bg_video . '\', mobileFallbackImage:\'https://img.youtube.com/vi/' . $bg_video . '/maxresdefault.jpg\'}"';
else: 
    $video_data = '';
endif;

$footer_page = get_theme_mod('spark_multipurpose_footer_content');
if( $footer_page ){
    $post = get_post( $footer_page );
    if($post){
        $the_content = apply_filters('the_content', $post->post_content);
        if ( !empty($the_content) ) {
           echo $the_content;
        }
    }
}

?>
</div><!-- #content -->
<div class="footer-seprator">
    <?php spark_multipurpose_add_footer_seperator('footer'); ?>
</div>

<?php if (is_active_sidebar( 'footer-1' ) ): ?>
    
    <footer id="footer-section" class="footer-section site-footer" <?php echo $video_data; ?>>
        <div class="container-full">
            <?php
                if (is_active_sidebar('footer-1')) { ?>
                <div class="footer-item">
                    <?php dynamic_sidebar('footer-1'); ?>
                </div>
            <?php } ?>
        </div>
    </footer><!-- #colophon -->
<?php endif; ?>

    <div class="sub_footer">
        <div class="container">
            <div class="d-grid d-grid-column-1">
                <div class="copyright text-center">
                    <?php apply_filters( 'spark_multipurpose_copyright', 5 ); ?> <?php the_privacy_policy_link(); ?>
                </div>
            </div>
        </div>
    </div>
</div><!-- #page -->

<?php
    $enable_search = get_theme_mod('spark_multipurpose_enable_search', 'enable');
    $search_layout = get_theme_mod('spark_multipurpose_search_layout', 'layout_one');
?>

<?php if( $enable_search == 'enable' and $search_layout == 'layout_one'): ?>
<div class="full-search-wrapper" id="full-search-wrapper">
   
    <div class="search-container">
        <?php get_search_form(); ?>
    </div>
     <div class="search-close">
        <button class="close-icon">
            <i class="far fa-times-circle"></i>
        </button>
    </div>
</div>
<?php endif; ?>

<?php if( get_theme_mod('spark_multipurpose_backtotop', 'enable') == 'enable'): ?>
<a href="#" id="back-to-top" class="progress" data-tooltip="Back To Top">
    <div class="arrow-top"></div>
    <div class="arrow-top-line"></div>
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="xMinYMin meet"> <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/></svg> 
</a>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
