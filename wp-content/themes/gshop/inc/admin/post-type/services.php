<?php
add_action( 'init', 'gshop_register_post_type_services' );  
add_action( 'admin_init', 'gshop_custom_meta_boxes_for_services' );

function gshop_register_post_type_services(){
	
	$labels = array(
		'name' => __( 'Services', 'gshop' ),
        'singular_name' => __( 'Services', 'gshop' ),
        'name_admin_bar' => __( 'Services', 'gshop' ),
        'add_new' => __( 'Add New', 'gshop' ),
        'add_new_item' => __( 'Add New Services', 'gshop' ),
        'edit_item' => __( 'Edit Services', 'gshop' ),
        'new_item' => __( 'New Services', 'gshop' ),
        'all_items' => __( 'All Services', 'gshop' ),
        'view_item' => __( 'View Services', 'gshop' ),
        'search_items' => __( 'Search Services', 'gshop' ),
        'not_found' => __( 'No Services found', 'gshop' ),
        'not_found_in_trash' => __( 'No Services found in Trash', 'gshop' ),
        'parent_item_colon' => '',
        'menu_name' => __( 'Services', 'gshop' ),
    );
    $args = array(
    	'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'has_archive' => true,
        'hierarchical' => false,
        'rewrite' => true,
        'menu_position' => null,
        'supports' => array( 'title', 'editor' )
    );
	register_post_type( 'services', $args );
	
}

/*Initialize the meta boxes for options.*/
function gshop_custom_meta_boxes_for_services() {
	
	$link = 'http://fortawesome.github.io/Font-Awesome/icons/';

  $services_meta_box = array(
    'id'        => 'services_meta_box',
    'title'     => 'Services Options',
    'desc'      => '',
    'pages'     => array( 'services' ),
    'context'   => 'normal',
    'priority'  => 'high',
    'fields'    => array(
	  array(
        'id'          => 'services_icon',
        'label'       => 'Service Icon',
        'desc'        => 'Just paste class name, Example: "fa fa-cog". You can find icon from <a href="'.$link.'" target="_blank">here</a>',
        'std'         => '',
        'type'        => 'text',
        'class'       => '',
        'choices'     => array()
      )
	)
  );
  
  ot_register_meta_box( $services_meta_box );

}	
?>