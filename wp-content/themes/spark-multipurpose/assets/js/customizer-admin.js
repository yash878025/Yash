(function (api) {

    // Extends our custom "spark-multipurpose" section.
    api.sectionConstructor[ 'spark-multipurpose' ] = api.Section.extend({

        // No events for this type of section.
        attachEvents: function () { },

        // Always make the section active.
        isContextuallyActive: function () {
            return true;
        }
    });

})(wp.customize);

jQuery(document).ready(function ($) {

    /**
     * Customizer Option Auto focus
     */
    jQuery('h3.accordion-section-title').on('click', function () {
        var id = $(this).parent().attr('id');
        if (id == '' || id == undefined) {
            return;
        }
        var is_panel = id.includes("panel");
        var is_section = id.includes("section");

        if (is_panel) {
            focus_item = id.replace('accordion-panel-', '');
            history.pushState({}, null, '?autofocus[panel]=' + focus_item);
        }
        if (is_section) {
            focus_item = id.replace('accordion-section-', '');
            history.pushState({}, null, '?autofocus[section]=' + focus_item);
        }
    });

    // load to section 
    var v = location.search
    if (v.includes('panel')) {
    } else {
        var section = v.replace('?autofocus[section]=', '');

        setTimeout(function () {
            if (section) {
                section = 'accordion-section-' + section;
                spark_multipurpose_ScrollToSection(section);
            }
        }, 10000);

    }

    /**
     * Typpography
     * common_header_typography
     */
    wp.customize('common_header_typography', function (setting) {
        var CommonTypography = function (control) {
            var visibility = function () {
                if (setting.get()) {
                    control.container.removeClass('customizer-hidden');
                } else {
                    control.container.addClass('customizer-hidden');
                }
            };
            visibility();
            setting.bind(visibility);
        };

        var SeperateTypography = function (control) {
            var visibility = function () {
                if (setting.get()) {
                    control.container.addClass('customizer-hidden');
                } else {
                    control.container.removeClass('customizer-hidden');
                }
            };
            visibility();
            setting.bind(visibility);
        };

        wp.customize.control('h_typography', CommonTypography);
        wp.customize.control('header_typography_note', CommonTypography);
        wp.customize.control('header_typography_nav', SeperateTypography);
        wp.customize.control('h1_typography_heading', SeperateTypography);
        wp.customize.control('h1_typography', SeperateTypography);
        wp.customize.control('h2_typography_heading', SeperateTypography);
        wp.customize.control('h2_typography', SeperateTypography);
        wp.customize.control('h3_typography_heading', SeperateTypography);
        wp.customize.control('h3_typography', SeperateTypography);
        wp.customize.control('h4_typography_heading', SeperateTypography);
        wp.customize.control('h4_typography', SeperateTypography);
        wp.customize.control('h5_typography_heading', SeperateTypography);
        wp.customize.control('h5_typography', SeperateTypography);
        wp.customize.control('h6_typography_heading', SeperateTypography);
        wp.customize.control('h6_typography', SeperateTypography);
    });

    /***********
     * slider type
    */
    wp.customize('spark_multipurpose_slider_type', function (setting) {

        /** Default Slider Banner */
        var defaultSlider = function (control) {
            var visibility = function () {
                if ('default' === setting.get()) {
                    control.container.removeClass('customizer-hidden');
                } else {
                    control.container.addClass('customizer-hidden');
                }
            };
            visibility();
            setting.bind(visibility);
        };

        /** Advance Slider Banner */
        var advanceSlider = function (control) {
            var visibility = function () {
                if ('advance' === setting.get()) {
                    control.container.removeClass('customizer-hidden');
                } else {
                    control.container.addClass('customizer-hidden');
                }
            };
            visibility();
            setting.bind(visibility);
        };

        /** Video Banner */
        var setupControlSliderVideo = function (control) {
            var visibility = function () {
                if ('video' === setting.get()) {
                    control.container.removeClass('customizer-hidden');
                } else {
                    control.container.addClass('customizer-hidden');
                }
            };
            visibility();
            setting.bind(visibility);
        };

        /** Slider Controls */
        var setupControlSliderSettings = function (control) {
            var visibility = function () {
                if ('default' === setting.get() || 'advance' === setting.get()) {
                    control.container.removeClass('customizer-hidden');
                } else {
                    control.container.addClass('customizer-hidden');
                }
            };
            visibility();
            setting.bind(visibility);
        };

        wp.customize.control('spark_multipurpose_banner_sliders', defaultSlider);

        /** Advance Slider Banner */
        wp.customize.control('spark_multipurpose_slider_advance_settings', advanceSlider);

        /** Video Banner */
        wp.customize.control('spark_multipurpose_video_banner_url', setupControlSliderVideo);

        /** Slider Controls */
        wp.customize.control('slider-controls', setupControlSliderSettings);

    });

    /*****
     * About Us Progress Bar 
    */
    wp.customize('spark_multipurpose_aboutus_progressbar', function (setting) {
        var ProgressBar = function (control) {
            var visibility = function () {
                if ('enable' === setting.get()) {
                    control.container.removeClass('customizer-hidden');
                } else {
                    control.container.addClass('customizer-hidden');
                }
            };
            visibility();
            setting.bind(visibility);
        };

        wp.customize.control('spark_multipurpose_progressbar', ProgressBar);
    });

    /**
     * How It Works
    */
    wp.customize('spark_multipurpose_how_it_works_type', function (setting) {
        var setupControlItDefault = function (control) {
            var visibility = function () {
                if ('default' === setting.get()) {
                    control.container.removeClass('customizer-hidden');
                } else {
                    control.container.addClass('customizer-hidden');
                }
            };
            visibility();
            setting.bind(visibility);
        };

        var setupControlItAdvance = function (control) {
            var visibility = function () {
                if ('advance' === setting.get()) {
                    control.container.removeClass('customizer-hidden');
                } else {
                    control.container.addClass('customizer-hidden');
                }
            };
            visibility();
            setting.bind(visibility);
        };

        wp.customize.control('spark_multipurpose_how_it_works_page', setupControlItDefault);
        wp.customize.control('spark_multipurpose_how_it_works_advance_settings', setupControlItAdvance);

    });
    /**
     * promofeatures 
    */
    wp.customize('spark_multipurpose_promoservice_type', function (setting) {
        var setupControlDefault = function (control) {
            var visibility = function () {
                if ('default' === setting.get()) {
                    control.container.removeClass('customizer-hidden');
                } else {
                    control.container.addClass('customizer-hidden');
                }
            };
            visibility();
            setting.bind(visibility);
        };

        var setupControlAdvance = function (control) {
            var visibility = function () {
                if ('advance' === setting.get()) {
                    control.container.removeClass('customizer-hidden');
                } else {
                    control.container.addClass('customizer-hidden');
                }
            };
            visibility();
            setting.bind(visibility);
        };

        wp.customize.control('spark_multipurpose_promoservice', setupControlDefault);
        wp.customize.control('spark_multipurpose_promoservice_advance_settings', setupControlAdvance);

    });

    // promo service icon option
    wp.customize('spark_multipurpose_promoservice_show_icon', function (setting) {
        var icon = function (control) {
            var visibility = function () {
                if ('enable' === setting.get()) {
                    control.container.removeClass('customizer-hidden');
                } else {
                    control.container.addClass('customizer-hidden');
                }
            };
            visibility();
            setting.bind(visibility);
        };

        wp.customize.control('spark_multipurpose_promoservice_icon_style', icon);
    });

    /**
     * testimonials 
    */
    wp.customize('spark_multipurpose_testimonial_type', function (setting) {
        var setupControlDefault = function (control) {
            var visibility = function () {
                if ('normal' === setting.get()) {
                    control.container.removeClass('customizer-hidden');
                } else {
                    control.container.addClass('customizer-hidden');
                }
            };
            visibility();
            setting.bind(visibility);
        };

        var setupControlAdvance = function (control) {
            var visibility = function () {
                if ('advance' === setting.get()) {
                    control.container.removeClass('customizer-hidden');
                } else {
                    control.container.addClass('customizer-hidden');
                }
            };
            visibility();
            setting.bind(visibility);
        };

        wp.customize.control('spark_multipurpose_testimonials', setupControlDefault);
        wp.customize.control('spark_multipurpose_testimonial', setupControlAdvance);

    });

    /**
    * Service
   */
    wp.customize('spark_multipurpose_service_type', function (setting) {
        var setupControlDefault = function (control) {
            var visibility = function () {
                if ('default' === setting.get()) {
                    control.container.removeClass('customizer-hidden');
                } else {
                    control.container.addClass('customizer-hidden');
                }
            };
            visibility();
            setting.bind(visibility);
        };

        var setupControlAdvance = function (control) {
            var visibility = function () {
                if ('advance' === setting.get()) {
                    control.container.removeClass('customizer-hidden');
                } else {
                    control.container.addClass('customizer-hidden');
                }
            };
            visibility();
            setting.bind(visibility);
        };

        wp.customize.control('spark_multipurpose_service_button', setupControlDefault);
        wp.customize.control('spark_multipurpose_service', setupControlDefault);
        wp.customize.control('spark_multipurpose_service_advance_settings', setupControlAdvance);

    });
    // Layout One Feature Image ( Service )
    wp.customize('spark_multipurpose_service_layout', function (setting) {
        var featuresImage = function (control) {
            var visibility = function () {
                if ('style1' === setting.get()) {
                    control.container.removeClass('customizer-hidden');
                } else {
                    control.container.addClass('customizer-hidden');
                }
            };
            visibility();
            setting.bind(visibility);
        };

        wp.customize.control('spark_multipurpose_service_bg_url', featuresImage);
    });

    /*****
     * Contact section 
    */
    wp.customize('spark_multipurpose_show_contact_detail', function (setting) {
        var showSocial = function (control) {
            var visibility = function () {
                if ('enable' === setting.get()) {
                    control.container.removeClass('customizer-hidden');
                } else {
                    control.container.addClass('customizer-hidden');
                }
            };
            visibility();
            setting.bind(visibility);
        };

        wp.customize.control('spark_multipurpose_contact_shortcode', showSocial);
        wp.customize.control('spark_multipurpose_contact_details_heading_right', showSocial);
        wp.customize.control('spark_multipurpose_contact_details_right_heading', showSocial);
        wp.customize.control('spark_multipurpose_contact_details', showSocial);
        wp.customize.control('spark_multipurpose_contact_social_icons', showSocial);
        wp.customize.control('spark_multipurpose_contact_social_link', showSocial);
    });

    wp.customize('spark_multipurpose_contact_social_icons', function (setting) {
        var showSociallink = function (control) {
            var visibility = function () {
                if ('enable' === setting.get()) {
                    control.container.removeClass('customizer-hidden');
                } else {
                    control.container.addClass('customizer-hidden');
                }
            };
            visibility();
            setting.bind(visibility);
        };

        wp.customize.control('spark_multipurpose_contact_social_link', showSociallink);
    });

    /****
     * Call To Action Section ( Hide Unused Fields )
    */
    wp.customize('spark_multipurpose_calltoaction_section_disable', function (setting) {
        var setupControlDefault = function (control) {
            var visibility = function () {
                if ('disable' === setting.get()) {
                    control.container.removeClass('customizer-hidden');
                } else {
                    control.container.addClass('customizer-hidden');
                }
            };
            visibility();
            setting.bind(visibility);
        };
        wp.customize.control('spark_multipurpose_video_calltoaction_super_title_color', setupControlDefault);
    });


    /******
     * social icon click event 
    */
    $('body').on('click', '#customize-control-spark_multipurpose_contact_quick_link a, #customize-control-spark_multipurpose_maintenance_social a, #customize-control-spark_multipurpose_topheader_social_link a, #customize-control-spark_multipurpose_social_link_left a, #customize-control-spark_multipurpose_contact_social_link a', function (e) {
        e.preventDefault();
        wp.customize.section('spark_multipurpose_social_section').expand();
        return false;
    });

    /******
     * Quick info click event 
    */
    $('body').on('click', '#customize-control-spark_multipurpose_topheader_quick_link a', function (e) {
        e.preventDefault();
        wp.customize.section('spark_multipurpose_quick_info').expand();
        return false;
    });

    /******
     * Select Multiple Category
    */
    $('.customize-control-checkbox-multiple input[type="checkbox"]').on('change', function () {

        var checkbox_values = $(this).parents('.customize-control').find('input[type="checkbox"]:checked').map(
            function () {
                return $(this).val();
            }
        ).get().join(',');

        $(this).parents('.customize-control').find('input[type="hidden"]').val(checkbox_values).trigger('change');

    });

    // Homepage section - control visiblity toggle
    var settingIds = [ 'slider', 'service', 'aboutus', 'video_calltoaction', 'calltoaction', 'counter', 'testimonial', 'blog', 'team', 'client', 'promoservice', 'titlebar', 'contact', 'producttype', 'productcat', 'producthotoffer', 'recentwork', 'pricing', 'tab', 'how_it_works', 'th_content', 'header', 'footer' ];

    $.each(settingIds, function (i, settingId) {
        wp.customize('spark_multipurpose_' + settingId + '_bg_type', function (setting) {
            var setupControlColorBg = function (control) {
                var visibility = function () {
                    if ('color-bg' === setting.get() || 'image-bg' === setting.get()) {
                        control.container.removeClass('customizer-hidden');
                    } else {
                        control.container.addClass('customizer-hidden');
                    }
                };
                visibility();
                setting.bind(visibility);
            };

            var setupControlImageBg = function (control) {
                var visibility = function () {
                    if ('image-bg' === setting.get()) {
                        control.container.removeClass('customizer-hidden');
                    } else {
                        control.container.addClass('customizer-hidden');
                    }
                };
                visibility();
                setting.bind(visibility);
            };

            var setupControlVideoBg = function (control) {
                var visibility = function () {
                    if ('video-bg' === setting.get()) {
                        control.container.removeClass('customizer-hidden');
                    } else {
                        control.container.addClass('customizer-hidden');
                    }
                };
                visibility();
                setting.bind(visibility);
            };

            var setupControlGradientBg = function (control) {
                var visibility = function () {
                    if ('gradient-bg' === setting.get()) {
                        control.container.removeClass('customizer-hidden');
                    } else {
                        control.container.addClass('customizer-hidden');
                    }
                };
                visibility();
                setting.bind(visibility);
            };

            var setupControlOverlay = function (control) {
                var visibility = function () {
                    if ('none' === setting.get() || 'color-bg' === setting.get() || 'gradient-bg' === setting.get()) {
                        control.container.addClass('customizer-hidden');
                    } else {
                        control.container.removeClass('customizer-hidden');
                    }
                };
                visibility();
                setting.bind(visibility);
            };

            wp.customize.control('spark_multipurpose_' + settingId + '_bg_color', setupControlColorBg);
            wp.customize.control('spark_multipurpose_' + settingId + '_bg_image', setupControlImageBg);
            wp.customize.control('spark_multipurpose_' + settingId + '_bg_image_url', setupControlImageBg);

            wp.customize.control('spark_multipurpose_' + settingId + '_bg_video', setupControlVideoBg);
            wp.customize.control('spark_multipurpose_' + settingId + '_bg_gradient', setupControlGradientBg);
            wp.customize.control('spark_multipurpose_' + settingId + '_overlay_color', setupControlOverlay);
        });

        /** container area */
        wp.customize('spark_multipurpose_' + settingId + '_content_bg_type', function (setting) {
            var setupControlColorBg = function (control) {
                var visibility = function () {
                    if ('color-bg' === setting.get() || 'image-bg' === setting.get()) {
                        control.container.removeClass('customizer-hidden');
                    } else {
                        control.container.addClass('customizer-hidden');
                    }
                };
                visibility();
                setting.bind(visibility);
            };

            var setupControlGradientBg = function (control) {
                var visibility = function () {
                    if ('gradient-bg' === setting.get()) {
                        control.container.removeClass('customizer-hidden');
                    } else {
                        control.container.addClass('customizer-hidden');
                    }
                };
                visibility();
                setting.bind(visibility);
            };

            wp.customize.control('spark_multipurpose_' + settingId + '_content_bg_color', setupControlColorBg);
            wp.customize.control('spark_multipurpose_' + settingId + '_content_bg_gradient', setupControlGradientBg);

        });


    });


    /**********
     * Disable Some Value in Customizer
     */
    jQuery("#_customize-input-spark_multipurpose_titlebar_section_seperator option[value='top']").attr("disabled", "disabled");
    jQuery("#_customize-input-spark_multipurpose_titlebar_section_seperator option[value='top-bottom']").attr("disabled", "disabled");


    $.each(settingIds, function (i, settingId) {
        wp.customize('spark_multipurpose_' + settingId + '_section_seperator', function (setting) {

            var setupTopSeperator = function (control) {
                var visibility = function () {
                    if ('top' === setting.get() || 'top-bottom' === setting.get()) {
                        control.container.removeClass('customizer-hidden');
                    } else {
                        control.container.addClass('customizer-hidden');
                    }
                };
                visibility();
                setting.bind(visibility);
            };

            var setupBottomSeperator = function (control) {
                var visibility = function () {
                    if ('bottom' === setting.get() || 'top-bottom' === setting.get()) {
                        control.container.removeClass('customizer-hidden');
                    } else {
                        control.container.addClass('customizer-hidden');
                    }
                };
                visibility();
                setting.bind(visibility);
            };

            wp.customize.control('spark_multipurpose_' + settingId + '_seperator1', setupTopSeperator);
            wp.customize.control('spark_multipurpose_' + settingId + '_top_seperator', setupTopSeperator);
            wp.customize.control('spark_multipurpose_' + settingId + '_ts_color', setupTopSeperator);
            wp.customize.control('spark_multipurpose_' + settingId + '_ts_height', setupTopSeperator);
            wp.customize.control('spark_multipurpose_' + settingId + '_seperator2', setupBottomSeperator);
            wp.customize.control('spark_multipurpose_' + settingId + '_bottom_seperator', setupBottomSeperator);
            wp.customize.control('spark_multipurpose_' + settingId + '_bs_color', setupBottomSeperator);
            wp.customize.control('spark_multipurpose_' + settingId + '_bs_height', setupBottomSeperator);
        });
    });

    //Homepage Section Sortable
    function spark_multipurpose_sections_order (container) {
        var sections = $(container).sortable('toArray');
        var sec_ordered = [];
        $.each(sections, function (index, sec_id) {
            sec_id = sec_id.replace("accordion-section-", "");
            sec_ordered.push(sec_id);
        });

        $.ajax({
            url: ajaxurl,
            type: 'post',
            dataType: 'html',
            data: {
                'action': 'spark_multipurpose_sections_reorder',
                'sections': sec_ordered,
            }
        }).done(function (data) {
            $.each(sec_ordered, function (key, value) {
                wp.customize.section(value).priority(key);
            });
            $(container).find('.spark_multipurpose_light-drag-spinner').hide();
            wp.customize.previewer.refresh();
        });
    }

    $('#sub-accordion-panel-spark_multipurpose_frontpage_settings').sortable({
        axis: 'y',
        helper: 'clone',
        cursor: 'move',
        items: '> li.control-section:not(#accordion-section-spark_multipurpose_slider_section)',
        delay: 150,
        update: function (event, ui) {
            $('#sub-accordion-panel-spark_multipurpose_frontpage_settings').find('.spark_multipurpose_light-drag-spinner').show();
            spark_multipurpose_sections_order('#sub-accordion-panel-spark_multipurpose_frontpage_settings');
            $('.wp-full-overlay-sidebar-content').scrollTop(0);
        }
    });


    //Scroll to section
    $('body').on('click', '#sub-accordion-panel-spark_multipurpose_frontpage_settings .control-subsection .accordion-section-title', function (event) {
        var section_id = $(this).parent('.control-subsection').attr('id');
        spark_multipurpose_ScrollToSection(section_id);
    });

});

function spark_multipurpose_ScrollToSection (section_id) {

    var preview_section_id = "banner-slider";

    var $contents = jQuery('#customize-preview iframe').contents();

    switch (section_id) {

        case 'sub-accordion-section-spark_multipurpose_slider_section':
            preview_section_id = "banner-slider";
            break;

        case 'accordion-section-spark_multipurpose_promoservice_section':
            preview_section_id = "promoservice-section";
            break;

        case 'accordion-section-spark_multipurpose_aboutus_section':
            preview_section_id = "aboutus-section";
            break;

        case 'accordion-section-spark_multipurpose_video_calltoaction_section':
            preview_section_id = "video_calltoaction-section";
            break;

        case 'accordion-section-spark_multipurpose_service_section':
            preview_section_id = "service-section";
            break;

        case 'accordion-section-spark_multipurpose_calltoaction_section':
            preview_section_id = "calltoaction-section";
            break;

        case 'accordion-section-spark_multipurpose_recentwork_section':
            preview_section_id = "recentwork-section";
            break;

        case 'accordion-section-spark_multipurpose_counter_section':
            preview_section_id = "counter-section";
            break;

        case 'accordion-section-spark_multipurpose_blog_section':
            preview_section_id = "blog-section";
            break;

        case 'accordion-section-spark_multipurpose_testimonial_section':
            preview_section_id = "testimonial-section";
            break;

        case 'accordion-section-spark_multipurpose_how_it_works_section':
            preview_section_id = "how_it_works-section";
            break;

        case 'accordion-section-spark_multipurpose_team_section':
            preview_section_id = "team-section";
            break;

        case 'accordion-section-spark_multipurpose_client_section':
            preview_section_id = "client-section";
            break;

        case 'accordion-section-spark_multipurpose_pricing_section':
            preview_section_id = "pricing-section";
            break;

        case 'accordion-section-spark_multipurpose_contact_section':
            preview_section_id = "contact-section";
            break;
        case 'accordion-section-spark_multipurpose_service_section':
            preview_section_id = "service-section";
            break;

        case 'accordion-section-spark_multipurpose_tab_section':
            preview_section_id = "tab-section";
            break;

        case 'accordion-section-spark_multipurpose_producttype_section':
            preview_section_id = "producttype-section";
            break;
        case 'accordion-section-spark_multipurpose_productcat_section':
            preview_section_id = "productcat-section";
            break;
    }

    if ($contents.find('#' + preview_section_id).length > 0) {
        $contents.find("html, body").animate({
            scrollTop: $contents.find("#" + preview_section_id).offset().top
        }, 1000);
    }
}