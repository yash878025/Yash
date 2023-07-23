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



// Extends our custom section.
(function (api) {

	api.sectionConstructor[ 'spark-multipurpose-upgrade-section' ] = api.Section.extend({

		// No events for this type of section.
		attachEvents: function () { },

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	});

})(wp.customize);
