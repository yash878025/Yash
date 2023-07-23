<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Spark Multipurpose
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php do_action('spark_multipurpose_before_page'); ?>
<div id="page" class="site">
<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'spark-multipurpose' ); ?></a>
<?php
    /**
     * Header Type
    */
    $headerlayout = get_theme_mod('spark_multipurpose_header_layout','layout_two');

    if($headerlayout == 'layout_one'){
        
        get_template_part('header/header', 'one');

    }else if($headerlayout == 'layout_two'){

        get_template_part('header/header', 'two');

    }else{ 

        get_template_part('header/header', 'one');
    }
    
	if( is_front_page() ){ 
        $bannerslider = get_theme_mod('spark_multipurpose_banner_slider_section', 'enable');
        if ($bannerslider == 'enable') {
    		get_template_part( "section/section", "slider");
        }
	}
?>
<?php
    $breadcrumbs_enable = get_theme_mod('spark_multipurpose_enable_breadcrumbs', 'enable');
    if ($breadcrumbs_enable == 'enable') {
        if (!is_front_page() && !is_home() && !is_page_template( 'template-pagebuilder.php' ) && !is_singular( 'post' ) && !is_singular( 'product' )) {
            /**
             * @hook spark_multipurpose_breadcrumbs.
             *
             * @hooked spark_multipurpose_breadcrumbs.
             *
             */
            do_action('spark_multipurpose_breadcrumbs');
        }
    }
?>
	<div id="content" class="site-content">