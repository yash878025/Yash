<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Spark Multipurpose
 */
if ( ! function_exists( 'spark_multipurpose_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function spark_multipurpose_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}
		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);
		$posted_on = sprintf(
			/* translators: %s: post date. */
			//esc_html_x( 'On %s', 'post date', 'spark-multipurpose' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark"> <i class="fas fa-calendar-alt"></i> ' . $time_string . '</a>'
		);
		echo '<div><span class="posted-on"> ' . $posted_on . '</span></div>'; // WPCS: XSS OK.
	}
endif;
if ( ! function_exists( 'spark_multipurpose_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function spark_multipurpose_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			//esc_html_x( 'by %s', 'post author', 'spark-multipurpose' ),
			'<span class="author vcard"><a class="url" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"><i class="fas fa-user-circle"></i> ' . esc_html( get_the_author() ) . '</a></span>'
		);
		echo '<div><span class="byline"> ' . $byline . '</span></div>'; // WPCS: XSS OK.
	}
endif;
if ( ! function_exists( 'spark_multipurpose_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function spark_multipurpose_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'spark-multipurpose' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'spark-multipurpose' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'spark-multipurpose' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'spark-multipurpose' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}
		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'spark-multipurpose' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}
		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'spark-multipurpose' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;
if ( ! function_exists( 'spark_multipurpose_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function spark_multipurpose_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}
		if ( is_singular() ) :
			?>
			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->
		<?php else : ?>
			<div class="blog-post-thumbnail">
				<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
					<?php
						the_post_thumbnail( 'post-thumbnail' );
					?>
				</a>
			</div>
		<?php
		endif; // End is_singular().
	}
endif;
if ( ! function_exists( 'spark_multipurpose_comments' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function spark_multipurpose_comments() {
		echo '<div><span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( '<span class="fa fa-comments"></span> no comment<span class="screen-reader-text"> on %s</span>', 'spark-multipurpose' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
		echo '</span></div>'; // WPCS: XSS OK.
	}
endif;
/**
 * Category Lists.
 */
if ( ! function_exists( 'spark_multipurpose_category' ) ) :
	function spark_multipurpose_category() {
	/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'spark-multipurpose' ) );
		if ( $categories_list ) {
			/* translators: 1: list of categories. */
			printf( '<span class="cat-links"><i class="fas fa-folder-open"></i>' . '%1$s' . '</span>', $categories_list ); // WPCS: XSS OK.
		}
	}
endif;
/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function spark_multipurpose_excerpt_length( $length ) {

	$excerpt_length = get_theme_mod( 'spark_multipurpose_post_excerpt_length', 20 );

	if( is_admin() ){

		return $length;

	}elseif( is_front_page() ){

		return 28;

	}else{

		return $excerpt_length;
	}
}
add_filter( 'excerpt_length', 'spark_multipurpose_excerpt_length', 999 );

/**
 * Filter the excerpt "read more" string.
 *
 * @param string $text "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function spark_multipurpose_excerpt_more($text){
	
    if(is_admin()){

        return $text;
    }
    return '&hellip;';
}
add_filter( 'excerpt_more', 'spark_multipurpose_excerpt_more' );

if( !function_exists('spark_multipurpose_estimated_reading_time')){

    function spark_multipurpose_estimated_reading_time() {
        global $post;
        // get the content
        $the_content = $post->post_content;
        // count the number of words
        $words = str_word_count( strip_tags( $the_content ) );
        // rounding off and deviding per 200 words per minute
        $minute = floor( $words / 200 );
        // rounding off to get the seconds
        $second = floor( $words % 200 / ( 200 / 60 ) );
        // calculate the amount of time needed to read
        $estimate = $minute . ' min' . ( $minute == 1 ? '' : 's' ) . ', ' . $second . ' ' . ( $second == 1 ? '' : 's' );
        // create output
        $output = '<span><a href="javascript:void(0)"><i class="far fa-clock"></i> ' . $estimate . '</a></span>';
        // return the estimate
        return $output;
    }
}