<?php
    
function spark_multipurpose_starter_content_setup(){

    add_theme_support( 'starter-content', array(
        'posts' => array(
            'home'    => require __DIR__ . '/home.php',
            'contact' => require __DIR__ . '/contact.php',
            'services' => require __DIR__ . '/service.php',
            'about' => require __DIR__ . '/about.php',
            'pricing' => require __DIR__ . '/pricing.php',
            'footer' => require __DIR__ . '/footer.php',
        ),
        
        'options' => array(
            'show_on_front' => 'page',
            'page_on_front' => '{{home}}',
            'page_for_posts' => '{{blog}}',
            // Our Custom
            'blogdescription' => 'Just another WordPress site ',
            
        ),

        'theme_mods'  => array(
            'spark_multipurpose_menu_sticky' => 'enable',
            'spark_multipurpose_enable_frontpage' => 'disable',
            'spark_multipurpose_primary_color' => apply_filters('spark_multipurpose_primary_color', '#796eff'),
            'spark_multipurpose_page_sidebar' => 'right',
            
            /** quick contact info for header */
            'spark_multipurpose_top_header_enable' => 'enable',
            'spark_multipurpose_search_layout' => 'layout_one',
            


            'spark_multipurpose_breadcrumbs_image' => get_template_directory_uri() . '/assets/default/slider2.jpg',

            'spark_multipurpose_banner_slider_section' => 'disable',
            'spark_multipurpose_slider_type' => 'video',
            'spark_multipurpose_video_banner_url' => 'aBaAQj8MtCM',
            
            'spark_multipurpose_promoservice_section_disable' => 'enable',
            'spark_multipurpose_promoservice_type' => 'advance',
            'spark_multipurpose_promoservice_super_title' => 'Services',
            'spark_multipurpose_promoservice_title' => 'Our Services',

            /**
             * How It Works
             */
            'spark_multipurpose_how_it_works_section_disable' => 'enable',
            'spark_multipurpose_how_it_works_type' => 'default',
            'spark_multipurpose_how_it_works_super_title' => 'How it works',
            'spark_multipurpose_how_it_works_title' => 'How we start works?',
            'spark_multipurpose_how_it_works_page' => json_encode(array(
                array(
                    'block_page' => '2',
                ),
                array(
                    'block_page' => '2',
                ),
                array(
                    'block_page' => '2',
                ),
            )),


            /** testimonial */
            'spark_multipurpose_testimonial_section_disable' => 'enable',
            'spark_multipurpose_testimonial_subtitle' => '40,000+ HAPPY CUSTOMERS',
            'spark_multipurpose_testimonial_title' => 'Read what our customers say',
            'spark_multipurpose_testimonial_page' => json_encode(array(
                array(
                    'testimonial_page' => '2',
                    'designation'=>'Founder',
                    'rating'    => '5',
                    'facebook_url' => '#',
                    'twitter_url' => '#',
                    'youtube_url' => '#',
                    'instagram_url' => '#',
                    'linkedin_url' => '',
                ),
                array(
                    'testimonial_page' => '2',
                    'designation'=>'Marketing',
                    'rating'    => '5',
                    'facebook_url' => '#',
                    'twitter_url' => '#',
                    'youtube_url' => '#',
                    'instagram_url' => '#',
                    'linkedin_url' => '',
                )

            )),


            'spark_multipurpose_aboutus_service_section' => 'disable',
            'spark_multipurpose_aboutus' => '{{about}}',

            
            /**
             * Video Call to Action
             */

            'spark_multipurpose_video_calltoaction_section_disable' => 'enable',
            'spark_multipurpose_video_button_url' => '#',
            'spark_multipurpose_appointment_title' => 'We are Digital Agency & Marketing Expert',
            'spark_multipurpose_appointment_subtitle' => 'More traffic for your agency website?',
            'spark_multipurpose_video_calltoaction_title_color' => '#fff',


            /** footer page */
            'spark_multipurpose_footer_content' => '{{footer}}',


            /** our service section */
            'spark_multipurpose_service_title' => 'Our Best Quality Services',
            'spark_multipurpose_service_sub_title' => 'In auctor ex id urna faucibus porttitor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In maximus ligula semper metus pellentesque mattis.',
            'spark_multipurpose_service_type' => 'advance',
            'spark_multipurpose_service_advance' => json_encode(array(
				array(
                    'image' => get_template_directory_uri() . '/assets/default/interior-five.jpg',
					'icon' => 'fas fa-snowflake',
					'title' => 'Office Building',
					'content' => 'In auctor ex id urna faucibus porttitor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In maximus ligula semper metus pellentesque mattis.',
					'link_text' => 'Read More',
					'link' => '#',
					'enable' => 'on'
                ),
                array(
                    'image' => get_template_directory_uri() . '/assets/default/slider2.jpg',
					'icon' => 'fas fa-snowflake',
					'title' => 'Crane Service',
					'content' => 'In auctor ex id urna faucibus porttitor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In maximus ligula semper metus pellentesque mattis.',
					'link_text' => 'Read More',
					'link' => '#',
					'enable' => 'on'
				),
                array(
                    'image' => get_template_directory_uri() . '/assets/default/interior-five.jpg',
					'icon' => 'fas fa-snowflake',
					'title' => 'Electrical Wiring',
					'content' => 'In auctor ex id urna faucibus porttitor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In maximus ligula semper metus pellentesque mattis.',
					'link_text' => 'Read More',
					'link' => '#',
					'enable' => 'on'
				)
			)),

            /** counter section */
            'spark_multipurpose_counter_section_disable' => 'enable',

            'spark_multipurpose_counter_title' => '25 Years Of Experience',
            'spark_multipurpose_counter_super_title' => '400+ Customer',
            'spark_multipurpose_counter' => json_encode(array(
		        array(
		            'counter_icon'  =>'fas fa-wind',
		            'counter_title'  =>'Project Done',
					'counter_number'  =>'2500',	            
					'counter_prefix' => '+',
					'counter_suffix' => ''
				),
				array(
		            'counter_icon'  =>'fas fa-pencil-alt',
		            'counter_title'  =>'Employees',
					'counter_number'  =>'1200',	            
					'counter_prefix' => '+',
					'counter_suffix' => ''
				),
				array(
		            'counter_icon'  =>'fas fa-bolt',
		            'counter_title'  =>'Awards Won',
					'counter_number'  =>'2500',	            
					'counter_prefix' => '+',
					'counter_suffix' => ''
				),
				array(
		            'counter_icon'  =>'fab fa-github-alt',
		            'counter_title'  =>'Happy Clients',
					'counter_number'  =>'3000',	            
					'counter_prefix' => '+',
					'counter_suffix' => ''
				),
            )),


            /** clients section */
            'spark_multipurpose_client_section_disable' => 'enable',
            'spark_multipurpose_client_title' => 'Our Clients',
            'spark_multipurpose_client_super_title' => 'Trusted Brands',
            'spark_multipurpose_client' => json_encode(array(
		        array(
		            'client_image' => 'https://demo.sptheme.com/spark-multipurpose/insurance/wp-content/uploads/sites/6/2023/06/22_Home_01.png',
		            'client_link'  => '#',
                ),
                array(
		            'client_image' => 'https://demo.sptheme.com/spark-multipurpose/insurance/wp-content/uploads/sites/6/2023/06/23_Home_01.png',
		            'client_link'  => '#',
		        ),
                array(
		            'client_image' => 'https://demo.sptheme.com/spark-multipurpose/insurance/wp-content/uploads/sites/6/2023/06/21_Home_01.png',
		            'client_link'  => '#',
		        )
            )),

            
        ),

        'nav_menus' => array(
            'menu-1' => array(
				'name' => __( 'Top Menu', 'spark-multipurpose' ),
				'items' => array(
					'page_home',
					'page_about',
					'page_blog',
					
					
                    
					'page_service' => array(
						'type' => 'post_type',
						'object' => 'page',
						'object_id' => '{{services}}',
					),
                    'page_pricing' => array(
						'type' => 'post_type',
						'object' => 'page',
						'object_id' => '{{pricing}}',
					),

                    'page_contact',
				),
			),
		),
    ));
}
add_action( 'after_setup_theme', 'spark_multipurpose_starter_content_setup' );