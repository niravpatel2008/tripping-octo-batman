<?php
function rox_portfolio_template($atts=array()){
		
		global $wpdb, $post;
		$atts = shortcode_atts(
			array(
				'column' => 4,
				'portfolio_category' => '',
				'showposts' => -1
			), $atts);

		$html = '<div class="content">
				<div class="portfolio-column4">
				  <div class="title-content">
					<h2 class="title">Column ' . $atts['column'] . '</h2>
					<div class="title-border"><span></span></div>
				  </div>';
		if($atts['portfolio_category'] == ''){
	    	$html .= '<nav id="portfolio-filter" class="primary clearfix filtarable">';	        
	        $html .= '<ul id="filters" data-option-key="filter" class="option-set clearfix list-inline">';
			$html .= '<li><a href="#filter" data-option-value="*" class="selected">All</a></li>';
	        $portfolio_category = get_terms('portfolio_category'); 
			foreach ($portfolio_category as $category) {
				$html .= '<li><a href="#filter" data-option-value=".' . $category->slug . '" title="" class="">' . $category->name . '</a></li>';
			}
		    $html .= '</ul>';
		    $html .= '</nav>';
		}
	    
	    $html .= '<ul id="og-grid" class="og-grid portfolio">';
	    
		$args = array(
			'post_type' => 'portfolio',
			'portfolio_category' => $atts['portfolio_category'],
			'showposts'	=> $atts['showposts']
		);
		$query = new WP_Query( $args );
	    $transitions = array('transition', 'post-transition', 'alkali', 'lanthanoid', 'halogen', 'alkaline-earth');
	    if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				if ( has_post_thumbnail()) {
				   $small_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'portfolio-thumb');	
				   $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'portfolio-large');							  
				 }

				 if($atts['column'] < 3 )$small_image_url = $large_image_url;
	
				$terms = wp_get_post_terms( $post->ID, 'portfolio_category' );
				$catclass = '';
				foreach( $terms as $term ) $catclass .= ' '.$term->slug;
				$project_url = get_post_meta($post->ID, 'portfolio_project_url', true);

				$terms = wp_get_post_terms( $post->ID, 'portfolio_skills' );
				$skill = array();
				foreach( $terms as $term ) $skill[] .= $term->slug;
				$video_url = get_post_meta($post->ID, 'portfolio_video_url_for_light_box', true);
				 
	            $html .= '<li class="transition entry'.$catclass.' col'.$atts['column'].' single-posts">';
				$html .= '<div class="post-thumbnail element" data-link="' .get_permalink(). '" data-zoom="' . $large_image_url[0] . '"><img src="' . $small_image_url[0] . '" alt="' . get_the_title() . '" /></div>
							<div class="content-bottom-single-posts">
							  <h3>' . get_the_title() . '</h3>
							  <p>' .wp_trim_words(get_the_content(), 15). '</p>
							</div>';	            
	            $html .= '</li>';
	            
	    	}
		} 
	    $html .= '</ul></div></div>';
		return $html;
		wp_reset_postdata();
}
add_shortcode('rox_portfolio', 'rox_portfolio_template');

?>