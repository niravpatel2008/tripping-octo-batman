<?php
/**
 *  This file adds compatibility with Black Studio TinyMCE widget.
 */

/**
 * Add all the required actions for the TinyMCE widget.
 */
function rox_panels_tinymce_admin_init() {
	global $pagenow;

	// Compatibility for Panels (ROX)
	if (
		in_array($pagenow, array('post-new.php', 'post.php')) ||
		($pagenow == 'themes.php' && isset($_GET['page']) && $_GET['page'] == 'so_panels_home_page' )
	)  {
		add_action( 'admin_head', 'tinymce_load_tiny_mce');
		add_filter( 'tiny_mce_before_init', 'tinymce_init_editor', 20);
		add_action( 'admin_print_scripts', 'tinymce_scripts');
		add_action( 'admin_print_styles', 'tinymce_styles');
		add_action( 'admin_print_footer_scripts', 'tinymce_footer_scripts');
	}

}
add_action('admin_init', 'rox_panels_tinymce_admin_init');

/**
 * Enqueue all the admin scripts for Black Studio TinyMCE compatibility with Page Builder.
 *
 * @param $page
 */
function rox_panels_tinymce_admin_enqueue($page) {
	$screen = get_current_screen();
	if ( ( $screen->base == 'post' && in_array( $screen->id, rox_panels_setting('post-types') ) ) || $screen->base == 'appearance_page_so_panels_home_page') {
		wp_enqueue_script('tinymce-widget-rox-panels', get_template_directory_uri() .'/pagebuilder/widgets/compat/tinymce/tinymce-widget-rox-panels.min.js', array('jquery'), ROX_PANELS_VERSION);
		wp_enqueue_style('tinymce-widget-rox-panels', get_template_directory_uri() .'/pagebuilder/widgets/compat/tinymce/tinymce-widget-rox-panels.css', array(), ROX_PANELS_VERSION);

		global $tinymce_widget_version;
		if(version_compare($tinymce_widget_version, '1.2.0', '<=')) {
			// We also need a modified javascript for older versions of Black Studio TinyMCE
			wp_enqueue_script('tinymce-widget', get_template_directory_uri() .'/pagebuilder/widgets/compat/tinymce/tinymce-widget.min.js', array('jquery'), ROX_PANELS_VERSION);
		}
	}
}
add_action('admin_enqueue_scripts', 'rox_panels_tinymce_admin_enqueue', 15);

