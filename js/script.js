jQuery(document).ready(function ($) {
	// Escucha el evento mouseleave en el contenedor del menú dropdown
	$('.dropdown').on('mouseleave', function () {
		// Oculta el menú desplegable
		$(this).removeClass('show');
		// Restablece el estado del botón de enlace dropdown
		$(this).find('.dropdown-toggle').attr('aria-expanded', 'false');
	});
});
jQuery(document).ready(function ($) {
	// Modificar el texto del botón "Agregar al carrito"
	$('.add_to_cart_button').text(function () {
		return (
			$(this).text().charAt(0).toUpperCase() +
			$(this).text().slice(1).toLowerCase()
		);
	});
});
