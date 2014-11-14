<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 */

?>
  <?php get_header(); ?>
  <?php if ( have_posts() ) : ?>
  <div class="content-main">
      <div class="row">
      <div class="col-lg-12">
      <div class="bredcrumbs">
			  <?php $breadcrumbs_menu = ot_get_option( 'breadcrumbs_menu', array() ); ?>
              <?php if ( empty( $breadcrumbs_menu ) && function_exists('gshop_breadcrumbs') ) gshop_breadcrumbs(); ?>
            </div><!--.bredcrumbs-->
      </div>
      <?php $default_sidebar_position = ot_get_option( 'default_sidebar_position', array() ); ?>
       <?php $product_sidebar_option_single = ot_get_option( 'product_sidebar_option_single', array() ); ?>
       <?php if( $product_sidebar_option_single == 'hide' && is_singular( 'product' ) ): $class = 'col-lg-12';
       else: $class = 'col-lg-9';
	   endif;
	   if( is_singular( 'product' ) ):
	   if( $product_sidebar_option_single != 'hide' ):
       if( $default_sidebar_position != 'right' ): ?>
        <div class="col-lg-3">
          <?php get_sidebar( 'shop' ); ?>
        </div><!--.col-lg-3-->
        <?php endif;
		endif;
		else:
		if( $default_sidebar_position != 'right' ): ?>
        <div class="col-lg-3">
          <?php get_sidebar( 'shop' ); ?>
        </div><!--.col-lg-3-->
        <?php endif;		 
		endif; ?>        
        <div class="<?php echo $class; ?>">
          <?php woocommerce_content(); ?>
          <?php $allow_comments_on_pages = ot_get_option( 'allow_comments_on_pages' ); ?>
          <?php if( !empty( $allow_comments_on_pages ) ): ?>
          	<?php comments_template( '', true ); ?>
          <?php endif; ?> 
        </div><!--.col-lg-9-->
        <?php if( is_singular( 'product' ) ):
		   if( $product_sidebar_option_single != 'hide' ):
		   if( $default_sidebar_position == 'right' ): ?>
			<div class="col-lg-3">
			  <?php get_sidebar( 'shop' ); ?>
			</div><!--.col-lg-3-->
			<?php endif;
			endif;
			else:
			if( $default_sidebar_position == 'right' ): ?>
			<div class="col-lg-3">
			  <?php get_sidebar( 'shop' ); ?>
			</div><!--.col-lg-3-->
			<?php endif;		 
		endif; ?>      
      </div><!--.row-->    
  </div>
<?php endif; ?>   
<?php get_footer(); ?>