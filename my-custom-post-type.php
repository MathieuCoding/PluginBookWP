<?php

/*
* Plugin Name: My Custom Post Type
* Description: My awesome plugin to add a type of content
* Version: 1.0.0
* Author: I
*/

if (! defined('ABSPATH') )
{
    die;
}

/**
 * Register the "book" custom post type
 */
function setup_post_type() {
	register_post_type( 'book', [
        'label' => 'Books',
        'public' => true,
        'show_in_rest' => true, 
        'menu_position' => 5,
        'menu_icon' => 'dashicons-book',
        'has_archive' => true,
        'template' => array(
            array( 'core/image', array(
                'align' => 'left',
            ) ),
            array( 'core/heading', array(
                'placeholder' => 'Add Author...',
            ) ),
            array( 'core/paragraph', array(
                'placeholder' => 'Add Description...',
            ) ),
        ),
        'template_lock' => 'all'
        ] ); 
} 
add_action( 'init', 'setup_post_type' );


function my_custom_post_type_activate()
{
    // Ajouter un type de publication
    setup_post_type();    
    // Regénérer les permaliens
    flush_rewrite_rules();
}

function my_custom_post_type_deactivate()
{
    // Retirer le type de publication
    unregister_post_type('book');
    // Regénérer les permaliens
    flush_rewrite_rules();
}

register_activation_hook(
    __FILE__,
    'my_custom_post_type_activate'
);

register_deactivation_hook(
    __FILE__,
    'my_custom_post_type_deactivate'
);