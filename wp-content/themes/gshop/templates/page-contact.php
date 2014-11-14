<?php
/**
 * Template Name: Page Contact
 *
 * Description: Gshop loves thepage with sidebar look as much as
 * you do. Use this page template to show the sidebar in contact page.
 *
 */
?>
<?php get_header(); ?>
  <?php while ( have_posts() ) : the_post(); ?>
  <div class="content-main">
      <div class="row">
      <div class="col-lg-12">
      <div class="bredcrumbs">
			  <?php $breadcrumbs_menu = ot_get_option( 'breadcrumbs_menu', array() ); ?>
              <?php if ( empty( $breadcrumbs_menu ) && function_exists('gshop_breadcrumbs') ) gshop_breadcrumbs(); ?>
            </div><!--.bredcrumbs-->
      </div>
      <?php $default_sidebar_position = ot_get_option( 'default_sidebar_position', array() ); ?>
          <?php if( $default_sidebar_position != 'right' ): ?>
      <div class="col-lg-3">
        <?php get_sidebar( 'contact' ); ?>
      </div><!--.col-lg-3-->
      <?php endif; ?>
        <div class="col-lg-9">
            <div class="title-content"><h3 class="title"><?php the_title(); ?></h3></div>
          <?php the_content(); ?>
          <?php $allow_comments_on_pages = ot_get_option( 'allow_comments_on_pages' ); ?>
          <?php if( !empty($allow_comments_on_pages) ): ?>
          	<?php comments_template( '', true ); ?>
          <?php endif; ?> 
        </div><!--.col-lg-9-->
        <?php if( $default_sidebar_position == 'right' ): ?>
      <div class="col-lg-3">
        <?php get_sidebar('contact'); ?>
      </div><!--.col-lg-3-->
      <?php endif; ?>
        
      </div><!--.row-->    
  </div>
<?php endwhile; ?>    
<?php get_footer(); ?>