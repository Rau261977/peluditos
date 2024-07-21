jQuery(document).ready(function ($) {
	// Función para actualizar el contador del carrito
	function updateCartCount() {
		$.ajax({
			url: ajax_update_cart.ajaxurl,
			type: 'POST',
			data: {
				action: 'get_cart_count',
			},
			success: function (response) {
				$('#cart-count').text(response);
				console.log('Cart count updated:', response);
			},
			error: function (xhr, status, error) {
				console.log('AJAX error:', status, error);
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
	$('body').on('click', '.mini_cart_item .remove', function (e) {
		e.preventDefault();
		var $this = $(this);

		// Realizar la eliminación del producto vía AJAX
		$.ajax({
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
	$('body').on('added_to_cart', function () {
		console.log('Product added to cart');
		updateCartCount(); // Actualizar el contador del carrito
		playAddToCartSound(); // Reproducir sonido al agregar un producto
	});

	// Actualiza el contador al cargar la página
	updateCartCount();
});
