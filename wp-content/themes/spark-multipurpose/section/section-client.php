<?php
/**
 * Template part for displaying front page section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Spark Multipurpose
 */
/**
 * Hook -  costruction_light_action_clients
 *
 * @hooked costruction_light_clients - 80
 */
/**
 *  Our Client Brand Logo Section.
*/
if (! function_exists( 'costruction_light_clients' ) ):
    function costruction_light_clients(){ 

        if( function_exists( 'pll_register_string' ) ){ 
            $super_title = pll__( get_theme_mod('spark_multipurpose_client_super_title') );
            $title = pll__( get_theme_mod('spark_multipurpose_client_title') );
        }else{ 
            $super_title = get_theme_mod('spark_multipurpose_client_super_title');
            $title = get_theme_mod('spark_multipurpose_client_title');
        }
        $title_style = get_theme_mod('spark_multipurpose_client_title_align', 'text-center');

        $logo_style = get_theme_mod('spark_multipurpose_logo_style', 'style1');
        $logo_style_class = "owl-carousel owl-theme client-logo-slider";
        if($logo_style == 'style2'){
            $logo_style_class = "d-grid d-grid-column-4 client-logo-list";
        }
        $client_logo_options = get_theme_mod('spark_multipurpose_client_section_disable','disable');
        
        if( !empty( $client_logo_options ) && $client_logo_options == 'enable' ){
            $service_class = array(
                'section',
                'alignfull',
                'client-section',
                'client-list',
                'spark_multipurpose_feature'
            );
            $type = get_theme_mod('spark_multipurpose_client_bg_type');
            $bg_video = get_theme_mod("spark_multipurpose_counter_bg_video", '1IaZy0sDLu0');
            if( $type == "video-bg" &&  $bg_video):
              $video_data = 'data-property="{videoURL:\'' . $bg_video . '\', mobileFallbackImage:\'https://img.youtube.com/vi/' . $bg_video . '/maxresdefault.jpg\'}"';
            else: 
              $video_data = '';
            endif;
            ?>
            <section id="client-section" class="<?php echo esc_attr(implode(' ', $service_class)) ?>" <?php echo $video_data; ?>>
                <?php spark_multipurpose_add_top_seperator('client'); ?>
                    <div class="section-wrap">
                        <div class="container">
                            <div class="inner-section-wrap">
                                <?php spark_multipurpose_section_title( $super_title, $title, $title_style); ?>
                                <div class="<?php echo esc_attr($logo_style_class); ?> client_logo">
                                    <?php
                                    $client_images = get_theme_mod('spark_multipurpose_client');
                                    if (!empty($client_images)) :
                                        $client_images = json_decode($client_images);
                                        foreach ($client_images as $image) {
                                    ?>
                                        <div class="item" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
                                            <div class="logo">
                                                <a href="<?php echo esc_url( $image->client_link ); ?>">
                                                    <img src="<?php echo esc_url( $image->client_image ); ?>" class="img-fluid">
                                                </a>
                                            </div>
                                        </div>
                                    <?php } endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php spark_multipurpose_add_bottom_seperator('client'); ?>
            </section>
    <?php } }
endif;
add_action('costruction_light_action_clients', 'costruction_light_clients', 80);
do_action('costruction_light_action_clients');