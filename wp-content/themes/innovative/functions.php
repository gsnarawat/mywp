<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Theme's Functions and Definitions
 *
 *
 * @file           functions.php
 * @package        innovative 
 * @author         Cyberspeclab 
 * @copyright      cyberspeclab.com 2013
 * @license        license.txt
 * @version        Release: 1.2.1
 * @filesource     wp-content/themes/innovative/includes/functions.php
 * @link           http://codex.wordpress.org/Theme_Development#Functions_File
 * @since          available since Release 1.0
 */
?>
<?php
/*
 * Globalize Theme options
 */
$innovative_options = innovative_get_options();

/*
 * Hook options
 */
add_action('admin_init', 'innovative_theme_options_init');
add_action('admin_menu', 'innovative_theme_options_add_page');

/**
 * Retrieve Theme option settings
 */
function innovative_get_options() {
  // Globalize the variable that holds the Theme options
  global $innovative_options;
  // Parse array of option defaults against user-configured Theme options
  $innovative_options = wp_parse_args( get_option( 'innovative_theme_options', array() ), innovative_get_option_defaults() );
  // Return parsed args array
  return $innovative_options;
}

/**
 * innovative Theme option defaults
 */
function innovative_get_option_defaults() {
  $defaults = array(
    'breadcrumb'						=> false,
    'cta_button'						=> false,
    'front_page'						=> 1,
    'home_headline'						=> null,
    'home_subheadline'					=> null,
    'home_content_area'					=> null,
    'cta_text'							=> null,
    'cta_url'							=> null,
    'featured_content'					=> null,
    'google_site_verification'			=> '',
    'bing_site_verification'			=> '',
    'yahoo_site_verification'			=> '',
    'site_statistics_tracker'			=> '',
    'twitter_uid'						=> '',
    'facebook_uid'						=> '',
    'linkedin_uid'						=> '',
    'youtube_uid'						=> '',
    'stumble_uid'						=> '',
    'rss_uid'							=> '',
    'google_plus_uid'					=> '',
    'instagram_uid'						=> '',
    'pinterest_uid'						=> '',
    'yelp_uid'							=> '',
    'vimeo_uid'							=> '',
    'foursquare_uid'					=> '',
    'innovative_inline_css'				=> '',
    'innovative_inline_js_head'			=> '',
    'innovative_inline_css_js_footer'	=> '',
    'static_page_layout_default'		=> 'content-sidebar-page',
    'single_post_layout_default'		=> 'content-sidebar-page',
    'blog_posts_index_layout_default'	=> 'content-sidebar-page',
  );
  return apply_filters( 'innovative_option_defaults', $defaults );
}

/**
 * Fire up the engines boys and girls let's start theme setup.
 */
add_action('after_setup_theme', 'innovative_setup');

if (!function_exists('innovative_setup')):

    function innovative_setup() {

        global $content_width;

		$template_directory = get_template_directory();
		
        /**
         * Set the content width based on the theme's design and stylesheet.
         */
        if (!isset($content_width))
            $content_width = 550;/* pixels */

		/**
		 * innovative is now available for translations.
		 * The translation files are in the /languages/ directory.
		 * Translations are pulled from the WordPress default lanaguge folder
		 * then from the child theme and then lastly from the parent theme.
		 * @see http://codex.wordpress.org/Function_Reference/load_theme_textdomain
		 */

			$domain = 'innovative';

			load_theme_textdomain( $domain, WP_LANG_DIR . '/innovative/' );
			load_theme_textdomain( $domain, get_stylesheet_directory() . '/languages/' );
			load_theme_textdomain( $domain, get_template_directory() . '/languages/' );

        /**
         * Add callback for custom TinyMCE editor stylesheets. (editor-style.css)
         * @see http://codex.wordpress.org/Function_Reference/add_editor_style
         */
        add_editor_style();

        /**
         * This feature enables post and comment RSS feed links to head.
         * @see http://codex.wordpress.org/Function_Reference/add_theme_support#Feed_Links
         */
        add_theme_support('automatic-feed-links');

        /**
         * This feature enables post-thumbnail support for a theme.
         * @see http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support('post-thumbnails');

		/**
		 * This feature enables woocommerce support for a theme.
		 * @see http://www.woothemes.com/2013/02/last-call-for-testing-woocommerce-2-0-coming-march-4th/
		 */
		add_theme_support( 'woocommerce' );
		
		 /* load the theme function files
 */
require ( get_template_directory() . '/inc/theme-options.php' );
require ( get_template_directory() . '/inc/post-custom-meta.php' );
require ( get_template_directory() . '/inc/tha-theme-hooks.php' );
require ( get_template_directory() . '/inc/hooks.php' );
require ( get_template_directory() . '/inc/version.php' );


        /**
         * This feature enables custom-menus support for a theme.
         */	
        register_nav_menus(array(
			'top-menu'         => __('Top Menu', 'innovative'),
	        'header-menu'      => __('Header Menu', 'innovative'),
	        'sub-header-menu'  => __('Sub-Header Menu', 'innovative'),
			'footer-menu'      => __('Footer Menu', 'innovative')
		    )
	    );

		if ( function_exists('get_custom_header')) {
			
        add_theme_support('custom-background');
		
		} else {
		
		// < 3.4 Backward Compatibility
		
		/**
         * This feature allows users to use custom background for a theme.
         */
		
        add_custom_background();
		
		}

		// WordPress 3.4 >
		if (function_exists('get_custom_header')) {
			
		add_theme_support('custom-header', array (
	        // Header image default
	       'default-image'			=> get_template_directory_uri() . '/inc/img/default-image.png',
	        // Header text display default
	       'header-text'			=> false,
	        // Header image flex width
		   'flex-width'             => true,
	        // Header image width (in pixels)
	       'width'				    => 300,
		    // Header image flex height
		   'flex-height'            => true,
	        // Header image height (in pixels)
	       'height'			        => 100,
	        // Admin header style callback
	       'admin-head-callback'	=> 'innovative_admin_header_style'));
		   
		// gets included in the admin header
        function innovative_admin_header_style() {
            ?><style type="text/css">
                .appearance_page_custom-header #headimg {
					background-repeat:no-repeat;
					border:none;
				}
             </style><?php
        }		  
	   
	    } else {
		   
        // Backward Compatibility
		
		/**
         * This feature adds a callbacks for image header display.
		 * In our case we are using this to display logo.
         */
        define('HEADER_TEXTCOLOR', '');
        define('HEADER_IMAGE', '%s/inc/img/default-image.png'); // %s is the template dir uri
        define('HEADER_IMAGE_WIDTH', 300); // use width and height appropriate for your theme
        define('HEADER_IMAGE_HEIGHT', 100);
        define('NO_HEADER_TEXT', true);
		
		
		// gets included in the admin header
        function innovative_admin_header_style() {
            ?><style type="text/css">
                #headimg {
	                background-repeat:no-repeat;
                    border:none !important;
                    width:<?php echo HEADER_IMAGE_WIDTH; ?>px;
                    height:<?php echo HEADER_IMAGE_HEIGHT; ?>px;
                }
             </style><?php
         }
         
		 add_custom_image_header('', 'innovative_admin_header_style');
		
	    }
			
		// While upgrading set theme option front page toggle not to affect old setup.
		$innovative_options = get_option( 'innovative_theme_options' );
		if( $innovative_options && isset( $_GET['activated'] ) ) {
		
			// If front_page is not in theme option previously then set it.
			if( !isset( $innovative_options['front_page'] )) {
			
				// Get template of page which is set as static front page
				$template = get_post_meta( get_option( 'page_on_front' ), '_wp_page_template', true );
				
				// If static front page template is set to default then set front page toggle of theme option to 1
				if( 'page' == get_option( 'show_on_front' ) && $template == 'default' ) {
					$innovative_options['front_page'] = 1;
				}
				else {
					$innovative_options['front_page'] = 0;
				}
				update_option( 'innovative_theme_options', $innovative_options );
			}
		}
    }

endif;

/**
 * Set a fallback menu that will show a home link.
 */
 
function innovative_fallback_menu() {
	$args = array(
		'depth'       => 0,
		'sort_column' => 'menu_order, post_title',
		'menu_class'  => 'menu',
		'include'     => '',
		'exclude'     => '',
		'echo'        => false,
		'show_home'   => true,
		'link_before' => '',
		'link_after'  => ''
	);
	$pages = wp_page_menu( $args );
	$prepend = '<div class="main-nav">';
	$append = '</div>';
	$output = $prepend.$pages.$append;
	echo $output;
}

/**
 * This function removes .menu class from custom menus
 * in widgets only and fallback's on default widget lists
 * and assigns new unique class called .menu-widget
 * 
 * Marko Heijnen Contribution
 *
 */
class innovative_widget_menu_class {
	public function __construct() {
		add_action( 'widget_display_callback', array( $this, 'menu_different_class' ), 10, 2 );
	}
 
	public function menu_different_class( $settings, $widget ) {
		if( $widget instanceof WP_Nav_Menu_Widget )
			add_filter( 'wp_nav_menu_args', array( $this, 'wp_nav_menu_args' ) );
 
		return $settings;
	}
 
	public function wp_nav_menu_args( $args ) {
		remove_filter( 'wp_nav_menu_args', array( $this, 'wp_nav_menu_args' ) );
 
		if( 'menu' == $args['menu_class'] )
			$args['menu_class'] = 'menu-widget';
 
		return $args;
	}
}
new innovative_widget_menu_class();

/**
 * Removes div from wp_page_menu() and replace with ul.
 */
function innovative_wp_page_menu ($page_markup) {
    preg_match('/^<div class=\"([a-z0-9-_]+)\">/i', $page_markup, $matches);
        $divclass = $matches[1];
        $replace = array('<div class="'.$divclass.'">', '</div>');
        $new_markup = str_replace($replace, '', $page_markup);
        $new_markup = preg_replace('/^<ul>/i', '<ul class="'.$divclass.'">', $new_markup);
        return $new_markup; }

add_filter('wp_page_menu', 'innovative_wp_page_menu');

/**
 * wp_title() Filter for better SEO.
 *
 * Adopted from Twenty Twelve
 * @see http://codex.wordpress.org/Plugin_API/Filter_Reference/wp_title
 *
 */
if ( !function_exists('innovative_wp_title') && !defined( 'AIOSEOP_VERSION' ) ) :

	function innovative_wp_title( $title, $sep ) {
		global $page, $paged;

		if ( is_feed() )
			return $title;

		// Add the site name.
		$title .= get_bloginfo( 'name' );

		// Add the site description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			$title .= " $sep $site_description";

		// Add a page number if necessary.
		if ( $paged >= 2 || $page >= 2 )
			$title .= " $sep " . sprintf( __( 'Page %s', 'innovative' ), max( $paged, $page ) );

		return $title;
	}
	add_filter( 'wp_title', 'innovative_wp_title', 10, 2 );

endif;

/**
 * Filter 'get_comments_number'
 * 
 * Filter 'get_comments_number' to display correct 
 * number of comments (count only comments, not 
 * trackbacks/pingbacks)
 *
 * Chip Bennett Contribution
 */
function innovative_comment_count( $count ) {  
	if ( ! is_admin() ) {
		global $id;
		$comments_by_type = &separate_comments(get_comments('status=approve&post_id=' . $id));
		return count($comments_by_type['comment']);
	} else {
		return $count;
	}
}
add_filter('get_comments_number', 'innovative_comment_count', 0);

/**
 * wp_list_comments() Pings Callback
 * 
 * wp_list_comments() Callback function for 
 * Pings (Trackbacks/Pingbacks)
 */
function innovative_comment_list_pings( $comment ) {
	$GLOBALS['comment'] = $comment;
?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php }

/**
 * Sets the post excerpt length to 40 words.
 * Adopted from Coraline
 */
function innovative_excerpt_length($length) {
    return 40;
}

add_filter('excerpt_length', 'innovative_excerpt_length');

/**
 * Returns a "Read more" link for excerpts
 */
function innovative_read_more() {
    return '<div class="read-more"><a href="' . get_permalink() . '">' . __('Read more &#8250;', 'innovative') . '</a></div><!-- end of .read-more -->';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and innovative_read_more_link().
 */
function innovative_auto_excerpt_more($more) {
    return '<span class="ellipsis">&hellip;</span>' . innovative_read_more();
}

add_filter('excerpt_more', 'innovative_auto_excerpt_more');

/**
 * Adds a pretty "Read more" link to custom post excerpts.
 */
function innovative_custom_excerpt_more($output) {
    if (has_excerpt() && !is_attachment()) {
        $output .= innovative_read_more();
    }
    return $output;
}

add_filter('get_the_excerpt', 'innovative_custom_excerpt_more');


/**
 * This function removes inline styles set by WordPress gallery.
 */
function innovative_remove_gallery_css($css) {
    return preg_replace("#<style type='text/css'>(.*?)</style>#s", '', $css);
}

add_filter('gallery_style', 'innovative_remove_gallery_css');

/**
 * This function removes default styles set by WordPress recent comments widget.
 */
function innovative_remove_recent_comments_style() {
	global $wp_widget_factory;
	if ( isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments']) )
		remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'innovative_remove_recent_comments_style' );

/**
 * This function prints post meta data.
 *
 * Ulrich Pogson Contribution 
 *
 */
if (!function_exists('innovative_post_meta_data')) :

function innovative_post_meta_data() {
	printf( __( '<span class="%1$s">Posted on </span>%2$s<span class="%3$s"> by </span>%4$s', 'innovative' ),
	'meta-prep meta-prep-author posted', 
	sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="timestamp updated">%3$s</span></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_html( get_the_date() )
	),
	'byline',
	sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
		get_author_posts_url( get_the_author_meta( 'ID' ) ),
		sprintf( esc_attr__( 'View all posts by %s', 'innovative' ), get_the_author() ),
		esc_attr( get_the_author() )
		)
	);
}
endif;

/**
 * This function removes WordPress generated category and tag atributes.
 * For W3C validation purposes only.
 * 
 */
function innovative_category_rel_removal ($output) {
    $output = str_replace(' rel="category tag"', '', $output);
    return $output;
}

add_filter('wp_list_categories', 'innovative_category_rel_removal');
add_filter('the_category', 'innovative_category_rel_removal');

/**
 * Breadcrumb Lists
 * Allows visitors to quickly navigate back to a previous section or the root page.
 *
 * Adopted from Dimox
 *
 */
if (!function_exists('innovative_breadcrumb_lists')) :

function innovative_breadcrumb_lists() {

	/* === OPTIONS === */
	$text['home']     = __('Home','innovative'); // text for the 'Home' link
	$text['category'] = __('Archive for %s','innovative'); // text for a category page
	$text['search']   = __('Search results for: %s','innovative'); // text for a search results page
	$text['tag']      = __('Posts tagged %s','innovative'); // text for a tag page
	$text['author']   = __('View all posts by %s','innovative'); // text for an author page
	$text['404']      = __('Error 404','innovative'); // text for the 404 page

	$showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
	$showOnHome  = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
	$delimiter   = ' <span class="chevron">&#8250;</span> '; // delimiter between crumbs
	$before      = '<span class="breadcrumb-current">'; // tag before the current crumb
	$after       = '</span>'; // tag after the current crumb
	/* === END OF OPTIONS === */

	global $post, $paged, $page;
	$homeLink = home_url('/');
	$linkBefore = '<span class="breadcrumb" typeof="v:Breadcrumb">';
	$linkAfter = '</span>';
	$linkAttr = ' rel="v:url" property="v:title"';
	$link = $linkBefore . '<a' . $linkAttr . ' href="%1$s">%2$s</a>' . $linkAfter;

	if ( is_front_page()) {

		if ($showOnHome == 1) echo '<div class="breadcrumb-list"><a href="' . $homeLink . '">' . $text['home'] . '</a></div>';

	} else {

		echo '<div class="breadcrumb-list" xmlns:v="http://rdf.data-vocabulary.org/#">' . sprintf($link, $homeLink, $text['home']) . $delimiter;

		if ( is_home() ) {
			if ($showCurrent == 1) echo $before . get_the_title( get_option('page_for_posts', true) ) . $after;

		} elseif ( is_category() ) {
			$thisCat = get_category(get_query_var('cat'), false);
			if ($thisCat->parent != 0) {
				$cats = get_category_parents($thisCat->parent, true, $delimiter);
				$cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
				$cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
				echo $cats;
			}
			echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;

		} elseif ( is_search() ) {
			echo $before . sprintf($text['search'], get_search_query()) . $after;

		} elseif ( is_day() ) {
			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
			echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;
			echo $before . get_the_time('d') . $after;

		} elseif ( is_month() ) {
			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
			echo $before . get_the_time('F') . $after;

		} elseif ( is_year() ) {
			echo $before . get_the_time('Y') . $after;

		} elseif ( is_single() && !is_attachment() ) {
			if ( get_post_type() != 'post' ) {
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				printf($link, $homeLink . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
				if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;
			} else {
				$cat = get_the_category(); $cat = $cat[0];
				$cats = get_category_parents($cat, true, $delimiter);
				if ($showCurrent == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
				$cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
				$cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
				echo $cats;
				if ($showCurrent == 1) echo $before . get_the_title() . $after;
			}

		} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
			$post_type = get_post_type_object(get_post_type());
			echo $before . $post_type->labels->singular_name . $after;

		} elseif ( is_attachment() ) {
			$parent = get_post($post->post_parent);
			$cat = get_the_category($parent->ID);
			
			if ( isset( $cat[0] ) ) {
				$cat = $cat[0];
			}
			
			if( $cat ) {
				$cats = get_category_parents($cat, true, $delimiter);
				$cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
				$cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
				echo $cats;
			}
			
			printf($link, get_permalink($parent), $parent->post_title);
			if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;

		} elseif ( is_page() && !$post->post_parent ) {
			if ($showCurrent == 1) echo $before . get_the_title() . $after;

		} elseif ( is_page() && $post->post_parent ) {
			$parent_id  = $post->post_parent;
			$breadcrumbs = array();
			while ($parent_id) {
				$page_child = get_page($parent_id);
				$breadcrumbs[] = sprintf($link, get_permalink($page_child->ID), get_the_title($page_child->ID));
				$parent_id  = $page_child->post_parent;
			}
			$breadcrumbs = array_reverse($breadcrumbs);
			for ($i = 0; $i < count($breadcrumbs); $i++) {
				echo $breadcrumbs[$i];
				if ($i != count($breadcrumbs)-1) echo $delimiter;
			}
			if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;

		} elseif ( is_tag() ) {
			echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;

		} elseif ( is_author() ) {
	 		global $author;
			$userdata = get_userdata($author);
			echo $before . sprintf($text['author'], $userdata->display_name) . $after;

		} elseif ( is_404() ) {
			echo $before . $text['404'] . $after;

		}if ( get_query_var('paged') ) {
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
			echo $delimiter . sprintf( __( 'Page %s', 'innovative' ), max( $paged, $page ) );
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
		}

		echo '</div>';

	}
} // end innovative_breadcrumb_lists

endif;

	/**
	 * A safe way of adding stylesheets to a WordPress generated page.
	 */
	if (!is_admin())
		add_action('wp_enqueue_scripts', 'innovative_css');

	if ( !function_exists( 'innovative_css' ) ) {

		function innovative_css() {
			wp_enqueue_style( 'innovative-style', get_template_directory_uri() . '/style.css', false, '1.9.3.4' );
			wp_enqueue_style( 'innovative-media-queries', get_template_directory_uri() . '/inc/css/style.css', false, '1.9.3.4' );
			if ( is_rtl() ) {
				wp_enqueue_style( 'innovative-rtl-style', get_template_directory_uri() . '/rtl.css', false, '1.9.3.4' ); 
			}
			if ( is_child_theme() ) {
				wp_enqueue_style( 'innovative-child-style', get_stylesheet_uri(), false, '1.9.3.4' );
			}
		}

	}

    /**
     * A safe way of adding JavaScripts to a WordPress generated page.
     */
    if (!is_admin())
        add_action('wp_enqueue_scripts', 'innovative_js');

    if (!function_exists('innovative_js')) {

        function innovative_js() {
			$template_directory_uri = get_template_directory_uri();
			
			// JS at the bottom for fast page loading. 
			// except for Modernizr which enables HTML5 elements & feature detects.
			wp_enqueue_script('modernizr', $template_directory_uri . '/js/js/innovative-modernizr.js', array('jquery'), '2.6.1', false);
            wp_enqueue_script('innovative-scripts', $template_directory_uri . '/js/js/innovative-scripts.js', array('jquery'), '1.2.4', true);
        }

    }

    /**
     * A comment reply.
     */
        function innovative_enqueue_comment_reply() {
    if ( is_singular() && comments_open() && get_option('thread_comments')) { 
            wp_enqueue_script('comment-reply'); 
        }
    }

    add_action( 'wp_enqueue_scripts', 'innovative_enqueue_comment_reply' );

    /**
     * Theme options upgrade bar
     */
    function innovative_upgrade_bar() {
        ?>

        <div class="upgrade-callout">
            <p><img src="<?php echo get_template_directory_uri(); ?>/inc/img/themeoption-icon.png" alt="CyberSpecLab"/>
                <?php printf( __( 'Thank you for using Innovative! Innovative has more features, is safer and more stable than ever to help you build an awesome website. Enjoy it!&nbsp;', 'innovative' )); ?>
            
                    <a href="https://twitter.com/cyberspeclab" class="twitter-follow-button" data-show-count="false" data-size="small">Follow @cyberspeclab</a>
                    <script>!function (d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (!d.getElementById(id)) {
                                js = d.createElement(s);
                                js.id = id;
                                js.src = "//platform.twitter.com/widgets.js";
                                fjs.parentNode.insertBefore(js, fjs);
                            }
                        }(document, "script", "twitter-wjs");</script>
                
                    <iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FCyberSpecLab%2F162781543926606&amp;width=90&amp;height=21&amp;colorscheme=light&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;send=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:90px; height:21px;" allowTransparency="true"></iframe>
           </p>
        <table id="promotion" border="" bordercolor="" style="background-color:#81C7EF" width="100%" cellpadding="10" cellspacing="">
	<tr>
		<td><h2>Support the Developer</h2>
Either you are using one of our themes for personal or business purposes, we do our best to make it the perfect free theme for you. Any kind of sponsorship will be appreciated!<br><br><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&amp;business=cyberspeclabpro%40gmail%2ecom&amp;lc=US&amp;item_name=CyberSpecLab&amp;currency_code=USD&amp;bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted"><img alt="Donate Button with Credit Cards" src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" /></a></td>
		<td><h2>Upgrade to Pro Support</h2>
        Need further customization with our theme? Need some features changed or added with our theme? We have a special team that will help you with the customization. 24 Hours Live Support and Private Email Support. CSS, PHP and HTML expert assistance. <br><br><a href="http://cyberspeclab.com/pro-support/" class="prosupport">Pro Support</a></td>
	</tr>
</table>
       </div>

    <?php
    }
    add_action( 'innovative_theme_options','innovative_upgrade_bar', 1 );

    /**
     * Theme Options Support and Information
     */	
    function innovative_theme_support () {
    ?>
	
	<div id="info-box-wrapper" class="grid col-940">
		<div class="info-box notice">

			<a class="button button-primary" href="<?php echo esc_url('http://cyberspeclab.com/forum/','innovative'); ?>" title="<?php esc_attr_e('Forum', 'innovative'); ?>" target="_blank">
			<?php _e('Forum','innovative'); ?></a>

			<a class="button" href="<?php echo esc_url('http://cyberspeclab.com/showcase/','innovative'); ?>" title="<?php esc_attr_e('Showcase', 'innovative'); ?>" target="_blank">
			<?php _e('Showcase','innovative'); ?></a>

			<a class="button" href="<?php echo esc_url('http://cyberspeclab.com/themes/','innovative'); ?>" title="<?php esc_attr_e('More Themes', 'innovative'); ?>" target="_blank">
			<?php _e('More Themes','innovative'); ?></a>

		</div>
	</div>

    <?php }
 
    add_action( 'innovative_theme_options','innovative_theme_support', 2 );
	 
    /**
     * WordPress Widgets start right here.
     */
    function innovative_widgets_init() {

        register_sidebar(array(
            'name' => __('Main Sidebar', 'innovative'),
            'description' => __('Area 1 - sidebar.php', 'innovative'),
            'id' => 'main-sidebar',
            'before_title' => '<div class="widget-title">',
            'after_title' => '</div>',
            'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
            'after_widget' => '</div>'
        ));

        register_sidebar(array(
            'name' => __('Right Sidebar', 'innovative'),
            'description' => __('Area 2 - sidebar-right.php', 'innovative'),
            'id' => 'right-sidebar',
            'before_title' => '<div class="widget-title">',
            'after_title' => '</div>',
            'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
            'after_widget' => '</div>'
        ));
				
        register_sidebar(array(
            'name' => __('Left Sidebar', 'innovative'),
            'description' => __('Area 3 - sidebar-left.php', 'innovative'),
            'id' => 'left-sidebar',
            'before_title' => '<div class="widget-title">',
            'after_title' => '</div>',
            'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
            'after_widget' => '</div>'
        ));
		
        register_sidebar(array(
            'name' => __('Left Sidebar Half Page', 'innovative'),
            'description' => __('Area 4 - sidebar-left-half.php', 'innovative'),
            'id' => 'left-sidebar-half',
            'before_title' => '<div class="widget-title">',
            'after_title' => '</div>',
            'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
            'after_widget' => '</div>'
        ));
		
        register_sidebar(array(
            'name' => __('Right Sidebar Half Page', 'innovative'),
            'description' => __('Area 5 - sidebar-right-half.php', 'innovative'),
            'id' => 'right-sidebar-half',
            'before_title' => '<div class="widget-title">',
            'after_title' => '</div>',
            'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
            'after_widget' => '</div>'
        ));

        register_sidebar(array(
            'name' => __('Home Widget 1', 'innovative'),
            'description' => __('Area 6 - sidebar-home.php', 'innovative'),
            'id' => 'home-widget-1',
            'before_title' => '<div id="widget-title-one" class="widget-title-home"><h3>',
            'after_title' => '</h3></div>',
            'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
            'after_widget' => '</div>'
        ));

        register_sidebar(array(
            'name' => __('Home Widget 2', 'innovative'),
            'description' => __('Area 7 - sidebar-home.php', 'innovative'),
            'id' => 'home-widget-2',
            'before_title' => '<div id="widget-title-two" class="widget-title-home"><h3>',
            'after_title' => '</h3></div>',
            'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
            'after_widget' => '</div>'
        ));

        register_sidebar(array(
            'name' => __('Home Widget 3', 'innovative'),
            'description' => __('Area 8 - sidebar-home.php', 'innovative'),
            'id' => 'home-widget-3',
            'before_title' => '<div id="widget-title-three" class="widget-title-home"><h3>',
            'after_title' => '</h3></div>',
            'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
            'after_widget' => '</div>'
        ));

        register_sidebar(array(
            'name' => __('Gallery Sidebar', 'innovative'),
            'description' => __('Area 9 - sidebar-gallery.php', 'innovative'),
            'id' => 'gallery-widget',
            'before_title' => '<div class="widget-title">',
            'after_title' => '</div>',
            'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
            'after_widget' => '</div>'
        ));
		
        register_sidebar(array(
            'name' => __('Colophon Widget', 'innovative'),
            'description' => __('Area 10 - sidebar-colophon.php', 'innovative'),
            'id' => 'colophon-widget',
            'before_title' => '<div class="widget-title">',
            'after_title' => '</div>',
            'before_widget' => '<div id="%1$s" class="colophon-widget widget-wrapper %2$s">',
            'after_widget' => '</div>'
        ));
		
        register_sidebar(array(
            'name' => __('Top Widget', 'innovative'),
            'description' => __('Area 11 - sidebar-top.php', 'innovative'),
            'id' => 'top-widget',
            'before_title' => '<div class="widget-title">',
            'after_title' => '</div>',
            'before_widget' => '<div id="%1$s" class="%2$s">',
            'after_widget' => '</div>'
        ));
    }
	
    add_action('widgets_init', 'innovative_widgets_init');
		
/**
* Front Page function starts here. The Front page overides WP's show_on_front option. So when show_on_front option changes it sets the themes front_page to 0 therefore displaying the new option
*/
		
function innovative_front_page_override( $new, $orig ) {
	global $innovative_options;
	
	if( $orig !== $new ) {
		$innovative_options['front_page'] = 0;
		
		update_option( 'innovative_theme_options', $innovative_options );
	}
	return $new;
}
add_filter( 'pre_update_option_show_on_front', 'innovative_front_page_override', 10, 2 );

/**
* Funtion to add CSS class to body
*/
function innovative_add_class( $classes ) {
	
	// Get innovative theme option.
	global $innovative_options;
	if( $innovative_options['front_page'] == 1 && is_front_page() ) {
		$classes[] = 'front-page';
	}
	
	return $classes;
}

add_filter( 'body_class','innovative_add_class' );
?>
