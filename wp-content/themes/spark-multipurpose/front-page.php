<?php 
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Spark Multipurpose
 */
get_header();
/**
 * Enable Front Page
 */
do_action( 'spark_multipurpose_enable_front_page' );
    $enable_front_page = get_theme_mod( 'spark_multipurpose_enable_frontpage' , 'disable' );
    if ($enable_front_page == 'enable' || $enable_front_page == 1):
        $spark_multipurpose_home_sections = spark_multipurpose_homepage_section();
        foreach ($spark_multipurpose_home_sections as $spark_multipurpose_homepage_section) {
            if( get_theme_mod($spark_multipurpose_homepage_section."_disable", 'disable') == 'enable'){
                $spark_multipurpose_homepage_section = str_replace('spark_multipurpose_', '', $spark_multipurpose_homepage_section);
                $spark_multipurpose_homepage_section = str_replace('_section', '', $spark_multipurpose_homepage_section);
                
                get_template_part( 'section/section', $spark_multipurpose_homepage_section );
            }
        }
    endif;
get_footer();