<?php
/**
 * Main Custom admin functions area
 */
/**
 * Load Custom Themes functions that act independently of the theme functions.
 */
require get_theme_file_path('inc/themes-functions.php');
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';
/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';


/*opitons*/
require get_template_directory() .'/inc/options.php';
/**
 * custom controllers
 */
require get_template_directory() . '/inc/custom-controller/init.php';
/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';
/**
 * Customizer Sanitization.
 */
require get_template_directory() . '/inc/customizer/sanitize.php';
/**
 * Customizer Active Call Back .
 */
require get_template_directory() . '/inc/customizer/callback.php';
/**
 * Breadcrumbs.
 */
require get_template_directory() . '/inc/breadcrumbs/breadcrumbs.php';

/**
 * Dynamic Color.
 */
require get_template_directory() . '/inc/dynamic-css.php';
require get_template_directory() . '/inc/dynamic.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Mobile Menu
 */
require get_template_directory() . '/inc/mobile-menu/init.php';


/**
 * Load in customizer upgrade to pro
*/
require get_theme_file_path('inc/customizer/customizer-pro/class-customize.php');
/**
 * Welcome Page.
 */
require get_template_directory() . '/inc/welcome/welcome.php';

/**
 * patterns register
 */
require get_template_directory() .'/inc/block-patterns.php';

/**
 * starter content
 */
require get_template_directory() .'/starter-content/init.php';