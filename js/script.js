$(document).ready(function() {
    // Escuchar el evento mouseleave en el contenedor del menú dropdown
    $('.dropdown').on('mouseleave', function() {
        // Ocultar el menú desplegable
        $(this).removeClass('show');
        // Restablecer el estado del botón de enlace dropdown
        $(this).find('.dropdown-toggle').attr('aria-expanded', 'false');
    });
});
