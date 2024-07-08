<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <title><?php wp_title(); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Agencia de marketing y desarrollo para carnicerías" />
    <meta name="author" content="carnicerías digitales" />
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>/style.css">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <?php if (is_singular() && get_option('thread_comments')) wp_enqueue_script('comment-reply'); ?>
    <?php wp_head(); ?>
</head>

<body class="d-flex flex-column h-100" style="background-image: url('<?php echo get_template_directory_uri(); ?>/imagenes/fondodepantalla.webp'); background-attachment: fixed; background-repeat: no-repeat; background-size: cover;">
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg py-4 fixed-top">
            <div class="container px-5 fw-bold" style="margin-top:15px; background-color: rgba(255, 255, 255, 0.6); border-radius:50px; opacity:90%;">
                <a class="navbar-brand " href="/index.php">
                    <img class="navbar-logo" src="<?php echo get_template_directory_uri(); ?>/imagenes/logocarned.png" alt="logo de peluditos-petshop" style="margin-left: 20px; width: 130px;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse justify-content-end align-item-center" id="navbarSupportedContent">
                    <?php
                    wp_nav_menu([
                        'menu' => 'Primary',
                        'menu_class' => 'navbar-nav ms-auto mb-3 mb-lg-0 m-2',
                        'container' => false,
                        'walker' => new My_Theme_Walker_Nav_Menu(),
                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Servicios
                                </a>
                                <ul class="dropdown-menu py-3 my-3">
                                    <li><a class="dropdown-item" href="desarrollo-web">Desarrollo WEB</a></li>
                                    <li><a class="dropdown-item" href="desarrollo-app">Desarrollo APP</a></li>
                                    <li><a class="dropdown-item" href="community">Community Management</a></li>
                                </ul>
                            </li></ul>'
                    ]);
                    ?>
                    <ul class="navbar-nav hide-on-sm show-on-md d-flex flex-row">
                        <li class="nav-item mx-2">
                            <a href="https://www.facebook.com/profile.php?id=61555874147817" target="_blank" class="nav-link">
                                <img src="<?php echo get_template_directory_uri(); ?>/imagenes/facebook.png" alt="Facebook" style="width: 32px;">
                            </a>
                        </li>
                        <li class="nav-item mx-2">
                            <a href="https://www.instagram.com/carnicerias_digitales/" target="_blank" class="nav-link">
                                <img src="<?php echo get_template_directory_uri(); ?>/imagenes/instagram.png" alt="Instagram" style="width: 32px;">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </main>


</body>

</html>