<?php
/**
 * The template for displaying the footer.
 *
 */
?>
    <div class="back-to-top"><a href="#" class="scrollup"><img src="<?php echo get_template_directory_uri(); ?>/images/back-to-top.png" alt="" /></a></div>
    </div><!--.container-->
  </section><!--.main-container-->
  
  <?php $footer_top_section = ot_get_option( 'footer_top_section', ''); ?>
  <?php if( empty( $footer_top_section ) ): ?>
  <section id="footer-top">
  	<div class="footer-top-bg">  
      <div class="container">
        <div id="myCarousel" class="carousel slide">
          <ul class="carousel-inner customer">
             <?php
			 if( class_exists( 'Woocommerce' ) ){
				 $args = array('hide_empty' => false);
			 	$taxonomy = 'product_cat';
			 	$categories = wp_count_terms( $taxonomy, $args );
			 	$count_posts = wp_count_posts( 'product' );
				$products = $count_posts->publish;
			 } else {
				 $categories = '20456';
				 $products = '678685';
			 }
			 
			 $result = count_users();
			 ?>
            <li class="item active">
              <p class="counter">
                <span class="timer" data-to="<?php echo $categories; ?>"><?php echo $categories; ?></span><?php echo _e( 'Catagories', 'gshop' ); ?>
                <span class="timer" data-to="<?php echo $products; ?>"><?php echo $products; ?></span><?php echo _e( 'Products', 'gshop' ); ?> 
                <span class="timer" data-to="<?php echo $result['total_users']; ?>"><?php echo $result['total_users']; ?></span><?php echo _e( 'Customers', 'gshop' ); ?>
              </p>
              <p><?php echo _e( 'Are you ready used since the reproduced below interested', 'gshop' ); ?></p>
            </li>
            <?php if ( is_active_sidebar( 'footer-top' ) ) : ?>
			  <?php dynamic_sidebar( 'footer-top' ); ?>
            <?php endif; ?>
          </ul>
          <?php $widget_number = gshop_count_widgets( 'footer-top' ); ?>
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <?php for( $i= 1; $i<= $widget_number; $i++) {?>
            <li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>"></li>
            <?php } ?>
          </ol>
        </div><!-- /.carousel -->
        
      </div> <!--end of .container-->
     </div>
    </section> <!--end of section #footer-top-->
    <?php endif; ?>
    <section id="footer">
      <div class="container">
      <?php $footer_widget = ot_get_option( 'footer_widget', ''); ?>
      <?php if( empty( $footer_widget ) ): ?>
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
           <?php $logo = ot_get_option( 'logo', '' );
			$footer_logo = ot_get_option( 'footer_logo', '');
			 ?>
            <h1 class="logo">
            <a href="<?php echo home_url(); ?>">
			<?php if( $footer_logo !='' ): ?>
			<img alt="footer logo" src="<?php echo $footer_logo; ?>" />
			<?php elseif($logo !=''): ?>
			<img alt="footer logo" src="<?php echo $logo; ?>" />
			<?php else: ?>
			<img alt="footer logo" src="<?php echo get_template_directory_uri(); ?>/images/logo.png" />
			<?php endif; ?>
			</a>
            </h1>
            <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
			  <?php dynamic_sidebar( 'footer-1' ); ?>
            <?php endif; ?>
            <?php $diplay_social_icons_on_footer_of_the_page = ot_get_option( 'diplay_social_icons_on_footer_of_the_page' ); ?>
			<?php $open_social_icons_on_footer_in_a_new_window = ot_get_option( 'open_social_icons_on_footer_in_a_new_window' );?>
            <?php $target = (!empty($open_social_icons_on_footer_in_a_new_window))? 'target="_blank"' : ''; ?>
            <?php if( empty( $diplay_social_icons_on_footer_of_the_page ) ): ?>
            <ul class="list-inline social-icons">
              <?php $social_link_facebook = ot_get_option( 'facebook' ); ?>
                <?php if( $social_link_facebook !='' ): ?>
                <li><a class="img-circle" href="<?php echo $social_link_facebook; ?>" <?php echo $target; ?>><i class="icon-facebook"></i></a></li>
                <?php endif; ?>
                <?php $social_link_twitter = ot_get_option( 'twitter' ); ?>
                <?php if( $social_link_twitter !='' ): ?>
                <li><a class="img-circle" href="<?php echo $social_link_twitter; ?>" <?php echo $target; ?>><i class="icon-twitter"></i></a></li>
                <?php endif; ?>
                
                <?php $social_link_google_plus = ot_get_option( 'google_plus' ); ?>
                <?php if( $social_link_google_plus !='' ): ?>
                <li><a class="img-circle" href="<?php echo $social_link_google_plus; ?>" <?php echo $target; ?>><i class="icon-google-plus"></i></a></li>
                <?php endif; ?>
                
                <?php $social_link_rss = ot_get_option( 'rss' ); ?>
                <?php if( $social_link_rss !='' ): ?>
                <li><a class="img-circle" href="<?php echo $social_link_rss; ?>" <?php echo $target; ?>><i class="icon-rss"></i></a></li>
                
                <?php endif; ?>
                <?php $social_link_flickr = ot_get_option( 'flickr' ); ?>
                <?php if( $social_link_flickr !='' ): ?>
                <li><a class="img-circle" href="<?php echo $social_link_flickr; ?>" <?php echo $target; ?>><i class="icon-flickr"></i></a></li>
                <?php endif; ?>
                <?php $social_link_youtube = ot_get_option( 'youtube' ); ?>
                <?php if( $social_link_youtube !='' ): ?>
                <li><a class="img-circle" href="<?php echo $social_link_youtube; ?>" <?php echo $target; ?>><i class="icon-youtube"></i></a></li>
                <?php endif; ?>
                
                <?php $social_link_pinterest = ot_get_option( 'pinterest' ); ?>
                <?php if( $social_link_pinterest !='' ): ?>
                <li><a class="img-circle" href="<?php echo $social_link_pinterest; ?>" <?php echo $target; ?>><i class="icon-pinterest"></i></a></li>
                
                <?php endif; ?>
                <?php $social_link_tumblr = ot_get_option( 'tumblr' ); ?>
                <?php if( $social_link_tumblr !='' ): ?>
                <li><a class="img-circle" href="<?php echo $social_link_tumblr; ?>" <?php echo $target; ?>><i class="icon-tumblr"></i></a></li>
                <?php endif; ?>
                <?php $social_link_dribbble = ot_get_option( 'dribbble' ); ?>
                <?php if( $social_link_dribbble !='' ): ?>
                <li><a class="img-circle" href="<?php echo $social_link_dribbble; ?>" <?php echo $target; ?>><i class="icon-dribbble"></i></a></li>
                <?php endif; ?>
                <?php $social_link_linkedin = ot_get_option( 'linkedin' ); ?>
                <?php if( $social_link_linkedin !='' ): ?>
                <li><a class="img-circle" href="<?php echo $social_link_linkedin; ?>" <?php echo $target; ?>><i class="icon-linkedin"></i></a></li>
                
                <?php endif; ?>
                <?php $social_link_skype = ot_get_option( 'skype' ); ?>
                <?php if( $social_link_skype !='' ): ?>
                <li><a class="img-circle" href="<?php echo $social_link_skype; ?>" <?php echo $target; ?>><i class="icon-skype"></i></a></li>
                <?php endif; ?>
            </ul>
            <?php endif; ?>
          </div><!--end of .col-lg-3-->
          <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
           <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
			  <?php dynamic_sidebar( 'footer-2' ); ?>
              <?php else: ?>
              <?php $args = array('before_widget' =>'<div class="widget">', 'after_widget' => '</div>', 'before_title' => '<h3>', 'after_title' => '</h3>'); ?>
              <?php the_widget( 'WP_Widget_Meta', '', $args ); ?> 
            <?php endif; ?>
          </div><!--end of .col-lg-3-->
          <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
            <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
			  <?php dynamic_sidebar( 'footer-3' ); ?>
              <?php else: ?>
              <?php $args = array('before_widget' =>'<div class="widget">', 'after_widget' => '</div>', 'before_title' => '<h3>', 'after_title' => '</h3>'); ?>
              <?php the_widget( 'WP_Widget_Categories', '', $args ); ?>
            <?php endif; ?>
          </div><!--end of .col-lg-3-->
          <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
            <?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
			  <?php dynamic_sidebar( 'footer-4' ); ?>
              <?php else: ?>
              <?php $args = array('before_widget' =>'<div class="widget">', 'after_widget' => '</div>', 'before_title' => '<h3>', 'after_title' => '</h3>'); ?>
              <?php the_widget( 'WP_Widget_Search', '', $args ); ?>
            <?php endif; ?>
          </div><!--end of .col-lg-3-->
        </div><!--end of .row-->
        <?php endif; ?>
        <div class="row">
          <div class="col-lg-12">
            <ul class="list-inline credit-list">
            <?php
            $disable_footer_list_paypal = ot_get_option( 'disable_footer_list_paypal' );
			$disable_footer_list_visa = ot_get_option( 'disable_footer_list_visa' );
			$disable_footer_list_mastercard = ot_get_option( 'disable_footer_list_mastercard' );
			$disable_footer_list_discover = ot_get_option( 'disable_footer_list_discover' );
			$disable_footer_list_skrill = ot_get_option( 'disable_footer_list_skrill' );
			if( empty( $disable_footer_list_paypal ) ):
			?>
              <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/paypal.png" alt="paypal" /></a></li><?php endif; if( empty( $disable_footer_list_visa ) ): ?><li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/visa.png" alt="visa" /></a></li><?php endif; if( empty( $disable_footer_list_mastercard ) ): ?><li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/mastercard.png" alt="mastercard" /></a></li><?php endif; if( empty( $disable_footer_list_discover ) ): ?><li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/discover.png" alt="discover" /></a></li><?php endif; if( empty( $disable_footer_list_skrill ) ): ?><li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/skrill.png" alt="skrill" /></a></li><?php endif; ?>
            </ul>
          </div><!--end of .col-lg-12-->
        </div>  
      </div> <!--end of .container-->
    </section> <!--end of section #footer-->
<?php
$tracking_code = ot_get_option( 'tracking_code' );
echo $tracking_code;
wp_footer();
?>
</body>
</html>