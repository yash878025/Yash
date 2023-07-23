<?php
/**
 * Home starter content.
 */
$default_home_content = '
<!-- wp:pattern {"slug":"spark-multipurpose/banner"} /-->
<!-- wp:pattern {"slug":"spark-multipurpose/aboutus"} /-->
<!-- wp:pattern {"slug":"spark-multipurpose/service"} /-->
<!-- wp:pattern {"slug":"spark-multipurpose/service2"} /-->

<!-- wp:pattern {"slug":"spark-multipurpose/cta"} /-->


<!-- wp:pattern {"slug":"spark-multipurpose/pricing"} /-->
<!-- wp:pattern {"slug":"spark-multipurpose/how-to-work"} /-->
<!-- wp:pattern {"slug":"spark-multipurpose/portfolio"} /-->

<!-- wp:pattern {"slug":"spark-multipurpose/contact"} /-->
<!-- wp:pattern {"slug":"spark-multipurpose/footer"} /-->
';

return array(
	'post_type'    => 'page',
	'post_title'   => _x( 'Home', 'Theme starter content', 'spark-multipurpose' ),
	'template' => 'template-pagebuilder.php',
	'post_content' => $default_home_content,
);
