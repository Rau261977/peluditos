jQuery(document).ready(function ($) {
	// Función para manejar la actualización del carrito
	function updateCart() {
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
					// Actualizar fragmentos del carrito sin recargar la página
					$(document.body).trigger('wc_fragment_refresh');
				} else {
					console.log('Error updating cart:', response);
				}
			},
			error: function (xhr, status, error) {
				console.log('AJAX error:', xhr, status, error);
			},
		});
	}

	// Escuchar clic en el botón de actualizar carrito
	$('#update-cart').on('click', function (e) {
		e.preventDefault();
		updateCart();
	});

	// Añadir evento de clic a los nuevos botones de "Actualizar carrito"
	$(document).on('click', '.update-cart-button', function (e) {
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

	// Escuchar clic en el botón de eliminar del mini carrito
	$(document).on('click', '.remove_from_cart_button', function (e) {
		e.preventDefault();

		var cartItemKey = $(this).data('cart_item_key');

		// Realizar la solicitud AJAX para eliminar el artículo
		$.ajax({
			type: 'POST',
			url: wc_cart_params.ajax_url,
			data: {
				action: 'remove_cart_item',
				cart_item_key: cartItemKey,
				security: wc_cart_params.remove_from_cart_nonce,
			},
			success: function (response) {
				if (response.success) {
					// Actualizar fragmentos del carrito
					$(document.body).trigger('wc_fragment_refresh');

					// Actualizar el contador del mini carrito
					updateMiniCartCount();
				} else {
					console.log('Error removing cart item:', response);
				}
			},
			error: function (xhr, status, error) {
				console.log('AJAX error:', xhr, status, error);
			},
		});
	});

	// Función para actualizar el contador del mini carrito
	function updateMiniCartCount() {
		$.ajax({
			type: 'POST',
			url: ajax_update_cart.ajaxurl,
			data: {
				action: 'update_cart_count',
			},
			success: function (response) {
				if (response.cart_count !== undefined) {
					$('.mini-cart-count').text(response.cart_count);
				}
			},
			error: function (xhr, status, error) {
				console.log('AJAX error:', xhr, status, error);
			},
		});
	}

	// Escuchar actualización de fragmentos del carrito
	$(document.body).on('wc_fragments_refreshed', function () {
		// Aquí puedes agregar cualquier lógica adicional que necesites
		console.log('Fragments refreshed');
	});
});
