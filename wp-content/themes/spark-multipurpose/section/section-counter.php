<?php
/**
 * Template part for displaying front page section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Spark Multipurpose
 */
/**
 * Hook -  spark_multipurpose_action_counter
 *
 * @hooked spark_multipurpose_counter - 60
 */
/**
 *  Success Product Counter Section.
*/
if (! function_exists( 'spark_multipurpose_counter' ) ):
    function spark_multipurpose_counter(){
        $title_style = get_theme_mod('spark_multipurpose_counter_title_align', 'text-center');
        $super_title = get_theme_mod('spark_multipurpose_counter_super_title');
        $title = get_theme_mod('spark_multipurpose_counter_title');
        $counter_options = get_theme_mod('spark_multipurpose_counter_section_disable','disable');
        $counter_col = get_theme_mod( 'spark_multipurpose_counter_col', 4 );
        
        if( !empty( $counter_options ) && $counter_options == 'enable' ){
            $service_class = array(
                'section',
                'alignfull',
                'counter-section',
                'counter-wrap',
            );
            $type = get_theme_mod('spark_multipurpose_counter_bg_type');
            $bg_video           = get_theme_mod("spark_multipurpose_counter_bg_video", '1IaZy0sDLu0');
            if( $type == "video-bg" &&  $bg_video):
              $video_data = 'data-property="{videoURL:\'' . $bg_video . '\', mobileFallbackImage:\'https://img.youtube.com/vi/' . $bg_video . '/maxresdefault.jpg\'}"';
            else: 
              $video_data = '';
            endif;
            ?>
            <section id="counter-section" class="<?php echo esc_attr(implode(' ', $service_class)) ?>" <?php echo $video_data; ?>>
                <?php spark_multipurpose_add_top_seperator('counter'); ?>
                <div class="section-wrap">
                    <div class="container">
                        <div class="inner-section-wrap">
                            <?php spark_multipurpose_section_title( $super_title, $title, $title_style ); ?>
                            <div class="achivement-items">
                                <ul class="d-grid d-grid-column-<?php echo intval($counter_col); ?>">
                                    <?php
                                        $counter_page = get_theme_mod('spark_multipurpose_counter');
                                        if (!empty($counter_page)):
                                        $counters = json_decode($counter_page);
                                        $i = 1;
                                        foreach ( $counters as $counter ):
                                            if(!$counter->counter_icon || !$counter->counter_title || !$counter->counter_number ) continue;
                                    ?>
                                        <li>
                                            <?php if( $counter->counter_icon): ?>
                                            <div class="timer-icon">
                                                <i class="<?php echo esc_attr( $counter->counter_icon ); ?>"></i>
                                            </div>
                                            <?php endif; ?>
                                            <div class="timer-content">
                                                <?php if( $counter->counter_number ): ?>
                                                   
                                                    <div class="timer achivement"><?php echo intval( $counter->counter_number ); ?></div>
                                                    <?php if(!empty($counter->counter_suffix)): ?>
                                                        <div class="counter_suffix"><?php echo esc_html($counter->counter_suffix); ?></div>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                                <span class="medium"><?php echo esc_html( $counter->counter_title ); ?></span>
                                            </div>
                                        </li>
                                    <?php  $i++; endforeach; endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <?php spark_multipurpose_add_bottom_seperator('counter'); ?>
            </section>
    <?php } }
endif;
add_action('spark_multipurpose_action_counter', 'spark_multipurpose_counter', 60);
do_action('spark_multipurpose_action_counter');
?>
<style>


/****
 ** Our Client Brand Logo ( Slider & List ) Layout One & Two
*/
.client-list .owl-carousel .owl-stage {
    display: flex;
    align-items: center;
}

.client-list .client-logo-list {
    align-items: center;
}

.client-list .item img {
    /* filter: grayscale(1); */
    margin: 0 auto;
    transition: .4s all;
    width: 180px;
}

.client-list .item img:hover {
    filter: grayscale(0);
}

/*--------------------------------------------------------------
## Succes Counter
--------------------------------------------------------------*/
.counter-wrap .achivement-items {
    padding-top: 15px;
}

.counter-wrap .achivement-items ul {
    padding: 0;
    margin: 0;
    /* grid-template-columns: auto auto auto auto; */
}

.counter-wrap .achivement-items .counter_prefix,
.counter-wrap .achivement-items .counter_suffix {
    display: inline-block;
    font-size: 40px;
    font-weight: 700;
    position: relative;
    z-index: 1;
    line-height: 1;
}

.display-none,
.counter-wrap .achivement-items .timer::after {
    display: none !important;
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
</style>