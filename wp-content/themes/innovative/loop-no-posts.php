<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * No-Posts Loop Content Template-Part File
 *
 * @file           loop-no-posts.php
 * @package        innovative 
 * @author         Cyberspeclab 
 * @copyright      cyberspeclab.com 2013
 * @license        license.txt
 * @version        Release: 1.1.0
 * @filesource     wp-content/themes/innovative/loop-no-posts.php
 * @link           http://codex.wordpress.org/Templates
 * @since          available since Release 1.0
 */

/**
 * If there are no posts in the loop,
 * display default content
 */ 
$title = ( is_search() ? sprintf(__('Your search for %s did not match any entries.', 'innovative' ), get_search_query() ) : __( '404 &#8212; Fancy meeting you here!', 'innovative' ) );
?>

<h1 class="title-404"><?php echo $title; ?></h1>
			
<p><?php _e( 'Don&#39;t panic, we&#39;ll get through this together. Let&#39;s explore our options here.', 'innovative' ); ?></p>
			
<h6><?php 
printf( __( 'You can return %s or search for the page you were looking for.', 'innovative' ),
	sprintf( '<a href="%1$s" title="%2$s">%3$s</a>',
		esc_url( get_home_url() ),
		esc_attr__( 'Home', 'innovative' ),
		esc_attr__( '&larr; Home', 'innovative' )
	) 
); 
?></h6>
			
<?php get_search_form(); ?>