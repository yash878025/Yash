<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 */
if ( ! function_exists( 'spark_multipurpose_section_title' ) ){
    /**
     * Section Main Title
     *
     * @since 1.0.0
     */
    function spark_multipurpose_section_title($super_title, $title, $titlestyle=null ) { 
        if( !empty( $super_title ) || !empty( $title ) ){ ?>
            <div class="section-title-wrapper <?php echo esc_attr($titlestyle); ?>" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
                <?php if( !empty( $super_title ) ){ ?>
                    <span class="super-title"><?php echo esc_html( $super_title ); ?></span>
                <?php } if( !empty( $title ) ){ ?>
                    <h2 class="section-title"><?php echo esc_html( $title ); ?></h2>
                <?php } ?>
            </div>
        <?php }
    }
}

if ( ! function_exists( 'spark_multipurpose_post_meta' ) ){
    /**
     * Post Meta Function
     *
     * @since 1.0.0
     */
    function spark_multipurpose_post_meta() { 
        $postdate    = get_theme_mod( 'spark_multipurpose_post_date_options', 'enable' );
        $postcomment = get_theme_mod( 'spark_multipurpose_post_comments_options', 'enable' );
        $postauthor  = get_theme_mod( 'spark_multipurpose_post_author_options', 'enable' );
        $read_time  = get_theme_mod( 'spark_multipurpose_post_reading_time', 'enable' );
        if( $postdate == 'enable' || $postcomment == 'enable' || $postauthor == 'enable' || $read_time == 'enable'):
      ?>
        <div class="entry-meta info">
            <?php
                if( !empty( $postdate ) && $postdate == 'enable' ) { spark_multipurpose_posted_on(); }
                if( !empty( $postauthor ) && $postauthor == 'enable' ) { spark_multipurpose_posted_by(); }
                if( !empty( $postcomment ) && $postcomment == 'enable' ) { spark_multipurpose_comments(); }
                if( !empty( $read_time ) && $read_time == 'enable' ) { echo spark_multipurpose_estimated_reading_time(); }
            ?>
        </div><!-- .entry-meta -->
       <?php
       endif;
    }
}
add_action( 'spark_multipurpose_post_meta', 'spark_multipurpose_post_meta' , 10 );

if( ! function_exists( 'spark_multipurpose_post_format_media' ) ) :
    /**
     * Posts format declaration function.
     *
     * @since 1.0.0
     */
    function spark_multipurpose_post_format_media( $postformat ) {
        if( is_singular( ) ){
          $imagesize = 'post-thumbnail';
        }else{
            $imagesize = '';
        }
        if( $postformat == "gallery" ) {
            $gallery                = get_post_gallery( get_the_ID(), false );
            $gallery_attachment_ids = explode( ',', $gallery['ids'] );
            if( is_array( $gallery ) ){ ?>
                <div class="postgallery-carousel owl-carousel">
                    <?php foreach ( $gallery_attachment_ids as $gallery_attachment_id ) { ?>
                        <div class="list item">
                            <?php echo wp_get_attachment_image( $gallery_attachment_id, $imagesize ); // WPCS xss ok. ?>
                        </div>
                    <?php } ?>
                </div>
            <?php }else{  ?>
                <div class="blog-post-thumbnail">
                    <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                        <?php
                          the_post_thumbnail( $imagesize );
                        ?>
                    </a>
                </div>
        <?php } }else if( $postformat == "video" ){
            $get_content  = apply_filters( 'the_content', get_the_content() );
            $get_video    = get_media_embedded_in_content( $get_content, array( 'video', 'object', 'embed', 'iframe' ) );
            if( !empty( $get_video ) ){ ?>
                <div class="video">
                    <?php echo $get_video[0]; // WPCS xss ok. ?>
                </div>
        <?php }else{ ?>
                <div class="blog-post-thumbnail">
                    <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                        <?php
                          the_post_thumbnail( $imagesize );
                        ?>
                    </a>
                </div>
        <?php  } }else if( $postformat == "audio" ){
            $get_content  = apply_filters( 'the_content', get_the_content() );
            $get_audio    = get_media_embedded_in_content( $get_content, array( 'audio', 'iframe' ) );
            if( !empty( $get_audio ) ){ ?>
                <div class="audio">
                    <?php echo $get_audio[0]; // WPCS xss ok. ?>
                </div>
        <?php }else{  ?>
                <div class="blog-post-thumbnail">
                    <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                        <?php
                          the_post_thumbnail( $imagesize );
                        ?>
                    </a>
                </div>
        <?php } }else if( $postformat == "quote" ) { 
                    
            $blocks = parse_blocks( get_the_content() );
	
            foreach ( $blocks as $block ) {
                if ( 'core/quote' === $block['blockName'] ) {
                    
                    echo apply_filters( 'the_content', render_block( $block ) );
                    
                    break;
                    
                }
                
            }
            
            ?>
                
        <?php }else{ ?>
                <div class="blog-post-thumbnail">
                    <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                        <?php
                          the_post_thumbnail( $imagesize );
                        ?>
                    </a>
                </div>
        <?php }
    }
endif;

if ( ! function_exists( 'spark_multipurpose_footer_copyright' ) ){
    /**
     * Footer Copyright Information
     *
     * @since 1.0.0
     */
    function spark_multipurpose_footer_copyright() {
        
        echo esc_html( apply_filters( 'spark_multipurpose_footer_copyright', $content = esc_html__('&copy; ','spark-multipurpose') . date( 'Y' ) . ' ' . get_bloginfo( 'name' ) .' - ' ) );
        printf( ' WordPress Theme - by %1$s', '<a href=" ' . esc_url('https://sparklewpthemes.com/') . ' " rel="designer" target="_blank">'.esc_html__('Sparkle Themes','spark-multipurpose').'</a>' );
        
    }
}
add_action( 'spark_multipurpose_copyright', 'spark_multipurpose_footer_copyright', 5 );

if (! function_exists( 'spark_multipurpose_quick_contact' ) ):
	function spark_multipurpose_quick_contact(){ ?>
		<ul class="sp_quick_info">
        	<?php
                $quick_content = get_theme_mod('spark_multipurpose_quick_content', json_encode(array(
                    array(
                        'icon' => 'fas fa-phone-volume',
                        'label' => esc_html('Call Anytime 24/7','spark-multipurpose'),
                        'val' => '+01-559-236-8009',
                        'link' => '',
                        'enable' => 'on'
                    ),
                    array(
                        'icon' => 'fas fa-map-marker-alt',
                        'label' => esc_html('Office Address','spark-multipurpose'),
                        'val' => '28 Street, New York City, USA',
                        'link' => '',
                        'enable' => 'on'
                    ),
                    array(
                        'icon' => 'far fa-envelope',
                        'label' => esc_html('Mail Us For Support','spark-multipurpose'),
                        'val' => 'info@sptheme.com',
                        'link' => '',
                        'enable' => 'on'
                    )
                )));
                $quick_content = json_decode( $quick_content );
                if( is_array( $quick_content ) ){
                    foreach( $quick_content as $quick ){
                        if( $quick->enable !== 'on') continue;
                        ?>
                             <li class="sp_quick_info">
                                <?php if( $quick->link): ?>
                                    <a href="<?php echo esc_url( $quick->link ); ?>">
                                <?php endif; ?>
                                    
                                <?php if( $quick->icon ): ?>
                                    <i class="<?php echo esc_attr($quick->icon); ?>"></i>
                                <?php endif; ?>
                                
                                <?php if( $quick->val ): ?>
                                    <?php echo esc_html( $quick->val ); ?>
                                <?php endif; ?>

                                <?php if( $quick->link): ?>
                                    </a>
                                <?php endif; ?>
                            </li>
                        <?php
                    }
                }
	        ?>
                
        </ul>
		<?php
	}
endif;

if (! function_exists( 'spark_multipurpose_topheader_social' ) ):
	function spark_multipurpose_topheader_social($extra = null ){
		$social_icon = get_theme_mod('spark_multipurpose_topheader_social', json_encode(array(
            array(
                'icon' => 'fab fa-facebook',
                'link' => '#',
            ),
            array(
                'icon' => 'fab fa-twitter',
                'link' => '#',
            ),
            array(
                'icon' => 'fab fa-linkedin',
                'link' => '#',
            ),
            array(
                'icon' => 'fab fa-pinterest',
                'link' => '#',
            ),
            array(
                'icon' => 'fab fa-instagram',
                'link' => '#',
            ),
            array(
                'icon' => 'fab fa-youtube',
                'link' => '#',
            )
        )));

        echo '<ul class="sp_socialicon">';
        if (!empty( $social_icon ) ) :
            $social_icon = json_decode($social_icon);
                foreach ( $social_icon as $icon ) {
                    if( !$icon ) continue; 
                    if( isset( $icon->enable ) && ( $icon->enable == 'off' || $icon->enable == 'disabled') ) continue; ?>
	                <li>
	                	<a href="<?php if($icon->link) echo esc_url( $icon->link ); ?>" target="__blank"><i class="<?php echo esc_html( $icon->icon ); ?>"></i></a>
	                </li>
	            <?php }
        endif;
        if( $extra)  echo $extra;
        echo '</ul>';
	}
endif;
add_action('spark_multipurpose_social_icons', 'spark_multipurpose_topheader_social');


if (! function_exists( 'spark_multipurpose_contact_social_icons' ) ):
	function spark_multipurpose_contact_social_icons( ){
		$social_icon = get_theme_mod('spark_multipurpose_contact_social_link');
        echo '<ul class="sp_socialicon">';
        if (!empty( $social_icon ) ) :
            $social_icon = json_decode($social_icon);
         	    foreach ( $social_icon as $icon ) { if( !$icon->link ) continue; ?>
	                <li>
	                	<a href="<?php if($icon->link) echo esc_url( $icon->link ); ?>" target="__blank"><i class="<?php echo esc_html( $icon->icon ); ?>"></i></a>
	                </li>
	            <?php }
        endif;
        echo '</ul>';
	}
endif;
add_action('spark_multipurpose_contact_social_icons', 'spark_multipurpose_contact_social_icons');

function spark_multipurpose_quick_contact_info_header(){
    ?>
    <div class="contact-info">
        <div class="quickcontact">
            <?php
                $quick_content = get_theme_mod('spark_multipurpose_quick_content', json_encode(array(
                    array(
                        'icon' => 'fas fa-phone-volume',
                        'label' => esc_html('Call Anytime 24/7','spark-multipurpose'),
                        'val' => '+01-559-236-8009',
                        'link' => '',
                        'enable' => 'on'
                    ),
                    array(
                        'icon' => 'fas fa-map-marker-alt',
                        'label' => esc_html('Office Address','spark-multipurpose'),
                        'val' => '28 Street, New York City',
                        'link' => '',
                        'enable' => 'on'
                    ),
                    array(
                        'icon' => 'far fa-envelope',
                        'label' => esc_html('Mail Us For Support','spark-multipurpose'),
                        'val' => 'info@sptheme.com',
                        'link' => '',
                        'enable' => 'on'
                    )
                )));
                $quick_content = json_decode( $quick_content );
                if( is_array( $quick_content ) ){
                    foreach( $quick_content as $quick ){
                        if( $quick->enable !== 'on') continue;
                        ?>
                            <div class="get-tuch">
                                <?php if( $quick->link): ?>
                                    <a href="<?php echo esc_url( $quick->link ); ?>">
                                <?php endif; ?>
                                    
                                    <?php if( $quick->icon ): ?>
                                        <i class="<?php echo esc_attr($quick->icon); ?>"></i>
                                    <?php endif; ?>
                                
                                <?php if( $quick->link): ?>
                                    </a>
                                <?php endif; ?>
                                
                                <div class="quickcontactwrap">
                                    <?php if( $quick->label): ?>
									<div class="quickcontact-title">
                                        <?php echo esc_html( $quick->label ); ?>
									</div>
                                    <?php endif; ?>
                                    <?php if( $quick->val): ?>
                                        <span>
                                            <?php echo esc_html( $quick->val ); ?>
                                        </span>
                                    <?php endif; ?>
								</div>
                            </div>
                        <?php
                    }
                }
                
            ?>
        </div> <!--/ End Contact -->
    </div>
    <?php
}
add_action('spark_multipurpose_quick_contact_info_header', 'spark_multipurpose_quick_contact_info_header');


if (! function_exists( 'spark_multipurpose_topheader_free_hand' ) ):

    function spark_multipurpose_topheader_free_hand(){

        $free_hand = get_theme_mod('spark_multipurpose_topheader_free_hand','Need Any Help: +1-559-236-8009 or help@example.com');
        ?>
            <span><i class="far fa-dot-circle"></i> <?php echo esc_html( $free_hand ); ?></span>
    <?php }
endif;


/**
 * Breadcrumbs Section.
*/
if (! function_exists( 'spark_multipurpose_breadcrumbs' ) ):
    function spark_multipurpose_breadcrumbs(){
            $service_class = array(
                'titlebar-section',
                'breadcrumb-section',
                'section',
                get_theme_mod('spark_multipurpose_titlebar_title_align', 'text-left')
            );
            $type = get_theme_mod('spark_multipurpose_titlebar_bg_type');
            $bg_video           = get_theme_mod("spark_multipurpose_counter_bg_video", '1IaZy0sDLu0');
            if( $type == "video-bg" &&  $bg_video):
              $video_data = 'data-property="{videoURL:\'' . $bg_video . '\', mobileFallbackImage:\'https://img.youtube.com/vi/' . $bg_video . '/maxresdefault.jpg\'}"';
            else: 
              $video_data = '';
            endif;
            ?>
            <section id="titlebar-section" class="<?php echo esc_attr(implode(' ', $service_class)) ?>" <?php echo $video_data; ?>>
                <div class="container">
                    <div class="d-grid">
                        <div class="inner-section-wrap breadcrumb_wrapper">
                            <?php
                                if(get_theme_mod('spark_multipurpose_show_title', true) ):
                                    if (is_single() || is_page()):
                                        the_title('<h2 class="section-title">', '</h2>');
                                    elseif (is_archive()):
                                        the_archive_title('<h2 class="section-title">', '</h2>');
                                    elseif (is_search()): ?>
                                        <h2 class="section-title">
                                            <?php printf(esc_html__('Search Results for:', 'spark-multipurpose'), '%s', '<span>' . get_search_query() . '</span>'); ?>
                                        </h2>
                                    <?php elseif (is_404()):
                                        echo '<h2 class="section-title">' . esc_html('404 Error', 'spark-multipurpose') . '</h2>';
                                    elseif (is_home()):
                                    $page_for_posts_id = get_option('page_for_posts');
                                    $page_title = get_the_title($page_for_posts_id);
                                ?>
                                        <h2 class="section-title"><?php echo esc_html($page_title); ?></h2>
                                <?php else: ?>
                                        <h2 class="section-title"><?php echo esc_html($page_title); ?></h2>
                                <?php
                                endif;
                            endif;
                            if( get_theme_mod('spark_multipurpose_breadcrumb', true)): ?>
                                <nav id="breadcrumb" class="breadcrumb">
                                    <?php
                                        breadcrumb_trail(array(
                                            'container' => 'div',
                                            'show_browse' => false,
                                        ));
                                    ?>
                                </nav>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php spark_multipurpose_add_bottom_seperator('titlebar'); ?>
            </section>
        <?php
    }
endif;
add_action('spark_multipurpose_breadcrumbs', 'spark_multipurpose_breadcrumbs', 100);



if (! function_exists( 'spark_multipurpose_service_title' ) ):
    function spark_multipurpose_service_title() {
        /**
         * Section Title
        */
        $supertitle = get_theme_mod( 'spark_multipurpose_promoservice_super_title', get_theme_mod( 'spark_multipurpose_service_subtitle' ) );
        $title 		= get_theme_mod('spark_multipurpose_promoservice_title', get_theme_mod( 'spark_multipurpose_service_title' ) );
        $titlestyle = get_theme_mod( 'spark_multipurpose_service_title_align','text-center' );
        
        spark_multipurpose_section_title( $supertitle, $title, $titlestyle ); 
    }
endif;

if (! function_exists( 'spark_multipurpose_service_title' ) ):
    function spark_multipurpose_service_title() {
        /**
         * Section Title
        */
        $supertitle = get_theme_mod( 'spark_multipurpose_service_title' );
        $title 		= get_theme_mod( 'spark_multipurpose_service_subtitle' );
        $titlestyle = get_theme_mod( 'spark_multipurpose_service_title_align','text-center' );
        spark_multipurpose_section_title( $supertitle, $title, $titlestyle ); 
    }
endif;

function spark_multipurpose_maintenance_mode() {
    
    global $pagenow;
    
    $spark_multipurpose_maintenance = get_theme_mod('spark_multipurpose_maintenance', 'disable');
    
    if ($spark_multipurpose_maintenance == 'enable' && $pagenow !== 'wp-login.php' && !current_user_can('manage_options') && !is_admin()) {
        
        if (file_exists(get_template_directory() . '/inc/maintenance.php')) {
            require_once get_template_directory() . '/inc/maintenance.php';
        }
        die();
    }
    else if( $spark_multipurpose_maintenance == 'enable' && $pagenow !== 'wp-login.php' &&  !is_admin() && get_theme_mod('spark_multipurpose_maintenance_preview', 'disable') == 'enable'){
        
        if (file_exists(get_template_directory() . '/inc/maintenance.php')) {
            require_once get_template_directory() . '/inc/maintenance.php';
        }
        die();
    }
}
add_action('wp_loaded', 'spark_multipurpose_maintenance_mode');


/*****
 * After Slider Section 
*/
function add_slider_bottom_section_seperator() {
    if( get_theme_mod('spark_multipurpose_slider_section_seperator', 'no') == 'bottom'):
        
        $bottom_seperator = get_theme_mod("spark_multipurpose_slider_bottom_seperator", 'water-waves');
        
        echo '<div class="section-seperator bottom-section-seperator svg-' . $bottom_seperator . '-wrap">';
            get_template_part("inc/svg/{$bottom_seperator}");
        echo '</div>';
        
    endif;
}
add_action("after_slider_section", "add_slider_bottom_section_seperator");

/*****
 * After Footer Section 
*/
if(!function_exists('spark_multipurpose_add_footer_seperator')){
    function spark_multipurpose_add_footer_seperator() {
        if( get_theme_mod('spark_multipurpose_footer_section_seperator', 'no') == 'top'):
            
            $footer_top_seperator = get_theme_mod("spark_multipurpose_footer_top_seperator", 'water-waves');
            
            echo '<div class="section-seperator bottom-section-seperator svg-' . $footer_top_seperator . '-wrap">';
                get_template_part("inc/svg/{$footer_top_seperator}");
            echo '</div>';
            
        endif;
    }
}

if(!function_exists('spark_multipurpose_add_top_seperator')):

    function spark_multipurpose_add_top_seperator($section_name) {

        $section_seperator = get_theme_mod("spark_multipurpose_{$section_name}_section_seperator", "no");
        
        if ($section_seperator == 'top' || $section_seperator == 'top-bottom') {
            $top_seperator = get_theme_mod("spark_multipurpose_{$section_name}_top_seperator", 'big-triangle-center');
            echo '<div class="section-seperator top-section-seperator svg-' . $top_seperator . '-wrap">';
            get_template_part("inc/svg/{$top_seperator}");
            echo '</div>';
        }
    }
endif;

if(!function_exists('spark_multipurpose_add_bottom_seperator')):

    function spark_multipurpose_add_bottom_seperator($section_name) {

        $section_seperator = get_theme_mod("spark_multipurpose_{$section_name}_section_seperator", "no");

        if ($section_seperator == 'bottom' || $section_seperator == 'top-bottom') {

            $bottom_seperator = get_theme_mod("spark_multipurpose_{$section_name}_bottom_seperator", 'big-triangle-center');
            echo '<div class="section-seperator bottom-section-seperator svg-' . $bottom_seperator . '-wrap">';
                get_template_part("inc/svg/{$bottom_seperator}");
            echo '</div>';
        }
    }
endif;


if(!function_exists('spark_multipurpose_parallax_background')):

    function spark_multipurpose_parallax_background($section_name = '') {

        $bg_type = get_theme_mod("spark_multipurpose_{$section_name}_bg_type");
        $bg_image = get_theme_mod("spark_multipurpose_{$section_name}_bg_image_url");
        $bg_video = get_theme_mod("spark_multipurpose_{$section_name}_bg_video", '6O9Nd1RSZSY');
        $parallax_mode = '';
        if ($bg_type == "video-bg" && !empty($bg_video)) {
            $parallax_mode = 'data-property="{videoURL:\'' . $bg_video . '\', mobileFallbackImage:\'https://img.youtube.com/vi/' . $bg_video . '/maxresdefault.jpg\'}"';
        }
        return $parallax_mode;
    }
endif;

/**
 * Dynamic class generate for alignment
 */
if(!function_exists('get_spark_multipurpose_alignment_class')){
    function get_spark_multipurpose_alignment_class($align){
        if($align){
            $align = json_decode($align);
            if(is_object($align)){
                $css = "desktop-".$align->desktop;
                if($align->tablet) $css .= " tablet-".$align->tablet ;
                if($align->mobile) $css .=  " mobile-".$align->mobile;
                return $css;
            }
        }
    }
}
if( !function_exists( 'spark_multipurpose_get_data_attribute' )){
    function spark_multipurpose_get_data_attribute($controls){
      $data = "";
      foreach($controls as $k => $v){
        $data .=" data-{$k}='". esc_attr( $v ) ."'";
      }
      
      return $data;
    }
}

if( !function_exists( 'spark_multipurpose_get_scroll_down')){
    function spark_multipurpose_get_scroll_down(){
        ?>
        <div class="scroll-downs">
            <div class="mousey">
                <div class="scroller"></div>
            </div>
        </div>
    <?php
    }
    add_action('spark_multipurpose_banner_after_content', 'spark_multipurpose_get_scroll_down');
}


if( !function_exists('spark_multipurpose_contact_info_section')){
    function spark_multipurpose_contact_info_section(){

        $details = get_theme_mod('spark_multipurpose_contact_details');
        $details = json_decode($details, true);

        if( is_array($details) && count($details) > 0 ): 
        ?>
        <div class="get-touch-contact">
            <?php 
                foreach($details as $contact ): 
                    if( empty($contact['icon']) && empty($contact['label']) && empty($contact['description'])) continue;
            ?>
                <div class="get-touch">
                    <?php if( $contact['icon']): ?>
                    <div class="get-touch-icon">
                        <i class="<?php echo esc_attr($contact['icon']); ?>"></i>
                    </div>
                    <?php endif; ?>

                    <div class="get-tuch-info">
                        <?php if( $contact['label']): ?>
                            <div class="get-tuch-title"><?php echo esc_html($contact['label']); ?></div>
                        <?php endif; ?>
                        <?php if($contact['description']): ?>
                        <p><?php echo esc_html($contact['description']); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php
        endif;
    }
    add_action('spark_multipurpose_contact_info_section', 'spark_multipurpose_contact_info_section');
}