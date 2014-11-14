<?php

/**
 * Add the options page
 */
function rox_panels_options_admin_menu() {
	//add_options_page( __('Page Builder', 'so-panels'), __('Page Builder', 'so-panels'), 'manage_options', 'rox_panels', 'rox_panels_options_page' );
}
add_action( 'admin_menu', 'rox_panels_options_admin_menu' );

/**
 * Display the admin page.
 */
function rox_panels_options_page(){
	include plugin_dir_path(ROX_PANELS_BASE_FILE) . '/tpl/options.php';
}

/**
 * Register all the settings fields.
 */
function rox_panels_options_init() {
	register_setting( 'rox-panels', 'rox_panels_post_types', 'rox_panels_options_sanitize_post_types' );
	register_setting( 'rox-panels', 'rox_panels_display', 'rox_panels_options_sanitize_display' );

	add_settings_section( 'general', __('General', 'so-panels'), '__return_false', 'rox-panels' );
	add_settings_section( 'display', __('Display', 'so-panels'), '__return_false', 'rox-panels' );

	add_settings_field( 'post-types', __('Post Types', 'so-panels'), 'rox_panels_options_field_post_types', 'rox-panels', 'general' );
	add_settings_field( 'copy-content', __('Copy Content to Post Content', 'so-panels'), 'rox_panels_options_field_display', 'rox-panels', 'general', array( 'type' => 'copy-content' ));
	add_settings_field( 'animations', __('Animations', 'so-panels'), 'rox_panels_options_field_display', 'rox-panels', 'general', array(
		'type' => 'animations',
		'description' => __('Disable animations to improve Page Builder interface performance', 'so-panels'),
	));

	// The display fields
	add_settings_field( 'post-types', __('Responsive', 'so-panels'), 'rox_panels_options_field_display', 'rox-panels', 'display', array( 'type' => 'responsive' ));
	add_settings_field( 'mobile-width', __('Mobile Width', 'so-panels'), 'rox_panels_options_field_display', 'rox-panels', 'display', array( 'type' => 'mobile-width' ));
	add_settings_field( 'margin-sides', __('Margin Sides', 'so-panels'), 'rox_panels_options_field_display', 'rox-panels', 'display', array( 'type' => 'margin-sides' ));
	add_settings_field( 'margin-bottom', __('Margin Bottom', 'so-panels'), 'rox_panels_options_field_display', 'rox-panels', 'display', array( 'type' => 'margin-bottom' ));
}
add_action( 'admin_init', 'rox_panels_options_init' );

/**
 * Display the field for selecting the post types
 *
 * @param $args
 */
function rox_panels_options_field_post_types($args){
	$panels_post_types = rox_panels_setting('post-types');

	$all_post_types = get_post_types(array('_builtin' => false));
	$all_post_types = array_merge(array('page' => 'page', 'post' => 'post'), $all_post_types);
	
	foreach($all_post_types as $type){
		$info = get_post_type_object($type);
		if(empty($info->labels->name)) continue;
		$checked = in_array(
			$type,
			$panels_post_types
		);
		
		?>
		<label>
			<input type="checkbox" name="rox_panels_post_types[<?php echo esc_attr($type) ?>]" value="<?php echo esc_attr($type) ?>" <?php checked($checked) ?> />
			<?php echo esc_html($info->labels->name) ?>
		</label><br/>
		<?php
	}
	
	?><p class="description"><?php _e('Post types that will have the page builder available', 'so-panels') ?></p><?php
}

/**
 * Display the fields for the other settings.
 *
 * @param $args
 */
function rox_panels_options_field_display($args){
	$settings = rox_panels_setting();
	switch($args['type']) {
		case 'responsive' :
		case 'copy-content' :
		case 'animations' :
			?><label><input type="checkbox" name="rox_panels_display[<?php echo esc_attr($args['type']) ?>]" <?php checked($settings[$args['type']]) ?> /> <?php _e('Enabled', 'so-panels') ?></label><?php
			break;
		case 'margin-bottom' :
		case 'margin-sides' :
		case 'mobile-width' :
			?><input type="text" name="rox_panels_display[<?php echo esc_attr($args['type']) ?>]" value="<?php echo esc_attr($settings[$args['type']]) ?>" class="small-text" /> <?php _e('px', 'so-panels') ?><?php
			break;
	}

	if(!empty($args['description'])) {
		?><p class="description"><?php echo esc_html($args['description']) ?></p><?php
	}
}

/**
 * Check that we have valid post types
 *
 * @param $types
 * @return array
 */
function rox_panels_options_sanitize_post_types($types){
	$all_post_types = get_post_types(array('_builtin' => false));
	$all_post_types = array_merge(array('post' => 'post', 'page' => 'page'), $all_post_types);
	foreach($types as $type => $val){
		if(!in_array($type, $all_post_types)) unset($types[$type]);
		else $types[$type] = !empty($types[$type]);
	}
	
	// Only non empty items
	return array_keys(array_filter($types));
}

/**
 * Sanitize the other options fields
 *
 * @param $vals
 * @return mixed
 */
function rox_panels_options_sanitize_display($vals){
	foreach($vals as $f => $v){
		switch($f){
			case 'responsive' :
			case 'copy-content' :
			case 'animations' :
				$vals[$f] = !empty($vals[$f]);
				break;
			case 'margin-bottom' :
			case 'margin-sides' :
			case 'mobile-width' :
				$vals[$f] = intval($vals[$f]);
				break;
		}
	}
	$vals['responsive'] = !empty($vals['responsive']);
	$vals['copy-content'] = !empty($vals['copy-content']);
	$vals['animations'] = !empty($vals['animations']);
	return $vals;
}