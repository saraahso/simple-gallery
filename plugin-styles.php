<?php function simpleGalleryStyles()
{
    global $post, $wpdb;
    $shortcode_found = false;
    if ( has_shortcode($post->post_content, 'simple_gallery_options')) {
       $shortcode_found = true;
       
    } 
    if ($shortcode_found) {
           wp_register_style('style', plugins_url('assets/css/style.css', __FILE__));
           wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null, true);
           wp_register_script('script', plugins_url('assets/js/scripts.js', __FILE__));

           wp_enqueue_style('style');
           wp_enqueue_script('jquery');
           wp_enqueue_script('script');
       }
       
}
add_action( 'wp_enqueue_scripts', 'simpleGalleryStyles' );

function simpleGalleryStylesAdmin()
{

    wp_register_style('style-admin', plugins_url('assets/css/style-admin.css', __FILE__));

    wp_enqueue_style('style-admin');

}
add_action( 'admin_enqueue_scripts', 'simpleGalleryStylesAdmin' );