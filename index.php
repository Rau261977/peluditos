<?php get_header(); ?>

<!-- presentacion -->
<header>
    <div class="container-fluid py-3">
        <div class="row">
            <div class="col-lg-12 d-flex flex-column">
                <div id="miSlider" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
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
            <div class="col-lg-4 d-flex flex-column d-none">
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
<!-- index.php -->
<?php
// Incluir el slider destacados
get_template_part('template-parts/destacados-slider');
?>

<main>
    <div class="section mt-4">
        <div class="row">
            <div class="col-md-9">

                <div class="grid-section row row-cols-1 row-cols-md-4 g-4">
                    <?php
                    $args = array(
                        'status' => 'publish',
                        'limit' => 12, // Obtener hasta 12 productos
                        'orderby' => 'date',
                        'order' => 'DESC',
                    );
                    $products = wc_get_products($args);
                    $index = 0;
                    foreach ($products as $product) {
                        // Mostrar solo los primeros 12 productos
                        if ($index >= 12) break;

                        // Obtener la imagen del producto
                        $image = $product->get_image();
                        $image_url = wp_get_attachment_image_url($product->get_image_id(), 'full');

                        // Abrir un div de grid-item para cada producto
                        echo '<div class="col">';
                        echo '<div class="card h-100">';
                        echo '<img src="' . esc_url($image_url) . '" class="card-img-top" alt="' . esc_attr($product->get_name()) . '">';
                        echo '<div class="card-body">';
                        echo '<h5 class="card-title text-center">' . esc_html($product->get_name()) . '</h5>';
                        echo '<p class="card-text">' . wp_kses_post(wp_trim_words($product->get_description(), 20)) . '</p>';
                        echo '<a href="' . esc_url($product->get_permalink()) . '"class="btn btn-primary" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Ver Producto</a>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';

                        $index++;
                    }
                    ?>
                </div>
            </div>

            <div class="col-md-3">
                <div class="sidebar2" id="sticky-sidebar">
                    <!--<h2>Notas de interés</h2> -->
                    <?php
                    $recent_posts = wp_get_recent_posts(array('numberposts' => 5));

                    foreach ($recent_posts as $post) {
                        setup_postdata($post);

                        // Obtener la imagen destacada
                        $thumbnail = get_the_post_thumbnail($post['ID'], 'thumbnail', array('class' => 'post-thumbnail'));

                        // Obtener el extracto del contenido (20 palabras)
                        $content = wp_trim_words(get_the_content(), 20);

                        // Mostrar la imagen, título y extracto
                        echo '<div class="post-item">';
                        echo '<div class="post-thumbnail">' . $thumbnail . '</div>';
                        echo '<h3><a href="' . get_permalink($post["ID"]) . '">' . $post["post_title"] . '</a></h3>';
                        echo '<p>' . $content . '</p>';
                        echo '</div>';
                    }

                    // Restaurar datos originales de la publicación
                    wp_reset_postdata();
                    ?>
                </div>
            </div>

        </div>
        </section>


        <!--   fin de la seccion -->
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