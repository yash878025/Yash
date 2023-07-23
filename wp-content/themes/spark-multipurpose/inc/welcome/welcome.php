<?php
if (!class_exists('Spark_Multipurpose_Welcome')) :

    class Spark_Multipurpose_Welcome {

        public $tab_sections = array();
        public $theme_name = ''; // For storing Theme Name
        public $theme_version = ''; // For Storing Theme Current Version Information
        public $free_plugins = array(); // For Storing the list of the Recommended Free Plugins

        /**
         * Constructor for the Welcome Screen
         */

        public function __construct() {

            /** Useful Variables */
            $theme = wp_get_theme();
            $this->theme_name = $theme->Name;
            $this->theme_version = $theme->Version;

            /** Define Tabs Sections */
            $this->tab_sections = array(
                'getting_started' => esc_html__('Getting Started', 'spark-multipurpose'),
                'recommended_plugins' => esc_html__('Recommended Plugins', 'spark-multipurpose'),
                'support' => esc_html__('Support', 'spark-multipurpose'),
                'free_vs_pro' => esc_html__('Free Vs Pro', 'spark-multipurpose')
            );

            /** List of Recommended Free Plugins */
            /** List of Recommended Free Plugins **/
            $this->free_plugins = array(
                'sparkle-demo-importer' => array(
                    'name' => 'Sparkle Demo Importer',
                    'slug' => 'sparkle-demo-importer',
                    'filename' => 'sparkle-demo-importer',
                    'thumb_path' => 'https://ps.w.org/sparkle-demo-importer/assets/icon-256x256.png?rev=2429976'
                ),
                'patterns-kit' => array(
                    'name' => 'Patterns Kit',
                    'slug' => 'patterns-kit',
                    'filename' => 'plugins',
                    'thumb_path' => 'https://ps.w.org/patterns-kit/assets/icon-256x256.png'
                ),

                'contact-form-7' => array(
                    'name' => 'Contact Form 7',
                    'slug' => 'contact-form-7',
                    'filename' => 'contact-form-7',
                    'thumb_path' => 'https://ps.w.org/contact-form-7/assets/icon.svg?rev=2339255'
                ),
                'woocommerce' => array(
                    'name' => 'WooCommerce',
                    'slug' => 'woocommerce',
                    'filename' => 'woocommerce',
                    'thumb_path' => 'https://ps.w.org/woocommerce/assets/icon-256x256.png'
                )
            );
            
            /* Create a Welcome Page */
            add_action('admin_menu', array($this, 'welcome_register_menu'), 99);

            /* Enqueue Styles & Scripts for Welcome Page */
            add_action('admin_enqueue_scripts', array($this, 'welcome_styles_and_scripts'));

            /* Adds Footer Rating Text */
            add_filter('admin_footer_text', array($this, 'admin_footer_text'));

            /* Hide Notice */
            add_filter('wp_loaded', array($this, 'hide_admin_notice'), 10);

            /* Create a Welcome Page */
            add_action('wp_loaded', array($this, 'admin_notice'), 20);

            add_action('after_switch_theme', array($this, 'erase_hide_notice'));

            add_action('wp_ajax_spark_multipurpose_activate_plugin', array($this, 'activate_plugin'));
        }

        /** Trigger Welcome Message Notification */
        public function admin_notice($hook) {
            $hide_notice = get_option('spark_multipurpose_hide_notice');
            if (!$hide_notice) {
                add_action('admin_notices', array($this, 'admin_notice_content'));
            }
        }

        /** Welcome Message Notification */
        public function admin_notice_content() {
            $screen = get_current_screen();

            if ('appearance_page_spark-multipurpose-welcome' === $screen->id || (isset($screen->parent_file) && 'plugins.php' === $screen->parent_file && 'update' === $screen->id) || 'theme-install' === $screen->id) {
                return;
            }

            $slug = $filename = 'one-click-demo-import';
            ?>
            <div class="updated notice spark-multipurpose-welcome-notice">
                <div class="spark-multipurpose-welcome-notice-wrap">
                    <h2><?php esc_html_e('Congratulations!', 'spark-multipurpose'); ?></h2>
                    <p><?php printf(esc_html__('%1$s is now installed and ready to use. You can start either by importing the ready made demo or get started by customizing it your self.', 'spark-multipurpose'), $this->theme_name); ?></p>

                    <div class="spark-multipurpose-welcome-info">
                        <div class="spark-multipurpose-welcome-thumb">
                            <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/screenshot.png'); ?>" alt="<?php echo esc_attr__('Demos', 'spark-multipurpose'); ?>">
                        </div>

                        <?php
                        if ('appearance_page_sparkle-theme-demo-importer' !== $screen->id) {
                            ?>
                            <div class="spark-multipurpose-welcome-import">
                                <h3><?php esc_html_e('Import Demo', 'spark-multipurpose'); ?></h3>
                                <p><?php esc_html_e('Click below to install and active One Click Demo Importer Plugin, It\'s help you to import demo.', 'spark-multipurpose'); ?></p>
                                <p><?php echo $this->generate_demo_installer_button(); ?></p>
                            </div>
                            <?php
                        }
                        ?>

                        <div class="spark-multipurpose-welcome-getting-started">
                            <h3><?php esc_html_e('Get Started', 'spark-multipurpose'); ?></h3>
                            <p><?php printf(esc_html__('Here you will find all the necessary links and information on how to use %s.', 'spark-multipurpose'), $this->theme_name); ?></p>
                            <p><a href="<?php echo esc_url(admin_url('admin.php?page=spark-multipurpose-welcome')); ?>" class="button button-primary"><?php esc_html_e('Go to Setting Page', 'spark-multipurpose'); ?></a></p>
                        </div>
                    </div>

                    <a href="<?php echo wp_nonce_url(add_query_arg('spark_multipurpose_hide_notice', 1), 'spark_multipurpose_hide_notice_nonce', '_spark_multipurpose_notice_nonce'); ?>" class="notice-close"><?php esc_html_e('Dismiss', 'spark-multipurpose'); ?></a>
                </div>

            </div>
            <?php
        }

        /** Hide Admin Notice */
        public function hide_admin_notice() {
            if (isset($_GET['spark_multipurpose_hide_notice']) && isset($_GET['_spark_multipurpose_notice_nonce']) && current_user_can('manage_options')) {
                if (!wp_verify_nonce(wp_unslash($_GET['_spark_multipurpose_notice_nonce']), 'spark_multipurpose_hide_notice_nonce')) {
                    wp_die(esc_html__('Action Failed. Something is Wrong.', 'spark-multipurpose'));
                }

                update_option('spark_multipurpose_hide_notice', true);
            }
        }

        /** Register Menu for Welcome Page */
        public function welcome_register_menu() {
            add_theme_page(
                esc_html__('Welcome', 'spark-multipurpose'), 
                sprintf(esc_html__('%s', 'spark-multipurpose'),  'Theme Panel' ), 
                'manage_options', 
                'spark-multipurpose-welcome', 
                array($this, 'welcome_screen'), 
                1
            );
        }

        /** Welcome Page */
        public function welcome_screen() {
            $tabs = $this->tab_sections;
            ?>
            <div class="welcome-wrap">
                <div class="welcome-main-content">
                    <?php require_once get_template_directory() . '/inc/welcome/sections/header.php'; ?>

                    <div class="welcome-section-wrapper">
                        <?php $section = isset($_GET['section']) && array_key_exists($_GET['section'], $tabs) ? $_GET['section'] : 'getting_started'; ?>

                        <div class="welcome-section <?php echo esc_attr($section); ?> clearfix">
                            <?php require_once get_template_directory() . '/inc/welcome/sections/' . $section . '.php'; ?>
                        </div>
                    </div>
                </div>

                <div class="welcome-footer-content">
                    <?php require_once get_template_directory() . '/inc/welcome/sections/footer.php'; ?>
                </div>
            </div>
            <?php
        }

        /** Enqueue Necessary Styles and Scripts for the Welcome Page */
        public function welcome_styles_and_scripts($hook) {
            if ('theme-install.php' !== $hook) {
                $importer_params = array(
                    'installing_text' => esc_html__('Installing Demo Importer Plugin', 'spark-multipurpose'),
                    'activating_text' => esc_html__('Activating Demo Importer Plugin', 'spark-multipurpose'),
                    'importer_page' => esc_html__('Go to Demo Importer Page', 'spark-multipurpose'),
                    'importer_url' => admin_url('themes.php?page=sparkle-theme-demo-importer'),
                    'error' => esc_html__('Error! Reload the page and try again.', 'spark-multipurpose'),
                );
                wp_enqueue_style('spark-multipurpose-welcome', get_template_directory_uri() . '/inc/welcome/css/welcome.css', array());
                wp_enqueue_script('spark-multipurpose-welcome', get_template_directory_uri() . '/inc/welcome/js/welcome.js', array('plugin-install', 'updates'), '', true);
                wp_localize_script('spark-multipurpose-welcome', 'importer_params', $importer_params);
            }
        }

        /* Check if plugin is installed */

        public function check_plugin_installed_state($slug, $filename) {
            return file_exists(ABSPATH . 'wp-content/plugins/' . $slug . '/' . $filename . '.php') ? true : false;
        }

        /* Check if plugin is activated */

        public function check_plugin_active_state($slug, $filename) {
            return is_plugin_active($slug . '/' . $filename . '.php') ? true : false;
        }

        /** Generate Url for the Plugin Button */
        public function plugin_generate_url($status, $slug, $file_name) {
            switch ($status) {
                case 'install':
                    return wp_nonce_url(add_query_arg(array(
                        'action' => 'install-plugin',
                        'plugin' => esc_attr($slug)
                                    ), network_admin_url('update.php')), 'install-plugin_' . esc_attr($slug));
                    break;

                case 'inactive':
                    return add_query_arg(array(
                        'action' => 'deactivate',
                        'plugin' => rawurlencode(esc_attr($slug) . '/' . esc_attr($file_name) . '.php'),
                        'plugin_status' => 'all',
                        'paged' => '1',
                        '_wpnonce' => wp_create_nonce('deactivate-plugin_' . esc_attr($slug) . '/' . esc_attr($file_name) . '.php'),
                            ), network_admin_url('plugins.php'));
                    break;

                case 'active':
                    return add_query_arg(array(
                        'action' => 'activate',
                        'plugin' => rawurlencode(esc_attr($slug) . '/' . esc_attr($file_name) . '.php'),
                        'plugin_status' => 'all',
                        'paged' => '1',
                        '_wpnonce' => wp_create_nonce('activate-plugin_' . esc_attr($slug) . '/' . esc_attr($file_name) . '.php'),
                            ), network_admin_url('plugins.php'));
                    break;
            }
        }

        /** Ajax Plugin Activation */
        public function activate_plugin() {
            $slug = isset($_POST['slug']) ? $_POST['slug'] : '';
            $file = isset($_POST['file']) ? $_POST['file'] : '';
            $success = false;

            if (!empty($slug) && !empty($file)) {
                //patterns-plugin-activate
                activate_plugin('patterns-kit/plugins.php');

                $result = activate_plugin($slug . '/' . $file . '.php');
                update_option('spark_multipurpose_hide_notice', true);
                if (!is_wp_error($result)) {
                    $success = true;
                }
            }
            echo wp_json_encode(array('success' => $success));
            die();
        }

        /** Adds Footer Notes */
        public function admin_footer_text($text) {
            $screen = get_current_screen();

            if ('appearance_page_spark-multipurpose-welcome' == $screen->id) {
                $text = sprintf(esc_html__('Please leave us a %s rating if you like our theme . A huge thank you from SparkleThemes in advance!', 'spark-multipurpose'), '<a href="https://wordpress.org/support/theme/spark-multipurpose/reviews/?filter=5#new-post" target="_blank">&#9733;&#9733;&#9733;&#9733;&#9733;</a>');
            }

            return $text;
        }

        /** Generate One Click Demo Importer Plugin Install Button Link */
        public function generate_demo_installer_button() {
            $slug = $filename = 'sparkle-demo-importer';
            $import_url = '#';

            if ($this->check_plugin_installed_state($slug, $filename) && !$this->check_plugin_active_state($slug, $filename)) {
                $import_class = 'button button-primary spark-multipurpose-activate-plugin';
                $import_button_text = esc_html__('Activate Demo Importer Plugin', 'spark-multipurpose');
            } elseif ($this->check_plugin_installed_state($slug, $filename)) {
                $import_class = 'button button-primary';
                $import_button_text = esc_html__('Go to Demo Importer Page', 'spark-multipurpose');
                $import_url =  admin_url( '/themes.php?page=sparkle-theme-demo-importer' );
                
            } else {
                $import_class = 'button button-primary spark-multipurpose-install-plugin';
                $import_button_text = esc_html__('Install Demo Importer Plugin', 'spark-multipurpose');
            }
            return '<a data-slug="' . esc_attr($slug) . '" data-filename="' . esc_attr($filename) . '" class="' . esc_attr($import_class) . '" href="' . $import_url . '">' . esc_html($import_button_text) . '</a>';
        }

        public function erase_hide_notice() {
            delete_option('spark_multipurpose_hide_notice');
        }

    }

    new Spark_Multipurpose_Welcome();

endif;
