<?php
/**
 * Slider Type
*/
/**
 * Video Background Banner Function
*/
if ( ! function_exists( 'spark_multipurpose_video_background_banner' ) ) {

    function spark_multipurpose_video_background_banner(){

        $bg_video = get_theme_mod("spark_multipurpose_video_banner_url", 'DJlmVOSEvGA');
        $alignment = get_theme_mod('spark_multipurpose_slider_caption_alignment','text-left');
        $show_caption = get_theme_mod('spark_multipurpose_show_video_content', 'disable');
        if( $bg_video ):
          $video_data = 'data-property="{videoURL:\'' . $bg_video . '\', mobileFallbackImage:\'https://img.youtube.com/vi/' . $bg_video . '/maxresdefault.jpg\'}"';
        else: 
          $video_data = '';
        endif;
        ?>
        <div id="banner-slider" class="section banner-slider banner-wrapper video-banner " <?php echo $video_data; ?>>  
            <!-- <div class="home-slider-overlay"></div> -->
            <?php if( $show_caption == 'enable'): 
                $caption = get_theme_mod('spark_multipurpose_video_content');
                if( $caption ){
                    $caption = json_decode($caption);
                }
                if( is_object($caption)): ?>
                    <div class="background-image slider-item <?php echo esc_attr( $alignment ); ?>">
                        <div class="banner-content-area container">
                            <div class="container">
                                <div class="inner-row d-flex content-padding">
                                    <div class="slider-content">
                                        <?php if( !empty( $caption->subtitile ) ): ?>
                                            <span class="supertitle"><?php echo esc_html($slider->subtitile); ?></span>
                                        <?php endif; ?>
                                        <?php if( !empty( $caption->title ) ): ?>
                                            <h2 class="maintitle"><?php echo wp_kses_post($caption->title); ?></h2>
                                        <?php endif; ?>
                                        <?php if( !empty( $caption->content ) ): ?>
                                            <div class="maincontent">
                                                <p><?php echo esc_html($caption->content); ?></p>
                                            </div>
                                        <?php endif; ?>
                                        <div class="btn-area">
                                            <?php if (!empty( $caption->button_text ) ): ?>
                                                <a href="<?php echo esc_url( $caption->button_link ); ?>" class="btn">
                                                    <?php echo esc_html( $caption->button_text ); ?>
                                                    <i class="fas fa-long-arrow-alt-right"></i>
                                                </a>
                                            <?php endif; ?>
                                            <?php if (!empty( $caption->button2_text ) ): ?>
                                                <a href="<?php echo esc_url( $caption->button2_link ); ?>" class="btn style-white">
                                                    <?php echo esc_html( $caption->button2_text ); ?>
                                                    <i class="fas fa-long-arrow-alt-right"></i>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php endif; endif ; ?>


            <?php do_action("after_slider_section"); ?>
        </div>
        <?php
    }
}
add_action( 'spark_multipurpose_video_banner', 'spark_multipurpose_video_background_banner', 15 );



/**
 * Default Slider Function Area
*/
if (! function_exists( 'spark_multipurpose_banner_slider' ) ):

    function spark_multipurpose_banner_slider(){ 

        $all_slider = get_theme_mod('spark_multipurpose_banner_sliders');
        $banner_slider = json_decode( $all_slider );
        //if ($banner_slider && $banner_slider[0]->slider_page ) {
        if ( !empty( $banner_slider ) ) {

            $controls = get_theme_mod('slider-controls',  json_encode(array(
				'loop'   => 1,
				'autoplay'   => 1,
				'pager'   => 1,
				'controls'   => 1,
				'usecss'   => 1,
				'mode'   => 'fade',
				'csseasing'   => 'ease',
				'easing'   => 'linear',
				'slideendanimation'   => 1,
				'drag'   => 1,
				'speed'   => 5000,
				'pause'   => 4000,
                'navstyle' => 1,
			)));
			$controls = json_decode($controls, true);
            $data = spark_multipurpose_get_data_attribute($controls);
            
            $alignment = get_theme_mod('spark_multipurpose_slider_caption_alignment','text-left');
        ?>
        <div class="banner-wrapper">
            <div class="slider-wrapper banner-slider">
                <div id="banner-slider" class="owl-carousel features-slider" <?php echo ( $data ); ?>>
                    <?php 
                        foreach ($banner_slider as $slider) {
                            $page_id = $slider->slider_page;
                        if (!empty($page_id)) {
                            $slider_page = new WP_Query('page_id=' . $page_id);
                            if ($slider_page->have_posts()) { while ($slider_page->have_posts()) { $slider_page->the_post();
                    ?>
                        <div class="background-image slider-item <?php echo esc_attr( $alignment ); ?>" style="background-image: url(<?php the_post_thumbnail_url(); ?>);" data-img-url="<?php echo esc_url(get_the_post_thumbnail_url()); ?>">
                            <div class="banner-content-area container">
                                <div class="container">
                                    <div class="inner-row d-flex content-padding">
                                        <div class="slider-content">
                                            <?php if( !empty( $slider->subtitile ) ): ?>
                                                <span class="supertitle"><?php echo esc_html($slider->subtitile); ?></span>
                                            <?php endif; ?>
                                            <h2 class="maintitle"><?php the_title(); ?></h2>
                                            <div class="maincontent"><?php the_excerpt(); ?></div>
                                            <div class="btn-area">
                                                <?php if (!empty( $slider->button_text ) ): ?>
                                                    <a href="<?php echo esc_url( $slider->button_url ); ?>" class="btn">
                                                        <?php echo esc_html( $slider->button_text ); ?>
                                                        <i class="fas fa-long-arrow-alt-right"></i>
                                                    </a>
                                                <?php endif; ?>
                                                <?php if (!empty( $slider->button_one_text ) ): ?>
                                                    <a href="<?php echo esc_url( $slider->button_one_url ); ?>" class="btn style-white">
                                                        <?php echo esc_html( $slider->button_one_text ); ?>
                                                        <i class="fas fa-long-arrow-alt-right"></i>
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } } } } ?>
                </div><!-- Slider section end -->
                <?php do_action("after_slider_section"); ?>    
            </div>
            
        </div>
    <?php } }

endif;
add_action('spark_multipurpose_action_banner_slider', 'spark_multipurpose_banner_slider', 5);


/**
 * Advance Slider Function Area
*/
if (! function_exists( 'spark_multipurpose_advance_banner_slider' ) ):

    function spark_multipurpose_advance_banner_slider(){ 

        $alignment = get_theme_mod('spark_multipurpose_slider_caption_alignment','text-left');

        $all_slider    = get_theme_mod('spark_multipurpose_slider_advance_settings');
        $banner_slider = json_decode( $all_slider );
        
        if( !empty( $banner_slider ) ) {

            $controls = get_theme_mod('slider-controls',  json_encode(array(
				'loop'   => 1,
				'autoplay'   => 1,
				'pager'   => 0,
				'controls'   => 1,
				'usecss'   => 1,
				'mode'   => 'fade',
				'csseasing'   => 'ease',
				'easing'   => 'linear',
				'slideendanimation'   => 1,
				'drag'   => 1,
				'speed'   => 5000,
				'pause'   => 4000
			)));
			$controls = json_decode($controls, true);
            $data = spark_multipurpose_get_data_attribute($controls);
        ?>
        <div class="banner-wrapper">
            <div class="slider-wrapper banner-slider">
                <div id="banner-slider" class="owl-carousel features-slider" <?php echo ($data); ?>>
                    <?php 
                        foreach ($banner_slider as $slider) {
                    ?>
                        <div class="background-image slider-item <?php echo esc_attr( $alignment ); ?>" style="background-image: url(<?php echo esc_url($slider->block_image); ?>);" data-img-url="<?php echo esc_url(get_the_post_thumbnail_url()); ?>">
                            <div class="banner-content-area container">
                                <div class="container">
                                    <div class="inner-row d-flex content-padding">
                                        <div class="slider-content">
                                            <?php if( !empty( $slider->block_subtitile ) ): ?>
                                                <span class="supertitle"><?php echo esc_html($slider->block_subtitile); ?></span>
                                            <?php endif; ?>
                                            <?php if( !empty( $slider->block_title ) ): ?>
                                                <h2 class="maintitle"><?php echo wp_kses_post($slider->block_title); ?></h2>
                                            <?php endif; ?>
                                            <?php if( !empty( $slider->block_desc ) ): ?>
                                                <div class="maincontent">
                                                    <p><?php echo esc_html($slider->block_desc); ?></p>
                                                </div>
                                            <?php endif; ?>
                                            <div class="btn-area">
                                                <?php if (!empty( $slider->button_text ) ): ?>
                                                    <a href="<?php echo esc_url( $slider->button_url ); ?>" class="btn">
                                                        <?php echo esc_html( $slider->button_text ); ?>
                                                        <i class="fas fa-long-arrow-alt-right"></i>
                                                    </a>
                                                <?php endif; ?>
                                                <?php if (!empty( $slider->button_one_text ) ): ?>
                                                    <a href="<?php echo esc_url( $slider->button_one_url ); ?>" class="btn style-white">
                                                        <?php echo esc_html( $slider->button_one_text ); ?>
                                                        <i class="fas fa-long-arrow-alt-right"></i>
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <?php if( isset( $slider->image) && $slider->image): ?>
                                            <div class="banner-content-image">
                                                <img src="<?php echo esc_url($slider->image); ?>"/>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <?php do_action("after_slider_section"); ?>    
            </div>
            
        </div>
    <?php } }
endif;
add_action('spark_multipurpose_advance_slider', 'spark_multipurpose_advance_banner_slider', 10);


if (! function_exists( 'spark_multipurpose_all_slider_type' ) ):
    function spark_multipurpose_all_slider_type(){ 
        $slider_type = get_theme_mod('spark_multipurpose_slider_type','default');
        switch ( $slider_type ) {
            case 'video':
                /**
                 * @hooked spark_multipurpose_video_banner - 15
                */
                do_action('spark_multipurpose_video_banner');
                break;
            case 'advance':
                    /**
                     * @hooked spark_multipurpose_advance_slider - 10
                    */
                    do_action('spark_multipurpose_advance_slider');
                    break;
            default:
                /**
                 * @hooked spark_multipurpose_action_banner_slider - 5
                */
                do_action('spark_multipurpose_action_banner_slider');
                break;
        }
    }
endif;
add_action('spark_multipurpose_slider_type', 'spark_multipurpose_all_slider_type', 25);


/**
 * Hook -  spark_multipurpose_action_banner_slider
 *
 * @hooked spark_multipurpose_banner_slider - 25
 */
do_action('spark_multipurpose_slider_type');
?>

<style>
/*--------------------------------------------------------------
 ## Slider
--------------------------------------------------------------*/
.banner-slider {
    position: relative;
    z-index: 1;
    background-size: 100%;
}

.banner-slider .background-image {
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center center;
}

.banner-slider .slider-item {
    height: 90vh;
    position: relative;
    z-index: 2;
    display: flex;
    align-items: center;
    justify-content: space-around;
    background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;
}

.banner-slider .slider-item:before {
    background: rgba(0, 0, 0, 0.45);
    bottom: 0;
    height: 100%;
    width: 100%;
    content: "";
    display: block;
    left: 0;
    position: absolute;
    -webkit-transition: all 0.3s ease 0s;
    -moz-transition: all 0.3s ease 0s;
    -ms-transition: all 0.3s ease 0s;
    -o-transition: all 0.3s ease 0s;
    transition: all 0.3s ease 0s;
    z-index: -1;
}

.banner-slider .slider-item .slider-content {
    color: var(--white-color);
    width: 60%;
}

.banner-slider .slider-item .banner-content-image {
    flex: 1;
}

.banner-slider .slider-item.text-center .banner-content-image,
.banner-slider .slider-item.text-center .slider-content {
    width: 100%;
}

.banner-slider .slider-item.text-right .content-padding {
    flex-direction: row-reverse;
}

.banner-slider .slider-item.text-center .content-padding {
    flex-direction: column;
}

.banner-slider .slider-item .slider-content .supertitle {
    border-bottom: 1px solid;
    padding-bottom: 5px;
    margin-bottom: 25px;
    font-size: 24px;
    display: inline-block;
    color: var(--theme-color);
    font-weight: 700;
}

.banner-slider .slider-item .slider-content .maintitle {
    font-size: 50px;
    color: var(--white-color);
    line-height: 1.2;
}

.banner-slider .slider-item .slider-content .maintitle span {
    color: var(--theme-color);
}

.banner-slider .slider-item .slider-content p {
    font-size: 20px;
    font-weight: 500;
    margin-bottom: 45px;
    color: var(--white-color);
}

.banner-slider .slider-item .btn-area {
    display: inline-flex;
    gap: 2rem;
}

.video-banner {
    height: 90vh;
    padding: 0;
}


/********
 * Slider Animation
*/
.delay-1 {
    animation-delay: .2s;
}

.delay-2 {
    animation-delay: .4s;
}

.delay-3 {
    animation-delay: .6s;
}

.delay-4 {
    animation-delay: .8s;
}

@keyframes fadeInUp {
    0% {
        opacity: 0;
        transform: translate3d(0, 100%, 0)
    }

    to {
        opacity: 1;
        transform: translateZ(0)
    }
}

.fadeInUp {
    animation-name: fadeInUp
}

/**
 * Slider Nav ( Next & Previous )
*/
.features-slider.owl-carousel .owl-nav {
    display: none;
}

.features-slider[data-navstyle="1"].owl-carousel .owl-nav button.owl-next,
.features-slider[data-navstyle="2"].owl-carousel .owl-nav button.owl-prev,
.features-slider[data-navstyle="3"].owl-carousel .owl-nav button.owl-next,
.features-slider[data-navstyle="3"].owl-carousel .owl-nav button.owl-prev {
    width: 5rem;
    height: 5rem;
    line-height: 1;
    display: inline-block;
    cursor: pointer;
    text-align: center;
    background-color: rgb(1 1 47 / 0.6);
    border: 1px solid var(--border-color);
    border-radius: 4px;
    outline: none;
    box-shadow: 2px 5px 20px rgba(0, 0, 0, .2);
    -webkit-transition: all .35s cubic-bezier(.645, .045, .355, 1);
    transition: all .35s cubic-bezier(.645, .045, .355, 1);
}

.features-slider[data-navstyle="1"].owl-carousel .owl-nav button.owl-next {
    right: 5%;
    left: unset;
}

.features-slider[data-navstyle="1"].owl-carousel .owl-nav button.owl-prev {
    left: 5%;
    right: unset;
}

.features-slider[data-navstyle="3"].owl-carousel .owl-nav button.owl-next {
    right: 120px;
    left: unset;
}

.features-slider[data-navstyle="3"].owl-carousel .owl-nav button.owl-prev {
    right: 220px;
    left: unset;
}

.features-slider[data-navstyle="3"].owl-carousel .owl-nav button.owl-prev,
.features-slider[data-navstyle="3"].owl-carousel .owl-nav button.owl-next {
    top: unset;
    bottom: 20px;
}

.features-slider div.owl-nav button[class*="owl-"] {
    position: absolute;
    top: 0;
    bottom: 0;
    margin: auto 0;
    -webkit-transition-duration: 500ms;
    -o-transition-duration: 500ms;
    transition-duration: 500ms;
    background-position: center center;
    background-size: cover;
    background-blend-mode: multiply;
    opacity: 1;
}



/**
 * Slider Dots Control
*/
.banner-slider .owl-dots {
    display: flex;
    flex-direction: column;
    right: 80px;
    top: 50%;
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
    position: absolute;
    z-index: 1;
}

.banner-slider .owl-dots .owl-dot {
    background-color: transparent;
    color: var(--white-color);
    border: 2px solid;
    border-color: var(--white-color);
    font-size: 18px;
    font-weight: 700;
    width: 58px;
    height: 58px;
    line-height: 58px;
    border-radius: 50px;
    margin-bottom: 20px;
    -webkit-transition: 0.3s;
    -o-transition: 0.3s;
    transition: 0.3s;
}

.banner-slider .owl-dots .owl-dot.active {
    background-color: var(--theme-color);
    border-color: var(--theme-color);
    color: var(--white-color);
    -webkit-transform: scale(1);
    -ms-transform: scale(1);
    transform: scale(1);
}

.banner-slider .owl-dots .owl-dot span {
    font-size: 20px;
    font-weight: 700;
}

.banner-slider .owl-dots .owl-dot:last-child {
    margin-bottom: 0;
}

@media screen and (max-width: 768px) {

    /**
     * Slider
    */
    .banner-slider .slider-item {
        height: 50vh;
    }

    .banner-content-area .content-padding {
        padding: 0;
    }

    .banner-slider .slider-item .slider-content {
        padding: 10px;
        text-align: center;
        width: 100%;
    }

    .banner-slider .slider-item .banner-content-image {
        display: none;
    }

    .banner-slider .slider-item .slider-content .maintitle {
        font-size: 40px;
        margin-bottom: 15px;
    }

    .banner-slider .slider-item .slider-content p {
        font-size: 18px;
        margin-bottom: 20px;
    }

    .banner-slider .owl-dots {
        right: 40%;
        top: auto;
        flex-direction: row;
        bottom: 10px;
    }

    .banner-slider .owl-dots .owl-dot {
        margin-bottom: 0;
        margin-right: 10px;
        line-height: 1;
        width: 35px;
        height: 35px;
    }
}

@media screen and (max-width: 480px) {
    .banner-slider .slider-item .slider-content .supertitle {
        font-size: 16px;
        margin-bottom: 15px;
    }

    .banner-slider .slider-item .slider-content .maintitle {
        font-size: 30px;
    }

    .banner-slider .owl-dots {
        right: 25%;
        bottom: 0;
    }
}
</style>