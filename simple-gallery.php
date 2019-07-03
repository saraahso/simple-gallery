<?php
/**
* Plugin Name: Simple Gallery Newsletter2Go
* Description: Simple Image Gallery plugin for Wordpress using API for Newsletter2go Challenge.
* Version: 1.0
* Author: Sara S.de Oliveira
* Author URI: http://github.com/saraahso
**/

 /*
* Plugin constants
*/
if( !defined('ABSPATH')) {
    die;
}

 /**
* Class SimpleGallery
*
* This class creates the option page and add the web app script
*/
class SimpleGallery {
    
    public $plugin;
    /**
     * SimpleGallery constructor.
     *
     * The main plugin actions registered for WordPress
     */
    function __construct() {
        $this->plugin = plugin_basename(__FILE__);            
	}
	
	function register() {
		add_action( 'admin_menu', array( $this, 'gallery_add_menu' ));
	}

	function gallery_add_menu() {
		add_menu_page("Simple Gallery Settings", "Simple Gallery Settings", "manage_options", "simple-gallery-settings", array( $this, 'admin_index'), '', 110 );
	}

	function admin_index() {
		require_once plugin_dir_path(__FILE__). 'templates/admin.php';

		if(isset($_POST['submitBtn'])){

        
			if(isset($_POST['title'])) { $title = 1; }
	
			update_option("title", $title);
			echo "<meta http-equiv='refresh' content='0'>";
	
		} 
		
			
	}
}

//Form Settings
function simple_gallery_settings() {
	add_settings_section ( "simple_gallery_config", "", null, "simple-gallery-settings" );
	register_setting ( "simple_gallery_config", "title" );
}
add_action ( "admin_init", "simple_gallery_settings" );

//View
require_once 'templates/view/gallery.php';

//Styles
require_once plugin_dir_path(__FILE__). '/plugin-styles.php';

//Shortcode
add_shortcode('simple_gallery_options', 'simple_gallery_options');

/*
* Starts our plugin class, easy!
*/
if( class_exists('SimpleGallery')) {
   $simpleGallery = new SimpleGallery();
    $simpleGallery->register();
}