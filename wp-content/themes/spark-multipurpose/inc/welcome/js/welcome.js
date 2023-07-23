jQuery(function ($) {
    $(document).on('click', '.spark-multipurpose-install-plugin', function () {
        event.preventDefault();
        var $button = $(this);

        if ($button.hasClass('updating-message')) {
            return;
        }

        wp.updates.installPlugin({
            slug: 'patterns-kit'
        });

        wp.updates.installPlugin({
            slug: $button.data('slug')
        });
    });

    $(document).on('click', '.spark-multipurpose-activate-plugin', function () {
        event.preventDefault();
        var $button = $(this);
        $button.addClass('updating-message').html(importer_params.activating_text);

        spark_multipurpose_activate_plugin($button);

    });

    $(document).on('wp-plugin-installing', function (event, args) {
        event.preventDefault();

        $('.spark-multipurpose-install-plugin').addClass('updating-message').html(importer_params.installing_text);

    });

    $(document).on('wp-plugin-install-success', function (event, response) {

        event.preventDefault();
        var $button = $('.spark-multipurpose-install-plugin');

        $button.html(importer_params.activating_text);

        setTimeout(function () {
            spark_multipurpose_activate_plugin($button);
        }, 1000);

    });

    function spark_multipurpose_activate_plugin ($button) {
        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: {
                action: 'spark_multipurpose_activate_plugin',
                slug: $button.data('slug'),
                file: $button.data('filename')
            },
        }).done(function (result) {
            var result = JSON.parse(result)
            if (result.success) {
                window.location.href = importer_params.importer_url;
            } else {
                $button.removeClass('updating-message').html(importer_params.error);
            }

        });
    }
});