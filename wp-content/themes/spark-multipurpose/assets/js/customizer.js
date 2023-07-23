jQuery(document).ready(function ($) {
    /**
     * File customizer.js.
     *
     * Theme Customizer enhancements for a better user experience.
     *
     * Contains handlers to make Theme Customizer preview reload changes asynchronously.
    */
    function sparkMultipurposeConvertHex (hexcolor, opacity) {
        var hex = String(hexcolor).replace(/[^0-9a-f]/gi, '');
        if (hex.length < 6) {
            hex = hex[ 0 ] + hex[ 0 ] + hex[ 1 ] + hex[ 1 ] + hex[ 2 ] + hex[ 2 ];
        }
        r = parseInt(hex.substring(0, 2), 16);
        g = parseInt(hex.substring(2, 4), 16);
        b = parseInt(hex.substring(4, 6), 16);

        result = 'rgba(' + r + ',' + g + ',' + b + ',' + opacity / 100 + ')';
        return result;
    }

    function spark_multipurpose_set_dynamic_css (control, style) {
        jQuery('style.' + control).remove();
        jQuery('head').append('<style class="' + control + '">' + style + '</style>');
    }

    $('.repeater-field-title.accordion-section-title').click(function () {
        $(this).toggleClass('expanded');
    });

    $('.repeater-selected-icon').click(function () {
        $(this).find(".fa-angle-down").toggleClass('fa-angle-up');
    });


    // Site title and description.
    wp.customize('blogname', function (value) {
        value.bind(function (to) {
            $('.site-title a').text(to);
        });
    });
    wp.customize('blogdescription', function (value) {
        value.bind(function (to) {
            $('.site-description').text(to);
        });
    });

    // Header text color.
    wp.customize('header_textcolor', function (value) {
        value.bind(function (to) {
            if ('blank' === to) {
                $('.site-title, .site-description').css({
                    'clip': 'rect(1px, 1px, 1px, 1px)',
                    'position': 'absolute'
                });
            } else {
                $('.site-title, .site-description').css({
                    'clip': 'auto',
                    'position': 'relative'
                });
                $('.site-title a, .site-description').css({
                    'color': to
                });
            }
        });
    });

    /********
     * HEADER BG COLOR OPTIONS
    */
    var section_selector = {
        'spark_multipurpose_header': '.nav-classic'
    };
    $.each(section_selector, function (section, selector) {
        wp.customize(section + '_bg_type', function (value) {
            value.bind(function onChange (to) {
                if (to === 'default') {
                    $(selector).css('background-image', 'none');
                    $(selector).css('background-color', 'inherit');
                }
                if (to === 'color-bg') {
                    var color = wp.customize(section + '_bg_color').get();
                    //$(selector).css('background-image', 'none');
                    $(selector).css('background-color', color);
                }
                if (to === 'gradient-bg') {
                    var gradient = wp.customize(section + '_bg_gradient').get();
                    var css = selector + '{' + gradient + '}';
                    $(selector).css('background-image', '');
                    $(selector).css('background-color', 'transparent');
                    spark_multipurpose_set_dynamic_css(section + '_bg_gradient', css);
                }
                if (to === 'image-bg') {
                    var image = wp.customize(section + '_background_image').get();
                    var image_repeat = wp.customize(section + '_background_image_repeat').get();
                    var image_size = wp.customize(section + '_background_image_size').get();
                    var image_position = wp.customize(section + '_background_image_position').get();
                    var image_attach = wp.customize(section + '_background_image_attach').get();
                    $(selector).css({ 'background-image': 'url(' + image + ')', 'background-repeat': image_repeat, 'background-size': image_size, 'background-position': image_position, 'background-attachment': image_attach });
                }
                if (to === 'default' || to === 'color-bg' || to === 'gradient-bg' || to === 'image-bg') {
                    $(selector + ' iframe').css('display', 'none');
                }
                if (to === 'video-bg') {
                    var bg_video = wp.customize(section + '_bg_video').get();
                    var data_property = "{videoURL:\'" + bg_video + "\', mobileFallbackImage:\'https://img.youtube.com/vi/" + bg_video + "/maxresdefault.jpg\'}";
                    $('.section-wrap').css('z-index', '1');
                    $(selector).attr('data-property', data_property);
                    $(function () {
                        $(selector).css('background-image', 'none');
                        $(selector).css('background-color', 'inherit');
                        if ($(selector + "[data-property]").length > 0) {
                            $(selector + "[data-property]").YTPlayer({
                                showControls: false,
                                containment: 'self',
                                mute: true,
                                addRaster: false,
                                useOnMobile: false,
                                playOnlyIfVisible: true,
                                anchor: 'center,center',
                                showYTLogo: false,
                                loop: true,
                                optimizeDisplay: true,
                                quality: 'hd720'
                            });
                        }
                    });
                    $(selector + ' iframe').css('display', '');
                }
            });
        });
        wp.customize(section + '_bg_color', function (value) {
            value.bind(function (to) {
                $(selector).css('background-color', to);
            });
        });
        wp.customize(section + '_bg_gradient', function (value) {
            value.bind(function (to) {
                var css = selector + '{' + to + '}';
                spark_multipurpose_set_dynamic_css(section + '_bg_gradient', css);
            });
        });

        wp.customize(section + '_background_image', function (value) {
            value.bind(function (to) {
                $(selector).css('background-image', 'url(' + to + ')');
            });
        });
        wp.customize(section + '_background_image_repeat', function (value) {
            value.bind(function (to) {
                $(selector).css('background-repeat', to);
            });
        });
        wp.customize(section + '_background_image_size', function (value) {
            value.bind(function (to) {
                $(selector).css('background-size', to);
            });
        });
        wp.customize(section + '_background_image_position', function (value) {
            value.bind(function (to) {
                $(selector).css('background-position', to);
            });
        });
        wp.customize(section + '_background_image_attach', function (value) {
            value.bind(function (to) {
                $(selector).css('background-attachment', to);
            });
        });
    });

    /********
    * Header ( Margin, Padding, Radious ) Options
   */
    wp.customize('spark_multipurpose_header_margin_padding', function (value) {
        value.bind(function (to) {
            var value = JSON.parse(to);
            var css = '';
            css += ".nav-classic{ border-radius: " + value.radius.desktop.top + "px " + value.radius.desktop.right + "px " + value.radius.desktop.bottom + "px " + value.radius.desktop.left + "px;}";
            css += '@media screen and (max-width:768px){';
            ".nav-classic{ border-radius: " + value.radius.tablet.top + "px " + value.radius.tablet.right + "px " + value.radius.tablet.bottom + "px " + value.radius.tablet.left + "px;}";
            css += '}';
            css += '@media screen and (max-width:480px){';
            css += ".nav-classic{ border-radius: " + value.radius.mobile.top + "px " + value.radius.mobile.right + "px " + value.radius.mobile.bottom + "px " + value.radius.mobile.left + "px;}";
            css += '}';

            css += ".nav-classic{margin-top:" + value.margin.desktop.top + "px; margin-right:" + value.margin.desktop.right + "px; margin-bottom:" + value.margin.desktop.bottom + "px; margin-left:" + value.margin.desktop.left + "px; }";
            css += '@media screen and (max-width:768px){';
            css += ".nav-classic{margin-top:" + value.margin.tablet.top + "px; margin-right:" + value.margin.tablet.right + "px; margin-bottom:" + value.margin.tablet.bottom + "px; margin-left:" + value.margin.tablet.left + "px; }";
            css += '}';
            css += '@media screen and (max-width:480px){';
            css += ".nav-classic{margin-top:" + value.margin.mobile.top + "px; margin-right:" + value.margin.mobile.right + "px; margin-bottom:" + value.margin.mobile.bottom + "px; margin-left:" + value.margin.mobile.left + "px; }";
            css += '}';

            css += ".nav-classic{padding-top:" + value.padding.desktop.top + "px; padding-right:" + value.padding.desktop.right + "px; padding-bottom:" + value.padding.desktop.bottom + "px; padding-left:" + value.padding.desktop.left + "px; }";
            css += '@media screen and (max-width:768px){';
            css += ".nav-classic{padding-top:" + value.padding.tablet.top + "px; padding-right:" + value.padding.tablet.right + "px; padding-bottom:" + value.padding.tablet.bottom + "px; padding-left:" + value.padding.tablet.left + "px; }";
            css += '}';
            css += '@media screen and (max-width:480px){';
            css += ".nav-classic{padding-top:" + value.padding.mobile.top + "px; padding-right:" + value.padding.mobile.right + "px; padding-bottom:" + value.padding.mobile.bottom + "px; padding-left:" + value.padding.mobile.left + "px; }";
            css += '}';

            spark_multipurpose_set_dynamic_css('spark_multipurpose_header_margin_padding', css);
        });
    });

    wp.customize('content_text_color', function (value) {
        value.bind(function (to) {
            var borderColor = sparkMultipurposeConvertHex(to, 10);
            var lighterBorderColor = sparkMultipurposeConvertHex(to, 5);
            var css = ".content-area{color:" + to + "}";
            css += ".widget-area .widget{border-color:" + borderColor + "}";
            css += ".widget-area li{border-color:" + lighterBorderColor + "}";
            spark_multipurpose_set_dynamic_css('content_text_color', css);
        });
    });

    wp.customize('content_link_color', function (value) {
        value.bind(function (to) {
            var css = ".content-area a{color:" + to + "}";
            spark_multipurpose_set_dynamic_css('content_link_color', css);
        });
    });

    wp.customize('content_link_hov_color', function (value) {
        value.bind(function (to) {
            var css = ".content-area a:hover{color:" + to + "}";
            spark_multipurpose_set_dynamic_css('content_link_hov_color', css);
        });
    });

    // Sections dynamic

    var settingIds = [ 'service', 'aboutus', 'video_calltoaction', 'calltoaction', 'counter', 'blog', 'testimonial', 'team', 'client', 'promoservice', 'contact', 'pricing', 'tab', 'producttype', 'productcat', 'producthotoffer', 'recentwork', 'how_it_works', 'titlebar', 'footer' ];

    $.each(settingIds, function (i, settingId) {

        wp.customize('spark_multipurpose_' + settingId + '_super_title', function (value) {
            value.bind(function (to) {
                var sectionClass = '#' + settingId + '-section .super-title';
                if ($(sectionClass).length == 0) {
                    wp.customize.preview.send('refresh');
                } else {
                    $(sectionClass).text(to);
                }
            })
        });

        wp.customize('spark_multipurpose_' + settingId + '_title', function (value) {
            value.bind(function (to) {
                var sectionClass = '#' + settingId + '-section .section-title';
                if ($(sectionClass).length == 0) {
                    wp.customize.preview.send('refresh');
                } else {
                    $(sectionClass).text(to);
                }

            })
        });

        wp.customize('spark_multipurpose_' + settingId + '_sub_title', function (value) {
            value.bind(function (to) {
                var sectionClass = '#' + settingId + '-section';
                $(sectionClass + ' .section-tagline-text').text(to);
            })
        });

        wp.customize('spark_multipurpose_' + settingId + '_title_align', function (value) {
            value.bind(function (to) {
                var sectionClass = '#' + settingId + '-section';
                var remove_class = 'text-center text-left text-right';
                $(sectionClass + ' .section-title-wrapper').removeClass(remove_class);
                $(sectionClass + ' .section-title-wrapper').addClass(to);
            })
        });

        wp.customize('spark_multipurpose_' + settingId + '_bg_type', function (value) {
            value.bind(function (to) {

                var sectionClass = '#' + settingId + '-section';

                if (to === 'default' || to === 'color-bg' || to === 'gradient-bg' || to === 'image-bg') {
                    $(sectionClass + ' iframe').css('display', 'none');
                }
                if ('color-bg' === to) {
                    var color = wp.customize('spark_multipurpose_' + settingId + '_bg_color').get();
                    // $( sectionClass ).removeAttr( 'style' );
                    var css = sectionClass + '{background-color:' + color + '}';
                    spark_multipurpose_set_dynamic_css('spark_multipurpose_' + settingId + '_bg_color', css);

                    var css = sectionClass + ' .section-wrap{background-color:transparent}';
                    spark_multipurpose_set_dynamic_css('spark_multipurpose_' + settingId + '_bg_color', css);

                    var css = sectionClass + '{background-image:none}';
                    spark_multipurpose_set_dynamic_css('spark_multipurpose_' + settingId + '_bg_image_url', css);

                }
                if ('gradient-bg' === to) {
                    var gradient = wp.customize('spark_multipurpose_' + settingId + '_bg_gradient').get();
                    var css = sectionClass + '{' + gradient + '}';
                    spark_multipurpose_set_dynamic_css('spark_multipurpose_' + settingId + '_bg_gradient', css);

                    // var css = sectionClass + ' .section-wrap{background-color:transparent}';
                    // spark_multipurpose_set_dynamic_css('spark_multipurpose_' + settingId + '_overlay_color', css);

                }
                if ('image-bg' === to) {
                    var image = wp.customize('spark_multipurpose_' + settingId + '_bg_image_url').get();
                    var css = sectionClass + '{background-image:url(' + image + ')}';
                    spark_multipurpose_set_dynamic_css('spark_multipurpose_' + settingId + '_bg_image_url', css);

                    var image_repeat = wp.customize('spark_multipurpose_' + settingId + '_bg_image_repeat').get();
                    var css = sectionClass + '{background-repeat:' + image_repeat + '}';
                    spark_multipurpose_set_dynamic_css('spark_multipurpose_' + settingId + '_bg_image_repeat', css);

                    var image_size = wp.customize('spark_multipurpose_' + settingId + '_bg_image_size').get();
                    var css = sectionClass + '{background-size:' + image_size + '}';
                    spark_multipurpose_set_dynamic_css('spark_multipurpose_' + settingId + '_bg_image_size', css);

                    var image_position = wp.customize('spark_multipurpose_' + settingId + '_bg_position').get();
                    image_position = image_position.replace('-', ' ');
                    var css = sectionClass + '{background-position:' + image_position + '}';
                    spark_multipurpose_set_dynamic_css('spark_multipurpose_' + settingId + '_bg_position', css);

                    var image_attach = wp.customize('spark_multipurpose_' + settingId + '_bg_image_attach').get();
                    var css = sectionClass + '{background-attachment:' + image_attach + '}';
                    spark_multipurpose_set_dynamic_css('spark_multipurpose_' + settingId + '_bg_image_attach', css);

                    var color = wp.customize('spark_multipurpose_' + settingId + '_bg_color').get();
                    var css = sectionClass + '{background-color:' + color + '}';
                    spark_multipurpose_set_dynamic_css('spark_multipurpose_' + settingId + '_bg_color', css);

                    var color_overlay = wp.customize('spark_multipurpose_' + settingId + '_overlay_color').get();
                    var css = sectionClass + '::before{background-color:' + color_overlay + '}';
                    spark_multipurpose_set_dynamic_css('spark_multipurpose_' + settingId + '_overlay_color', css);
                }
                if ('video-bg' === to) {

                    var bg_video = wp.customize('spark_multipurpose_' + settingId + '_bg_video').get();
                    var data_property = "{videoURL:\'" + bg_video + "\', mobileFallbackImage:\'https://img.youtube.com/vi/" + bg_video + "/maxresdefault.jpg\'}";
                    $('.section-wrap').css('z-index', '1');
                    $(sectionClass).attr('data-property', data_property);
                    $(function () {
                        if ($(sectionClass + "[data-property]").length > 0) {
                            $(sectionClass + "[data-property]").YTPlayer({
                                showControls: false,
                                containment: 'self',
                                mute: true,
                                addRaster: false,
                                useOnMobile: false,
                                playOnlyIfVisible: true,
                                anchor: 'center,center',
                                showYTLogo: false,
                                loop: true,
                                optimizeDisplay: true,
                                quality: 'hd720'
                            });
                        }
                    });

                    $(sectionClass + ' iframe').css('display', '');

                }
            });
        });

        wp.customize('spark_multipurpose_' + settingId + '_bg_color', function (value) {
            value.bind(function (to) {
                var sectionClass = '#' + settingId + '-section';
                var css = sectionClass + '{background-color:' + to + '}';
                spark_multipurpose_set_dynamic_css('spark_multipurpose_' + settingId + '_bg_color', css);
            });
        });

        wp.customize('spark_multipurpose_' + settingId + '_bg_gradient', function (value) {
            value.bind(function (to) {
                var sectionClass = '#' + settingId + '-section';
                var css = sectionClass + '{' + to + '}';
                spark_multipurpose_set_dynamic_css('spark_multipurpose_' + settingId + '_bg_color', css);
            });
        });

        wp.customize('spark_multipurpose_' + settingId + '_bg_image_url', function (value) {
            value.bind(function (to) {
                var sectionClass = '#' + settingId + '-section';
                var css = sectionClass + '{background-image:url(' + to + ')}';
                spark_multipurpose_set_dynamic_css('spark_multipurpose_' + settingId + '_bg_image_url', css);
            });
        });

        wp.customize('spark_multipurpose_' + settingId + '_bg_image_repeat', function (value) {
            value.bind(function (to) {
                var sectionClass = '#' + settingId + '-section';
                var css = sectionClass + '{background-repeat:' + to + '}';
                spark_multipurpose_set_dynamic_css('spark_multipurpose_' + settingId + '_bg_image_repeat', css);
            });
        });

        wp.customize('spark_multipurpose_' + settingId + '_bg_image_size', function (value) {
            value.bind(function (to) {
                var sectionClass = '#' + settingId + '-section';
                var css = sectionClass + '{background-size:' + to + '}';
                spark_multipurpose_set_dynamic_css('spark_multipurpose_' + settingId + '_bg_image_size', css);
            });
        });

        wp.customize('spark_multipurpose_' + settingId + '_bg_position', function (value) {
            value.bind(function (to) {
                to = to.replace('-', ' ');
                var sectionClass = '#' + settingId + '-section';
                var css = sectionClass + '{background-position:' + to + '}';
                spark_multipurpose_set_dynamic_css('spark_multipurpose_' + settingId + '_bg_position', css);
            });
        });

        wp.customize('spark_multipurpose_' + settingId + '_bg_image_attach', function (value) {
            value.bind(function (to) {
                var sectionClass = '#' + settingId + '-section';
                var css = sectionClass + '{background-attachment:' + to + '}';
                spark_multipurpose_set_dynamic_css('spark_multipurpose_' + settingId + '_bg_image_attach', css);
            });
        });

        wp.customize('spark_multipurpose_' + settingId + '_bg_gradient', function (value) {
            value.bind(function (to) {
                var sectionClass = '#' + settingId + '-section';
                var css = sectionClass + '{' + to + '}';
                spark_multipurpose_set_dynamic_css('spark_multipurpose_' + settingId + '_bg_gradient', css);
            });
        });

        wp.customize('spark_multipurpose_' + settingId + '_overlay_color', function (value) {
            value.bind(function (to) {
                var sectionClass = '#' + settingId + '-section';
                var css = sectionClass + '::before{background-color:' + to + '}';
                spark_multipurpose_set_dynamic_css('spark_multipurpose_' + settingId + '_overlay_color', css);
            });
        });

        wp.customize('spark_multipurpose_' + settingId + '_super_title_color', function (value) {
            value.bind(function (to) {
                var sectionClass = '#' + settingId + '-section';
                var css = sectionClass + ' .super-title{color:' + to + '}';

                var css2 = sectionClass + ' .super-title:before{\
                    background-image: -webkit-gradient(linear, right top, left top, from(' + to + '), color-stop(130%, transparent));\
                    background-image: -o-linear-gradient(right, ' + to + '), transparent 130%);\
                    background-image: linear-gradient(to left, ' + to + '), transparent 130%);\
                }';

                var css3 = sectionClass + ' .super-title:after{\
                    background-image: -webkit-gradient(linear, left top, right top, from(' + to + '), color-stop(130%, transparent));\
                    background-image: -o-linear-gradient(left, ' + to + ', transparent 130%);\
                    background-image: linear-gradient(to right, ' + to + ', transparent 130%);\
                }';

                spark_multipurpose_set_dynamic_css('spark_multipurpose_' + settingId + '_super_title_color', css + css2 + css3);
            });
        });

        wp.customize('spark_multipurpose_' + settingId + '_title_color', function (value) {
            value.bind(function (to) {
                var sectionClass = '#' + settingId + '-section';
                var css = sectionClass + ' .section-title{color:' + to + '}';
                spark_multipurpose_set_dynamic_css('spark_multipurpose_' + settingId + '_title_color', css);
            });
        });

        wp.customize('spark_multipurpose_' + settingId + '_text_color', function (value) {
            value.bind(function (to) {

                var sectionClass = '#' + settingId + '-section';
                var css = sectionClass + ' .section-wrap .inner-section-wrap{color:' + to + '}';

                spark_multipurpose_set_dynamic_css('spark_multipurpose_' + settingId + '_text_color', css);
            });
        });


        wp.customize('spark_multipurpose_' + settingId + '_link_color', function (value) {
            value.bind(function (to) {
                var sectionClass = '#' + settingId + '-section';
                var css = sectionClass + ' a,' + sectionClass + ' a > i{color:' + to + '}';
                spark_multipurpose_set_dynamic_css('spark_multipurpose_' + settingId + '_link_color', css);
            });
        });

        wp.customize('spark_multipurpose_' + settingId + '_link_hov_color', function (value) {
            value.bind(function (to) {
                var sectionClass = '#' + settingId + '-section';
                var css = sectionClass + ' a:hover, ' + sectionClass + ' a:hover > i{color:' + to + '}';
                spark_multipurpose_set_dynamic_css('spark_multipurpose_' + settingId + '_link_hov_color', css);
            });
        });



        wp.customize('spark_multipurpose_' + settingId + '_mb_bg_color', function (value) {
            value.bind(function (to) {
                var sectionClass = '#' + settingId + '-section';
                var css = sectionClass + ' .section-button .button{background:' + to + '}';
                spark_multipurpose_set_dynamic_css('spark_multipurpose_' + settingId + '_mb_bg_color', css);
            });
        });

        wp.customize('spark_multipurpose_' + settingId + '_mb_text_color', function (value) {
            value.bind(function (to) {
                var sectionClass = '#' + settingId + '-section';
                var css = sectionClass + ' .section-button .button{color:' + to + '}';
                spark_multipurpose_set_dynamic_css('spark_multipurpose_' + settingId + '_mb_text_color', css);
            });
        });

        wp.customize('spark_multipurpose_' + settingId + '_mb_hov_bg_color', function (value) {
            value.bind(function (to) {
                var sectionClass = '#' + settingId + '-section';
                var css = sectionClass + ' .section-button .button:hover{background:' + to + '}';
                spark_multipurpose_set_dynamic_css('spark_multipurpose_' + settingId + '_mb_hov_bg_color', css);
            });
        });

        wp.customize('spark_multipurpose_' + settingId + '_mb_hov_text_color', function (value) {
            value.bind(function (to) {
                var sectionClass = '#' + settingId + '-section';
                var css = sectionClass + ' .section-button .button:hover{color:' + to + '}';
                spark_multipurpose_set_dynamic_css('spark_multipurpose_' + settingId + '_mb_hov_text_color', css);
            });
        });

        wp.customize('spark_multipurpose_' + settingId + '_padding', function (value) {
            value.bind(function (to) {
                var selector = '#' + settingId + '-section';
                var section_padding = JSON.parse(to);
                var css = selector + '{padding-top:' + section_padding.desktop.top + 'px; padding-right:' + section_padding.desktop.right + 'px; padding-bottom:' + section_padding.desktop.bottom + 'px; padding-left:' + section_padding.desktop.left + 'px}';
                spark_multipurpose_set_dynamic_css('spark_multipurpose_' + settingId + 'padding_desktop', css);

                if (($(window).width() >= 700) && ($(window).width() < 992)) {
                    var css = '@media screen and (max-width:992px){';
                    css += selector + '{ padding-top:' + section_padding.tablet.top + 'px; padding-right:' + section_padding.tablet.right + 'px; padding-bottom:' + section_padding.tablet.bottom + 'px; padding-left:' + section_padding.tablet.left + 'px}';
                    css += '}';
                    spark_multipurpose_set_dynamic_css('spark_multipurpose_' + settingId + 'padding_tablet', css);
                }
                if ($(window).width() < 500) {
                    var css = '@media screen and (max-width:500px){';
                    css += selector + '{ padding-top:' + section_padding.mobile.top + 'px; padding-right:' + section_padding.mobile.right + 'px; padding-bottom:' + section_padding.mobile.bottom + 'px; padding-left:' + section_padding.mobile.left + 'px}';
                    css += '}';
                    spark_multipurpose_set_dynamic_css('spark_multipurpose_' + settingId + 'padding_mobile', css);
                }

            });
        });

        wp.customize('spark_multipurpose_' + settingId + '_margin', function (value) {
            value.bind(function (to) {
                var selector = '#' + settingId + '-section';
                var section_padding = JSON.parse(to);
                var css = selector + '{margin-top:' + section_padding.desktop.top + 'px; margin-right:' + section_padding.desktop.right + 'px; margin-bottom:' + section_padding.desktop.bottom + 'px; margin-left:' + section_padding.desktop.left + 'px}';
                spark_multipurpose_set_dynamic_css('spark_multipurpose_' + settingId + 'padding_desktop', css);

                if (($(window).width() >= 700) && ($(window).width() < 992)) {
                    var css = '@media screen and (max-width:992px){';
                    css += selector + '{ margin-top:' + section_padding.tablet.top + 'px; margin-right:' + section_padding.tablet.right + 'px; margin-bottom:' + section_padding.tablet.bottom + 'px; margin-left:' + section_padding.tablet.left + 'px}';
                    css += '}';
                    spark_multipurpose_set_dynamic_css('spark_multipurpose_' + settingId + 'padding_tablet', css);
                }
                if ($(window).width() < 500) {
                    var css = '@media screen and (max-width:500px){';
                    css += selector + '{ margin-top:' + section_padding.mobile.top + 'px; margin-right:' + section_padding.mobile.right + 'px; margin-bottom:' + section_padding.mobile.bottom + 'px; margin-left:' + section_padding.mobile.left + 'px}';
                    css += '}';
                    spark_multipurpose_set_dynamic_css('spark_multipurpose_' + settingId + 'padding_mobile', css);
                }

            });
        });


        wp.customize('spark_multipurpose_' + settingId + '_radius', function (value) {
            value.bind(function (to) {
                var section_val = JSON.parse(to);
                var selector = '#' + settingId + '-section';
                var css = selector + "{ border-radius: " + section_val.desktop.top + "px " + section_val.desktop.right + "px " + section_val.desktop.bottom + "px " + section_val.desktop.left + "px;}";

                css += '@media screen and (max-width:768px){';
                selector + "{ border-radius: " + section_val.tablet.top + "px " + section_val.tablet.right + "px " + section_val.tablet.bottom + "px " + section_val.tablet.left + "px;}";
                css += '}';


                css += '@media screen and (max-width:480px){';
                css += selector + "{ border-radius: " + section_val.mobile.top + "px " + section_val.mobile.right + "px " + section_val.mobile.bottom + "px " + section_val.mobile.left + "px;}";
                css += '}';


                spark_multipurpose_set_dynamic_css('spark_multipurpose_' + settingId + '_radius', css);
            });
        });

        /*********
         * Container  
        */
        wp.customize('spark_multipurpose_' + settingId + '_content_bg_type', function (value) {
            value.bind(function (to) {
                var sectionClass = '#' + settingId + '-section .section-wrap';
                if (to === 'default' || to === 'color-bg' || to === 'gradient-bg' || to === 'image-bg') {
                    $(sectionClass + ' iframe').css('display', 'none');
                }
                if ('color-bg' === to) {
                    var color = wp.customize('spark_multipurpose_' + settingId + '_content_bg_color').get();
                    var css = sectionClass + '{background-color:' + color + '}';
                    spark_multipurpose_set_dynamic_css('spark_multipurpose_' + settingId + '_content_bg_color', css);

                }
                if ('gradient-bg' === to) {
                    var gradient = wp.customize('spark_multipurpose_' + settingId + '_content_bg_gradient').get();
                    var css = sectionClass + '{' + gradient + '}';
                    spark_multipurpose_set_dynamic_css('spark_multipurpose_' + settingId + '_content_bg_gradient', css);

                }
            });
        });

        wp.customize('spark_multipurpose_' + settingId + '_content_bg_color', function (value) {
            value.bind(function (to) {
                var sectionClass = '#' + settingId + '-section .section-wrap';
                var css = sectionClass + '{background-color:' + to + '}';
                spark_multipurpose_set_dynamic_css('spark_multipurpose_' + settingId + '_content_bg_color', css);
            });
        });

        wp.customize('spark_multipurpose_' + settingId + '_content_bg_gradient', function (value) {
            value.bind(function (to) {
                var sectionClass = '#' + settingId + '-section .section-wrap';
                var css = sectionClass + '{' + to + '}';
                spark_multipurpose_set_dynamic_css('spark_multipurpose_' + settingId + '_content_bg_gradient', css);
            });
        });

        wp.customize('spark_multipurpose_' + settingId + '_content_padding', function (value) {
            value.bind(function (to) {
                var selector = '#' + settingId + '-section .section-wrap';
                var section_padding = JSON.parse(to);
                var css = selector + '{padding-top:' + section_padding.desktop.top + 'px; padding-right:' + section_padding.desktop.right + 'px; padding-bottom:' + section_padding.desktop.bottom + 'px; padding-left:' + section_padding.desktop.left + 'px}';
                spark_multipurpose_set_dynamic_css('spark_multipurpose_' + settingId + 'content_padding_desktop', css);

                if (($(window).width() >= 700) && ($(window).width() < 992)) {
                    var css = '@media screen and (max-width:992px){';
                    css += selector + '{ padding-top:' + section_padding.tablet.top + 'px; padding-right:' + section_padding.tablet.right + 'px; padding-bottom:' + section_padding.tablet.bottom + 'px; padding-left:' + section_padding.tablet.left + 'px}';
                    css += '}';
                    spark_multipurpose_set_dynamic_css('spark_multipurpose_' + settingId + 'content_padding_tablet', css);
                }
                if ($(window).width() < 500) {
                    var css = '@media screen and (max-width:500px){';
                    css += selector + '{ padding-top:' + section_padding.mobile.top + 'px; padding-right:' + section_padding.mobile.right + 'px; padding-bottom:' + section_padding.mobile.bottom + 'px; padding-left:' + section_padding.mobile.left + 'px}';
                    css += '}';
                    spark_multipurpose_set_dynamic_css('spark_multipurpose_' + settingId + 'content_padding_mobile', css);
                }

            });
        });

        wp.customize('spark_multipurpose_' + settingId + '_content_margin', function (value) {
            value.bind(function (to) {
                var selector = '#' + settingId + '-section .section-wrap';
                var section_margin = JSON.parse(to);
                var css = selector + '{margin-top:' + section_margin.desktop.top + 'px; margin-right:' + section_margin.desktop.right + 'px; margin-bottom:' + section_margin.desktop.bottom + 'px; margin-left:' + section_margin.desktop.left + 'px}';
                spark_multipurpose_set_dynamic_css('spark_multipurpose_' + settingId + 'content_margin_desktop', css);

                if (($(window).width() >= 700) && ($(window).width() < 992)) {
                    var css = '@media screen and (max-width:992px){';
                    css += selector + '{ margin-top:' + section_margin.tablet.top + 'px; margin-right:' + section_margin.tablet.right + 'px; margin-bottom:' + section_margin.tablet.bottom + 'px; margin-left:' + section_margin.tablet.left + 'px}';
                    css += '}';
                    spark_multipurpose_set_dynamic_css('spark_multipurpose_' + settingId + 'content_margin_tablet', css);
                }
                if ($(window).width() < 500) {
                    var css = '@media screen and (max-width:500px){';
                    css += selector + '{ margin-top:' + section_margin.mobile.top + 'px; margin-right:' + section_margin.mobile.right + 'px; margin-bottom:' + section_margin.mobile.bottom + 'px; margin-left:' + section_margin.mobile.left + 'px}';
                    css += '}';
                    spark_multipurpose_set_dynamic_css('spark_multipurpose_' + settingId + 'content_margin_mobile', css);
                }

            });
        });


        wp.customize('spark_multipurpose_' + settingId + '_content_radius', function (value) {
            value.bind(function (to) {
                var section_val = JSON.parse(to);
                var selector = '#' + settingId + '-section .section-wrap';
                var css = selector + "{ border-radius: " + section_val.desktop.top + "px " + section_val.desktop.right + "px " + section_val.desktop.bottom + "px " + section_val.desktop.left + "px;}";

                css += '@media screen and (max-width:768px){';
                selector + "{ border-radius: " + section_val.tablet.top + "px " + section_val.tablet.right + "px " + section_val.tablet.bottom + "px " + section_val.tablet.left + "px;}";
                css += '}';


                css += '@media screen and (max-width:480px){';
                css += selector + "{ border-radius: " + section_val.mobile.top + "px " + section_val.mobile.right + "px " + section_val.mobile.bottom + "px " + section_val.mobile.left + "px;}";
                css += '}';


                spark_multipurpose_set_dynamic_css('spark_multipurpose_' + settingId + '_content_radius', css);
            });
        });

        wp.customize('spark_multipurpose_' + settingId + '_ts_color', function (value) {
            value.bind(function (to) {
                var sectionClass = '#' + settingId + '-section';
                var css = sectionClass + ' .top-section-seperator svg{ fill:' + to + '}';
                spark_multipurpose_set_dynamic_css('spark_multipurpose_' + settingId + '_ts_color', css);
            });
        });

        wp.customize('spark_multipurpose_' + settingId + '_bs_color', function (value) {
            value.bind(function (to) {
                var sectionClass = '#' + settingId + '-section';
                var css = sectionClass + ' .bottom-section-seperator svg{ fill:' + to + '}';
                spark_multipurpose_set_dynamic_css('spark_multipurpose_' + settingId + '_bs_color', css);
            });
        });

        wp.customize('spark_multipurpose_' + settingId + '_ts_height_desktop', function (value) {
            value.bind(function (to) {
                var sectionClass = '#' + settingId + '-section';
                var desktop = to;
                var tablet = wp.customize('spark_multipurpose_' + settingId + '_ts_height_tablet').get();
                var mobile = wp.customize('spark_multipurpose_' + settingId + '_ts_height_mobile').get();

                var css = sectionClass + ' .section-seperator.top-section-seperator{height:' + desktop + 'px}';

                if (tablet) {
                    css += '@media screen and (max-width:768px){';
                    css += sectionClass + ' .section-seperator.top-section-seperator{height:' + tablet + 'px}';
                    css += '}';
                }

                if (mobile) {
                    css += '@media screen and (max-width:480px){';
                    css += sectionClass + ' .section-seperator.top-section-seperator{height:' + mobile + 'px}';
                    css += '}';
                }

                spark_multipurpose_set_dynamic_css('spark_multipurpose_' + settingId + '_ts_height', css);
            });
        });

        wp.customize('spark_multipurpose_' + settingId + '_ts_height_tablet', function (value) {
            value.bind(function (to) {
                var sectionClass = '#' + settingId + '-section';
                var desktop = wp.customize('spark_multipurpose_' + settingId + '_ts_height_desktop').get();
                var tablet = to;
                var mobile = wp.customize('spark_multipurpose_' + settingId + '_ts_height_mobile').get();

                var css = sectionClass + ' .section-seperator.top-section-seperator{height:' + desktop + 'px}';

                if (tablet) {
                    css += '@media screen and (max-width:768px){';
                    css += sectionClass + ' .section-seperator.top-section-seperator{height:' + tablet + 'px}';
                    css += '}';
                }

                if (mobile) {
                    css += '@media screen and (max-width:480px){';
                    css += sectionClass + ' .section-seperator.top-section-seperator{height:' + mobile + 'px}';
                    css += '}';
                }

                spark_multipurpose_set_dynamic_css('spark_multipurpose_' + settingId + '_ts_height', css);
            });
        });

        wp.customize('spark_multipurpose_' + settingId + '_ts_height_mobile', function (value) {
            value.bind(function (to) {
                var sectionClass = '#' + settingId + '-section';
                var desktop = wp.customize('spark_multipurpose_' + settingId + '_ts_height_desktop').get();
                var tablet = wp.customize('spark_multipurpose_' + settingId + '_ts_height_tablet').get();
                var mobile = to;

                var css = sectionClass + ' .section-seperator.top-section-seperator{height:' + desktop + 'px}';

                if (tablet) {
                    css += '@media screen and (max-width:768px){';
                    css += sectionClass + ' .section-seperator.top-section-seperator{height:' + tablet + 'px}';
                    css += '}';
                }

                if (mobile) {
                    css += '@media screen and (max-width:480px){';
                    css += sectionClass + ' .section-seperator.top-section-seperator{height:' + mobile + 'px}';
                    css += '}';
                }

                spark_multipurpose_set_dynamic_css('spark_multipurpose_' + settingId + '_ts_height', css);
            });
        });

        wp.customize('spark_multipurpose_' + settingId + '_bs_height_desktop', function (value) {
            value.bind(function (to) {
                var sectionClass = '#' + settingId + '-section';
                var desktop = to;
                var tablet = wp.customize('spark_multipurpose_' + settingId + '_bs_height_tablet').get();
                var mobile = wp.customize('spark_multipurpose_' + settingId + '_bs_height_mobile').get();

                var css = sectionClass + ' .section-seperator.bottom-section-seperator{height:' + desktop + 'px}';

                if (tablet) {
                    css += '@media screen and (max-width:768px){';
                    css += sectionClass + ' .section-seperator.bottom-section-seperator{height:' + tablet + 'px}';
                    css += '}';
                }

                if (mobile) {
                    css += '@media screen and (max-width:480px){';
                    css += sectionClass + ' .section-seperator.bottom-section-seperator{height:' + mobile + 'px}';
                    css += '}';
                }

                spark_multipurpose_set_dynamic_css('spark_multipurpose_' + settingId + '_bs_height', css);
            });
        });

        wp.customize('spark_multipurpose_' + settingId + '_bs_height_tablet', function (value) {
            value.bind(function (to) {
                var sectionClass = '#' + settingId + '-section';
                var desktop = wp.customize('spark_multipurpose_' + settingId + '_bs_height_desktop').get();
                var tablet = to;
                var mobile = wp.customize('spark_multipurpose_' + settingId + '_bs_height_mobile').get();

                var css = sectionClass + ' .section-seperator.bottom-section-seperator{height:' + desktop + 'px}';

                if (tablet) {
                    css += '@media screen and (max-width:768px){';
                    css += sectionClass + ' .section-seperator.bottom-section-seperator{height:' + tablet + 'px}';
                    css += '}';
                }

                if (mobile) {
                    css += '@media screen and (max-width:480px){';
                    css += sectionClass + ' .section-seperator.bottom-section-seperator{height:' + mobile + 'px}';
                    css += '}';
                }

                spark_multipurpose_set_dynamic_css('spark_multipurpose_' + settingId + '_bs_height', css);
            });
        });

        wp.customize('spark_multipurpose_' + settingId + '_bs_height_mobile', function (value) {
            value.bind(function (to) {
                var sectionClass = '#' + settingId + '-section';
                var desktop = wp.customize('spark_multipurpose_' + settingId + '_bs_height_desktop').get();
                var tablet = wp.customize('spark_multipurpose_' + settingId + '_bs_height_tablet').get();
                var mobile = to;

                var css = sectionClass + ' .section-seperator.bottom-section-seperator{height:' + desktop + 'px}';

                if (tablet) {
                    css += '@media screen and (max-width:768px){';
                    css += sectionClass + ' .section-seperator.bottom-section-seperator{height:' + tablet + 'px}';
                    css += '}';
                }

                if (mobile) {
                    css += '@media screen and (max-width:480px){';
                    css += sectionClass + ' .section-seperator.bottom-section-seperator{height:' + mobile + 'px}';
                    css += '}';
                }

                spark_multipurpose_set_dynamic_css('spark_multipurpose_' + settingId + '_bs_height', css);
            });
        });

    });

    /************
     * Top Header Settings 
    */
    wp.customize('spark_multipurpose_top_header_hide_show', function (value) {
        value.bind(function (to) {
            var visibility = JSON.parse(to);
            var desk_visibility = 'desktop-' + visibility.desktop;
            var tab_visibility = 'tablet-' + visibility.tablet;
            var mob_visibility = 'mobile-' + visibility.mobile;
            var spark_multipurpose_top_bar = 'top-menu-bar ' + desk_visibility + ' ' + tab_visibility + ' ' + mob_visibility;
            $('.top-menu-bar').attr('class', spark_multipurpose_top_bar);
        });
    });

    wp.customize('spark_multipurpose_top_header_enable', function (value) {
        value.bind(function (to) {
            if (to === 'enable') {
                $('.top-menu-bar').css('display', 'block');
            } else {
                $('.top-menu-bar').css('display', 'none');
            }

        })
    });
    wp.customize('spark_multipurpose_th_bg_color', function (value) {
        value.bind(function (color) {
            $('.top-menu-bar').css('background-color', color);
        })
    });
    wp.customize('spark_multipurpose_th_text_color', function (value) {
        value.bind(function (color) {
            $('.top-menu-bar span, .top-menu-bar .sp_quick_info li, .top-bar-menu .sp_quick_info li i').css('color', color);
        })
    });
    wp.customize('spark_multipurpose_th_anchor_color', function (value) {
        value.bind(function (color) {
            var css = '.top-menu-bar a{ color:' + color + '!important}';
            spark_multipurpose_set_dynamic_css('spark_multipurpose_th_anchor_color', css);
        })
    });

    wp.customize('spark_multipurpose_th_content_padding', function (value) {
        value.bind(function (to) {
            var selector = ".top-menu-bar";
            var section_padding = JSON.parse(to);
            $(selector).css({ "padding-top": section_padding.desktop.top + "px", "padding-right": section_padding.desktop.right + "px", "padding-bottom": section_padding.desktop.bottom + "px", "padding-left": section_padding.desktop.left + "px" });

            if (($(window).width() >= 700) && ($(window).width() < 992)) {
                $(selector).css({ "padding-top": section_padding.tablet.top + "px", "padding-right": section_padding.tablet.right + "px", "padding-bottom": section_padding.tablet.bottom + "px", "padding-left": section_padding.tablet.left + "px" });
            }

            if ($(window).width() < 500) {
                $(selector).css({ "padding-top": section_padding.mobile.top + "px", "padding-right": section_padding.mobile.right + "px", "padding-bottom": section_padding.mobile.bottom + "px", "padding-left": section_padding.mobile.left + "px" });
            }

        });
    });
    wp.customize('spark_multipurpose_th_content_margin', function (value) {
        value.bind(function (to) {
            var selector = ".top-menu-bar";
            var section_margin = JSON.parse(to);
            $(selector).css({ "margin-top": section_margin.desktop.top + "px", "margin-right": section_margin.desktop.right + "px", "margin-bottom": section_margin.desktop.bottom + "px", "margin-left": section_margin.desktop.left + "px" });

            if (($(window).width() >= 700) && ($(window).width() < 992)) {
                $(selector).css({ "margin-top": section_margin.tablet.top + "px", "margin-right": section_margin.tablet.right + "px", "margin-bottom": section_margin.tablet.bottom + "px", "margin-left": section_margin.tablet.left + "px" });
            }

            if ($(window).width() < 500) {
                $(selector).css({ "margin-top": section_margin.mobile.top + "px", "margin-right": section_margin.mobile.right + "px", "margin-bottom": section_margin.mobile.bottom + "px", "margin-left": section_margin.mobile.left + "px" });
            }

        });
    });
    wp.customize('spark_multipurpose_th_content_radius', function (value) {
        value.bind(function (to) {
            var section_val = JSON.parse(to);
            var selector = '.top-menu-bar';

            var css = selector + "{ border-radius: " + section_val.desktop.top + "px " + section_val.desktop.right + "px " + section_val.desktop.bottom + "px " + section_val.desktop.left + "px;}";

            css += '@media screen and (max-width:768px){';
            selector + "{ border-radius: " + section_val.tablet.top + "px " + section_val.tablet.right + "px " + section_val.tablet.bottom + "px " + section_val.tablet.left + "px;}";
            css += '}';


            css += '@media screen and (max-width:480px){';
            css += selector + "{ border-radius: " + section_val.mobile.top + "px " + section_val.mobile.right + "px " + section_val.mobile.bottom + "px " + section_val.mobile.left + "px;}";
            css += '}';

            spark_multipurpose_set_dynamic_css('spark_multipurpose_th_content_radius', css);
        });
    });

    /**************
     * Main Header
    */
    wp.customize('spark_multipurpose_enable_search', function (value) {
        value.bind(function (to) {
            if (to === 'enable') {
                $('.menu-item-search').css('display', 'flex');
            } else {
                $('.menu-item-search').css('display', 'none');
            }

        })
    });
    wp.customize('spark_multipurpose_hamburger_color', function (value) {
        value.bind(function (to) {
            $('.nav-classic .header-nav-toggle div').css('background-color', to);
        })
    });


    /*********
     * Header Quick Infromation
    */
    wp.customize('spark_multipurpose_quick_info_icon_color', function (value) {
        value.bind(function (color) {
            $('.nav-classic .contact-info .quickcontact .get-tuch i').css('color', color);
        })
    });
    wp.customize('spark_multipurpose_quick_info_color', function (value) {
        value.bind(function (color) {
            $('.nav-classic .contact-info .quickcontact .get-tuch .quickcontactwrap').css('color', color);
        })
    });


    /*******
     * Menu Style Setting 
    */
    wp.customize('spark_multipurpose_header_nav_wrap_bg_color', function (value) {
        value.bind(function (color) {
            $('.nav-classic .nav-menu, .headertwo .nav-classic .nav-menu').css('background-color', color);
        })
    });

    /** Menu Item Settings */
    wp.customize('spark_multipurpose_header_item_group', function (value) {
        value.bind(function (to) {
            var value = JSON.parse(to);
            var css = ".box-header-nav .main-menu .page_item a, .box-header-nav .main-menu>.menu-item>a, .headertwo .box-header-nav .main-menu .page_item a, .headertwo .box-header-nav .main-menu>.menu-item>a{ \
                color:" + value.color + "; \
                background: " + value.bg_color + "; \
            }";

            css += ".box-header-nav .main-menu .page_item a, .box-header-nav .main-menu>.menu-item>a, .headertwo .box-header-nav .main-menu .page_item a, .headertwo .box-header-nav .main-menu>.menu-item>a{ border-radius: " + value.radius.desktop.top + "px " + value.radius.desktop.right + "px " + value.radius.desktop.bottom + "px " + value.radius.desktop.left + "px;}";
            css += '@media screen and (max-width:768px){';
            ".box-header-nav .main-menu .page_item a, .box-header-nav .main-menu>.menu-item>a, .headertwo .box-header-nav .main-menu .page_item a, .headertwo .box-header-nav .main-menu>.menu-item>a{ border-radius: " + value.radius.tablet.top + "px " + value.radius.tablet.right + "px " + value.radius.tablet.bottom + "px " + value.radius.tablet.left + "px;}";
            css += '}';
            css += '@media screen and (max-width:480px){';
            css += ".box-header-nav .main-menu .page_item a, .box-header-nav .main-menu>.menu-item>a, .headertwo .box-header-nav .main-menu .page_item a, .headertwo .box-header-nav .main-menu>.menu-item>a{ border-radius: " + value.radius.mobile.top + "px " + value.radius.mobile.right + "px " + value.radius.mobile.bottom + "px " + value.radius.mobile.left + "px;}";
            css += '}';

            css += ".box-header-nav .main-menu .page_item a, .box-header-nav .main-menu>.menu-item>a, .headertwo .box-header-nav .main-menu .page_item a, .headertwo .box-header-nav .main-menu>.menu-item>a{margin-top:" + value.margin.desktop.top + "px; margin-right:" + value.margin.desktop.right + "px; margin-bottom:" + value.margin.desktop.bottom + "px; margin-left:" + value.margin.desktop.left + "px; }";
            css += '@media screen and (max-width:768px){';
            css += ".box-header-nav .main-menu .page_item a, .box-header-nav .main-menu>.menu-item>a, .headertwo .box-header-nav .main-menu .page_item a, .headertwo .box-header-nav .main-menu>.menu-item>a{margin-top:" + value.margin.tablet.top + "px; margin-right:" + value.margin.tablet.right + "px; margin-bottom:" + value.margin.tablet.bottom + "px; margin-left:" + value.margin.tablet.left + "px; }";
            css += '}';
            css += '@media screen and (max-width:480px){';
            css += ".box-header-nav .main-menu .page_item a, .box-header-nav .main-menu>.menu-item>a, .headertwo .box-header-nav .main-menu .page_item a, .headertwo .box-header-nav .main-menu>.menu-item>a{margin-top:" + value.margin.mobile.top + "px; margin-right:" + value.margin.mobile.right + "px; margin-bottom:" + value.margin.mobile.bottom + "px; margin-left:" + value.margin.mobile.left + "px; }";
            css += '}';

            css += ".box-header-nav .main-menu .page_item a, .box-header-nav .main-menu>.menu-item>a, .headertwo .box-header-nav .main-menu .page_item a, .headertwo .box-header-nav .main-menu>.menu-item>a{padding-top:" + value.padding.desktop.top + "px; padding-right:" + value.padding.desktop.right + "px; padding-bottom:" + value.padding.desktop.bottom + "px; padding-left:" + value.padding.desktop.left + "px; }";
            css += '@media screen and (max-width:768px){';
            css += ".box-header-nav .main-menu .page_item a, .box-header-nav .main-menu>.menu-item>a, .headertwo .box-header-nav .main-menu .page_item a, .headertwo .box-header-nav .main-menu>.menu-item>a{padding-top:" + value.padding.tablet.top + "px; padding-right:" + value.padding.tablet.right + "px; padding-bottom:" + value.padding.tablet.bottom + "px; padding-left:" + value.padding.tablet.left + "px; }";
            css += '}';
            css += '@media screen and (max-width:480px){';
            css += ".box-header-nav .main-menu .page_item a, .box-header-nav .main-menu>.menu-item>a, .headertwo .box-header-nav .main-menu .page_item a, .headertwo .box-header-nav .main-menu>.menu-item>a{padding-top:" + value.padding.mobile.top + "px; padding-right:" + value.padding.mobile.right + "px; padding-bottom:" + value.padding.mobile.bottom + "px; padding-left:" + value.padding.mobile.left + "px; }";
            css += '}';

            spark_multipurpose_set_dynamic_css('spark_multipurpose_header_item_group', css);
        });
    });

    /** Sub Menu Item ( Child Menu ) Settings */
    wp.customize('spark_multipurpose_header_sub_item_group', function (value) {
        value.bind(function (to) {
            var value = JSON.parse(to);

            var css = ".box-header-nav .main-menu .children, .box-header-nav .main-menu .sub-menu{ \
                background: " + value.bg_color + "; \
            }";

            css += ".box-header-nav .main-menu .children>.page_item>a, .box-header-nav .main-menu .sub-menu>.menu-item>a{ \
                color:" + value.color + ";\
            }";

            css += ".box-header-nav .main-menu .children>.page_item>a, .box-header-nav .main-menu .sub-menu>.menu-item>a{ border-radius: " + value.radius.desktop.top + "px " + value.radius.desktop.right + "px " + value.radius.desktop.bottom + "px " + value.radius.desktop.left + "px;}";
            css += '@media screen and (max-width:768px){';
            ".box-header-nav .main-menu .children>.page_item>a, .box-header-nav .main-menu .sub-menu>.menu-item>a{ border-radius: " + value.radius.tablet.top + "px " + value.radius.tablet.right + "px " + value.radius.tablet.bottom + "px " + value.radius.tablet.left + "px;}";
            css += '}';
            css += '@media screen and (max-width:480px){';
            css += ".box-header-nav .main-menu .children>.page_item>a, .box-header-nav .main-menu .sub-menu>.menu-item>a{ border-radius: " + value.radius.mobile.top + "px " + value.radius.mobile.right + "px " + value.radius.mobile.bottom + "px " + value.radius.mobile.left + "px;}";
            css += '}';

            css += ".box-header-nav .main-menu .children>.page_item>a, .box-header-nav .main-menu .sub-menu>.menu-item>a{margin-top:" + value.margin.desktop.top + "px; margin-right:" + value.margin.desktop.right + "px; margin-bottom:" + value.margin.desktop.bottom + "px; margin-left:" + value.margin.desktop.left + "px; }";
            css += '@media screen and (max-width:768px){';
            css += ".box-header-nav .main-menu .children>.page_item>a, .box-header-nav .main-menu .sub-menu>.menu-item>a{margin-top:" + value.margin.tablet.top + "px; margin-right:" + value.margin.tablet.right + "px; margin-bottom:" + value.margin.tablet.bottom + "px; margin-left:" + value.margin.tablet.left + "px; }";
            css += '}';
            css += '@media screen and (max-width:480px){';
            css += ".box-header-nav .main-menu .children>.page_item>a, .box-header-nav .main-menu .sub-menu>.menu-item>a{margin-top:" + value.margin.mobile.top + "px; margin-right:" + value.margin.mobile.right + "px; margin-bottom:" + value.margin.mobile.bottom + "px; margin-left:" + value.margin.mobile.left + "px; }";
            css += '}';

            css += ".box-header-nav .main-menu .children>.page_item>a, .box-header-nav .main-menu .sub-menu>.menu-item>a{padding-top:" + value.padding.desktop.top + "px; padding-right:" + value.padding.desktop.right + "px; padding-bottom:" + value.padding.desktop.bottom + "px; padding-left:" + value.padding.desktop.left + "px; }";
            css += '@media screen and (max-width:768px){';
            css += ".box-header-nav .main-menu .children>.page_item>a, .box-header-nav .main-menu .sub-menu>.menu-item>a{padding-top:" + value.padding.tablet.top + "px; padding-right:" + value.padding.tablet.right + "px; padding-bottom:" + value.padding.tablet.bottom + "px; padding-left:" + value.padding.tablet.left + "px; }";
            css += '}';
            css += '@media screen and (max-width:480px){';
            css += ".box-header-nav .main-menu .children>.page_item>a, .box-header-nav .main-menu .sub-menu>.menu-item>a{padding-top:" + value.padding.mobile.top + "px; padding-right:" + value.padding.mobile.right + "px; padding-bottom:" + value.padding.mobile.bottom + "px; padding-left:" + value.padding.mobile.left + "px; }";
            css += '}';

            spark_multipurpose_set_dynamic_css('spark_multipurpose_header_sub_item_group', css);
        });
    });

    /** Menu Active Item Settings */
    wp.customize('spark_multipurpose_header_nav_hover_group', function (value) {
        value.bind(function (to) {
            var value = JSON.parse(to);
            var css = ".box-header-nav .main-menu .page_item.current_page_item>a, .box-header-nav .main-menu .page_item:hover>a, .box-header-nav .main-menu .page_item.focus>a, .box-header-nav .main-menu>.menu-item.current-menu-item>a, .box-header-nav .main-menu>.menu-item:hover>a, .box-header-nav .main-menu>.menu-item.focus>a, .headertwo .box-header-nav .main-menu .page_item.current_page_item>a, .headertwo .box-header-nav .main-menu>.menu-item.current-menu-item>a, .headertwo .box-header-nav .main-menu .page_item:hover>a, .headertwo .box-header-nav .main-menu .page_item.focus>a, .headertwo .box-header-nav .main-menu>.menu-item:hover>a, .headertwo .box-header-nav .main-menu>.menu-item.focus>a{\
                color:" + value.nav_color + "; \
                background: " + value.nav_bg_color + "; \
            }";
            spark_multipurpose_set_dynamic_css('spark_multipurpose_header_nav_hover_group', css);
        });
    });


    /************
     * Header Button 
    */
    wp.customize('spark_multipurpose_hb_title', function (value) {
        value.bind(function (to) {
            $('.buttonwrap .quickcontact-title').text(to);
        })
    });
    wp.customize('spark_multipurpose_hb_text', function (value) {
        value.bind(function (to) {
            $('.buttonwrap span').text(to);
        })
    });
    wp.customize('spark_multipurpose_hb_link', function (value) {
        value.bind(function (to) {
            $('.spark-multipurpose-header-button a').attr('href', to);
        })
    });

    wp.customize('spark_multipurpose_header_button_color', function (value) {
        value.bind(function (to) {
            var value = JSON.parse(to);
            var css = ".spark-multipurpose-header-button{ \
                color:" + value.text + "; \
                background: " + value.background + "; \
                font-size:" + value[ 'font-size' ] + "px;\
                width:" + value.width + "px;\
            }";
            css += ".spark-multipurpose-header-button{ border-radius: " + value.radius.desktop.top + "px " + value.radius.desktop.right + "px " + value.radius.desktop.bottom + "px " + value.radius.desktop.left + "px;}";
            css += '@media screen and (max-width:768px){';
            ".spark-multipurpose-header-button{ border-radius: " + value.radius.tablet.top + "px " + value.radius.tablet.right + "px " + value.radius.tablet.bottom + "px " + value.radius.tablet.left + "px;}";
            css += '}';
            css += '@media screen and (max-width:480px){';
            css += ".spark-multipurpose-header-button{ border-radius: " + value.radius.mobile.top + "px " + value.radius.mobile.right + "px " + value.radius.mobile.bottom + "px " + value.radius.mobile.left + "px;}";
            css += '}';

            css += ".spark-multipurpose-header-button{margin-top:" + value.margin.desktop.top + "px; margin-right:" + value.margin.desktop.right + "px; margin-bottom:" + value.margin.desktop.bottom + "px; margin-left:" + value.margin.desktop.left + "px; }";
            css += '@media screen and (max-width:768px){';
            css += ".spark-multipurpose-header-button{margin-top:" + value.margin.tablet.top + "px; margin-right:" + value.margin.tablet.right + "px; margin-bottom:" + value.margin.tablet.bottom + "px; margin-left:" + value.margin.tablet.left + "px; }";
            css += '}';
            css += '@media screen and (max-width:480px){';
            css += ".spark-multipurpose-header-button{margin-top:" + value.margin.mobile.top + "px; margin-right:" + value.margin.mobile.right + "px; margin-bottom:" + value.margin.mobile.bottom + "px; margin-left:" + value.margin.mobile.left + "px; }";
            css += '}';

            css += ".spark-multipurpose-header-button{padding-top:" + value.padding.desktop.top + "px; padding-right:" + value.padding.desktop.right + "px; padding-bottom:" + value.padding.desktop.bottom + "px; padding-left:" + value.padding.desktop.left + "px; }";
            css += '@media screen and (max-width:768px){';
            css += ".spark-multipurpose-header-button{padding-top:" + value.padding.tablet.top + "px; padding-right:" + value.padding.tablet.right + "px; padding-bottom:" + value.padding.tablet.bottom + "px; padding-left:" + value.padding.tablet.left + "px; }";
            css += '}';
            css += '@media screen and (max-width:480px){';
            css += ".spark-multipurpose-header-button{padding-top:" + value.padding.mobile.top + "px; padding-right:" + value.padding.mobile.right + "px; padding-bottom:" + value.padding.mobile.bottom + "px; padding-left:" + value.padding.mobile.left + "px; }";
            css += '}';

            spark_multipurpose_set_dynamic_css('spark_multipurpose_header_button_color', css);
        });
    });

    wp.customize('spark_multipurpose_header_button_hover_color', function (value) {
        value.bind(function (to) {
            var value = JSON.parse(to);
            var css = ".spark-multipurpose-header-button:hover{ color:" + value.text + "; background: " + value.background + "; }";
            spark_multipurpose_set_dynamic_css('spark_multipurpose_header_button_hover_color', css);
        });
    });

    /**
     * Slider
     */
    wp.customize('spark_multipurpose_slider_height', function (value) {
        value.bind(function (to) {
            $('.video-banner, .banner-slider .slider-item').css('height', to + 'vh');
        });
    });

    wp.customize('spark_multipurpose_slider_height_tablet', function (value) {
        value.bind(function (to) {
            $('.video-banner, .banner-slider .slider-item').css('height', to + 'vh');
        });
    });
    wp.customize('spark_multipurpose_slider_height_mobile', function (value) {
        value.bind(function (to) {
            $('.video-banner, .banner-slider .slider-item').css('height', to + 'vh');
        });
    });

    /***
     * Slider Seperator
     */
    wp.customize('spark_multipurpose_slider_bs_color', function (value) {
        value.bind(function (to) {
            $('.bottom-section-seperator svg').css('fill', to);
        });
    });

    wp.customize('spark_multipurpose_slider_bs_height', function (value) {
        value.bind(function (to) {
            var desktop = to;
            var tablet = wp.customize('spark_multipurpose_slider_bs_height_tablet').get();
            var mobile = wp.customize('spark_multipurpose_slider_bs_height_mobile').get();

            var css = '.section-seperator.bottom-section-seperator{height:' + desktop + 'px}';

            if (tablet) {
                css += '@media screen and (max-width:768px){';
                css += '.section-seperator.bottom-section-seperator{height:' + tablet + 'px}';
                css += '}';
            }
            if (mobile) {
                css += '@media screen and (max-width:480px){';
                css += '.section-seperator.bottom-section-seperator{height:' + mobile + 'px}';
                css += '}';
            }

            spark_multipurpose_set_dynamic_css('spark_multipurpose_slider_bs_height', css);
        });
    });

    wp.customize('spark_multipurpose_banner_overlay_color', function (value) {
        value.bind(function (to) {
            var css = ".banner-slider .slider-item:before{ background-color:" + to + " }";
            spark_multipurpose_set_dynamic_css('spark_multipurpose_banner_overlay_color', css);
        });
    });

    /** Slider Title */
    wp.customize('spark_multipurpose_caption_title_font_size', function (value) {
        value.bind(function (to) {
            $('.banner-slider .slider-item .slider-content .maintitle').css('font-size', to + 'px');
        });
    });
    wp.customize('spark_multipurpose_caption_title_font_size_tablet', function (value) {
        value.bind(function (to) {
            $('.banner-slider .slider-item .slider-content .maintitle').css('font-size', to + 'px');
        });
    });
    wp.customize('spark_multipurpose_caption_title_font_size_mobile', function (value) {
        value.bind(function (to) {
            $('.banner-slider .slider-item .slider-content .maintitle').css('font-size', to + 'px');
        });
    });

    /** Slider Description */
    wp.customize('spark_multipurpose_caption_desc_font_size', function (value) {
        value.bind(function (to) {
            $('.banner-slider .slider-item .slider-content .maincontent p').css('font-size', to + 'px');
        });
    });
    wp.customize('spark_multipurpose_caption_desc_font_size_tablet', function (value) {
        value.bind(function (to) {
            $('.banner-slider .slider-item .slider-content .maincontent p').css('font-size', to + 'px');
        });
    });
    wp.customize('spark_multipurpose_caption_desc_font_size_mobile', function (value) {
        value.bind(function (to) {
            $('.banner-slider .slider-item .slider-content .maincontent p').css('font-size', to + 'px');
        });
    });

    /**** Title & Description Colors */
    wp.customize('spark_multipurpose_slider_supertitle_color', function (value) {
        value.bind(function (to) {
            var css = ".banner-slider .slider-item .slider-content .supertitle{ color:" + to + " !important; }";
            spark_multipurpose_set_dynamic_css('spark_multipurpose_slider_supertitle_color', css);
        });
    });
    wp.customize('spark_multipurpose_slider_title_color', function (value) {
        value.bind(function (to) {
            var css = ".banner-slider .slider-item .slider-content .maintitle{ color:" + to + " !impotant; }";
            spark_multipurpose_set_dynamic_css('spark_multipurpose_slider_title_color', css);
        });
    });
    wp.customize('spark_multipurpose_slider_desc_color', function (value) {
        value.bind(function (to) {
            var css = ".banner-slider .slider-item .slider-content p{ color:" + to + " !important; }";
            spark_multipurpose_set_dynamic_css('spark_multipurpose_slider_desc_color', css);
        });
    });

    wp.customize('spark_multipurpose_banner_caption_overlay_color', function (value) {
        value.bind(function (to) {
            var css = ".banner-slider .slider-item .slider-content, .banner-slider .slider-item:before{ background-color:" + to + " !important; }";
            spark_multipurpose_set_dynamic_css('spark_multipurpose_banner_caption_overlay_color', css);
        });
    });

    wp.customize('spark_multipurpose_slider_caption_alignment', function (value) {
        value.bind(function (to) {
            $('#banner-slider .slider-item').removeClass('text-left text-center text-right').addClass(to);
        })
    });

    wp.customize('spark_multipurpose_slider_padding', function (value) {
        value.bind(function (to) {

            var section_margin = JSON.parse(to);

            var css = ".banner-slider .slider-item .slider-content{padding-top:" + section_margin.desktop.top + "px; padding-right:" + section_margin.desktop.right + "px; padding-bottom:" + section_margin.desktop.bottom + "px; padding-left:" + section_margin.desktop.left + "px; }";
            $('head').append('<style type="text/css">' + css + '</style>');

            var css2 = '@media screen and (max-width:768px){';
            css2 += ".banner-slider .slider-item .slider-content{padding-top:" + section_margin.tablet.top + "px; padding-right:" + section_margin.tablet.right + "px; padding-bottom:" + section_margin.tablet.bottom + "px; padding-left:" + section_margin.tablet.left + "px; }";
            css2 += '}';
            $('head').append('<style type="text/css">' + css2 + '</style>');

            var css3 = '@media screen and (max-width:480px){';
            css3 += ".banner-slider .slider-item .slider-content{padding-top:" + section_margin.mobile.top + "px; padding-right:" + section_margin.mobile.right + "px; padding-bottom:" + section_margin.mobile.bottom + "px; padding-left:" + section_margin.mobile.left + "px; }";
            css3 += '}';
            $('head').append('<style type="text/css">' + css3 + '</style>');

        });
    });

    wp.customize('spark_multipurpose_slider_margin', function (value) {
        value.bind(function (to) {
            var section_val = JSON.parse(to);
            var css = ".banner-slider.video-banner, .banner-slider .slider-item .slider-content{ margin: " + section_val.desktop.top + "px " + section_val.desktop.right + "px " + section_val.desktop.bottom + "px " + section_val.desktop.left + "px;}";

            css += '@media screen and (max-width:768px){';
            ".banner-slider.video-banner, .banner-slider .slider-item .slider-content{ margin: " + section_val.tablet.top + "px " + section_val.tablet.right + "px " + section_val.tablet.bottom + "px " + section_val.tablet.left + "px;}";
            css += '}';

            css += '@media screen and (max-width:480px){';
            css += ".banner-slider.video-banner, .banner-slider .slider-item .slider-content{ margin: " + section_val.mobile.top + "px " + section_val.mobile.right + "px " + section_val.mobile.bottom + "px " + section_val.mobile.left + "px;}";
            css += '}';

            spark_multipurpose_set_dynamic_css('spark_multipurpose_slider_margin', css);
        });
    });


    wp.customize('spark_multipurpose_slider_caption_radius', function (value) {
        value.bind(function (to) {
            var section_val = JSON.parse(to);
            var css = ".banner-slider.video-banner, .banner-slider .slider-item .slider-content{ border-radius: " + section_val.desktop.top + "px " + section_val.desktop.right + "px " + section_val.desktop.bottom + "px " + section_val.desktop.left + "px;}";

            css += '@media screen and (max-width:768px){';
            ".banner-slider.video-banner, .banner-slider .slider-item .slider-content{ border-radius: " + section_val.tablet.top + "px " + section_val.tablet.right + "px " + section_val.tablet.bottom + "px " + section_val.tablet.left + "px;}";
            css += '}';

            css += '@media screen and (max-width:480px){';
            css += ".banner-slider.video-banner, .banner-slider .slider-item .slider-content{ border-radius: " + section_val.mobile.top + "px " + section_val.mobile.right + "px " + section_val.mobile.bottom + "px " + section_val.mobile.left + "px;}";
            css += '}';

            spark_multipurpose_set_dynamic_css('spark_multipurpose_slider_caption_radius', css);
        });
    });


    /******* Owl Carousel Refresh in Customizer Slide */
    jQuery(document).ready(function ($) {
        wp.customize.selectiveRefresh.bind('partial-content-rendered', function (placement) {
            var brtl = $("body").hasClass('rtl') ? true : false;
            //AOS.init();
            var p_p_id = placement.partial.id;

            slider_refresh = [
                'spark_multipurpose_slider_refresh',
            ];
            if (slider_refresh.includes(p_p_id)) {

                var brtl = false;
                if (jQuery("body").hasClass('rtl')) brtl = true;
                var $owlHome = $(".features-slider");
                $owlHome.owlCarousel({
                    items: 1,
                    rtl: brtl,
                    autoplay: parseInt($owlHome.data('autoplay')) == 1 ? true : false,
                    autoplayTimeout: parseInt($owlHome.data('pause')) || 5000,
                    smartSpeed: parseInt($owlHome.data('speed')) || 2000,
                    margin: 0,
                    loop: parseInt($owlHome.data('loop')) == 1 ? true : false,
                    dots: parseInt($owlHome.data('pager')) == 1 ? true : false,
                    nav: parseInt($owlHome.data('controls')) == 1 ? true : false,
                    singleItem: true,
                    animateOut: $owlHome.data('easing') || 'fadeOut',
                    transitionStyle: $owlHome.data('mode') || 'fade',
                    touchDrag: parseInt($owlHome.data('drag')) == 1 ? true : false,
                    mouseDrag: parseInt($owlHome.data('drag')) == 1 ? true : false,
                });
            }

            if (p_p_id == 'spark_multipurpose_testimonial_refresh') {
                $("#testimonial_slider").each(function () {
                    var $this = $(this);
                    //var dataCol = $this.attr('data-col') || 1;
                    $this.owlCarousel({
                        loop: true,
                        margin: 10,
                        nav: false,
                        autoplay: true,
                        smartSpeed: 2500,
                        dots: true,
                        items: 1,
                    });
                });
            }

            if (p_p_id == 'spark_multipurpose_client_refresh') {
                $('.client-logo-slider').owlCarousel({
                    loop: true,
                    margin: 10,
                    dots: true,
                    nav: false,
                    autoplay: true,
                    smartSpeed: 3000,
                    autoplayTimeout: 5000,
                    rtl: brtl,
                    responsive: {
                        0: {
                            items: 2
                        },
                        600: {
                            items: 3
                        },
                        1000: {
                            items: 3
                        },
                        1024: {
                            items: 5
                        }
                    }
                });
            }

            if (p_p_id == 'spark_multipurpose_recentwork_section_disable_refresh') {
                $('.portfolio-slider').owlCarousel({
                    loop: true,
                    margin: 10,
                    nav: false,
                    dots: true,
                    autoplay: true,
                    smartSpeed: 2500,
                    center: true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        480: {
                            items: 1
                        },
                        769: {
                            items: 3
                        },
                        1024: {
                            items: 5
                        }
                    }
                });
            }

        });
    });

    /******
     * Logo ( Header Logo )
    */
    wp.customize('spark_multipurpose_logo_width', function (value) {
        value.bind(function (to) {
            $('.custom-logo-link img').css('width', to + '%');
        });
    });

    wp.customize('spark_multipurpose_logo_width_tablet', function (value) {
        value.bind(function (to) {
            $('.custom-logo-link img').css('width', to + '%');
        });
    });

    wp.customize('spark_multipurpose_logo_width_mobile', function (value) {
        value.bind(function (to) {
            $('.custom-logo-link img').css('width', to + '%');
        });
    });

    wp.customize('spark_multipurpose_logo_alignement', function (value) {
        value.bind(function (to) {

            const align_values = JSON.parse(to);
            var desk_class = 'desktop-' + align_values.desktop;
            var tab_class = 'tablet-' + align_values.tablet;
            var mob_class = 'mobile-' + align_values.mobile;
            var brandinglogo = 'brandinglogo-wrap ' + desk_class + ' ' + tab_class + ' ' + mob_class;
            var site_branding = 'site-branding ' + desk_class + ' ' + tab_class + ' ' + mob_class;

            $('.brandinglogo-wrap').attr('class', brandinglogo);
            $('.site-branding').attr('class', site_branding);
        });
    });


    /*****
     * Breacrumbs Settings
    */
    wp.customize('spark_multipurpose_titlebar_title_align', function (value) {
        value.bind(function (to) {
            $('.breadcrumb-section').removeClass('text-left text-center text-right').addClass(to);
        })
    });

    wp.customize('spark_multipurpose_titlebar_text_color', function (value) {
        value.bind(function (to) {
            $('.breadcrumb ul li').css('color', to + '%');
        });
    });


    /**********
     * Contact Us
    */
    wp.customize('spark_multipurpose_contact_social_button_bg_color', function (value) {
        value.bind(function (to) {
            var css = ".contact-detail .contact-social-icon a{background:" + to + "}";
            spark_multipurpose_set_dynamic_css('spark_multipurpose_contact_social_button_bg_color', css);
        });
    });

    wp.customize('spark_multipurpose_contact_social_button_text_color', function (value) {
        value.bind(function (to) {
            var css = ".contact-section .contact-detail .contact-social-icon a i{color:" + to + "}";
            spark_multipurpose_set_dynamic_css('spark_multipurpose_contact_social_button_text_color', css);
        });
    });

    wp.customize('spark_multipurpose_contact_info_bg_color', function (value) {
        value.bind(function (to) {
            var css = ".contact-detail{background-color:" + to + "}";
            spark_multipurpose_set_dynamic_css('spark_multipurpose_contact_info_bg_color', css);
        });
    });

    /**********
     * Promo Service 
     */
    wp.customize('spark_multipurpose_promoservice_style', function (value) {
        value.bind(function (to) {
            $('.promoservice-section').removeClass('style1 style2 style3 style4').addClass(to);
        })
    });
    wp.customize('spark_multipurpose_promoservice_show_image', function (value) {
        value.bind(function (to) {
            if (to === 'enable') {
                $('.promoservice-wrap .feature-list .box figure').css('display', 'block');
            } else {
                $('.promoservice-wrap .feature-list .box figure').css('display', 'none');
            }
        })
    });
    wp.customize('spark_multipurpose_promoservice_boxshadow', function (value) {
        value.bind(function (to) {
            if (to === 'enable') {
                $('#promoservice-section .feature-list').addClass('box-shadow');
            } else {
                $('#promoservice-section .feature-list').removeClass('box-shadow');
            }
        })
    });
    wp.customize('spark_multipurpose_promoservice_show_button', function (value) {
        value.bind(function (to) {
            if (to === 'enable') {
                $('.bottom-content-wrap a.btn').css('display', 'block');
            } else {
                $('.bottom-content-wrap a.btn').css('display', 'none');
            }
        })
    });
    wp.customize('spark_multipurpose_promoservice_show_icon', function (value) {
        value.bind(function (to) {
            if (to === 'enable') {
                $('.feature-list .icon-box').css('display', 'block');
            } else {
                $('.feature-list .icon-box').css('display', 'none');
            }
        })
    });


    /** Promo Service Block Grid Settings */
    wp.customize('spark_multipurpose_promo_service_block', function (value) {
        value.bind(function (to) {
            var value = JSON.parse(to);
            var css = '';

            css += ".promoservice-wrap .feature-list{ border-radius: " + value.radius.desktop.top + "px " + value.radius.desktop.right + "px " + value.radius.desktop.bottom + "px " + value.radius.desktop.left + "px;}";
            css += '@media screen and (max-width:768px){';
            ".promoservice-wrap .feature-list{ border-radius: " + value.radius.tablet.top + "px " + value.radius.tablet.right + "px " + value.radius.tablet.bottom + "px " + value.radius.tablet.left + "px;}";
            css += '}';
            css += '@media screen and (max-width:480px){';
            css += ".promoservice-wrap .feature-list{ border-radius: " + value.radius.mobile.top + "px " + value.radius.mobile.right + "px " + value.radius.mobile.bottom + "px " + value.radius.mobile.left + "px;}";
            css += '}';

            css += ".promoservice-wrap .feature-list{margin-top:" + value.margin.desktop.top + "px; margin-right:" + value.margin.desktop.right + "px; margin-bottom:" + value.margin.desktop.bottom + "px; margin-left:" + value.margin.desktop.left + "px; }";
            css += '@media screen and (max-width:768px){';
            css += ".promoservice-wrap .feature-list{margin-top:" + value.margin.tablet.top + "px; margin-right:" + value.margin.tablet.right + "px; margin-bottom:" + value.margin.tablet.bottom + "px; margin-left:" + value.margin.tablet.left + "px; }";
            css += '}';
            css += '@media screen and (max-width:480px){';
            css += ".promoservice-wrap .feature-list{margin-top:" + value.margin.mobile.top + "px; margin-right:" + value.margin.mobile.right + "px; margin-bottom:" + value.margin.mobile.bottom + "px; margin-left:" + value.margin.mobile.left + "px; }";
            css += '}';

            css += ".promoservice-wrap .feature-list{padding-top:" + value.padding.desktop.top + "px; padding-right:" + value.padding.desktop.right + "px; padding-bottom:" + value.padding.desktop.bottom + "px; padding-left:" + value.padding.desktop.left + "px; }";
            css += '@media screen and (max-width:768px){';
            css += ".promoservice-wrap .feature-list{padding-top:" + value.padding.tablet.top + "px; padding-right:" + value.padding.tablet.right + "px; padding-bottom:" + value.padding.tablet.bottom + "px; padding-left:" + value.padding.tablet.left + "px; }";
            css += '}';
            css += '@media screen and (max-width:480px){';
            css += ".promoservice-wrap .feature-list{padding-top:" + value.padding.mobile.top + "px; padding-right:" + value.padding.mobile.right + "px; padding-bottom:" + value.padding.mobile.bottom + "px; padding-left:" + value.padding.mobile.left + "px; }";
            css += '}';

            spark_multipurpose_set_dynamic_css('spark_multipurpose_promo_service_block', css);
        });
    });

    /** Promo Service Block Item Icon Settings */
    wp.customize('spark_multipurpose_promoservice_icon_style', function (value) {
        value.bind(function (to) {
            var value = JSON.parse(to);
            var css = ".promoservice-wrap .feature-list .icon-box{ \
                background-color: " + value.bg_color + "; \
                color:" + value.color + "; \
                border:solid " + value.borderwidth + "px " + value.bordercolor + "; \
            }";

            css += ".promoservice-wrap .feature-list .icon-box{ border-radius: " + value.radius.desktop.top + "px " + value.radius.desktop.right + "px " + value.radius.desktop.bottom + "px " + value.radius.desktop.left + "px !important;}";
            css += '@media screen and (max-width:768px){';
            ".promoservice-wrap .feature-list .icon-box{ border-radius: " + value.radius.tablet.top + "px " + value.radius.tablet.right + "px " + value.radius.tablet.bottom + "px " + value.radius.tablet.left + "px !important;}";
            css += '}';
            css += '@media screen and (max-width:480px){';
            css += ".promoservice-wrap .feature-list .icon-box{ border-radius: " + value.radius.mobile.top + "px " + value.radius.mobile.right + "px " + value.radius.mobile.bottom + "px " + value.radius.mobile.left + "px !important;}";
            css += '}';

            css += ".promoservice-wrap .feature-list .icon-box{padding-top:" + value.padding.desktop.top + "px !important; padding-right:" + value.padding.desktop.right + "px !important; padding-bottom:" + value.padding.desktop.bottom + "px !important; padding-left:" + value.padding.desktop.left + "px !important; }";
            css += '@media screen and (max-width:768px){';
            css += ".promoservice-wrap .feature-list .icon-box{padding-top:" + value.padding.tablet.top + "px; padding-right:" + value.padding.tablet.right + "px; padding-bottom:" + value.padding.tablet.bottom + "px; padding-left:" + value.padding.tablet.left + "px; }";
            css += '}';
            css += '@media screen and (max-width:480px){';
            css += ".promoservice-wrap .feature-list .icon-box{padding-top:" + value.padding.mobile.top + "px; padding-right:" + value.padding.mobile.right + "px; padding-bottom:" + value.padding.mobile.bottom + "px; padding-left:" + value.padding.mobile.left + "px; }";
            css += '}';

            spark_multipurpose_set_dynamic_css('spark_multipurpose_promoservice_icon_style', css);
        });
    });

    /***** Promo Service Block Items Images Settings */
    wp.customize('spark_multipurpose_promo_service_image_style', function (value) {
        value.bind(function (to) {
            var value = JSON.parse(to);
            var css = ".promoservice-wrap .feature-list .box figure img{ \
                height:" + value.height + "px; \
            }";

            css += ".promoservice-wrap .feature-list .box figure img{ border-radius: " + value.radius.desktop.top + "px " + value.radius.desktop.right + "px " + value.radius.desktop.bottom + "px " + value.radius.desktop.left + "px;}";
            css += '@media screen and (max-width:768px){';
            ".promoservice-wrap .feature-list .box figure img{ border-radius: " + value.radius.tablet.top + "px " + value.radius.tablet.right + "px " + value.radius.tablet.bottom + "px " + value.radius.tablet.left + "px;}";
            css += '}';
            css += '@media screen and (max-width:480px){';
            css += ".promoservice-wrap .feature-list .box figure img{ border-radius: " + value.radius.mobile.top + "px " + value.radius.mobile.right + "px " + value.radius.mobile.bottom + "px " + value.radius.mobile.left + "px;}";
            css += '}';

            css += ".promoservice-wrap .feature-list .box figure img{padding-top:" + value.padding.desktop.top + "px; padding-right:" + value.padding.desktop.right + "px; padding-bottom:" + value.padding.desktop.bottom + "px; padding-left:" + value.padding.desktop.left + "px; }";
            css += '@media screen and (max-width:768px){';
            css += ".promoservice-wrap .feature-list .box figure img{padding-top:" + value.padding.tablet.top + "px; padding-right:" + value.padding.tablet.right + "px; padding-bottom:" + value.padding.tablet.bottom + "px; padding-left:" + value.padding.tablet.left + "px; }";
            css += '}';
            css += '@media screen and (max-width:480px){';
            css += ".promoservice-wrap .feature-list .box figure img{padding-top:" + value.padding.mobile.top + "px; padding-right:" + value.padding.mobile.right + "px; padding-bottom:" + value.padding.mobile.bottom + "px; padding-left:" + value.padding.mobile.left + "px; }";
            css += '}';

            spark_multipurpose_set_dynamic_css('spark_multipurpose_promo_service_image_style', css);
        });
    });


    /*********
     * Service Section
    */
    wp.customize('spark_multipurpose_service_button', function (value) {
        value.bind(function (to) {
            $('.service-section .feature_detail a.btn').html(to + '<i class="fas fa-long-arrow-alt-right"></i>');
        })
    });
    wp.customize('spark_multipurpose_service_bg_url', function (value) {
        value.bind(function (to) {
            $('.feature_detail .feature_img img').attr('src', to);
        })
    });

    /*****
     * Our Team Member
    */
    wp.customize('spark_multipurpose_team_style', function (value) {
        value.bind(function (to) {
            $('.team-section').removeClass('style1 style2 style3').addClass(to);
        })
    });

    /***** Team Block Settings */
    wp.customize('spark_multipurpose_team_grid_style', function (value) {
        value.bind(function (to) {
            var value = JSON.parse(to);
            var css = ".team-section .box, .team-section.style2 .box{ \
                background-color: " + value.bg_color + "; \
                border:" + value.borderwidth + "px solid " + value.bordercolor + "; \
            }";

            css += ".team-section .box, .team-section.style2 .box{ border-radius: " + value.radius.desktop.top + "px " + value.radius.desktop.right + "px " + value.radius.desktop.bottom + "px " + value.radius.desktop.left + "px;}";
            css += '@media screen and (max-width:768px){';
            ".team-section .box, .team-section.style2 .box{ border-radius: " + value.radius.tablet.top + "px " + value.radius.tablet.right + "px " + value.radius.tablet.bottom + "px " + value.radius.tablet.left + "px;}";
            css += '}';
            css += '@media screen and (max-width:480px){';
            css += ".team-section .box, .team-section.style2 .box{ border-radius: " + value.radius.mobile.top + "px " + value.radius.mobile.right + "px " + value.radius.mobile.bottom + "px " + value.radius.mobile.left + "px;}";
            css += '}';

            css += ".team-section .box, .team-section.style2 .box{margin-top:" + value.margin.desktop.top + "px; margin-right:" + value.margin.desktop.right + "px; margin-bottom:" + value.margin.desktop.bottom + "px; margin-left:" + value.margin.desktop.left + "px; }";
            css += '@media screen and (max-width:768px){';
            css += ".team-section .box, .team-section.style2 .box{margin-top:" + value.margin.tablet.top + "px; margin-right:" + value.margin.tablet.right + "px; margin-bottom:" + value.margin.tablet.bottom + "px; margin-left:" + value.margin.tablet.left + "px; }";
            css += '}';
            css += '@media screen and (max-width:480px){';
            css += ".team-section .box, .team-section.style2 .box{margin-top:" + value.margin.mobile.top + "px; margin-right:" + value.margin.mobile.right + "px; margin-bottom:" + value.margin.mobile.bottom + "px; margin-left:" + value.margin.mobile.left + "px; }";
            css += '}';

            css += ".team-section .box, .team-section.style2 .box{padding-top:" + value.padding.desktop.top + "px; padding-right:" + value.padding.desktop.right + "px; padding-bottom:" + value.padding.desktop.bottom + "px; padding-left:" + value.padding.desktop.left + "px; }";
            css += '@media screen and (max-width:768px){';
            css += ".team-section .box, .team-section.style2 .box{padding-top:" + value.padding.tablet.top + "px; padding-right:" + value.padding.tablet.right + "px; padding-bottom:" + value.padding.tablet.bottom + "px; padding-left:" + value.padding.tablet.left + "px; }";
            css += '}';
            css += '@media screen and (max-width:480px){';
            css += ".team-section .box, .team-section.style2 .box{padding-top:" + value.padding.mobile.top + "px; padding-right:" + value.padding.mobile.right + "px; padding-bottom:" + value.padding.mobile.bottom + "px; padding-left:" + value.padding.mobile.left + "px; }";
            css += '}';

            spark_multipurpose_set_dynamic_css('spark_multipurpose_team_grid_style', css);
        });
    });

    /***** Team Block Items Settings */
    wp.customize('spark_multipurpose_team_image_style', function (value) {
        value.bind(function (to) {
            var value = JSON.parse(to);
            var css = ".team-section .box figure img, .team-section.style2 .box figure img{ \
                background-color: " + value.bg_color + "; \
                height:" + value.height + "px; \
                width:" + value.width + "px; \
                margin-top:" + value.margintop + "px; \
            }";

            css += ".team-section .box figure img, .team-section.style2 .box figure img{ border-radius: " + value.radius.desktop.top + "px " + value.radius.desktop.right + "px " + value.radius.desktop.bottom + "px " + value.radius.desktop.left + "px;}";
            css += '@media screen and (max-width:768px){';
            ".team-section .box figure img, .team-section.style2 .box figure img{ border-radius: " + value.radius.tablet.top + "px " + value.radius.tablet.right + "px " + value.radius.tablet.bottom + "px " + value.radius.tablet.left + "px;}";
            css += '}';
            css += '@media screen and (max-width:480px){';
            css += ".team-section .box figure img, .team-section.style2 .box figure img{ border-radius: " + value.radius.mobile.top + "px " + value.radius.mobile.right + "px " + value.radius.mobile.bottom + "px " + value.radius.mobile.left + "px;}";
            css += '}';

            css += ".team-section .box figure img, .team-section.style2 .box figure img{padding-top:" + value.padding.desktop.top + "px; padding-right:" + value.padding.desktop.right + "px; padding-bottom:" + value.padding.desktop.bottom + "px; padding-left:" + value.padding.desktop.left + "px; }";
            css += '@media screen and (max-width:768px){';
            css += ".team-section .box figure img, .team-section.style2 .box figure img{padding-top:" + value.padding.tablet.top + "px; padding-right:" + value.padding.tablet.right + "px; padding-bottom:" + value.padding.tablet.bottom + "px; padding-left:" + value.padding.tablet.left + "px; }";
            css += '}';
            css += '@media screen and (max-width:480px){';
            css += ".team-section .box figure img, .team-section.style2 .box figure img{padding-top:" + value.padding.mobile.top + "px; padding-right:" + value.padding.mobile.right + "px; padding-bottom:" + value.padding.mobile.bottom + "px; padding-left:" + value.padding.mobile.left + "px; }";
            css += '}';

            spark_multipurpose_set_dynamic_css('spark_multipurpose_team_image_style', css);
        });
    });

    /*****
     * Client Logo
    */
    wp.customize('spark_multipurpose_client_block_group', function (value) {
        value.bind(function (to) {
            var value = JSON.parse(to);
            var css = ".client_logo .item{ \
                background-color: " + value.bg_color + "; \
                border:" + value.borderwidth + "px solid " + value.bordercolor + "; \
            }";

            css += ".client_logo .item{ border-radius: " + value.radius.desktop.top + "px " + value.radius.desktop.right + "px " + value.radius.desktop.bottom + "px " + value.radius.desktop.left + "px;}";
            css += '@media screen and (max-width:768px){';
            ".client_logo .item{ border-radius: " + value.radius.tablet.top + "px " + value.radius.tablet.right + "px " + value.radius.tablet.bottom + "px " + value.radius.tablet.left + "px;}";
            css += '}';
            css += '@media screen and (max-width:480px){';
            css += ".client_logo .item{ border-radius: " + value.radius.mobile.top + "px " + value.radius.mobile.right + "px " + value.radius.mobile.bottom + "px " + value.radius.mobile.left + "px;}";
            css += '}';

            css += ".client_logo .item{margin-top:" + value.margin.desktop.top + "px; margin-right:" + value.margin.desktop.right + "px; margin-bottom:" + value.margin.desktop.bottom + "px; margin-left:" + value.margin.desktop.left + "px; }";
            css += '@media screen and (max-width:768px){';
            css += ".client_logo .item{margin-top:" + value.margin.tablet.top + "px; margin-right:" + value.margin.tablet.right + "px; margin-bottom:" + value.margin.tablet.bottom + "px; margin-left:" + value.margin.tablet.left + "px; }";
            css += '}';
            css += '@media screen and (max-width:480px){';
            css += ".client_logo .item{margin-top:" + value.margin.mobile.top + "px; margin-right:" + value.margin.mobile.right + "px; margin-bottom:" + value.margin.mobile.bottom + "px; margin-left:" + value.margin.mobile.left + "px; }";
            css += '}';

            css += ".client_logo .item{padding-top:" + value.padding.desktop.top + "px; padding-right:" + value.padding.desktop.right + "px; padding-bottom:" + value.padding.desktop.bottom + "px; padding-left:" + value.padding.desktop.left + "px; }";
            css += '@media screen and (max-width:768px){';
            css += ".client_logo .item{padding-top:" + value.padding.tablet.top + "px; padding-right:" + value.padding.tablet.right + "px; padding-bottom:" + value.padding.tablet.bottom + "px; padding-left:" + value.padding.tablet.left + "px; }";
            css += '}';
            css += '@media screen and (max-width:480px){';
            css += ".client_logo .item{padding-top:" + value.padding.mobile.top + "px; padding-right:" + value.padding.mobile.right + "px; padding-bottom:" + value.padding.mobile.bottom + "px; padding-left:" + value.padding.mobile.left + "px; }";
            css += '}';

            spark_multipurpose_set_dynamic_css('spark_multipurpose_client_block_group', css);
        });
    });
    /**** Client Logo Items */
    wp.customize('spark_multipurpose_client_block_item_group', function (value) {
        value.bind(function (to) {
            var value = JSON.parse(to);
            var css = ".client_logo .item .logo{ \
                background-color: " + value.bg_color + "; \
                border:" + value.borderwidth + "px solid " + value.bordercolor + "; \
            }";

            css += ".client_logo .item .logo{ border-radius: " + value.radius.desktop.top + "px " + value.radius.desktop.right + "px " + value.radius.desktop.bottom + "px " + value.radius.desktop.left + "px;}";
            css += '@media screen and (max-width:768px){';
            ".client_logo .item .logo{ border-radius: " + value.radius.tablet.top + "px " + value.radius.tablet.right + "px " + value.radius.tablet.bottom + "px " + value.radius.tablet.left + "px;}";
            css += '}';
            css += '@media screen and (max-width:480px){';
            css += ".client_logo .item .logo{ border-radius: " + value.radius.mobile.top + "px " + value.radius.mobile.right + "px " + value.radius.mobile.bottom + "px " + value.radius.mobile.left + "px;}";
            css += '}';

            css += ".client_logo .item .logo{padding-top:" + value.padding.desktop.top + "px; padding-right:" + value.padding.desktop.right + "px; padding-bottom:" + value.padding.desktop.bottom + "px; padding-left:" + value.padding.desktop.left + "px; }";
            css += '@media screen and (max-width:768px){';
            css += ".client_logo .item .logo{padding-top:" + value.padding.tablet.top + "px; padding-right:" + value.padding.tablet.right + "px; padding-bottom:" + value.padding.tablet.bottom + "px; padding-left:" + value.padding.tablet.left + "px; }";
            css += '}';
            css += '@media screen and (max-width:480px){';
            css += ".client_logo .item .logo{padding-top:" + value.padding.mobile.top + "px; padding-right:" + value.padding.mobile.right + "px; padding-bottom:" + value.padding.mobile.bottom + "px; padding-left:" + value.padding.mobile.left + "px; }";
            css += '}';

            spark_multipurpose_set_dynamic_css('spark_multipurpose_client_block_item_group', css);
        });
    });

    /*****
     * Contact Us
    */
    wp.customize('spark_multipurpose_contact_descripton', function (value) {
        value.bind(function (to) {
            $('.contact-section .contact-form .contact-desc').html(to);
        })
    });
    wp.customize('spark_multipurpose_contact_details_right_heading', function (value) {
        value.bind(function (to) {
            $('.contact-section .contact-detail h3').html(to);
        })
    });

    /*****
     * About Section
    */
    wp.customize('spark_multipurpose_aboutus_super_title_color', function (value) {
        value.bind(function (to) {
            $('.about-wrapper .aboutsuper-title').css('color', to);
        });
    });
    wp.customize('spark_multipurpose_aboutus_layout_design', function (value) {
        value.bind(function (to) {
            $('.about_us_front').removeClass('layoutone layouttwo layoutthree').addClass(to);
        })
    });
    wp.customize('aboutus-alignment', function (value) {
        value.bind(function (to) {
            $('.about-wrapper .about-left').removeClass('text-left text-right text-center').addClass(to);
            $('.about-wrapper .about-right').removeClass('text-left text-right text-center').addClass(to);
        })
    });
    wp.customize('spark_multipurpose_about_image', function (value) {
        value.bind(function (to) {
            $('.about-wrapper .about-img img').attr('src', to);
        })
    });
    wp.customize('spark_multipurpose_aboutus_button_text', function (value) {
        value.bind(function (to) {
            $('#aboutus-section .section-tagline-text a.btn-primary').html(to + '<i class="fas fa-long-arrow-alt-right"></i>');
        })
    });

    /*********
     * Call To Action
    */
    wp.customize('spark_multipurpose_call_to_action_title', function (value) {
        value.bind(function (to) {
            $('.calltoaction-section .section-title').html(to);
        })
    });
    wp.customize('spark_multipurpose_call_to_action_subtitle', function (value) {
        value.bind(function (to) {
            $('.calltoaction-section .calltoaction_subtitle').html(to);
        })
    });
    wp.customize('spark_multipurpose_cta_alignment', function (value) {
        value.bind(function (to) {
            $('.calltoaction_promo_wrapper').removeClass('text-left text-right text-center').addClass(to);
        })
    });
    wp.customize('spark_multipurpose_cta_layout', function (value) {
        value.bind(function (to) {
            $('.inner-section-wrap.cta-innerwrapper').removeClass('cta-left cta-right cta-center').addClass(to);
        })
    });

    wp.customize('spark_multipurpose_cta_title_font_size', function (value) {
        value.bind(function (to) {
            $('.calltoaction-section .section-title').css('font-size', to + 'px');
        });
    });
    wp.customize('spark_multipurpose_cta_desc_font_size', function (value) {
        value.bind(function (to) {
            $('.calltoaction-section .calltoaction_subtitle').css('font-size', to + 'px');
        });
    });

    wp.customize('spark_multipurpose_cta_layout', function (value) {
        value.bind(function (to) {
            $('.inner-section-wrap.cta-innerwrapper').removeClass('cta-left cta-right cta-center').addClass(to);
        })
    });

    /***** Call To Action Image Settings */
    wp.customize('spark_multipurpose_calltoaction_image_style', function (value) {
        value.bind(function (to) {
            var value = JSON.parse(to);
            var css = ".calltoaction-section .cat-image-wrap img{ \
                background-color:" + value.bg_color + "px; \
                height:" + value.height + "px; \
                position:relative; \
                z-index:9; \
            }";

            css += ".calltoaction-section .cat-image-wrap img{ border-radius: " + value.radius.desktop.top + "px " + value.radius.desktop.right + "px " + value.radius.desktop.bottom + "px " + value.radius.desktop.left + "px;}";
            css += '@media screen and (max-width:768px){';
            ".calltoaction-section .cat-image-wrap img{ border-radius: " + value.radius.tablet.top + "px " + value.radius.tablet.right + "px " + value.radius.tablet.bottom + "px " + value.radius.tablet.left + "px;}";
            css += '}';
            css += '@media screen and (max-width:480px){';
            css += ".calltoaction-section .cat-image-wrap img{ border-radius: " + value.radius.mobile.top + "px " + value.radius.mobile.right + "px " + value.radius.mobile.bottom + "px " + value.radius.mobile.left + "px;}";
            css += '}';

            css += ".calltoaction-section .cat-image-wrap img{margin-top:" + value.margin.desktop.top + "px; margin-right:" + value.margin.desktop.right + "px; margin-bottom:" + value.margin.desktop.bottom + "px; margin-left:" + value.margin.desktop.left + "px; }";
            css += '@media screen and (max-width:768px){';
            css += ".calltoaction-section .cat-image-wrap img{margin-top:" + value.margin.tablet.top + "px; margin-right:" + value.margin.tablet.right + "px; margin-bottom:" + value.margin.tablet.bottom + "px; margin-left:" + value.margin.tablet.left + "px; }";
            css += '}';
            css += '@media screen and (max-width:480px){';
            css += ".calltoaction-section .cat-image-wrap img{margin-top:" + value.margin.mobile.top + "px; margin-right:" + value.margin.mobile.right + "px; margin-bottom:" + value.margin.mobile.bottom + "px; margin-left:" + value.margin.mobile.left + "px; }";
            css += '}';

            css += ".calltoaction-section .cat-image-wrap img{padding-top:" + value.padding.desktop.top + "px; padding-right:" + value.padding.desktop.right + "px; padding-bottom:" + value.padding.desktop.bottom + "px; padding-left:" + value.padding.desktop.left + "px; }";
            css += '@media screen and (max-width:768px){';
            css += ".calltoaction-section .cat-image-wrap img{padding-top:" + value.padding.tablet.top + "px; padding-right:" + value.padding.tablet.right + "px; padding-bottom:" + value.padding.tablet.bottom + "px; padding-left:" + value.padding.tablet.left + "px; }";
            css += '}';
            css += '@media screen and (max-width:480px){';
            css += ".calltoaction-section .cat-image-wrap img{padding-top:" + value.padding.mobile.top + "px; padding-right:" + value.padding.mobile.right + "px; padding-bottom:" + value.padding.mobile.bottom + "px; padding-left:" + value.padding.mobile.left + "px; }";
            css += '}';

            spark_multipurpose_set_dynamic_css('spark_multipurpose_calltoaction_image_style', css);
        });
    });
    /****
     * Video Call To Action
     */
    wp.customize('spark_multipurpose_appointment_title', function (value) {
        value.bind(function (to) {
            $('.calltoaction_full_widget_content .section-title').html(to);
        })
    });
    wp.customize('spark_multipurpose_appointment_subtitle', function (value) {
        value.bind(function (to) {
            $('.calltoaction_full_widget_content .calltoaction_subtitle').html(to);
        })
    });
    wp.customize('spark_multipurpose_video_calltoaction_alignment', function (value) {
        value.bind(function (to) {
            $('.calltoaction_promo_wrapper').removeClass('text-left text-right text-center').addClass(to);
        })
    });


    /******
     * Gallery / Portfolio
    */
    wp.customize('spark_multipurpose_gallery_subtitle', function (value) {
        value.bind(function (to) {
            $('.recentwork-section .super-title').html(to);
        })
    });
    wp.customize('spark_multipurpose_gallery_title', function (value) {
        value.bind(function (to) {
            $('.recentwork-section .section-title').html(to);
        })
    });

    /*********
     * Testimonial
    */
    wp.customize('spark_multipurpose_testimonial_cover_image', function (value) {
        value.bind(function (to) {
            $('.avtar_faces img').attr('src', to);
        })
    });

    /********
     * Back To Top 
    */
    wp.customize('spark_multipurpose_backtotop_bg_color', function (value) {
        value.bind(function (to) {
            $('#back-to-top').css('background-color', to);
        });
    });
    wp.customize('spark_multipurpose_backtotop_text_color', function (value) {
        value.bind(function (to) {
            $('.arrow-top').css('color', to);
            $('.arrow-top-line').css('background-color', to);
            $('#back-to-top svg.progress-circle path').css('stroke', to);
        });
    });

    /********
     * Counter Icon 
    */
    wp.customize('spark_multipurpose_counter_group_style', function (value) {
        value.bind(function (to) {
            var value = JSON.parse(to);
            var css = ".counter-section .achivement-items ul li{ \
                background-color: " + value.bg_color + "; \
                color: " + value.color + "; \
                border:" + value.borderwidth + "px solid " + value.bordercolor + "; \
            }";

            css += ".counter-section .achivement-items ul li{ border-radius: " + value.radius.desktop.top + "px " + value.radius.desktop.right + "px " + value.radius.desktop.bottom + "px " + value.radius.desktop.left + "px;}";
            css += '@media screen and (max-width:768px){';
            ".counter-section .achivement-items ul li{ border-radius: " + value.radius.tablet.top + "px " + value.radius.tablet.right + "px " + value.radius.tablet.bottom + "px " + value.radius.tablet.left + "px;}";
            css += '}';
            css += '@media screen and (max-width:480px){';
            css += ".counter-section .achivement-items ul li{ border-radius: " + value.radius.mobile.top + "px " + value.radius.mobile.right + "px " + value.radius.mobile.bottom + "px " + value.radius.mobile.left + "px;}";
            css += '}';

            css += ".counter-section .achivement-items ul li{padding-top:" + value.padding.desktop.top + "px; padding-right:" + value.padding.desktop.right + "px; padding-bottom:" + value.padding.desktop.bottom + "px; padding-left:" + value.padding.desktop.left + "px; }";
            css += '@media screen and (max-width:768px){';
            css += ".counter-section .achivement-items ul li{padding-top:" + value.padding.tablet.top + "px; padding-right:" + value.padding.tablet.right + "px; padding-bottom:" + value.padding.tablet.bottom + "px; padding-left:" + value.padding.tablet.left + "px; }";
            css += '}';
            css += '@media screen and (max-width:480px){';
            css += ".counter-section .achivement-items ul li{padding-top:" + value.padding.mobile.top + "px; padding-right:" + value.padding.mobile.right + "px; padding-bottom:" + value.padding.mobile.bottom + "px; padding-left:" + value.padding.mobile.left + "px; }";
            css += '}';

            spark_multipurpose_set_dynamic_css('spark_multipurpose_counter_group_style', css);
        });
    });

    wp.customize('spark_multipurpose_counter_icon_style', function (value) {
        value.bind(function (to) {
            var value = JSON.parse(to);
            var css = ".counter-section .achivement-items ul li .timer-icon{ \
                background-color: " + value.bg_color + "; \
                color: " + value.color + "; \
                border:" + value.borderwidth + "px solid " + value.bordercolor + "; \
            }";

            css += ".counter-section .achivement-items ul li .timer-icon{ border-radius: " + value.radius.desktop.top + "px " + value.radius.desktop.right + "px " + value.radius.desktop.bottom + "px " + value.radius.desktop.left + "px;}";
            css += '@media screen and (max-width:768px){';
            ".counter-section .achivement-items ul li .timer-icon{ border-radius: " + value.radius.tablet.top + "px " + value.radius.tablet.right + "px " + value.radius.tablet.bottom + "px " + value.radius.tablet.left + "px;}";
            css += '}';
            css += '@media screen and (max-width:480px){';
            css += ".counter-section .achivement-items ul li .timer-icon{ border-radius: " + value.radius.mobile.top + "px " + value.radius.mobile.right + "px " + value.radius.mobile.bottom + "px " + value.radius.mobile.left + "px;}";
            css += '}';

            css += ".counter-section .achivement-items ul li .timer-icon{padding-top:" + value.padding.desktop.top + "px; padding-right:" + value.padding.desktop.right + "px; padding-bottom:" + value.padding.desktop.bottom + "px; padding-left:" + value.padding.desktop.left + "px; }";
            css += '@media screen and (max-width:768px){';
            css += ".counter-section .achivement-items ul li .timer-icon{padding-top:" + value.padding.tablet.top + "px; padding-right:" + value.padding.tablet.right + "px; padding-bottom:" + value.padding.tablet.bottom + "px; padding-left:" + value.padding.tablet.left + "px; }";
            css += '}';
            css += '@media screen and (max-width:480px){';
            css += ".counter-section .achivement-items ul li .timer-icon{padding-top:" + value.padding.mobile.top + "px; padding-right:" + value.padding.mobile.right + "px; padding-bottom:" + value.padding.mobile.bottom + "px; padding-left:" + value.padding.mobile.left + "px; }";
            css += '}';

            spark_multipurpose_set_dynamic_css('spark_multipurpose_counter_icon_style', css);
        });
    });

    /** Header Font  */

    wp.customize('spark_multipurpose_menu_style', function (value) {
        value.bind(function (to) {
            $('.box-header-nav .main-menu .page_item a, .box-header-nav .main-menu > .menu-item > a').css('font-style', to);
        });
    });

    wp.customize('spark_multipurpose_menu_text_decoration', function (value) {
        value.bind(function (to) {
            $('.box-header-nav .main-menu .page_item a, .box-header-nav .main-menu > .menu-item > a').css('text-decoration', to);
        });
    });

    wp.customize('spark_multipurpose_menu_text_transform', function (value) {
        value.bind(function (to) {
            $('.box-header-nav .main-menu .page_item a, .box-header-nav .main-menu > .menu-item > a').css('text-transform', to);
        });
    });

    wp.customize('spark_multipurpose_menu_size', function (value) {
        value.bind(function (to) {
            $('.box-header-nav .main-menu .page_item a, .box-header-nav .main-menu > .menu-item > a').css('font-size', to);
        });
    });

    wp.customize('spark_multipurpose_menu_line_height', function (value) {
        value.bind(function (to) {
            $('.box-header-nav .main-menu .page_item a, .box-header-nav .main-menu > .menu-item > a').css('line-height', to);
        });
    });

    wp.customize('spark_multipurpose_menu_letter_spacing', function (value) {
        value.bind(function (to) {
            $('.box-header-nav .main-menu .page_item a, .box-header-nav .main-menu > .menu-item > a').css('letter-spacing', to);
        });
    });


    /** header style */
    wp.customize('spark_multipurpose_menu_letter_spacing', function (value) {
        value.bind(function (to) {
            $('.box-header-nav .main-menu .page_item a, .box-header-nav .main-menu > .menu-item > a').css('letter-spacing', to);
        });
    });


});