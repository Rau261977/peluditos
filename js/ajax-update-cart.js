jQuery(function ($) {
	$('body').on('added_to_cart', function () {
		var ajaxurl = ajax_update_cart.ajaxurl;

		// Reproducir el sonido
		var audio = new Audio(ajax_update_cart.sound_url);
		audio.play();

		// Animar el carrito
		$('.cart-icon').addClass('cart-animate');

		// Hacer la petición AJAX para actualizar el contador del carrito
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

		// Eliminar la clase de animación después de la animación
		setTimeout(function () {
			$('.cart-icon').removeClass('cart-animate');
		}, 1000); // Ajusta el tiempo según la duración de tu animación
	});
});
