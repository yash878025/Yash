<?php
/**
 * Template part for displaying front page section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Spark Multipurpose
 */
 /**
 * Hook -  spark_multipurpose_action_calltoaction
 *
 * @hooked spark_multipurpose_calltoaction - 50
 */
/**
 * Call To Action Section.
*/
if (! function_exists( 'spark_multipurpose_calltoaction' ) ):
    function spark_multipurpose_calltoaction(){

        $cta_title       = get_theme_mod( 'spark_multipurpose_call_to_action_title' );
        $cta_sub_title   = get_theme_mod( 'spark_multipurpose_call_to_action_subtitle' );
        
        $button_text     = get_theme_mod('spark_multipurpose_call_to_action_button');
        $button_text_one = get_theme_mod('spark_multipurpose_call_to_action_button_one');
        $button_link = get_theme_mod('spark_multipurpose_call_to_action_link');
        $button_link_one = get_theme_mod('spark_multipurpose_call_to_action_link_one');

        $cta_options = get_theme_mod('spark_multipurpose_calltoaction_section_disable','enable');
        
        if( !empty( $cta_options ) && $cta_options == 'enable' ){
            
            $service_class = array(
                'section',
                'calltoaction-section',
                'calltoaction_promo_wrapper',
                'calltoaction',
                get_theme_mod('spark_multipurpose_cta_alignment', 'text-center')
            );
            $type = get_theme_mod('spark_multipurpose_calltoaction_bg_type');
            $bg_video           = get_theme_mod("spark_multipurpose_calltoaction_bg_video", '1IaZy0sDLu0');
            if( $type == "video-bg" &&  $bg_video):
              $video_data = 'data-property="{videoURL:\'' . $bg_video . '\', mobileFallbackImage:\'https://img.youtube.com/vi/' . $bg_video . '/maxresdefault.jpg\'}"';
            else: 
              $video_data = '';
            endif;
            
            $reverse = get_theme_mod('spark_multipurpose_cta_layout', 'cta-left');
            $about_image = get_theme_mod('spark_multipurpose_calltoaction_image');
            
            $class = '';
            if( $about_image ){
                $class = ' withimage ';
            }
            $class .= $reverse;

            ?>
            <section id="calltoaction-section" class="alignfull <?php echo esc_attr(implode(' ', $service_class)) ?>" <?php echo $video_data; ?>>
                <?php spark_multipurpose_add_top_seperator('calltoaction'); ?>
                <div class="section-wrap">
                    <div class="container">
                        <div class="inner-section-wrap cta-innerwrapper <?php echo esc_attr( $class ); ?>">
                            <div class="cat-content-wrap" data-aos="fade-right" data-aos-duration="1500">
                                <div class="calltoaction_full_widget_content">
                                    <h2 class="section-title"><?php echo esc_html( $cta_title ); ?></h2>
                                    <p class="calltoaction_subtitle section-text"><?php echo esc_html( $cta_sub_title ); ?></p>
                                    <div class="calltoaction_button_wrap">
                                        <?php if( !empty( $button_text ) ){ ?>
                                            <a href="<?php echo esc_url( $button_link ); ?>" class="btn btn-primary">
                                                <?php echo esc_html( $button_text ); ?> <i class="fas fa-long-arrow-alt-right"></i>
                                            </a>
                                        <?php } if( !empty( $button_text_one ) ){ ?>
                                            <a href="<?php echo esc_url( $button_link_one ); ?>" class="btn btn-border">
                                                <?php echo esc_html( $button_text_one ); ?> <i class="fas fa-long-arrow-alt-right"></i>
                                            </a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <?php if( !empty( $about_image ) ): ?>
                                <div class="cat-image-wrap" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
                                    <img src="<?php echo ( $about_image); ?>">
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php spark_multipurpose_add_bottom_seperator('calltoaction'); ?>
            </section>
    <?php } }
endif;
add_action('spark_multipurpose_action_calltoaction', 'spark_multipurpose_calltoaction', 50);
do_action('spark_multipurpose_action_calltoaction');
?>
<style>
/*****
 ** Full Promo Banner( Call To Action )
*/
#calltoaction-section {
    background-color: #ccc;
}

.calltoaction_promo_wrapper .section-wrap .inner-section-wrap,
.calltoaction_promo_wrapper.video_calltoaction .section-title-wrapper {
    color: var(--white-color);
}

.cta-innerwrapper {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 2rem;
}

.cta-left.cta-innerwrapper {
    flex-direction: row-reverse;
}

.cta-innerwrapper.cta-center {
    flex-direction: column;
    gap: 4rem;
}

.cta-innerwrapper.withimage .cat-content-wrap,
.cta-innerwrapper.withimage .cat-image-wrap {
    width: 50%;
}

.cta-innerwrapper.withimage.cta-center .cat-content-wrap,
.cta-innerwrapper.withimage.cta-center .cat-image-wrap {
    width: 100%;
}

.cta-innerwrapper.withimage.cta-left .cat-content-wrap,
.cta-innerwrapper.withimage.cta-right .cat-image-wrap {
    width: 50%;
}

.calltoaction_promo_wrapper .section-title {
    font-size: 40px;
    color: inherit;
}

.calltoaction_promo_wrapper .section-text {
    padding: 0 0 40px;
    font-size: 20px;
}

.calltoaction_promo_wrapper .calltoaction_full_widget_content .calltoaction_subtitle {
    width: 80%;
    font-size: 18px;
}

.calltoaction_promo_wrapper.text-center .calltoaction_full_widget_content .calltoaction_subtitle {
    margin: 0 auto;
}

.calltoaction_promo_wrapper.text-left .calltoaction_full_widget_content .calltoaction_subtitle {
    margin-left: 0;
    width: auto;
}

.calltoaction_promo_wrapper.text-right .calltoaction_full_widget_content .calltoaction_subtitle {
    margin-right: 0;
    width: auto;
}

.calltoaction_promo_wrapper .calltoaction_button_wrap {
    display: inline-flex;
    flex-wrap: wrap;
    gap: 1.5em;
}
@media screen and (max-width: 768px){
    .cta-innerwrapper.withimage, .video_calltoaction .d-grid-column-2 {
        flex-direction: column;
    }
    .cta-innerwrapper.withimage.cta-left .cat-content-wrap, .cta-innerwrapper.withimage.cta-right .cat-image-wrap{
        width: 100%;
    }
}

</style>