<?php
add_action( 'wp_enqueue_scripts', 'type_child_enqueue_styles' );
function type_child_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css', array(), '1.0.5' );
}

add_post_type_support( 'page', 'excerpt' );

