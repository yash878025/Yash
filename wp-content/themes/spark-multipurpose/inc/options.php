<?php
/**
 * Default color palettes
 *
 * @since Spark Multipurpose 1.0.0
 * @param null
 * @return array $spark_multipurpose_default_color_palettes
 *
 */
if ( ! function_exists( 'spark_multipurpose_default_color_palettes' ) ) {
	function spark_multipurpose_default_color_palettes() {
		$palettes = array(
			'#000000',
			'#ffffff',
			'#dd3333',
			'#dd9933',
			'#eeee22',
			'#81d742',
			'#1e73be',
			'#8224e3',
		);
		return apply_filters( 'spark_multipurpose_default_color_palettes', $palettes );
	}
}

if (!function_exists('spark_multipurpose_svg_seperator')) {
    function spark_multipurpose_svg_seperator() {
        return array(
            'big-triangle-center' 	=> esc_html__('Big Triangle Center', 'spark-multipurpose'),
            'big-triangle-left' 	=> esc_html__('Big Triangle Left', 'spark-multipurpose'),
            'big-triangle-right' 	=> esc_html__('Big Triangle Right', 'spark-multipurpose'),
            'clouds' 		=> esc_html__('Clouds', 'spark-multipurpose'),
            'curve-center' 	=> esc_html__('Curve Center', 'spark-multipurpose'),
            'curve-repeater'=> esc_html__('Curve Repeater', 'spark-multipurpose'),
            'droplets' 		=> esc_html__('Droplets', 'spark-multipurpose'),
            'paper-cut' 	=> esc_html__('Paint Brush', 'spark-multipurpose'),
            'small-triangle-center' => esc_html__('Small Triangle Center', 'spark-multipurpose'),
            'tilt-left'     => esc_html__('Tilt Left', 'spark-multipurpose'),
            'tilt-right'    => esc_html__('Tilt Right', 'spark-multipurpose'),
            'uniform-waves' => esc_html__('Uniform Waves', 'spark-multipurpose'),
            'water-waves'   => esc_html__('Water Waves', 'spark-multipurpose'),
            'big-waves'     => esc_html__('Big Waves', 'spark-multipurpose'),
            'slanted-waves' => esc_html__('Slanted Waves', 'spark-multipurpose'),
            'zigzag'        => esc_html__('Zigzag', 'spark-multipurpose'),
            'curv-1'        => esc_html__('Curv 1', 'spark-multipurpose'),
            'curv-2'        => esc_html__('Curv 2', 'spark-multipurpose'),
            'curv-3'        => esc_html__('Curv 3', 'spark-multipurpose'),
            'curv-4'        => esc_html__('Curv 4', 'spark-multipurpose'),
            'curv-5'        => esc_html__('Curv 5', 'spark-multipurpose'),
            'curv-6'        => esc_html__('Curv 6', 'spark-multipurpose'),
            'curv-7'        => esc_html__('Curv 7', 'spark-multipurpose'),
            'curv-8'        => esc_html__('Curv 8', 'spark-multipurpose'),
            'curv-9'        => esc_html__('Curv 9', 'spark-multipurpose'),
            'curv-10'        => esc_html__('Curv 10', 'spark-multipurpose'),
            'curv-11'        => esc_html__('Curv 11', 'spark-multipurpose'),
            'curv-12'        => esc_html__('Curv 12', 'spark-multipurpose'),
        );
    }
}

function spark_multipurpose_post_category(){
	// List All Category
	$categories = get_categories();
	$blog_cat = array();
	foreach ($categories as $category) {
	    $blog_cat[$category->term_id] = $category->name;
	}

	return $blog_cat;
}

/**
* repeater icons function
*/
if(!function_exists('spark_multipurpose_icon_array') ){
	function spark_multipurpose_icon_array(){
	  return array("icon-1.png","icon-2.png","icon-3.png","icon-4.png","icon-5.png","icon-6.png","icon-7.png","icon-8.png");
	}
  }
  
  /**
  * repeater Social icons function.
  */
  if(!function_exists('spark_multipurpose_font_awesome_social_icon_array') ){
	function spark_multipurpose_font_awesome_social_icon_array(){
	  return array(
			"fab fa-facebook",
			"fab fa-youtube",
			"fab fa-instagram",
			"fab fa-twitter",
			"fab fa-google",
			"fab fa-linkedin",
			"fab fa-pinterest",
			"fab fa-dribbble",
			'fab fa-stumbleupon',
			'fab fa-tumblr',
			'fab fa-vimeo-square',
			'fa fa-rss',
			'fab fa-flickr',
			'fa fa-envelope',
			'fa fa-heart'

		);
	}
  }