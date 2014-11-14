<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage gshop
 * @since Tgshop 1.0
 */

get_header(); ?>
  <div class="content-main">
      <div class="bredcrumbs">
        <h1 class="align-center"><?php echo _e( 'Page Not Found!', 'gshop' ); ?></h1>
      </div><!--.bredcrumbs-->
		<h2><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'gshop' ); ?></h2>
        <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'gshop' ); ?></p>
		<?php get_search_form(); ?>
  </div>
<?php get_footer(); ?>