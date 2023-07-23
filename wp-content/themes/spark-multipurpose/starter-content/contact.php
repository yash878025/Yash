<?php
/**
 * Contact starter content.
 */
return array(
	'post_type'    => 'page',
	'post_title'   => _x( 'Contact', 'Theme starter content', 'spark-multipurpose' ),
	// 'thumbnail'    => '{{featured-image-home}}',
	'construction_light_page_layouts' => 'no',
	'template' => 'template-pagebuilder.php',
	'post_content' => '
		<!-- wp:spacer {"height":61} -->
		<div style="height:61px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->

	
		<!-- wp:pattern {"slug":"spark-multipurpose/contact"} /-->

		<!-- wp:spacer {"height":61} -->
		<div style="height:61px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->

	',
);