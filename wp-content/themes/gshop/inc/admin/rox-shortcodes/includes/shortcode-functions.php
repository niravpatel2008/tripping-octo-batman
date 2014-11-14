<?php
/**
 * This file has all the main shortcode functions
 * @package rox Shortcodes Plugin
 */


/*
 * Allow shortcodes in widgets
 */
add_filter('widget_text', 'do_shortcode');

///////////////////////Video Embed///////////////////////////

/*
 * Youtube Shortcodes
 */

if( !function_exists('rox_oshortcode_youtube') ) {
	function rox_oshortcode_youtube($atts) {
		$atts = shortcode_atts(
			array(
				'id' => '',
				'width' => 600,
				'height' => 360
			), $atts);
			$tagname = 'frame';
			$out = '<div style="max-width:'.$atts['width'].'px;max-height:'.$atts['height'].'px;"><div class="video-shortcode"><i'.$tagname.' title="YouTube video player" width="' . $atts['width'] . '" height="' . $atts['height'] . '" src="http://www.youtube.com/embed/' . $atts['id'] . '" frameborder="0" allowfullscreen></i'.$tagname.'></div></div>';
			return $out;
	}
	add_shortcode('rox_youtube', 'rox_oshortcode_youtube');
}

/*
 * Vimeo Shortcodes
 */
if( !function_exists('rox_shortcode_vimeo') ) {
	function rox_shortcode_vimeo($atts) {
		$atts = shortcode_atts(
			array(
				'id' => '',
				'width' => 600,
				'height' => 360
			), $atts);
		$tagname = 'frame';
		$out = '<div style="max-width:'.$atts['width'].'px;max-height:'.$atts['height'].'px;"><div class="video-shortcode"><i'.$tagname.' src="http://player.vimeo.com/video/' . $atts['id'] . '" width="' . $atts['width'] . '" height="' . $atts['height'] . '" frameborder="0"></i'.$tagname.'></div></div>';
		
			return $out;
	}
	add_shortcode('rox_vimeo', 'rox_shortcode_vimeo');
}
	
/*
 * Souncloud Shortcodes
 */
if( !function_exists('rox_shortcode_soundcloud') ) {
	function rox_shortcode_soundcloud($atts) {
		$atts = shortcode_atts(
			array(
				'url' => '',
				'width' => '100%',
				'height' => 81,
				'comments' => 'true',
				'auto_play' => 'true',
				'color' => 'ff7700',
			), $atts);
			
			$tagname = 'frame';
			$out = '<i'.$tagname.' width="'.$atts['width'].'" height="'.$atts['height'].'" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=' . urlencode($atts['url']) . '&amp;show_comments=' . $atts['comments'] . '&amp;auto_play=' . $atts['auto_play'] . '&amp;color=' . $atts['color'] . '"></i'.$tagname.'>';
			
			return $out;
			
	}
	add_shortcode('rox_soundcloud', 'rox_shortcode_soundcloud');	
}

///////////////////////End Video Embed///////////////////////////
/*
 * Fix Shortcodes
 */
if( !function_exists('rox_fix_shortcodes') ) {
	function rox_fix_shortcodes($content){   
		$array = array (
			'<p>['		=> '[', 
			']</p>'		=> ']', 
			']<br />'	=> ']'
		);
		$content = strtr($content, $array);
		return $content;
	}
	add_filter('the_content', 'rox_fix_shortcodes');
}


/*
 * Clear Floats
 */
if( !function_exists('rox_clear_floats_shortcode') ) {
	function rox_clear_floats_shortcode() {
	   return '<div class="rox-clear-floats"></div>';
	}
	add_shortcode( 'rox_clear_floats', 'rox_clear_floats_shortcode' );
}


/*
 * Skillbars
 */
if( !function_exists('rox_callout_shortcode') ) {
 function rox_callout_shortcode( $atts, $content = NULL  ) {  
  extract( shortcode_atts( array(
   'caption'    => '',
   'button_text'   => '',
   'button_color'   => '#E34130',
   'button_url'   => 'http://www.ThemeRox.com',
   'button_rel'   => 'nofollow',
   'button_target'   => 'blank',
   'button_border_radius' => '',
   'class'     => '',
   'icon_left'    => '',
   'icon_right'   => ''
  ), $atts ) );
  
  $border_radius_style = 'style="background: '.$button_color.'!important; border-radius:'. $button_border_radius .'; background-color:'.$button_color.'!important;"' ;
  $output = '<div class="rox-callout animation scaleUp '. $class .'">';
  $output .= '<div class="row"><div class="col-lg-9"><div class="rox-callout-caption">';
   if ( $icon_left ) $output .= '<span class="rox-callout-icon-left icon-'. $icon_left .'"></span>';
   $output .= '<p>'.do_shortcode ( $content ).'</p>';
   if ( $icon_right ) $output .= '<span class="rox-callout-icon-right icon-'. $icon_right .'"></span>';
  $output .= '</div></div>'; 
  if ( $button_text !== '' ) {
   $output .= '<div class="col-lg-3"><div class="rox-callout-button">';
    $output .='<a href="'. $button_url .'" title="'. $button_text .'" target="_'. $button_target .'" class="rox-button '.$button_color .'" '. $border_radius_style .'><span class="rox-button-inner">'. $button_text .'</span></a>';
   $output .='</div></div>';
  }
  $output .= '</div></div>';
  
  return $output;
 }
 add_shortcode( 'rox_callout', 'rox_callout_shortcode' );
}

/*
 * Skillbars
 * @since v1.3
 */
if( !function_exists('rox_skillbar_shortcode') ) {
	function rox_skillbar_shortcode( $atts  ) {		
		extract( shortcode_atts( array(
			'title'	=> '',
			'percentage'	=> '100',
			'color'	=> '#6adcfa',
			'class'	=> '',
			'show_percent'	=> 'true'
		), $atts ) );
		
		// Enque scripts
		wp_enqueue_script('rox_skillbar');
		
		// Display the accordion	';
		$output = '<div class="rox-skillbar rox-clearfix '. $class .'" data-percent="'. $percentage .'%">';
			if ( $title !== '' ) $output .= '<div class="rox-skillbar-title" style="background: '. $color .';"><span>'. $title .'</span></div>';
			$output .= '<div class="rox-skillbar-bar" style="background: '. $color .';"></div>';
			if ( $show_percent == 'true' ) {
				$output .= '<div class="rox-skill-bar-percent">'.$percentage.'%</div>';
			}
		$output .= '</div>';
		
		return $output;
	}
	add_shortcode( 'rox_skillbar', 'rox_skillbar_shortcode' );
}


/*
 * Spacing
 * ThemeRox
 */
if( !function_exists('rox_spacing_shortcode') ) {
	function rox_spacing_shortcode( $atts ) {
		extract( shortcode_atts( array(
			'size'	=> '20px',
			'class'	=> '',
		  ),
		  $atts ) );
	 return '<hr class="rox-spacing '. $class .'" style="height: '. $size .'" />';
	}
	add_shortcode( 'rox_spacing', 'rox_spacing_shortcode' );
}


/**
* Social IconsThemeRox
*/
if( !function_exists('rox_social_shortcode') ) {
	function rox_social_shortcode( $atts ){   
		extract( shortcode_atts( array(
			'icon'			=> 'twitter',
			'url'			=> 'http://www.twitter.com/roxplorer',
			'title'			=> 'Follow Us',
			'target'		=> 'self',
			'rel'			=> '',
			'border_radius'	=> '',
			'class'			=> '',
		), $atts ) );
		$icons_url = get_template_directory_uri() .'/inc/admin/rox-shortcodes/includes/images/social/';
		$icons_url = apply_filters( 'rox_social_icon_url', $icons_url );
		return '<a href="' . $url . '" class="rox-social-icon '. $class .'" target="_'.$target.'" title="'. $title .'" rel="'. $rel .'"
><img src="'. $icons_url . $icon .'.png" alt="'. $icon .'" /></a>';
	}
	add_shortcode('rox_social', 'rox_social_shortcode');
}

/**
* HighlightsThemeRox
*/
if ( !function_exists( 'rox_highlight_shortcode' ) ) {
	function rox_highlight_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'color'	=> 'yellow',
			'class'	=> '',
		  ),
		  $atts ) );
		  return '<span class="rox-highlight rox-highlight-'. $color .' '. $class .'">' . do_shortcode( $content ) . '</span>';
	
	}
	add_shortcode('rox_highlight', 'rox_highlight_shortcode');
}


/*
 * Buttons
 * ThemeRox
 */
if( !function_exists('rox_button_shortcode') ) {
	function rox_button_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'color'			=> 'blue',
			'url'			=> 'http://www.roxplorer.com',
			'title'			=> 'Visit Site',
			'target'		=> 'self',
			'rel'			=> '',
			'border_radius'	=> '',
			'class'			=> '',
			'icon_left'		=> '',
			'icon_right'	=> ''
		), $atts ) );
		
		
		$border_radius_style = ( $border_radius ) ? 'style="border-radius:'. $border_radius .'"' : NULL;		
		$rel = ( $rel ) ? 'rel="'.$rel.'"' : NULL;
		
		$button = NULL;
		$button .= '<a href="' . $url . '" class="rox-button ' . $color . ' '. $class .'" target="_'.$target.'" title="'. $title .'" '. $border_radius_style .' '. $rel .'>';
			$button .= '<span class="rox-button-inner" '.$border_radius_style.'>';
				if ( $icon_left ) $button .= '<span class="rox-button-icon-left icon-'. $icon_left .'"></span>';
				$button .= $content;
				if ( $icon_right ) $button .= '<span class="rox-button-icon-right icon-'. $icon_right .'"></span>';
			$button .= '</span>';			
		$button .= '</a>';
		return $button;
	}
	add_shortcode('rox_button', 'rox_button_shortcode');
}



/*
 * Boxes
 * ThemeRox
 *
 */
if( !function_exists('rox_box_shortcode') ) { 
	function rox_box_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'color'			=> 'gray',
			'float'			=> 'center',
			'text_align'	=> 'left',
			'width'			=> '100%',
			'margin_top'	=> '',
			'margin_bottom'	=> '',
			'class'			=> '',
		  ), $atts ) );
		  
			$style_attr = '';
			if( $margin_bottom ) {
				$style_attr .= 'margin-bottom: '. $margin_bottom .';';
			}
			if ( $margin_top ) {
				$style_attr .= 'margin-top: '. $margin_top .';';
			}
		  
		  $alert_content = '';
		  $alert_content .= '<div class="rox-box ' . $color . ' '.$float.' '. $class .'" style="text-align:'. $text_align .'; width:'. $width .';'. $style_attr .'">';
		  $alert_content .= ' '. do_shortcode($content) .'</div>';
		  return $alert_content;
	}
	add_shortcode('rox_box', 'rox_box_shortcode');
}



/*
 * Testimonial
 * ThemeRox
 *
 */
if( !function_exists('rox_testimonial_shortcode') ) { 
	function rox_testimonial_shortcode( $atts, $content = null  ) {
		extract( shortcode_atts( array(
			'by'	=> '',
			'image_url' => '',
			'designation' => 'CEO',
			'col' => 1
		  ), $atts ) );
		$testimonial_content = '';
		$class = 'col-lg-'.(12/$col);
		$testimonial_content .= '<div class="animation scaleUp testimonial '. $class .'">';
        $testimonial_content .='<div class="testimonial-thumbnail">';
        if($image_url != ''){
        	$testimonial_content .='<img src="' . $image_url . '" alt="testimonial image" />';
        } else {
        	$testimonial_content .='<img src="http://placehold.it/70x70" alt="testimonial image" />';
        }
        
        $testimonial_content .='</div>';
        $testimonial_content .='<div class="testimonial-right-content">
                <h5>' . $by . '</h5>
                <p>' . $designation . '</p>
                <p>' . $content . '</p>
              </div>
            </div>';	
		return $testimonial_content;
	}
	add_shortcode( 'rox_testimonial', 'rox_testimonial_shortcode' );
}

if( !function_exists('rox_testimonial_shortcode_in') ) { 
	function rox_testimonial_shortcode_in( $atts, $content = null  ) {
		extract( shortcode_atts( array(
			'title'	=> '',
			'desc' => ''
		  ), $atts ) );
		$testimonial_content = '';
		$testimonial_content .= '<div class="testimonial-wrap">';
		if( $title!= ''){
		$testimonial_content .= '<div class="title-content"><h3 class="title">' .$title. '</h3></div>';
		}
		if( $desc!= ''){
		$testimonial_content .= '<p>' .$desc. '</p>';	
		}
		$testimonial_content .= do_shortcode( $content );
		$testimonial_content .= '</div>';
		return $testimonial_content;
	}
	add_shortcode( 'rox_testimonial_in', 'rox_testimonial_shortcode_in' );
}



/*
 * Columns
 * ThemeRox
 *
 */
if( !function_exists('rox_column_shortcode') ) {
	function rox_column_shortcode( $atts, $content = null ){
		extract( shortcode_atts( array(
			'size'		=> 'one-third',
			'position'	=>'first',
			'class'		=> '',
		  ), $atts ) );
		  return '<div class="rox-column rox-' . $size . ' rox-column-'.$position.' '. $class .'">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('rox_column', 'rox_column_shortcode');
}



/*
 * Toggle
 * ThemeRox
 */
if( !function_exists('rox_toggle_shortcode') ) {
	function rox_toggle_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'title'	=> 'Toggle Title',
			'class'	=> '',
		), $atts ) );
		 
		// Enque scripts
		wp_enqueue_script('rox_toggle');
		
		// Display the Toggle
		return '<div class="rox-toggle '. $class .'"><h3 class="rox-toggle-trigger">'. $title .'</h3><div class="rox-toggle-container">' . do_shortcode($content) . '</div></div>';
	}
	add_shortcode('rox_toggle', 'rox_toggle_shortcode');
}


/*
 * Accordion
 * ThemeRox
 *
 */

// Main
if( !function_exists('rox_accordion_main_shortcode') ) {
	function rox_accordion_main_shortcode( $atts, $content = null  ) {
		
		extract( shortcode_atts( array(
			'class'	=> ''
		), $atts ) );
		
		// Enque scripts
		wp_enqueue_script('jquery-ui-accordion');
		wp_enqueue_script('rox_accordion');
		
		// Display the accordion	
		return '<div class="rox-accordion '. $class .'">' . do_shortcode($content) . '</div>';
	}
	add_shortcode( 'rox_accordion', 'rox_accordion_main_shortcode' );
}


// Section
if( !function_exists('rox_accordion_section_shortcode') ) {
	function rox_accordion_section_shortcode( $atts, $content = null  ) {
		extract( shortcode_atts( array(
			'title'	=> 'Title',
			'class'	=> '',
		), $atts ) );
		  
	   return '<h3 class="rox-accordion-trigger '. $class .'"><a href="#">'. $title .'</a></h3><div>' . do_shortcode($content) . '</div>';
	}
	
	add_shortcode( 'rox_accordion_section', 'rox_accordion_section_shortcode' );
}


/*
 * Tabs
 * ThemeRox
 *
 */
if (!function_exists('rox_tabgroup_shortcode')) {
 function rox_tabgroup_shortcode( $atts, $content = null ) {
  
  //Enque scripts
  wp_enqueue_script('jquery-ui-tabs');
  wp_enqueue_script('rox_tabs');
  
  // Display Tabs
  $defaults = array( 'title' => '','type' => 'vertical', 'icons' => 'coffee,picture');
  extract( shortcode_atts( $defaults, $atts ) );
  preg_match_all( '/tab title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );  
  $tab_titles = array();  
  if( isset($matches[1]) ){ $tab_titles = $matches[1]; }
  $icons = explode(',',$icons);
  if(empty($icons)) $icons = array('coffee','picture');
  
  $output = '';
  if( $title != '' ){
  $output .= '<div class="title-content"><h3 class="title">'.$title.'</h3></div>';
  }
  $output .= '<div class="simple-tabs '.$type.'"><div class="row">';
  if( count($tab_titles) ){
      $output .= '<div id="rox-tab-'. rand(1, 100) .'" class="rox-tabs">';
   $col = ($type=="vertical")? 3 : 12;
   $output .= '<div class="col-lg-'.$col.'"><ul class="ui-tabs-nav rox-clearfix">';
   $i = 0;
   foreach( $tab_titles as $tab ){
    $icon_img = (!isset($icons[$i])) ? '' : '<i class="icon-'.$icons[$i].'"></i> ';
    
    $output .= '<li><a href="#rox-tab-'. sanitize_title( $tab[0] ) .'">'.$icon_img. $tab[0] . '</a></li>';
    $i++;
   }
      $output .= '</ul></div> <!--.col-lg-3-->';
      $output .= do_shortcode( $content );
      $output .= '</div>';
  } else {
   $output .= do_shortcode( $content );
  }
  $output .= ' </div></div>';
  return $output;
 }
 add_shortcode( 'rox_tabgroup', 'rox_tabgroup_shortcode' );
}
if (!function_exists('rox_tab_shortcode')) {
 function rox_tab_shortcode( $atts, $content = null ) {
  $defaults = array(
   'title' => 'Tab',
   'class' => ''
  );
  extract( shortcode_atts( $defaults, $atts ) );
  return '<div id="rox-tab-'. sanitize_title( $title ) .'" class="col-lg-9 tab-content '. $class .'">'. do_shortcode( $content ) .'</div>';
 }
 add_shortcode( 'rox_tab', 'rox_tab_shortcode' );
}



/*
 * Pricing Table
 * ThemeRox
 *
 */
 
/*main*/
if( !function_exists('rox_pricing_table_shortcode') ) {
	function rox_pricing_table_shortcode( $atts, $content = null  ) {
		extract( shortcode_atts( array(
			'class'	=> ''
		), $atts ) );
		return '<div class="rox-pricing-table '. $class .'">' . do_shortcode($content) . '</div><div class="rox-clear-floats"></div>';
	}
	add_shortcode( 'rox_pricing_table', 'rox_pricing_table_shortcode' );
}

/*section*/
if( !function_exists('rox_pricing_shortcode') ) {
	function rox_pricing_shortcode( $atts, $content = null  ) {
		
		extract( shortcode_atts( array(
			'size'					=> 'one-half',
			'position'				=> '',
			'featured'				=> 'no',
			'plan'					=> 'Basic',
			'cost'					=> '$20',
			'per'					=> 'month',
			'button_url'			=> '',
			'button_text'			=> 'Purchase',
			'button_color'			=> 'blue',
			'button_target'			=> 'self',
			'button_rel'			=> 'nofollow',
			'button_border_radius'	=> '',
			'class'					=> '',
		), $atts ) );
		
		//set variables
		$featured_pricing = ( $featured == 'yes' ) ? 'featured' : NULL;
		$border_radius_style = ( $button_border_radius ) ? 'style="border-radius:'. $button_border_radius .'"' : NULL;
		
		//start content  
		$pricing_content ='';
		$pricing_content .= '<div class="rox-pricing rox-'. $size .' '. $featured_pricing .' rox-column-'. $position. ' '. $class .'">';
			$pricing_content .= '<div class="rox-pricing-header">';
				$pricing_content .= '<h5>'. $plan. '</h5>';
				$pricing_content .= '<div class="rox-pricing-cost">'. $cost .'</div><div class="rox-pricing-per">'. $per .'</div>';
			$pricing_content .= '</div>';
			$pricing_content .= '<div class="rox-pricing-content">';
				$pricing_content .= ''. $content. '';
			$pricing_content .= '</div>';
			if( $button_url ) {
				$pricing_content .= '<div class="rox-pricing-button"><a href="'. $button_url .'" class="rox-button '. $button_color .'" target="_'. $button_target .'" rel="'. $button_rel .'" '. $border_radius_style .'><span class="rox-button-inner" '. $border_radius_style .'>'. $button_text .'</span></a></div>';
			}
		$pricing_content .= '</div>';  
		return $pricing_content;
	}
	
	add_shortcode( 'rox_pricing', 'rox_pricing_shortcode' );
}

/*
 * Heading
 * ThemeRox
 */
if( !function_exists('rox_heading_shortcode') ) {
	function rox_heading_shortcode( $atts ) {
		extract( shortcode_atts( array(
			'title'			=> __('Sample Heading', 'rox'),
			'type'			=> 'h2',
			'margin_top'	=> '',
			'margin_bottom'	=> '',
			'text_align'	=> '',
			'font_size'		=> '',
			'color'			=> '',
			'class'			=> '',
			'icon_left'		=> '',
			'icon_right'	=> ''
		  ),
		  $atts ) );
		  
		$style_attr = '';
		if ( $font_size ) {
			$style_attr .= 'font-size: '. $font_size .';';
		}
		if ( $color ) {
			$style_attr .= 'color: '. $color .';';
		}
		if( $margin_bottom ) {
			$style_attr .= 'margin-bottom: '. $margin_bottom .';';
		}
		if ( $margin_top ) {
			$style_attr .= 'margin-top: '. $margin_top .';';
		}
		
		if ( $text_align ) {
			$text_align = 'text-align-'. $text_align;
		} else {
			$text_align = 'text-align-left';
		}
		
	 	$output = '<'.$type.' class="rox-heading '. $text_align .' '. $class .'" style="'.$style_attr.'"><span>';
		if ( $icon_left ) $output .= '<i class="rox-button-icon-left icon-'. $icon_left .'"></i>';
			$output .= $title;
		if ( $icon_right ) $output .= '<i class="rox-button-icon-right icon-'. $icon_right .'"></i>';
		$output .= '</'.$type.'></span>';
		
		return $output;
	}
	add_shortcode( 'rox_heading', 'rox_heading_shortcode' );
}


/*
 * Google Maps
 * ThemeRox
 */
if (! function_exists( 'rox_shortcode_googlemaps' ) ) :
	function rox_shortcode_googlemaps($atts, $content = null) {
		
		extract(shortcode_atts(array(
				'title'		=> '',
				'location'	=> '',
				'width'		=> '',
				'height'	=> '300',
				'zoom'		=> 8,
				'align'		=> '',
				'class'		=> '',
		), $atts));
		
		// load scripts
		wp_enqueue_script('rox_googlemap');
		wp_enqueue_script('rox_googlemap_api');
		
		
		$output = '<div class="google-map-container"><div id="map_canvas_'.rand(1, 100).'" class="googlemap '. $class .'" style="height:'.$height.'px;width:100%">';
			$output .= (!empty($title)) ? '<input class="title" type="hidden" value="'.$title.'" />' : '';
			$output .= '<input class="location" type="hidden" value="'.$location.'" />';
			$output .= '<input class="zoom" type="hidden" value="'.$zoom.'" />';
			$output .= '<div class="map_canvas"></div>';
		$output .= '</div></div>';
		
		return $output;
	   
	}
	add_shortcode("rox_googlemap", "rox_shortcode_googlemaps");
endif;


/*
 * Divider
 * ThemeRox
 */
if( !function_exists('rox_divider_shortcode') ) {
	function rox_divider_shortcode( $atts ) {
		extract( shortcode_atts( array(
			'style'			=> 'fadeout',
			'margin_top'	=> '20px',
			'margin_bottom'	=> '20px',
			'class'			=> '',
		  ),  $atts ) );

		$style_attr = '';
		if ( $margin_top && $margin_bottom ) {  
			$style_attr = 'style="margin-top: '. $margin_top .';margin-bottom: '. $margin_bottom .';"';
		} elseif( $margin_bottom ) {
			$style_attr = 'style="margin-bottom: '. $margin_bottom .';"';
		} elseif ( $margin_top ) {
			$style_attr = 'style="margin-top: '. $margin_top .';"';
		} else {
			$style_attr = NULL;
		}
	 return '<hr class="rox-divider '. $style .' '. $class .'" '.$style_attr.' />';
	}
	add_shortcode( 'rox_divider', 'rox_divider_shortcode' );
}


////////////////////Lightbox/////////////////////////////////

define('ROX_LIGHTBOX_URL', get_template_directory_uri() );
 
/*
 * lightbox vimeo
 */
if( !function_exists('rox_lightbox_image') ) {
	function rox_lightbox_image($atts){
		extract(shortcode_atts(array(
	            'fullimage' => 'http://www.themerox.com/logo.png',
	            'thumbimage' => 'http://www.themerox.com/logo.png',
	            'width' => 80,	
	            'height' => 60,
	            'title' => 'Quality Templates',
	            'description' => ''
	    ), $atts));

		return '<a href="'.$fullimage.'" rel="rox-lightbox"	title="'.$description.'"><img src="'.$thumbimage.'" width="'.$width.'" height="'.$height.'" alt="'.$title.'" /></a>';
	}
	add_shortcode('rox_image_lightbox', 'rox_lightbox_image');
}

/*
 * lightbox vimeo
 */
if( !function_exists('rox_lightbox_content') ) {
	function rox_lightbox_content($atts){
		extract(shortcode_atts(array(
	            'id' => '123456',
	            'link_image_url' => '',	
	            'link_text' => 'Click to show me',
	            'title' => 'Title',
	            'content' => 'No content'
	    ), $atts));

		$output = '<a href="#' .$id. '" rel="rox-lightbox" >';
		if($link_image_url != '')
			$output .= '<img src="http://example.com/wp-content/themes/NMFE/images/thumbnails/ logo.jpg" alt=""	width="50" />';
		else
			$output .= '<p>'.$link_text.'</p>';

		$output .= '</a>';
		$output .= '<div id="'.$id.'" style="Display:none"><h3>'.$title.'</h3> <p>'.$content.'</p></div>';
		return $output;
				
	}
	add_shortcode('rox_content_lightbox', 'rox_lightbox_content');
}
/*
 * lightbox vimeo
 */
if( !function_exists('rox_lightbox_vimeo5_handler') ) {
	function rox_lightbox_vimeo5_handler($atts){
	    extract(shortcode_atts(array(
	            'video_id' => '',
	            'width' => '',	
	            'height' => '',
	            'anchor' => '',	
	    		'auto_thumb' => '0',
	    ), $atts));
	    if(empty($video_id) || empty($width) || empty($height)){
	            return "<p>Error! You must specify a value for the Video ID, Width, Height and Anchor parameters to use this shortcode!</p>";
	    }
	    if(empty($auto_thumb) && empty($anchor)){
	    	return "<p>Error! You must specify an anchor parameter if you are not using the auto_thumb option.</p>";
	    }
	        
	    $atts['vid_type'] = "vimeo";
	    if (preg_match("/http/", $anchor)){ // Use the image as the anchor
	        $anchor_replacement = '<img src="'.$anchor.'" class="video_lightbox_anchor_image" alt="" />';
	    }
	    else if($auto_thumb == "1")
	    {
	        $anchor_replacement = rox_lightbox_get_auto_thumb($atts);
	    }
	    else    {
	    	$anchor_replacement = $anchor;
	    }    
	    $href_content = 'http://vimeo.com/'.$video_id.'?width='.$width.'&amp;height='.$height;		
	    $output = "";
	    $output .= '<a rel="rox-lightbox" href="'.$href_content.'" title="">'.$anchor_replacement.'</a>';	
	    return $output;
	}
	add_shortcode('rox_vimeo_lightbox', 'rox_lightbox_vimeo5_handler');

}

/*
 * lightbox youtube
 */
if( !function_exists('rox_lightbox_youtube_handler') ) {
	function rox_lightbox_youtube_handler($atts){
	    extract(shortcode_atts(array(
	            'video_id' => '',
	            'width' => '',	
	            'height' => '',
	            'anchor' => '',
	            'auto_thumb' => '0',
	    ), $atts));
	    if(empty($video_id) || empty($width) || empty($height)){
	            return "<p>Error! You must specify a value for the Video ID, Width, Height parameters to use this shortcode!</p>";
	    }
	    if(empty($auto_thumb) && empty($anchor)){
	    	return "<p>Error! You must specify an anchor parameter if you are not using the auto_thumb option.</p>";
	    }
	    
	    $atts['vid_type'] = "youtube";
	    if(preg_match("/http/", $anchor)){ // Use the image as the anchor
	        $anchor_replacement = '<img src="'.$anchor.'" class="video_lightbox_anchor_image" alt="" />';
	    }
	    else if($auto_thumb == "1")
	    {
	        $anchor_replacement = rox_lightbox_get_auto_thumb($atts);
	    }
	    else{
	    	$anchor_replacement = $anchor;
	    }
	    $href_content = 'http://www.youtube.com/watch?v='.$video_id.'&amp;width='.$width.'&amp;height='.$height;
	    $output = '<a rel="rox-lightbox" href="'.$href_content.'" title="">'.$anchor_replacement.'</a>';
	    return $output;
	}
	add_shortcode('rox_youtube_lightbox', 'rox_lightbox_youtube_handler');
}
/*
function rox_lightbox_getVimeoInfo($id){
    if (!function_exists('curl_init')) die('CURL is not installed!');
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://vimeo.com/api/v2/video/$id.php");
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    $output = unserialize(curl_exec($ch));
    $output = $output[0];
    curl_close($ch);
    return $output;
}*/

function rox_lightbox_get_auto_thumb($atts){
    $video_id = $atts['video_id'];
    $pieces = explode("&", $video_id);
    $video_id = $pieces[0];

    $anchor_replacement = "";
    if($atts['vid_type']=="youtube"){
        $anchor_replacement = '<div class="wpvl_auto_thumb_box_wrapper"><div class="wpvl_auto_thumb_box">';
        $anchor_replacement .= '<img src="http://img.youtube.com/vi/'.$video_id.'/0.jpg" class="video_lightbox_auto_anchor_image" alt="" />';
        $anchor_replacement .= '<div class="wpvl_auto_thumb_play"><img src="'.ROX_LIGHTBOX_URL.'/images/icon/play.png" class="wpvl_playbutton" /></div>';
        $anchor_replacement .= '</div></div>';
    }
    /*else if($atts['vid_type']=="vimeo")
    {
        $VideoInfo = rox_lightbox_getVimeoInfo($video_id);
        $thumb = $VideoInfo['thumbnail_medium'];
        //print_r($VideoInfo);
        $anchor_replacement = '<div class="wpvl_auto_thumb_box_wrapper"><div class="wpvl_auto_thumb_box">';
        $anchor_replacement .= '<img src="'.$thumb.'" class="video_lightbox_auto_anchor_image" alt="" />';
        $anchor_replacement .= '<div class="wpvl_auto_thumb_play"><img src="'.ROX_LIGHTBOX_URL.'/img/play.png" class="wpvl_playbutton" /></div>';
        $anchor_replacement .= '</div></div>';
    }*/
    else
    {
        wp_die("<p>no video type specified</p>");
    }
    return $anchor_replacement; 
}
//////////////////End Lightbox///////////////////////////////

/*
 * Recent posts
 */
if( !function_exists('rox_shortcode_recent_posts') ) {
 function rox_shortcode_recent_posts($atts, $content = null) {
  global $wpdb, $post;
  extract(shortcode_atts(array(
   'title' => 'From Blog',
   'post_type' => 'post',
   'showposts' => 10,
   'cat' => '',
   'style' => ''
  ), $atts));
  $html = '<div class="recent-slider"><div class="title-content"><h3 class="title">'.$title.'</h3></div>';
  $args = array(
   'post_type' => $post_type,
   'showposts' => $showposts,   
   );
  if($cat != '') $args['cat'] = $cat;
  // The Query
  $the_query = new WP_Query( $args );

  // The Loop
  if ( $the_query->have_posts() ) {
   $html .= '<ul class="recent-'.$post_type.' list-inline from-blog-content">';
   while ( $the_query->have_posts() ) {
    $the_query->the_post();
    
    $small_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail');
    $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'portfolio-large');
    $html .= '<li class="animation scaleUp">';
    if($style == ''){
     $html .= '<div class="post single-posts">';
     if($small_image_url != ''){
      $html .= '<div class="post-thumbnail element" data-link="'.get_permalink().'" data-zoom="'.$large_image_url[0].'">';
      $html .= '<img src="'.$large_image_url[0].'" alt="'.get_the_title().'" />
               </div>';
     } 

     if($post_type == 'post'){
      $html .= '<div class="content-bottom-single-post">';
      $html .= '<h3><a href="'.get_permalink().'">'.wp_trim_words(get_the_title(), 6).'</a></h3>';
      $html .= '<p>'.wp_trim_words(get_the_content(), 20).'</p>'; 
      $html .= '<a href="'.get_permalink().'" class="more-button align-right"><i class="icon-caret-right"></i> More</a>';
      $html .= '</div>'; 
     }
                 $html .= '</div>';
             }else{
              $small_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'portfolio-thumb');
              $html .= '<div class="view '.$style.'" id="post-'.$post->ID.'">';  
          if($small_image_url[0] != '' ){
		  $html .= '<img src="'.$small_image_url[0].'"  alt="'.get_the_title().'" />'; 
		  }
		  else {
			 $html .= '<i class="fa fa-video-camera fa-4"></i>';
		} 
          $html .= '<div class="mask">';  
          $html .= '<h2>'.get_the_title().'</h2>';  
          $html .= '<p>'.wp_trim_words(get_the_content(), 20).'</p>';  
              $html .= '<a href="'.get_permalink().'" class="info"><i class="icon-caret-right"></i> Read More</a> '; 
          $html .= '</div>';  
     $html .= '</div>';   
             }
                $html .= '</li>';
   }
   $html .= '</ul>
     <div class="arrow-next-previous">
              <a href="#" class="arrow-previous-blog"><i class="icon-angle-left"></i></a>
      <a href="#" class="arrow-next-blog"><i class="icon-angle-right"></i></a>
     </div>';
  } else {
   $html .= 'No Item Founds.';
  }
  $html .= '</div>';
  /* Restore original Post Data */
  wp_reset_postdata();

  return $html;
 }
 add_shortcode('recent_posts_slider', 'rox_shortcode_recent_posts');
}
// Font Awesome Shortcodes
function rox_FontAwesome($atts) {
    extract(shortcode_atts(array(
    'type'  => '',
    'size' => '',
    'rotate' => '',
    'flip' => '',
    'pull' => '',
    'animated' => '',
 
    ), $atts));
     
    $type = ($atts['type']) ? 'icon-'.$atts['type']. '' : 'icon-star';
    $size = ($atts['size']) ? 'icon-'.$atts['size']. '' : '';
    $rotate = (isset($atts['rotate'])) ? 'icon-rotate-'.$atts['rotate']. '' : '';
    $flip = (isset($atts['flip'])) ? 'icon-flip-'.$atts['flip']. '' : '';
    $pull = (isset($atts['pull'])) ? 'pull-'.$atts['pull']. '' : '';
    $animated = (isset($atts['$animated'])) ? 'icon-spin' : '';
 
    $theAwesomeFont = '<i class="'.sanitize_html_class($type).' '.sanitize_html_class($size).' '.sanitize_html_class($rotate).' '.sanitize_html_class($flip).' '.sanitize_html_class($pull).' '.sanitize_html_class($animated).'"></i>';
     
    return $theAwesomeFont;
}
 
add_shortcode('rox_icon', 'rox_FontAwesome');

/*
 * Client Slider Shortcodes
 */
if( !function_exists('gshop_shortcode_client_details') ) {
	function gshop_shortcode_client_details($atts) {
		extract(shortcode_atts(array(
			'title'  => ''		 
			), $atts));
		$html = '';
		if( function_exists( 'ot_get_option' ) ){
			$client_images_details = ot_get_option( 'client_slider_image', array() );
		}
		$html .= ($atts['title']!='')? '<h2>' .$atts['title']. '</h2>' : '';
		$html .= '<ul class="client-image-details">';
		if(!empty($client_images_details)){
			foreach( $client_images_details as $images ){
				$html .= '<li class="animation scaleUp">';
				if( $images['client_image_link'] != '' ) {
					$html .= '<a href="' . $images['client_image_link'] . '" target="_blank">';
					$html .= '<img src="' . $images['client_image_hover_url'] . '" alt="' . $images['title'] . '" />';
					$html .= '</a>';
				} else {
					$html .= '<a href="#">';
					$html .= '<img src="' . $images['client_image_hover_url'] . '" alt="' . $images['title'] . '" />';
					$html .= '</a>';
				}
				$html .= '</li>';
			}
		}else
		$html .= '<li class="animation scaleUp">Client Slider is empty. Please add clients in your theme option.</li>';
		$html .= '</ul>';
		return $html;
	}
	add_shortcode('rox_client_details', 'gshop_shortcode_client_details');
}



/*
 * Expert
 * ThemeRox
 *
 */
if (!function_exists('rox_expert_in_shortcode')) {
 function rox_expert_in_shortcode( $atts, $content = null ) {
  
  // Display Tabs
  $defaults = array('title' => 'We Expert In', 'desc' => 'Simple dscription');
  extract( shortcode_atts( $defaults, $atts ) );

  preg_match_all( '/expert title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );
  $expert_titles = array();
  if( isset($matches[1]) ){ $expert_titles = $matches[1]; }
  $output = '';
  $output .= '<div class="title-content"><h3 class="title">'.$title.'</h3></div>';
        $output .= '<div class="expert">';   
		
        $output .= '<p>'.$desc.'</p>';  

   
  $output .= '<div class="row">';
  $output .= do_shortcode( $content );
  $output .= '</div>';
      
  
  $output .= '</div>';   
  return $output;
 }
 add_shortcode( 'rox_expert_in', 'rox_expert_in_shortcode' );
}

if (!function_exists('rox_expert_shortcode')) {
 function rox_expert_shortcode( $atts, $content = null ) {
  $defaults = array(
   'title' => 'Expert Title',
   'value' => 50,
   'desc' => 'Simple description lorem ipsum dolor sit amet',
   'col' => 2
  );
  extract( shortcode_atts( $defaults, $atts ) );
  $class = 'col-lg-'.(12/$col); 
  $output = '<div class="'.$class.'">';

  $output .= '<input data-step="5" data-ticks="8" data-readonly="true" rel="'.$value.'" value="0" class="knob">';
  $output .= ' <h3 class="align-center">'.sanitize_title($title).'</h3>
                  <p class="align-center  animation scaleUp">'.do_shortcode($content).'</p>';
        $output .= '</div>';
  return $output;
 }
 add_shortcode( 'rox_expert', 'rox_expert_shortcode' );
}

/*
 * Services
 * ThemeRox
 *
 */
if (!function_exists('rox_services_in_shortcode')) {
 function rox_services_in_shortcode( $atts, $content = null ) {
  extract( shortcode_atts( array( 'title' => '', 'column' => 3, 'showposts' => 6), $atts ) );
  
  $args = array(
   'post_type' => 'services',
   'posts_per_page' => $showposts,
   'order' => 'DESC',
   'order_by' => 'date',
  );
  $query = new WP_Query( $args );
  
  $output = '';
  if($title != '')
  $output .= '<div class="title-content"><h3 class="title">'.$title.'</h3></div>';
  $class = 'col-lg-'.(12/$column); 
  $output .= '<ul class="list-inline services">';
  while ( $query->have_posts() ){
  $query->the_post();
  $output .= '<li class="' .$class. '"><div class="services-left-icon">'; 
  $postmeta_icon = get_post_meta( get_the_ID(), 'services_icon', true );
  if( $postmeta_icon !='' ){
   $output .= '<i class="' .$postmeta_icon. ' fa-2x animation scaleUp"></i>';
  } else{
   $output .= '<i class="fa fa-cog fa-2x animation scaleUp"></i>';
  }
  $output .= '</div>';
  $output .= '<div class="services-right-content services-first">';
  $output .= '<h4>'.get_the_title().'</h4>';
  $output .= '<div class="append-tick-icon animation scaleUp">'.get_the_content().'</div>';
  $output .= '</div></li>';
  }
  $output .= '</ul>';   
  return $output;
 }
 add_shortcode( 'rox_services', 'rox_services_in_shortcode' );
}

/*
 * FAQ
 * ThemeRox
 *
 */
if (!function_exists('faq_shortcode_callback')) {
function faq_shortcode_callback( $atts, $content = null ){
	 global $wpdb, $post;
	 $defaults = array('title' => '', 'show' => -1);
	   extract( shortcode_atts( $defaults, $atts ) );
	  
	 $output = '<div id="faq-content">'; 
	 if($title != '')$output .= '<div class="title-content"><h3 class="title">'.$title.'</h3></div>';
	 $output .= do_shortcode( $content );
	
	 $li = $con = ''; 
	 $args = array(
	   'post_type' => 'faq',
	   'posts_per_page' => $show,
	   'order' => 'DESC',
	   'order_by' => 'date',
	  );
	 $query = new WP_Query( $args );
	 if($query->have_posts()){
	  while ( $query->have_posts() ){
		 $query->the_post();
		 $li .= '<li><i class="icon-question-sign icon-2x animation scaleUp"></i> <a href="#answer'.$post->ID.'">'.get_the_title().'</a></li>';
		 $con .= '<li id="answer'.$post->ID.'">
		  <h4><i class="icon-question-sign animation scaleUp"></i> '.get_the_title().'</h4>
		  <p>'.get_the_content().'</p>
		 </li>';
		}
	   }else{
		$output .= '<p>No Faqs Available</p>';
	   }
	   wp_reset_query(); 
	   
	   if($li != ''){
		$output .= '<div id="questions"><ul>'.$li.'</ul></div>';
	   }
	   if($con != ''){
		$output .= '<div id="answers"><ul>'.$con.'</ul></div>';
	   }
	   $output .= '</div>';
		
	 return $output;  

 }
 add_shortcode( 'rox_faq', 'faq_shortcode_callback' );
}

/*
 * Services
 * ThemeRox
 *
 */
if (!function_exists('rox_contact_page_address')) {
 function rox_contact_page_address( $atts, $content = null ) {
  extract( shortcode_atts( array( 'title' => 'Head office', 'col' => 3, 'desc' => 'Lorem ipsum has erroribus is design color vituperata ex, bonorum depend an you', 'phone' => '9878878', 'fax' => '88755675765', 'email' => 'test@test.com'), $atts ) );
		
  $output = '';
  $class = 'col-lg-'.(12/$col);
  $output .= '<div class="' .$class. '">';
  $output .= '<div class="contact">
              <div class="contact-icon img-circle"><i class="icon-home animation scaleUp"></i></div>
              <div class="contact-details">
                <h5>'.$title.'</h5>
                <p>'.$desc.'</p>
                <p><span><i class="icon-phone animation scaleUp"></i></span>'.$phone.'</p>
                <p><span></span>'.$fax.'</p>
                <p><span><i class="icon-envelope animation scaleUp"></i></span>'.$email.'</p>
              </div>
            </div></div>';   
  return $output;
 }
 add_shortcode( 'rox_contacts', 'rox_contact_page_address' );
}

if (!function_exists('rox_shortcode_contact_in')) {
 function rox_shortcode_contact_in( $atts, $content = null ) {
  extract( shortcode_atts( array( 'title' => 'Office Address'), $atts ) );
		
  $output = '';
  $output .= '<div class="title-content"><h3 class="title">'.$title.'</h3></div>';

  $output .= do_shortcode( $content );   
  return $output;
 }
 add_shortcode( 'rox_contacts_in', 'rox_shortcode_contact_in' );
}

function recent_product($atts){
		global $woocommerce_loop, $woocommerce;

		extract(shortcode_atts(array(
			'title' 	=> 'Recent Products',
			'per_page' 	=> '8',
			'columns' 	=> '4',
			'orderby' => 'date',
			'order' => 'desc'
		), $atts));

		//$meta_query = $woocommerce->query->get_meta_query();

		$args = array(
			'post_type'	=> 'product',
			'post_status' => 'publish',
			'ignore_sticky_posts'	=> 1,
			'posts_per_page' => $per_page,
			'orderby' => $orderby,
			'order' => $order
		);

		ob_start();

		$products = new WP_Query( $args );

		$woocommerce_loop['columns'] = $columns;

		if ( $products->have_posts() ) : ?>
        	<div class="product-title-recent">
            <h2><?php echo $title; ?></h2>
            <div class="product-title-icon"><i class="fa fa-star fa-2x"></i></div>
            </div>

			<?php woocommerce_product_loop_start(); ?>

				<?php while ( $products->have_posts() ) : $products->the_post(); ?>

					<?php get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

		<?php endif;

		wp_reset_postdata();

		return '<div class="woocommerce">' . ob_get_clean() . '</div>';
	
}

add_shortcode('recent_product', 'recent_product');
add_shortcode('featured_product', 'featured_product');
function featured_product( $atts ) {

		global $woocommerce_loop;

		extract(shortcode_atts(array(
			'title' => 'Fetured products',
			'per_page' 	=> '12',
			'columns' 	=> '4',
			'orderby' => 'date',
			'order' => 'desc'
		), $atts));

		$args = array(
			'post_type'	=> 'product',
			'post_status' => 'publish',
			'ignore_sticky_posts'	=> 1,
			'posts_per_page' => $per_page,
			'orderby' => $orderby,
			'order' => $order,
			'meta_query' => array(
				array(
					'key' => '_visibility',
					'value' => array('catalog', 'visible'),
					'compare' => 'IN'
				),
				array(
					'key' => '_featured',
					'value' => 'yes'
				)
			)
		);

		ob_start();

		$products = new WP_Query( $args );

		$woocommerce_loop['columns'] = $columns;

		if ( $products->have_posts() ) : ?>

			<div class="product-title-recent">
            <h2><?php echo $title; ?></h2>
            <div class="product-title-icon"><i class="fa fa-star fa-2x"></i></div>
            </div>

			<?php woocommerce_product_loop_start(); ?>

				<?php while ( $products->have_posts() ) : $products->the_post(); ?>

					<?php woocommerce_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

		<?php endif;

		wp_reset_postdata();

		return '<div class="woocommerce">' . ob_get_clean() . '</div>';
	}

add_shortcode('offer-banner', 'offer_banner');
//if(!function_exists('offer_banner')){
	function offer_banner($atts, $content = '50%'){
		extract(shortcode_atts(array(
			'title' 	=> 'Discount offer',
			'button_text' 	=> 'Shop now',
			'button_link' 	=> '#',
			'type' => 'discount/sale',
			'image_url' => ''
		), $atts));

		$class = ($type == 'discount')? 'discount-sale' : 'summer-sale';
		if($image_url == ''){
			$image_url = ($type == 'discount')? get_template_directory_uri().'/images/d-logo.png' : get_template_directory_uri().'/images/s-logo.png';
		}
		
		return '<table class="'.$class.'"><tr>
        	<td><img src="'.$image_url.'" alt="discount" /></td>
          <td><span>'.$title.'<span class="offer">'.do_shortcode( $content ).'</span></span>
          <a href="'.$button_link.'">'.$button_text.'</a></td></tr>
        </table>';
	}
//}

?>