<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 */
?>
<?php get_header(); ?>  
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
        <?php get_sidebar(); ?>
      </div><!--.col-lg-3-->
      <?php endif; ?>
      <div class="col-lg-9">
        <?php if ( have_posts() ) : ?>
          <?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'content', get_post_format() ); ?>
          <?php endwhile; ?>
        <?php else : ?>
          <?php get_template_part( 'content', 'none' ); ?>
        <?php endif; ?>
        <?php comments_template( '', true ); ?>
      </div><!--.col-lg-9-->
      <?php if( $default_sidebar_position == 'right' ): ?>
      <div class="col-lg-3">
        <?php get_sidebar(); ?>
      </div><!--.col-lg-3-->
      <?php endif; ?>
    </div><!--.row-->
  </div><!--.content-->     
<?php get_footer(); ?>