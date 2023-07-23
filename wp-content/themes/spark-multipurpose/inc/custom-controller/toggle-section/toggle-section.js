jQuery(document).ready(function ($) {
    var toggleSection = $('.spark-multipurpose-toggle-section');

    toggleSection.each(
        function () {
            var controlName = $(this).data('control');
            var controlValue = wp.customize.control(controlName).setting.get();
            var parentHeader = $(this).parent();
            if (typeof (controlName) !== 'undefined' && controlName !== '') {
                var iconClass = 'dashicons-visibility';
                if (controlValue === 'disable') {
                    iconClass = 'dashicons-hidden';
                    parentHeader.addClass('spark-multipurpose-section-hidden').removeClass('spark-multipurpose-section-visible');
                } else {
                    parentHeader.addClass('spark-multipurpose-section-visible').removeClass('spark-multipurpose-section-hidden');
                }
                $(this).children().attr('class', 'dashicons ' + iconClass);
            }
        }
    );

    toggleSection.on(
        'click',
        function (e) {
            e.stopPropagation();
            var controlName = $(this).data('control');
            var parentHeader = $(this).parent();
            var controlValue = wp.customize.control(controlName).setting.get();

            if (typeof (controlName) !== 'undefined' && controlName !== '') {
                var iconClass = 'dashicons-visibility';

                if (controlValue === 'disable') {
                    parentHeader.addClass('spark-multipurpose-section-visible').removeClass('spark-multipurpose-section-hidden');
                    wp.customize.control(controlName).setting.set('enable');
                    $('[data-customize-setting-link=' + controlName + ']').siblings('.onoffswitch').addClass('switch-on');

                } else {
                    iconClass = 'dashicons-hidden';
                    parentHeader.addClass('spark-multipurpose-section-hidden').removeClass('spark-multipurpose-section-visible');
                    wp.customize.control(controlName).setting.set('disable');
                    $('[data-customize-setting-link=' + controlName + ']').siblings('.onoffswitch').removeClass('switch-on');
                }

                $(this).children().attr('class', 'dashicons ' + iconClass);
            }
        }
    );


    $('body').on('click', '.control-section-toggle-section .onoffswitch', function () {
        var controlName = $(this).siblings('input').data('customize-setting-link');
        var controlValue = $(this).siblings('input').val();
        var iconClass = 'dashicons-visibility';
        if (controlValue === 'disable' || controlValue === 'disabled') {
            iconClass = 'dashicons-hidden';
            $('[data-control=' + controlName + ']').parent().addClass('spark-multipurpose-section-hidden').removeClass('spark-multipurpose-section-visible');
        } else {
            $('[data-control=' + controlName + ']').parent().addClass('spark-multipurpose-section-visible').removeClass('spark-multipurpose-section-hidden');
        }
        $('[data-control=' + controlName + ']').children().attr('class', 'dashicons ' + iconClass);
    });
});