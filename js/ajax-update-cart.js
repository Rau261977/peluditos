jQuery(function ($) {
	$('body').on('added_to_cart', function () {
		var ajaxurl = ajax_update_cart.ajaxurl;

		$.ajax({
			type: 'POST',
			url: ajaxurl,
			dataType: 'json',
			data: {
				action: 'update_cart_count',
			},
			success: function (response) {
				if (response.cart_count) {
					$('.cart-count').text(response.cart_count);
				}
			},
		});
	});
});
