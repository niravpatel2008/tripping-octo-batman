<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, gshop already
 * has tag.php for Tag archives, category.php for Category archives, and
 * author.php for Author archives.
 *
 *
 * @package themerox
 * @subpackage gshop
 */
 
get_header(); ?>

	<div class="content-main">
		<div class="bredcrumbs">
			<?php $breadcrumbs_menu = ot_get_option( 'breadcrumbs_menu', array() ); ?>
    		<?php if ( empty( $breadcrumbs_menu ) && function_exists('gshop_breadcrumbs') ) gshop_breadcrumbs(); ?>
    	</div><!--.bredcrumbs-->
        <?php
        if ( is_day() ) :
		  printf( __( 'Daily Archives: %s', 'gshop' ), '<span>' . get_the_date() . '</span>' );
		elseif ( is_month() ) :
		  printf( __( 'Monthly Archives: %s', 'gshop' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'gshop' ) ) . '</span>' );
		elseif ( is_year() ) :
		  printf( __( 'Yearly Archives: %s', 'gshop' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'gshop' ) ) . '</span>' );
		else :
		_e( 'Archives', 'gshop' );
		endif;
		?>
		<?php while ( have_posts() ) : the_post(); ?>
        <h3><?php the_title(); ?></h3>
        <?php the_content(); ?>
        <?php comments_template( '', true ); ?>
        <?php endwhile; // end of the loop. ?>
	</div>
<?php get_footer(); ?>