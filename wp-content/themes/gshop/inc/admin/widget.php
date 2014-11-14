<?php
/**
 * Registers our main widget area and the front page widget areas.
 *
 */
function gshop_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Blog Sidebar', 'gshop' ),
		'id' => 'sidebar-1',
		'description' => __( 'Appears on blog page and single blog page', 'gshop' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="title-content"><h3 class="title">',
		'after_title' => '</h3></div>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Page Sidebar', 'gshop' ),
		'id' => 'sidebar-2',
		'description' => __( 'Appears when use page template page with sidebar', 'gshop' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="title-content"><h3 class="title">',
		'after_title' => '</h3></div>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Products Widget', 'gshop' ),
		'id' => 'sidebar-3',
		'description' => __( 'Appears on product page', 'gshop' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="title-content"><h3 class="title">',
		'after_title' => '</h3></div>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Contact Sidebar', 'gshop' ),
		'id' => 'sidebar-4',
		'description' => __( 'Appears on contact page', 'gshop' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="title-content"><h3 class="title">',
		'after_title' => '</h3></div>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Top Widget', 'gshop' ),
		'id' => 'footer-top',
		'description' => __( 'Appears in Footer top section', 'gshop' ),
		'before_widget' => '<li class="item">',
		'after_widget' => '</li>',
		'before_title' => '',
		'after_title' => '',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Widget Area 1', 'gshop' ),
		'id' => 'footer-1',
		'description' => __( 'Appears in Footer', 'gshop' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Widget Area 2', 'gshop' ),
		'id' => 'footer-2',
		'description' => __( 'Appears in Footer', 'gshop' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Widget Area 3', 'gshop' ),
		'id' => 'footer-3',
		'description' => __( 'Appears in Footer', 'gshop' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Widget Area 4', 'gshop' ),
		'id' => 'footer-4',
		'description' => __( 'Appears in Footer', 'gshop' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
		
}
add_action( 'widgets_init', 'gshop_widgets_init' );

function gshop_woocommerce_widgets() {
	load_template( trailingslashit( get_template_directory() ) . 'inc/admin/gshop-commerce-widgets/class-gshop-products-slider.php' );
	register_widget( 'Gshop_WC_Widget_Products_Slider' );
}

add_action( 'widgets_init', 'gshop_woocommerce_widgets' );
?>