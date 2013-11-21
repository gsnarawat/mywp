<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Loop Navigation Template-Part File
 *
 * @file           loop-nav.php
 * @package        innovative 
 * @author         Cyberspeclab 
 * @copyright      cyberspeclab.com 2013
 * @license        license.txt
 * @version        Release: 1.1.0
 * @filesource     wp-content/themes/innovative/loop-nav.php
 * @link           http://codex.wordpress.org/Templates
 * @since          available since Release 1.0
 */

/**
 * Output Prev/Next Posts Links
 */
if (  $wp_query->max_num_pages > 1 ) : 
	?>

	<div class="navigation">
		<div class="previous"><?php next_posts_link( __( '&#8249; Older posts', 'innovative' ) ); ?></div>
		<div class="next"><?php previous_posts_link( __( 'Newer posts &#8250;', 'innovative' ) ); ?></div>
	</div><!-- end of .navigation -->

	<?php 
endif;