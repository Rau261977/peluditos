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

?>