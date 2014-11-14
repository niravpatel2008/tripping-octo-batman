<?php
$custom_color_1 = ot_get_option( 'preset_custom_color_1' );
if($custom_color_1 == ''){
	$custom_color_1 = '#FB6C64';
}
$custom_color_2 = ot_get_option( 'preset_custom_color_2' );
if($custom_color_2 == ''){
	$custom_color_2 = '#F8AA33';
}
$custom_color_3 = ot_get_option( 'preset_custom_color_3' );
if($custom_color_3 == ''){
	if($custom_color_2 != '' ){
		$custom_color_3 = $custom_color_2;
	} else {
	$custom_color_3 = '#F8AA33';
	}
}

function hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   $rgb_color = implode(",", $rgb); // returns the rgb values separated by commas
   //return $rgb; // returns an array with the rgb values
   return $rgb_color;
}
?>
<style>

#header,
.more-button,
.submit-btn,
.navigation ul li.active a,
.navigation ul li a:hover,
.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
.woocommerce-page .widget_price_filter .ui-slider .ui-slider-handle,
.woocommerce form.login input.button,
.woocommerce-page form.login input.button,
.woocommerce #payment #place_order,
.woocommerce-page #payment #place_order,
.top-button,
.woocommerce a.button.alt,
.woocommerce-page a.button.alt,
.woocommerce button.button.alt,
.woocommerce-page button.button.alt,
.woocommerce input.button.alt,
.woocommerce-page input.button.alt,
.woocommerce #respond input#submit.alt,
.woocommerce-page #respond input#submit.alt,
.woocommerce #content input.button.alt,
.woocommerce-page #content input.button.alt,
.woocommerce a.button,
.woocommerce-page a.button,
.woocommerce button.button,
.woocommerce-page button.button,
.woocommerce input.button,
.woocommerce-page input.button,
.woocommerce #respond input#submit,
.woocommerce-page #respond input#submit,
.woocommerce #content input.button,
.woocommerce-page #content input.button,
.woocommerce a.button.alt:hover,
.woocommerce-page a.button.alt:hover,
.woocommerce button.button.alt:hover,
.woocommerce-page button.button.alt:hover,
.woocommerce input.button.alt:hover,
.woocommerce-page input.button.alt:hover,
.woocommerce #respond input#submit.alt:hover,
.woocommerce-page #respond input#submit.alt:hover,
.woocommerce #content input.button.alt:hover,
.woocommerce-page #content input.button.alt:hover,
.woocommerce a.button:hover,
.woocommerce-page a.button:hover,
.woocommerce button.button:hover,
.woocommerce-page button.button:hover,
.woocommerce input.button:hover,
.woocommerce-page input.button:hover,
.woocommerce #respond input#submit:hover,
.woocommerce-page #respond input#submit:hover,
.woocommerce #content input.button:hover,
.woocommerce-page #content input.button:hover,
.fixed,
.product-title-icon i:before,
.discount-sale,
.rev_slider_wrapper,
.woocommerce nav.woocommerce-pagination ul li span.current, .woocommerce-page nav.woocommerce-pagination ul li span.current, .woocommerce #content nav.woocommerce-pagination ul li span.current, .woocommerce-page #content nav.woocommerce-pagination ul li span.current, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce-page nav.woocommerce-pagination ul li a:hover, .woocommerce #content nav.woocommerce-pagination ul li a:hover, .woocommerce-page #content nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce-page nav.woocommerce-pagination ul li a:focus, .woocommerce #content nav.woocommerce-pagination ul li a:focus, .woocommerce-page #content nav.woocommerce-pagination ul li a:focus,
.woocommerce a.button.alt,
.woocommerce-page a.button.alt,
.woocommerce button.button.alt,
.woocommerce-page button.button.alt,
.woocommerce input.button.alt,
.woocommerce-page input.button.alt,
.woocommerce #respond input#submit.alt,
.woocommerce-page #respond input#submit.alt,
.woocommerce #content input.button.alt,
.woocommerce-page #content input.button.alt,
.woocommerce .cart-collaterals .shipping_calculator .button,
.woocommerce-page .cart-collaterals .shipping_calculator .button {
  background-color: <?php echo $custom_color_1; ?>;
}

.sidebar .widget_search input[ type= "submit" ],
.summer-sale,
#answers ul li.current-faq,
.eemail_button input[type="button"],
#footer .searchform input[type="submit"],
.woocommerce a.button,
.woocommerce-page a.button,
.woocommerce button.button,
.woocommerce-page button.button,
.woocommerce input.button,
.woocommerce-page input.button,
.woocommerce #respond input#submit,
.woocommerce-page #respond input#submit,
.woocommerce #content input.button,
.woocommerce-page #content input.button {
  background-color: <?php echo $custom_color_2; ?>;
}

#footer,
.eemail_button input[type="button"] {
	background-color: <?php echo $custom_color_3; ?>;
}

.woocommerce a.button:hover,
.woocommerce-page a.button:hover,
.woocommerce button.button:hover,
.woocommerce-page button.button:hover,
.woocommerce input.button:hover,
.woocommerce-page input.button:hover,
.woocommerce #respond input#submit:hover,
.woocommerce-page #respond input#submit:hover,
.woocommerce #content input.button:hover,
.woocommerce-page #content input.button:hover,
.yith-wcwl-add-button.show {
	background-color: <?php echo $custom_color_2; ?>;
}

a:hover,
a:focus,
.tagcloud a,
.author a,
.blog-tags ul li a,
.comment-meta a,
.navigation ul li a,
.woocommerce .star-rating:before,
.woocommerce-page .star-rating:before,
.woocommerce div.product span.price,
.woocommerce-page div.product span.price,
.woocommerce #content div.product span.price,
.woocommerce-page #content div.product span.price,
.woocommerce div.product p.price,
.woocommerce-page div.product p.price,
.woocommerce #content div.product p.price,
.woocommerce-page #content div.product p.price,
.woocommerce .star-rating span,
.woocommerce-page .star-rating span,
.product_meta a,
.woocommerce ul.products li.product .price,
.woocommerce-page ul.products li.product .price,
.woocommerce-info a,
#questions ul li,
.product-share ul li:hover a {
	color: <?php echo $custom_color_1; ?>;
}

.navbar-nav li ul li:hover a,
#answers i {
	color: <?php echo $custom_color_2; ?>;
}

.form-control:focus,
.dropdown-cart,
.product-share ul li:hover,
.rox-pricing-table .rox-pricing-header h5,
.rox-pricing-table .rox-pricing-header {
    border-color: <?php echo $custom_color_1; ?>;
}

.woocommerce ul.products li.product .sale-product-holder,
.woocommerce-page ul.products li.product .sale-product-holder ,
.single-product.woocommerce .product .sale-product-holder,
.single-product.woocommerce-page .product .sale-product-holder {
    border-top-color: <?php echo $custom_color_1; ?>;
}

.form-control:focus {
	 box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(<?php echo hex2rgb($custom_color_1); ?>, 0.6);
	-o-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(<?php echo hex2rgb($custom_color_1); ?>, 0.6);
	-webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(<?php echo hex2rgb($custom_color_1); ?>, 0.6);
	-ms-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(<?php echo hex2rgb($custom_color_1); ?>, 0.6);
}

.footer-top-bg,
.rox-pricing-table .rox-pricing-header {
	background: rgba(<?php echo hex2rgb($custom_color_1); ?>, 0.8);
}

.rev_slider_wrapper,
.slotholder img.defaultimg {
  background-color: <?php echo $custom_color_1; ?>!important;
}

.rox-pricing-table .featured .rox-pricing-header {
	background: rgba(<?php echo hex2rgb($custom_color_2); ?>, 0.8);
}

.rox-pricing-table .featured .rox-pricing-header h5,
.rox-pricing-table .featured .rox-pricing-cost {
	border-color: rgba(<?php echo hex2rgb($custom_color_2); ?>, 0.8);
}

</style>