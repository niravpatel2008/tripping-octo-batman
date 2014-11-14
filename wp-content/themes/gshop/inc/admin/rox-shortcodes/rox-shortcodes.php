<?php
/*
rox Shortcodes

Include functions */
load_template( trailingslashit( get_template_directory() ) . '/inc/admin/rox-shortcodes/includes/scripts.php' );// Adds plugin JS and CSS
load_template( trailingslashit( get_template_directory() ) . '/inc/admin/rox-shortcodes/includes/shortcode-functions.php' );// Main shortcode functions
load_template( trailingslashit( get_template_directory() ) . '/inc/admin/rox-shortcodes/includes/mce/rox_shortcodes_tinymce.php' );// Add mce buttons to post editor
