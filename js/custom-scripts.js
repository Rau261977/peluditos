jQuery(document).ready(function ($) {
	$('#update-cart').on('click', function (e) {
		e.preventDefault();

		var formData = $('form.woocommerce-cart-form').serialize();

		$.ajax({
			type: 'POST',
			url: wc_cart_params.ajax_url,
			data: {
				action: 'woocommerce_update_cart_action',
				data: formData,
			},
			success: function (response) {
				if (response.success) {
					window.location.reload(); // Recarga la página para reflejar los cambios en el carrito
				} else {
					console.log('Error updating cart:', response);
				}
			},
			error: function (xhr, status, error) {
				console.log('AJAX error:', xhr, status, error);
			},
		});
	});
});
