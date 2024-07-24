// jQuery code for handling dropdown menus
jQuery(document).ready(function ($) {
	// Escucha el evento mouseleave en el contenedor del menú dropdown
	$('.dropdown').on('mouseleave', function () {
		// Oculta el menú desplegable
		$(this).removeClass('show');
		// Restablece el estado del botón de enlace dropdown
		$(this).find('.dropdown-toggle').attr('aria-expanded', 'false');
	});
});

// Vanilla JS code for handling the fixed navbar and cart icon toggle
document.addEventListener('DOMContentLoaded', function () {
	// Handling fixed navbar position
	var navbarSpecial = document.getElementById('navbar-special');
	var header = document.querySelector('header');

	if (navbarSpecial && header) {
		var headerHeight = header.offsetHeight;

		function ajustarPosicion() {
			var scrollPosition = window.scrollY;

			if (scrollPosition > headerHeight) {
				if (!navbarSpecial.classList.contains('fixed-navbar-special')) {
					navbarSpecial.style.top = '-100px'; // Ajuste temporal para evitar destellos
					setTimeout(function () {
						navbarSpecial.classList.add('fixed-navbar-special');
						navbarSpecial.style.top = '0';
					}, 50); // Ajuste para la transición
				}
			} else {
				navbarSpecial.classList.remove('fixed-navbar-special');
			}
		}

		function ajustarPosicionInicial() {
			var scrollPosition = window.scrollY;

			if (scrollPosition <= headerHeight) {
				navbarSpecial.classList.remove('fixed-navbar-special');
			} else {
				navbarSpecial.classList.add('fixed-navbar-special');
			}
		}

		// Inicializar la posición del navbar al cargar la página
		ajustarPosicionInicial();

		// Ajustar la posición del navbar al hacer scroll
		window.addEventListener('scroll', ajustarPosicion);
	}

	// Handling the cart icon toggle
	var cartIcon = document.querySelector('.cart-icon');
	var miniCart = document.querySelector('.mini-cart');

	if (cartIcon && miniCart) {
		cartIcon.addEventListener('click', function (e) {
			e.preventDefault(); // Evita que el enlace se siga
			miniCart.classList.toggle('show');
		});
	}
});
