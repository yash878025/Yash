jQuery(document).ready(function ($) {
    $(document).on('change', '.spark-multipurpose-typography-font-family select', function () {
        var font_family = $(this).val();
        var $this = $(this);
        $.ajax({
            url: ajaxurl,
            data: {
                action: 'spark_multipurpose_get_google_font_variants',
                font_family: font_family,
            },
            beforeSend: function () {
                $this.parent('.spark-multipurpose-typography-font-family').next('.spark-multipurpose-typography-font-style').addClass('spark-multipurpose-typography-loading');
            },
            success: function (response) {
                $this.parent('.spark-multipurpose-typography-font-family').next('.spark-multipurpose-typography-font-style').removeClass('spark-multipurpose-typography-loading');
                $this.parent('.spark-multipurpose-typography-font-family').next('.spark-multipurpose-typography-font-style').children('select').html(response).trigger('chosen:updated').trigger('change');
            }
        });
    });

    $('.spark-multipurpose-typography-color .spark-multipurpose-color-picker-hex').wpColorPicker({
        change: function (event, ui) {
            var setting = $(this).attr('data-customize-setting-link');
            var hexcolor = $(this).wpColorPicker('color');
            // Set the new value.
            wp.customize(setting, function (obj) {
                obj.set(hexcolor);
            });
        }
    });

    $('.spark-multipurpose-slider-range-font-size').each(function () {
        $(this).slider({
            range: 'min',
            value: 18,
            min: parseInt($(this).attr('min')),
            max: parseInt($(this).attr('max')),
            step: parseInt($(this).attr('step')),
            slide: function (event, ui) {
                $(this).next('.spark-multipurpose-slider-value-font-size').find('span').text(ui.value);
                var setting = $(this).next('.spark-multipurpose-slider-value-font-size').find('span').attr('data-customize-setting-link');

                // Set the new value.
                wp.customize(setting, function (obj) {
                    obj.set(ui.value);
                });
            }
        });

        $(this).slider('value', $(this).next('.spark-multipurpose-slider-value-font-size').find('span').attr('value'));
    });



    $('.spark-multipurpose-slider-range-line-height').slider({
        range: 'min',
        value: 1.5,
        min: 0.8,
        max: 5,
        step: 0.1,
        slide: function (event, ui) {
            $(this).next('.spark-multipurpose-slider-value-line-height').find('span').text(ui.value);
            var setting = $(this).next('.spark-multipurpose-slider-value-line-height').find('span').attr('data-customize-setting-link');
            // Set the new value.
            wp.customize(setting, function (obj) {
                obj.set(ui.value);
            });
        }
    });

    $('.spark-multipurpose-slider-range-line-height').each(function () {
        $(this).slider('value', $(this).next('.spark-multipurpose-slider-value-line-height').find('span').attr('value'));
    });

    $('.spark-multipurpose-slider-range-letter-spacing').slider({
        range: 'min',
        value: 0,
        min: -5,
        max: 5,
        step: 0.1,
        slide: function (event, ui) {
            $(this).next('.spark-multipurpose-slider-value-letter-spacing').find('span').text(ui.value);
            var setting = $(this).next('.spark-multipurpose-slider-value-letter-spacing').find('span').attr('data-customize-setting-link');
            // Set the new value.
            wp.customize(setting, function (obj) {
                obj.set(ui.value);
            });
        }
    });

    $('.spark-multipurpose-slider-range-letter-spacing').each(function () {
        $(this).slider('value', $(this).next('.spark-multipurpose-slider-value-letter-spacing').find('span').attr('value'));
    });

    // Chosen JS
    $('.customize-control-spark-multipurpose-typography select').chosen({
        width: '100%',
    });
});


(function (api) {

    api.controlConstructor[ 'typography' ] = api.Control.extend({
        ready: function () {
            var control = this;

            control.container.on('change', '.spark-multipurpose-typography-font-family select',
                function () {
                    control.settings[ 'family' ].set(jQuery(this).val());
                }
            );

            control.container.on('change', '.spark-multipurpose-typography-font-style select',
                function () {
                    control.settings[ 'style' ].set(jQuery(this).val());
                }
            );

            control.container.on('change', '.spark-multipurpose-typography-text-transform select',
                function () {
                    control.settings[ 'text_transform' ].set(jQuery(this).val());
                }
            );

            control.container.on('change', '.spark-multipurpose-typography-text-decoration select',
                function () {
                    control.settings[ 'text_decoration' ].set(jQuery(this).val());
                }
            );

        }
    });

})(wp.customize);
