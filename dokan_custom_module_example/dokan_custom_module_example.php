<?php
/**
 * Plugin Name: Dokan Custom module example
 * Author: Upsite
 * Author URI: https://upsite.top
 * Version: 1.0.0
 * License: GPL-3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain: dokan-custom-module
 */
 
/**
 * Add Dokan Custom module
 */
add_filter( 'dokan_pro_modules', 'add_custom_module' );
function add_custom_module( $modules ) {
	
	$modules['custom_module'] = array(
		'id'           => 'custom_module',
		'name'         => __( 'Added My custom module' ),
		'description'  => __( 'My custom module description' ),
		'thumbnail'    => plugin_dir_url( __FILE__ ) . 'dokan-custom-module.png', // Custom module Image 
		'module_file'  => plugin_dir_path( __FILE__ ) . 'module.php', // Main module class File
		'module_class' => 'Custom_Module', // Main module Class
		'plan'         => [ 'starter', 'professional', 'business', 'enterprise', ], // Your plan list
		'doc_id'       => 991375017, // Any unique digital ID
		'doc_link'     => 'https://upsite.top/wordpress-development/', // Your Custom module Description page
	);
	
	return $modules;
}

