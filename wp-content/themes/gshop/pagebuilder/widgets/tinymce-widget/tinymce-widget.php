<?php

global $tinymce_widget_version;
global $tinymce_widget_dev_mode;
$tinymce_widget_version = "1.0.0"; // This is used internally - should be the same reported on the plugin header
$tinymce_widget_dev_mode = false;

/* Widget class */
class WP_Widget_TinyMCE extends WP_Widget {

	function __construct() {
		$widget_ops = array('classname' => 'widget_tinymce', 'description' => __('Arbitrary text or HTML with visual editor', 'tinymce-widget'));
		$control_ops = array('width' => 800, 'height' => 800);
		parent::__construct('tinymce', __('TinyMCE Editor (ROX)', 'tinymce-widget'), $widget_ops, $control_ops);
	}

	function widget( $args, $instance ) {
		if ( get_option('embed_autourls') ) {
			$wp_embed = $GLOBALS['wp_embed'];
			add_filter( 'widget_text', array( $wp_embed, 'run_shortcode' ), 8 );
			add_filter( 'widget_text', array( $wp_embed, 'autoembed' ), 8 );
		}
		extract($args);
		$title = apply_filters( 'widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
		$text = apply_filters( 'widget_text', $instance['text'], $instance );
		if( function_exists( 'icl_t' )) {
			$title = icl_t( "Widgets", 'widget title - ' . md5 ( $title ), $title );
			$text = icl_t( "Widgets", 'widget body - ' . $this->id_base . '-' . $this->number, $text );
		}
		$text = do_shortcode( $text );
		echo $before_widget;
		if ( !empty( $title ) ) { echo $before_title . $title . $after_title; } ?>
			<div class="textwidget"><?php echo $text; ?></div>
		<?php
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		if ( current_user_can('unfiltered_html') )
			$instance['text'] =  $new_instance['text'];
		else
			$instance['text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text']) ) ); // wp_filter_post_kses() expects slashed
		$instance['type'] = strip_tags($new_instance['type']);
		if( function_exists( 'icl_register_string' )) {
			//icl_register_string( "Widgets", 'widget title - ' . $this->id_base . '-' . $this->number /* md5 ( apply_filters( 'widget_title', $instance['title'] ))*/, apply_filters( 'widget_title', $instance['title'] )); // This is handled automatically by WPML
			icl_register_string( "Widgets", 'widget body - ' . $this->id_base . '-' . $this->number  /* md5 ( apply_filters( 'widget_text', $instance['text'] ))*/, apply_filters( 'widget_text', $instance['text'] ));
		}
		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '', 'type' => 'visual' ) );
		$title = strip_tags($instance['title']);
		if (function_exists('esc_textarea')) {
			$text = esc_textarea($instance['text']);
		}
		else {
			$text = stripslashes( wp_filter_post_kses( addslashes( $instance['text'] ) ) );
		}
		$type = esc_attr($instance['type']);
		if (get_bloginfo('version') < "3.5") {
			$toggle_buttons_extra_class = "editor_toggle_buttons_legacy";
			$media_buttons_extra_class = "editor_media_buttons_legacy";
		}
		else {
			$toggle_buttons_extra_class = "wp-toggle-buttons";
			$media_buttons_extra_class = "wp-media-buttons";
		}
?>
		<input id="<?php echo $this->get_field_id('type'); ?>" name="<?php echo $this->get_field_name('type'); ?>" type="hidden" value="<?php echo esc_attr($type); ?>" />
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'gshop'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
        <div class="editor_toggle_buttons hide-if-no-js <?php echo $toggle_buttons_extra_class; ?>">
            <a id="widget-<?php echo $this->id_base; ?>-<?php echo $this->number; ?>-html"<?php if ($type == 'html') {?> class="active"<?php }?>><?php _e('HTML', 'gshop' ); ?></a>
            <a id="widget-<?php echo $this->id_base; ?>-<?php echo $this->number; ?>-visual"<?php if($type == 'visual') {?> class="active"<?php }?>><?php _e('Visual', 'gshop' ); ?></a>
        </div>
		<div class="editor_media_buttons hide-if-no-js <?php echo $media_buttons_extra_class; ?>">
			<?php do_action( 'media_buttons' ); ?>
		</div>
		<div class="editor_container">
			<textarea class="widefat" rows="20" cols="40" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>
        </div>
       
        <?php
	}
}

/* Load localization */
load_plugin_textdomain('tinymce-widget', false, get_template_directory() .'/pagebuilder/widgets/tinymce-widget/languages/' ); 

/* Widget initialization */
add_action('widgets_init', 'tinymce_widgets_init');
function tinymce_widgets_init() {
	if ( !is_blog_installed() )
		return;
	register_widget('WP_Widget_TinyMCE');
}

/* Add actions and filters (only in widgets admin page) */
add_action('admin_init', 'tinymce_admin_init');
function tinymce_admin_init() {
	global $pagenow;
	$load_editor = false;
	if ($pagenow == "widgets.php") {
		$load_editor = true;
	}
	// Compatibility for WP Page Widget plugin
	if (is_plugin_active('wp-page-widget/wp-page-widgets.php') && (
			(in_array($pagenow, array('post-new.php', 'post.php'))) ||
			(in_array($pagenow, array('edit-tags.php')) && isset($_GET['action']) && $_GET['action'] == 'edit') || 
			(in_array($pagenow, array('admin.php')) && isset($_GET['page']) && in_array($_GET['page'], array('pw-front-page', 'pw-search-page')))
	)) {
		$load_editor = true;
	}
	if ($load_editor) {
		add_action( 'admin_head', 'tinymce_load_tiny_mce');
		add_filter( 'tiny_mce_before_init', 'tinymce_init_editor', 20);
		add_action( 'admin_print_scripts', 'tinymce_scripts');
		add_action( 'admin_print_styles', 'tinymce_styles');
		add_action( 'admin_print_footer_scripts', 'tinymce_footer_scripts');
	}
	
}

/* Instantiate tinyMCE editor */
function tinymce_load_tiny_mce() {
	// Remove filters added from "After the deadline" plugin, to avoid conflicts
	remove_filter( 'mce_external_plugins', 'add_AtD_tinymce_plugin' );
	remove_filter( 'mce_buttons', 'register_AtD_button' );
	remove_filter( 'tiny_mce_before_init', 'AtD_change_mce_settings' );
	// Add support for thickbox media dialog
	add_thickbox();
	// New media modal dialog (WP 3.5+)
	if (function_exists('wp_enqueue_media')) {
		wp_enqueue_media(); 
	}
}

/* TinyMCE setup customization */
function tinymce_init_editor($initArray) {
	// Remove WP fullscreen mode and set the native tinyMCE fullscreen mode
	if (get_bloginfo('version') < "3.3") {
		$plugins = explode(',', $initArray['plugins']);
		if (isset($plugins['wpfullscreen'])) {
			unset($plugins['wpfullscreen']);
		}
		if (!isset($plugins['fullscreen'])) {
			$plugins[] = 'fullscreen';
		}
		$initArray['plugins'] = implode(',', $plugins);
	}
	// Remove the "More" toolbar button
	$initArray['theme_advanced_buttons1'] = str_replace(',wp_more', '', $initArray['theme_advanced_buttons1']);
	// Do not remove linebreaks
	$initArray['remove_linebreaks'] = false;
	// Convert newline characters to BR tags
	$initArray['convert_newlines_to_brs'] = false; 
	// Force P newlines
	$initArray['force_p_newlines'] = true; 
	// Force P newlines
	$initArray['force_br_newlines'] = false; 
	// Do not remove redundant BR tags
	$initArray['remove_redundant_brs'] = false;
	// Force p block
	$initArray['forced_root_block'] = 'p';
	// Apply source formatting
	$initArray['apply_source_formatting '] = true;
	// Return modified settings
	return $initArray;
}

/* Widget js loading */
function tinymce_scripts() {
	global $tinymce_widget_version, $tinymce_widget_dev_mode;
	wp_enqueue_script('media-upload');
	if (get_bloginfo('version') >= "3.3") {
		wp_enqueue_script('wplink');
		wp_enqueue_script('wpdialogs-popup');
		wp_enqueue_script('tinymce-widget', get_template_directory_uri() .'/pagebuilder/widgets/tinymce-widget/tinymce-widget.js', array('jquery'), $tinymce_widget_version);
	}
	else {
		wp_enqueue_script('tinymce-widget-legacy', get_template_directory_uri() .'/pagebuilder/widgets/tinymce-widget/tinymce-widget-legacy.js', array('jquery'), $tinymce_widget_version);
	}
}

/* Widget css loading */
function tinymce_styles() {
	global $tinymce_widget_version;
	if (get_bloginfo('version') < "3.3") {
		wp_enqueue_style('thickbox');
	}
	else {
		wp_enqueue_style('wp-jquery-ui-dialog');
	}
	wp_print_styles('editor-buttons');
    wp_enqueue_style('tinymce-widget', get_template_directory_uri() .'/pagebuilder/widgets/tinymce-widget/tinymce-widget.css'	, array(), $tinymce_widget_version);
}


/* Footer script */
function tinymce_footer_scripts() {
	/*// Setup for WP 3.1 and previous versions
	if (get_bloginfo('version') < "3.2") {
		if (function_exists('wp_tiny_mce')) {
			wp_tiny_mce(false, array());
		}
		
	}
	// Setup for WP 3.2.x
	else if (get_bloginfo('version') < "3.3") {
		if (function_exists('wp_tiny_mce')) {
			wp_tiny_mce(false, array());
		}
		
	}
	// Setup for WP 3.3 - New Editor API
	else {*/
		wp_editor('', 'tinymce-widget');
	/* }*/
}

/* Hack needed to enable full media options when adding content form media library */
/* (this is done excluding post_id parameter in Thickbox iframe url) */
add_filter('_upload_iframe_src', 'tinymce_upload_iframe_src');
function tinymce_upload_iframe_src ($upload_iframe_src) {
	global $pagenow;
	if ($pagenow == "widgets.php" || ($pagenow == "admin-ajax.php" && isset ($_POST['id_base']) && $_POST['id_base'] == "tinymce") ) {
		$upload_iframe_src = str_replace('post_id=0', '', $upload_iframe_src);
	}
	return $upload_iframe_src;
}

/* Hack for widgets accessibility mode */
add_filter('wp_default_editor', 'tinymce_editor_accessibility_mode');
function tinymce_editor_accessibility_mode($editor) {
	global $pagenow;
	if ($pagenow == "widgets.php" && isset($_GET['editwidget']) && strpos($_GET['editwidget'], 'tinymce') === 0 ) {
		$editor = 'html';
	}
	return $editor;
}
