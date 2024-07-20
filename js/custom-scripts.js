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

jQuery(document).ready(function ($) {
	// Añadir evento de clic a los nuevos botones de "Actualizar carrito"
	$('.update-cart-button').on('click', function (e) {
		e.preventDefault(); // Prevenir la acción por defecto

		// Obtener el botón actual
		var $button = $(this);
		// Obtener el valor del campo de cantidad relacionado
		var cartItemKey = $button.val();
		var $quantityField = $('input[name="cart[' + cartItemKey + '][qty]"]');

		// Cambiar el valor del campo de cantidad del formulario original
		$('input[name="cart[' + cartItemKey + '][qty]"]').val($quantityField.val());

		// Añadir el nombre del botón al formulario para que se envíe correctamente
		$('<input>')
			.attr({
				type: 'hidden',
				name: $button.attr('name'),
				value: $button.attr('value'),
			})
			.appendTo('form.woocommerce-cart-form');

		// Enviar el formulario del carrito
		$('form.woocommerce-cart-form').submit();
	});
});
