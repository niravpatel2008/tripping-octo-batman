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

get_header(); ?>
  <?php while ( have_posts() ) : the_post(); ?>
    <div class="content-main">
      <div class="bredcrumbs">
          <?php $breadcrumbs_menu = ot_get_option( 'breadcrumbs_menu', array() ); ?>
          <?php if ( empty( $breadcrumbs_menu ) && function_exists('gshop_breadcrumbs') ) gshop_breadcrumbs(); ?>
      </div><!--.bredcrumbs-->
      <?php the_content(); ?>
            
      <?php $allow_comments_on_pages = ot_get_option( 'allow_comments_on_pages' ); ?>
		  <?php if( !empty($allow_comments_on_pages) ): ?>
        <?php comments_template( '', true ); ?>
        <?php endif; ?> 
    </div>
  <?php endwhile; // end of the loop. ?>
       
<?php get_footer(); ?>