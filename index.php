<?php get_header(); ?>

<!-- presentacion -->
<header>
    <div>

        <div class="row">
            <div class="col-lg-8">
                <div id="miSlider" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="<?php echo esc_url(get_theme_mod('mi_tema_slider_image1')); ?>" class="d-block w-100" alt="Imagen 1">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Título 1</h5>
                                <p>Descripción 1</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo esc_url(get_theme_mod('mi_tema_slider_image2')); ?>" class="d-block w-100" alt="Imagen 2">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Título 2</h5>
                                <p>Descripción 2</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo esc_url(get_theme_mod('mi_tema_slider_image3')); ?>" class="d-block w-100" alt="Imagen 3">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Título 3</h5>
                                <p>Descripción 3</p>
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
            <div class="col-lg-4">
                <div id="miSlider2" class="carousel slide2" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="<?php echo esc_url(get_theme_mod('mi_tema_slider_image1')); ?>" class="d-block w-100" alt="Imagen 1">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Título 1</h5>
                                <p>Descripción 1</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo esc_url(get_theme_mod('mi_tema_slider_image2')); ?>" class="d-block w-100" alt="Imagen 2">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Título 2</h5>
                                <p>Descripción 2</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo esc_url(get_theme_mod('mi_tema_slider_image3')); ?>" class="d-block w-100" alt="Imagen 3">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Título 3</h5>
                                <p>Descripción 3</p>
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
        </div>

</header>




<div class="container py-5 gap-2 grow grow:hover text-center">
    <a href="https://api.whatsapp.com/send?phone=5492216182490&text=Hola,%20quiero%20más%20información" target="_blank" aria-label="Enlace para consultar información en WhatsApp" class="btn btn-primary" style="border-radius:50px;" role="button">Consulte antes que la competencia</a>
</div>


<?php get_footer(); ?>