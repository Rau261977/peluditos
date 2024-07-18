jQuery(document).ready(function ($) {
	// Modificar el texto del botón "Agregar al carrito"
	$('.add_to_cart_button').text(function () {
		return (
			$(this).text().charAt(0).toUpperCase() +
			$(this).text().slice(1).toLowerCase()
		);
	});
});
