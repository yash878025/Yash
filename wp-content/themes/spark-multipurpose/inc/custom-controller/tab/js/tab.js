(function (api) {
    // Tab Control
    api.sparkMultipurposeTabs = [];

    api.sparkMultipurposeTab = api.Control.extend({

        ready: function () {
            var control = this;
            control.container.find('a.customizer-tab').click(function (evt) {
                var tab = jQuery(this).data('tab');
                evt.preventDefault();
                control.container.find('a.customizer-tab').removeClass('active');
                jQuery(this).addClass('active');
                control.toggleActiveControls(tab);
            });

            api.sparkMultipurposeTabs.push(control.id);
        },

        toggleActiveControls: function (tab) {
            var control = this,
                currentFields = control.params.buttons[ tab ].fields;
            _.each(control.params.fields, function (id) {
                var tabControl = api.control(id);
                if (undefined !== tabControl) {
                    if (tabControl.active() && jQuery.inArray(id, currentFields) >= 0) {
                        tabControl.toggle(true);
                    } else {
                        tabControl.toggle(false);
                    }
                }
            });
        }

    });

    jQuery.extend(api.controlConstructor, {
        'tab': api.sparkMultipurposeTab,
    });

    api.bind('ready', function () {
        _.each(api.sparkMultipurposeTabs, function (id) {
            var control = api.control(id);
            control.toggleActiveControls(0);
        });
    });
})(wp.customize);