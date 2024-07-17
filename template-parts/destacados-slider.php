<div class="section destacados">
    <div class="slider-container">
        <div class="slider-track">
            <?php
            // Obtener el ID de la página desde la variable global o usar el ID actual
            $page_id = get_query_var('page_id', get_the_ID());

            for ($i = 1; $i <= 7; $i++) {
                $imagen = get_post_meta($page_id, 'tarjeta_' . $i . '_imagen', true);
                $titulo = get_post_meta($page_id, 'tarjeta_' . $i . '_titulo', true);

                if ($imagen && $titulo) {
                    echo '<div class="slide">';
                    echo '<div class="card h-100 custom-card">';
                    echo '<img src="' . esc_url($imagen) . '" class="card-img-top" alt="Imagen de la tarjeta ' . $i . '">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . esc_html($titulo) . '</h5>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                } else {
                    echo '<div class="slide">';
                    echo '<div class="card h-100 custom-card">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">No se encontraron datos para tarjeta ' . $i . '</h5>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            }

            // Duplicar el contenido para el efecto de carrusel infinito
            for ($i = 1; $i <= 7; $i++) {
                $imagen = get_post_meta($page_id, 'tarjeta_' . $i . '_imagen', true);
                $titulo = get_post_meta($page_id, 'tarjeta_' . $i . '_titulo', true);

                if ($imagen && $titulo) {
                    echo '<div class="slide">';
                    echo '<div class="card h-100 custom-card">';
                    echo '<img src="' . esc_url($imagen) . '" class="card-img-top" alt="Imagen de la tarjeta ' . $i . '">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . esc_html($titulo) . '</h5>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                } else {
                    echo '<div class="slide">';
                    echo '<div class="card h-100 custom-card">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">No se encontraron datos para tarjeta ' . $i . '</h5>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            }
            ?>
        </div>
    </div>
</div>