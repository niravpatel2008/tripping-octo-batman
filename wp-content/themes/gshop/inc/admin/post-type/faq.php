<?php
add_action('init', 'faq_custom_init');
function faq_custom_init(){
  $labels = array(
    'name' => __('FAQs', 'gshop'),
    'singular_name' => __('FAQ', 'gshop'),
    'add_new' => __('Add New', 'gshop'),
    'add_new_item' => __('Add New FAQ', 'gshop'),
    'edit_item' => __('Edit FAQ', 'gshop'),
    'new_item' => __('New FAQ', 'gshop'),
    'view_item' => __('View FAQ', 'gshop'),
    'search_items' => __('Search FAQs', 'gshop'),
    'not_found' =>  __('No FAQs found', 'gshop'),
    'not_found_in_trash' => __('No FAQs found in Trash', 'gshop'), 
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => 5,
    'supports' => array('title','editor')
  ); 
  register_post_type('faq',$args);
}
?>