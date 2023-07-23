<?php

function get_dynamic_padding_value($padding){
    $css = $tab_css = $mobile_css = '';
    // desktop padding
    $padding_desktop = spark_multipurpose_cssbox_values_inline( $padding, 'desktop' );
    if ( strpos( $padding_desktop, 'px' ) !== false ) {
        $css .= 'padding:' . $padding_desktop . ';';
    }
    // tablet padding
    $padding_desktop = spark_multipurpose_cssbox_values_inline( $padding, 'tablet' );
    if ( strpos( $padding_desktop, 'px' ) !== false ) {
        $tab_css .= 'padding:' . $padding_desktop . ';';
    }
    // mobile padding
    $padding_desktop = spark_multipurpose_cssbox_values_inline( $padding, 'mobile' );
    if ( strpos( $padding_desktop, 'px' ) !== false ) {
        $mobile_css .= 'padding:' . $padding_desktop . ';';
    }

    return ['desktop' => $css, 'tablet' => $tab_css, 'mobile' => $mobile_css];

}

function get_dynamic_margin_value($margin){
    $css = $tab_css = $mobile_css = '';
    // desktop margin
    $margin_desktop = spark_multipurpose_cssbox_values_inline( $margin, 'desktop' );
    if ( strpos( $margin_desktop, 'px' ) !== false ) {
        $css .= 'margin:' . $margin_desktop . ';';
    }
    // tablet margin
    $margin_desktop = spark_multipurpose_cssbox_values_inline( $margin, 'tablet' );
    if ( strpos( $margin_desktop, 'px' ) !== false ) {
        $tab_css .= 'margin:' . $margin_desktop . ';';
    }
    // mobile margin
    $margin_desktop = spark_multipurpose_cssbox_values_inline( $margin, 'mobile' );
    if ( strpos( $margin_desktop, 'px' ) !== false ) {
        $mobile_css .= 'margin:' . $margin_desktop . ';';
    }

    return ['desktop' => $css, 'tablet' => $tab_css, 'mobile' => $mobile_css];

}

function get_dynamic_radius_value($radius){
    $css = $tab_css = $mobile_css = '';

    $radius_desktop = spark_multipurpose_cssbox_values_inline( $radius, 'desktop' );
    if ( strpos( $radius_desktop, 'px' ) !== false ) {
        $css .= 'border-radius:' . $radius_desktop . ';';
    }
    // tablet radius
    $radius_desktop = spark_multipurpose_cssbox_values_inline( $radius, 'tablet' );
    if ( strpos( $radius_desktop, 'px' ) !== false ) {
        $tab_css .= 'border-radius:' . $radius_desktop . ';';
    }
    // mobile radius
    $radius_desktop = spark_multipurpose_cssbox_values_inline( $radius, 'mobile' );
    if ( strpos( $radius_desktop, 'px' ) !== false ) {
        $mobile_css .= 'border-radius:' . $radius_desktop . ';';
    }

    return ['desktop' => $css, 'tablet' => $tab_css, 'mobile' => $mobile_css];

}

function merge_two_arra($array1, $array2){

    $desktop = $array1['desktop'] . $array2['desktop'];
    $tablet  = $array1['tablet'] . $array2['tablet'];
    $mobile  = $array1['mobile'] . $array2['mobile'];

    return array(
        'desktop' => $desktop,
        'tablet' => $tablet,
        'mobile' => $mobile
    );

}

function get_dynamic_css_return_val( $wrapper, $desktop, $tablet, $mobile, $className){
    $dynamicCss = $tabletCss = $mobileCss = '';
    if( $wrapper && is_array($wrapper)){
            $dynamicCss = $wrapper['desktop'];
            $tabletCss = $wrapper['tablet'];
            $mobileCss = $wrapper['mobile'];
    }
    if( $desktop ){
        $dynamicCss .="{$className} {
            {$desktop}
        }";
    }
    if( $tablet ){
        $tabletCss .= "{$className} {
            {$tablet}
        }";
    }

    if($mobile ) {
        $mobileCss .= "{$className} {
            {$mobile}
        }";
    }


    // echo $dynamic_css; exit;
    return array(
        'desktop' => $dynamicCss,
        'tablet' => $tabletCss,
        'mobile' => $mobileCss
    );
    
}

function spark_multipurpose_dynamic_top_header_css( ) {
    

    $bg     = get_theme_mod('spark_multipurpose_th_bg_color');
    $color  = get_theme_mod('spark_multipurpose_th_text_color');
    $anchor = get_theme_mod('spark_multipurpose_th_anchor_color');
    
    $css = $tab_css = $mobile_css = "";
    
    
    if( $bg ){
        $css .= "background-color: {$bg};";
    }
    if( $color ){
        $css .= "color: {$color};";
    }

    
    // Padding
    $padding = get_theme_mod('spark_multipurpose_th_content_padding');
    $padding = json_decode( $padding, true );
    $padding = get_dynamic_padding_value($padding);
    
    $css.= $padding['desktop'];
    $tab_css.= $padding['tablet'];
    $mobile_css.= $padding['mobile'];
    
    // Margin
    $margin = get_theme_mod('spark_multipurpose_th_content_margin');
    $margin = json_decode( $margin, true );
    $margin = get_dynamic_margin_value($margin);
    
    $css.= $margin['desktop'];
    $tab_css.= $margin['tablet'];
    $mobile_css.= $margin['mobile'];

    // radius
    $radius = get_theme_mod('spark_multipurpose_th_content_radius');
    $radius = json_decode( $radius, true );
    $radius = get_dynamic_radius_value($radius);
    
    $css.= $radius['desktop'];
    $tab_css.= $radius['tablet'];
    $mobile_css.= $radius['mobile'];


    $css1 = get_dynamic_css_return_val('', $css, $tab_css, $mobile_css, '.top-menu-bar');


    $css2 = array(
        'desktop' => '',
        'tablet' => '',
        'mobile' => '',
    );

    if( $anchor ){
        $css2['desktop'] .=".top-menu-bar a{ color: {$anchor} !important;}";
    }

    return merge_two_arra($css1, $css2);
    
}

function spark_multipurpose_dynamic_header_css( ){

    $css = $tab_css = $mobile_css = "";
    
    // Padding
    $padding = get_theme_mod('spark_multipurpose_header_margin_padding');
    $margin_padding = json_decode( $padding, true );

    if( $margin_padding && is_array($margin_padding) ){
        $padding = get_dynamic_padding_value($margin_padding['padding']);
        $css.= $padding['desktop'];
        $tab_css.= $padding['tablet'];
        $mobile_css.= $padding['mobile'];

        // margin
        $margin = get_dynamic_margin_value($margin_padding['margin']);
        $css.= $margin['desktop'];
        $tab_css.= $margin['tablet'];
        $mobile_css.= $margin['mobile'];

        // margin
        $radius = get_dynamic_radius_value($margin_padding['radius']);
        $css.= $radius['desktop'];
        $tab_css.= $radius['tablet'];
        $mobile_css.= $radius['mobile'];
    }


    // bg type
    $bg_type = get_theme_mod("spark_multipurpose_header_bg_type", "color-bg");
    if( $bg_type == 'image-bg'){
        $bg_image = get_theme_mod('spark_multipurpose_header_background_image');
        $bg_color = get_theme_mod('spark_multipurpose_header_bg_color', '#f2f4f6');
        if ( $bg_image ) {
            $css .= ' 
                background-image: url("' . esc_url( $bg_image ) . '"); 
                background-repeat: '. get_theme_mod('spark_multipurpose_header_background_image_repeat', 'no-repeat').'; 
                background-position: '. get_theme_mod('spark_multipurpose_header_background_image_position', 'center center').'; 
                background-size: '. get_theme_mod('spark_multipurpose_header_background_image_size', 'cover').';
                background-color: '. $bg_color. ';
                background-attachment: '. get_theme_mod('spark_multipurpose_header_background_image_attach', 'fixed'). ';
            ';
        }
    }else if( $bg_type == 'color-bg'){
        $color = get_theme_mod("spark_multipurpose_header_bg_color");
        if( $color ){
            $css .= "background-color:" . $color . ";";
        }
    }else if( $bg_type == 'gradient-bg'){
        $color = get_theme_mod("spark_multipurpose_header_bg_gradient");
        $cg = array();
        if( $color ) {
            $cg[] = "$color";
            $css .= implode(';', $cg);
        }
        
    }

    return get_dynamic_css_return_val('', $css, $tab_css, $mobile_css, '.nav-classic');    
}

function spark_multipurpose_dynamic_header_button_css(  ){

    $css = $tab_css = $mobile_css = "";
    
    // Padding
    $nav = get_theme_mod('spark_multipurpose_header_button_color');
    $nav = json_decode( $nav, true );
    if( isset($nav['padding'])){
        $padding = get_dynamic_padding_value($nav['padding']);
        $css.= $padding['desktop'];
        $tab_css.= $padding['tablet'];
        $mobile_css.= $padding['mobile'];
    }

    if( isset($nav['margin'])){
        // margin
        $margin = get_dynamic_margin_value($nav['margin']);
        $css.= $margin['desktop'];
        $tab_css.= $margin['tablet'];
        $mobile_css.= $margin['mobile'];
    }

    if( isset($nav['radius'])){
        // radius
        $radius = get_dynamic_radius_value($nav['radius']);
        $css.= $radius['desktop'];
        $tab_css.= $radius['tablet'];
        $mobile_css.= $radius['mobile'];
    }

    if( isset( $nav['background'] ) && $nav['background'] ){
        $css .="background-color: {$nav['background']};";
    }
    if( isset( $nav['text'] ) && $nav['text'] ){
        $css .="color: {$nav['text']};";
    }
    if( isset( $nav['font-size'] ) && $nav['font-size'] ){
        $css .="font-size: {$nav['font-size']}px;";
    }

    if( isset( $nav['width'] ) && $nav['width'] ){
        $css .="width: {$nav['width']}px;";
    }

    $css1= get_dynamic_css_return_val('', $css, $tab_css, $mobile_css, '.spark-multipurpose-header-button');


    $css2 = array(
        'desktop' => '',
        'tablet' => '',
        'mobile' => '',
    );
    $nav = get_theme_mod('spark_multipurpose_header_button_hover_color');

    $nav = json_decode( $nav, true );
    if( ( isset( $nav['background'] ) && $nav['background'] ) || ( isset( $nav['text'] ) && $nav['text'] )  ){
        $css2['desktop'] = ".spark-multipurpose-header-button:hover{
            background-color: {$nav['background']};
            color: {$nav['text']};
        }";
    }
    
    return merge_two_arra($css1, $css2);

}

function spark_multipurpose_dynamic_header_quick_info_css(  ){

    $css = $tab_css = $mobile_css = "";
    $icon = get_theme_mod('spark_multipurpose_quick_info_icon_color');
    
    if( $icon ){
        $css .="color: {$icon};";
    }
    
    $css1= get_dynamic_css_return_val('', $css, $tab_css, $mobile_css, '.nav-classic .contact-info .quickcontact .get-tuch i');
    

    $css = $tab_css = $mobile_css = "";

    $color = get_theme_mod('spark_multipurpose_quick_info_color');
    if( $color ){
        $css .="color: {$color};";
    }    
    
    $css2 = array(
        'desktop' => '',
        'tablet' => '',
        'mobile' => '',
    );
    
    if( $css ){
        $css2['desktop'] = ".nav-classic .contact-info .quickcontact .get-tuch .quickcontactwrap{ $css }";
    }
    
    return merge_two_arra($css1, $css2);


}

function spark_multipurpose_dynamic_header_nav_css(  ){

    $css = $css1 = $tab_css = $mobile_css = "";
    $nav = get_theme_mod('spark_multipurpose_header_item_group');
    $nav = json_decode( $nav, true );

    if( $nav && is_array($nav) ){
        $padding = get_dynamic_padding_value($nav['padding']);
        $css.= $padding['desktop'];
        $tab_css.= $padding['tablet'];
        $mobile_css.= $padding['mobile'];

        // margin
        $margin = get_dynamic_margin_value($nav['margin']);
        $css.= $margin['desktop'];
        $tab_css.= $margin['tablet'];
        $mobile_css.= $margin['mobile'];

        // Radius
        $radius = get_dynamic_radius_value($nav['radius']);
        $css.= $radius['desktop'];
        $tab_css.= $radius['tablet'];
        $mobile_css.= $radius['mobile'];
    

        if( $nav['bg_color']){
            $css.= "background-color:{$nav['bg_color']};";
        }
        if( $nav['color']){
            $css.= "color:{$nav['color']};";
        } 
    }
    
    $css1 = get_dynamic_css_return_val('', $css, $tab_css, $mobile_css, '.box-header-nav .main-menu .page_item a, .box-header-nav .main-menu>.menu-item>a');   
    
    $css2 = array(
        'desktop' => '',
        'tablet' => '',
        'mobile' => '',
    );
    $navwrap = get_theme_mod('spark_multipurpose_header_nav_wrap_bg_color');
    if( !empty( $navwrap ) ){
        $css2['desktop'] = ".nav-classic .nav-menu, .headertwo .nav-classic .nav-menu{background-color: {$navwrap};}";
    }

    return merge_two_arra($css1, $css2);
}

function spark_multipurpose_dynamic_header_nav_sub_menu_css(  ){

    // Bg Color, Color, Margin, Padding Radius 
    $css = $css1 = $css2 = $css3 = $tab_css = $mobile_css = "";

    $nav = get_theme_mod('spark_multipurpose_header_sub_item_group');
    $nav = json_decode( $nav, true );

    if( $nav && is_array($nav) ){
        $padding = get_dynamic_padding_value($nav['padding']);
        $css.= $padding['desktop'];
        $tab_css.= $padding['tablet'];
        $mobile_css.= $padding['mobile'];

        // margin
        $margin = get_dynamic_margin_value($nav['margin']);
        $css.= $margin['desktop'];
        $tab_css.= $margin['tablet'];
        $mobile_css.= $margin['mobile'];

        // Radius
        $radius = get_dynamic_radius_value($nav['radius']);
        $css.= $radius['desktop'];
        $tab_css.= $radius['tablet'];
        $mobile_css.= $radius['mobile'];
    
        if( $nav['color']){
            $css.= "color:{$nav['color']};";
        }   
    }

    $css1 = get_dynamic_css_return_val('', $css, $tab_css, $mobile_css, '.box-header-nav .main-menu .children>.page_item>a, .box-header-nav .main-menu .sub-menu>.menu-item>a'); 

    if( $nav && is_array($nav) ){
        if( $nav['bg_color']){
            $css2 .= "background-color:{$nav['bg_color']};";
        }
    }
    $css3 = get_dynamic_css_return_val('', $css2, $tab_css, $mobile_css, '.box-header-nav .main-menu .children, .box-header-nav .main-menu .sub-menu'); 

    return merge_two_arra($css1, $css3);
}

function spark_multipurpose_dynamic_header_nav_active_menu_css(  ){

    // Bg Color, Color, Margin, Padding Radius 
    $css = $css1 = $tab_css = $mobile_css = "";

    $nav = get_theme_mod('spark_multipurpose_header_nav_hover_group');
    $nav = json_decode( $nav, true );

    if( $nav && is_array($nav) ){

        if( $nav['nav_bg_color']){
            $css.= "background-color:{$nav['nav_bg_color']};";
        }
        if( $nav['nav_color']){
            $css.= "color:{$nav['nav_color']};";
        }
        $css1 = get_dynamic_css_return_val('', $css, $tab_css, $mobile_css, '.box-header-nav .main-menu .page_item.current_page_item>a, .box-header-nav .main-menu .page_item:hover>a, .box-header-nav .main-menu .page_item.focus>a, .box-header-nav .main-menu>.menu-item.current-menu-item>a, .box-header-nav .main-menu>.menu-item:hover>a, .box-header-nav .main-menu>.menu-item.focus>a, .box-header-nav .main-menu .children>.page_item:hover>a, .box-header-nav .main-menu .children>.page_item.focus>a, .box-header-nav .main-menu .sub-menu>.menu-item:hover>a, .box-header-nav .main-menu .sub-menu>.menu-item.focus>a, .headertwo .box-header-nav .main-menu .page_item.current_page_item>a, .headertwo .box-header-nav .main-menu>.menu-item.current-menu-item>a, .headertwo .box-header-nav .main-menu .page_item:hover>a, .headertwo .box-header-nav .main-menu .page_item.focus>a, .headertwo .box-header-nav .main-menu>.menu-item:hover>a, .headertwo .box-header-nav .main-menu>.menu-item.focus>a');    
    }

    return $css1;
}



function spark_multipurpose_dynamic_header_social_links_css( ){

    $css = $tab_css = $mobile_css = "";
    $icon_color  = get_theme_mod('spark_multipurpose_social_icon_color');
    $icon_bg = get_theme_mod('spark_multipurpose_social_icon_bg_color');
    
    if( $icon_color ){
        $css .="color: {$icon_color};";
    }

    if( $icon_bg ){
        $css .="background-color: {$icon_bg};";
    }
    
    $css1= get_dynamic_css_return_val('', $css, $tab_css, $mobile_css, '.top-bar-menu ul.sp_socialicon li a i');
    

    $css = $tab_css = $mobile_css = "";

    $hover_color = get_theme_mod('spark_multipurpose_social_icon_hover_color');
    $hover_bg = get_theme_mod( 'spark_multipurpose_social_icon_hover_bg_color' );

    if( $hover_color ){
        $css .="color: {$hover_color};";
    }

    if( $hover_bg ){
        $css .="background-color: {$hover_bg};";
    }
    

    $css2= get_dynamic_css_return_val('', $css, $tab_css, $mobile_css, '.top-bar-menu ul.sp_socialicon li:hover a i');
    
    return merge_two_arra($css1, $css2);


}

/**
 * Slider Section
 */
function spark_multipurpose_dynamic_slider_css(){

    $css = $tab_css = $mobile_css = "";

    /***** Padding */
    $padding = get_theme_mod('spark_multipurpose_slider_padding');
    if( $padding ){
        $padding = json_decode( $padding, true );
        $padding = get_dynamic_padding_value($padding);
        $css.= $padding['desktop'];
        $tab_css.= $padding['tablet'];
        $mobile_css.= $padding['mobile'];
    }
    $css1 = get_dynamic_css_return_val('', $css, $tab_css, $mobile_css, '.banner-slider .slider-item .slider-content');    
    
    /***** Margin */
    $margin = get_theme_mod('spark_multipurpose_slider_margin');
    if( $margin ){
        $margin = json_decode( $margin, true );
        $margin = get_dynamic_margin_value($margin);
        $css.= $margin['desktop'];
        $tab_css.= $margin['tablet'];
        $mobile_css.= $margin['mobile'];
    }
    $css1 = get_dynamic_css_return_val('', $css, $tab_css, $mobile_css, '.banner-slider .slider-item .slider-content');   

    /*****Radius */
    $css = $tab_css = $mobile_css = "";
    $radius = get_theme_mod('spark_multipurpose_slider_caption_radius');
    if( $radius ){
        $radius = json_decode( $radius, true );
        $radius = get_dynamic_radius_value($radius);
        $css.= $radius['desktop'];
        $tab_css.= $radius['tablet'];
        $mobile_css.= $radius['mobile'];
    }
    $css2 = get_dynamic_css_return_val('', $css, $tab_css, $mobile_css, '.banner-slider .slider-item .slider-content');    

    $css1 = merge_two_arra($css1, $css2);

    /** title font size */
    $css = $tab_css = $mobile_css = "";
    $font_size = get_theme_mod('spark_multipurpose_caption_title_font_size');
    $tablet_font_size = get_theme_mod('spark_multipurpose_caption_title_font_size_tablet');
    $mobile_font_size = get_theme_mod('spark_multipurpose_caption_title_font_size_mobile');
    
    if( $font_size ){
        $css.= ".banner-slider .slider-item .slider-content .maintitle{font-size: {$font_size}px}";
    }

    if( $tablet_font_size ){
        $tab_css.= ".banner-slider .slider-item .slider-content .maintitle{font-size: {$tablet_font_size}px}";
    }

    if( $mobile_font_size ){
        $mobile_css.= ".banner-slider .slider-item .slider-content .maintitle{font-size: {$mobile_font_size}px}";
    }

    $css2 = array(
        'desktop' => $css,
        'tablet' => $tab_css,
        'mobile' => $mobile_css
    );

    $css1 = merge_two_arra($css1, $css2);


    /** desc font size */
    $css = $tab_css = $mobile_css = "";
    $font_size = get_theme_mod('spark_multipurpose_caption_desc_font_size');
    $tablet_font_size = get_theme_mod('spark_multipurpose_caption_desc_font_size_tablet');
    $mobile_font_size = get_theme_mod('spark_multipurpose_caption_desc_font_size_mobile');
    
    if( $font_size ){
        $css.= ".banner-slider .slider-item .slider-content .maincontent p{font-size: {$font_size}px}";
    }

    if( $tablet_font_size ){
        $tab_css.= ".banner-slider .slider-item .slider-content .maincontent p{font-size: {$tablet_font_size}px}";
    }

    if( $mobile_font_size ){
        $mobile_css.= ".banner-slider .slider-item .slider-content .maincontent p{font-size: {$mobile_font_size}px}";
    }

    $css2 = array(
        'desktop' => $css,
        'tablet' => $tab_css,
        'mobile' => $mobile_css
    );

    $css1 = merge_two_arra($css1, $css2);


    /** slider height */
    $css = $tab_css = $mobile_css = "";
    $height = get_theme_mod('spark_multipurpose_slider_height');
    $tablet_height = get_theme_mod('spark_multipurpose_slider_height_tablet');
    $mobile_height = get_theme_mod('spark_multipurpose_slider_height_mobile');
    
    if( $height ){
        $css.= ".video-banner, .banner-slider .slider-item{height: {$height}vh}";
    }

    if( $tablet_height ){
        $tab_css.= ".video-banner, .banner-slider .slider-item{height: {$tablet_height}vh}";
    }

    if( $mobile_height ){
        $mobile_css.= ".video-banner, .banner-slider .slider-item{height: {$mobile_height}vh}";
    }

    $css2 = array(
        'desktop' => $css,
        'tablet' => $tab_css,
        'mobile' => $mobile_css
    );

    $css1 = merge_two_arra($css1, $css2);

    $css = $tab_css = $mobile_css = "";
    $overlay  = get_theme_mod('spark_multipurpose_banner_overlay_color');
    $caption  = get_theme_mod('spark_multipurpose_banner_caption_overlay_color');
    
    if($overlay){
        $css .=".banner-slider .slider-item:before{background: {$overlay};}";
    }

    if( $caption ){
        $css .=".banner-slider .slider-item .slider-content{background: {$caption};}";
    }

    $supertitle  = get_theme_mod('spark_multipurpose_slider_supertitle_color');
    $title  = get_theme_mod('spark_multipurpose_slider_title_color');
    $desc  = get_theme_mod('spark_multipurpose_slider_desc_color');
    if( $supertitle ){
        $css .=".banner-slider .slider-item .slider-content .supertitle{color: {$supertitle};}";
    }
    if( $title ){
        $css .=".banner-slider .slider-item .slider-content .maintitle{color: {$title};}";
    }
    if( $desc ){
        $css .=".banner-slider .slider-item .slider-content p{color: {$desc};}";
    }

    $css2 = array(
        'desktop' => $css,
        'tablet' => $tab_css,
        'mobile' => $mobile_css
    );

    return merge_two_arra($css1, $css2);
}

function spark_multipurpose_dynamic_slider_seprator_css(){
    $css = $tab_css = $mobile_css = "";

    $slider_bottom_seperator = get_theme_mod("spark_multipurpose_slider_bottom_seperator", 'bottom');
    $slider_bottom_seperator_color = get_theme_mod("spark_multipurpose_slider_bs_color", '#e42032');
    $spark_multipurpose_slider_bs_height = get_theme_mod("spark_multipurpose_slider_bs_height", 60);
    $spark_multipurpose_slider_bs_height_tablet = get_theme_mod("spark_multipurpose_slider_bs_height_tablet","40");
    $spark_multipurpose_slider_bs_height_mobile = get_theme_mod("spark_multipurpose_slider_bs_height_mobile","20");
    if ($slider_bottom_seperator != 'none') {
        $css .= ".banner-slider .bottom-section-seperator svg{ fill: {$slider_bottom_seperator_color}; }";
        $css .= ".banner-slider .bottom-section-seperator{ height:{$spark_multipurpose_slider_bs_height}px; }";
        if (!empty($spark_multipurpose_slider_bs_height_tablet)) {
            $tab_css .= ".banner-slider .bottom-section-seperator{ height:{$spark_multipurpose_slider_bs_height_tablet}px; }";
        }
        if (!empty($spark_multipurpose_slider_bs_height_mobile)) {
            $mobile_css .= ".banner-slider .bottom-section-seperator{ height:{$spark_multipurpose_slider_bs_height_mobile}px; }";
        }
    }

    $css2 = array(
        'desktop' => $css,
        'tablet' => $tab_css,
        'mobile' => $mobile_css
    );
    
    return $css2;
    
}

/****
 * About Us Section
 */
function spark_multipurpose_dynamic_aboutus_css(){

    $css = $tab_css = $mobile_css = "";
    $aboutus_super_title_color  = get_theme_mod('spark_multipurpose_aboutus_super_title_color');
    
    if( $aboutus_super_title_color ){
        $css .="color: {$aboutus_super_title_color};";
    }
    $css1= get_dynamic_css_return_val('', $css, $tab_css, $mobile_css, '.about-wrapper .aboutsuper-title');
    

    $css = $tab_css = $mobile_css = "";

    $aboutus_link = get_theme_mod('spark_multipurpose_aboutus_link_color');

    if( $aboutus_link ){
        $css .="color: {$aboutus_link};";
    }
    $css2= get_dynamic_css_return_val('', $css, $tab_css, $mobile_css, '.achivement-items ul li .timer-icon, ul.check-circle li:before, ul.check-square li:before');
    
    return merge_two_arra($css1, $css2);
}

/** promo service Block & Block Item Icon */
function spark_multipurpose_promoservice_dynamic_css(){

    $css = $tab_css = $mobile_css = "";

    $padding = get_theme_mod('spark_multipurpose_promoservice_icon_style');
    $val = json_decode( $padding, true );

    if( isset( $val['padding'] ) ){
        $padding = get_dynamic_padding_value($val['padding']);
        $css.= $padding['desktop'];
        $tab_css.= $padding['tablet'];
        $mobile_css.= $padding['mobile'];
    }

    if( isset( $val['radius'] ) ){
        $radius = get_dynamic_radius_value($val['radius']);
        $css.= $radius['desktop'];
        $tab_css.= $radius['tablet'];
        $mobile_css.= $radius['mobile'];
    }

    if( isset( $val['bg_color'] ) ){
        $css .= "background-color: {$val['bg_color']};";
    }

    if( isset( $val['color'] ) ){
        $css .= "color: {$val['color']};";
    }
    
    if( isset( $val['borderwidth'] )){
        $css .= "border:solid {$val['borderwidth']}px {$val['bordercolor']};";
    }
    $css1 = get_dynamic_css_return_val('', $css, $tab_css, $mobile_css, '.promoservice-wrap .feature-list .icon-box');    


    $css = $tab_css = $mobile_css = "";
    $padding = get_theme_mod('spark_multipurpose_promo_service_block');
    $val = json_decode( $padding, true );

    if( isset( $val['padding'] ) ){
        $padding = get_dynamic_padding_value($val['padding']);
        $css.= $padding['desktop'];
        $tab_css.= $padding['tablet'];
        $mobile_css.= $padding['mobile'];
    }

    if( isset( $val['radius'] ) ){
        $radius = get_dynamic_radius_value($val['radius']);
        $css.= $radius['desktop'];
        $tab_css.= $radius['tablet'];
        $mobile_css.= $radius['mobile'];
    }
    
    if( isset( $val['margin'] ) ){
        $margin = get_dynamic_margin_value($val['margin']);
        $css.= $margin['desktop'];
        $tab_css.= $margin['tablet'];
        $mobile_css.= $margin['mobile'];
    }
    $css2 = get_dynamic_css_return_val('', $css, $tab_css, $mobile_css, '.promoservice-wrap .feature-list');    

    $css1 =  merge_two_arra($css1, $css2);

    $css = $tab_css = $mobile_css = "";
    $padding = get_theme_mod('spark_multipurpose_promo_service_image_style');
    $val = json_decode( $padding, true );

    if( isset( $val['padding'] ) ){
        $padding = get_dynamic_padding_value($val['padding']);
        $css.= $padding['desktop'];
        $tab_css.= $padding['tablet'];
        $mobile_css.= $padding['mobile'];
    }

    if( isset( $val['radius'] ) ){
        $radius = get_dynamic_radius_value($val['radius']);
        $css.= $radius['desktop'];
        $tab_css.= $radius['tablet'];
        $mobile_css.= $radius['mobile'];
    }

    if( isset( $val['height'] ) ){
        $css .= "height: {$val['height']}px;";
    }

    $css2 = get_dynamic_css_return_val('', $css, $tab_css, $mobile_css, '.promoservice-wrap .feature-list .box figure img');    

    return merge_two_arra($css1, $css2);

}


/** Client Block & Block Item */
function spark_multipurpose_client_dynamic_css(){
    $css = $tab_css = $mobile_css = "";

    $padding = get_theme_mod('spark_multipurpose_client_block_group');
    $val = json_decode( $padding, true );
    
    $css .= "display: flex;";
    $css .= "align-items: center;";
    $css .= "justify-content: center;";
    if( isset( $val['padding'] ) ){
        $padding = get_dynamic_padding_value($val['padding']);
        $css.= $padding['desktop'];
        $tab_css.= $padding['tablet'];
        $mobile_css.= $padding['mobile'];
    }

    if( isset( $val['margin'] ) ){
        $margin = get_dynamic_margin_value($val['margin']);
        $css.= $margin['desktop'];
        $tab_css.= $margin['tablet'];
        $mobile_css.= $margin['mobile'];
    }

    if( isset( $val['radius'] ) ){
        $radius = get_dynamic_radius_value($val['radius']);
        $css.= $radius['desktop'];
        $tab_css.= $radius['tablet'];
        $mobile_css.= $radius['mobile'];
    }

    if( isset( $val['bg_color'] ) ){
        $css .= "background-color: {$val['bg_color']};";
    }

    if( isset( $val['borderwidth'] )){
        $css .= "border:solid {$val['borderwidth']}px {$val['bordercolor']};";
    }

    $css1 = get_dynamic_css_return_val('', $css, $tab_css, $mobile_css, '.client_logo .item');    


    $css = $tab_css = $mobile_css = "";
    $padding = get_theme_mod('spark_multipurpose_client_block_item_group');
    $val = json_decode( $padding, true );

    if( isset( $val['padding'] ) ){
        $padding = get_dynamic_padding_value($val['padding']);
        $css.= $padding['desktop'];
        $tab_css.= $padding['tablet'];
        $mobile_css.= $padding['mobile'];
    }

    if( isset( $val['radius'] ) ){
        $radius = get_dynamic_radius_value($val['radius']);
        $css.= $radius['desktop'];
        $tab_css.= $radius['tablet'];
        $mobile_css.= $radius['mobile'];
    }

    if( isset( $val['bg_color'] ) ){
        $css .= "background-color: {$val['bg_color']};";
    }

    if( isset( $val['borderwidth'] )){
        $css .= "border:solid {$val['borderwidth']}px {$val['bordercolor']};";
    }
    
    $css2 = get_dynamic_css_return_val('', $css, $tab_css, $mobile_css, '.client_logo .item .logo');    

    return merge_two_arra($css1, $css2);

}

/** counter section */
function spark_multipurpose_counter_dynamic_css(){

    $css = $tab_css = $mobile_css = "";
    $group = get_theme_mod('spark_multipurpose_counter_icon_style');
    $val = json_decode( $group, true );

    if( isset( $val['padding'] ) ){
        $padding = get_dynamic_padding_value($val['padding']);
        $css.= $padding['desktop'];
        $tab_css.= $padding['tablet'];
        $mobile_css.= $padding['mobile'];
    }

    if( isset( $val['radius'] ) ){
        $radius = get_dynamic_radius_value($val['radius']);
        $css.= $radius['desktop'];
        $tab_css.= $radius['tablet'];
        $mobile_css.= $radius['mobile'];
    }

    if( isset( $val['bg_color'] ) ){
        $css .= "background-color: {$val['bg_color']};";
    }
    
    if( isset( $val['color'] )){
        $css .= "color: {$val['color']};";
    }

    if( isset( $val['borderwidth'] ) && !empty( $val['borderwidth'] )){
        $css .= "border:{$val['borderwidth']}px solid {$val['bordercolor']};";
    }
    $css1 = get_dynamic_css_return_val('', $css, $tab_css, $mobile_css, '.counter-section .achivement-items ul li .timer-icon');
    

    $css = $tab_css = $mobile_css = "";
    $group = get_theme_mod('spark_multipurpose_counter_group_style');
    $val = json_decode( $group, true );
    
    if( isset( $val['padding'] ) ){
        $padding = get_dynamic_padding_value($val['padding']);
        $css.= $padding['desktop'];
        $tab_css.= $padding['tablet'];
        $mobile_css.= $padding['mobile'];
    }

    if( isset( $val['radius'] ) ){
        $radius = get_dynamic_radius_value($val['radius']);
        $css.= $radius['desktop'];
        $tab_css.= $radius['tablet'];
        $mobile_css.= $radius['mobile'];
    }

    if( isset( $val['bg_color'] ) ){
        $css .= "background-color: {$val['bg_color']};";
    }
    
    if( isset( $val['color'] )){
        $css .= "color: {$val['color']};";
    }

    if( isset( $val['borderwidth'] ) && !empty( $val['borderwidth'] )){
        $css .= "border:{$val['borderwidth']}px solid {$val['bordercolor']};";
    }
    $css2 = get_dynamic_css_return_val('', $css, $tab_css, $mobile_css, '.counter-section .achivement-items ul li');
    
    return merge_two_arra($css1, $css2);
    
    
}

/** Team Section Style */
function spark_multipurpose_team_dynamic_css(){
    $css = $tab_css = $mobile_css = "";

    $group = get_theme_mod('spark_multipurpose_team_image_style');
    $val = json_decode( $group, true );
    
    if( isset( $val['padding'] ) ){
        $padding = get_dynamic_padding_value($val['padding']);
        $css.= $padding['desktop'];
        $tab_css.= $padding['tablet'];
        $mobile_css.= $padding['mobile'];
    }

    if( isset( $val['radius'] ) ){
        $radius = get_dynamic_radius_value($val['radius']);
        $css.= $radius['desktop'];
        $tab_css.= $radius['tablet'];
        $mobile_css.= $radius['mobile'];
    }

    if( isset( $val['bg_color'] ) && $val['bg_color'] ){
        $css .= "background-color: {$val['bg_color']};";
    }
    
    if( isset( $val['width'] ) && $val['width'] ){
        $css .= "width: {$val['width']}px;";
    }

    if( isset( $val['height'] ) && $val['height'] ){
        $css .= "height: {$val['height']}px;";
    }
    
    if( isset( $val['margintop'] ) &&  $val['margintop'] ){
        $css .= "margin-top: {$val['margintop']}px;";
    }
    $css1 = get_dynamic_css_return_val('', $css, $tab_css, $mobile_css, '.team-section .box figure img, .team-section.style2 .box figure img');
    

    $css = $tab_css = $mobile_css = "";
    $group = get_theme_mod('spark_multipurpose_team_grid_style');
    $val = json_decode( $group, true );

    if( isset( $val['padding'] ) ){
        $padding = get_dynamic_padding_value($val['padding']);
        $css.= $padding['desktop'];
        $tab_css.= $padding['tablet'];
        $mobile_css.= $padding['mobile'];
    }

    if( isset( $val['margin'] ) ){
        $margin = get_dynamic_margin_value($val['margin']);
        $css.= $margin['desktop'];
        $tab_css.= $margin['tablet'];
        $mobile_css.= $margin['mobile'];
    }

    if( isset( $val['radius'] ) ){
        $radius = get_dynamic_radius_value($val['radius']);
        $css.= $radius['desktop'];
        $tab_css.= $radius['tablet'];
        $mobile_css.= $radius['mobile'];
    }

    if( isset( $val['bg_color'] ) ){
        $css .= "background-color: {$val['bg_color']};";
    }
    
    if( isset( $val['color'] )){
        $css .= "color: {$val['color']};";
    }

    if( isset( $val['borderwidth'] )){
        $css .= "border:{$val['borderwidth']}px solid {$val['bordercolor']};";
    }
    $css2 = get_dynamic_css_return_val('', $css, $tab_css, $mobile_css, '.team-section .box, .team-section.style2 .box');
    

    return merge_two_arra($css1, $css2);
  
}

/***** Call To Action */
function spark_multipurpose_dynamic_calltoaction_css(){
    
    $css = $tab_css = $mobile_css = "";
    $title_font_size = get_theme_mod('spark_multipurpose_cta_title_font_size');
    if( $title_font_size ){
        $css.= "font-size: {$title_font_size}px;";
    }
    $css1 = get_dynamic_css_return_val('', $css, $tab_css, $mobile_css, '.calltoaction-section .section-title');

    $css = $tab_css = $mobile_css = "";
    $desc_font_size = get_theme_mod('spark_multipurpose_cta_desc_font_size');
    if( $desc_font_size ){
        $css.= "font-size: {$desc_font_size}px;";
    }
    $css2 = get_dynamic_css_return_val('', $css, $tab_css, $mobile_css, '.calltoaction_promo_wrapper .calltoaction_full_widget_content .calltoaction_subtitle');

    $css1 = merge_two_arra($css1, $css2);

    $css = $tab_css = $mobile_css = "";
    $group = get_theme_mod('spark_multipurpose_calltoaction_image_style');
    $val = json_decode( $group, true );
    if( isset( $val['padding'] ) ){
        $padding = get_dynamic_padding_value($val['padding']);
        $css.= $padding['desktop'];
        $tab_css.= $padding['tablet'];
        $mobile_css.= $padding['mobile'];
    }

    if( isset( $val['margin'] ) ){
        $margin = get_dynamic_margin_value($val['margin']);
        $css.= $margin['desktop'];
        $tab_css.= $margin['tablet'];
        $mobile_css.= $margin['mobile'];
    }

    if( isset( $val['radius'] ) ){
        $radius = get_dynamic_radius_value($val['radius']);
        $css.= $radius['desktop'];
        $tab_css.= $radius['tablet'];
        $mobile_css.= $radius['mobile'];
    }

    if( isset( $val['bg_color'] ) ){
        $css .= "background-color: {$val['bg_color']};";
        $css .= "position: relative;";
        $css .= "z-index: 9;";
    }

    if( isset( $val['height'] )){
        $css .= "height: {$val['height']}px;";
    }
    $css2 = get_dynamic_css_return_val('', $css, $tab_css, $mobile_css, '.calltoaction-section .cat-image-wrap img');
    
    return merge_two_arra($css1, $css2);
}

/*********
 * Contact Section
 */
function spark_multipurpose_contact_dynamic_css(){
    $css = $tab_css = $mobile_css = "";

    $button_bg = get_theme_mod('spark_multipurpose_contact_social_button_bg_color');
    $button = get_theme_mod('spark_multipurpose_contact_social_button_text_color');
    $bg = get_theme_mod('spark_multipurpose_contact_info_bg_color');
    $css .= ".contact-detail{
        background: {$bg};
    }
    
    .contact-social-icon ul li a{
        background: {$button_bg};
        color: {$button};
    }
    
    ";
    
    $css1 = array(
        'desktop' => $css,
        'mobile' => '',
        'tablet' => ''
    );
    
    return $css1;
 
}


/** Back to Up Button Arrow */
function spark_multipurpose_contact_back_to_top_arrow(){

    $css = $tab_css = $mobile_css = "";

    $arrow_bg_color = get_theme_mod('spark_multipurpose_backtotop_bg_color');
    $arrow_text_color = get_theme_mod('spark_multipurpose_backtotop_text_color');
    
    if( $arrow_bg_color ){
        $css .= "#back-to-top{ background-color: {$arrow_bg_color}; }";
    }
    
    if( $arrow_text_color ){
        $css .= ".arrow-top{ color: {$arrow_text_color}; }";
        $css .= ".arrow-top-line{ background-color: {$arrow_text_color}; }";
        $css .= "#back-to-top svg.progress-circle path{ stroke: {$arrow_text_color}; }";
    }

    $css1 = array(
        'desktop' => $css,
        'mobile' => '',
        'tablet' => ''
    );
    
    return $css1;
 
}


if( !function_exists('spark_multipurpose_dynamic_footer_css')){
    function spark_multipurpose_dynamic_footer_css(  ){
        $css = $tab_css = $mobile_css = "";

        $css = $css1 = array();
        $sectionname = "footer";
        $sectionclass = ".site-footer";
        $sectionbgtype = get_theme_mod('spark_multipurpose_footer_bg_type', 'color-bg');
        if ($sectionbgtype == 'color-bg' || $sectionbgtype == 'image-bg') {
            $sectionbgcolor = get_theme_mod('spark_multipurpose_' . $sectionname . '_bg_color');
            $css[] = "background-color: $sectionbgcolor";
        }
        if ($sectionbgtype == 'image-bg') {
            $sectionbgimage = get_theme_mod('spark_multipurpose_' . $sectionname . '_bg_image_url');
            if( $sectionbgimage ):
                $sectionbgimage_repeat = get_theme_mod('spark_multipurpose_' . $sectionname . '_bg_image_repeat', 'no-repeat');
                $sectionbgimage_size = get_theme_mod('spark_multipurpose_' . $sectionname . '_bg_image_size', 'cover');
                $sectionbgimage_position = get_theme_mod('spark_multipurpose_' . $sectionname . '_bg_position', 'center center');
                $sectionbgimage_position = str_replace('-', ' ', $sectionbgimage_position);
                $sectionbgimage_attach = get_theme_mod('spark_multipurpose_' . $sectionname . '_bg_image_attach', 'fixed');
                

                $css[] = "background-image: url($sectionbgimage)";
                $css[] = "background-size: {$sectionbgimage_size}";
                $css[] = "background-position: {$sectionbgimage_position}";
                $css[] = "background-attachment: {$sectionbgimage_attach}";
                $css[] = "background-repeat: {$sectionbgimage_repeat}";

            endif;
        } elseif ($sectionbgtype == 'video-bg') {
            
        } elseif ($sectionbgtype == 'gradient-bg') {
            $sectiongradientcolor = get_theme_mod('spark_multipurpose_' . $sectionname . '_bg_gradient');
            $css[] = "$sectiongradientcolor";
        }

        $margin = get_theme_mod('spark_multipurpose_footer_margin');
        $margin = json_decode( $margin, true );
        $margin = get_dynamic_margin_value($margin);
        if( isset($margin['desktop'])){
            $css[] = $margin['desktop'];
        }

        $padding = get_theme_mod('spark_multipurpose_footer_padding');
        $padding = json_decode( $padding, true );
        $padding = get_dynamic_padding_value($padding);
        if( isset($padding['desktop'])){
            $css[] = $padding['desktop'];
        }

        // $tab_css.= $padding['tablet'];
        // $mobile_css.= $padding['mobile'];
        
        $css = "$sectionclass{" . implode(';', $css) . "}";
        $css .= "$sectionclass::before{" . implode(';', $css1) . "}";

        $foo = '';
        $top_seperator_color = get_theme_mod("spark_multipurpose_{$sectionname}_ts_color", '#15171b');
        $top_seperator_height = get_theme_mod('spark_multipurpose_' . $sectionname . '_ts_height_desktop', 80);
        $top_seperator_height_tablet = get_theme_mod('spark_multipurpose_' . $sectionname . '_ts_height_tablet');
        $top_seperator_height_mobile = get_theme_mod('spark_multipurpose_' . $sectionname . '_ts_height_mobile');
        
        if( $top_seperator_color ){
            $css .= ".footer-seprator .section-seperator svg{fill: {$top_seperator_color}}";
        }
        if (!empty($top_seperator_height)) {
            $css .= ".footer-seprator .section-seperator.bottom-section-seperator{height: {$top_seperator_height}px}";
        }
        if (!empty($top_seperator_height_tablet)) {
            $tab_css .= ".footer-seprator .section-seperator.bottom-section-seperator{height: {$top_seperator_height_tablet}px}";
        }
        if (!empty($top_seperator_height_mobile)) {
            $mobile_css .= ".footer-seprator .section-seperator.bottom-section-seperator{height: {$top_seperator_height_mobile}px}";
        }
    
        $css1 = array(
            'desktop' => $css,
            'mobile' => $tab_css,
            'tablet' => $mobile_css
        );
        
        return $css1;
    }
}

if(!function_exists('spark_multipurpose_dynamic_breadcrub_css')){
    function spark_multipurpose_dynamic_breadcrub_css(){
     
        $css = $tab_css = $mobile_css = "";

        $padding = get_theme_mod('spark_multipurpose_titlebar_padding');
        $padding = json_decode( $padding, true );
        
        if( isset( $padding ) ){
            $padding = get_dynamic_padding_value($padding);
            $css.= $padding['desktop'];
            $tab_css.= $padding['tablet'];
            $mobile_css.= $padding['mobile'];
        }

        $margin = get_theme_mod('spark_multipurpose_titlebar_content_margin');
        $margin = json_decode( $margin, true );
        
        if( isset( $margin ) ){
            $margin = get_dynamic_margin_value($margin);
            $css.= $margin['desktop'];
            $tab_css.= $margin['tablet'];
            $mobile_css.= $margin['mobile'];
        }

        $sectionbgtype = get_theme_mod('spark_multipurpose_titlebar_bg_type', 'color-bg');
        $sectionbgoverlay = '';
        $css1 = array();
        if ($sectionbgtype == 'color-bg' || $sectionbgtype == 'image-bg') {
            $sectionbgcolor = get_theme_mod('spark_multipurpose_titlebar_bg_color');
            $css .= "background-color: $sectionbgcolor;";
        }
        if ($sectionbgtype == 'image-bg') {
            $sectionbgimage = get_theme_mod('spark_multipurpose_titlebar_bg_image_url');
            if( $sectionbgimage) {    
                $sectionbgimage_repeat = get_theme_mod('spark_multipurpose_titlebar_bg_image_repeat', 'no-repeat');
                $sectionbgimage_size = get_theme_mod('spark_multipurpose_titlebar_bg_image_size', 'cover');
                $sectionbgimage_position = get_theme_mod('spark_multipurpose_titlebar_bg_position', 'center center');
                $sectionbgimage_position = str_replace('-', ' ', $sectionbgimage_position);
                $sectionbgimage_attach = get_theme_mod('spark_multipurpose_titlebar_bg_image_attach', 'fixed');
                $sectionbgoverlay = get_theme_mod('spark_multipurpose_titlebar_overlay_color');
                
                $css .= "background-image: url($sectionbgimage);";
                $css .= "background-size: {$sectionbgimage_size};";
                $css .= "background-position: {$sectionbgimage_position};";
                $css .= "background-attachment: {$sectionbgimage_attach};";
                $css .= "background-repeat: {$sectionbgimage_repeat};";
            }
            if (!empty($sectionbgoverlay)) {
                $css1[] = "background-color: $sectionbgoverlay";
            }
        } elseif ($sectionbgtype == 'video-bg') {
            $sectionbgoverlay = get_theme_mod('spark_multipurpose_titlebar_overlay_color');
            if (!empty($sectionbgoverlay)) {
                $css1[] = "background-color: $sectionbgoverlay;";
            }
        } elseif ($sectionbgtype == 'gradient-bg') {
            $sectiongradientcolor = get_theme_mod('spark_multipurpose_titlebar_bg_gradient');
            $css .= "$sectiongradientcolor";
        }

        // overlay
        $overlay = ".breadcrumb-section::before{" . implode(';', $css1) . "}";
        $css2 = array(
            'desktop' =>  $overlay,
            'mobile' => '',
            'tablet' => ''
        );
        
        $css1 = get_dynamic_css_return_val('', $css, $tab_css, $mobile_css, '.breadcrumb-section');
        
        return merge_two_arra($css2, $css1);
        
    }
}