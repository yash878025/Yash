<?php
/**
 * Template part for displaying front page section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Spark Multipurpose
 */
/**
 * Our Main Service Section.
*/
if (! function_exists( 'spark_multipurpose_service' ) ):

    function spark_multipurpose_service(){

        $super_title    = get_theme_mod('spark_multipurpose_service_super_title');
        $title          = get_theme_mod('spark_multipurpose_service_title');
        $title_style    = get_theme_mod( 'spark_multipurpose_service_title_align', 'text-center');

        $service_type = get_theme_mod('spark_multipurpose_service_type','default');

        $service_layout = get_theme_mod('spark_multipurpose_service_layout', 'style1');
       
        $services_options = get_theme_mod('spark_multipurpose_service_section_disable','disable');
        if( !empty( $services_options ) && $services_options == 'enable' ){
            $service_class = array(
                'section',
                'alignfull',
                'service-section',
                $service_layout
            );
            $type = get_theme_mod('spark_multipurpose_service_bg_type');
            $bg_video           = get_theme_mod("spark_multipurpose_service_bg_video", '1IaZy0sDLu0');
            if( $type == "video-bg" &&  $bg_video):
              $video_data = 'data-property="{videoURL:\'' . $bg_video . '\', mobileFallbackImage:\'https://img.youtube.com/vi/' . $bg_video . '/maxresdefault.jpg\'}"';
            else: 
              $video_data = '';
            endif;
            ?>
            <section id="service-section" class="<?php echo esc_attr(implode(' ', $service_class)) ?>" <?php echo $video_data; ?>>
                <?php spark_multipurpose_add_top_seperator('service'); ?>
                <div class="section-wrap">
                    <div class="container">
                        <div class="inner-section-wrap">
                            <?php spark_multipurpose_section_title( $super_title, $title, $title_style ); ?>
                            <?php
                                if( !empty( $service_type ) && $service_type == 'advance' ){
                                    if( $service_layout == 'style2'){
                                        get_spark_multipurpose_service_advance_layout2(); 
                                    }else{
                                        get_spark_multipurpose_service_advance_content($service_layout);
                                    }
                                }else{
                                    if( $service_layout == 'style2'){
                                        get_spark_multipurpose_service_layout2(); 
                                    }else{
                                        get_spark_multipurpose_service_default_content($service_layout);
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <?php spark_multipurpose_add_bottom_seperator('service'); ?>
            </section>
    <?php } }
endif;
add_action('spark_multipurpose_action_service', 'spark_multipurpose_service', 45);


/** LAYOUT ONE **************************************************************************** */


/******
 * Default Service Layout One
 */
if (! function_exists( 'get_spark_multipurpose_left_services' ) ):
    function get_spark_multipurpose_left_services($array){ 
        $btn = get_theme_mod('spark_multipurpose_service_button', __("Read More", 'spark-multipurpose'));
        ?>
        <div class="left_data feature_box">
            <?php foreach($array as $page): ?>
                <div class="data_block" data-aos="fade-right" data-aos-duration="1500">
                    <div class="text">
                        <h4><a href="<?php echo esc_url( get_the_permalink($page->service_page) ); ?>"><?php echo esc_html( get_the_title($page->service_page) ); ?></a></h4>
                        <p><?php echo esc_html( get_the_excerpt( $page->service_page ) ); ?></p>
                        <?php if($btn): ?>
                            <a href="<?php echo esc_url( get_the_permalink($page->service_page) ); ?>" class="btn btn-noborder">
                                <?php echo esc_html( $btn ); ?> <i class="fas fa-long-arrow-alt-right"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php
    }
endif; 

if (! function_exists( 'get_spark_multipurpose_right_services' ) ):
    function get_spark_multipurpose_right_services($array){ 
        $btn = get_theme_mod('spark_multipurpose_service_button', __("Read More", 'spark-multipurpose'));
        ?>
        <div class="right_data feature_box">
            <?php foreach($array as $page): ?>
                <div class="data_block" data-aos="fade-left" data-aos-duration="1500">
                    <div class="text">
                        <h4><a href="<?php echo esc_url( get_the_permalink($page->service_page) ); ?>"><?php echo esc_html( get_the_title($page->service_page) ); ?></a></h4>
                        <p><?php echo esc_html( get_the_excerpt( $page->service_page ) ); ?></p>
                        <?php if($btn): ?>
                            <a href="<?php echo esc_url( get_the_permalink($page->service_page) ); ?>" class="btn btn-noborder">
                                <?php echo esc_html( $btn ); ?> <i class="fas fa-long-arrow-alt-right"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php
    }
endif; 

if (! function_exists( 'get_spark_multipurpose_service_default_content' ) ):

    function get_spark_multipurpose_service_default_content($service_layout){

        $service_page   = get_theme_mod('spark_multipurpose_service');

        if( $service_page ){
            $pages = json_decode($service_page);
        }
        if( $service_page):
            $leftArray = $rightArray = array();
            if( $pages && is_array($pages) && count($pages) > 1 && ($pages[0]->service_page)){
                list($leftArray, $rightArray) = array_chunk($pages, ceil(count($pages) / 2));
            }else{
                $leftArray = $pages;
            }
            ?>
            <div class="service-wrapper">
                <div class="feature_detail">

                    <?php get_spark_multipurpose_left_services( $leftArray); ?>

                    <?php
                        $img = get_theme_mod('spark_multipurpose_service_bg_url');
                        if( !empty( $img ) ): 
                    ?>
                        <div class="feature_img">
                            <img src="<?php echo esc_url($img); ?>" alt="image"  data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
                        </div>
                    <?php endif; ?>

                    <?php get_spark_multipurpose_right_services( $rightArray); ?>

                </div>
            </div>
            <?php
        endif;
    }
endif;

/******
 * Advance Service Layout One
 */
if (! function_exists( 'get_spark_multipurpose_service_advance_content' ) ):

    function get_spark_multipurpose_service_advance_content($service_layout){

        $service_page  = get_theme_mod('spark_multipurpose_service_advance_settings');

        if( $service_page ){
            $pages = json_decode($service_page);
        }
        if( $service_page):
            $leftArray = $rightArray = array();
            if( $pages && is_array($pages) && count($pages) > 1 && ($pages[0]->block_title)){
                list($leftArray, $rightArray) = array_chunk($pages, ceil(count($pages) / 2));
            }else{
                $leftArray = $pages;
            }
            ?>
            <div class="service-wrapper">
                <div class="feature_detail">
                    <div class="left_data feature_box">
                        <?php foreach($leftArray as $page): ?>
                            <div class="data_block" data-aos="fade-right" data-aos-duration="1500">
                                <div class="text">
                                    <h4><a href="<?php echo esc_url( $page->button_url ); ?>"><?php echo esc_html( $page->block_title ); ?></a></h4>
                                    <p><?php echo esc_html( $page->block_desc ); ?></p>
                                    <?php if($page->button_text): ?>
                                        <a href="<?php echo esc_url( $page->button_url ); ?>" class="btn btn-noborder">
                                            <?php echo esc_html( $page->button_text ); ?> <i class="fas fa-long-arrow-alt-right"></i>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <?php
                        $img = get_theme_mod('spark_multipurpose_service_bg_url');
                        if( !empty( $img ) ): 
                    ?>
                        <div class="feature_img">
                            <img src="<?php echo esc_url($img); ?>" alt="image"  data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
                        </div>
                    <?php endif; ?>
                    
                    <div class="right_data feature_box">
                        <?php foreach($rightArray as $page): ?>
                            <div class="data_block" data-aos="fade-left" data-aos-duration="1500">
                                <div class="text">
                                    <h4><a href="<?php echo esc_url( $page->button_url ); ?>"><?php echo esc_html( $page->block_title ); ?></a></h4>
                                    <p><?php echo esc_html( $page->block_desc ); ?></p>
                                    <?php if($page->button_text): ?>
                                        <a href="<?php echo esc_url( $page->button_url ); ?>" class="btn btn-noborder">
                                            <?php echo esc_html( $page->button_text ); ?> <i class="fas fa-long-arrow-alt-right"></i>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>
            </div>
            <?php
        endif;
    }
endif;


/** LAYOUT TWO **************************************************************************** */

/******
 * Default Service Layout 2 (two)
 */
if( !function_exists("get_spark_multipurpose_service_layout2")){

    function get_spark_multipurpose_service_layout2(){
        
        $service_page   = get_theme_mod('spark_multipurpose_service');
        $btn = get_theme_mod('spark_multipurpose_service_button', __("Read More", 'spark-multipurpose'));
        
        if( $service_page ){
            $pages = json_decode($service_page);  
        }
        if( $service_page):
        ?>
            <div class="d-grid d-grid-column-3" data-aos="fade-right" data-aos-duration="1500">
                <?php foreach($pages as $page): ?>
                    <div class="service-block text-center">
                        <figure>
                            <a href="<?php echo esc_url( get_the_permalink($page->service_page) ); ?>">
                                <?php echo get_the_post_thumbnail($page->service_page, 'medium_large'); ?>
                            </a>
                        </figure>
                        <div class="bottom-content">
                            <?php if( $page->icon ): ?>
                                <div class="icon-box">
                                    <i class="<?php echo esc_attr($page->icon); ?>"></i>
                                </div>
                            <?php endif; ?>
                            <h4><a href="<?php echo esc_url( get_the_permalink($page->service_page) ); ?>"><?php echo esc_html( get_the_title($page->service_page) ); ?></a></h4>
                            <p><?php echo esc_html( get_the_excerpt( $page->service_page ) ); ?></p>
                            <?php if($btn): ?>
                                <a href="<?php echo esc_url( get_the_permalink($page->service_page) ); ?>" class="btn btn-noborder">
                                    <?php echo esc_html( $btn ); ?> <i class="fas fa-long-arrow-alt-right"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php
        endif;

    }
}

/******
 * Advance Service Layout 2 (two)
 */
if( !function_exists("get_spark_multipurpose_service_advance_layout2")){

    function get_spark_multipurpose_service_advance_layout2(){
        
        $service_page   = get_theme_mod('spark_multipurpose_service_advance_settings');

        if( $service_page ){
            $pages = json_decode($service_page);  
        }
        if( $service_page):
        ?>
            <div class="d-grid d-grid-column-3" data-aos="fade-right" data-aos-duration="1500">
                <?php foreach($pages as $page): ?>
                    <div class="service-block text-center">
                        <figure>
                            <a href="<?php echo esc_url( $page->button_url ); ?>">
                                <?php
                                    $img = wp_get_attachment_image_url( attachment_url_to_postid( $page->block_image ), 'medium_large' );
                                    if( $img ) {
                                        echo '<img src="'. esc_url($img ). '" alt="'. $page->block_title .'"/>';       
                                    } 
                                ?>
                            </a>
                        </figure>
                        <div class="bottom-content">
                            <?php if( $page->block_icon ): ?>
                                <div class="icon-box">
                                    <i class="<?php echo esc_attr($page->block_icon); ?>"></i>
                                </div>
                            <?php endif; ?>
                            <h4><a href="<?php echo esc_url( $page->button_url ); ?>"><?php echo esc_html( $page->block_title ); ?></a></h4>
                            <p><?php echo esc_html( $page->block_desc ); ?></p>
                            <?php if($page->button_text): ?>
                                <a href="<?php echo esc_url( $page->button_url ); ?>" class="btn btn-noborder">
                                    <?php echo esc_html( $page->button_text ); ?> <i class="fas fa-long-arrow-alt-right"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php
        endif;

    }
}

do_action('spark_multipurpose_action_service');
?>
<style>


/****
 ** Service Section
*/
.service-section .section-title-wrapper {
    margin-bottom: 70px;
}

.service-section .feature_detail {
    position: relative;
    display: flex;
    justify-content: space-between;
    gap: 2rem;
}

.service-section .feature_detail .feature_img {
    align-items: center;
    width: calc(100% - 850px);
    display: flex;
    justify-content: center;
}

.service-section .feature_detail .feature_img img {
    max-width: 100%;
}

.service-section .feature_detail .feature_box {
    max-width: 440px;
}

.service-section .feature_detail .left_data {
    text-align: right;
}
.service-section .feature_detail .right_data{
    text-align: left;
}

.service-section .feature_detail .feature_box .data_block {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 50px;
    padding: 20px;
    background: var(--white-color);
    box-shadow: 0 2px 25px 0 var(--box-shadow);
    border-radius: 15px;
}

.service-section .feature_detail .feature_box .data_block:last-child {
    margin-bottom: 0;
}

.service-section .feature_detail .feature_box .data_block .text p {
    margin: 10px 0;
}

.service-section .feature_detail .left_data .data_block .icon {
    order: 2;
}

/****
 * Service Layout ( two )
*/
.service-section.style2 .d-grid {
    gap: 0;
}

.service-section.style2 .service-block:nth-child(2),
.service-section.style2 .service-block:nth-child(5),
.service-section.style2 .service-block:nth-child(8) {
    display: flex;
    flex-direction: column-reverse;
}

.service-section.style2 .service-block figure,
.service-section.style2 .service-block .bottom-content {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: 450px;
}

.service-section.style2 .service-block figure {
    position: relative;
    overflow: hidden;
}

.service-section.style2 .service-block figure img {
    transition: all ease 0.6s;
    -webkit-transition: all ease 0.6s;
    -ms-transition: all ease 0.6s;
    object-fit: cover;
    min-height: 450px;
}

.service-section.style2 .service-block figure img:hover {
    transform: scale(1.1);
    -webkit-transform: scale(1.1);
    -ms-transform: scale(1.1);
}

.service-section.style2 .service-block .bottom-content {
    padding: 15px;
    background: #efefef;
}

.service-section.style2 .service-block .bottom-content h4 {
    margin-top: 15px;
}

.service-section.style2 .service-block .bottom-content .icon-box {
    width: 100px;
    height: 100px;
    background-color: var(--theme-color);
    margin-bottom: 10px;
    position: relative;
    clip-path: path("M1.92133 53.4337C-1.28975 65.0875 -1.11481 77.4886 7.42925 85.5867C21.5264 98.9453 46.3572 101.088 63.3776 99.5875C70.6576 98.9453 78.0109 97.3572 84.5233 93.2994C91.0358 89.2416 96.6679 82.4572 98.897 73.8979C102.52 59.9846 96.6453 45.0729 89.5911 33.3316C83.7389 23.5929 76.8484 14.6132 68.4736 8.26082C51.329 -4.74165 33.1912 -2.704 20.1607 16.5749C14.3367 25.181 5.78703 39.392 1.92133 53.4337Z");
}

.service-section.style2 .service-block .bottom-content .icon-box:before {
    content: "";
    width: calc(100% - 20px);
    height: calc(100% - 20px);
    position: absolute;
    right: 10px;
    top: 10px;
    clip-path: path("M1.53706 42.747C-1.0318 52.07 -0.891847 61.9909 5.9434 68.4693C17.2211 79.1562 37.0858 80.8704 50.7021 79.67C56.5261 79.1562 62.4087 77.8858 67.6187 74.6395C72.8286 71.3933 77.3343 65.9658 79.1176 59.1183C82.016 47.9877 77.3162 36.0583 71.6729 26.6653C66.9911 18.8743 61.4787 11.6905 54.7789 6.60865C41.0632 -3.79332 26.553 -2.1632 16.1286 13.2599C11.4694 20.1448 4.62963 31.5136 1.53706 42.747Z");
    background-color: var(--white-color);
}

.service-section.style2 .service-block .bottom-content .icon-box i {
    color: var(--icon-color);
    font-size: 40px;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
    position: relative;
}

.service-section.style2 .service-block .bottom-content p {
    margin-top: 0;
}
</style>