<?php get_header(); ?>

<!-- presentacion -->
<header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 d-flex flex-column">
                <div id="miSlider" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="<?php echo esc_url(get_theme_mod('mi_tema_slider_image1')); ?>" class="d-block w-100" alt="Imagen 1">
                            <div class="carousel-caption d-none d-md-block">

                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo esc_url(get_theme_mod('mi_tema_slider_image2')); ?>" class="d-block w-100" alt="Imagen 2">
                            <div class="carousel-caption d-none d-md-block">

                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo esc_url(get_theme_mod('mi_tema_slider_image3')); ?>" class="d-block w-100" alt="Imagen 3">
                            <div class="carousel-caption d-none d-md-block">

                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#miSlider" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Anterior</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#miSlider" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Siguiente</span>
                    </button>
                </div>
            </div>
            <div class="col-lg-4 d-flex flex-column d-none d-lg-block">
                <div id="miSlider2" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="<?php echo esc_url(get_theme_mod('mi_tema_slider2_image1')); ?>" class="d-block w-100" alt="Imagen 1">
                            <div class="carousel-caption d-none d-md-block">

                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo esc_url(get_theme_mod('mi_tema_slider2_image2')); ?>" class="d-block w-100" alt="Imagen 2">
                            <div class="carousel-caption d-none d-md-block">

                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo esc_url(get_theme_mod('mi_tema_slider2_image3')); ?>" class="d-block w-100" alt="Imagen 3">
                            <div class="carousel-caption d-none d-md-block">

                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#miSlider2" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#miSlider2" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>

<main>
    <section>
        <div class="image-container">
            <img src="<?php echo get_template_directory_uri(); ?>/imagenes/logomarcas/purina.png" alt="logo de purina">
            <img src="<?php echo get_template_directory_uri(); ?>/imagenes/logomarcas/eukanuba.jpg" alt="logo de eukanuba">
            <img src="<?php echo get_template_directory_uri(); ?>/imagenes/logomarcas/agility.jpg" alt="logo de agility">
            <img src="<?php echo get_template_directory_uri(); ?>/imagenes/logomarcas/vitalcan.jpeg" alt="logo de vitalcan">
            <img src="<?php echo get_template_directory_uri(); ?>/imagenes/logomarcas/purinacat.png" alt="logo de purinacat">
            <img src="<?php echo get_template_directory_uri(); ?>/imagenes/logomarcas/royalcanin.png" alt="logo de royalcanin">
            <img src="<?php echo get_template_directory_uri(); ?>/imagenes/logomarcas/pedigree.png" alt="logo de pedigree">
            <img src="<?php echo get_template_directory_uri(); ?>/imagenes/logomarcas/sieger.jpg" alt="logo de sieger">
        </div>
    </section>
</main>



<div class="container py-5 gap-2 grow grow:hover text-center">
    <a href="https://api.whatsapp.com/send?phone=5492216182490&text=Hola,%20quiero%20más%20información" target="_blank" aria-label="Enlace para consultar información en WhatsApp" class="btn btn-primary" style="border-radius:50px;" role="button">Haga su pedido</a>
</div>


<?php get_footer(); ?>