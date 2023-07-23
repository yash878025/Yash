<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Spark Multipurpose
 */

// $postformat = get_post_format();
// $post_description = get_theme_mod( 'spark_multipurpose_post_description_options', 'excerpt' );
// $post_content_type 	= apply_filters( 'spark_multipurpose_content_type', $post_description );

$alignment = get_theme_mod('spark_multipurpose_blog_single_alignment', 'text-left');

$single_post_top_elements = get_theme_mod('spark_multipurpose_single_post_top_elements', array('featured_image', 'content'));

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('singlearticle ' .$alignment); ?>>
	<?php

		foreach ($single_post_top_elements as $element) {
			$template_function_name = "spark_multipurpose_single_{$element}";
			$template_function_name();
		}

	?>
</article><!-- #post-<?php the_ID(); ?> -->