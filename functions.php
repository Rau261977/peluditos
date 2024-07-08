<?php

require get_template_directory() . '/includes/class-my-theme-walker-nav-menu.php';

add_action('after_setup_theme', 'add_features');

function add_features()
{
    //New features
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'add_menus');

function add_menus()
{
    register_nav_menus(array('Primary' => 'Menú principal'));
}

add_action('wp_enqueue_scripts', 'add_assets');

function add_assets()
{

    wp_enqueue_style(
        'my-blog-style',
        get_stylesheet_uri()
    );

    wp_enqueue_style(
        'my-blog-home-style',
        get_template_directory_uri() . '/style.css'

    );


    wp_enqueue_script(
        'my-blog-bootstrap',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js',
        array(),
        false,
        true
    );
}
