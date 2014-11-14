<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>
	<div class="comments">
	<?php if ( have_comments() ) : ?>
      <div class="title-content">
        <h3 class="title"><?php echo __( 'Comments', 'gshop' ); ?></h3>
      </div>
		<ul class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ul',
									'callback' => 'gshop_comment'
				) );
			?>
		</ul><!-- .comment-list -->

		<?php
			// Are there comments to navigate through?
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
		?>
		<nav class="navigation comment-navigation" role="navigation">
			<h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'gshop' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'gshop' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'gshop' ) ); ?></div>
		</nav><!-- .comment-navigation -->
		<?php endif; // Check for comment navigation ?>

		<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="no-comments"><?php _e( 'Comments are closed.' , 'gshop' ); ?></p>
		<?php endif; ?>

	<?php endif; // have_comments() ?>
</div><!--.comments-->

<?php gshop_comment_form(); ?>