<?php
/**
 * gshop admin functions and definitions.
 *
 */
load_template( trailingslashit( get_template_directory() ) . 'inc/admin/post-type/services.php' );
load_template( trailingslashit( get_template_directory() ) . 'inc/admin/post-type/faq.php' );
load_template( trailingslashit( get_template_directory() ) . 'inc/admin/post-type/meta-box-posts.php' );

function load_gshop_admin_script() {

		global $wp_version;

	    //If the WordPress version is greater than or equal to 3.5, then load the new WordPress color picker.

	    if ( 3.5 <= $wp_version ){
	        wp_enqueue_style( 'wp-color-picker' );
	        wp_enqueue_script( 'wp-color-picker' );
	    }else { //If the WordPress version is less than 3.5 load the older farbtasic color picker.
	        wp_enqueue_style( 'farbtastic' );
	        wp_enqueue_script( 'farbtastic' );
	    }
	    wp_enqueue_style( 'farbtastic' );
  		wp_enqueue_script( 'farbtastic' );
		

        wp_register_style( 'gshop_wp_admin_css', get_template_directory_uri() . '/css/admin/style.css', false, '1.0.0' ); 
        wp_enqueue_style( 'gshop_wp_admin_css' );       
        wp_register_script( 'gshop_wp_admin_js', get_template_directory_uri() . '/js/admin/js.js', array('jquery','media-upload','thickbox', 'farbtastic', 'wp-color-picker'), '1.0.0', true );
         wp_enqueue_script( 'gshop_wp_admin_js' );
       
}
add_action( 'admin_enqueue_scripts', 'load_gshop_admin_script' );

?>