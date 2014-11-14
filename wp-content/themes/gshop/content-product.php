<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;
	
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 3 );

$column = '';
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 3 );
	$column = 'column_'.$woocommerce_loop['columns'];
if(is_archive()){
	// Store column count for displaying the grid
	$number_of_column_shop_page = ot_get_option( 'number_of_column_shop_page', '');
	if( !empty($number_of_column_shop_page) ){
		if ( empty( $woocommerce_loop['columns'] ) )
			$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', $number_of_column_shop_page );
			$column = 'column_'.$number_of_column_shop_page;
		} else {
			if ( empty( $woocommerce_loop['columns'] ) )
			$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 3 );
			$column = 'column_3';
		}
	}

// Ensure visibility
if ( ! $product || ! $product->is_visible() )
	return;

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )
	$classes[] = 'first';
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
	$classes[] = 'last';
	
	$classes[] = $column;
?>
<li <?php post_class( $classes ); ?>>

	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>

	<a href="<?php the_permalink(); ?>">

		<?php
			/**
			 * woocommerce_before_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_show_product_loop_sale_flash - 10
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 */
			do_action( 'woocommerce_before_shop_loop_item_title' );
		?>
		</a>
        <div class="product-loop-summery">
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

		<?php
			/**
			 * woocommerce_after_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_template_loop_price - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item_title' );
		?>
        </div>

	

	<div class="product-loop-cart"><?php do_action( 'woocommerce_after_shop_loop_item' ); ?></div>

</li>