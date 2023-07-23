<?php
/**
 * Template part for displaying front page section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Spark Multipurpose
 */
/**
 * Hook -  spark_multipurpose_action_promo_service
 *
 * @hooked spark_multipurpose_promo_service - 30
 */
/**
 * Our Service Featues Section.
*/
if (! function_exists( 'spark_multipurpose_promo_service' ) ):
    function spark_multipurpose_promo_service(){
        $features_options = get_theme_mod('spark_multipurpose_promoservice_section_disable','disable');
        $style = get_theme_mod('spark_multipurpose_promoservice_style', 'style1');
        $promo_col = get_theme_mod('spark_multipurpose_promo_service_col', 3);

        if( !empty( $features_options ) && $features_options == 'enable' ){
            $service_class = array(
                'section',
                'alignfull',
                'promoservice-section',
                $style
            );
            $type = get_theme_mod('spark_multipurpose_promoservice_bg_type');
            $bg_video           = get_theme_mod("spark_multipurpose_promoservice_bg_video", '1IaZy0sDLu0');
            if( $type == "video-bg" &&  $bg_video):
              $video_data = 'data-property="{videoURL:\'' . $bg_video . '\', mobileFallbackImage:\'https://img.youtube.com/vi/' . $bg_video . '/maxresdefault.jpg\'}"';
            else: 
              $video_data = '';
            endif;
            ?>
            <section id="promoservice-section" class="<?php echo esc_attr(implode(' ', $service_class)) ?>" <?php echo $video_data; ?>>
                <?php spark_multipurpose_add_top_seperator('promoservice'); ?>
                <div class="section-wrap">
                    <div class="container">
                        <div class="inner-section-wrap">
                            <?php 
                                /**
                                 * Section Title
                                */
                                spark_multipurpose_service_title(); 
                            ?>
                            <div class="promoservice-wrap d-grid d-grid-column-<?php echo esc_attr($promo_col); ?>">
                                <?php
                                    $promoservice_type = get_theme_mod('spark_multipurpose_promoservice_type','default');
                                    
                                    switch ( $promoservice_type ) {
                                        case 'advance':
                                            /**
                                             * Advance Promo Service Function
                                            */
                                            spark_multipurpose_promo_advance_sections();
                                            break;

                                        default:
                                            /**
                                             * Default Promo Service Function
                                            */
                                            spark_multipurpose_promo_default_sections();
                                            break;
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php spark_multipurpose_add_bottom_seperator('promoservice'); ?>
            </section>
        <?php } }
endif;

add_action('spark_multipurpose_action_promo_service', 'spark_multipurpose_promo_service', 30);

/****
 * Default Promo Service
 */
if(!function_exists('spark_multipurpose_promo_default_sections')):
    function spark_multipurpose_promo_default_sections(){
        $promo_service  = get_theme_mod('spark_multipurpose_promoservice');
        $show_image = get_theme_mod('spark_multipurpose_promoservice_show_image', 'enable');
        $boxshadow = get_theme_mod('spark_multipurpose_promoservice_boxshadow', 'enable');
        if (!empty($promo_service)):
        $pages = json_decode($promo_service);
        foreach ($pages as $page):
        $page_id = $page->service_page;
        if (!empty($page_id)):
            $service_query = new WP_Query('page_id=' . $page_id);
            if ( $service_query->have_posts() ): while ( $service_query->have_posts() ): $service_query->the_post();
            
            if( !isset($page->bg_color)){
                $page->bg_color = '';
            }
            if( !isset($page->color)){
                $page->color = '';
            }
            if( !isset($page->alignment)){
                $page->alignment = 'text-center';
            }
            
            $bg_color = $page->bg_color;
            $color = $page->color;
            $style = '';
            if( $bg_color || $color ){
                $style = "style=background-color:{$bg_color};color:{$color};";
            }
        ?>
        <div class="feature-list <?php if($boxshadow == 'enable' ): echo esc_attr('box-shadow');  endif; ?>" data-aos="fade-up" data-aos-duration="1500" <?php echo esc_attr($style); ?>>
            <div class="box <?php echo esc_attr( $page->alignment); ?> <?php if(has_post_thumbnail() ): ?>image-<?php echo esc_attr($show_image); endif; ?> ">
                <?php if( has_post_thumbnail() && $show_image == 'enable' ): ?>
                    <figure>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('post-thumbnail'); ?>
                        </a>
                    </figure>
                <?php endif; ?>
                <div class="bottom-content">
                    <div class="top-content-wrap">
                        <?php if( get_theme_mod('spark_multipurpose_promoservice_show_icon', 'enable') == 'enable'): ?>
                            <div class="icon-box">
                                <i class="<?php echo esc_html( $page->service_icon ); ?>"></i>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="bottom-content-wrap">
                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                        <?php the_excerpt(); ?>
                        <?php if( get_theme_mod('spark_multipurpose_promoservice_show_button', 'enable') == 'enable'): ?>
                            <a href="<?php the_permalink(); ?>" class="btn btn-noborder"><?php echo esc_html__('Read More', 'spark-multipurpose'); ?> <i class="fas fa-long-arrow-alt-right"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="content-overlay"></div>
        </div>
        <?php   endwhile;  endif; endif; endforeach; endif;
    }
endif;

/****
 * Advance Promo Service
 */
if( !function_exists('spark_multipurpose_promo_advance_sections') ):
    
    function spark_multipurpose_promo_advance_sections(){
        
        $promo_service  = get_theme_mod('spark_multipurpose_promoservice_advance_settings', json_encode( array(
                array(
                    'block_image' => '',
					'block_icon' => 'fas fa-snowflake',
					'block_title' => 'UI UX Design',
					'block_desc' => 'Delectus ea, fugiat possimus iste facilis minima dolor consequatur vel voluptas assumenda eum beatae, autem architecto…',
					'button_text' => '',
					'button_url' => '#'
                ),
                array(
                    'block_image' => '',
					'block_icon' => 'fas fa-fingerprint',
					'block_title' => 'Product Design',
					'block_desc' => 'Delectus ea, fugiat possimus iste facilis minima dolor consequatur vel voluptas assumenda eum beatae, autem architecto…',
					'button_text' => '',
					'button_url' => '#'
                ),
                array(
                    'block_image' => '',
					'block_icon' => 'fas fa-snowflake',
					'block_title' => 'Web Design',
					'block_desc' => 'Delectus ea, fugiat possimus iste facilis minima dolor consequatur vel voluptas assumenda eum beatae, autem architecto…',
					'button_text' => '',
					'button_url' => '#'
                )

        )));
        $show_image     = get_theme_mod('spark_multipurpose_promoservice_show_image', 'enable');
        $boxshadow      = get_theme_mod('spark_multipurpose_promoservice_boxshadow', 'enable');
        $readmore       = get_theme_mod('spark_multipurpose_promoservice_show_button', 'enable');

        if (!empty($promo_service)):

        $pages = json_decode($promo_service);

        foreach ($pages as $page):
            $block_title = $page->block_title;
            $block_image = $page->block_image;

            if (!empty($block_title)):

                if( !isset($page->block_bg_color)){
                    $page->block_bg_color = '';
                }
                if( !isset($page->block_color)){
                    $page->block_color = '';
                }
                if( !isset($page->block_alignment)){
                    $page->block_alignment = 'text-center';
                }
                
                $bg_color = $page->block_bg_color;
                $color = $page->block_color;
                $style = '';
                if( $bg_color || $color ){
                    $style = "style=background-color:{$bg_color};color:{$color};";
                }
        ?>
            <div class="feature-list <?php if($boxshadow == 'enable' ): echo esc_attr('box-shadow');  endif; ?>" data-aos="fade-up" data-aos-duration="1500" <?php echo esc_attr($style); ?>>
                <div class="box <?php echo esc_attr( $page->block_alignment); ?> <?php if( $block_image ): ?>image-<?php echo esc_attr($show_image); endif; ?> ">
                    <?php if( !empty($block_image) && $show_image == 'enable' ): ?>
                        <figure>
                            <a href="<?php echo esc_url( $page->button_url ); ?>">
                                <img alt="<?php echo esc_html( $page->block_title ); ?>" src="<?php echo esc_url( $block_image ) ?>"  />
                            </a>
                        </figure>
                    <?php endif; ?>
                    <div class="bottom-content">
                        <div class="top-content-wrap">
                            <?php if( get_theme_mod('spark_multipurpose_promoservice_show_icon', 'enable') == 'enable'): ?>
                                <div class="icon-box">
                                    <i class="<?php echo esc_html( $page->block_icon ); ?>"></i>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="bottom-content-wrap">
                            <h4><a href="<?php echo esc_url( $page->button_url ); ?>"><?php echo esc_html( $page->block_title ); ?></a></h4>
                            <p><?php echo esc_html( $page->block_desc ); ?></p>
                            <?php if( !empty( $page->button_text ) && $readmore == 'enable'){ ?>
                                <a href="<?php echo esc_url( $page->button_url ); ?>" class="btn btn-noborder">
                                    <?php echo esc_html( $page->button_text ); ?> <i class="fas fa-long-arrow-alt-right"></i>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="content-overlay"></div>
            </div>
        <?php endif; endforeach; endif;
    }
endif;

do_action('spark_multipurpose_action_promo_service');
?>
<style>
    
/****************
 * Promo Service Section
*/
.box-shadow {
    /* -webkit-box-shadow: 0px 4px 15px rgb(1 15 28 / 6%);
    box-shadow: 0px 4px 15px rgb(1 15 28 / 6%); */
    -webkit-box-shadow: 0 15px 30px 0 rgb(35 92 81 / 25%);
    box-shadow: 0 15px 30px 0 rgb(35 92 81 / 25%);
}

.promoservice-wrap .feature-list .box figure {
    position: relative;
    overflow: hidden;
}

.promoservice-wrap .feature-list .box figure img {
    transition: all ease 0.6s;
    -webkit-transition: all ease 0.6s;
    -ms-transition: all ease 0.6s;
    object-fit: cover;
    height: 350px;
}

.promoservice-wrap .feature-list .box figure img:hover {
    transform: scale(1.1);
    -webkit-transform: scale(1.1);
    -ms-transform: scale(1.1);
}

.promoservice-wrap .feature-list .bottom-content {
    padding: 20px;
    position: relative;
}

.promoservice-wrap .feature-list .icon-box {
    width: 100px;
    height: 100px;
    color: var(--white-color);
    background-color: var(--theme-color);
    border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
}


.promoservice-wrap .feature-list .icon-box i {
    font-size: 40px;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
    position: relative;
}

.promoservice-wrap .feature-list .box.text-center .icon-box {
    margin: 0 auto;
}

.promoservice-wrap .feature-list .box.text-right .icon-box {
    margin-right: 0;
}

.promoservice-wrap .feature-list .box.text-left .icon-box {
    margin-left: 0;
}

.promoservice-wrap .feature-list .box.image-enable .icon-box {
    margin-top: -75px;
}

.promoservice-wrap .feature-list .bottom-content h4 {
    margin-top: 15px;
}

/*******************
* Style 2
*/
.promoservice-section.style2 .d-grid {
    gap: 1rem;
}

.style2 .promoservice-wrap .feature-list {
    position: relative;
}

.style2 .promoservice-wrap .feature-list .bottom-content {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    z-index: 22;
}

.style2 .promoservice-wrap .feature-list .bottom-content a,
.style2 .promoservice-wrap .feature-list .bottom-content .bottom-content-wrap p {
    color: var(--white-color);
}

.style2 .promoservice-wrap .feature-list .bottom-content a:hover {
    color: var(--link-hover-color);
}

.style2 .promoservice-wrap .feature-list .icon-box {
    background-color: transparent;
    height: auto;
    width: auto;
    clip-path: none;
}

.style2 .promoservice-wrap .feature-list .icon-box i {
    color: var(--white-color);
}

.style2 .promoservice-wrap .feature-list .icon-box:before {
    display: none;
}

.style2 .promoservice-wrap .feature-list .icon-box i {
    font-size: 45px;
    align-items: flex-end;
    height: auto;
    clip-path: none;
}

.style2 .promoservice-wrap .top-content-wrap {
    margin-top: 60%;
    -webkit-transition: margin .3s ease-out;
    -o-transition: margin .3s ease-out;
    transition: margin .3s ease-out;
}

.style2 .promoservice-wrap .bottom-content-wrap {
    opacity: 0;
    overflow: hidden;
    position: relative;
    left: 0;
    bottom: 0;
    width: 100%;
    text-align: center;
    padding: 0 10px;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    -webkit-transition: opacity .3s ease-out;
    -o-transition: opacity .3s ease-out;
    transition: opacity .3s ease-out;
}

.style2 .promoservice-wrap .feature-list:hover .top-content-wrap {
    margin-top: 0;
}

.style2 .promoservice-wrap .feature-list:hover .bottom-content-wrap {
    opacity: 1;
    overflow: visible;
}

.style2 .promoservice-wrap .feature-list .box.image-enable .icon-box {
    margin-top: 0;
}

.style2 .promoservice-wrap .feature-list .content-overlay::after {
    content: '';
    position: absolute;
    display: block;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    -webkit-transition: opacity .2s ease-out;
    -o-transition: opacity .2s ease-out;
    transition: opacity .2s ease-out;
    background-color: rgba(0, 0, 0, 0.55);
    opacity: 1;
}
</style>