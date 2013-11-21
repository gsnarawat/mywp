<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Site Front Page
 *
 * Note: You can overwrite front-page.php as well as any other Template in Child Theme.
 * Create the same file (name) include in /innovative-child-theme/ and you're all set to go!
 * @see            http://codex.wordpress.org/Child_Themes
 *
 * @file           front-page.php
 * @package        innovative 
 * @author         Cyberspeclab 
 * @copyright      cyberspeclab.com 2013
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/innovative/front-page.php
 * @link           http://codex.wordpress.org/Template_Hierarchy
 * @since          available since Release 1.0
 */

/**
 * Globalize Theme Options
 */
$innovative_options = innovative_get_options();
/**
 * If front page is set to display the
 * blog posts index, include home.php;
 * otherwise, display static front page
 * content
 */
if ( 'posts' == get_option( 'show_on_front' ) && $innovative_options['front_page'] != 1 ) {
	get_template_part( 'home' );
} elseif ( 'page' == get_option( 'show_on_front' ) && $innovative_options['front_page'] != 1 ) {
	$template = get_post_meta( get_option( 'page_on_front' ), '_wp_page_template', true );
	$template = ( $template == 'default' ) ? 'index.php' : $template;
	locate_template( $template, true );
} else { 

	get_header();
	
	//test for first install no database
	$db = get_option( 'innovative_theme_options' );
    //test if all options are empty so we can display default text if they are
    $empty = ( empty( $innovative_options['home_headline'] ) && empty( $innovative_options['home_content_area'] ) ) ? false : true;
	?>

	<div id="featured" class="grid col-940">
		  
		  <?php $featured_content = ( !empty( $innovative_options['featured_content'] ) ) ? $innovative_options['featured_content'] : '<img class="aligncenter" src="' . get_template_directory_uri() . '/inc/img/featured.jpg" width="940" height="420" alt="" />'; ?>
							
			<?php echo do_shortcode( $featured_content ); ?>
	
	</div><!-- end of #featured -->
    
    <div class="grid col-940">
  <div id="sub-featured">

          <h1 class="featured-title">
				<?php
				if ( isset( $innovative_options['home_headline'] ) && $db && $empty )
					echo $innovative_options['home_headline'];
				else
					_e( 'Modern, Elegant, Responsive Design', 'innovative' );
				?>
			</h1>
			
			<p>
				<?php
				if ( isset( $innovative_options['home_content_area'] ) && $db && $empty )
					echo do_shortcode( $innovative_options['home_content_area'] );
				else
					_e( "Welcome to the Innovative theme. In this text area make a statement and get your visitor's attention right away.",'innovative' );
				?>
			</p>        
		   </div>
		</div><!-- end of .col-940 -->
               
	<?php 
	get_sidebar('home');
	get_footer(); 
}
?>