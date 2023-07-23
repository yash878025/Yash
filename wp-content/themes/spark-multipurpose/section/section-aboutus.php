<?php
/**
 * Template part for displaying front page section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Spark Multipurpose
 */
/**
 * Hook -  spark_multipurpose_action_about
 *
 * @hooked spark_multipurpose_action_about - 35
*/
/**
 * About Us Section.
*/
if( !function_exists('get_about_us_image')):
    function get_about_us_image($about_image, $text_align="text-left"){
        //if (!empty($about_image)): ?>
            <div class="about-left <?php echo esc_attr($text_align); ?> about-img" data-aos="fade-left" data-aos-duration="1500">
                <img src="<?php echo esc_url(  $about_image  ); ?>"/>
            </div>
        <?php //endif;
    }
endif;

if( !function_exists('get_about_us_content')):
    function get_about_us_content($text_align = "text-left", $about_image = false){
        $super_title = get_theme_mod('spark_multipurpose_aboutus_super_title');
        ?>
        <div class="about-right <?php echo esc_attr( $text_align ); ?> " data-aos="fade-right" data-aos-duration="1500">
            <span class="aboutsuper-title"><?php echo esc_html( $super_title ); ?></span>
            <h2 class="section-title"><?php the_title(); ?></h2>
            <div class="section-tagline-text">
                <?php the_content(); ?>
                <?php
                    if (get_theme_mod('spark_multipurpose_aboutus_progressbar', 'enable') == 'enable'):

                        $about_progressbar = get_theme_mod('spark_multipurpose_progressbar');
                        
                        if (!empty( $about_progressbar ) ): 
                ?>
                        <div class="achivement-items">
                            <ul>
                                <?php
                                    $progressbars = json_decode($about_progressbar);
                                    foreach ($progressbars as $progressbar):
                                        if( $progressbar->progressbar_title || $progressbar->icon || $progressbar->progressbar_number):
                                ?>
                                    <li>
                                        <?php if( $progressbar->icon): ?>
                                            <div class="timer-icon">
                                                <i class="<?php echo esc_attr( $progressbar->icon ); ?>"></i>
                                            </div>
                                        <?php endif; ?>
                                        <div class="timer-content">
                                            <?php if( $progressbar->progressbar_number ): ?>
                                                <div class="timer achivement"><?php echo intval( $progressbar->progressbar_number ); ?></div>
                                            <?php endif; ?>
                                            <span class="medium"><?php echo esc_html( $progressbar->progressbar_title ); ?></span>
                                        </div>
                                    </li>
                                <?php endif; endforeach; endif; ?>
                            </ul>
                        </div>
                    <?php endif; 

                    $about_button = get_theme_mod( 'spark_multipurpose_aboutus_button_text','More About Us' );
                    if ( $about_button ) { ?>
                        <a href="<?php the_permalink(); ?>" class="btn btn-primary">
                            <?php echo esc_html( $about_button ); ?><i class="fas fa-long-arrow-alt-right"></i>
                        </a>
                    <?php }
                    
                    $signature = get_theme_mod('spark_multipurpose_aboutus_signature');
                    $image = get_theme_mod('spark_multipurpose_aboutus_profile_image');
                    $profile_name = get_theme_mod('spark_multipurpose_aboutus_profile_name');

                    if( $image || $profile_name || $signature ): ?>
                        <div class="about-profile">
                            <?php if( !empty( $image )): ?>
                                <div class="about-profile-img" style="background-image: url('<?php echo esc_url($image); ?>')"></div>
                            <?php endif; ?>
                            
                            <?php if( $profile_name ): ?>
                                <div class="profile-info">
                                    <h4><?php echo esc_html($profile_name ); ?></h4>
                                    <?php if($profile_role = get_theme_mod('spark_multipurpose_aboutus_profile_role') ): ?>
                                        <span class="role"><?php echo esc_html( $profile_role ); ?></span>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>

                            <?php if( !empty( $signature ) ): ?>
                                    <div class="about-signature">
                                        <img src="<?php echo esc_url($signature); ?>" alt="signature">
                                    </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
            </div>
        </div>
        <?php
    }
endif;

if (! function_exists( 'spark_multipurpose_about' ) ):
    function spark_multipurpose_about(){ 
        $aboutus_options = get_theme_mod('spark_multipurpose_aboutus_section_disable','enable');
        if( !empty( $aboutus_options ) && $aboutus_options == 'enable' ){
            $spark_multipurpose_service_style = get_theme_mod('spark_multipurpose_aboutus_layout_design', 'layouttwo');
            $service_class = array(
                $spark_multipurpose_service_style,
                'section',
                'aboutus-section',
                'about_us_front'
            );
            $type = get_theme_mod('spark_multipurpose_aboutus_bg_type');
            $bg_video  = get_theme_mod("spark_multipurpose_aboutus_bg_video", '1IaZy0sDLu0');
            if( $type == "video-bg" &&  $bg_video):
              $video_data = 'data-property="{videoURL:\'' . $bg_video . '\', mobileFallbackImage:\'https://img.youtube.com/vi/' . $bg_video . '/maxresdefault.jpg\'}"';
            else: 
              $video_data = '';
            endif;
            ?>
            <section id="aboutus-section" class="alignfull <?php echo esc_attr(implode(' ', $service_class)) ?>" <?php echo $video_data; ?>>
                <?php spark_multipurpose_add_top_seperator('aboutus'); ?>
                <div class="section-wrap">
                    <div class="container">
                        <div class="about-wrapper inner-section-wrap">
                            <?php
                                $aboutus = get_theme_mod('spark_multipurpose_about');
                                if (!empty( $aboutus ) ):
                                $aboutus_args = array(
                                    'posts_per_page' => 1,
                                    'post_type' => 'page',
                                    'page_id' => $aboutus,
                                    'post_status' => 'publish',
                                );
                                $aboutus_query = new WP_Query($aboutus_args);
                                
                                if ( $aboutus_query->have_posts() ) : while ( $aboutus_query->have_posts() ) : $aboutus_query->the_post();
                                    
                                $about_image = get_theme_mod('spark_multipurpose_about_image');
                                
                                $text_align = get_theme_mod('aboutus-alignment', 'text-left');
                                
                                get_about_us_image($about_image, $text_align);

                                get_about_us_content($text_align, $about_image);
                            ?>
                            <?php endwhile; endif; endif; ?>
                        </div>
                    </div>
                </div>
                <?php spark_multipurpose_add_bottom_seperator('aboutus'); ?>
            </section>
    <?php } }
endif;
add_action('spark_multipurpose_action_about', 'spark_multipurpose_about', 35);

do_action('spark_multipurpose_action_about');
?>
<style>
/*--------------------------------------------------------------
## About Us section
--------------------------------------------------------------*/
.about_us_front .about-wrapper {
    display: flex;
    gap: 2em;
    align-items: center;
    justify-content: center;
}

.layouttwo.about_us_front .about-wrapper {
    flex-direction: row-reverse;
}

.layoutthree.about_us_front .about-wrapper {
    flex-direction: column;
}

.about_us_front .about-wrapper .about-left {
    width: 45%;
}

.about_us_front .about-wrapper .about-right {
    width: 55%;
}

.layoutthree.about_us_front .about-wrapper .about-left,
.layoutthree.about_us_front .about-wrapper .about-right {
    width: 100%;
}

.about_us_front .about-wrapper .about-left img {
    background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;
    width: 100%;
}

.about-wrapper .aboutsuper-title {
    font-weight: 500;
    font-size: 18px;
    color: var(--theme-color);
    display: block;
    margin-bottom: 10px;
}

ul.check-square li,
ul.check-circle li {
    margin-bottom: 5px;
    list-style: none;
    display: inline-flex;
    line-height: 1.4;
}

ul.check-square li:before {
    content: "\f14a";
    font-family: var(--icon-font);
    color: var(--theme-color);
    font-size: 20px;
    margin-right: 8px;
}

ul.check-circle li:before {
    content: "\f058";
    font-family: var(--icon-font);
    color: var(--theme-color);
    font-size: 20px;
    margin-right: 8px;
}

/***
 * About Section Achiment Item ( Sucess Counter )
*/
.about_us_front .achivement-items {
    margin: 30px 0;
}

.about_us_front .achivement-items ul {
    padding: 0;
    margin: 0;
    display: grid;
    gap: 2em 3em;
    align-items: center;
    grid-template-columns: repeat(2, 1fr);
}

.about_us_front .achivement-items ul li {
    padding: 15px;
}

.about_us_front .text-right .achivement-items {
    display: flex;
    justify-content: flex-end;
}

.about_us_front .text-center .achivement-items {
    display: flex;
    justify-content: center;
    flex-direction: column;
}

.layoutthree .achivement-items ul {
    grid-template-columns: repeat(4, 1fr);
    /* display: flex; */
}

.achivement-items ul li {
    display: flex;
    align-items: center;
    border-radius: 12px;
    padding: 15px 10px;
    padding-left: 25px;
    background-color: var(--white-color);
    color: #000;
    border-right: 1px solid var(--light-color);
    box-shadow: 0px 4px 10px var(--box-shadow);
}

.achivement-items ul li .timer-icon {
    background: #f3f0fb;
    color: var(--icon-color);
    border-radius: 5px;
    width: 65px;
    height: 70px;
    line-height: 1;
    font-size: 35px;
    margin-right: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.achivement-items ul li .timer-content {
    flex: 1;
    text-align: left;
}

.achivement-items .timer {
    display: inline-block;
    font-size: 40px;
    font-weight: 700;
    position: relative;
    z-index: 1;
    line-height: 1;
}

.achivement-items .timer::after {
    content: "+";
    margin-left: 5px;
}

.achivement-items .medium {
    display: block;
    font-weight: 500;
}

/**
 * About Section Profile Image with Signature
*/
.layoutthree .text-center .about-profile {
    justify-content: center;
}

.about-profile {
    display: flex;
    align-items: center;
    gap: 1.2em;
    margin-top: 35px;
}

.text-right .about-profile {
    justify-content: flex-end;
}

.about-profile-img {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    margin-right: 15px;
    background-size: cover;
}

.about-profile h4 {
    margin-bottom: 0;
    color: inherit;
}

.about-signature img {
    max-width: 200px;
}

@media screen and (max-width: 1000px) {

    .about-wrapper,
    .layouttwo .about-wrapper {
        grid-template-columns: repeat(2, 1fr);
    }

    .about_us_front .achivement-items ul {
        grid-template-columns: 1fr;
        gap: 1em;
    }
}

@media screen and (max-width: 768px) {

    .about_us_front .about-wrapper .about-left,
    .about_us_front .about-wrapper .about-right {
        width: 100%;
    }

    .layouttwo.about_us_front .about-wrapper,
    .layouttwo .about-wrapper {
        flex-direction: column;
    }

    .about_us_front .achivement-items ul {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media screen and (max-width: 480px) {
    .about_us_front .achivement-items ul {
        grid-template-columns: 1fr;
        gap: 1em;
    }
}
</style>