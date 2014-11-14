<?php
/**
 * The template for displaying Tag pages.
 *
 * Used to display archive-type pages for posts in a tag.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage gshop
 * @since gshop 1.0
 */

get_header(); ?>
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
        <h3><?php printf( __( 'Tag Archives: %s', 'gshop' ), single_tag_title( '', false ) ); ?></h3>
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