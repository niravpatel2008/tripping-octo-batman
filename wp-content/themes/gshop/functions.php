<?php
/**
 * gshop functions and definitions.
 *
 * Sets up the theme and provides some helper functions, which are used
 * in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 */
 
 if ( ! isset( $content_width ) ) $content_width = 900;
 /**
  * Optional: set 'ot_show_pages' filter to false.
 * This will hide the settings & documentation pages.
 */
 add_filter( 'ot_show_pages', '__return_false' );

 /**
 * Optional: set 'ot_show_new_layout' filter to false.
 * This will hide the "New Layout" section on the Theme Options page.
 */
 add_filter( 'ot_show_new_layout', '__return_false' );

 /**
 * Required: set 'ot_theme_mode' filter to true.bread
 */
 add_filter( 'ot_theme_mode', '__return_true' );

 /**
 * Required: include OptionTree.
 */
 load_template( trailingslashit( get_template_directory() ) . 'option-tree/ot-loader.php' );

 /* =============================================================================
	Include the Option-Tree Google Fonts Plugin
	========================================================================== */

	
 /**
 * Theme Options
 */
 load_template( trailingslashit( get_template_directory() ) . 'inc/admin/theme-options.php' );
 load_template( trailingslashit( get_template_directory() ) . 'pagebuilder/gshop-panels.php' );
 load_template( trailingslashit( get_template_directory() ) . 'inc/admin/function.php' );
 load_template( trailingslashit( get_template_directory() ) . 'inc/admin/rox-shortcodes/rox-shortcodes.php' );
 load_template( trailingslashit( get_template_directory() ) . 'inc/admin/widget.php' );

 /**
 * Frontend theme file
 */
 load_template( trailingslashit( get_template_directory() ) . 'inc/gshop-script.php' );
 
 /*
 * activation for all required and recommanded plugins
 */
 load_template( trailingslashit( get_template_directory() ) . 'lib/gshop-plugins.php' );


 /**
 * Sets up theme defaults and registers the various WordPress features that
 * gshop supports.
 *
 */
 
 function gshop_setup() {
	/*
	 * Makes gshop available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on gshop, use a find and replace
	 * to change 'gshop' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'gshop', get_template_directory() . '/languages' );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// This theme supports a variety of post formats.
	add_theme_support( 'post-formats', array( 'image', 'video' ) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'header', __( 'Main Menu', 'gshop' ) );
	register_nav_menu( 'header_top', __( 'Language', 'gshop' ) );
	

	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 670, 9999 ); // Unlimited height, soft crop
	//add_image_size('portfolio-small', 136, 110, true);
	add_image_size('portfolio-thumb', 300, 300, true);
	add_theme_support( 'woocommerce' );
 }
 add_action( 'after_setup_theme', 'gshop_setup' );
 
 /**
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string Filtered title.
 */
 function gshop_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'gshop' ), max( $paged, $page ) );

	return $title;
 }
 add_filter( 'wp_title', 'gshop_wp_title', 10, 2 );
 
 /**
 * Extends the default WordPress body class to denote:
 * 1. Using a full-width layout, when no active widgets in the sidebar
 *    or full-width template.
 * 2. Front Page template: thumbnail in use and number of sidebars for
 *    widget areas.
 * 3. White or empty background color to change the layout and spacing.
 * 4. Custom fonts enabled.
 * 5. Single or multiple authors.
 *0
 *
 * @param array Existing class values.
 * @return array Filtered class values.
 */
	function gshop_body_class( $classes ) {
		$site_layout = ot_get_option( 'site_layout', array() );
		$background_color = get_background_color();
		$default_sidebar_position = ot_get_option( 'default_sidebar_position', array() );
		$product_sidebar_option_single = ot_get_option( 'product_sidebar_option_single', array() );
		$product_sidebar_position = ot_get_option( 'product_sidebar_position', array() );
	
		if($site_layout == 'boxed')
			$classes[] = 'boxed';
		
		if ( is_page_template( 'page-templates/page-sidebar.php' ) )
			$classes[] = 'sidebar';	
		if( class_exists( 'Woocommerce' ) )
			$classes[] = 'woocommerce-page';	
		
		if( $default_sidebar_position == 'right' )
			$classes[] = 'sidebar-right';
			
		if( $default_sidebar_position != 'right' )
			$classes[] = 'sidebar-left';
	
		if ( is_page_template( 'page-templates/front-page.php' ) ) {
			$classes[] = 'template-front-page';
			if ( has_post_thumbnail() )
				$classes[] = 'has-post-thumbnail';
			if ( is_active_sidebar( 'sidebar-2' ) && is_active_sidebar( 'sidebar-3' ) )
				$classes[] = 'two-sidebars';
		}
	
		if ( empty( $background_color ) )
			$classes[] = 'custom-background-empty';
		elseif ( in_array( $background_color, array( 'fff', 'ffffff' ) ) )
			$classes[] = 'custom-background-white';
	
		// Enable custom font class only if the font CSS is queued to load.
		if ( wp_style_is( 'gshop-fonts', 'queue' ) )
			$classes[] = 'custom-font-enabled';
	
		if ( ! is_multi_author() )
			$classes[] = 'single-author';
	
		return $classes;
	}
	add_filter( 'body_class', 'gshop_body_class' );
 
 /**
 * Makes our wp_nav_menu() fallback -- wp_page_menu() -- show a home link.
 *
 */
 function gshop_page_menu_args( $args ) {
	if ( ! isset( $args['show_home'] ) )
		$args['show_home'] = true;
	return $args;
 }
 add_filter( 'wp_page_menu_args', 'gshop_page_menu_args' );


 if ( ! function_exists( 'gshop_content_nav' ) ) :
	/**
	 * Displays navigation to next/previous pages when applicable.
	 *
	 */
	function gshop_content_nav( $html_id ) {
		global $wp_query;
	
		$html_id = esc_attr( $html_id );
	
		if ( $wp_query->max_num_pages > 1 ) : ?>
			<nav id="<?php echo $html_id; ?>" class="navigation" role="navigation">
				<h3 class="assistive-text"><?php _e( 'Post navigation', 'gshop' ); ?></h3>
				<div class="nav-previous alignleft"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'gshop' ) ); ?></div>
				<div class="nav-next alignright"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'gshop' ) ); ?></div>
			</nav><!-- #<?php echo $html_id; ?> .navigation -->
		<?php endif;
	}
 endif;
 
 function gshop_default_main_menu(){
	$html = '';
	$html .='<ul class="nav navbar-nav" id="menu-header-menu-1">
			 <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1 current-menu-item">
			 <a href="' .home_url(). '/wp-admin/nav-menus.php" target="_blank">menu settings</a></li>
             </ul>';
  echo $html;
 }
 
 function gshop_default_top_menu(){
	 $html = '';
	$html .='<ul class="list-inline language"><li class="item-language"><a href="#">EN</a></li></ul>';
  echo $html;
 }
 
 function gshop_custom_login_logo() {
	 $admin_logo = ot_get_option( 'admin_logo' );
	 $logo = ot_get_option('logo');
	 if( $admin_logo != '' ){
		 $admin_logo_image = $admin_logo;
	 } elseif( $logo != '' ){
		 $admin_logo_image = $logo;
	 } else {
		 $admin_logo_image = get_template_directory_uri() . '/images/logo.png';
	 }
	 echo '<style type="text/css">
     h1 a { background-image: url(' . $admin_logo_image . ')!important; }
   </style>';
 }
 add_action('login_head', 'gshop_custom_login_logo');


 if ( ! function_exists( 'gshop_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own gshop_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 */
 function gshop_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'gshop' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'gshop' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div class="comment" id="comment-<?php comment_ID(); ?>">
        <?php echo get_avatar( $comment, 44 ); ?>
        	<div class="commentbody">
            	<p class="comment-meta"><time datetime="<?php echo get_comment_time( 'c' ); ?>"><?php comment_date('l, d F Y G:i'); ?></time> | posted by <strong><?php echo get_comment_author_link(); ?> - </strong> <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( '<i class="icon-reply"></i>', 'gshop' ), 'after' => '', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></p>
                <?php comment_text(); ?>
            </div><!-- .comment-content -->            
         </div>
			
		
        
	<?php
		break;
	endswitch; // end comment_type check
 }
 endif;
 
 // gshop comments form
 function gshop_comment_form( $args = array(), $post_id = null ) {
	if ( null === $post_id )
		$post_id = get_the_ID();
	else
		$id = $post_id;

	$commenter = wp_get_current_commenter();
	$user = wp_get_current_user();
	$user_identity = $user->exists() ? $user->display_name : '';

	if ( ! isset( $args['format'] ) )
		$args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';

	$req      = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$html5    = 'html5' === $args['format'];
	$fields   =  array(
		'author' => '<div class="col-lg-4"><div class="form-group"><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . '  placeholder="' . __( 'Name', 'gshop' ) . '" class="form-control" /></div>',
		'email'  => '<div class="form-group"><input id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' placeholder="' . __( 'Email', 'gshop' ) . '" class="form-control" /></div>',
		'url'    => '<div class="form-group"><input id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" placeholder="' . __( 'Website', 'gshop' ) . '" class="form-control" /></div></div>',
	);

	$required_text = sprintf( ' ' . __('Required fields are marked %s', 'gshop'), '<span class="required">*</span>' );
	$defaults = array(
		'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
		'comment_field'        => '<div class="col-lg-8"><div class="form-group"><textarea id="comment" name="comment" aria-required="true" rows="6" placeholder="' . __( 'Message', 'gshop' ) . '" class="form-control"></textarea></div></div>',
		'must_log_in'          => '<p class="must-log-in">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
		'logged_in_as'         => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ), get_edit_user_link(), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
		'comment_notes_before' => '<p class="comment-notes">' . __( 'Your email address will not be published.', 'gshop' ) . ( $req ? $required_text : '' ) . '</p>',
		
		'id_form'              => 'commentform',
		'id_submit'            => 'submit',
		'title_reply'          => __( 'Post a comment', 'gshop' ),
		'title_reply_to'       => __( 'Post a comment to %s', 'gshop' ),
		'cancel_reply_link'    => __( 'Cancel reply', 'gshop' ),
		'label_submit'         => __( 'Post', 'gshop' ),
		'format'               => 'xhtml',
	);

	$args = wp_parse_args( $args, apply_filters( 'comment_form_defaults', $defaults ) );

	?>
		<?php if ( comments_open( $post_id ) ) : ?>
			<?php do_action( 'comment_form_before' ); ?>
			<div class="blog-comment-form">
              <div class="title-content">
                <h3 class="title"><?php comment_form_title( $args['title_reply'], $args['title_reply_to'] ); ?> <small><?php cancel_comment_reply_link( $args['cancel_reply_link'] ); ?></small></h3>
                <div class="title-border"><span></span></div>
              </div>
				<?php if ( get_option( 'comment_registration' ) && !is_user_logged_in() ) : ?>
					<?php echo $args['must_log_in']; ?>
					<?php do_action( 'comment_form_must_log_in_after' ); ?>
				<?php else : ?>
					<form action="<?php echo site_url( '/wp-comments-post.php' ); ?>" method="post" id="<?php echo esc_attr( $args['id_form'] ); ?>" class="comment-form"<?php echo $html5 ? ' novalidate' : ''; ?>>
                    <?php if ( is_user_logged_in() ) : ?>
					  <?php echo apply_filters( 'comment_form_logged_in', $args['logged_in_as'], $commenter, $user_identity ); ?>
                    <?php endif; ?>
                      <div class="row">
                    	
						<?php do_action( 'comment_form_top' ); ?>
						
						<?php if ( is_user_logged_in() ) : ?>
							<?php do_action( 'comment_form_logged_in_after', $commenter, $user_identity ); ?>
                             <?php echo apply_filters( 'comment_form_field_comment', $args['comment_field'] ); ?>
						<?php else : ?>
							<?php
							do_action( 'comment_form_before_fields' ); ?>
                            <?php
								foreach ( (array) $args['fields'] as $name => $field ) {
									echo apply_filters( "comment_form_field_{$name}", $field ) . "\n";
								}
							?>
                            <?php echo apply_filters( 'comment_form_field_comment', $args['comment_field'] ); ?>
							<?php
							do_action( 'comment_form_after_fields' );
							?>
						<?php endif; ?>
                        
						<?php if ( is_user_logged_in() ) : ?>
                        <div class="col-lg-6">
                        <?php else: ?>
                        <div class="col-lg-2 col-lg-offset-4">
                        <?php endif; ?>
                          <input type="submit" class="submit-btn" id="<?php echo esc_attr( $args['id_submit'] ); ?>" value="<?php echo esc_attr( $args['label_submit'] ); ?>" />
                          <?php comment_id_fields( $post_id ); ?>
                        </div>
						<?php do_action( 'comment_form', $post_id ); ?>
                      </div><!--.row-->
					</form>
				<?php endif; ?>
			</div><!--.blog-comment-form-->
			<?php do_action( 'comment_form_after' ); ?>
		<?php else : ?>
			<?php do_action( 'comment_form_comments_closed' ); ?>
		<?php endif; ?>
	<?php
 }
 
 function gshop_breadcrumbs() {
  
  $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
  $delimiter = '<img src="'.get_template_directory_uri() . '/images/delimiter.png" alt="delimiter" />'; // delimiter between crumbs
  $bredcrumb_menu_prefix = ot_get_option('bredcrumb_menu_prefix');
  if( $bredcrumb_menu_prefix != '' ){
	  $home = $bredcrumb_menu_prefix;
  } else {
  $home = 'Home'; // text for the 'Home' link
  }
  $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
  $before = '<li><span class="current">'; // tag before the current crumb
  $after = '</span></li>'; // tag after the current crumb
  
  global $post;
  $homeLink = home_url();
  
  if (is_home() || is_front_page()) {
  
    if ($showOnHome == 1) echo '<ul class="list-inline"><li><a href="' . $homeLink . '">' . $home . '</a></li></ul>';
  
  } else {
  
    echo '<ul class="list-inline"><li><a href="' . $homeLink . '">' . $home . '</a>' . $delimiter . '</li>';
  
    if ( is_category() ) {
      $thisCat = get_category(get_query_var('cat'), false);
      if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
      echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;
  
    } elseif ( is_search() ) {
      echo $before . 'Search results for "' . get_search_query() . '"' . $after;
  
    } elseif ( is_day() ) {
      echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' </li>';
      echo '<li><a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . '</li> ';
      echo $before . get_the_time('d') . $after;
  
    } elseif ( is_month() ) {
      echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . '</li> ';
      echo $before . get_the_time('F') . $after;
  
    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;
  
    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<li><a href="' .get_post_type_archive_link( get_post_type() ) . '">' . $post_type->labels->singular_name . '</a>' . $delimiter . '</li>';
        if ($showCurrent == 1) echo $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
        echo '<li>' .$cats. '</li>';
        if ($showCurrent == 1) echo $before . get_the_title() . $after;
      }
  
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;
  
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      echo '<li><a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>' . $delimiter . '</li>';
      if ($showCurrent == 1) echo ' ' . $before . get_the_title() . $after;
  
    } elseif ( is_page() && !$post->post_parent ) {
      if ($showCurrent == 1) echo $before . get_the_title() . $after;
  
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a> '.$delimiter.' </li>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      for ($i = 0; $i < count($breadcrumbs); $i++) {
        echo $breadcrumbs[$i];
        if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
      }
      if ($showCurrent == 1) echo ' ' . $before . get_the_title() . $after;
  
    } elseif ( is_tag() ) {
      echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
  
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . 'Articles posted by ' . $userdata->display_name . $after;
  
    } elseif ( is_404() ) {
      echo $before . 'Error 404' . $after;
    }
  
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo '<li>(';
      echo __('Page', 'gshop') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')</li>';
    }
  
    echo '</ul>';
  
  }
} // end gshop_breadcrumbs()

function rox_get_image_id($image_url) {
	global $wpdb;
	$prefix = $wpdb->prefix;
	$attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM " . $prefix . "posts" . " WHERE guid='%s';", $image_url )); 
        return $attachment[0]; 
}

function gshop_numeric_posts_nav() {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="navigation"><ul class="list-inline">' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li>%s</li>' . "\n", get_previous_posts_link( '&laquo; Previous' ) );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>&hellip;</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>&hellip;</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li>%s</li>' . "\n", get_next_posts_link( 'Next &raquo;' ) );

	echo '</ul></div>' . "\n";

}

function gshop_social_sharing_box( $permalink ){
	
	$social_box_facebook = ot_get_option( 'show_box_facebook' );
	$social_box_twitter = ot_get_option( 'show_box_twitter' );
	$social_box_linkedin = ot_get_option( 'show_box_linkedin' );
	$social_box_google_plus = ot_get_option( 'show_box_google_plus' );
	$social_box_pinterest = ot_get_option( 'show_box_pinterest' );
	
	$html = '';
	$html .= '<div id="fb-root"></div>';
	$html .= '<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=150189175073628";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, "script", "facebook-jssdk"));</script>';
	$html .= '<div class="addthis_toolbox addthis_default_style">';
	if( !empty( $social_box_facebook ) ){
		$html .= '<div class="fb-like" data-href="' . $permalink . '" data-width="150" data-layout="button_count" data-show-faces="false" data-send="false"></div>';
	}
	
	if( !empty( $social_box_twitter ) ){
		$html .= '<a class="addthis_button_tweet"></a>';
	}
	
	if( !empty( $social_box_google_plus ) ){
		$html .= '<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>';
	}
	
	if( !empty( $social_box_pinterest ) ){
		$html .= '<a class="addthis_button_pinterest_pinit"></a>';
	}
	
	if( !empty( $social_box_linkedin ) ){
		$html .= '<a class="addthis_button_linkedin_counter"></a>';
	}
	
	$html .= '</div>';
	$html .= '<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>';
	$html .= '<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-522705b968677009"></script>';
	
	echo $html;
 
}

function fix_my_gallery_wpse43558($output, $attr) {
    global $post;

    static $instance = 0;
    $instance++;


    /**
     *  will remove this since we don't want an endless loop going on here
     */
    // Allow plugins/themes to override the default gallery template.
    //$output = apply_filters('post_gallery', '', $attr);

    // We're trusting author input, so let's at least make sure it looks like a valid orderby statement
    if ( isset( $attr['orderby'] ) ) {
        $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
        if ( !$attr['orderby'] )
            unset( $attr['orderby'] );
    }

    extract(shortcode_atts(array(
        'order'      => 'ASC',
        'orderby'    => 'menu_order ID',
        'id'         => $post->ID,
        'itemtag'    => 'li',
        'icontag'    => 'dt',
        'captiontag' => 'dd',
        'columns'    => 3,
        'size'       => 'portfolio-thumb',
        'include'    => '',
        'exclude'    => ''
    ), $attr));

    $id = intval($id);
    if ( 'RAND' == $order )
        $orderby = 'none';

    if ( !empty($include) ) {
        $include = preg_replace( '/[^0-9,]+/', '', $include );
        $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

        $attachments = array();
        foreach ( $_attachments as $key => $val ) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    } elseif ( !empty($exclude) ) {
        $exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
        $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    } else {
        $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    }

    if ( empty($attachments) )
        return '';

    if ( is_feed() ) {
        $output = "\n";
        foreach ( $attachments as $att_id => $attachment )
            $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
        return $output;
    }

    $itemtag = tag_escape($itemtag);
    $captiontag = tag_escape($captiontag);
    $columns = intval($columns);
    $itemwidth = $columns > 0 ? floor(100/$columns) : 100;
    $float = is_rtl() ? 'right' : 'left';

    $selector = "gallery-{$instance}";

    $gallery_style = $gallery_div = '';
    if ( apply_filters( 'use_default_gallery_style', true ) )
        /**
         * this is the css you want to remove
         *  #1 in question
         */
        /*
        */
    $size_class = sanitize_html_class( $size );
    $gallery_div = "<div id='$selector' class='gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'><ul class='list-inline og-grid'>";
    $output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );

    $i = 0;
    foreach ( $attachments as $id => $attachment ) {
        $link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);
		 $image_url = wp_get_attachment_url($id, $size, false, false);

        $output .= "<{$itemtag} class='gallery-item'>";
        $output .= "<{$icontag} class='gallery-icon'><div class=''>$link</div>
            </{$icontag}>";
        
    }
    $output .= "</ul></div>\n";
    return $output;
}
add_filter("post_gallery", "fix_my_gallery_wpse43558",10,2);
function modify_attachment_link( $markup, $id, $size, $permalink, $icon, $text )
{

    // We need just thumbnails.
    if ( 'portfolio-thumb' !== $size )
    {   // Return the original string untouched.

        return $markup;
    }

       

    // Recreate the missing information.
    $_post      = get_post( $id );
    $new_url  = wp_get_attachment_url( $_post->ID, 'portfolio-large' );
    $post_title = esc_attr( $_post->post_title );

    if ( $text ) 
    {
        $link_text = esc_attr( $text );
    } 
    elseif ( 
           ( is_int( $size )    && $size != 0 ) 
        or ( is_string( $size ) && $size != 'none' ) 
        or $size != FALSE 
    ) 
    {
        $link_text = wp_get_attachment_image( $id, $size, $icon );
    } 
    else 
    {
        $link_text = '';
    }

    if ( trim( $link_text ) == '' )
    {
        $link_text = $_post->post_title;
    }
    return "<div class='blog-thumbnail element' data-zoom='$new_url' data-link=''></div>{$link_text}";
}

add_filter( 'wp_get_attachment_link', 'modify_attachment_link', 10, 6 );
 
/**
* Count number of widgets in a sidebar
* Used to add classes to widget areas so widgets can be displayed one, two, three or four per row
*/
function gshop_count_widgets( $sidebar_id ) {
// If loading from front page, consult $_wp_sidebars_widgets rather than options
// to see if wp_convert_widget_settings() has made manipulations in memory.
global $_wp_sidebars_widgets;
if ( empty( $_wp_sidebars_widgets ) )
$_wp_sidebars_widgets = get_option( 'sidebars_widgets', array() );
$sidebars_widgets_count = $_wp_sidebars_widgets;
 
if ( isset( $sidebars_widgets_count[ $sidebar_id ] ) ) :
$widget_count = count( $sidebars_widgets_count[ $sidebar_id ] );
return $widget_count;
endif;
}

load_template( trailingslashit( get_template_directory() ) . 'inc/woocommerce/woocommerce.php' );
?>
