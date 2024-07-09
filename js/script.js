jQuery(document).ready(function ($) {
	// Escucha el evento mouseleave en el contenedor del menú dropdown
	$('.dropdown').on('mouseleave', function () {
		// Oculta el menú desplegable
		$(this).removeClass('show');
		// Restablece el estado del botón de enlace dropdown
		$(this).find('.dropdown-toggle').attr('aria-expanded', 'false');
	});
});
