<?php
/**
 * Spark Multipurpose Theme Customizer
 *
 * @package Spark Multipurpose
 */
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function spark_multipurpose_customize_register( $wp_customize ) {

    // List All Pages
	$pages = array();
	$pages_obj = get_pages();
	$pages[''] = esc_html__('Select Page', 'spark-multipurpose');
	foreach ($pages_obj as $page) {
	    $pages[$page->ID] = $page->post_title;
	}
	$blog_cat = spark_multipurpose_post_category();
	


	$wp_customize->register_section_type('Spark_Multipurpose_Customize_Upgrade_Section');


	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_section( 'static_front_page' )->title 	= esc_html__('Enable Front Page', 'spark-multipurpose');
	$wp_customize->get_section( 'static_front_page' )->priority = 2;

	$wp_customize->get_control('header_textcolor')->section = "title_tagline";
	$wp_customize->get_section('title_tagline') ->panel = "spark_multipurpose_header_settings";

	$wp_customize->add_setting("spark_multipurpose_logo_width", array(
		'sanitize_callback' => 'spark_multipurpose_sanitize_number_blank',
		'default' => 20,
		'transport' => 'postMessage'
	));
	$wp_customize->add_setting("spark_multipurpose_logo_width_tablet", array(
		'sanitize_callback' => 'spark_multipurpose_sanitize_number_blank',
		'default' => 100,
		'transport' => 'postMessage'
	));
	$wp_customize->add_setting("spark_multipurpose_logo_width_mobile", array(
		'sanitize_callback' => 'spark_multipurpose_sanitize_number_blank',
		'default' => 100,
		'transport' => 'postMessage'
	));
	$wp_customize->add_control(new Spark_Multipurpose_Range_Slider_Control($wp_customize, "spark_multipurpose_logo_width_group", array(
		'section' => "title_tagline",
		'label' => esc_html__('Width (%)', 'spark-multipurpose'),
		'input_attrs' => array(
			'min' => 10,
			'max' => 100,
			'step' => 5,
		),
		'settings' => array(
			'desktop' => "spark_multipurpose_logo_width",
			'tablet' => "spark_multipurpose_logo_width_tablet",
			'mobile' => "spark_multipurpose_logo_width_mobile",
		)
	)));

	$wp_customize->add_setting( 'spark_multipurpose_logo_alignement',
		array(
			'default'           => json_encode(array(
				'desktop' 	=> 'text-left',
				'tablet' 	=> 'text-left',
				'mobile' 	=> 'text-left'
			)),
			'sanitize_callback' => 'spark_multipurpose_sanitize_field_responsive_buttonset',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control( new Spark_Multipurpose_Custom_Control_Responsive_Buttonset( $wp_customize,'spark_multipurpose_logo_alignement',
		array(
			'choices'  => array(
				'text-left' 	=> esc_html__( 'Left', 'spark-multipurpose' ),
				'text-center' 	=> esc_html__( 'Center', 'spark-multipurpose' ),
				'text-right' 	=> esc_html__( 'Right', 'spark-multipurpose' ),
			),
			'label'    	=> esc_html__( 'Logo Alignment', 'spark-multipurpose' ),
			'section' 	=> 'title_tagline',
			'settings' 	=> 'spark_multipurpose_logo_alignement',
		))
	);
	
	$wp_customize->register_control_type('Spark_Multipurpose_Custom_Control_Tab');
	$wp_customize->register_control_type('Spark_Multipurpose_Background_Control');
    // $wp_customize->register_control_type('spark_multipurpose_Pro_Dimensions_Control');
    $wp_customize->register_control_type('Spark_Multipurpose_Range_Slider_Control');
    $wp_customize->register_control_type('Spark_Multipurpose_Sortable_Control');
    // //$wp_customize->register_control_type('Spark_Multipurpose_Multiple_Check_Control');
    $wp_customize->register_control_type('Spark_Multipurpose_Color_Tab_Control');
    $wp_customize->register_control_type('Spark_Multipurpose_Custom_Control_Buttonset');
	$wp_customize->register_section_type('Spark_Multipurpose_Toggle_Section');
	
	
	/** 
	 * Advance controller
	 */
    require get_template_directory() . '/inc/customizer/customizer-panel/maintenance.php';
    require get_template_directory() . '/inc/customizer/customizer-panel/social-settings.php';
    require get_template_directory() . '/inc/customizer/customizer-panel/quick-info.php';
	
	require get_template_directory() . '/inc/customizer/customizer-panel/footer.php';
	require get_template_directory() . '/inc/customizer/customizer-panel/colors.php';
	

	/**
	 *	Enable Front Page.
	*/
	$wp_customize->add_setting('spark_multipurpose_enable_frontpage', array(
        'default' => 'disable',
        'sanitize_callback' => 'spark_multipurpose_sanitize_switch',     //done
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Switch_Control($wp_customize, 'spark_multipurpose_enable_frontpage', array(
        'label' => esc_html__('Enable FrontPage', 'spark-multipurpose'),
        'settings' => 'spark_multipurpose_enable_frontpage',
		'description' => esc_html__( 'Note :- Overwrites  the home page display setting and shows the frontpage', 'spark-multipurpose' ),
        'section' => 'static_front_page',
        'switch_label' => array(
            'enable' => esc_html__('On', 'spark-multipurpose'),
            'disable' => esc_html__('Off', 'spark-multipurpose'),
        ),
    )));
    
    
	/**
	 * Header Settings.
	*/
	$wp_customize->add_panel('spark_multipurpose_header_settings', array(
		'title'		=>	esc_html__('Header Setting','spark-multipurpose'),
		'priority'	=>	10,
	));
	
	require get_template_directory() . '/inc/customizer/customizer-panel/general-settings.php';
	require get_template_directory() . '/inc/customizer/customizer-panel/top-header.php';
	require get_template_directory() . '/inc/customizer/customizer-panel/header.php';
	require get_template_directory() . '/inc/customizer/customizer-panel/header-cta.php';
	require get_template_directory() . '/inc/customizer/customizer-panel/blog.php';
	
	/**
	 * Home Page Settings
	*/
	$wp_customize->add_panel('spark_multipurpose_frontpage_settings', array(
		'title'		=>	esc_html__('Home Sections','spark-multipurpose'),
		'priority'	=>	35,
		'description' => esc_html__('Drag and Drop to Reorder', 'spark-multipurpose'). '<img class="spark_multipurpose_light-drag-spinner" src="'.admin_url('/images/spinner.gif').'">',
		'active_callback' => 'spark_multipurpose_enable_frontpage'
	));
	require get_template_directory() . '/inc/customizer/customizer-panel/home/common-settings.php';
	require get_template_directory() . '/inc/customizer/customizer-panel/home/slider.php';
	require get_template_directory() . '/inc/customizer/customizer-panel/home/promo-services.php';
	require get_template_directory() . '/inc/customizer/customizer-panel/home/services.php';
	require get_template_directory() . '/inc/customizer/customizer-panel/home/aboutus.php';
	require get_template_directory() . '/inc/customizer/customizer-panel/home/video-cta.php';
	require get_template_directory() . '/inc/customizer/customizer-panel/home/cta.php';
	require get_template_directory() . '/inc/customizer/customizer-panel/home/counter.php';
	require get_template_directory() . '/inc/customizer/customizer-panel/home/recentwork.php';
	require get_template_directory() . '/inc/customizer/customizer-panel/home/blog.php';
	require get_template_directory() . '/inc/customizer/customizer-panel/home/testimonial.php';
	require get_template_directory() . '/inc/customizer/customizer-panel/home/team.php';
	require get_template_directory() . '/inc/customizer/customizer-panel/home/client.php';
	require get_template_directory() . '/inc/customizer/customizer-panel/home/breadcrumb.php';
	require get_template_directory() . '/inc/customizer/customizer-panel/home/contact-settings.php';
	require get_template_directory() . '/inc/customizer/customizer-panel/home/how_it_works.php';




	$wp_customize->add_section(new Spark_Multipurpose_Customize_Upgrade_Section($wp_customize, 'spark_multipurpose_home_section_upgrade', array(
		'title' => esc_html__('More Sections on Premium', 'spark-multipurpose'),
		'panel' => 'spark_multipurpose_frontpage_settings',
		'priority' => 210,
		'options' => array(
			esc_html__('--Drag and Drop Reorder Sections--', 'spark-multipurpose'),
			esc_html__('- Highlight Section', 'spark-multipurpose'),
			esc_html__('- Service Section', 'spark-multipurpose'),
			esc_html__('- Portfolio Section', 'spark-multipurpose'),
			esc_html__('- Portfolio Slider Section', 'spark-multipurpose'),
			esc_html__('- Content Slider Section', 'spark-multipurpose'),
			esc_html__('- Team Section', 'spark-multipurpose'),
			esc_html__('- Testimonial Section', 'spark-multipurpose'),
			esc_html__('- Pricing Section', 'spark-multipurpose'),
			esc_html__('- Blog Section', 'spark-multipurpose'),
			esc_html__('- Counter Section', 'spark-multipurpose'),
			esc_html__('- Call To Action Section', 'spark-multipurpose'),
			esc_html__('------------------------', 'spark-multipurpose'),
			esc_html__('- Elementor Pagebuilder Compatible. All the above sections can be created with Elementor Page Builder or Customizer whichever you like.', 'spark-multipurpose'),
		)
	)));
	

/**
 * Page Layout Sidebar Options
*/
$wp_customize->add_section('spark_multipurpose_sidebar', array(
	'title'		=>	esc_html__('Page Sidebar Settings','spark-multipurpose'),
	'panel'		=> 'spark_multipurpose_general_settings_panel',
));

	$wp_customize->add_setting("spark_multipurpose_page_heading", array(
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Customize_Heading($wp_customize, "spark_multipurpose_page_heading", array(
        'section' => "spark_multipurpose_sidebar",
        'label' => esc_html__('Page Layout Setting', 'spark-multipurpose'),
    )));

	$wp_customize->add_setting('spark_multipurpose_page_sidebar', array(
		'default' => 'right',
		'sanitize_callback' => 'spark_multipurpose_sanitize_options'
	));
	$wp_customize->add_control(new Spark_Multipurpose_Selector($wp_customize, 'spark_multipurpose_page_sidebar', array(
		'section' => 'spark_multipurpose_sidebar',
		'label' => esc_html__('Page Layout', 'spark-multipurpose'),
		'options' => array(
			'left' => get_template_directory_uri() . '/inc/customizer/images/left-sidebar.png',
			'right' => get_template_directory_uri() . '/inc/customizer/images/right-sidebar.png',
			'no' => get_template_directory_uri() . '/inc/customizer/images/no-sidebar.png',
		)
	)));

	// Enable or Disable Sticky Sidebar.
	$wp_customize->add_setting('spark_multipurpose_sticky_sidebar', array(
		'default' => 'enable',
		'sanitize_callback' => 'spark_multipurpose_sanitize_switch',     //done
	));
	$wp_customize->add_control(new Spark_Multipurpose_Switch_Control($wp_customize, 'spark_multipurpose_sticky_sidebar', array(
		'label' => esc_html__('Enable Sticky Sidebar', 'spark-multipurpose'),
		'settings' => 'spark_multipurpose_sticky_sidebar',
		'section' => 'spark_multipurpose_sidebar',
		'switch_label' => array(
			'enable' => esc_html__('Yes', 'spark-multipurpose'),
			'disable' => esc_html__('No', 'spark-multipurpose'),
		),
	)));

	$wp_customize->add_setting("spark_multipurpose_category_heading", array(
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Customize_Heading($wp_customize, "spark_multipurpose_category_heading", array(
        'section' => "spark_multipurpose_sidebar",
        'label' => esc_html__('Category Page Setting', 'spark-multipurpose'),
    )));

	// Blog Archive Sidebar Options.
	$wp_customize->add_setting('spark_multipurpose_archive_sidebar', array(
		'default' => 'right',
		'sanitize_callback' => 'spark_multipurpose_sanitize_options'
	));
	$wp_customize->add_control(new Spark_Multipurpose_Selector($wp_customize, 'spark_multipurpose_archive_sidebar', array(
		'section' => 'spark_multipurpose_sidebar',
		'label' => esc_html__('Category Sidebar', 'spark-multipurpose'),
		'options' => array(
			'left' => get_template_directory_uri() . '/inc/customizer/images/left-sidebar.png',
			'right' => get_template_directory_uri() . '/inc/customizer/images/right-sidebar.png',
			'no' => get_template_directory_uri() . '/inc/customizer/images/no-sidebar.png',
		)
	)));
		
}
add_action( 'customize_register', 'spark_multipurpose_customize_register' );

add_action( 'customize_controls_print_scripts', 'spark_multipurpose_customizer_dynamic_script', 30 );
function spark_multipurpose_customizer_dynamic_script(){
	?>
	<script type="text/javascript">
		jQuery( function( $ ) {
			wp.customize.panel( 'spark_multipurpose_frontpage_settings', function( section ) {
				section.expanded.bind( function( isExpanded ) {
					if ( isExpanded ) {
						wp.customize.previewer.previewUrl.set( '<?php echo esc_js( home_url('/') ); ?>' );
					}
				} );
			} );


		} );
	</script>

	<?php
}
/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function spark_multipurpose_customize_partial_blogname() {
	bloginfo( 'name' );
}
/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function spark_multipurpose_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
*/
function spark_multipurpose_customize_preview_js() {
	wp_enqueue_script( 'spark-multipurpose-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'spark_multipurpose_customize_preview_js' );
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * Enqueue required scripts/styles for customizer panel
 *
 * @since 1.0.0
 *
 */
function spark_multipurpose_customize_scripts(){
	wp_enqueue_style( 'fontawesome4.5');
	wp_enqueue_style( 'choosen', get_template_directory_uri() . '/assets/library/chosen/chosen.min.css' );
	wp_enqueue_script( 'choosen', get_template_directory_uri() . '/assets/library/chosen/chosen.jquery.js', array('jquery'), true );
    wp_enqueue_style('spark-multipurpose-customizer', get_template_directory_uri() . '/assets/css/customizer.css');
    wp_enqueue_script('spark-multipurpose-customizer', get_template_directory_uri() . '/assets/js/customizer-admin.js', array('jquery', 'customize-controls'), true);
}
add_action('customize_controls_enqueue_scripts', 'spark_multipurpose_customize_scripts');
/**
 * Section Re Order
*/
add_action('wp_ajax_spark_multipurpose_sections_reorder', 'spark_multipurpose_sections_reorder');
function spark_multipurpose_sections_reorder() {
    if (isset($_POST['sections'])) {
        set_theme_mod('spark_multipurpose_frontpage_sections', $_POST['sections']);
    }
    wp_die();
}
function spark_multipurpose_get_section_position($key) {
    $sections = spark_multipurpose_homepage_section();
    $position = array_search($key, $sections);
    $return = ( $position + 1 ) * 11;
    return $return;
}
if( !function_exists('spark_multipurpose_homepage_section') ){
	function spark_multipurpose_homepage_section(){
		$defaults = apply_filters('spark_multipurpose_homepage_sections',
			array(
				'spark_multipurpose_aboutus_section',
				'spark_multipurpose_calltoaction_section',
				'spark_multipurpose_promoservice_section',
				'spark_multipurpose_video_calltoaction_section',
				'spark_multipurpose_recentwork_section',
				'spark_multipurpose_testimonial_section',
				'spark_multipurpose_how_it_works_section',
				'spark_multipurpose_service_section',
				'spark_multipurpose_counter_section',
				'spark_multipurpose_team_section',
				'spark_multipurpose_client_section',
				'spark_multipurpose_contact_section',
				'spark_multipurpose_blog_section',
				'spark_multipurpose_producttype_section',
				'spark_multipurpose_productcat_section',
			)
		);
		$sections = get_theme_mod('spark_multipurpose_frontpage_sections', $defaults);
        return $sections;
	}
}

/**
 * Multiple Gallery Image Upload Custom Control Function
*/
if ( class_exists( 'WP_Customize_Control' ) ) :
	if( ! class_exists('Spark_Multipurpose_Gallery_Control')):
		class Spark_Multipurpose_Gallery_Control extends WP_Customize_Control{
			public $type = 'gallery';         
			public function render_content() { ?>
			<div>
				<span class="customize-control-title">
					<?php echo esc_html( $this->label ); ?>
				</span>

				<?php if($this->description){ ?>
					<span class="description customize-control-description">
					<?php echo wp_kses_post( $this->description ); ?>
					</span>
				<?php } ?>

				<div class="gallery-screenshot sp-clearfix">
				<?php
					{
					$ids = explode( ',', $this->value() );
						foreach ( $ids as $attachment_id ) {
							$img = wp_get_attachment_image_src( $attachment_id, 'thumbnail' );
							if( is_array($img) && isset($img[0])){
								echo '<div class="screen-thumb"><img src="' . esc_url( $img[0] ) . '" /></div>';
							}
						}
					}
				?>
				</div>
				<input id="edit-gallery" class="button upload_gallery_button" type="button" value="<?php esc_attr_e('Add/Edit Gallery','spark-multipurpose') ?>" />
				<input id="clear-gallery" class="button upload_gallery_button" type="button" value="<?php esc_attr_e('Clear','spark-multipurpose') ?>" />
				<input type="hidden" data-name="gallery" class="gallery_values" <?php echo esc_url( $this->link() ); ?> value="<?php echo esc_attr( $this->value() ); ?>">
			</div>
			<?php }
		}
	endif;
endif;