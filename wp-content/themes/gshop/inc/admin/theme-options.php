<?php
/**
 * Initialize the custom theme options.
 */
add_action( 'admin_init', 'custom_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( 'option_tree_settings', array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'contextual_help' => array( 
      'sidebar'       => ''
    ),
    'sections'        => array( 
      array(
        'id'          => 'general',
        'title'       => 'General Options'
      ),
      array(
        'id'          => 'header_options',
        'title'       => 'Header options'
      ),
      array(
        'id'          => 'footer_options',
        'title'       => 'Footer Options'
      ),
      array(
        'id'          => 'background_options',
        'title'       => 'Background Options'
      ),
      array(
        'id'          => 'typography_options',
        'title'       => 'Typography Options'
      ),
      array(
        'id'          => 'blog_options',
        'title'       => 'Blog Options'
      ),
      array(
        'id'          => 'social_sharing_box',
        'title'       => 'Social Sharing Box'
      ),
      array(
        'id'          => 'social_sharing_links',
        'title'       => 'Social Sharing Links'
      ),
      array(
        'id'          => 'sidebar_options',
        'title'       => 'Sidebar Options'
      ),
	  array(
        'id'          => 'products_options',
        'title'       => 'Products Options'
      ),
	  array(
        'id'          => 'client_slider',
        'title'       => 'Client Slider'
      ),
      array(
        'id'          => 'styling_options',
        'title'       => 'Styling Options'
      ),
      array(
        'id'          => 'custom_css',
        'title'       => 'Custom Css'
      )
    ),
    'settings'        => array( 
      array(
        'id'          => 'custom_fabicon',
        'label'       => 'Custom Fabicon',
        'desc'        => 'you can put url of an ico image that will appear your website\'s fabicon
(16px X 16px)',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'apple_iphone_icon',
        'label'       => 'Apple iPhone Icon',
        'desc'        => 'Icon for Apple iPhone (57px X 57px)',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'apple_iphone_retina_icon',
        'label'       => 'Apple iPhone Retina Icon',
        'desc'        => 'Icon for Apple iPhone Retina (114px X 114px)',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'apple_ipad_icon',
        'label'       => 'Apple iPad Icon',
        'desc'        => 'Icon for Apple iPad (72px X 72px)',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'apple_ipad_retina_icon',
        'label'       => 'Apple iPad Retina Icon',
        'desc'        => 'Icon for Apple iPad Retina (144px X 144px)',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  array(
        'id'          => 'admin_logo',
        'label'       => 'Admin logo',
        'desc'        => '',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  array(
        'id'          => 'top_fixed_menu',
        'label'       => 'On scrolling Fixed Menu Disable',
        'desc'        => '',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'disable',
            'label'       => 'Disable',
            'src'         => ''
          )
        ),
      ),
	  array(
        'id'          => 'scrolling_animation',
        'label'       => 'Disable element animation',
        'desc'        => '',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'enable',
            'label'       => 'Disable',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'tracking_code',
        'label'       => 'Tracking Code',
        'desc'        => 'Google Analytic code goes here, this will be added into the footer template of your theme.',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'general',
        'rows'        => '3',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'allow_comments_on_pages',
        'label'       => 'Allow Comments on Pages',
        'desc'        => 'Allow comments on regular page.',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'enable',
            'label'       => 'Enable',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'disable_featured_image_on_pages',
        'label'       => 'Disable Featured image on pages',
        'desc'        => 'Disable featured images on regular pages',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'disable',
            'label'       => 'Disable',
            'src'         => ''
          )
        ),
      ),
	  array(
        'id'          => 'enable_custom_preset',
        'label'       => 'Enable Custom Preset',
        'desc'        => 'Enable custom preset color.',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'enable',
            'label'       => 'Enable',
            'src'         => ''
          )
        ),
      ),
	  array(
        'id'          => 'preset_custom_color_1',
        'label'       => 'Custom Preset Color 1',
        'desc'        => '',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  array(
        'id'          => 'preset_custom_color_2',
        'label'       => 'Custom Preset Color 2',
        'desc'        => '',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  array(
        'id'          => 'preset_custom_color_3',
        'label'       => 'Custom Preset Color 3',
        'desc'        => '',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  
      array(
        'id'          => 'logo',
        'label'       => 'Logo',
        'desc'        => 'Please choose an image file for your logo.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'header_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'breadcrumbs_menu',
        'label'       => 'Breadcrumbs Menu',
        'desc'        => '',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'header_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'disable',
            'label'       => 'Disable breadcrumbs',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'breadcrumb_on_mobile_devices',
        'label'       => 'Breadcrumb on Mobile Devices',
        'desc'        => '',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'header_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'disable',
            'label'       => 'Disable breadcrumbs on mobile devices',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'bredcrumb_menu_prefix',
        'label'       => 'Bredcrumb Menu Prefix',
        'desc'        => 'The text before the breadcrumbs menu',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'header_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  array(
        'id'          => 'footer_logo',
        'label'       => 'Footer Logo',
        'desc'        => '',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'footer_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  array(
        'id'          => 'footer_bacground_image',
        'label'       => 'Footer Background Image',
        'desc'        => '',
        'std'         => '',
        'type'        => 'background',
        'section'     => 'footer_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  array(
        'id'          => 'footer_top_section',
        'label'       => 'Footer Top Section',
        'desc'        => '',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'footer_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'disable',
            'label'       => 'Disable footer top section',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'footer_widget',
        'label'       => 'Footer Widget',
        'desc'        => '',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'footer_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'disable',
            'label'       => 'Disable footer widget',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'diplay_social_icons_on_footer_of_the_page',
        'label'       => 'Diplay Social Icons on Footer of the Page',
        'desc'        => '',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'footer_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'disable',
            'label'       => 'Disable',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'open_social_icons_on_footer_in_a_new_window',
        'label'       => 'Open Social Icons on footer in a new window',
        'desc'        => '',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'footer_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'enable',
            'label'       => 'Enable',
            'src'         => ''
          )
        ),
      ),
	  array(
        'id'          => 'site_layout',
        'label'       => 'Layout',
        'desc'        => '',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'background_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'wide',
            'label'       => 'Wide',
            'src'         => ''
          ),
          array(
            'value'       => 'boxed',
            'label'       => 'Boxed',
            'src'         => ''
          )
        ),
      ),
	  array(
        'id'          => 'custom_patterns_images',
        'label'       => 'Custom patterns',
        'desc'        => '',
        'std'         => '',
        'type'        => 'radio-image',
        'section'     => 'background_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '1',
            'label'       => '1',
            'src'         => get_template_directory_uri(). '/images/pattern/1.png'
          ),
		  array(
            'value'       => '2',
            'label'       => '2',
            'src'         => get_template_directory_uri(). '/images/pattern/2.png'
          ),
		  array(
            'value'       => '3',
            'label'       => '3',
            'src'         => get_template_directory_uri(). '/images/pattern/3.png'
          ),
		  array(
            'value'       => '4',
            'label'       => '4',
            'src'         => get_template_directory_uri(). '/images/pattern/4.png'
          ),
		  array(
            'value'       => '5',
            'label'       => '5',
            'src'         => get_template_directory_uri(). '/images/pattern/5.png'
          ),
		  array(
            'value'       => '6',
            'label'       => '6',
            'src'         => get_template_directory_uri(). '/images/pattern/6.png'
          ),
		  array(
            'value'       => '7',
            'label'       => '7',
            'src'         => get_template_directory_uri(). '/images/pattern/7.png'
          ),
		  array(
            'value'       => '8',
            'label'       => '8',
            'src'         => get_template_directory_uri(). '/images/pattern/8.png'
          ),
		  array(
            'value'       => '9',
            'label'       => '9',
            'src'         => get_template_directory_uri(). '/images/pattern/9.png'
          ),
		  array(
            'value'       => '10',
            'label'       => '10',
            'src'         => get_template_directory_uri(). '/images/pattern/10.png'
          )
        ),
      ),
      array(
        'id'          => 'background_image',
        'label'       => 'Background Image For Outer Areas in Boxed Mode',
        'desc'        => '',
        'std'         => '',
        'type'        => 'background',
        'section'     => 'background_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'body_fonts_option',
        'label'       => 'Body Fonts Option',
        'desc'        => '',
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'typography_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'menu_fonts_option',
        'label'       => 'Menu Fonts Option',
        'desc'        => '',
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'typography_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'footer_heading_font_options',
        'label'       => 'Footer Font options',
        'desc'        => '',
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'typography_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'heading_font_size_h1',
        'label'       => 'Heading Font Size H1',
        'desc'        => '',
        'std'         => '',
        'type'        => 'measurement',
        'section'     => 'typography_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'heading_font_size_h2',
        'label'       => 'Heading Font Size H2',
        'desc'        => '',
        'std'         => '',
        'type'        => 'measurement',
        'section'     => 'typography_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'heading_font_size_h3',
        'label'       => 'Heading Font Size H3',
        'desc'        => '',
        'std'         => '',
        'type'        => 'measurement',
        'section'     => 'typography_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'heading_font_size_h4',
        'label'       => 'Heading Font Size H4',
        'desc'        => '',
        'std'         => '',
        'type'        => 'measurement',
        'section'     => 'typography_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'heading_font_size_h5',
        'label'       => 'Heading Font Size H5',
        'desc'        => '',
        'std'         => '',
        'type'        => 'measurement',
        'section'     => 'typography_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'heading_font_size_h6',
        'label'       => 'Heading Font Size H6',
        'desc'        => '',
        'std'         => '',
        'type'        => 'measurement',
        'section'     => 'typography_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'breadcrumbs_font_size',
        'label'       => 'Breadcrumbs Font Size',
        'desc'        => '',
        'std'         => '',
        'type'        => 'measurement',
        'section'     => 'typography_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'page_title_font_size',
        'label'       => 'Page Title Font Size',
        'desc'        => '',
        'std'         => '',
        'type'        => 'measurement',
        'section'     => 'typography_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'sidebar_widget_title_font_size',
        'label'       => 'Sidebar Widget Title Font Size',
        'desc'        => '',
        'std'         => '',
        'type'        => 'measurement',
        'section'     => 'typography_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'footer_widget_title_font_size',
        'label'       => 'Footer Widget Title Font Size',
        'desc'        => '',
        'std'         => '',
        'type'        => 'measurement',
        'section'     => 'typography_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'copyright_text_font_size',
        'label'       => 'Copyright Text Font Size',
        'desc'        => '',
        'std'         => '',
        'type'        => 'measurement',
        'section'     => 'typography_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'featured_image_on_blog_archive_page',
        'label'       => 'Featured Image On Blog Archive Page',
        'desc'        => 'Show featured images on blog archive page',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'blog_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'disable',
            'label'       => 'Disable',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'featured_image_on_single_post_page',
        'label'       => 'Featured Image on Single Post Page',
        'desc'        => 'Show featured images on single post pages.',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'blog_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'disable',
            'label'       => 'Disable',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'post_title',
        'label'       => 'Post Title',
        'desc'        => 'Show the post title that goes below the featured images.',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'blog_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'disable',
            'label'       => 'Disable',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'social_sharing_box',
        'label'       => 'Social Sharing Box',
        'desc'        => 'Hide the social sharing box.',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'blog_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'disable',
            'label'       => 'Disable',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'show_box_facebook',
        'label'       => 'Facebook',
        'desc'        => '',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'social_sharing_box',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'disable',
            'label'       => 'Show the facebook sharing option in blog posts.',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'show_box_twitter',
        'label'       => 'Twitter',
        'desc'        => '',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'social_sharing_box',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'disable',
            'label'       => 'Show the twitter sharing option in blog posts.',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'show_box_linkedin',
        'label'       => 'LinkedIn',
        'desc'        => '',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'social_sharing_box',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'disable',
            'label'       => 'Show the linkedin sharing option in blog posts.',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'show_box_google_plus',
        'label'       => 'Google Plus',
        'desc'        => '',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'social_sharing_box',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'disable',
            'label'       => 'Show the g+ sharing option in blog posts.',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'show_box_pinterest',
        'label'       => 'Pinterest',
        'desc'        => '',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'social_sharing_box',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'disable',
            'label'       => 'Show the pinterest sharing option in blog posts.',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'facebook',
        'label'       => 'Facebook',
        'desc'        => 'Place the link you want and facebook icon will appear. To remove it, just leave it blank.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_sharing_links',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'flickr',
        'label'       => 'Flickr',
        'desc'        => 'Place the link you want and flickr icon will appear. To remove it, just leave it blank.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_sharing_links',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'rss',
        'label'       => 'RSS',
        'desc'        => 'Place the link you want and rss icon will appear. To remove it, just leave it blank.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_sharing_links',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'twitter',
        'label'       => 'Twitter',
        'desc'        => 'Place the link you want and twitter icon will appear. To remove it, just leave it blank.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_sharing_links',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'youtube',
        'label'       => 'Youtube',
        'desc'        => 'Place the link you want and youtube icon will appear. To remove it, just leave it blank.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_sharing_links',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'pinterest',
        'label'       => 'Pinterest',
        'desc'        => 'Place the link you want and pinterest icon will appear. To remove it, just leave it blank.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_sharing_links',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'tumblr',
        'label'       => 'Tumblr',
        'desc'        => 'Place the link you want and tumblr icon will appear. To remove it, just leave it blank.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_sharing_links',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'google_plus',
        'label'       => 'Google Plus',
        'desc'        => 'Place the link you want and g+ icon will appear. To remove it, just leave it blank.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_sharing_links',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'dribbble',
        'label'       => 'Dribbble',
        'desc'        => 'Place the link you want and dribbble icon will appear. To remove it, just leave it blank.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_sharing_links',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'linkedin',
        'label'       => 'LinkedIn',
        'desc'        => 'Place the link you want and linkedin icon will appear. To remove it, just leave it blank.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_sharing_links',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'skype',
        'label'       => 'Skype',
        'desc'        => 'Place the link you want and skype icon will appear. To remove it, just leave it blank.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_sharing_links',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  array(
        'id'          => 'default_sidebar_position',
        'label'       => 'Default Sidebar Position',
        'desc'        => '',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'sidebar_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'right',
            'label'       => 'Right',
            'src'         => ''
          ),
          array(
            'value'       => 'left',
            'label'       => 'Left',
            'src'         => ''
          )
        ),
      ),
	  array(
        'id'          => 'product_sidebar_option_single',
        'label'       => 'Single Product Sidebar Option',
        'desc'        => '',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'sidebar_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'show',
            'label'       => 'Show',
            'src'         => ''
          ),
          array(
            'value'       => 'hide',
            'label'       => 'Hide',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'sidebar_background_color',
        'label'       => 'Sidebar Background Color',
        'desc'        => '',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'sidebar_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  array(
        'id'          => 'number_of_column_shop_page',
        'label'       => 'Number of column in shop page',
        'desc'        => '',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'products_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
		'choices'     => array( 
          array(
            'value'       => '3',
            'label'       => '3',
            'src'         => ''
          ),
          array(
            'value'       => '2',
            'label'       => '2',
            'src'         => ''
          ),
		  array(
            'value'       => '4',
            'label'       => '4',
            'src'         => ''
          )
        ),
      ),
	  array(
        'id'          => 'disable_footer_list_paypal',
        'label'       => 'Disable Footer Payment List Paypal',
        'desc'        => '',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'products_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'disable',
            'label'       => 'Disable',
            'src'         => ''
          )
        ),
      ),
	  array(
        'id'          => 'disable_footer_list_visa',
        'label'       => 'Disable Footer Payment List VISA',
        'desc'        => '',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'products_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'disable',
            'label'       => 'Disable',
            'src'         => ''
          )
        ),
      ),
	  array(
        'id'          => 'disable_footer_list_mastercard',
        'label'       => 'Disable Footer Payment List Mastercard',
        'desc'        => '',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'products_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'disable',
            'label'       => 'Disable',
            'src'         => ''
          )
        ),
      ),
	  array(
        'id'          => 'disable_footer_list_discover',
        'label'       => 'Disable Footer Payment List Discover',
        'desc'        => '',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'products_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'disable',
            'label'       => 'Disable',
            'src'         => ''
          )
        ),
      ),
	  array(
        'id'          => 'disable_footer_list_skrill',
        'label'       => 'Disable Footer Payment List Skrill',
        'desc'        => '',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'products_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'disable',
            'label'       => 'Disable',
            'src'         => ''
          )
        ),
      ),
	  array(
        'label'       => 'Page Select',
        'id'          => 'client_page_select',
        'type'        => 'page-select',
        'desc'        => 'Select a page for view details client images and paste shortcode [rox_client_details] in that page content',
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'client_slider'
      ),
	  array(
        'id'          => 'client_slider_image',
        'label'       => 'Client Slider',
        'desc'        => '',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'client_slider',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'settings'    => array( 
          array(
            'id'          => 'client_image_hover_url',
            'label'       => 'Logo Image  URL',
            'desc'        => 'image size (70px X 70px)',
            'std'         => '',
            'type'        => 'upload',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => ''
          ),
		  array(
            'id'          => 'client_image_link',
            'label'       => 'Link URL',
            'desc'        => 'optional',
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => ''
          )
        )
      ),
      array(
        'id'          => 'primary_color',
        'label'       => 'Primary Color',
        'desc'        => '',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'styling_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'header_background_color',
        'label'       => 'Header Background Color',
        'desc'        => '',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'styling_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'header_border_color',
        'label'       => 'Header Border Color',
        'desc'        => '',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'styling_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'header_top_background_color',
        'label'       => 'Header Top Background Color',
        'desc'        => '',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'styling_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'content_background_color',
        'label'       => 'Content Background Color',
        'desc'        => '',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'styling_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'footer_background_color',
        'label'       => 'Footer Background Color',
        'desc'        => '',
        'std'         => '',
        'type'        => 'background',
        'section'     => 'styling_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'button_text_color',
        'label'       => 'Button Text Color',
        'desc'        => '',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'styling_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'page_title_font_color',
        'label'       => 'Page Title Font Color',
        'desc'        => '',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'styling_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'heading_1__h1__font_color',
        'label'       => 'Heading 1 (H1) Font Color',
        'desc'        => '',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'styling_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'heading_2__h2__font_color',
        'label'       => 'Heading 2 (H2) Font Color',
        'desc'        => '',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'styling_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'heading_3__h3__font_color',
        'label'       => 'Heading 3 (H3) Font Color',
        'desc'        => '',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'styling_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'heading_4__h4__font_color',
        'label'       => 'Heading 4 (H4) Font Color',
        'desc'        => '',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'styling_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'heading_5__h5__font_color',
        'label'       => 'Heading 5 (H5) Font Color',
        'desc'        => '',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'styling_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'heading_6__h6__font_color',
        'label'       => 'Heading 6 (H6) Font Color',
        'desc'        => '',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'styling_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'body_text_color',
        'label'       => 'Body Text Color',
        'desc'        => '',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'styling_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'link_color',
        'label'       => 'Link Color',
        'desc'        => '',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'styling_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'breadcrumbs_text_color',
        'label'       => 'Breadcrumbs Text Color',
        'desc'        => '',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'styling_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'footer_font_color',
        'label'       => 'Footer Font Color',
        'desc'        => '',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'styling_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'footer_link_color',
        'label'       => 'Footer Link Color',
        'desc'        => '',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'styling_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'menu_font_color___first_level',
        'label'       => 'Menu Font Color - First Level',
        'desc'        => '',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'styling_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'menu_background_color___sublevels',
        'label'       => 'Menu Background Color - Sublevels',
        'desc'        => '',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'styling_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'menu_font_color___sublevels',
        'label'       => 'Menu Font Color - Sublevels',
        'desc'        => '',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'styling_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'menu_hover_background_color___sublevels',
        'label'       => 'Menu Hover Background Color - Sublevels',
        'desc'        => '',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'styling_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      
      array(
        'id'          => 'secondary_menu___first_level__amp__top_contact_info_color',
        'label'       => 'Secondary Menu - First Level &amp; Top Contact Info Color',
        'desc'        => '',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'styling_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      
      array(
        'id'          => 'header_top_menu_background_color___sublevels',
        'label'       => 'Header Top Menu Background Color - Sublevels',
        'desc'        => '',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'styling_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'header_top_menu_font_color___sublevels',
        'label'       => 'Header Top Menu Font Color - Sublevels',
        'desc'        => '',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'styling_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'header_top_menu_hover_background_color___sublevels',
        'label'       => 'Header Top Menu Hover Background Color - Sublevels',
        'desc'        => '',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'styling_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'header_top_menu_hover_font_color___sublevels',
        'label'       => 'Header Top Menu Hover Font Color - Sublevels',
        'desc'        => '',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'styling_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'css_code',
        'label'       => 'CSS Code',
        'desc'        => 'Any custom CSS from the user should go in this field, it will override the theme CSS',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'custom_css',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      )
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( 'option_tree_settings_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
  
}