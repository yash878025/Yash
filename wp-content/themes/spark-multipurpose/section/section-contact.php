<?php
/**
 * Template part for displaying front page section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Spark Multipurpose
 */
if( !function_exists('spark_multipurpose_contact_content')){
 function spark_multipurpose_contact_content() {

    $contact_shortcode = get_theme_mod('spark_multipurpose_contact_shortcode');
    $show_icons = get_theme_mod('spark_multipurpose_contact_social_icons', 'enable');
    $show_contact_box = get_theme_mod('spark_multipurpose_show_contact_detail', 'enable');
    
    if ($show_contact_box == 'enable') {
        ?>
        <div class="contact-detail-toggle open"><i class="fa fa-plus" aria-hidden="true"></i></div>
            <div class="contact-content" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
                <?php 
                    spark_multipurpose_add_top_seperator('contact'); 
                    $title = get_theme_mod('spark_multipurpose_contact_title', __('Quick Get In Touch', 'spark-multipurpose'));
                    $description = get_theme_mod('spark_multipurpose_contact_descripton');
                ?>
                <div class="contact-form">
                    <?php if( $title ): ?>
                        <h3 class="section-title"><?php echo esc_html( $title); ?></h3>
                    <?php endif; ?>
                    <?php if( $description ): ?>
                        <p class="contact-desc"><?php echo esc_html( $description); ?></p>
                    <?php endif; ?>
                    <?php echo do_shortcode($contact_shortcode); ?>
                </div>
                <div class="contact-detail">
                    <?php 
                        $heading = get_theme_mod('spark_multipurpose_contact_details_right_heading', 'Quick Contact Information');
                        if(!empty( $heading ) ): 
                    ?>
                        <h3><?php echo esc_html($heading); ?></h3>
                    <?php endif; ?>

                    <?php do_action('spark_multipurpose_contact_info_section'); ?>
                    
                    <?php  if ( $show_icons == 'enable' ) {  ?>
                        <div class="contact-social-icon">
                            <?php do_action('spark_multipurpose_contact_social_icons'); ?>
                        </div>
                    <?php } ?>
                </div>
                <?php spark_multipurpose_add_bottom_seperator('contact'); ?>
            </div>
        <?php
    }
 }
}
if( !function_exists('spark_multipurpose_contact_map')){
function spark_multipurpose_contact_map() {
    $latitude = get_theme_mod('spark_multipurpose_latitude', 24.691943);
    $longitude = get_theme_mod('spark_multipurpose_longitude', 78.403931);
    $map_style = get_theme_mod('spark_multipurpose_map_style', 'normal');
    ?>
        <div id="google-map">
            
        </div>
    <?php
    if (!empty($longitude) && !empty($latitude) ) {
        ?>
        <script>
            jQuery(function ($) {
                $(document).ready(function(){
                    try{
                        var center = [<?php echo $latitude; ?>, <?php echo $longitude; ?>];
                        $('#google-map').gmap3({
                            center: center,
                            zoom: 35,
                            scrollwheel: false,
                            mapTypeId: "<?php echo $map_style ?>",
                            mapTypeControl: false,
                        })
                        .marker({
                            position: center,
                            visible: false,
                        })
                        .overlay({
                            position: center,
                            content: '<div><div class="animated-dot">' + '<div class="middle-dot"></div>' + '<div class="signal"></div>' + '<div class="signal2"></div>' + '</div></div>',
                        })
                        .styledmaptype(
                            "light",
                            [{"featureType": "water", "elementType": "geometry", "stylers": [{"color": "#e9e9e9"}, {"lightness": 17}]}, {"featureType": "landscape", "elementType": "geometry", "stylers": [{"color": "#f5f5f5"}, {"lightness": 20}]}, {"featureType": "road.highway", "elementType": "geometry.fill", "stylers": [{"color": "#ffffff"}, {"lightness": 17}]}, {"featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [{"color": "#ffffff"}, {"lightness": 29}, {"weight": 0.2}]}, {"featureType": "road.arterial", "elementType": "geometry", "stylers": [{"color": "#ffffff"}, {"lightness": 18}]}, {"featureType": "road.local", "elementType": "geometry", "stylers": [{"color": "#ffffff"}, {"lightness": 16}]}, {"featureType": "poi", "elementType": "geometry", "stylers": [{"color": "#f5f5f5"}, {"lightness": 21}]}, {"featureType": "poi.park", "elementType": "geometry", "stylers": [{"color": "#dedede"}, {"lightness": 21}]}, {"elementType": "labels.text.stroke", "stylers": [{"visibility": "on"}, {"color": "#ffffff"}, {"lightness": 16}]}, {"elementType": "labels.text.fill", "stylers": [{"saturation": 36}, {"color": "#333333"}, {"lightness": 40}]}, {"elementType": "labels.icon", "stylers": [{"visibility": "off"}]}, {"featureType": "transit", "elementType": "geometry", "stylers": [{"color": "#f2f2f2"}, {"lightness": 19}]}, {"featureType": "administrative", "elementType": "geometry.fill", "stylers": [{"color": "#fefefe"}, {"lightness": 20}]}, {"featureType": "administrative", "elementType": "geometry.stroke", "stylers": [{"color": "#fefefe"}, {"lightness": 17}, {"weight": 1.2}]}],
                        )
                        .styledmaptype(
                            "dark",
                            [{"featureType": "all", "elementType": "labels.text.fill", "stylers": [{"saturation": 36}, {"color": "#000000"}, {"lightness": 40}]}, {"featureType": "all", "elementType": "labels.text.stroke", "stylers": [{"visibility": "on"}, {"color": "#000000"}, {"lightness": 16}]}, {"featureType": "all", "elementType": "labels.icon", "stylers": [{"visibility": "off"}]}, {"featureType": "administrative", "elementType": "geometry.fill", "stylers": [{"color": "#000000"}, {"lightness": 20}]}, {"featureType": "administrative", "elementType": "geometry.stroke", "stylers": [{"color": "#000000"}, {"lightness": 17}, {"weight": 1.2}]}, {"featureType": "landscape", "elementType": "geometry", "stylers": [{"color": "#000000"}, {"lightness": 20}]}, {"featureType": "poi", "elementType": "geometry", "stylers": [{"color": "#000000"}, {"lightness": 21}]}, {"featureType": "road.highway", "elementType": "geometry.fill", "stylers": [{"color": "#000000"}, {"lightness": 17}]}, {"featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [{"color": "#000000"}, {"lightness": 29}, {"weight": 0.2}]}, {"featureType": "road.arterial", "elementType": "geometry", "stylers": [{"color": "#000000"}, {"lightness": 18}]}, {"featureType": "road.local", "elementType": "geometry", "stylers": [{"color": "#000000"}, {"lightness": 16}]}, {"featureType": "transit", "elementType": "geometry", "stylers": [{"color": "#000000"}, {"lightness": 19}]}, {"featureType": "water", "elementType": "geometry", "stylers": [{"color": "#000000"}, {"lightness": 17}]}],
                        )
                        .styledmaptype(
                            "normal",
                        );
                    }catch(e){
                        console.log(e);
                    }
                })
            })
        </script>
        <?php
    }
}}
if( !function_exists('spark_multipurpose_contact_section')){
function spark_multipurpose_contact_section() {

    if (get_theme_mod('spark_multipurpose_contact_section_disable', 'disable') == 'enable') {
        $show_contact_box = get_theme_mod('spark_multipurpose_show_contact_detail', 'enable');
        $contact_class = array('section', 'contact-section');
        $contact_class[] = 'contact-detail-' . esc_attr($show_contact_box);
        ?>
        <section id="contact-section" class="alignfull <?php echo implode(' ', $contact_class); ?>">
            <div class="section-wrap">
                <div class="contact-google-map">
                    <?php spark_multipurpose_contact_map(); ?>
                </div>
                <?php if(!empty( $show_contact_box && $show_contact_box ='enable' ) ){ ?>
                    <div class="container">
                        <div class="inner-section-wrap">
                            <?php spark_multipurpose_contact_content(); ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </section>
        <?php
    }
}
}
add_action('spark_multipurpose_contact', 'spark_multipurpose_contact_section', 30);
 /**
 * Hook -  spark_multipurpose_contact
 *
 * @hooked spark_multipurpose_contact - 30
 */
do_action('spark_multipurpose_contact');
?>
<style>

/** *****
 ** Contact Section ( Google Map, Contact Form and Quick info Social Icon )
*/
#contact-section .section-wrap {
    margin: 0;
}

.section.contact-section {
    padding: 0;
}

.contact-detail-toggle {
    position: absolute;
    height: 50px;
    width: 50px;
    line-height: 50px;
    text-align: center;
    left: 50%;
    margin-left: -25px;
    top: 0;
    background: var(--theme-color);
    color: var(--white-color);
    font-size: 26px;
    cursor: pointer;
    z-index: 9;
    display: flex;
    align-items: center;
    justify-content: center;
}

.contact-detail-toggle i {
    display: block;
    -webkit-transition: all 0.3s ease;
    transition: all 0.3s ease;
}

.contact-detail-toggle.open i {
    -webkit-transform: rotate(-45deg);
    transform: rotate(-45deg);
}

.contact-detail-toggle.closed i {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
}

.contact-content {
    background: var(--white-color);
    display: grid;
    grid-template-columns: 1fr 450px;
    min-height: 400px;
    position: relative;
    -webkit-transition: all 0.3s ease;
    transition: all 0.3s ease;
    opacity: 1;
    visibility: visible;
    -webkit-transform: translateY(0);
    transform: translateY(0);
}

.contact-content.box-hidden {
    opacity: 0;
    visibility: hidden;
    -webkit-transform: translateY(-30px);
    transform: translateY(-30px);
}

.contact-section .section-title {
    margin-bottom: 0;
}

/***
 * Get in Touch Contact Form Style
*/
.contact-form {
    padding: 30px;
}

.contact-form p {
    margin-top: 0;
    line-height: 1.6;
}

.contact-form textarea {
    height: 100px;
    background: none;
    border-top: 0;
    border-left: 0;
    border-right: 0;
    border-bottom: 2px solid var(--border-color);
    padding-left: 0;
    padding-right: 0;
    resize: none;
}

.contact-form input[type="text"],
.contact-form input[type="email"],
.contact-form input[type="url"],
.contact-form input[type="password"],
.contact-form input[type="search"],
.contact-form input[type="number"],
.contact-form input[type="tel"],
.contact-form input[type="range"],
.contact-form input[type="date"],
.contact-form input[type="month"],
.contact-form input[type="week"],
.contact-form input[type="time"],
.contact-form input[type="datetime"],
.contact-form input[type="datetime-local"],
.contact-form input[type="color"] {
    border-top: 0;
    border-left: 0;
    border-right: 0;
    border-bottom: 1px solid var(--light-color);
    background: none;
    width: 100%;
    padding-left: 0;
    padding-right: 0;
}

/**
 * Contact Quick Information
*/
.contact-detail {
    background: var(--theme-color);
    padding: 30px;
}

.contact-detail h3 {
    color: var(--white-color);
    margin-bottom: 25px;
}

.get-touch-contact .get-touch {
    display: inline-flex;
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    align-items: center;
    border-radius: 12px;
    background-color: var(--white-color);
    border-right: 1px solid #f4f4f4;
    box-shadow: 0px 4px 10px #ede9fe;
}

.get-touch-contact .get-touch .get-touch-icon {
    background: var(--white-color);
    border-radius: 100%;
    width: 60px;
    height: 60px;
    line-height: 60px;
    font-size: 35px;
    margin-right: 20px;
    text-align: center;
}

.get-touch-contact .get-touch .get-tuch-info {
    flex: 1;
}

.get-tuch-title {
    font-weight: bold;
}

.get-tuch-info p {
    line-height: 1.3;
    margin: 0;
}

/** Contact Quick Information ( Social Icon ) **/
.contact-social-icon ul {
    display: flex;
    padding: 20px 0;
    justify-content: center;
    list-style: none;
}

.contact-social-icon ul li a {
    height: 40px;
    width: 40px;
    line-height: 40px;
    text-align: center;
    background: var(--white-color);
    display: inline-block;
    border-radius: 50%;
    margin-right: 15px;
    font-size: 18px;
}

.contact-detail-enable #google-map {
    position: absolute;
    overflow: hidden;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
}

#google-map,
#google-map>iframe {
    min-height: 600px;
}

.contact-detail-enable .section-wrap {
    padding: 100px 0;
}

.contact-google-map {
    width: 100%;
}

.window-height #google-map {
    height: 100vh;
}

#google-map>iframe {
    height: 100%;
    width: 100%;
    display: block;
    min-height: 600px;
}

/**
 * Google Map Dots
*/
.animated-dot {
    width: 20px;
    height: 20px;
    left: -9px;
    top: -5px;
    position: relative
}

.animated-dot .middle-dot:after {
    position: absolute;
    left: 50%;
    top: 50%;
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    font-family: "Font Awesome 5 Free";
    content: "\f041";
    font-size: 62px
}

.animated-dot .signal,
.animated-dot .signal2 {
    width: 200px;
    height: 200px;
    pointer-events: none;
    border-radius: 50%;
    position: absolute;
    left: -90px;
    top: -90px;
    opacity: 0;
    -webkit-animation: animationSignal cubic-bezier(0, .55, .55, 1) 2s;
    animation: animationSignal cubic-bezier(0, .55, .55, 1) 2s;
    -webkit-transform-origin: 50% 50%;
    transform-origin: 50% 50%;
    -webkit-animation-fill-mode: forwards;
    animation-fill-mode: forwards;
    -webkit-animation-iteration-count: infinite;
    animation-iteration-count: infinite;
    -webkit-animation-delay: .78s;
    animation-delay: .78s
}

.animated-dot .signal {
    border: 2px solid rgba(0, 0, 0, .2);
    -webkit-box-shadow: inset 0 0 35px 10px rgba(0, 0, 0, .18);
    box-shadow: inset 0 0 35px 10px rgba(0, 0, 0, .18);
    -webkit-animation-delay: .78s;
    animation-delay: .78s
}

.animated-dot .signal2 {
    border: 2px solid #000;
    -webkit-animation-delay: 1s;
    animation-delay: 1s
}

@-webkit-keyframes animationSignal {
    0% {
        opacity: 0;
        -webkit-transform: scale(0);
        transform: scale(0)
    }

    1% {
        opacity: .4
    }

    20% {
        opacity: .4
    }

    60% {
        -webkit-transform: scale(1);
        transform: scale(1);
        opacity: 0
    }
}

@keyframes animationSignal {
    0% {
        opacity: 0;
        -webkit-transform: scale(0);
        transform: scale(0)
    }

    1% {
        opacity: .4
    }

    20% {
        opacity: .4
    }

    60% {
        -webkit-transform: scale(1);
        transform: scale(1);
        opacity: 0
    }
}

@media screen and (max-width: 900px) {
    .contact-content {
        grid-template-columns: 1fr;
    }
}

</style>