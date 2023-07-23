<?php
/**
 * Service starter content.
 */
return array(
	'post_type'    => 'page',
	'post_title'   => _x( 'Pricing', 'Theme starter content', 'spark-multipurpose' ),
	'construction_light_page_layouts' => 'no',
	'template' => 'template-pagebuilder.php',
	'post_content' => '
    
    <!-- wp:spacer -->
    <div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
    <!-- /wp:spacer -->


	<!-- wp:pattern {"slug":"spark-multipurpose/pricing"} /-->


    <!-- wp:spacer -->
    <div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
    <!-- /wp:spacer -->

	<!-- wp:pattern {"slug":"spark-multipurpose/service-two"} /-->


    <!-- wp:spacer -->
    <div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
    <!-- /wp:spacer -->
    ',
);