<?php 

// if uninstall.php is not called by WordPress, die
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    die;
}

// Récupérer toutes les publications de ce type dans la bdd 
$books = get_posts(['post_type' => 'book']);

// Les supprimer
foreach($books as $book)
{
    wp_delete_post($book->ID, true);
}
