/* global partdo_settings */
(function($) {
	partdoThemeModule.$document.on('partdoShopPageInit', function() {
		partdoThemeModule.sortByWidget();
	});

	partdoThemeModule.sortByWidget = function() {
		var $wcOrdering = $('.woocommerce-ordering');

		$wcOrdering.on('change', 'select.orderby', function() {
			var $form = $(this).closest('form');
			$form.find('[name="_pjax"]').remove();

			$.pjax({
				container: '.site-content',
				timeout  : partdo_settings.pjax_timeout,
				url      : '?' + $form.serialize(),
				scrollTo : false,
				renderCallback: function(context, html, afterRender) {
					context.html(html);
					afterRender();
				}
			});
		});

		$wcOrdering.on('submit', function(e) {
			e.preventDefault(e);
		});
	};

	$(document).ready(function() {
		partdoThemeModule.sortByWidget();
	});
})(jQuery);
