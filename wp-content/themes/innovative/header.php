<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Header Template
 *
 *
 * @file           header.php
 * @package        innovative 
 * @author         Cyberspeclab 
 * @copyright      cyberspeclab.com 2013
 * @license        license.txt
 * @version        Release: 1.3
 * @filesource     wp-content/themes/innovative/header.php
 * @link           http://codex.wordpress.org/Theme_Development#Document_Head_.28header.php.29
 * @since          available since Release 1.0
 */
 
 /* 
 * Globalize Theme options
 */
 global $innovative_options;
$innovative_options = innovative_get_options();
?>
<!doctype html>
<!--[if !IE]>      <html class="no-js non-ie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>    <html class="no-js ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>

<meta charset="<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title><?php wp_title('&#124;', true, 'right'); ?></title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
                 
<?php innovative_container(); // before container hook ?>
<div id="container" class="hfeed">
         
    <?php innovative_header(); // before header hook ?>
    <div id="header">

		<?php innovative_header_top(); // before header content hook ?>
    
        <?php if (has_nav_menu('top-menu', 'innovative')) { ?>
	        <?php wp_nav_menu(array(
				    'container'       => '',
					'fallback_cb'	  =>  false,
					'menu_class'      => 'top-menu',
					'theme_location'  => 'top-menu')
					); 
				?>
        <?php } ?>
        
    <?php innovative_in_header(); // header hook ?>
   
	<?php if ( get_header_image() != '' ) : ?>
               
        <div id="logo">
            <a href="<?php echo home_url('/'); ?>"><img src="<?php header_image(); ?>" width="<?php if(function_exists('get_custom_header')) { echo get_custom_header() -> width;} else { echo HEADER_IMAGE_WIDTH;} ?>" height="<?php if(function_exists('get_custom_header')) { echo get_custom_header() -> height;} else { echo HEADER_IMAGE_HEIGHT;} ?>" alt="<?php bloginfo('name'); ?>" /></a>
        </div><!-- end of #logo -->
        
    <?php endif; // header image was removed ?>

    <?php if ( !get_header_image() ) : ?>
                
        <div id="logo">
            <span class="site-name"><a href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php bloginfo('name'); ?></a></span>
            <span class="site-description"><?php bloginfo('description'); ?></span>
        </div><!-- end of #logo -->  

    <?php endif; // header image was removed (again) ?>
    
    <?php
					
            // First let's check if any of this was set
		
                echo '<ul class="social-icons">';
					
                if (!empty($innovative_options['twitter_uid'])) echo '<li class="twitter-icon"><a href="' . $innovative_options['twitter_uid'] . '">'
                    .'<img src="' . get_stylesheet_directory_uri() . '/inc/icons/twitter-icon.png" width="32" height="32" alt="Twitter">'
                    .'</a></li>';

                if (!empty($innovative_options['facebook_uid'])) echo '<li class="facebook-icon"><a href="' . $innovative_options['facebook_uid'] . '">'
                    .'<img src="' . get_stylesheet_directory_uri() . '/inc/icons/facebook-icon.png" width="32" height="32" alt="Facebook">'
                    .'</a></li>';
  
                if (!empty($innovative_options['linkedin_uid'])) echo '<li class="linkedin-icon"><a href="' . $innovative_options['linkedin_uid'] . '">'
                    .'<img src="' . get_stylesheet_directory_uri() . '/inc/icons/linkedin-icon.png" width="32" height="32" alt="LinkedIn">'
                    .'</a></li>';
					
                if (!empty($innovative_options['youtube_uid'])) echo '<li class="youtube-icon"><a href="' . $innovative_options['youtube_uid'] . '">'
                    .'<img src="' . get_stylesheet_directory_uri() . '/inc/icons/youtube-icon.png" width="32" height="32" alt="YouTube">'
                    .'</a></li>';
					
                if (!empty($innovative_options['stumble_uid'])) echo '<li class="stumble-upon-icon"><a href="' . $innovative_options['stumble_uid'] . '">'
                    .'<img src="' . get_stylesheet_directory_uri() . '/inc/icons/stumble-icon.png" width="32" height="32" alt="StumbleUpon">'
                    .'</a></li>';
					
                if (!empty($innovative_options['rss_uid'])) echo '<li class="rss-feed-icon"><a href="' . $innovative_options['rss_uid'] . '">'
                    .'<img src="' . get_stylesheet_directory_uri() . '/inc/icons/rss-feed-icon.png" width="32" height="32" alt="RSS Feed">'
                    .'</a></li>';
       
                if (!empty($innovative_options['google_plus_uid'])) echo '<li class="google-plus-icon"><a href="' . $innovative_options['google_plus_uid'] . '">'
                    .'<img src="' . get_stylesheet_directory_uri() . '/inc/icons/googleplus-icon.png" width="32" height="32" alt="Google Plus">'
                    .'</a></li>';
					
                if (!empty($innovative_options['instagram_uid'])) echo '<li class="instagram-icon"><a href="' . $innovative_options['instagram_uid'] . '">'
                    .'<img src="' . get_stylesheet_directory_uri() . '/inc/icons/instagram-icon.png" width="32" height="32" alt="Instagram">'
                    .'</a></li>';
					
                if (!empty($innovative_options['pinterest_uid'])) echo '<li class="pinterest-icon"><a href="' . $innovative_options['pinterest_uid'] . '">'
                    .'<img src="' . get_stylesheet_directory_uri() . '/inc/icons/pinterest-icon.png" width="32" height="32" alt="Pinterest">'
                    .'</a></li>';
					
                if (!empty($innovative_options['yelp_uid'])) echo '<li class="yelp-icon"><a href="' . $innovative_options['yelp_uid'] . '">'
                    .'<img src="' . get_stylesheet_directory_uri() . '/inc/icons/yelp-icon.png" width="32" height="32" alt="Yelp!">'
                    .'</a></li>';
					
                if (!empty($innovative_options['vimeo_uid'])) echo '<li class="vimeo-icon"><a href="' . $innovative_options['vimeo_uid'] . '">'
                    .'<img src="' . get_stylesheet_directory_uri() . '/inc/icons/vimeo-icon.png" width="32" height="32" alt="Vimeo">'
                    .'</a></li>';
					
                if (!empty($innovative_options['foursquare_uid'])) echo '<li class="foursquare-icon"><a href="' . $innovative_options['foursquare_uid'] . '">'
                    .'<img src="' . get_stylesheet_directory_uri() . '/inc/icons/foursquare-icon.png" width="32" height="32" alt="foursquare">'
                    .'</a></li>';
             
                echo '</ul><!-- end of .social-icons -->';
         ?>
    
    <?php get_sidebar('top'); ?>
				<?php wp_nav_menu(array(
				    'container'       => 'div',
						'container_class'	=> 'main-nav',
						'fallback_cb'	  =>  'innovative_fallback_menu',
						'theme_location'  => 'header-menu')
					); 
				?>
                
            <?php if (has_nav_menu('sub-header-menu', 'innovative')) { ?>
	            <?php wp_nav_menu(array(
				    'container'       => '',
					'menu_class'      => 'sub-header-menu',
					'theme_location'  => 'sub-header-menu')
					); 
				?>
            <?php } ?>

			<?php innovative_header_bottom(); // after header content hook ?>
 
    </div><!-- end of #header -->
    <?php innovative_header_end(); // after header container hook ?>
    
	<?php innovative_wrapper(); // before wrapper container hook ?>
    <div id="wrapper" class="clearfix">
		<?php innovative_wrapper_top(); // before wrapper content hook ?>
		<?php innovative_in_wrapper(); // wrapper hook ?>