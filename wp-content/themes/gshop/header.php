<?php
/**
 * The Header for our theme.
 *
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php gshop_fabicon_ico(); ?>
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>
    <![endif]-->
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
	<section id="header">
  		<div class="container">
  			<div class="row header-shopping-cart">
  				<div class="col-lg-12">
	  				<div class="header-search-form">
						<form action="<?php echo home_url(); ?>" class="form-search">
							<input type="text" name="s" class="input-medium search-query">
						</form>
					</div>
	  				<div class="header-language-cart-listing">
                    <?php						
							$args = array(
									'theme_location'  => 'header_top',
									'menu_class'      => 'list-inline language',
									'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
									'fallback_cb'     => 'gshop_default_top_menu',
									'container'       => '',		);
							wp_nav_menu( $args );
							?>
	  					<ul class="list-inline language-cart">
		  					<?php if( class_exists( 'Woocommerce' ) ):?>
			  					<?php if( defined( 'YITH_WCWL' ) ): ?>
                                <?php $wish_link = get_option( 'yith_wcwl_wishlist_page_id' ); ?>
			  					<li class="item-wishlist"><a href="<?php echo get_permalink( $wish_link ); ?>"><?php echo yith_wcwl_count_products(); ?></a></li>
			  					<?php endif; ?>
			  					<li class="item-cart">                            
	                            <?php global $woocommerce; ?>
	                            <a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>">
								<?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>							
									<div class="dropdown-cart">
									<?php 
										if ( !is_cart() || !is_checkout() ) {
											echo '<div class="widget_shopping_cart_content"></div>';
										}
									 ?> 
									 </div> 
								</li>
	                            <?php else: ?>
	                             <li class="item-wishlist"><a href="#"><?php echo _e( '0', 'gshop' ); ?></a></li>
	                            <li class="item-cart"><a class="cart-contents" href="#"><?php echo _e( '0', 'gshop' ); ?></a></li>
                            <?php endif; ?>
		  				</ul>
	  				</div>
  				</div>
  			</div>
  			<div class="row main-header">
  				<div class="col-lg-3">
  					<h1 class="logo">
                    <?php $logo = ot_get_option( 'logo', '' ); ?>
  						<a href="<?php echo home_url(); ?>">
                        <?php if($logo !=''): ?>
  							<img src="<?php echo $logo; ?>" alt="logo" />
                        <?php else: ?>
                        	<img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="logo" />
                        <?php endif; ?>
  						</a>
  					</h1>
  				</div>
  				<div class="col-lg-9">
		  			<div class="navbar-header">
			          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			            <i class="fa fa-outdent fa-2x"></i>
			          </button>
			        </div>
			        <div class="navbar-collapse collapse">
		        	<?php						
					$args = array(
							'theme_location'  => 'header',
							'menu_class'      => 'nav navbar-nav',
							'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'fallback_cb'     => 'gshop_default_main_menu',
							'container'       => '',		);
		            wp_nav_menu( $args );
				    ?>
			        </div><!--/.nav-collapse -->
                    <div class="header-search-form-mobile">
						<form action="<?php echo home_url(); ?>" class="form-search">
							<input type="text" name="s" class="input-medium search-query-mobile">
						</form>
					</div>
			    </div><!--end of .col-lg-9-->
			</div><!--end of .row-->
  		</div> <!--end of .container-->
  	</section> <!--end of section #header-->
    <?php global $post, $wpdb; ?>
    <?php if(is_page()):?>
    <?php if( get_post_meta( $post->ID, 'page_slider_shortcode', true ) != '' ): ?>
    <section id="slider-container">
    <?php $slider_shortcode = get_post_meta( $post->ID, 'page_slider_shortcode', true ); ?>
    <?php echo do_shortcode( "$slider_shortcode" ); ?>
    </section>
    <?php endif; ?>
    <?php endif; ?>
  	<section id="main-container">
  		<div class="container">