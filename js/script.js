jQuery(document).ready(function ($) {
	// Escucha el evento mouseleave en el contenedor del menú dropdown
	$('.dropdown').on('mouseleave', function () {
		// Oculta el menú desplegable
		$(this).removeClass('show');
		// Restablece el estado del botón de enlace dropdown
		$(this).find('.dropdown-toggle').attr('aria-expanded', 'false');
	});
});
document.addEventListener('DOMContentLoaded', function () {
	var navbarSpecial = document.getElementById('navbar-special');
	var header = document.querySelector('header');
	var headerHeight = header.offsetHeight;

	ajustarPosicionInicial();

	window.addEventListener('scroll', function () {
		ajustarPosicion();
	});

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
});
document.addEventListener('DOMContentLoaded', function () {
	var cartIcon = document.querySelector('.cart-icon');
	var miniCart = document.querySelector('.mini-cart');

	cartIcon.addEventListener('click', function (e) {
		e.preventDefault(); // Evita que el enlace se siga
		miniCart.classList.toggle('show');
	});
});
