<div class="welcome-getting-started">
    <div class="welcome-demo-import">
        <h3><?php echo esc_html__('Manual Setup', 'spark-multipurpose'); ?></h3>

        <p><?php echo esc_html__('If you want to change default homage page with your own created page, Go to settings > reading and set your page.', 'spark-multipurpose'); ?></p>
        
        <h3><strong><?php echo esc_html__('Theme Customizer Home Page', 'spark-multipurpose'); ?></strong></h3>
        <ol>
            <li><?php echo esc_html__('Go to Apprance >> Customizer >> Enable Front Page and then enable the Front Page.', 'spark-multipurpose'); ?></li>
            <li><?php echo esc_html__('After enable the front page you have Home Page section on customizer', 'spark-multipurpose'); ?></li>
            <li><?php echo esc_html__('Now customize home page sections and meke your own home page.', 'spark-multipurpose'); ?></li>
        </ol>
        
    </div>

    <div class="welcome-demo-import">
        <h3><?php echo esc_html__('Demo Importer', 'spark-multipurpose'); ?></h3>
        <div class="welcome-theme-thumb">
            <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/screenshot.png'); ?>" alt="<?php printf(esc_attr__('%s Demo', 'spark-multipurpose'), $this->theme_name); ?>">
        </div>

        <div class="welcome-demo-import-text">
            <p><?php esc_html_e('Or you can get started by importing the demo with just one click.', 'spark-multipurpose'); ?></p>
            <p><?php echo sprintf(esc_html__('Click on the button below to install and activate the One Click Demo Importer Plugin. For more detailed documentation on how the demo importer works, click %s.', 'spark-multipurpose'), '<a href="'.esc_url('https://docs.sparklewpthemes.com/spark-multipurpose/').'" target="_blank">' . esc_html__('here', 'spark-multipurpose') . '</a>'); ?></p>
            <?php echo $this->generate_demo_installer_button(); ?>
        </div>
    </div>
</div>