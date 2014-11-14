<?php
/**
 * The sidebar containing the page with sidebar template Column widget area.
 *
 * If no active widgets in sidebar, let's hide it completely.
 *
 */
?>

<div class="sidebar">
	<?php if( is_active_sidebar( 'sidebar-4' ) ): ?>
    <?php dynamic_sidebar( 'sidebar-4' ); ?>
    <?php else: ?>
    <div class="widget">
    <div class="title-content">
      <h3 class="title"><?php echo _e('Search', 'gshop' ); ?></h3>
    </div>
    <?php the_widget('WP_Widget_Search'); ?>
    </div><!--.widget-->
    <?php $args = array('before_widget' =>'<div class="widget">', 'after_widget' => '</div>', 'before_title' => '<div class="title-content"><h3 class="title">', 'after_title' => '</h3></div>'); ?>
    <?php the_widget( 'WP_Widget_Meta', '', $args ); ?> 
	<?php endif; ?>                     
</div> <!--.sidebar-->

	