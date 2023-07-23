<div class="menu-modal header-mobile-menu cover-modal header-footer-group" data-modal-target-string=".menu-modal">
    <div class="menu-modal-inner modal-inner">
        <div class="menu-wrapper section-inner">
            <div class="menu-top">

                <button class="toggle close-nav-toggle" data-toggle-target=".menu-modal" data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".menu-modal">
                    <span class="toggle-text"><?php esc_html_e( 'Close', 'spark-multipurpose' ); ?></span>
                    <i class="fas fa-times"></i>
                </button>

                <div class='custom-tab-wrap'>
                    <div class="custom-tab-content we-tab-content">
                        <div class="custom-tab-menu-content tab-content" id="custom-content-menu1">
                            <nav class="mobile-menu" aria-label="<?php esc_attr_e( 'Mobile', 'spark-multipurpose' ); ?>" role="navigation">
                                <ul class="modal-menu">
                                    <?php
                                       
                                        wp_nav_menu(
                                            array(
                                                'container'      => '',
                                                'items_wrap'     => '%3$s',
                                                'show_toggles'   => true,
                                                'theme_location' => 'menu-1',
                                            )
                                        );
                                    ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if( get_theme_mod('spark_multipurpose_menu_sidebar', 'disable') == 'enable'): ?>
<div class="menu-modal header-sidebar-content cover-modal header-footer-group" data-modal-target-string=".menu-modal">
    <div class="menu-modal-inner modal-inner">
        <div class="menu-wrapper section-inner">
            <div class="menu-top">

                <button class="toggle close-nav-toggle" data-toggle-target=".header-sidebar-content" data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".header-sidebar-content">
                    <span class="toggle-text"><?php esc_html_e( 'Close', 'spark-multipurpose' ); ?></span>
                    <i class="fas fa-times"></i>
                </button><!-- .nav-toggle -->
                
                <div class='custom-tab-wrap'>
                    <div class="custom-tab-content we-tab-content">
                        <div class="custom-tab-menu-content sidebar-content" id="custom-content-menu1">
                            <?php dynamic_sidebar( 'menu-sidebar' ); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php endif; ?>