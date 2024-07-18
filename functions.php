<?php

// Incluir la clase personalizada para el menú de navegación
require get_template_directory() . '/includes/class-my-theme-walker-nav-menu.php';

// Añadir soporte para nuevas características del tema
function add_features()
{
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'add_features');

// Registrar menús de navegación
function add_menus()
{
    register_nav_menus(array('Primary' => 'Menú principal'));
}
add_action('after_setup_theme', 'add_menus');

// Encolar estilos y scripts
function add_assets()
{
    // Encolar jQuery
    wp_enqueue_script('jquery');

    // Encolar el estilo principal del tema
    wp_enqueue_style('my-blog-style', get_stylesheet_uri());

    // Encolar el CSS de Bootstrap
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/node_modules/bootstrap/dist/css/bootstrap.min.css');

    // Encolar el JS de Bootstrap
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js', array('jquery'), null, true);

    // Obtener el nombre del archivo bundle.js generado por Webpack
    $dist_path = get_template_directory() . '/dist/';
    $files = scandir($dist_path);
    $bundle_js = '';
    $bundle_css = '';
    foreach ($files as $file) {
        if (strpos($file, 'main.') !== false && strpos($file, '.js') !== false) {
            $bundle_js = $file;
        }
        if (strpos($file, 'main.') !== false && strpos($file, '.css') !== false) {
            $bundle_css = $file;
        }
    }

    if ($bundle_css) {
        wp_enqueue_style('bundle-css', get_template_directory_uri() . '/dist/' . $bundle_css, array(), null);
    }

    if ($bundle_js) {
        wp_enqueue_script('bundle-js', get_template_directory_uri() . '/dist/' . $bundle_js, array('jquery'), null, true);
    }
}
add_action('wp_enqueue_scripts', 'add_assets');

// Registrar una barra lateral
function my_custom_theme_widgets_init()
{
    register_sidebar(array(
        'name'          => __('Sidebar', 'my_custom_theme'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here.', 'my_custom_theme'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'my_custom_theme_widgets_init');

// Cambiar el logo de inicio de sesión
function my_custom_login_logo()
{
?>
    <style type="text/css">
        #login h1 a {
            background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/custom-logo.png');
            height: 65px;
            width: 320px;
            background-size: contain;
            background-repeat: no-repeat;
            padding-bottom: 30px;
        }
    </style>
    <?php
}
add_action('login_enqueue_scripts', 'my_custom_login_logo');

function mi_tema_customizer_register($wp_customize)
{
    // Sección para el primer slider
    $wp_customize->add_section('mi_tema_slider_section', array(
        'title' => __('Slider 1', 'mi_tema'),
        'priority' => 30,
    ));

    // Campo para la primera imagen del primer slider
    $wp_customize->add_setting('mi_tema_slider_image1', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'mi_tema_slider_image1', array(
        'label' => __('Primera Imagen', 'mi_tema'),
        'section' => 'mi_tema_slider_section',
        'settings' => 'mi_tema_slider_image1',
    )));

    // Campo para la segunda imagen del primer slider
    $wp_customize->add_setting('mi_tema_slider_image2', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'mi_tema_slider_image2', array(
        'label' => __('Segunda Imagen', 'mi_tema'),
        'section' => 'mi_tema_slider_section',
        'settings' => 'mi_tema_slider_image2',
    )));

    // Campo para la tercera imagen del primer slider
    $wp_customize->add_setting('mi_tema_slider_image3', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'mi_tema_slider_image3', array(
        'label' => __('Tercera Imagen', 'mi_tema'),
        'section' => 'mi_tema_slider_section',
        'settings' => 'mi_tema_slider_image3',
    )));

    // Sección para el segundo slider
    $wp_customize->add_section('mi_tema_slider2_section', array(
        'title' => __('Slider 2', 'mi_tema'),
        'priority' => 31,
    ));

    // Campo para la primera imagen del segundo slider
    $wp_customize->add_setting('mi_tema_slider2_image1', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'mi_tema_slider2_image1', array(
        'label' => __('Primera Imagen del Segundo Slider', 'mi_tema'),
        'section' => 'mi_tema_slider2_section',
        'settings' => 'mi_tema_slider2_image1',
    )));

    // Campo para la segunda imagen del segundo slider
    $wp_customize->add_setting('mi_tema_slider2_image2', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'mi_tema_slider2_image2', array(
        'label' => __('Segunda Imagen del Segundo Slider', 'mi_tema'),
        'section' => 'mi_tema_slider2_section',
        'settings' => 'mi_tema_slider2_image2',
    )));

    // Campo para la tercera imagen del segundo slider
    $wp_customize->add_setting('mi_tema_slider2_image3', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'mi_tema_slider2_image3', array(
        'label' => __('Tercera Imagen del Segundo Slider', 'mi_tema'),
        'section' => 'mi_tema_slider2_section',
        'settings' => 'mi_tema_slider2_image3',
    )));
}
add_action('customize_register', 'mi_tema_customizer_register');

function mytheme_add_woocommerce_support()
{
    add_theme_support('woocommerce', array(
        'thumbnail_image_width' => 150,
        'single_image_width'    => 300,

        'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 2,
            'max_rows'        => 8,
            'default_columns' => 4,
            'min_columns'     => 2,
            'max_columns'     => 5,
        ),
    ));
}
add_action('after_setup_theme', 'mytheme_add_woocommerce_support');

function mytheme_add_woocommerce_styles()
{
    if (class_exists('WooCommerce')) {
        // Encolar la hoja de estilos personalizada para WooCommerce
        wp_enqueue_style('mytheme-woocommerce', get_template_directory_uri() . '/woocommerce/css/woocommerce.css');
    }
}
add_action('wp_enqueue_scripts', 'mytheme_add_woocommerce_styles');

//oculta el titulo de la tienda

add_filter('woocommerce_show_page_title', '__return_false');

//---------------------------------------------------------------------------------------------------------------

function agregar_metabox_tarjetas()
{
    add_meta_box(
        'tarjetas_meta_box', // ID de la metabox
        'Tarjetas Destacadas', // Título de la metabox
        'mostrar_metabox_tarjetas', // Callback para mostrar la metabox
        'page', // Pantalla donde se mostrará
        'normal', // Contexto donde se mostrará
        'high' // Prioridad de la metabox
    );
}
add_action('add_meta_boxes', 'agregar_metabox_tarjetas');

function mostrar_metabox_tarjetas($post)
{
    for ($i = 1; $i <= 6; $i++) {
        $imagen = get_post_meta($post->ID, 'tarjeta_' . $i . '_imagen', true);
        $titulo = get_post_meta($post->ID, 'tarjeta_' . $i . '_titulo', true);
    ?>
        <p>
            <label for="tarjeta_<?php echo $i; ?>_imagen">Imagen Tarjeta <?php echo $i; ?>:</label>
            <input type="text" id="tarjeta_<?php echo $i; ?>_imagen" name="tarjeta_<?php echo $i; ?>_imagen" value="<?php echo esc_url($imagen); ?>" size="30" />
            <input type="button" id="tarjeta_<?php echo $i; ?>_imagen_button" class="button" value="Seleccionar Imagen" />
        </p>
        <p>
            <label for="tarjeta_<?php echo $i; ?>_titulo">Título Tarjeta <?php echo $i; ?>:</label>
            <input type="text" id="tarjeta_<?php echo $i; ?>_titulo" name="tarjeta_<?php echo $i; ?>_titulo" value="<?php echo esc_html($titulo); ?>" size="30" />
        </p>
        <script>
            jQuery(document).ready(function($) {
                $('#tarjeta_<?php echo $i; ?>_imagen_button').click(function(e) {
                    e.preventDefault();
                    var image_frame;
                    if (image_frame) {
                        image_frame.open();
                    }
                    image_frame = wp.media({
                        title: 'Seleccionar Imagen',
                        multiple: false,
                        library: {
                            type: 'image',
                        },
                        button: {
                            text: 'Usar esta imagen'
                        }
                    });

                    image_frame.on('select', function() {
                        var attachment = image_frame.state().get('selection').first().toJSON();
                        $('#tarjeta_<?php echo $i; ?>_imagen').val(attachment.url);
                    });

                    image_frame.open();
                });
            });
        </script>
<?php
    }
}

function guardar_metabox_tarjetas($post_id)
{
    for ($i = 1; $i <= 6; $i++) {
        if (isset($_POST['tarjeta_' . $i . '_imagen'])) {
            update_post_meta($post_id, 'tarjeta_' . $i . '_imagen', sanitize_text_field($_POST['tarjeta_' . $i . '_imagen']));
        }
        if (isset($_POST['tarjeta_' . $i . '_titulo'])) {
            update_post_meta($post_id, 'tarjeta_' . $i . '_titulo', sanitize_text_field($_POST['tarjeta_' . $i . '_titulo']));
        }
    }
}
add_action('save_post', 'guardar_metabox_tarjetas');
//--------------------------------------------------------------------//



?>