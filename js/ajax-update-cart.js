jQuery(document).ready(function ($) {
	// Función para actualizar el contador del carrito
	var isUpdating = false;

	function updateCartCount() {
		if (isUpdating) return; // Prevenir solicitudes duplicadas
		isUpdating = true;

		jQuery.ajax({
			url: ajax_update_cart.ajaxurl,
			type: 'POST',
			data: {
				action: 'get_cart_count',
			},
			success: function (response) {
				jQuery('#cart-count').text(response);
				console.log('Cart count updated:', response);
			},
			error: function (xhr, status, error) {
				console.log('AJAX error:', status, error);
			},
			complete: function () {
				isUpdating = false; // Permitir futuras actualizaciones
			},
		});
	}

	// Reproducir sonido al agregar un producto al carrito
	function playAddToCartSound() {
		var audio = new Audio(ajax_update_cart.sound_url); // Usa la URL pasada desde PHP
		audio.play().catch(function (error) {
			console.log('Error playing audio:', error);
		});
	}

	// Evento delegado para el clic en el botón de eliminación
	jQuery('body').on('click', '.mini_cart_item .remove', function (e) {
		e.preventDefault();
		var $this = jQuery(this);

		// Realizar la eliminación del producto vía AJAX
		jQuery.ajax({
			url: $this.attr('href'),
			type: 'GET',
			success: function () {
				console.log('Product removed');
				$this.closest('.mini_cart_item').remove(); // Eliminar el producto del mini carrito
				updateCartCount(); // Actualizar el contador del carrito
			},
			error: function (xhr, status, error) {
				console.log('AJAX error:', status, error);
			},
		});
	});

	// Evento delegado para la adición de productos al carrito
	jQuery('body')
		.off('added_to_cart')
		.on('added_to_cart', function () {
			console.log('Product added to cart');
			updateCartCount(); // Actualizar el contador del carrito
			playAddToCartSound(); // Reproducir sonido al agregar un producto
		});

	// Actualiza el contador al cargar la página
	updateCartCount();
});

// Función para actualizar el contador del mini carrito
function updateMiniCartCount() {
	jQuery.ajax({
		type: 'POST',
		url: ajax_update_cart.ajaxurl,
		data: {
			action: 'update_cart_count',
		},
		success: function (response) {
			if (response.cart_count !== undefined) {
				jQuery('.mini-cart-count').text(response.cart_count);
			}
		},
		error: function (xhr, status, error) {
			console.log('AJAX error:', xhr, status, error);
		},
	});
}
jQuery(document).on('click', '.remove', function (e) {
	e.preventDefault();

	var $button = jQuery(this);
	var cartItemKey = $button.data('cart_item_key'); // Asegúrate de que esto devuelve el valor esperado

	if (!cartItemKey) {
		console.log('Cart item key is missing');
		return;
	}

	jQuery.ajax({
		type: 'POST',
		url: wc_cart_params.ajax_url,
		data: {
			action: 'remove_product_from_cart',
			cart_item_key: cartItemKey,
			security: wc_cart_params.remove_from_cart_nonce,
		},
		success: function (response) {
			if (response.success) {
				// Actualiza el mini carrito y el contador
				updateMiniCartCount();
				jQuery(document.body).trigger('wc_fragment_refresh');
			} else {
				console.log('Error removing cart item:', response.data);
			}
		},
		error: function (xhr, status, error) {
			console.log('AJAX error:', xhr, status, error);
		},
	});
});
