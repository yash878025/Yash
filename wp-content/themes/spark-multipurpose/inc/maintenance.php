<?php
$spark_multipurpose_maintenance_date = get_theme_mod('spark_multipurpose_maintenance_date');
$date = str_replace('/', '-', $spark_multipurpose_maintenance_date);
$utcdate = date("D, d M Y H:i:s T", strtotime($date));
header("HTTP/1.1 503 Service Unavailable");
header("Retry-After: $utcdate");
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        <?php
            wp_head();
            $spark_multipurpose_maintenance_bg_type = get_theme_mod('spark_multipurpose_maintenance_bg_type', 'banner');
        ?>
    </head>
    <body class="<?php echo esc_attr($spark_multipurpose_maintenance_bg_type); ?>">
        <?php
            $spark_multipurpose_maintenance_logo = get_theme_mod('spark_multipurpose_maintenance_logo');
            $spark_multipurpose_maintenance_title = get_theme_mod('spark_multipurpose_maintenance_title', esc_html__('WEBSITE UNDER MAINTENANCE', 'spark-multipurpose'));
            $spark_multipurpose_maintenance_text = get_theme_mod('spark_multipurpose_maintenance_text', esc_html__('We are coming soon with new changes. Stay Tuned!', 'spark-multipurpose'));
            $spark_multipurpose_maintenance_banner_image = get_theme_mod('spark_multipurpose_maintenance_banner_image', get_template_directory_uri() . '/assets/images/bg.jpg');
            $spark_multipurpose_maintenance_bg_overlay_color = get_theme_mod('spark_multipurpose_maintenance_bg_overlay_color', 'rgba(255,255,255,0.35)');
            $spark_multipurpose_maintenance_title_color = get_theme_mod('spark_multipurpose_maintenance_title_color', '#FFFFFF');
            $spark_multipurpose_maintenance_text_color = get_theme_mod('spark_multipurpose_maintenance_text_color', '#FFFFFF');
            $spark_multipurpose_maintenance_counter_color = get_theme_mod('spark_multipurpose_maintenance_counter_color', '#FFFFFF');
            $spark_multipurpose_maintenance_social_icon_color = get_theme_mod('spark_multipurpose_maintenance_social_icon_color', '#FFFFFF');
        ?>
        <div class="maintenance-bg">
            <?php if (!empty($spark_multipurpose_maintenance_banner_image)) { ?>
                    <div class="maintenance-banner" style="background-image:url(<?php echo esc_url($spark_multipurpose_maintenance_banner_image) ?>)"></div>
            <?php } ?>
        </div>
        <div id="maintenance-page">
            <div class="maintenance-page animated fadeInUp">
                <header>
                    <?php if (!empty($spark_multipurpose_maintenance_logo)) { ?>
                        <div class="maintenance-logo">
                            <img src="<?php echo esc_url($spark_multipurpose_maintenance_logo) ?>" alt="Logo">
                        </div>
                    <?php } ?>

                    <?php if (!empty($spark_multipurpose_maintenance_title)) { ?>
                        <h1><?php echo esc_html($spark_multipurpose_maintenance_title) ?></h1>
                    <?php } ?>

                    <?php echo wp_kses_post($spark_multipurpose_maintenance_text); ?>
                </header>
                <?php if ($spark_multipurpose_maintenance_date) { ?>
                    <div class="maintenance-countdown"></div>
                    <script>
                        jQuery(function ($) {
                            $('.maintenance-countdown').countdown('<?php echo $spark_multipurpose_maintenance_date; ?>', function (event) {
                                var $this = $(this).html(event.strftime(''
                                        + '<div class="count-label"><span>%D</span><label><?php echo __('Days', 'spark-multipurpose'); ?></label></div>'
                                        + '<div class="count-label"><span>%H</span><label><?php echo __('Hours', 'spark-multipurpose'); ?></label></div>'
                                        + '<div class="count-label"><span>%M</span><label><?php echo __('Minutes', 'spark-multipurpose'); ?></label></div>'
                                        + '<div class="count-label"><span>%S</span><label><?php echo __('Seconds', 'spark-multipurpose'); ?></label></div>'));
                            });
                        });
                    </script>
                <?php } ?>
                <footer>
                    <div class="maintenance-social">
                        <?php
                        do_action('spark_multipurpose_social_icons');
                        ?>
                    </div>
                </footer>
            </div>
        </div>
        <style type="text/css">
            .maintenance-bg:after{
                background-color: <?php echo $spark_multipurpose_maintenance_bg_overlay_color; ?>
            }
            #maintenance-page{
                color: <?php echo $spark_multipurpose_maintenance_text_color; ?>
            }
            #maintenance-page h1,
            #maintenance-page h2,
            #maintenance-page h3,
            #maintenance-page h4,
            #maintenance-page h5,
            #maintenance-page h6{
                color: <?php echo $spark_multipurpose_maintenance_title_color; ?>
            }
            #maintenance-page .maintenance-countdown *{
                color: <?php echo $spark_multipurpose_maintenance_counter_color; ?>
            }
            .maintenance-social a{
                border-color: <?php echo $spark_multipurpose_maintenance_social_icon_color; ?>;
                color: <?php echo $spark_multipurpose_maintenance_social_icon_color; ?>;
            }


            /*********
            *Maintenance Mode
            */
            #maintenance-page {
                min-height: 100vh;
                position: relative;
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                align-items: center;
                text-align: center;
            }

            .maintenance-bg {
                position: fixed;
                left: 0;
                top: 0;
                right: 0;
                bottom: 0;
            }

            .maintenance-bg:after {
                content: "";
                position: absolute;
                left: 0;
                top: 0;
                bottom: 0;
                right: 0;
                z-index: 9;
            }

            .maintenance-bg:after {
                background-image: url(assets/images/dot.png);
            }

            .maintenance-page {
                max-width: 1000px;
                margin: 0 auto;
                padding: 50px;
            }

            .maintenance-banner {
                min-height: 100%;
                background-size: cover;
                background-position: center;
            }

            .maintenance-logo {
                margin-bottom: 40px;
            }

            .maintenance-countdown {
                margin: 60px 0 50px;
            }

            .maintenance-countdown>.count-label {
                display: inline-block;
                margin: 0 40px 30px;
            }

            .maintenance-countdown>.count-label span {
                display: block;
                font-size: 60px;
                line-height: 1.1;
                margin-bottom: 5px;
                font-weight: bold;
            }

            .maintenance-countdown>.count-label label {
                text-transform: uppercase;
            }

            .maintenance-social ul li {
                display: inline;
                list-style: none;
            }

            .maintenance-social a {
                font-size: 18px;
                margin: 0 15px;
                border: 1px solid var(--white-color);
                height: 44px;
                width: 44px;
                line-height: 44px;
                text-align: center;
                display: inline-block;
                -webkit-transform: rotate(45deg);
                transform: rotate(45deg);
            }

            .maintenance-social a i {
                -webkit-transform: rotate(-45deg);
                transform: rotate(-45deg);
                display: block;
                height: 44px;
                width: 44px;
                line-height: 44px;
            }

        </style>
        <?php wp_footer(); ?>
    </body>
</html>