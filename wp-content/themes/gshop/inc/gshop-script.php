<?php
function gshop_scripts_styles(){
      global $wp_styles;

        /* translators: If there are characters in your language that are not supported
       by Open Sans, translate this to 'off'. Do not translate into your own language. */
    if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'gshop' ) ) {
        $subsets = 'latin,latin-ext';

        /* translators: To add an additional Open Sans character subset specific to your language, translate
           this to 'greek', 'cyrillic' or 'vietnamese'. Do not translate into your own language. */
        $subset = _x( 'no-subset', 'Open Sans font: add new subset (greek, cyrillic, vietnamese)', 'gshop' );

        if ( 'cyrillic' == $subset )
            $subsets .= ',cyrillic,cyrillic-ext';
        elseif ( 'greek' == $subset )
            $subsets .= ',greek,greek-ext';
        elseif ( 'vietnamese' == $subset )
            $subsets .= ',vietnamese';

        $protocol = is_ssl() ? 'https' : 'http';
        $query_args = array(
            'family' => 'Open+Sans:400italic,700italic,400,700',
            'subset' => $subsets,
        );
        wp_register_style( 'gshop-fonts', add_query_arg( $query_args, "$protocol://fonts.googleapis.com/css" ), array(), null );
    }
	
    wp_register_style( 'gshop-google', 'http://fonts.googleapis.com/css?family=PT+Sans' );    
    wp_enqueue_style('gshop-google');
	wp_register_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), 'gshop' );
    wp_enqueue_style('bootstrap');
	wp_register_style('jquery.prettyphoto', get_template_directory_uri() .'/css/prettyPhoto.css');
    wp_enqueue_style('jquery.prettyphoto');
    wp_register_style('video-lightbox', get_template_directory_uri() .'/css/rox-lightbox.css');
	wp_enqueue_style('video-lightbox');
	wp_register_style( 'gshop-adipoli', get_template_directory_uri() . '/css/adipoli.css', array( 'gshop-style' ), 'gshop' );
    wp_enqueue_style('gshop-adipoli');
	wp_register_style('gshop-animated', get_template_directory_uri() .'/css/animated.css');
    wp_enqueue_style('gshop-animated');
	wp_register_style('gshop-animate', get_template_directory_uri() .'/css/animate.min.css');
    wp_enqueue_style('gshop-animate');
    wp_register_style( 'font-awesome', get_template_directory_uri() .'/fonts/font-awesome/css/font-awesome.css' );
    wp_enqueue_style( 'font-awesome' );
	wp_register_style( 'font-awesome-4.0.3', get_template_directory_uri() .'/fonts/font-awesome-4.0.3/css/font-awesome.css' );
    wp_enqueue_style( 'font-awesome-4.0.3' );
	wp_register_style( 'product-slider-widget', get_template_directory_uri() .'/css/product-slider-widget.css' );
    wp_enqueue_style( 'product-slider-widget' );    

    wp_enqueue_style( 'gshop-style', get_stylesheet_uri() );
    /*
     * Loads the Internet Explorer specific stylesheet.
     */
    wp_enqueue_style( 'gshop-ie', get_template_directory_uri() . '/css/ie.css', array( 'gshop-style' ), '20121010' );
    $wp_styles->add_data( 'gshop-ie', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'gshop_scripts_styles' );

/**
 * Enqueues scripts for front-end.
 *
 */
function gshop_scripts_js() {
    global $wp_styles;

    /*
     * Adds JavaScript to pages with the comment form to support
     * sites with threaded comments (when in use).
     */
    wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'jquery-ui-core' );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
        wp_enqueue_script( 'comment-reply' );

    
	/*
     * Adds JavaScript load in Header.
     */ 
    wp_register_script( 'gshop-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '1.0.0' );    
    wp_enqueue_script('gshop-bootstrap');
    wp_register_script('gshop-holder', get_template_directory_uri().'/js/holder.js', array('jquery'), '2.0');
    wp_enqueue_script('gshop-holder');
	wp_register_script('gshop-prettyPhoto', get_template_directory_uri().'/js/jquery.prettyPhoto.js', array('jquery'), '2.0');
    wp_enqueue_script('gshop-prettyPhoto');
	wp_register_script('gshop-video-lightbox', get_template_directory_uri().'/js/video-lightbox.js', array('jquery', 'gshop-prettyPhoto'), '2.0');
    wp_enqueue_script('gshop-video-lightbox');
    wp_register_script( 'gshop-isotope', get_template_directory_uri() . '/js/jquery.isotope.min.js', array('jquery'), '1.0.0', true );    
    wp_enqueue_script('gshop-isotope');
	wp_register_script( 'gshop-adipoli', get_template_directory_uri() . '/js/jquery.adipoli.min.js', array('jquery'), '1.0', true );
    wp_enqueue_script('gshop-adipoli');
	wp_register_script( 'gshop-scrollTo', get_template_directory_uri() . '/js/jquery.scrollTo.js', array('jquery'), '1.0', true );
    wp_enqueue_script('gshop-scrollTo');
	wp_enqueue_script( 'gshop-carouFredSel', get_template_directory_uri() . '/js/jquery.carouFredSel-6.2.1-packed.js', array('jquery'), '1.0.0' );  
    wp_enqueue_script('gshop-carouFredSel');
    wp_register_script( 'gshop-menu', get_template_directory_uri() . '/js/menu.js', array('jquery'), '1.0', true );
    wp_enqueue_script('gshop-menu');
    $scrolling_animation = ot_get_option('scrolling_animation');
    if( empty($scrolling_animation)):
    wp_enqueue_script( 'gshop-scroll-effect', get_template_directory_uri() . '/js/scroll-effect.js', array('jquery'), '1.0', true );
    endif;
	wp_enqueue_script( 'gshop-timer', get_template_directory_uri() . '/js/timer.js', array('jquery', 'jquery-ui-core'), '1.0', true ); 
	wp_enqueue_script( 'gshop-knob', get_template_directory_uri() . '/js/jquery.knob.js', array('jquery'), '1.0', true );
    wp_enqueue_script('gshop-knob');
    wp_register_script( 'gshop-js', get_template_directory_uri() . '/js/js.js', array('jquery', 'jquery-ui-core'), '1.0', true ); 
    wp_enqueue_script('gshop-js');

    


}
add_action( 'wp_enqueue_scripts', 'gshop_scripts_js' );

add_action( 'wp_print_scripts', 'gshop_inline_js' );
function gshop_inline_js(){
		global $wpdb;
		$top_fixed_menu = ot_get_option('top_fixed_menu');
		if( empty($top_fixed_menu)) $top_fixed = 1; else $top_fixed = 0;
		echo "<script type='text/javascript'>\n";
		echo "var top_fixed_menu = ".$top_fixed."; \n";
		echo "</script>";
}

function gshop_style_to_footer(){
	wp_register_style( 'product-woocommerce', get_template_directory_uri() .'/css/woocommerce.css' );
    wp_enqueue_style( 'product-woocommerce' );
}

function gshop_template_file_load_to_footer(){
	load_template( trailingslashit( get_template_directory() ) . 'inc/preset.php' );
	load_template( trailingslashit( get_template_directory() ) . 'inc/style.php' );
}

add_action('wp_footer', 'gshop_style_to_footer');
add_action('wp_footer', 'gshop_template_file_load_to_footer', 200);

function gshop_fabicon_ico(){
    do_action( 'gshop_fabicon_ico' );
}
add_action( 'gshop_fabicon_ico', 'gshop_fabicon_ico_callback' );
if( !function_exists( 'gshop_fabicon_ico_callback' ) ){
    function gshop_fabicon_ico_callback(){
        global $wpdb;

        echo '<link rel="apple-touch-icon-precomposed" sizes="144x144" href="'.ot_get_option('apple_ipad_retina_icon', get_template_directory_uri().'/images/favicon.png').'">';
        echo '<link rel="apple-touch-icon-precomposed" sizes="114x114" href="'.ot_get_option('apple_iphone_retina_icon', get_template_directory_uri().'/images/favicon.png').'">';
        echo '<link rel="apple-touch-icon-precomposed" sizes="72x72" href="'.ot_get_option('apple_ipad_icon', get_template_directory_uri().'/images/favicon.png').'">';
        echo '<link rel="apple-touch-icon-precomposed" href="'.ot_get_option('apple_iphone_icon', get_template_directory_uri().'/images/favicon.png').'">';
        echo '<link rel="shortcut icon" href="'.ot_get_option('custom_fabicon', get_template_directory_uri().'/images/favicon.ico').'">';
    }
}        
?>