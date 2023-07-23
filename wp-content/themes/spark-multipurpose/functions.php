<?php
/**
 * Spark Multipurpose functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Spark Multipurpose
 */
if ( ! function_exists( 'spark_multipurpose_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function spark_multipurpose_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Spark Multipurpose, use a find and replace
		 * to change 'spark-multipurpose' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'spark-multipurpose', get_template_directory() . '/languages' );
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( "wp-block-styles" );
		add_theme_support( "responsive-embeds" );
		add_theme_support( "align-wide" );
		add_theme_support( "editor-styles" );
		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );
		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		
		/**
		 * Enable support for post formats
		 *
		 * @link https://developer.wordpress.org/themes/functionality/post-formats/
		 */
		add_theme_support( 'post-formats', array( 'gallery', 'quote', 'audio', 'image', 'video' ) );
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1'  => esc_html__( 'Primary Menu', 'spark-multipurpose' ),
			'menu-2'  => esc_html__( 'Top Menu', 'spark-multipurpose' )
		) );
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'spark_multipurpose_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );
		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'spark_multipurpose_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function spark_multipurpose_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Right Widget Sidebar Area', 'spark-multipurpose' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'spark-multipurpose' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));
	register_sidebar( array(
		'name'          => esc_html__( 'Left Widget Sidebar Area', 'spark-multipurpose' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'spark-multipurpose' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	register_sidebar( array(
		'name'          => esc_html__( 'Menu Sidebar', 'spark-multipurpose' ),
		'id'            => 'menu-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'spark-multipurpose' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area', 'spark-multipurpose' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'spark-multipurpose' ),
		'before_widget' => '<section id="%1$s" class="footer-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));
	
}
add_action( 'widgets_init', 'spark_multipurpose_widgets_init' );

function spark_multipurpose_get_customizer_fonts() {
    $fonts = array(
        'body' => array(
            'font_family' => '',
            'font_style' => '',
            'text_transform' => '',
            'text_decoration' => '',
            'font_size' => '',
            'line_height' => '',
            'color' => '',
            'letter_spacing' => ''
        )
    );

    $common_header_typography = get_theme_mod('common_header_typography', false);

    if (!$common_header_typography) {
        $fonts['h1'] = array(
            'font_family' => '',
            'font_style' => '',
            'text_transform' => '',
            'text_decoration' => '',
            'font_size' => '',
            'line_height' => '',
            'letter_spacing' => ''
        );
        $fonts['h2'] = array(
            'font_family' => '',
            'font_style' => '',
            'text_transform' => '',
            'text_decoration' => '',
            'font_size' => '',
            'line_height' => '',
            'letter_spacing' => ''
        );
        $fonts['h3'] = array(
            'font_family' => '',
            'font_style' => '',
            'text_transform' => '',
            'text_decoration' => '',
            'font_size' => '',
            'line_height' => '',
            'letter_spacing' => ''
        );
        $fonts['h4'] = array(
            'font_family' => '',
            'font_style' => '',
            'text_transform' => '',
            'text_decoration' => '',
            'font_size' => '',
            'line_height' => '',
            'letter_spacing' => ''
        );
        $fonts['h5'] = array(
           'font_family' => '',
            'font_style' => '',
            'text_transform' => '',
            'text_decoration' => '',
            'font_size' => '',
            'line_height' => '',
            'letter_spacing' => ''
        );
        $fonts['h6'] = array(
            'font_family' => '',
            'font_style' => '',
            'text_transform' => '',
            'text_decoration' => '',
            'font_size' => '',
            'line_height' => '',
            'letter_spacing' => ''
        );
    } else {
        $fonts['h'] = array(
            'font_family' => 'Poppins',
            'font_style' => '400',
            'text_transform' => 'none',
            'text_decoration' => 'none',
            'font_size' => '38',
            'line_height' => '1.3',
            'letter_spacing' => '0'
        );
    }
    return $fonts;
}

if ( ! function_exists( 'spark_multipurpose_fonts_url' ) ) :
	/**
	 * Register Google fonts for Spark Multipurpose
	 *
	 * Create your own spark_multipurpose_fonts_url() function to override in a child theme.
	 *
	 * @since Spark Multipurpose 1.0.0
	 *
	 * @return string Google fonts URL for the theme.
	 */
    function spark_multipurpose_fonts_url() {
        $fonts_url = '';
        $font_families = $customizer_font_family = array();
		if ( 'off' !== _x( 'on', 'Poppins: on or off', 'spark-multipurpose' ) ) {
            $font_families[] = 'Poppins:100,200,300,400,400i,500,500i,700,700i,800,900';
        }

        if ( 'off' !== _x( 'on', 'Roboto: on or off', 'spark-multipurpose' ) ) {
            $font_families[] = 'Roboto:400,400i,500,500i,700,700i';
        }
        if ( 'off' !== _x( 'on', 'Oswold: on or off', 'spark-multipurpose' ) ) {
            $font_families[] = 'Oswold:300,400,600,700,800';
        }

		$fontUtils = new Spark_Multipurpose_Typography_Utils();
		$all_font = $fontUtils->font_array();

		$customizer_fonts = apply_filters('spark_multipurpose_customizer_fonts', array(
            'spark_multipurpose_menu_family' => 'Oswald'
        ));

		foreach ($customizer_fonts as $key => $value) {
		    $customizer_font_family[] = get_theme_mod($key, $value);
		}

		$customizer_fonts = spark_multipurpose_get_customizer_fonts();

		foreach ($customizer_fonts as $key => $value) {
            $customizer_font_family[] = get_theme_mod($key . '_font_family', $value['font_family']);
        }

		$customizer_font_family = array_unique($customizer_font_family);
		
		foreach ($customizer_font_family as $font_family) {
            if (isset($all_font[$font_family]['variants'])) {
                $variants_array = $all_font[$font_family]['variants'];
                $variants_keys = array_keys($variants_array);
                $variants = implode(',', $variants_keys);

                $font_families[] = $font_family . ':' . str_replace('italic', 'i', $variants);
            }
        }


        if( $font_families ) {
            $query_args = array(
                'family' => urlencode( implode( '|', $font_families ) ),
                'subset' => urlencode( 'latin,latin-ext' ),
            );
            $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
        }
		if ( ! class_exists( 'WPTT_WebFont_Loader' ) ) {
			// Load Google fonts from Local.
			require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );
		}

		return esc_url( wptt_get_webfont_url( $fonts_url ) );
    }
endif;
/**
 * Enqueue scripts and styles.
 */
function spark_multipurpose_scripts() {

	$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

	wp_enqueue_style( 'spark-multipurpose-fonts', spark_multipurpose_fonts_url(), array(), null );
	
	//load dynamic fonts
	spark_multipurpose_dynamic_fonts();

	// Load owl.carousel Library File
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri(). '/assets/library/owlcarousel/css/owl.carousel' . esc_attr( $min ) . '.css');
	

	// Load magnefic Library File
	wp_enqueue_style( 'magnefic', get_template_directory_uri(). '/assets/library/magnific-popup/magnefic' . esc_attr ( $min ) . '.css');
	wp_enqueue_style( 'spark-multipurpose-style', get_stylesheet_uri() );
	
	// Load responsive Library File
	wp_enqueue_style( 'spark-multipurpose-responsive', get_template_directory_uri(). '/assets/css/responsive.css');
	
	//waypoints
	wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/assets//library/waypoints/waypoints' . esc_attr ( $min ) . '.js', array('jquery'), true );	
	
	//counter
	wp_enqueue_script( 'counter', get_template_directory_uri() . '/assets/library/counter/jquery.counterup' . esc_attr ( $min ) . '.js', array('jquery'), true );
	
	//owl.carousel
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/library/owlcarousel/js/owl.carousel' . esc_attr ( $min ) . '.js', array('jquery'),'2.3.4', true );
	
	//magnific-popup
	wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/assets/library/magnific-popup/magnific-popup' . esc_attr ( $min ) . '.js', array('jquery'),'1.1.0', true );	
	
	if( ( get_theme_mod('spark_multipurpose_maintenance', 'disable') == 'enable') ){
		wp_enqueue_script('countdown', get_template_directory_uri() . '/assets/js/jquery.countdown.js', array('jquery'), '1.00', true);
	}
	if (get_theme_mod('spark_multipurpose_contact_section_disable') != 'disable') {
		$google_map_api = get_theme_mod('google_api_key', '');
		$key = '';
		if ($google_map_api) {
			$key = 'key=' . $google_map_api . '&';
			wp_enqueue_script('google-map', '//maps.googleapis.com/maps/api/js?&' . $key . 'sensor=false', array(), '1.00', false);
		}else{
			wp_enqueue_script('google-map', 'https://maps.google.com/maps/api/js?sensor=true');
		}
		wp_enqueue_script( 'gmap3', get_template_directory_uri() . '/assets/js/gmap3.min.js', array('jquery'), true );
	}
	/** video library */
	wp_enqueue_script('YTPlayer', get_template_directory_uri() . '/assets/js/jquery.mb.YTPlayer.min.js', array('jquery'), true);
	wp_enqueue_style('YTPlayer', get_template_directory_uri() . '/assets/css/jquery.mb.YTPlayer.min.css');

	
	wp_enqueue_script( 'spark-multipurpose-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'spark-multipurpose', get_template_directory_uri() . '/assets/js/spark-multipurpose.js', array('jquery'), true );


	/**
     * Load PrettyPhoto JavaScript File 
    */
    wp_enqueue_script('jquery-prettyPhoto', get_template_directory_uri() . '/assets/library/prettyphoto/js/jquery.prettyPhoto.js', array(), '3.1.6', true);
	wp_enqueue_style( 'prettyPhoto', get_template_directory_uri() . '/assets/library/prettyphoto/css/prettyPhoto.css' );

	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'spark_multipurpose_scripts' );
/**
 * Admin Enqueue scripts and styles.
*/
if ( ! function_exists( 'spark_multipurpose_admin_scripts' ) ) {
    function spark_multipurpose_admin_scripts( $hook ) {
    	if( $hook != 'edit.php' && $hook != 'post.php' && $hook != 'post-new.php' && 'widgets.php' != $hook )
        return;
        
		//load dynamic fonts
		spark_multipurpose_dynamic_fonts();
		wp_enqueue_style( 'spark-multipurpose-admin-style', get_template_directory_uri() . '/assets/css/admin.css');    
    }
}
add_action('admin_enqueue_scripts', 'spark_multipurpose_admin_scripts');
/**
 * Sets the Spark Multipurpose Template Instead of front-page.
 */
function spark_multipurpose_front_page_set( $template ) {
  $spark_multipurpose_front_page = get_theme_mod( 'spark_multipurpose_enable_frontpage' ,'disable' );
  if( !in_array($spark_multipurpose_front_page, array('enable', '1'))){
    if ( 'posts' == get_option( 'show_on_front' ) ) {
      include( get_home_template() );
    } else {
      include( get_page_template() );
    }
  }
}
add_filter( 'spark_multipurpose_enable_front_page', 'spark_multipurpose_front_page_set' );

/**
 * Load Files.
 */
require get_template_directory() . '/inc/init.php';
require_once (get_template_directory(  ). '/inc/learn-press-functions.php');

global $pagenow;
if( $pagenow !== 'widgets.php'){
	require  trailingslashit( get_template_directory() ).'blocks-extends/extend-block.php';
}



if(!function_exists('spark_multipurpose_dynamic_fonts')){
	function spark_multipurpose_dynamic_fonts($icon_set = array()){
		// Load Font-awesome CSS Library File
		wp_register_style( 'fontawesome4.5', get_template_directory_uri(). '/assets/library/fontawesome/css/all.min.css');
		wp_enqueue_style( 'fontawesome4.5');
	}
}


if( !function_exists ('spark_multipurpose_nav_buttons')){
	/** 
	 * Adding Search and Sidebar Navigation Items
	 */
	function spark_multipurpose_nav_buttons() {
		$items = "<div class='nav-buttons'>";
		$enable_search = get_theme_mod('spark_multipurpose_enable_search', 'enable');
		$search_layout = get_theme_mod('spark_multipurpose_search_layout', 'layout_one');

		
		if( $enable_search == 'enable'):
			$items .= '<span class="menu-item-search no-hover"><a class="searchicon '.esc_html($search_layout).'" href="javascript:void(0)"><i class="fas fa-search"></i></a></span>';
		endif;

		if( get_theme_mod('spark_multipurpose_menu_sidebar', 'disable') == 'enable'){
			$items .= '<span class="menu-item-sidebar no-hover"><a class="" href="javascript:void(0)" data-toggle-target=".header-sidebar-content"  data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle"><i class="fas fa-bars"></i></a></span>';
		}

		$spark_multipurpose_header_button_enable = get_theme_mod('spark_multipurpose_header_button_enable', 'disable');
		if( $spark_multipurpose_header_button_enable == 'enable' ){
			$items .= '<span class="menu-item-button no-hover">'. spark_multipurpose_header_button().'</span>';
		}

		$items .="</div>";
		echo $items;
	}
	add_action('spark_multipurpose_nav_buttons', 'spark_multipurpose_nav_buttons');
}


if( !function_exists('get_spark_multipurpose_common_customizer_section')){
	function get_spark_multipurpose_common_customizer_section(){
		return array('service', 'aboutus', 'video_calltoaction', 'calltoaction', 'counter', 'blog', 'testimonial', 'team', 'client', 'promoservice', 'contact', 'pricing', 'tab', 'producttype', 'productcat', 'producthotoffer', 'recentwork', 'how_it_works','titlebar');
	}
}