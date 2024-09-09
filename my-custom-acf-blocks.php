<?php 

/*
Plugin Name: My Custom ACF Blocks
Description: Custom Gutenberg blocks built with Advanced Custom Fields PRO.
Version: 1.0.0
Author: Eric Karkovack
Author URI: https://www.karks.com
*/


/* First, check if ACF PRO is active */
function my_acf_init() {
if (is_plugin_active('advanced-custom-fields-pro/acf.php')) { 
    // ACF PRO is active - we're all good!
	
} else {
	// ACF PRO isn't active - show a message.
	echo "<div class='error notice is-dismissible'><p>My Custom ACF Blocks requires <a href='https://www.advancedcustomfields.com/' target='_blank'>Advanced Custom Fields PRO</a> to work. Please make sure to install and activate it.</p><button type='button' class='notice-dismiss'><span class='screen-reader-text'>Dismiss this notice.</span></button></div>";
} 
}
add_action( 'admin_init', 'my_acf_init' );
	 

/* Create a Custom Save Path for ACF JSON Files */
add_filter('acf/settings/load_json', 'my_acf_json_load_point');
function my_acf_json_load_point( $paths ) {   

	// remove original path (optional)
	unset($paths[0]);

	// append path
	$paths[] = plugin_dir_path( __FILE__ ) . 'json';

	// return
	return $paths;

}

/* Register Custom Blocks */
function my_acf_custom_blocks_register() {
	/**
	 * We register our block's with WordPress's handy
	 * register_block_type();
	 *
	 * @link https://developer.wordpress.org/reference/functions/register_block_type/
	 */
	register_block_type( __DIR__ . '/blocks/file-list' ); // File List Block
}
// Here we call our tt3child_register_acf_block() function on init.
add_action( 'init', 'my_acf_custom_blocks_register' );

