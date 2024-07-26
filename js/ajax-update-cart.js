jQuery(document).ready(function ($) {
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

	function playAddToCartSound() {
		var audio = new Audio(ajax_update_cart.sound_url);
		audio.play().catch(function (error) {
			console.log('Error playing audio:', error);
		});
	}

	function updateMiniCart() {
		jQuery.ajax({
			url: wc_cart_params.ajax_url,
			type: 'POST',
			data: {
				action: 'woocommerce_get_mini_cart_fragments',
				security: wc_cart_params.cart_nonce,
			},
			success: function (response) {
				if (response.fragments) {
					jQuery.each(response.fragments, function (key, value) {
						jQuery(key).replaceWith(value);
					});
					console.log('Mini cart updated');
				}
			},
			error: function (xhr, status, error) {
				console.log('AJAX error:', status, error);
			},
		});
	}

	jQuery('body').on('click', '.mini_cart_item .remove', function (e) {
		e.preventDefault();
		var $this = jQuery(this);

		jQuery.ajax({
			url: $this.attr('href'),
			type: 'GET',
			success: function () {
				console.log('Product removed');
				$this.closest('.mini_cart_item').remove();
				updateCartCount();
				updateMiniCart();
			},
			error: function (xhr, status, error) {
				console.log('AJAX error:', status, error);
			},
		});
	});

	jQuery('body').on('added_to_cart', function () {
		console.log('Product added to cart');
		updateCartCount();
		playAddToCartSound();
	});

	updateCartCount();
});

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
	var cartItemKey = $button.data('cart_item_key');

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
