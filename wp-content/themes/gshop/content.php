<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage gshop
 * @since gshop 1.0
 */
?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'blog' ); ?>> <!--.last-->
  
     <?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
     <div class="blog-thumbnail">
       <?php if( is_single() ):?>
	     <?php the_post_thumbnail( 'large' ); ?>
	   <?php elseif( is_archive() ): ?>
		 <?php the_post_thumbnail( 'blog-thumb' ); ?>
	   <?php else: ?>
		 <?php the_post_thumbnail( 'blog-thumb' ); ?>
       <?php endif; ?>
       <?php if( !is_single() ): ?>
    <?php $comments_count = wp_count_comments( $post->ID ); ?>
    <ul class="post-meta-blog list-inline"><li><?php the_author(); ?></li><li><?php echo get_the_date( 'd M Y' ); ?></li><li><?php comments_number( 'no comments', '1 comment', '% comments' ); ?></li></ul>
    
    <?php endif; ?>
    </div>
    <?php else: ?>
    <?php $comments_count = wp_count_comments( $post->ID ); ?>
    <?php $no_thumb_meta = '<div class="blog-thumbnail no-thumbnail-blog">
    <ul class="post-meta-blog no-thumbnail list-inline"><li>'.get_the_author().'</li><li>'.get_the_date( 'd M Y' ).'</li><li>'.get_comments_number( 'no comments', '1 comment', '% comments' ).'</li></ul></div>'; ?>
    <?php endif; ?>

  <?php if( !is_single() ): ?>
    <h3><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
    <?php 
	if( !has_post_thumbnail() ):
	echo $no_thumb_meta;
	endif;
	?>
  <?php else: ?>
    <h2><?php the_title(); ?></h2>
  <?php endif; ?>
  <?php if( is_single() ): ?>
  <div class="post-meta">
     <p><span class="author"><i class="icon-user"></i><a href="<?php echo get_the_author_link(); ?>"><?php the_author(); ?></a></span> <span class="time"><i class="icon-time"></i><?php echo get_the_date( 'l d F Y G:i' ); ?></span></p>
   </div>
   <?php endif; ?>
  <?php $content = get_the_content(); ?>
  <?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'gshop' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
  <p><?php echo ( is_single() )? $content : wp_trim_words($content, 100); ?></p>
  <?php if( !is_single() ): ?>
  <a href="<?php the_permalink(); ?>" class="more-button align-left"><?php echo __( 'More', 'gshop' ); ?></a>
  <div class="title-border-blog"></div>
  <?php else: ?>
  <div class="title-border-single"></div>
  <?php endif; ?>
  <?php if( is_single() ): ?>
  <?php
  $posttags = get_the_tags();
  if ( $posttags ): ?>
  <div class="blog-tags">
    <ul class="tags list-inline">
     <span><?php echo __( 'Tags:', 'gshop' ); ?></span>
     <?php foreach( $posttags as $tag ): ?>
      <li><a href="<?php echo get_tag_link($tag->term_id); ?>"><?php echo $tag->name; ?></a></li>
      <?php endforeach; ?>
    </ul>
  </div><!--.blog-tags-->
  <?php endif; ?>
  <?php endif; ?>
  <?php $social_sharing_box = ot_get_option( 'social_sharing_box' ); ?>
    <?php $permalink = get_permalink(); ?>
    <?php if( is_single() ): ?>
	<?php if( empty( $social_sharing_box ) && function_exists( 'gshop_social_sharing_box' ) ): gshop_social_sharing_box( $permalink ); endif; ?>
    <?php endif; ?>
</div><!--.blog post-->