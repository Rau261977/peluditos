<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <title><?php wp_title(); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Tienda de alimentos y accesorios para mascotas" />
    <meta name="author" content="Peluditos petShop" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <?php if (is_singular() && get_option('thread_comments')) wp_enqueue_script('comment-reply'); ?>
    <?php wp_head(); ?>
</head>



<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <nav class="navbar">

            <div class="col-lg-3 col-12">
                <div class="d-flex">
                    <a class="navbar-brand" href="/index.php">
                        <img class="navbar-logo" src="<?php echo get_template_directory_uri(); ?>/imagenes/logo.png" alt="logo de peluditos-petshop">
                    </a>

                </div>
            </div>


            <div class="col-lg-6 col-12">
                <nav class="navbar navbar-expand-lg">

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                        <?php
                        wp_nav_menu([
                            'menu' => 'Primary',
                            'menu_class' => 'navbar-nav',
                            'container' => false,
                            'walker' => new My_Theme_Walker_Nav_Menu(),
                            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Servicios
                            </a>
                           <ul class="dropdown-menu py-3 my-3">
                           <li><a class="dropdown-item" href="desarrollo-web">menu 1</a></li>
                           <li><a class="dropdown-item" href="desarrollo-app">menu 2</a></li>
                           <li><a class="dropdown-item" href="community">menu 3</a></li>
                           </ul>
                           </li></ul>'
                        ]);
                        ?>
                    </div>


                </nav>
            </div>
            <div class="col-lg-3 col-12">
                <section class="container-search">
                    <?php if (class_exists('WooCommerce')) : ?>
                        <form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url(home_url('/')); ?>">
                            <label class="screen-reader-text" for="woocommerce-product-search-field"><?php esc_html_e('Search for:', 'woocommerce'); ?></label>
                            <input type="search" id="woocommerce-product-search-field" class="search-field" placeholder="<?php echo esc_attr__('Search products&hellip;', 'woocommerce'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
                            <input type="hidden" name="post_type" value="product" />
                        </form>
                    <?php endif; ?>
                </section>
            </div>
        </nav>
        <section class="navbar-special" id="navbar-special">
            <div class="centered-text">ENVÍOS A DOMICILIO EN LA PLATA Y ALREDEDORES&nbsp&nbsp&nbsp&nbsp&nbsp***&nbsp&nbsp&nbsp&nbsp&nbspTODAS LAS PROMOCIONES BANCARIAS&nbsp&nbsp&nbsp&nbsp&nbsp***&nbsp&nbsp&nbsp
                &nbsp&nbspTODOS LOS MEDIOS DE PAGO&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp***&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            </div>
        </section>


    </main>
    <div class="header-cart">
        <a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="cart-icon">
            <img src="<?php echo get_template_directory_uri(); ?>/imagenes/icono-carrito.png" alt="Carrito" class="cart-image">
            <span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span> <!-- Contador de artículos -->
        </a>
        <div class="mini-cart">
            <?php
            // Mostrar el mini carrito aquí
            if (is_cart()) {
                wc_get_template('cart/mini-cart.php'); // Asegúrate de que el archivo mini-cart.php esté en el directorio de tu tema.
            }
            ?>
        </div>
    </div>


    <?php wp_footer(); ?>


</body>

</html>