<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
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
		<?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <?php 
				if($post->post_type == 'product'){
					echo '<ul class="products">';
					get_template_part( 'content', 'product' );
					echo '</ul>';
				}
				else
					get_template_part( 'content', get_post_format() ); 
				?>
            <?php endwhile; ?>
            <?php if( function_exists( 'gshop_numeric_posts_nav' ) ) { gshop_numeric_posts_nav(); } ?>
        <?php else : ?>
        <div id="post-0" class="post post-0">
            <h3><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'gshop' ); ?></h3>
            <?php get_search_form(); ?>
        </div>
        <?php endif; ?>
       </div> 
       <?php if( $default_sidebar_position == 'right' ): ?>
      <div class="col-lg-3">
        <?php get_sidebar(); ?>
      </div><!--.col-lg-3-->
      <?php endif; ?>
	</div><!--.row-->
  </div><!--.content-->
<?php get_footer(); ?>