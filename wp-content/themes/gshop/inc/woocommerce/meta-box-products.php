<?php
add_action( 'admin_init', 'gahop_custom_meta_boxes_for_products' );


/*Initialize the meta boxes for video.*/
function gahop_custom_meta_boxes_for_products() {

  $product_meta_box = array(
    'id'        => 'products-meta-box',
    'title'     => 'Social Share Box Options',
    'desc'      => '',
    'pages'     => array( 'product' ),
    'context'   => 'side',
    'priority'  => 'low',
	'fields'    => array(
    array(
        'id'          => 'facebook_box',
        'label'       => 'Facebook',
        'desc'        => '',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'disable',
            'label'       => 'Disable',
            'src'         => ''
          )
        ),
      ),
	  array(
        'id'          => 'twitter_box',
        'label'       => 'Twitter',
        'desc'        => '',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'disable',
            'label'       => 'Disable',
            'src'         => ''
          )
        ),
      ),
	  array(
        'id'          => 'google_plus_box',
        'label'       => 'Google Plus',
        'desc'        => '',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'disable',
            'label'       => 'Disable',
            'src'         => ''
          )
        ),
      ),
	  array(
        'id'          => 'rss_box',
        'label'       => 'RSS',
        'desc'        => '',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'disable',
            'label'       => 'Disable',
            'src'         => ''
          )
        ),
      ),
	)
  );
  
  ot_register_meta_box( $product_meta_box );
}


?>