<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Spark Multipurpose
 */
/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function spark_multipurpose_body_classes($classes){
    // Adds a class of hfeed to non-singular pages.
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }
    // Adds a class of no-sidebar when there is no sidebar present.
    if (!is_active_sidebar('sidebar-1')) {
        $classes[] = 'no';
    }
    //Web Page Layout
    if (get_theme_mod('spark_multipurpose_site_layout', 'full_width') == 'boxed') {
        $classes[] = 'boxed';
    }
    return $classes;
}
add_filter('body_class', 'spark_multipurpose_body_classes');
if ( ! function_exists( 'wp_body_open' ) ) {
    /**
     * Body open hook.
     */
    function wp_body_open() {
        do_action( 'wp_body_open' );
    }
}
/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function spark_multipurpose_pingback_header(){
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
    }
}
add_action('wp_head', 'spark_multipurpose_pingback_header');
/**
 *  Add Metabox.
*/
if( !function_exists( 'spark_multipurpose_page_layout_metabox' ) ):
    function spark_multipurpose_page_layout_metabox() {
        add_meta_box('spark_multipurpose_display_layout', 
            esc_html__( 'Display Page Layout Options', 'spark-multipurpose' ), 
            'spark_multipurpose_display_layout_callback', 
            array('page','post'), 
            'normal', 
            'high'
        );
    }
endif;
add_action('add_meta_boxes', 'spark_multipurpose_page_layout_metabox');
/**
 * Page and Post Page Display Layout Metabox function
*/
$spark_multipurpose_page_layouts =array(
    'leftsidebar' => array(
        'value'     => 'left',
        'label'     => esc_html__( 'Left Sidebar', 'spark-multipurpose' ),
        'thumbnail' => get_template_directory_uri() . '/inc/customizer/images/left-sidebar.png',
    ),
    'rightsidebar' => array(
        'value'     => 'right',
        'label'     => esc_html__( 'Right (Default)', 'spark-multipurpose' ),
        'thumbnail' => get_template_directory_uri() . '/inc/customizer/images/right-sidebar.png',
    ),
     'nosidebar' => array(
        'value'     => 'no',
        'label'     => esc_html__( 'Full width', 'spark-multipurpose' ),
        'thumbnail' => get_template_directory_uri() . '/inc/customizer/images/no-sidebar.png',
    )
);
/**
 * Function for Page layout meta box
*/
if ( ! function_exists( 'spark_multipurpose_display_layout_callback' ) ) {
    function spark_multipurpose_display_layout_callback(){
        global $post, $spark_multipurpose_page_layouts;
        wp_nonce_field( basename( __FILE__ ), 'spark_multipurpose_settings_nonce' ); ?>
        <table>
            <tr>
              <td>            
                <?php
                  $i = 0;  
                  foreach ($spark_multipurpose_page_layouts as $field) {  
                  $spark_multipurpose_page_metalayouts = esc_attr( get_post_meta( $post->ID, 'spark_multipurpose_page_layouts', true ) ); 
                ?>            
                  <div class="radio-image-wrapper slidercat" id="slider-<?php echo intval( $i ); ?>" style="float: right; margin-right: 25px;">
                    <label class="description">
                        <img src="<?php echo esc_url( $field['thumbnail'] ); ?>" style="max-width: 200px;" /></br>
                        <input type="radio" name="spark_multipurpose_page_layouts" value="<?php echo esc_attr( $field['value'] ); ?>" <?php checked( esc_html( $field['value'] ), 
                            $spark_multipurpose_page_metalayouts ); if(empty($spark_multipurpose_page_metalayouts) && esc_html( $field['value'] ) =='right'){ echo "checked='checked'";  } ?>/>
                         <?php echo esc_html( $field['label'] ); ?>
                    </label>
                  </div>
                <?php  $i++; }  ?>
              </td>
            </tr>            
        </table>
    <?php
    }
}
/**
 * Save the custom metabox data
*/
if ( ! function_exists( 'spark_multipurpose_save_page_settings' ) ) {
    function spark_multipurpose_save_page_settings( $post_id ) { 
        global $spark_multipurpose_page_layouts, $post;
         if ( !isset( $_POST[ 'spark_multipurpose_settings_nonce' ] ) || !wp_verify_nonce( sanitize_key( $_POST[ 'spark_multipurpose_settings_nonce' ] ) , basename( __FILE__ ) ) ) 
            return;
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)  
            return;        
        if (isset( $_POST['post_type'] ) && 'page' == $_POST['post_type']) {  
            if (!current_user_can( 'edit_page', $post_id ) )  
                return $post_id;  
        } elseif (!current_user_can( 'edit_post', $post_id ) ) {  
                return $post_id;  
        }  
        foreach ($spark_multipurpose_page_layouts as $field) {  
            $old = esc_attr( get_post_meta( $post_id, 'spark_multipurpose_page_layouts', true) );
            if ( isset( $_POST['spark_multipurpose_page_layouts']) ) { 
                $new = sanitize_text_field( wp_unslash( $_POST['spark_multipurpose_page_layouts'] ) );
            }
            if ($new && $new != $old) {  
                update_post_meta($post_id, 'spark_multipurpose_page_layouts', $new);  
            } elseif ('' == $new && $old) {  
                delete_post_meta($post_id,'spark_multipurpose_page_layouts', $old);  
            } 
         } 
    }
}
add_action('save_post', 'spark_multipurpose_save_page_settings');
/**
 * Fully Translation ready Multilingual Compatible with Polylang and WPML plugins.
*/
if( function_exists( 'pll_register_string' ) ){
    /**
     * About Us 
    */
    pll_register_string( 'aboutus_readmore_btn', get_theme_mod('spark_multipurpose_aboutus_button_text'), 'spark-multipurpose', true );
    /**
     * Portfolio Services Section
    */
    pll_register_string( 'recentwork_title', get_theme_mod('spark_multipurpose_recentwork_title'), 'spark-multipurpose', true );
    pll_register_string( 'recentwork_subtitle', get_theme_mod('spark_multipurpose_recentwork_subtitle'), 'spark-multipurpose', true );
    /**
     * Video Call To Action Section
    */
    pll_register_string( 'video_calltoaction_title', get_theme_mod('spark_multipurpose_video_calltoaction_title'), 'spark-multipurpose', true );
    pll_register_string( 'video_calltoaction_subtitle', get_theme_mod('spark_multipurpose_video_calltoaction_subtitle'), 'spark-multipurpose', true );
    /** 
     * Our Services Section
    */
    pll_register_string( 'service_title', get_theme_mod('spark_multipurpose_service_title'), 'spark-multipurpose', true );
    pll_register_string( 'service_subtitle', get_theme_mod('spark_multipurpose_service_sub_title'), 'spark-multipurpose', true );
    pll_register_string( 'service_read_more', get_theme_mod('spark_multipurpose_service_button'), 'spark-multipurpose', true );
    /**
     * Call To Action Section
    */
    pll_register_string( 'calltoaction_title', get_theme_mod('spark_multipurpose_calltoaction_title'), 'spark-multipurpose', true );
    pll_register_string( 'calltoaction_subtitle', get_theme_mod('spark_multipurpose_calltoaction_subtitle'), 'spark-multipurpose', true );
    pll_register_string( 'calltoaction_button', get_theme_mod('spark_multipurpose_calltoaction_button'), 'spark-multipurpose', true );
    pll_register_string( 'calltoaction_button_one', get_theme_mod('spark_multipurpose_calltoaction_button_one'), 'spark-multipurpose', true );
    /**
     * Counter Services Section
    */
    pll_register_string( 'counter_title', get_theme_mod('spark_multipurpose_counter_title'), 'spark-multipurpose', true );
    pll_register_string( 'counter_subtitle', get_theme_mod('spark_multipurpose_counter_subtitle'), 'spark-multipurpose', true );
    /**
     * Blog Services Section
    */
    pll_register_string( 'blog_title', get_theme_mod('spark_multipurpose_blog_title'), 'spark-multipurpose', true );
    pll_register_string( 'blog_subtitle', get_theme_mod('spark_multipurpose_blog_subtitle'), 'spark-multipurpose', true );
    pll_register_string( 'blog_readmore_btn', get_theme_mod('spark_multipurpose_blogtemplate_btn'), 'spark-multipurpose', true );
    /**
     * Testimonial Services Section
    */
    pll_register_string( 'testimonial_title', get_theme_mod('spark_multipurpose_testimonial_title'), 'spark-multipurpose', true );
    pll_register_string( 'testimonial_subtitle', get_theme_mod('spark_multipurpose_testimonial_sub_title'), 'spark-multipurpose', true );
    /**
     * Team Services Section
    */
    pll_register_string( 'team_title', get_theme_mod('spark_multipurpose_team_title'), 'spark-multipurpose', true );
    pll_register_string( 'team_subtitle', get_theme_mod('spark_multipurpose_team_subtitle'), 'spark-multipurpose', true );
    /**
     * Client Logo Section
    */
    pll_register_string( 'client_title', get_theme_mod('spark_multipurpose_client_title'), 'spark-multipurpose', true );
    pll_register_string( 'client_subtitle', get_theme_mod('spark_multipurpose_client_sub_title'), 'spark-multipurpose', true );
}

function spark_multipurpose_header_button(){
    $spark_multipurpose_header_button_enable = get_theme_mod('spark_multipurpose_header_button_enable', 'disable');
    $spark_multipurpose_hb_title = get_theme_mod('spark_multipurpose_hb_title',esc_html__('Call Anytime 24/7', 'spark-multipurpose'));
    $spark_multipurpose_hb_text  = get_theme_mod('spark_multipurpose_hb_text',esc_html__('+01-559-236-8009', 'spark-multipurpose'));
    $spark_multipurpose_hb_icon  = get_theme_mod('spark_multipurpose_hb_icon', 'fa fa-phone-volume');
    $spark_multipurpose_hb_link  = get_theme_mod('spark_multipurpose_hb_link', esc_html__('tel:5592368009', 'spark-multipurpose'));
    $spark_multipurpose_hb_disable_mobile = get_theme_mod('spark_multipurpose_header_button_disable_mobile', true);
    $button_class = $spark_multipurpose_hb_disable_mobile ? ' mobile-button-hide' : '';
    
    if( $spark_multipurpose_header_button_enable == 'enable' ){ 
        ob_start();
        ?>
        <div class="quickcontact">
            <div class="get-tuch spark-multipurpose-header-button<?php echo $button_class; ?>">
                <?php if( $spark_multipurpose_hb_link && $spark_multipurpose_hb_icon ): ?>
                    <a href="<?php echo esc_url( $spark_multipurpose_hb_link ); ?>">
                <?php endif; ?>
                    
                    <?php if( $spark_multipurpose_hb_icon ): ?>
                        <i class="<?php echo esc_attr($spark_multipurpose_hb_icon); ?>"></i>
                    <?php endif; ?>
                
                <?php if( $spark_multipurpose_hb_link && $spark_multipurpose_hb_icon): ?>
                    </a>
                <?php endif; ?>
                
                <div class="quickcontactwrap buttonwrap">
                    <?php if( $spark_multipurpose_hb_title): ?>
                        <div class="quickcontact-title">
                            <?php echo esc_html( $spark_multipurpose_hb_title ); ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if( $spark_multipurpose_hb_link ): ?>
                        <a href="<?php echo esc_url( $spark_multipurpose_hb_link ); ?>">
                    <?php endif; ?>

                    <?php if( $spark_multipurpose_hb_text): ?>
                        <span>
                            <?php echo esc_html( $spark_multipurpose_hb_text ); ?>
                        </span>
                    <?php endif; ?>

                     <?php if( $spark_multipurpose_hb_link ): ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php

        return ob_get_clean();




        return '<a class="btn btn-primary spark-multipurpose-header-button'.$button_class.'" href="'.esc_attr($spark_multipurpose_hb_link).'">'.wp_kses_post($spark_multipurpose_hb_text).'</a>';
    }
}
add_action('spark_multipurpose_header_button', 'spark_multipurpose_header_button');


if(!function_exists('spark_multipurpose_single_featured_image')){
    function spark_multipurpose_single_featured_image(){
        spark_multipurpose_post_format_media( get_post_format() );
    }
}

if(!function_exists('spark_multipurpose_single_post_meta')){
    function spark_multipurpose_single_post_meta(){
         do_action( 'spark_multipurpose_post_meta', 10 );
    }
}


if(!function_exists('spark_multipurpose_single_content')){
    function spark_multipurpose_single_content(){
        echo '<div class="articlewrap">';
            the_content( sprintf(
                wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                    __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'spark-multipurpose' ),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                get_the_title()
            ) );
        echo '</div>';
    }
}

if(!function_exists('spark_multipurpose_single_title')){
    function spark_multipurpose_single_title(){
        the_title( '<h3 class="title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); 
    }
}


if(!function_exists('spark_multipurpose_single_author_box')){

    function spark_multipurpose_single_author_box(){ 
    
        global $post;  
        $author_id = get_post_field('post_author' , $post->ID); 
        $author_name = get_the_author_meta( 'display_name', $author_id );
        $author_desc = get_the_author_meta('description', $author_id);
        $author_url = get_author_posts_url( $author_id );
        $output = get_avatar_url($author_id);
    ?>
        <div class="author-box">
            <div class="author-avatar">
                <a href="<?php echo esc_url( $author_url ); ?>"><img src="<?php echo esc_url( $output ); ?>" alt="<?php echo esc_html( $author_name ); ?>"></a>
            </div>
            <div class="author-content">
                <h5><a href="<?php echo esc_url( $author_url ); ?>" class="author-name"><?php echo esc_html( $author_name ); ?></a></h5>
                <p><?php echo esc_html( $author_desc ); ?></p>
            </div>
        </div>
        <?php
    }
}

if(!function_exists('spark_multipurpose_single_pagination')){
    function spark_multipurpose_single_pagination(){
        ?>
        <div class="prevNextArticle d-flex box-content">
            <div class="prevnext-item previus">
                <?php
                    $next_post = get_next_post();
                    $prev = get_previous_post();
                    if( $prev ): 
                ?>
                    <a href="<?php echo esc_url( get_the_permalink( $prev->ID ) ); ?>" title="<?php echo esc_attr($prev->post_title); ?>" class="single-navigation previous-post" style="display: inline;">
                        <?php echo get_the_post_thumbnail( $prev->ID, 'thumbnail'); ?>
                    </a>
                <?php endif; ?>
                <?php previous_post_link( '%link', '<h5><span>'.esc_html__('Previous article','spark-multipurpose').'</span></h5><div class="title prev">%title</div>' ); ?>
            </div>
            <div class="prevnext-item text-right">
                <?php next_post_link( '%link', '<h5><span>'.esc_html__('Next article','spark-multipurpose').'</span></h5><div class="title next">%title</div>' ); ?>
                <?php if( $next_post ): ?>
                    <a href="<?php echo esc_url( get_the_permalink( $next_post->ID ) ); ?>" title="<?php echo esc_attr($next_post->post_title); ?>" class="single-navigation previous-post" style="display: inline;">
                        <?php echo get_the_post_thumbnail( $next_post->ID, 'thumbnail'); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <?php
    }
}

if(!function_exists('spark_multipurpose_single_comment')){
    function spark_multipurpose_single_comment(){
       // If comments are open or we have at least one comment, load up the comment template.
       if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;
    }
}

if(!function_exists('spark_multipurpose_single_related_posts')){
    function spark_multipurpose_single_related_posts(){
        global $post;
        $related = get_posts( array( 'numberposts' => 4, 'post__not_in' => array($post->ID) ) );
        if(!empty($related ) ){
        ?>
        <div class="related posts">
            <h3><?php echo esc_html__('Related Posts','spark-multipurpose') ?></h3>
            <div class="articlesListing d-grid d-grid-column-2">
            <?php
                foreach( $related as $post ) {
                    setup_postdata($post); 
                    
                        get_template_part( 'template-parts/content', 'related');

                    } 
                wp_reset_postdata(); 
            ?>
            </div>
        </div>
        <?php 
        }
    }
}
