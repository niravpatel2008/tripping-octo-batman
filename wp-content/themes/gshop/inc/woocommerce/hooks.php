<?php
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );

add_action('woocommerce_single_product_summary', 'gshop_template_single_title', 5);
add_action( 'woocommerce_single_product_summary', 'gshop_template_single_price', 10 );
add_action( 'woocommerce_single_product_summary', 'gshop_template_single_sharing', 50 );
add_action( 'woocommerce_before_shop_loop', 'gshop_result_count', 20 );
add_action( 'woocommerce_before_shop_loop', 'gshop_catalog_ordering', 30 );
add_action( 'woocommerce_before_shop_loop_item_title', 'gshop_show_product_loop_sale_flash', 10 );
add_action( 'woocommerce_before_single_product_summary', 'gshop_show_product_sale_flash', 10 );

function gshop_template_single_title() {
	?>
    <div class="title-content"><h2 itemprop="name" class="product_title entry-title"><?php the_title(); ?>
    <span class="previous"><?php previous_post_link('%link'); ?></span><span class="next"><?php next_post_link('%link'); ?></span>
    
    </h2></div>
    <?php
}

function gshop_template_single_price() {
	global $post, $product;
	?>
	<div itemprop="offers" itemscope itemtype="http://schema.org/Offer" class="single-price">
		<p itemprop="price" class="price"><?php echo $product->get_price_html(); ?></p>
        <div class="single-rating"><?php echo $product->get_rating_html(); ?></p></div>
		<meta itemprop="priceCurrency" content="<?php echo get_woocommerce_currency(); ?>" />
		<link itemprop="availability" href="http://schema.org/<?php echo $product->is_in_stock() ? 'InStock' : 'OutOfStock'; ?>" />
	</div>
	<?php
}

function gshop_template_single_sharing() {
	?>
    <div class="product-share">
        <ul class="list-inline">
        <li><span><?php echo _e( 'Share: ', 'gshop' ); ?> </span></li>
        <!--Facebook-->
        <?php $facebook_box = get_post_meta(get_the_ID(), 'facebook_box', true ); ?>
        <?php if( empty ($facebook_box) ): ?>
        	<li><a class="facebook" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>" title="Share this post on Facebook!" onclick="window.open(this.href); return false;"><i class="icon-facebook"></i></a></li>
            <?php endif; ?>
         <?php $twitter_box = get_post_meta(get_the_ID(), 'twitter_box', true ); ?>
        <?php if( empty ($twitter_box) ): ?>
        	<li><a class="twitter" href="http://twitter.com/home?status=Reading: <?php the_permalink(); ?>" title="Share this post on Twitter!" target="_blank"><i class="icon-twitter"></i></a></li>
            <?php endif; ?>
        <!--Google Plus-->
        <?php $google_plus_box = get_post_meta(get_the_ID(), 'google_plus_box', true ); ?>
        <?php if( empty ($google_plus_box) ): ?>
        	<li><a class="google-plus" target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="icon-google-plus"></i></a></li>
            <?php endif; ?>
        <?php $rss_box = get_post_meta(get_the_ID(), 'rss_box', true ); ?>
        <?php if( empty ($rss_box) ): ?>
        	<li><a class="rss" target="_blank" href="<?php the_permalink(); ?>"><i class="icon-rss"></i></a></li>
            <?php endif; ?>
        </ul>
    </div>
    <?php
}

function gshop_result_count() {
	global $woocommerce, $wp_query;

if ( ! woocommerce_products_will_display() )
	return;
?>
<div class="product-result-count"><p class="woocommerce-result-count">
	<?php
	$paged    = max( 1, $wp_query->get( 'paged' ) );
	$per_page = $wp_query->get( 'posts_per_page' );
	$total    = $wp_query->found_posts;
	$first    = ( $per_page * $paged ) - $per_page + 1;
	$last     = min( $total, $wp_query->get( 'posts_per_page' ) * $paged );

	if ( 1 == $total ) {
		_e( 'Showing the single result', 'woocommerce' );
	} elseif ( $total <= $per_page || -1 == $per_page ) {
		printf( __( 'Showing all %d results', 'woocommerce' ), $total );
	} else {
		printf( _x( 'Showing %1$d&shy;%2$d of %3$d results', '%1$d = first, %2$d = last, %3$d = total', 'woocommerce' ), $first, $last, $total );
	}
	?>
</p>
    <?php
}

function gshop_catalog_ordering() {
	global $woocommerce, $wp_query;

if ( 1 == $wp_query->found_posts || ! woocommerce_products_will_display() )
	return;
?>
<form class="woocommerce-ordering" method="get">
	<select name="orderby" class="orderby">
		<?php
			$catalog_orderby = apply_filters( 'woocommerce_catalog_orderby', array(
				'menu_order' => __( 'Default sorting', 'woocommerce' ),
				'popularity' => __( 'Sort by popularity', 'woocommerce' ),
				'rating'     => __( 'Sort by average rating', 'woocommerce' ),
				'date'       => __( 'Sort by newness', 'woocommerce' ),
				'price'      => __( 'Sort by price: low to high', 'woocommerce' ),
				'price-desc' => __( 'Sort by price: high to low', 'woocommerce' )
			) );

			if ( get_option( 'woocommerce_enable_review_rating' ) == 'no' )
				unset( $catalog_orderby['rating'] );

			foreach ( $catalog_orderby as $id => $name )
				echo '<option value="' . esc_attr( $id ) . '" ' . selected( $orderby, $id, false ) . '>' . esc_attr( $name ) . '</option>';
		?>
	</select>
	<?php
		// Keep query string vars intact
		foreach ( $_GET as $key => $val ) {
			if ( 'orderby' == $key )
				continue;
			
			if (is_array($val)) {
				foreach($val as $innerVal) {
					echo '<input type="hidden" name="' . esc_attr( $key ) . '[]" value="' . esc_attr( $innerVal ) . '" />';
				}
			
			} else {
				echo '<input type="hidden" name="' . esc_attr( $key ) . '" value="' . esc_attr( $val ) . '" />';
			}
		}
	?>
</form>
</div>
<?php
}

/*
loop page products sale options
*/
function gshop_show_product_loop_sale_flash(){
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $product;
?>
<?php if ($product->is_on_sale()) : ?>

	<?php echo apply_filters('woocommerce_sale_flash', '<span class="sale-product-holder"><span class="onsale">'.__( 'Sale!', 'woocommerce' ).'</span></span>', $post, $product); ?>

<?php endif; ?>
<?php
	
}

/*
single page products sale option
*/
function gshop_show_product_sale_flash() {
	global $post, $product;
?>
<?php if ($product->is_on_sale()) : ?>

	<?php echo apply_filters('woocommerce_sale_flash', '<span class="sale-product-holder"><span class="onsale">'.__( 'Sale!', 'woocommerce' ).'</span></span>', $post, $product); ?>

<?php endif;
}


/*function woocommerce_content() {

	if ( is_singular( 'product' ) ) {

		while ( have_posts() ) : the_post();

			woocommerce_get_template_part( 'content', 'single-product' );

		endwhile;

	} else { ?>

		<?php do_action( 'woocommerce_archive_description' ); ?>

		<?php if ( have_posts() ) : ?>

			<?php do_action('woocommerce_before_shop_loop'); ?>

			<?php woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php woocommerce_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

			<?php do_action('woocommerce_after_shop_loop'); ?>

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php woocommerce_get_template( 'loop/no-products-found.php' ); ?>

		<?php endif;

	}
}*/
?>