<header id="masthead" class="site-header headerone sticky-<?php echo esc_attr( get_theme_mod('spark_multipurpose_menu_sticky', 'disable') ); ?> ovarnav-<?php echo esc_attr( get_theme_mod('spark_multipurpose_menu_absolute', 'disable') ); ?>">
	<?php
	if( get_theme_mod('spark_multipurpose_top_header_enable', 'enable') == 'enable'):
		$top_header_class = get_theme_mod('spark_multipurpose_top_header_hide_show', json_encode(array(
			'desktop' => 'show',
			'tablet' => 'hide',
			'mobile' => 'hide'
		)));

		$top_class = get_spark_multipurpose_alignment_class($top_header_class);
		?>
		<div class="top-menu-bar <?php echo esc_attr($top_class); ?>">
			<div class="container">
				<div class="inner-row d-flex">
					<div class="top-bar-menu left">
						<?php
							$topheaderleft = get_theme_mod( 'spark_multipurpose_topheader_left', 'free_hand' );
							if($topheaderleft == 'quick_contact'){    
								spark_multipurpose_quick_contact();
							}else if($topheaderleft == 'social_media'){    
								spark_multipurpose_topheader_social();
							}else if($topheaderleft == 'free_hand'){    
								spark_multipurpose_topheader_free_hand();
							}else if($topheaderleft == 'top_menu'){
								wp_nav_menu( array( 'theme_location' => 'menu-2', 'depth' => 1 ) );
							}
							if(!in_array($topheaderleft, array('quick_contact', 'social_media', 'free_hand', 'top_menu'))) {
								echo apply_filters( 'spark_multipurpose_topheader_left_empty', '' );
							}
						?>
					</div>
					<div class="top-bar-menu right">
						<?php
							$topheaderright = get_theme_mod( 'spark_multipurpose_topheader_right', 'social_media' );
							if($topheaderright == 'quick_contact'){    
								spark_multipurpose_quick_contact();
							}else if($topheaderright == 'social_media'){    
								spark_multipurpose_topheader_social();
							}else if($topheaderright == 'free_hand'){    
								spark_multipurpose_topheader_free_hand();
							}if($topheaderright == 'top_menu'){
								wp_nav_menu( array( 'theme_location' => 'menu-2', 'depth' => 1 ) );
							}
							if(!in_array($topheaderright, array('quick_contact', 'social_media', 'free_hand', 'top_menu'))) {
								echo apply_filters( 'spark_multipurpose_topheader_right_empty', '' );
							}
						?>
					</div>
				</div>
			</div>
		</div>
	<?php
	endif; // top header
	
		$logo_alignment = get_theme_mod('spark_multipurpose_logo_alignement', json_encode(array(
			'desktop' => 'text-left',
			'tablet' => 'text-left',
			'mobile' => 'text-left'
		)));

		$logo_alignment_class = get_spark_multipurpose_alignment_class($logo_alignment);
	?>
	
    <div class="nav-classic">
	    <div class="container">
			<div class="inner-row d-flex">
				<div class="site-branding <?php echo esc_attr( $logo_alignment_class ); ?>">
					<div class="site-brandinglogo">
						<?php the_custom_logo(); ?>
						<h1 class="site-title">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<?php bloginfo( 'name' ); ?>
							</a>
						</h1>
						<?php 
							$spark_multipurpose_description = get_bloginfo( 'description', 'display' );
							if ( $spark_multipurpose_description || is_customize_preview() ) : ?>
								<p class="site-description"><?php echo $spark_multipurpose_description; /* WPCS: xss ok. */ ?></p>
						<?php endif; ?>
					</div>
					<button class="header-nav-toggle" data-toggle-target=".header-mobile-menu"  data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle">
						<div class="one"></div>
						<div class="two"></div>
						<div class="three"></div>
					</button><!-- Mobile navbar toggler -->
				</div> <!-- .site-branding -->

				<?php do_action('spark_multipurpose_quick_contact_info_header'); ?>
				
			</div>
			<?php
				$enable_search = get_theme_mod('spark_multipurpose_enable_search', 'enable');
				$search_layout = get_theme_mod('spark_multipurpose_search_layout', 'layout_one');
			?>
	    </div><!-- .container end -->
		<div class="nav-menu">
			<div class="container">
				<nav class="box-header-nav main-menu-wapper" aria-label="<?php esc_attr_e( 'Main Menu', 'spark-multipurpose' ); ?>" role="navigation">
					<?php
						wp_nav_menu( array(
								'theme_location'  => 'menu-1',
								'menu'            => 'primary-menu',
								'container'       => '',
								'container_class' => '',
								'container_id'    => '',
								'menu_class'      => 'main-menu',
							)
						);
						do_action('spark_multipurpose_nav_buttons');
					?>
					<?php if( $enable_search == 'enable' and $search_layout == 'layout_two'): ?>
						<div class="search-wrapper search-layout-two full-search-wrapper">
							<?php get_search_form(); ?>
							<div class="search-layout-two close-icon">
								<span><i class="fas fa-times"></i></span>
							</div>
						</div>
					<?php endif; ?>
				</nav>
			</div>
		</div>
	</div>
</header><!-- #masthead -->