<?php
/**
 * Template part for displaying front page section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Spark Multipurpose
 */
 /**
 * Hook -  spark_multipurpose_action_recentwork
 *
 * @hooked spark_multipurpose_recentwork - 55
 */
 /**
 *  Our Work Portfolio Section.
*/
if (! function_exists( 'spark_multipurpose_recentwork_default' ) ):
    function spark_multipurpose_recentwork_default() {
        $title_style = get_theme_mod('spark_multipurpose_gallery_title_align', 'text-center');
        $super_title = get_theme_mod('spark_multipurpose_gallery_subtitle');
        $title = get_theme_mod('spark_multipurpose_gallery_title');
        
        $portfolio_options = get_theme_mod('spark_multipurpose_recentwork_section_disable','disable');
        if( !empty( $portfolio_options ) && $portfolio_options == 'enable' ){
            
            $layout = get_theme_mod('spark_multipurpose_recentwork_layout', 'layout-two');
            

            $type = get_theme_mod('spark_multipurpose_recentwork_bg_type');
            $bg_video           = get_theme_mod("spark_multipurpose_recentwork_bg_video", '1IaZy0sDLu0');
            if( $type == "video-bg" &&  $bg_video):
              $video_data = 'data-property="{videoURL:\'' . $bg_video . '\', mobileFallbackImage:\'https://img.youtube.com/vi/' . $bg_video . '/maxresdefault.jpg\'}"';
            else: 
              $video_data = '';
            endif;
            ?>
            <section id="recentwork-section" class="recentwork-section section alignfull" <?php echo $video_data; ?>>
                <?php spark_multipurpose_add_top_seperator('recentwork'); ?>
                <div class="section-wrap">
                    <div class="container-fluid">
                        <div class="inner-section-wrap">
                            <?php spark_multipurpose_section_title( $super_title, $title, $title_style ); ?>
                            <?php 
                            if( $layout == 'layout-one'):
                                spark_multipurpose_slider_gallery();
                            else:
                                spark_multipurpose_normal_gallery();
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
                <?php spark_multipurpose_add_bottom_seperator('recentwork'); ?>
            </section>
    <?php } }
endif;

if( !function_exists('spark_multipurpose_slider_gallery')){
    function spark_multipurpose_slider_gallery(){ ?>
        <div id="portfolio-slider" class="owl-carousel portfolio-slider">
            <?php
                
                $gallery = get_theme_mod('spark_multipurpose_image_gallery');
                $gallery = explode(',', $gallery);
                if( $gallery ):
                    foreach($gallery as $id ):
                        $url = wp_get_attachment_url($id);
                        if( $url ): ?>
                            <div class="item screen-img">
                                <img src="<?php echo esc_url($url); ?>" alt="Image">
                            </div>
                        <?php
                        endif;
                    endforeach;
                endif;

            ?>
        </div>
        <?php
    }
}

if( !function_exists('spark_multipurpose_normal_gallery')){
    function spark_multipurpose_normal_gallery(){ ?>

    <div class="gallery-wrapper d-grid d-grid-column-4" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">

        <?php
            $gallery = get_theme_mod('spark_multipurpose_image_gallery');
            $gallery = explode(',', $gallery);
            
            foreach($gallery as $id ):
                $url = wp_get_attachment_image_url($id, 'full');
                $thumbnail = wp_get_attachment_image_url($id, 'medium_large', true);
                
                if( $url ): ?>
                    <div class="gallery-item">
                        <div class="gallery-item-wrapper">
                            <a href="<?php echo esc_url($url); ?>" title="Gallery Image"  class="btn-wrap" rel="portfolio[work]">
                                <img src="<?php echo esc_url($thumbnail); ?>" alt="Gallery Image">
                                <div class="caption"></div>
                                <div class="gallery-button">
                                    <span class="btn">
                                        <i class="far fa-image"></i>
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php
                endif;
            endforeach;
        ?>

    </div>

    <?php
    }
}

if( !function_exists('spark_multipurpose_recentwork')){
    function spark_multipurpose_recentwork(){
        spark_multipurpose_recentwork_default();
    }
}

add_action('spark_multipurpose_action_recentwork', 'spark_multipurpose_recentwork', 55);
do_action('spark_multipurpose_action_recentwork');
?>
<style>


/*--------------------------------------------------------------
## Portfolio Section
--------------------------------------------------------------*/
.recentwork-section .section-title-wrapper {
    margin: 0 10px 45px 10px;
}

.recentwork-section .d-grid {
    gap: 1em;
}

/* Portfolio Slider Images */
.portfolio-slider .owl-item .screen-img img {
    transform: scale(.9);
    border: 2px solid var(--theme-color);
    border-radius: 20px;
    transition: 1s all;
    margin: 0 auto;
}

.portfolio-slider .owl-item.center .screen-img img {
    transform: scale(1);
    border: 3px solid var(--theme-color);
}


/**
 * Portfolio Grid Images List 
*/
.gallery-wrapper .gallery-item {
    position: relative;
    overflow: hidden;
}

.gallery-wrapper .gallery-item .gallery-item-wrapper img {
    -o-transition: all ease .5s;
    transition: all ease .5s;
    -webkit-transition: all ease .5s;
    -ms-transition: all ease .5s;
    transform: scale(1);
    -webkit-transform: scale(1);
    -ms-transform: scale(1);
    width: 100%;
}

.gallery-button {
    position: absolute;
    text-align: right;
    bottom: 0;
    right: 0;
    z-index: 33;
    background: var(--theme-color);
    opacity: 0;
    padding: 8px 10px 8px 15px;
    border-radius: 30px 0 0 0;
    -webkit-transition: all 0.4s ease;
    -moz-transition: all 0.4s ease;
    transition: all 0.4s ease;
}

.gallery-wrapper .gallery-item:hover .gallery-button {
    opacity: 1;
}

.gallery-button .btn {
    padding: 0;
    border-radius: 100%;
    width: 30px;
    height: 30px;
    line-height: 30px;
    background: var(--white-color);
    z-index: 99;
}

.gallery-button .btn i {
    color: var(--theme-color);
    margin: 0;
}

.gallery-wrapper .gallery-item .caption {
    position: absolute;
    display: flex;
    top: 0;
    background: rgba(0, 0, 0, 0.45);
    width: 100%;
    height: 100%;
    color: var(--white-color);
    padding: 15px;
    justify-content: center;
    align-items: center;
    -webkit-transition: all .55s cubic-bezier(.645, .045, .355, 1);
    transition: all .55s cubic-bezier(.645, .045, .355, 1);
    opacity: 0;
    visibility: hidden;
    overflow: hidden;
    text-align: center;
}

.gallery-wrapper .gallery-item:hover .caption {
    visibility: visible;
    opacity: 1;
    -webkit-transition: all .55s cubic-bezier(.645, .045, .355, 1);
    transition: all .55s cubic-bezier(.645, .045, .355, 1);
}
</style>