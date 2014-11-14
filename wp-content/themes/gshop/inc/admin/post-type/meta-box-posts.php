<?php
add_action( 'admin_init', 'gshop_custom_meta_boxes_for_post_video' );
add_action( 'admin_init', 'gshop_custom_meta_boxes_for_page_slider' );


/*Initialize the meta boxes for video.*/
function gshop_custom_meta_boxes_for_post_video() {

  $post_video = array(
    'id'        => 'posts_video',
    'title'     => 'Video',
    'desc'      => '',
    'pages'     => array( 'post' ),
    'context'   => 'side',
    'priority'  => 'low',
    'fields'    => array(
      array(
        'id'          => 'post_video_url_id_youtube',
        'label'       => 'Youtube Video URL ID',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'class'       => '',
        'choices'     => array()
      ),
	  array(
        'id'          => 'post_video_url_id_vimeo',
        'label'       => 'Vimeo Video URL ID',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'class'       => '',
        'choices'     => array()
      )
    )
  );
  
  ot_register_meta_box( $post_video );

}

/*Initialize the meta boxes for slider shortcode.*/
function gshop_custom_meta_boxes_for_page_slider() {

  $page_slider = array(
    'id'        => 'page_slider',
    'title'     => 'Page Options',
    'desc'      => '',
    'pages'     => array( 'page' ),
    'context'   => 'side',
    'priority'  => 'low',
    'fields'    => array(
      array(
        'id'          => 'page_slider_shortcode',
        'label'       => 'Slider Shortcode',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'class'       => '',
        'choices'     => array()
      )
    )
  );
  
  ot_register_meta_box( $page_slider );

}


?>