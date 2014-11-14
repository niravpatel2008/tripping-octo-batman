<?php
/**
 * The sidebar containing the blog widget area.
 *
 * If no active widgets in sidebar, let's hide it completely.
 *
 */
?>
<div class="sidebar">
  <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
  <?php else: ?>
  <?php $args = 'before_widget = <div class="widget">&after_widget=</div>&before_title=<div class="title-content"><h3 class="title">&after_title=</h3></div>'; ?>
  <?php the_widget( 'WP_Widget_Archives', '', $args ); ?> 
  <?php the_widget( 'WP_Widget_Pages', '', $args ); ?> 
<?php endif; ?>
</div><!--.sidebar-->