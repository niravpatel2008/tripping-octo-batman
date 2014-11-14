<style>
<?php

/*--------------Background Options-----------------------*/
$background_image = ot_get_option( 'background_image', array() );
$site_layout = ot_get_option( 'site_layout', array() );
$custom_patterns_images = ot_get_option( 'custom_patterns_images' );
if( $site_layout == 'boxed' ){
	if($custom_patterns_images !='' ) { ?>
		.boxed {
			background:url(<?php echo get_template_directory_uri(); ?>/images/pattern-css/<?php echo $custom_patterns_images; ?>.png) repeat;
		}
	<?php }
	
	if( !empty( $background_image ) ){ ?>
	.boxed {
		<?php
		foreach( $background_image as $key => $value ){
			if($key == 'background-image') echo ($value != '')? "{$key}: url({$value}); " : "";
			else echo ($value != '')? "{$key}: {$value}; " : "";
		}
	?>
	}
	<?php
	}
}

/*--------------Typography Options-----------------------*/
$body_fonts_option = ot_get_option( 'body_fonts_option', array() );
if( !empty( $body_fonts_option ) ){ ?>
body {
<?php
	foreach( $body_fonts_option as $key => $value ){
		$key = ($key == 'font-color')? 'color' : $key;
		echo ($value != '')? "{$key}: {$value}; " : "";
	}
?>
}

h1,
h2,
h3,
h4,
h5,
h6 {
	<?php
	foreach( $body_fonts_option as $key => $value ){
		$key = ($key == 'font-color')? 'color' : $key;
		echo ($value != '')? "{$key}: {$value}; " : "";
	}
?>
}
<?php
}

$footer_heading_font_options = ot_get_option( 'footer_heading_font_options', array() );
if( !empty( $footer_heading_font_options ) ){ ?>
#footer {
<?php
	foreach( $footer_heading_font_options as $key => $value ){
		$key = ($key == 'font-color')? 'color' : $key;
		echo ($value != '')? "{$key}: {$value}; " : "";
	}
?>
}
<?php
}

$menu_fonts_option = ot_get_option( 'menu_fonts_option', array() ); 
if( !empty( $menu_fonts_option ) ){ ?>
.navbar-nav li a {
<?php
	foreach( $menu_fonts_option as $key => $value ){
		$key = ($key == 'font-color')? 'color' : $key;
		echo ($value != '')? "{$key}: {$value}; " : "";
	}
	?>
}
<?php
}

$heading_font_size_h1 = ot_get_option( 'heading_font_size_h1', array() );
if( !empty( $heading_font_size_h1 ) ){ ?>
	<?php $font_unit = ( $heading_font_size_h1[1] == '' )? 'px' : $heading_font_size_h1[1]; ?>
	<?php echo ( $heading_font_size_h1[0] != '' )? "h1 { font-size: " .$heading_font_size_h1[0].$font_unit ."; }" : ""; ?>

<?php
}

$heading_font_size_h2 = ot_get_option( 'heading_font_size_h2', array() );
if( !empty( $heading_font_size_h2 ) ){ ?>
	<?php $font_unit = ( $heading_font_size_h2[1] == '' )? 'px' : $heading_font_size_h2[1]; ?>
	<?php echo ( $heading_font_size_h2[0] != '' )? "h2 { font-size: " .$heading_font_size_h2[0].$font_unit ."; }" : ""; ?>

<?php
}

$heading_font_size_h3 = ot_get_option( 'heading_font_size_h3', array() );
if( !empty( $heading_font_size_h3 ) ){ ?>
	<?php $font_unit = ( $heading_font_size_h3[1] == '' )? 'px' : $heading_font_size_h3[1]; ?>
	<?php echo ( $heading_font_size_h3[0] != '' )? "h3 { font-size: " .$heading_font_size_h3[0].$font_unit ."; }" : ""; ?>

<?php
}

$heading_font_size_h4 = ot_get_option( 'heading_font_size_h4', array() );
if( !empty( $heading_font_size_h4 ) ){ ?>
	<?php $font_unit = ( $heading_font_size_h4[1] == '' )? 'px' : $heading_font_size_h4[1]; ?>
	<?php echo ( $heading_font_size_h4[0] != '' )? "h4 { font-size: " .$heading_font_size_h4[0].$font_unit ."; }" : ""; ?>

<?php
}

$heading_font_size_h5 = ot_get_option( 'heading_font_size_h5', array() );
if( !empty( $heading_font_size_h5 ) ){ ?>
	<?php $font_unit = ( $heading_font_size_h5[1] == '' )? 'px' : $heading_font_size_h5[1]; ?>
	<?php echo ($heading_font_size_h5[0]!='')? "h5 { font-size: " .$heading_font_size_h5[0].$font_unit ."; }" : ""; ?>
<?php
}

$heading_font_size_h6 = ot_get_option( 'heading_font_size_h6', array() );
if( !empty( $heading_font_size_h6 ) ){ ?>
	<?php $font_unit = ( $heading_font_size_h6[1] == '' )? 'px' : $heading_font_size_h6[1]; ?>
	<?php echo ( $heading_font_size_h6[0] != '' )? "h6 { font-size: " .$heading_font_size_h6[0].$font_unit ."; }" : ""; ?> 
<?php
}

$breadcrumbs_font_size = ot_get_option( 'breadcrumbs_font_size', array() );
if( !empty( $breadcrumbs_font_size ) ){ ?>
	<?php $font_unit = ( $breadcrumbs_font_size[1] == '' )? 'px' : $breadcrumbs_font_size[1]; ?>
	<?php echo ( $breadcrumbs_font_size[0] != '' )? ".bredcrumbs li { font-size: " .$breadcrumbs_font_size[0].$font_unit ."; }" : ""; ?>
<?php
}

$page_title_font_size = ot_get_option( 'page_title_font_size', array() );
if( !empty( $page_title_font_size ) ){ ?>
	<?php $font_unit = ( $page_title_font_size[1] == '' )? 'px' : $page_title_font_size[1]; ?>
	<?php echo ( $page_title_font_size[0] != '' )? "h1 { font-size: " .$page_title_font_size[0].$font_unit ."; }" : ""; ?>
<?php
}

$sidebar_widget_title_font_size = ot_get_option( 'sidebar_widget_title_font_size', array() );
if( !empty( $sidebar_widget_title_font_size ) ){ ?>
	<?php $font_unit = ( $sidebar_widget_title_font_size[1] == '' )? 'px' : $sidebar_widget_title_font_size[1]; ?>
	<?php echo ( $sidebar_widget_title_font_size[0] != '' )? ".content-main h3 { font-size: " .$sidebar_widget_title_font_size[0].$font_unit ."; }" : ""; ?>
<?php
}

/*---------------styling options----------------------*/
$primary_color = ot_get_option( 'primary_color' );
echo ( $primary_color != '' )? "body { color: {$primary_color}; }" : "";
$header_background_color = ot_get_option( 'header_background_color' );
echo ( $header_background_color != '' )? "#header { background-color: {$header_background_color}; }" : "";
$header_border_color = ot_get_option( 'header_border_color' );
echo ( $header_border_color != '' )? "#header { border-color: {$header_border_color}; }" : "";
$header_top_background_color = ot_get_option( 'header_top_background_color' );
echo ( $header_top_background_color != '' )? ".top-nav-background { background-color: {$header_top_background_color}; }" : "";
$content_background_color = ot_get_option( 'content_background_color' );
echo ( $content_background_color != '' )? "#main-container { background-color: {$content_background_color}; }" : "";
$footer_background_color = ot_get_option( 'footer_background_color', array() );
if( !empty( $footer_background_color ) ){ ?>
#footer {
<?php
	foreach( $footer_background_color as $key => $value ){
		echo ($value != '')? "{$key}: {$value}; " : "";
	}
	?>
}
<?php
}

$button_text_color = ot_get_option( 'button_text_color' ); 
echo ( $button_text_color != '' )? ".btn-default { color: {$button_text_color}; }" : "";
$page_title_font_color = ot_get_option( 'page_title_font_color' );
echo ( $page_title_font_color != '' )? "h1.title { color: {$page_title_font_color}; }" : "";
$heading_1_h1_font_color = ot_get_option( 'heading_1__h1__font_color' );
echo ( $heading_1_h1_font_color != '' )? "h1 { color: {$heading_1_h1_font_color}; }" : "";
$heading_2_h2_font_color = ot_get_option( 'heading_2__h2__font_color' ); 
echo ( $heading_2_h2_font_color != '' )? "h2 { color: {$heading_2_h2_font_color}; }" : "";
$heading_3_h3_font_color = ot_get_option( 'heading_3__h3__font_color' );
echo ( $heading_3_h3_font_color != '' )? "h3 { color: {$heading_3_h3_font_color}; }" : "";
$heading_4_h4_font_color = ot_get_option( 'heading_4__h4__font_color' );
echo ( $heading_4_h4_font_color != '' )? "h4 { color: {$heading_4_h4_font_color}; }" : "";
$heading_5_h5_font_color = ot_get_option( 'heading_5__h5__font_color' );
echo ( $heading_5_h5_font_color != '' )? "h5 { color: {$heading_5_h5_font_color}; }" : "";
$heading_6_h6_font_color = ot_get_option( 'heading_6__h6__font_color' );
echo ( $heading_6_h6_font_color != '' )? "h6 { color: {$heading_6_h6_font_color}; }" : "";
$body_text_color = ot_get_option( 'body_text_color' );
echo ( $body_text_color != '' )? "body { color: {$body_text_color}; }" : "";
$link_color = ot_get_option( 'link_color' );
echo ( $link_color != '' )? "a { color: {$link_color}; }" : "";
$breadcrumbs_text_color = ot_get_option( 'breadcrumbs_text_color' ); 
echo ( $breadcrumbs_text_color != '' )? ".bredcrumbs li a, .bredcrumbs li span  { color: {$breadcrumbs_text_color}; }" : "";
$footer_font_color = ot_get_option( 'footer_font_color' );
echo ( $footer_font_color != '' )? "#footer p { color: {$footer_font_color}; }" : "";
$footer_link_color = ot_get_option( 'footer_link_color' );
echo ( $footer_link_color != '' )? "#footer ul li a { color: {$footer_link_color}; }" : "";
$menu_font_color_first_level = ot_get_option( 'menu_font_color___first_level' );
echo ( $menu_font_color_first_level != '' )? ".navbar-nav li a { color: {$menu_font_color_first_level}; }" : "";
$menu_background_color_sublevels = ot_get_option( 'menu_background_color___sublevels' );
echo ( $menu_background_color_sublevels != '' )? ".navbar-nav li ul { background-color: {$menu_background_color_sublevels}; }" : "";
$menu_font_color_sublevels = ot_get_option( 'menu_font_color___sublevels' );
echo ( $menu_font_color_sublevels != '' )? ".navbar-nav li a { color: {$menu_font_color_sublevels}; }" : "";
$menu_hover_background_color_sublevels = ot_get_option( 'menu_hover_background_color___sublevels' );
echo ( $menu_hover_background_color_sublevels != '' )? ".navbar-nav li a:hover { bacground-color: {$menu_hover_background_color_sublevels}; }" : "";

$css_code = ot_get_option( 'css_code' );
echo ( $css_code != '' )? $css_code: '';

$footer_bacground_image = ot_get_option( 'footer_bacground_image', array() );
if( !empty( $footer_bacground_image ) ){ ?>
#footer-top {
<?php
	foreach( $footer_bacground_image as $key => $value ){
		if($key == 'background-image')echo ($value != '')? "{$key}: url({$value}); " : "";
		else echo ($value != '')? "{$key}: {$value}; " : "";
	}
?>
}
<?php
}
?>
</style>
