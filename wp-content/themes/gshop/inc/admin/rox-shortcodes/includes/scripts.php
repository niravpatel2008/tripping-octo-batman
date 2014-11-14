<?php
/**
 * This file loads the CSS and JS necessary for your shortcodes display
 * @package rox Shortcodes Plugin
 */
if( !function_exists ('rox_shortcodes_scripts') ) :
	function rox_shortcodes_scripts() {
		wp_enqueue_script('jquery');
		wp_register_script( 'rox_tabs', get_template_directory_uri() . '/inc/admin/rox-shortcodes/includes/js/rox_tabs.js', array ( 'jquery', 'jquery-ui-tabs'), '1.0', true );
		wp_register_script( 'rox_toggle', get_template_directory_uri() . '/inc/admin/rox-shortcodes/includes/js/rox_toggle.js', 'jquery', '1.0', true );
		wp_register_script( 'rox_accordion', get_template_directory_uri() . '/inc/admin/rox-shortcodes/includes/js/rox_accordion.js', array ( 'jquery', 'jquery-ui-accordion'), '1.0', true );
		wp_enqueue_style('rox_shortcode_styles', get_template_directory_uri() . '/inc/admin/rox-shortcodes/includes/css/rox_shortcodes_styles.css');
		wp_register_script('rox_googlemap',  get_template_directory_uri() . '/inc/admin/rox-shortcodes/includes/js/rox_googlemap.js', array('jquery'), '1.0', true);
		wp_register_script('rox_googlemap_api', 'https://maps.googleapis.com/maps/api/js?sensor=false', array('jquery'), '1.0', true);
		wp_register_script( 'rox_skillbar', get_template_directory_uri() . '/inc/admin/rox-shortcodes/includes/js/rox_skillbar.js', array ( 'jquery' ), '1.0', true );
	}
	add_action('wp_enqueue_scripts', 'rox_shortcodes_scripts');
endif;