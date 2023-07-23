<?php
/**
 * Dynamic css
*/
function spark_multipurpose_css_strip_whitespace($css) {
    $replace = array(
        "#/\*.*?\*/#s" => "", // Strip C style comments.
        "#\s\s+#" => " ", // Strip excess whitespace.
    );
    $search = array_keys($replace);
    $css = preg_replace($search, $replace, $css);

    $replace = array(
        ": " => ":",
        "; " => ";",
        " {" => "{",
        " }" => "}",
        ", " => ",",
        "{ " => "{",
        ";}" => "}", // Strip optional semicolons.
        ",\n" => ",", // Don't wrap multiple selectors.
        "\n}" => "}", // Don't wrap closing braces.
        "} " => "}\n", // Put each rule on it's own line.
    );
    $search = array_keys($replace);
    $css = str_replace($search, $replace, $css);

    // $css = preg_replace("/([0-9]*px(?!;))/", "$1 ", $css);
    return trim($css);
}

function spark_multipurpose_convert_hex_to_rgba($hex){
    list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
    return sprintf('%s, %s, %s', $r, $g, $b);
}

if (! function_exists('spark_multipurpose_dynamic_css')){
	function spark_multipurpose_dynamic_css(){

        $primary_color      = get_theme_mod('spark_multipurpose_primary_color');
        $title_color       = get_theme_mod('content_header_color');
        $link_color         = get_theme_mod('content_link_color');
        $link_hover_color   = get_theme_mod('content_link_hov_color');
        $widget_bg_color    = get_theme_mod('content_widget_background');
        
        $container_width    = get_theme_mod('spark_multipurpose_container_width');
        $sidebar_width      = get_theme_mod('spark_multipurpose_sidebar_width');

        $root = array();
        
        // $px = 70;
		$spark_multipurpose_dynamic = $spark_multipurpose_dynamic_tablet_style = $spark_multipurpose_dynamic_mobile_style = '';
        
        // Theme Primary Background Colors.
        if( $primary_color ){
            $rgb = spark_multipurpose_convert_hex_to_rgba($primary_color);
            $root[] = "--theme-color: {$primary_color};";
            $root[] = "--link-hover-color: {$primary_color};";
            $root[] = "--icon-color: {$primary_color};";
            $root[] = "--theme-rgb-color: {$rgb};";
        }
        
        if( $title_color ){
            $root[] = "--title-color: {$title_color};";
        }
        
        if( $link_color ){
            $root[] = "--link-color: {$link_color};";
        }

        if( $link_hover_color ){
            $root[] = "--link-hover-color: {$link_hover_color};";
        }

        if( $widget_bg_color ){
            $root[] = "--widget-bg-color: {$widget_bg_color};";
        }
        
        if( $container_width ){
            $root[] = "--container-width: {$container_width}%;";
        }

        if( $sidebar_width ){
            $root[] = "--sidebar-width: {$sidebar_width}%;";
        }
        
        $spark_multipurpose_dynamic .= "body{" . implode(';', $root) . "}";
        

        /* Typography CSS */
        $fonts = spark_multipurpose_get_customizer_fonts();
        $font_class = array(
            'body' => 'html, body, button, input, select, textarea',
            'h1' => 'h1',
            'h2' => 'h2',
            'h3' => 'h3',
            'h4' => 'h4',
            'h5' => 'h5',
            'h6' => 'h6',
            'h'    => 'h1, h2, h3, h4, h5, h6'
        );

        foreach ($fonts as $key => $value) {
            $font_css = array();
            $font_family = get_theme_mod($key . '_font_family', $value['font_family']);
            $font_style = get_theme_mod($key . '_font_style', $value['font_style']);
            $text_transform = get_theme_mod($key . '_text_transform', $value['text_transform']);
            $text_decoration = get_theme_mod($key . '_text_decoration', $value['text_decoration']);
            $font_size = get_theme_mod($key . '_font_size', $value['font_size']);
            $line_height = get_theme_mod($key . '_line_height', $value['line_height']);
            $letter_spacing = get_theme_mod($key . '_letter_spacing', $value['letter_spacing']);
            if ($key == 'body') {
                $font_color = get_theme_mod($key . '_color', $value['color']);
            }
            $font_italic = 'normal';

            if (strpos($font_style, 'italic')) {
                $font_italic = 'italic';
            }

            $font_weight = absint($font_style);

            $font_css[] = (!empty($font_family) && $font_family !== 'Default' ) ? "font-family: '{$font_family}', serif" : '';
            $font_css[] = !empty($font_weight) ? "font-weight: {$font_weight}" : '';
            $font_css[] = !empty($font_italic) ? "font-style: {$font_italic}" : '';
            $font_css[] = !empty($text_transform) ? "text-transform: {$text_transform}" : '';
            $font_css[] = !empty($text_decoration) ? "text-decoration: {$text_decoration}" : '';
            $font_css[] = !empty($font_size) ? "font-size: {$font_size}px" : '';
            $font_css[] = !empty($line_height) ? "line-height: {$line_height}" : '';
            $font_css[] = !empty($letter_spacing) ? "letter-spacing: {$letter_spacing}px" : '';
            if ($key == 'body') {
                $font_css[] = !empty($font_color) ? "color: {$font_color}" : '';
            }

            $font_style = implode(';', $font_css);
            
            $spark_multipurpose_dynamic .= "$font_class[$key]{ $font_style }";

            if( $key == 'body'){
                $spark_multipurpose_dynamic .= "body{--body-font: {$font_family} }";
            }
            if( $key == 'h'){
                $spark_multipurpose_dynamic .= "body{--title-font: {$font_family} }";
            }
        }
        

        $common_header_typography = get_theme_mod('common_header_typography', false);

        if ($common_header_typography) {
            $header_font_size = get_theme_mod('h_font_size', 42);
            $font_size = $header_font_size - 10;
            $font_increment = intval($font_size / 6);
            $h2_font_size = $header_font_size - $font_increment;
            $h3_font_size = $header_font_size - $font_increment * 2;
            $h4_font_size = $header_font_size - $font_increment * 3;
            $h5_font_size = $header_font_size - $font_increment * 4;
            $h6_font_size = $header_font_size - $font_increment * 5;

            $spark_multipurpose_dynamic .= "h2{font-size:{$h2_font_size}px}";
            $spark_multipurpose_dynamic .= "h3{font-size:{$h3_font_size}px}";
            $spark_multipurpose_dynamic .= "h4{font-size:{$h4_font_size}px}";
            $spark_multipurpose_dynamic .= "h5{font-size:{$h5_font_size}px}";
            $spark_multipurpose_dynamic .= "h6{font-size:{$h6_font_size}px}";
        }



        /**
         * logo width
         */
        $spark_multipurpose_logo_width = get_theme_mod('spark_multipurpose_logo_width');
        if($spark_multipurpose_logo_width){
            $spark_multipurpose_dynamic .= "
            .site-brandinglogo img {
                width: {$spark_multipurpose_logo_width}%;
            }
            ";         
        }
        $spark_multipurpose_logo_width = get_theme_mod('spark_multipurpose_logo_width_tablet');
        if($spark_multipurpose_logo_width){
            $spark_multipurpose_dynamic_tablet_style .= "
            .site-brandinglogo img {
                width: {$spark_multipurpose_logo_width}%;
            }
            ";         
        }
        $spark_multipurpose_logo_width = get_theme_mod('spark_multipurpose_logo_width_mobile');
        if($spark_multipurpose_logo_width){
            $spark_multipurpose_dynamic_mobile_style .= "
            .site-brandinglogo img {
                width: {$spark_multipurpose_logo_width}%;
            }
            ";         
        }

        $dynamic = '';
        $desktopCss = $tabletCss = $mobileCss = "";
        $value = apply_filters( 'spark_multipurpose_dynamic_css', array('desktop' => $desktopCss, 'tablet' => $tabletCss, 'mobile' => $mobileCss) );
       
        
        $dynamic .= $spark_multipurpose_dynamic;
        $dynamic .= $value['desktop'];
        
        $spark_multipurpose_dynamic_tablet_style .= $value['tablet'];
        $spark_multipurpose_dynamic_mobile_style .= $value['mobile'];
        
        $dynamic .= "@media screen and (max-width:768px){ $spark_multipurpose_dynamic_tablet_style }";
        $dynamic .= "@media screen and (max-width:480px){ $spark_multipurpose_dynamic_mobile_style }";

        
        wp_add_inline_style( 'spark-multipurpose-style', spark_multipurpose_css_strip_whitespace( $dynamic ) );
	}
}
add_action( 'wp_enqueue_scripts', 'spark_multipurpose_dynamic_css', 999 );


if( !function_exists('spark_multipurpose_section_dynamic')){
    function spark_multipurpose_section_dynamic(){
        $spark_multipurpose_dynamic = $spark_multipurpose_dynamic_tablet_style = $spark_multipurpose_dynamic_mobile_style = '';
        /**
         * common section color
         */
        $home_sections = get_spark_multipurpose_common_customizer_section();
        
        foreach($home_sections as $sectionname){

            $sectionclass = '#' . $sectionname . '-section';
            
            $super_title_color = get_theme_mod("spark_multipurpose_{$sectionname}_super_title_color");
            $title_color = get_theme_mod("spark_multipurpose_{$sectionname}_title_color");
            $text_color = get_theme_mod("spark_multipurpose_{$sectionname}_text_color");
            $link_color = get_theme_mod("spark_multipurpose_{$sectionname}_link_color");
            $link_hover_color = get_theme_mod("spark_multipurpose_{$sectionname}_link_hov_color");
            
            if ($super_title_color) {
                $spark_multipurpose_dynamic .= ".{$sectionname}-section .super-title{color:$super_title_color}";

                $spark_multipurpose_dynamic .= ".{$sectionname}-section .super-title:before{
                    background-image: -webkit-gradient(linear, right top, left top, from($super_title_color), color-stop(130%, transparent));
                    background-image: -o-linear-gradient(right, $super_title_color), transparent 130%);
                    background-image: linear-gradient(to left, $super_title_color), transparent 130%);
                }";

                $spark_multipurpose_dynamic .= ".{$sectionname}-section .super-title:after{
                    background-image: -webkit-gradient(linear, left top, right top, from($super_title_color), color-stop(130%, transparent));
                    background-image: -o-linear-gradient(left, $super_title_color, transparent 130%);
                    background-image: linear-gradient(to right, $super_title_color, transparent 130%);
                }";
            }
            if ($title_color) {
                $spark_multipurpose_dynamic .= ".{$sectionname}-section .section-title{color:$title_color}";
            }

            if ($text_color) {
                $spark_multipurpose_dynamic .= ".{$sectionname}-section .section-wrap .inner-section-wrap{color:$text_color}";
            }

            if( $link_color ){
                $spark_multipurpose_dynamic .= ".{$sectionname}-section a, .{$sectionname}-section a > i{color:$link_color}";
            }

            if( $link_hover_color ){
                $spark_multipurpose_dynamic .= ".{$sectionname}-section a:hover, .{$sectionname}-section a:hover > i{color:$link_hover_color}";
            }
            
            $sectionbgtype = get_theme_mod('spark_multipurpose_' . $sectionname . '_bg_type', 'color-bg');
            $sectionbgimage = get_theme_mod('spark_multipurpose_' . $sectionname . '_bg_image_url');    
            $sectionbgimage_repeat = get_theme_mod('spark_multipurpose_' . $sectionname . '_bg_image_repeat', 'no-repeat');
            $sectionbgimage_size = get_theme_mod('spark_multipurpose_' . $sectionname . '_bg_image_size', 'cover');
            $sectionbgimage_position = get_theme_mod('spark_multipurpose_' . $sectionname . '_bg_position', 'center center');
            $sectionbgimage_position = str_replace('-', ' ', $sectionbgimage_position);
            $sectionbgimage_attach = get_theme_mod('spark_multipurpose_' . $sectionname . '_bg_image_attach', 'fixed');
            $sectionbgoverlay = get_theme_mod('spark_multipurpose_' . $sectionname . '_overlay_color');
            $sectionalignitem = get_theme_mod('spark_multipurpose_' . $sectionname . '_align_item', 'top');
            
            $top_seperator_height = get_theme_mod('spark_multipurpose_' . $sectionname . '_ts_height_desktop', 60);
            $bottom_seperator_height = get_theme_mod('spark_multipurpose_' . $sectionname . '_bs_height_desktop', 60);
            
            $top_seperator_height_tablet = get_theme_mod('spark_multipurpose_' . $sectionname . '_ts_height_tablet');
            $bottom_seperator_height_tablet = get_theme_mod('spark_multipurpose_' . $sectionname . '_bs_height_tablet');
            
            $top_seperator_height_mobile = get_theme_mod('spark_multipurpose_' . $sectionname . '_ts_height_mobile');
            $bottom_seperator_height_mobile = get_theme_mod('spark_multipurpose_' . $sectionname . '_bs_height_mobile');
            
            $section_seperator = get_theme_mod("spark_multipurpose_{$sectionname}_section_seperator");
            $top_seperator_color = get_theme_mod("spark_multipurpose_{$sectionname}_ts_color", '#FF0000');
            $bottom_seperator_color = get_theme_mod("spark_multipurpose_{$sectionname}_bs_color", '#FF0000');

            $css = $css1 = array();
            if ($sectionbgtype == 'color-bg' || $sectionbgtype == 'image-bg') {
                $sectionbgcolor = get_theme_mod('spark_multipurpose_' . $sectionname . '_bg_color');
                $css[] = "background-color: $sectionbgcolor";
            }

            if ($sectionbgtype == 'image-bg' && !empty($sectionbgimage)) {

                $css[] = "background-image: url($sectionbgimage)";
                $css[] = "background-size: {$sectionbgimage_size}";
                $css[] = "background-position: {$sectionbgimage_position}";
                $css[] = "background-attachment: {$sectionbgimage_attach}";
                $css[] = "background-repeat: {$sectionbgimage_repeat}";
                
                if (!empty($sectionbgoverlay)) {
                    $css1[] = "background-color: $sectionbgoverlay";
                }
            } elseif ($sectionbgtype == 'video-bg') {
                if (!empty($sectionbgoverlay)) {
                    $css1[] = "background-color: $sectionbgoverlay";
                }
            } elseif ($sectionbgtype == 'gradient-bg') {
                $sectiongradientcolor = get_theme_mod('spark_multipurpose_' . $sectionname . '_bg_gradient');
                $css[] = "$sectiongradientcolor";
            }

            
            $spark_multipurpose_dynamic .= "$sectionclass{" . implode(';', $css) . "}";
            
            if( $css1 ){
                $spark_multipurpose_dynamic .= "$sectionclass::before{" . implode(';', $css1) . "}";
            }

            /***********
             * Section Spperator
            */
            if (!empty($top_seperator_height)) {
                $spark_multipurpose_dynamic .= "$sectionclass .section-seperator.top-section-seperator{height: {$top_seperator_height}px}";
            }
            if (!empty($bottom_seperator_height)) {
                $spark_multipurpose_dynamic .= "$sectionclass .section-seperator.bottom-section-seperator{height: {$bottom_seperator_height}px}";
            }
            if (!empty($top_seperator_height_tablet)) {
                $spark_multipurpose_dynamic_tablet_style .= "$sectionclass .section-seperator.top-section-seperator{height: {$top_seperator_height_tablet}px}";
            }
            if (!empty($bottom_seperator_height_tablet)) {
                $spark_multipurpose_dynamic_tablet_style .= "$sectionclass .section-seperator.bottom-section-seperator{height: {$bottom_seperator_height_tablet}px}";
            }
            if (!empty($top_seperator_height_mobile)) {
                $spark_multipurpose_dynamic_mobile_style .= "$sectionclass .section-seperator.top-section-seperator{height: {$top_seperator_height_mobile}px}";
            }
            if (!empty($bottom_seperator_height_mobile)) {
                $spark_multipurpose_dynamic_mobile_style .= "$sectionclass .section-seperator.bottom-section-seperator{height: {$bottom_seperator_height_mobile}px}";
            }
            if ($section_seperator == 'top' || $section_seperator == 'top-bottom') {
                $spark_multipurpose_dynamic .= ".{$sectionname}-section .top-section-seperator svg{ fill:$top_seperator_color }";
            }
            if ($section_seperator == 'bottom' || $section_seperator == 'top-bottom') {
                $spark_multipurpose_dynamic .= ".{$sectionname}-section .bottom-section-seperator svg{ fill:$bottom_seperator_color }";
            }

            
            /**
             * Section Padding
             */
            $css = $tab_css = $mobile_css = array();
            $section_padding = get_theme_mod("spark_multipurpose_{$sectionname}_padding");
            $section_padding = json_decode( $section_padding, true );
            
            if( $section_padding ){
                $padding = get_dynamic_padding_value($section_padding);
                $css[] = $padding['desktop'];
                $tab_css[]= $padding['tablet'];
                $mobile_css []= $padding['mobile'];
            }
            $spark_multipurpose_dynamic .= "$sectionclass{" . implode(';', $css) . "}";
            
            if( count($tab_css) > 0){
                $spark_multipurpose_dynamic_tablet_style .= "$sectionclass{" . implode(';', $tab_css) . "}";
            }

            if( count( $mobile_css ) > 0 ){
                $spark_multipurpose_dynamic_mobile_style .= "$sectionclass{" . implode(';', $mobile_css) . "}";
            }

            /***********
             * Container Backgound
            */
            $css = $tab_css = $mobile_css = array();

            $container_bg_type = get_theme_mod("spark_multipurpose_{$sectionname}_content_bg_type", "none");

            if( $container_bg_type == 'color-bg'){
                $color = get_theme_mod("spark_multipurpose_{$sectionname}_content_bg_color");
                if( $color ){
                    $css[] = "background-color:" . $color . ";";
                }

            }else if( $container_bg_type == 'gradient-bg'){

                $color = get_theme_mod("spark_multipurpose_{$sectionname}_content_bg_gradient");
                $cg = array();
                if( $color ) {
                    $cg[] = "$color";
                    $css[] = implode(';', $cg);
                }
            } 
            /**
            * border-radius
            */
            $section_radius = get_theme_mod("spark_multipurpose_{$sectionname}_content_radius");
            $section_radius = json_decode( $section_radius, true );
            if( $section_radius ){
                $padding = get_dynamic_radius_value($section_radius);
                $css[] = $padding['desktop'];
                $tab_css[]= $padding['tablet'];
                $mobile_css [] = $padding['mobile'];
            }

            /**
             * padding
             */
            $container_padding = get_theme_mod("spark_multipurpose_{$sectionname}_content_padding");
            $container_padding = json_decode( $container_padding, true );
            if( $container_padding ){
                $padding = get_dynamic_padding_value($container_padding);
                $css[] = $padding['desktop'];
                $tab_css[]= $padding['tablet'];
                $mobile_css[] = $padding['mobile'];
            }

            /**
             * margin
             */
            $container_margin = get_theme_mod("spark_multipurpose_{$sectionname}_content_margin");
            $container_margin = json_decode( $container_margin, true );
            
            if( $container_margin ){
                $padding = get_dynamic_margin_value($container_margin);
                $css[] = $padding['desktop'];
                $tab_css[] = $padding['tablet'];
                $mobile_css[]= $padding['mobile'];
            }
            
            $spark_multipurpose_dynamic .= "$sectionclass .section-wrap{" . implode(';', $css) . "}";
            
            if( count( $tab_css ) > 0 ){
                $spark_multipurpose_dynamic_tablet_style .= "$sectionclass .section-wrap{" . implode(';', $tab_css) . "}";
            }

            if( count( $mobile_css ) > 0 ){
                $spark_multipurpose_dynamic_tablet_style .= "$sectionclass .section-wrap{" . implode(';', $mobile_css) . "}";
            }
        }

        /*********
         * Contact Section
         */
        $contact = spark_multipurpose_contact_dynamic_css();
        if( isset( $contact['desktop'] )){
            $spark_multipurpose_dynamic .= $contact['desktop'];
        }

        if( isset( $contact['tablet'])){
            $spark_multipurpose_dynamic_tablet_style .= $contact['tablet'];
        }

        if( isset( $contact['mobile'])){
            $spark_multipurpose_dynamic_mobile_style .= $contact['mobile'];
        }

        /*********
         * Call To Action
         */
        $calltoaction = spark_multipurpose_dynamic_calltoaction_css();
        if( isset( $calltoaction['desktop'] )){
            $spark_multipurpose_dynamic .= $calltoaction['desktop'];
        }
        if( isset( $calltoaction['tablet'] )){
            $spark_multipurpose_dynamic_tablet_style .= $calltoaction['tablet'];
        }
        if( isset( $calltoaction['mobile'] )){
            $spark_multipurpose_dynamic_mobile_style .= $calltoaction['mobile'];
        }

        /*********
         * Top Header 
        */
        $header = spark_multipurpose_dynamic_top_header_css();
        if( isset( $header['desktop'] )){
            $spark_multipurpose_dynamic .= $header['desktop'];
        }
        
        if( isset( $header['tablet'] )){
            $spark_multipurpose_dynamic_tablet_style .= $header['tablet'];
        }
        if( isset( $header['mobile'] )){
            $spark_multipurpose_dynamic_mobile_style .= $header['mobile'];
        }

        /*********
         * Header Social ( Not Fixed)
        */
        $header = spark_multipurpose_dynamic_header_social_links_css();
        if( isset( $header['desktop'] )){
            $spark_multipurpose_dynamic .= $header['desktop'];
        }
        
        if( isset( $header['tablet'] )){
            $spark_multipurpose_dynamic_tablet_style .= $header['tablet'];
        }

        if( isset( $header['mobile'] )){
            $spark_multipurpose_dynamic_mobile_style .= $header['mobile'];
        }

        /********
         * Main Header  ( Not Fixed)
        */
        $header = spark_multipurpose_dynamic_header_css();
        if( isset( $header['desktop'] )){
            $spark_multipurpose_dynamic .= $header['desktop'];
        }

        if( isset( $header['tablet'] )){
            $spark_multipurpose_dynamic_tablet_style .= $header['tablet'];
        }

        if( isset( $header['mobile'] )){
            $spark_multipurpose_dynamic_mobile_style .= $header['mobile'];
        }
        
        /*********
         * Quick Info 
        */
        $header = spark_multipurpose_dynamic_header_quick_info_css();
       if( isset( $header['desktop'] )){
            $spark_multipurpose_dynamic .= $header['desktop'];
        }

        if( isset( $header['tablet'] )){
            $spark_multipurpose_dynamic_tablet_style .= $header['tablet'];
        }

        if( isset( $header['mobile'] )){
            $spark_multipurpose_dynamic_mobile_style .= $header['mobile'];
        }
        
        /********
         * Header Button 
        */
        $header = spark_multipurpose_dynamic_header_button_css();
        if( isset( $header['desktop'] )){
            $spark_multipurpose_dynamic .= $header['desktop'];
        }

        if( isset( $header['tablet'] )){
            $spark_multipurpose_dynamic_tablet_style .= $header['tablet'];
        }

        if( isset( $header['mobile'] )){
            $spark_multipurpose_dynamic_mobile_style .= $header['mobile'];
        }

        
        /**********
         * Header Menu Style
        */
        $header = spark_multipurpose_dynamic_header_nav_css();
        if( isset( $header['desktop'] )){
            $spark_multipurpose_dynamic .= $header['desktop'];
        }

        if( isset( $header['tablet'] )){
            $spark_multipurpose_dynamic_tablet_style .= $header['tablet'];
        }

        if( isset( $header['mobile'] )){
            $spark_multipurpose_dynamic_mobile_style .= $header['mobile'];
        }

        /**** Sub Menu Item */
        $header = spark_multipurpose_dynamic_header_nav_sub_menu_css();
        if( isset( $header['desktop'] )){
            $spark_multipurpose_dynamic .= $header['desktop'];
        }

        if( isset( $header['tablet'] )){
            $spark_multipurpose_dynamic_tablet_style .= $header['tablet'];
        }

        if( isset( $header['mobile'] )){
            $spark_multipurpose_dynamic_mobile_style .= $header['mobile'];
        }

        /**** Active Menu Item */
        $header = spark_multipurpose_dynamic_header_nav_active_menu_css();
        if( isset( $header['desktop'] )){
            $spark_multipurpose_dynamic .= $header['desktop'];
        }

        if( isset( $header['tablet'] )){
            $spark_multipurpose_dynamic_tablet_style .= $header['tablet'];
        }

        if( isset( $header['mobile'] )){
            $spark_multipurpose_dynamic_mobile_style .= $header['mobile'];
        }

        /** slider */
        $header = spark_multipurpose_dynamic_slider_css();
        
        if( isset( $header['desktop'] )){
            $spark_multipurpose_dynamic .= $header['desktop'];
        }

        if( isset( $header['tablet'] )){
            $spark_multipurpose_dynamic_tablet_style .= $header['tablet'];
        }

        if( isset( $header['mobile'] )){
            $spark_multipurpose_dynamic_mobile_style .= $header['mobile'];
        }

        /**** About Us Section */
        $aboutus = spark_multipurpose_dynamic_aboutus_css();
        if( isset( $aboutus['desktop'] )){
            $spark_multipurpose_dynamic .= $aboutus['desktop'];
        }

        if( isset( $aboutus['tablet'] )){
            $spark_multipurpose_dynamic_tablet_style .= $aboutus['tablet'];
        }

        if( isset( $aboutus['mobile'] )){
            $spark_multipurpose_dynamic_mobile_style .= $aboutus['mobile'];
        }

        
        $header = spark_multipurpose_dynamic_slider_seprator_css();
        if( isset( $header['desktop'] )){
            $spark_multipurpose_dynamic .= $header['desktop'];
        }

        if( isset( $header['tablet'] )){
            $spark_multipurpose_dynamic_tablet_style .= $header['tablet'];
        }

        if( isset( $header['mobile'] )){
            $spark_multipurpose_dynamic_mobile_style .= $header['mobile'];
        }


        /** promo service */
        $header = spark_multipurpose_promoservice_dynamic_css();
        if( isset( $header['desktop'] )){
            $spark_multipurpose_dynamic .= $header['desktop'];
        }

        if( isset( $header['tablet'] )){
            $spark_multipurpose_dynamic_tablet_style .= $header['tablet'];
        }

        if( isset( $header['mobile'] )){
            $spark_multipurpose_dynamic_mobile_style .= $header['mobile'];
        }

        /** client logo */
        $client = spark_multipurpose_client_dynamic_css();
        if( isset( $client['desktop'] )){
            $spark_multipurpose_dynamic .= $client['desktop'];
        }

        if( isset( $client['tablet'] )){
            $spark_multipurpose_dynamic_tablet_style .= $client['tablet'];
        }

        if( isset( $client['mobile'] )){
            $spark_multipurpose_dynamic_mobile_style .= $client['mobile'];
        }

        
        /** counter */
        $header = spark_multipurpose_counter_dynamic_css();
        if( isset( $header['desktop'] )){
            $spark_multipurpose_dynamic .= $header['desktop'];
        }

        if( isset( $header['tablet'] )){
            $spark_multipurpose_dynamic_tablet_style .= $header['tablet'];
        }

        if( isset( $header['mobile'] )){
            $spark_multipurpose_dynamic_mobile_style .= $header['mobile'];
        }


        
        /** team */
        $header = spark_multipurpose_team_dynamic_css();
        if( isset( $header['desktop'] )){
            $spark_multipurpose_dynamic .= $header['desktop'];
        }

        if( isset( $header['tablet'] )){
            $spark_multipurpose_dynamic_tablet_style .= $header['tablet'];
        }

        if( isset( $header['mobile'] )){
            $spark_multipurpose_dynamic_mobile_style .= $header['mobile'];
        }

        /** footer */
        $header = spark_multipurpose_dynamic_footer_css();
        if( isset( $header['desktop'] )){
            $spark_multipurpose_dynamic .= $header['desktop'];
        }

        if( isset( $header['tablet'] )){
            $spark_multipurpose_dynamic_tablet_style .= $header['tablet'];
        }

        if( isset( $header['mobile'] )){
            $spark_multipurpose_dynamic_mobile_style .= $header['mobile'];
        }
        

        /** breadcrumb */
        $header = spark_multipurpose_dynamic_breadcrub_css();
        if( isset( $header['desktop'] )){
            $spark_multipurpose_dynamic .= $header['desktop'];
        }

        if( isset( $header['tablet'] )){
            $spark_multipurpose_dynamic_tablet_style .= $header['tablet'];
        }

        if( isset( $header['mobile'] )){
            $spark_multipurpose_dynamic_mobile_style .= $header['mobile'];
        }

         /** Back To Up Button */
         $buttonw_arrow = spark_multipurpose_contact_back_to_top_arrow();
         if( isset( $buttonw_arrow['desktop'] )){
            $spark_multipurpose_dynamic .= $buttonw_arrow['desktop'];
        }

        if( isset( $buttonw_arrow['tablet'] )){
            $spark_multipurpose_dynamic_tablet_style .= $buttonw_arrow['tablet'];
        }

        if( isset( $buttonw_arrow['mobile'] )){
            $spark_multipurpose_dynamic_mobile_style .= $buttonw_arrow['mobile'];
        }
        

        $dynamic = '';
        $desktopCss = $tabletCss = $mobileCss = "";
        $value = apply_filters( 'spark_multipurpose_dynamic_footer_css', array('desktop' => $desktopCss, 'tablet' => $tabletCss, 'mobile' => $mobileCss) );
       
        
        $dynamic .= $spark_multipurpose_dynamic;
        $dynamic .= $value['desktop'];
        
        $spark_multipurpose_dynamic_tablet_style .= $value['tablet'];
        $spark_multipurpose_dynamic_mobile_style .= $value['mobile'];
        
        $dynamic .= "@media screen and (max-width:768px){ $spark_multipurpose_dynamic_tablet_style }";
        $dynamic .= "@media screen and (max-width:480px){ $spark_multipurpose_dynamic_mobile_style }";
        
        
        return $dynamic;
    }
}

add_action('wp_footer', 'spark_multipurpose_dynamic_footer_css_register', 100);

function spark_multipurpose_dynamic_footer_css_register()
{
 echo "<style>";
    echo spark_multipurpose_css_strip_whitespace( spark_multipurpose_section_dynamic() );
 echo "</style>";
}