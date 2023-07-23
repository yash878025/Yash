<?php
/**
 * Template part for displaying front page section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Spark Multipurpose
 */
/**
 * Hook -  spark_multipurpose_action_video_calltoaction
 *
 * @hooked spark_multipurpose_video_calltoaction - 40
 */
/**
 * Video Call To Action Section.
*/
if (! function_exists( 'spark_multipurpose_video_calltoaction' ) ):
    function spark_multipurpose_video_calltoaction(){
        if( function_exists( 'pll_register_string' ) ){
            $video_cta_title = pll__( get_theme_mod('spark_multipurpose_appointment_title') );
            $video_cta_sub_title = pll__( get_theme_mod('spark_multipurpose_appointment_subtitle') );
        }else{
            $video_cta_title     = get_theme_mod( 'spark_multipurpose_appointment_title' );
            $video_cta_sub_title = get_theme_mod( 'spark_multipurpose_appointment_subtitle' );
        }
        $yourtube_video_url  = get_theme_mod('spark_multipurpose_video_button_url');
        $video_cta_options = get_theme_mod('spark_multipurpose_video_calltoaction_section_disable','disable');
        if( !empty( $video_cta_options ) && $video_cta_options == 'enable' ){ 
            $service_class = array(
                'section',
                'alignfull',
                'video_calltoaction-section',
                'calltoaction_promo_wrapper',
                'video_calltoaction',
                get_theme_mod('spark_multipurpose_video_calltoaction_alignment','text-center')
            );
            $type = get_theme_mod('spark_multipurpose_video_calltoaction_bg_type');
            $bg_video           = get_theme_mod("spark_multipurpose_video_calltoaction_bg_video", '1IaZy0sDLu0');
            if( $type == "video-bg" &&  $bg_video):
              $video_data = 'data-property="{videoURL:\'' . $bg_video . '\', mobileFallbackImage:\'https://img.youtube.com/vi/' . $bg_video . '/maxresdefault.jpg\'}"';
            else: 
              $video_data = '';
            endif;
            $appointment_shortcode = get_theme_mod('spark_multipurpose_appointment_shortcode'); 
            ?>
            <section id="video_calltoaction-section" class="<?php echo esc_attr(implode(' ', $service_class)) ?>" <?php echo $video_data; ?>>
                <?php spark_multipurpose_add_top_seperator('video_calltoaction'); ?>
                <div class="container">
                    <div class="calltoaction_full_widget_content section-title-wrapper" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
                        <h2 class="section-title section-video-title"><?php echo esc_html( $video_cta_title ); ?></h2>
                        <div class="calltoaction_subtitle section-tagline-text">
                            <?php echo esc_html( $video_cta_sub_title ); ?>
                        </div>
                    </div>
                </div>
                <div class="section-wrap">
                    <div class="container">
                        <div class="inner-section-wrap">
                            <div class="d-grid <?php if( $appointment_shortcode) echo 'd-grid-column-2'; ?>">
                                
                                <?php if( $yourtube_video_url ): 
                                    $img = get_theme_mod('spark_multipurpose_video_calltoaction_video_bg');
                                    $style = "";
                                    if( !empty($img) ){
                                        $style="overlayvideo";
                                    }
                                    ?>
                                    <div class="video_calltoaction_wrap <?php echo esc_attr($style); ?>" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
                                        <div class="cat-image-wrap" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
                                            <img src="<?php echo esc_url( $img ); ?>">
                                        </div>      
                                        <a href="<?php echo esc_url( $yourtube_video_url ); ?>" target="_blank" class="popup-youtube  box-shadow-ripples"><i class="fas fa-play "></i></a>
                                    </div>
                                <?php endif; 
                                
                                if( $appointment_shortcode ): ?>
                                    <div class="calltoaction_full_widget_content contact-form" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
                                        <?php echo do_shortcode($appointment_shortcode); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php spark_multipurpose_add_bottom_seperator('video_calltoaction'); ?>
            </section>
    <?php } }
endif;
add_action('spark_multipurpose_action_video_calltoaction', 'spark_multipurpose_video_calltoaction', 40);
do_action('spark_multipurpose_action_video_calltoaction');
?>
<style>

/****
 * Video ( Call To Action )
*/
#video_calltoaction-section {
    background-color: var(--theme-color);
}

.calltoaction_promo_wrapper:before {
    bottom: 0;
    height: 100%;
    content: "";
    display: block;
    left: 0;
    position: absolute;
    -webkit-transition: all 0.3s ease 0s;
    -moz-transition: all 0.3s ease 0s;
    -ms-transition: all 0.3s ease 0s;
    -o-transition: all 0.3s ease 0s;
    transition: all 0.3s ease 0s;
    width: 100%;
    z-index: -1;
    background: rgba(0, 0, 0, 0.45);
}

.video_calltoaction_wrap {
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
}

.video_calltoaction_wrap.overlayvideo::before {
    bottom: 0;
    height: 100%;
    content: "";
    display: block;
    left: 0;
    position: absolute;
    -webkit-transition: all 0.3s ease 0s;
    -moz-transition: all 0.3s ease 0s;
    -ms-transition: all 0.3s ease 0s;
    -o-transition: all 0.3s ease 0s;
    transition: all 0.3s ease 0s;
    width: 100%;
    /* z-index: -1; */
    background: rgba(0, 0, 0, 0.45);
}

.calltoaction_full_widget_content.contact-form {
    background: #0000001f;
    text-align: left;
}

.video_calltoaction_wrap .box-shadow-ripples {
    position: absolute;
    z-index: 99;
    width: 80px;
    height: 80px;
    line-height: 80px;
    font-size: 30px;
    color: var(--white-color);
    text-align: center;
    background: var(--theme-color);
    border-radius: 50%;
    border: none;
    display: inline-block;
    text-align: center;
    vertical-align: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    box-shadow: 0 0 16px rgba(255, 255, 255, 0.5);
}

.video_calltoaction_wrap .box-shadow-ripples:before {
    position: absolute;
    content: "";
    top: -3px;
    bottom: -3px;
    left: -3px;
    right: -3px;
    border-radius: 50%;
    box-shadow: 0 0 rgba(255, 255, 255, 0.2), 0 0 0 16px rgba(255, 255, 255, 0.2), 0 0 0 32px rgba(255, 255, 255, 0.2), 0 0 0 48px rgba(255, 255, 255, 0.2);
    animation: ripples 1s linear infinite;
    animation-play-state: running;
    opacity: 1;
    visibility: visible;
    transform: scale(0.8);
    z-index: 0;
}

.video_calltoaction_wrap .box-shadow-ripples:hover:before {
    animation-play-state: paused;
    opacity: 0;
    visibility: hidden;
    transition: 0.5s;
}

@keyframes ripples {
    to {
        box-shadow: 0 0 0 16px rgba(255, 255, 255, 0.2), 0 0 0 32px rgba(255, 255, 255, 0.2), 0 0 0 48px rgba(255, 255, 255, 0.2), 0 0 0 64px rgba(255, 255, 255, 0);
    }
}

@media screen and (max-width: 768px){
    .cta-innerwrapper.withimage, .video_calltoaction .d-grid-column-2 {
        flex-direction: column;
    }
}
</style>