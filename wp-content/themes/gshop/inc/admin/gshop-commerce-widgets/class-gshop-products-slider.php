<?php
/**
 * Product slider widget
 *
 * @author 		themerox
 * @category 	Widgets
 * @extends 	WP_Widget
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Gshop_WC_Widget_Products_Slider extends WP_Widget {

	var $woo_widget_cssclass;
	var $woo_widget_description;
	var $woo_widget_idbase;
	var $woo_widget_name;

	/**
	 * constructor
	 *
	 * @access public
	 * @return void
	 */
	function Gshop_WC_Widget_Products_Slider() {

		/* Widget variable settings. */
		$this->woo_widget_cssclass = 'woocommerce widget_best_sellers best_sellers_slider ';
		$this->woo_widget_description = __( 'Display a slider of your best selling, top rated, Latest, Featured products on your site.', 'woocommerce' );
		$this->woo_widget_idbase = 'widget_best_sellers_slider';
		$this->woo_widget_name = __( 'Products Slider(Gshop)', 'woocommerce' );

		/* Widget settings. */
		$widget_ops = array( 'classname' => $this->woo_widget_cssclass, 'description' => $this->woo_widget_description );

		/* Create the widget. */
		$this->WP_Widget('best_sellers_slider', $this->woo_widget_name, $widget_ops);

		add_action( 'save_post', array( $this, 'flush_widget_cache' ) );
		add_action( 'deleted_post', array( $this, 'flush_widget_cache' ) );
		add_action( 'switch_theme', array( $this, 'flush_widget_cache' ) );
	}


	/**
	 * widget function.
	 *
	 * @see WP_Widget
	 * @access public
	 * @param array $args
	 * @param array $instance
	 * @return void
	 */
	function widget( $args, $instance ) {
		global $woocommerce;

		$cache = wp_cache_get('widget_best_sellers_slider', 'widget');

		if ( !is_array($cache) ) $cache = array();

		if ( isset($cache[$args['widget_id']]) ) {
			echo $cache[$args['widget_id']];
			return;
		}

		ob_start();
		extract($args);

		$title = apply_filters('widget_title', empty($instance['title']) ? __('Best Sellers', 'woocommerce' ) : $instance['title'], $instance, $this->id_base);
		if ( !$slide_product_type = (int) $instance['slide_product_type'] )
			$slide_product_type = 0;
		if ( !$slide_product = (int) $instance['slide_product'] )
			$slide_product = 4;
		if ( !$number = (int) $instance['number'] )
			$number = 12;
		else if ( $number < 1 )
			$number = 1;
		else if ( $number > 15 )
			$number = 15;

    	if($slide_product_type == 0):
	    	$query_args = array(
	    		'posts_per_page' => $number,
	    		'post_status' 	 => 'publish',
	    		'post_type' 	 => 'product',
	    		'meta_key' 		 => 'total_sales',
	    		'orderby' 		 => 'meta_value_num',
	    		'no_found_rows'  => 1,
	    	);

	    	$query_args['meta_query'] = $woocommerce->query->get_meta_query();
	    	if ( isset( $instance['hide_free'] ) && 1 == $instance['hide_free'] ) :
	    		$query_args['meta_query'][] = array(
				    'key'     => '_price',
				    'value'   => 0,
				    'compare' => '>',
				    'type'    => 'DECIMAL',
				);
	    	endif;
	    	
    	elseif($slide_product_type == 1):
	    	add_filter( 'posts_clauses',  array( $woocommerce->query, 'order_by_rating_post_clauses' ) );

			$query_args = array('posts_per_page' => $number, 'no_found_rows' => 1, 'post_status' => 'publish', 'post_type' => 'product' );

			$query_args['meta_query'] = $woocommerce->query->get_meta_query();

			if ( isset( $instance['hide_free'] ) && 1 == $instance['hide_free'] ) :
	    		$query_args['meta_query'][] = array(
				    'key'     => '_price',
				    'value'   => 0,
				    'compare' => '>',
				    'type'    => 'DECIMAL',
				);
	    	endif;

		elseif($slide_product_type == 2):
			$query_args = array('posts_per_page' => $number, 'no_found_rows' => 1, 'post_status' => 'publish', 'post_type' => 'product' );

			$query_args['meta_query'] = $woocommerce->query->get_meta_query();
			$query_args['meta_query'][] = array(
				'key' => '_featured',
				'value' => 'yes'
			);		
		else:
			$query_args = array('posts_per_page' => $number, 'no_found_rows' => 1, 'post_status' => 'publish', 'post_type' => 'product');	
			if ( isset( $instance['hide_free'] ) && 1 == $instance['hide_free'] ) {
	    		$query_args['meta_query'][] = array(
				    'key'     => '_price',
				    'value'   => 0,
				    'compare' => '>',
				    'type'    => 'DECIMAL',
				);
	    	}

		endif;

		

		$r = new WP_Query($query_args);

		if ( $r->have_posts() ) {

			echo $before_widget;

			if ( $title )
				echo $before_title . $title . $after_title;

			echo '<ul class="product_slider_widget"><li>';

			$count = 0;
			while ( $r->have_posts()) {
				$r->the_post();
				global $product;
				
				if( (($count%$slide_product)== 0) && ( $count != 0)) echo '</li><li>';
				echo '
					<div class="product-thumb"><a href="' . get_permalink() . '">
						' . ( has_post_thumbnail() ? get_the_post_thumbnail( $r->post->ID, 'shop_thumbnail' ) : woocommerce_placeholder_img( 'shop_thumbnail' ) ) . ' 
					</a><div class="product-info"><a href="' . get_permalink() . '">' .get_the_title().'</a>' . $product->get_price_html() . '
				</div></div>';

				$count++;
				
			}

			echo '</li></ul><div class="clearfix"></div>';

			echo $after_widget;
		}

		wp_reset_postdata();

		$content = ob_get_clean();

		if ( isset( $args['widget_id'] ) ) $cache[$args['widget_id']] = $content;

		echo $content;

		wp_cache_set('widget_best_sellers_slider', $cache, 'widget');
	}


	/**
	 * update function.
	 *
	 * @see WP_Widget->update
	 * @access public
	 * @param array $new_instance
	 * @param array $old_instance
	 * @return array
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['slide_product_type'] = (int) $new_instance['slide_product_type'];
		$instance['slide_product'] = (int) $new_instance['slide_product'];
		$instance['number'] = (int) $new_instance['number'];
		$instance['hide_free'] = 0;

		if ( isset( $new_instance['hide_free'] ) ) {
			$instance['hide_free'] = 1;
		}

		$this->flush_widget_cache();

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['widget_best_sellers_slider']) ) delete_option('widget_best_sellers_slider');

		return $instance;
	}


	/**
	 * flush_widget_cache function.
	 *
	 * @access public
	 * @return void
	 */
	function flush_widget_cache() {
		wp_cache_delete( 'widget_best_sellers_slider', 'widget' );
	}


	/**
	 * form function.
	 *
	 * @see WP_Widget->form
	 * @access public
	 * @param array $instance
	 * @return void
	 */
	function form( $instance ) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		if ( !isset($instance['slide_product_type']) || !$slide_product_type = (int) $instance['slide_product_type'] ) $slide_product_type = 0;
		if ( !isset($instance['slide_product']) || !$slide_product = (int) $instance['slide_product'] ) $slide_product = 4;
		if ( !isset($instance['number']) || !$number = (int) $instance['number'] ) $number = 8;
		$hide_free_checked = ( isset( $instance['hide_free'] ) && 1 == $instance['hide_free'] ) ? ' checked="checked"' : '';

		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:', 'woocommerce' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('slide_product_type'); ?>"><?php _e( 'Slider Product type', 'woocommerce' ); ?></label>
		<select id="<?php echo esc_attr( $this->get_field_id('slide_product_type') ); ?>" name="<?php echo esc_attr( $this->get_field_name('slide_product_type') ); ?>">
			<?php 
				$typeArr = array( 'Best Selling Products', 'Top Rated Products', 'Featured Products', 'Recent Products');
				foreach( $typeArr as $key => $type ){
					$selected = (esc_attr( $slide_product_type ) == $key )? ' selected="selected"' : '';
					echo '<option value="'.$key.'"'.$selected.'>'.$type.'</option>';
				}
			?>
		</select>
		

		<p><label for="<?php echo $this->get_field_id('slide_product'); ?>"><?php _e( 'Number of products for each slide:', 'woocommerce' ); ?></label>
		<input id="<?php echo esc_attr( $this->get_field_id('slide_product') ); ?>" name="<?php echo esc_attr( $this->get_field_name('slide_product') ); ?>" type="text" value="<?php echo esc_attr( $slide_product ); ?>" size="3" /></p>

		<p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e( 'Number of products to show:', 'woocommerce' ); ?></label>
		<input id="<?php echo esc_attr( $this->get_field_id('number') ); ?>" name="<?php echo esc_attr( $this->get_field_name('number') ); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" size="3" /></p>

		<p><input id="<?php echo esc_attr( $this->get_field_id('hide_free') ); ?>" name="<?php echo esc_attr( $this->get_field_name('hide_free') ); ?>" type="checkbox"<?php echo $hide_free_checked; ?> />
		<label for="<?php echo $this->get_field_id('hide_free'); ?>"><?php _e( 'Hide free products', 'woocommerce' ); ?></label></p>

		<?php
	}
}