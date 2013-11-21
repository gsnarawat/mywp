<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Loop Header Template-Part File
 *
 * @file           loop-header.php
 * @package        innovative 
 * @author         Cyberspeclab
 * @copyright      cyberspeclab.com 2013
 * @license        license.txt
 * @version        Release: 1.1.0
 * @filesource     wp-content/themes/innovative/loop-header.php
 * @link           http://codex.wordpress.org/Templates
 * @since          available since Release 1.0
 */

/**
 * Globalize Theme Options
 */
global $innovative_options;
$innovative_options = innovative_get_options(); 

/**
 * Display breadcrumb except on search page
 */
if ( 0 == $innovative_options['breadcrumb'] && !is_search() ) :
	echo innovative_breadcrumb_lists();
endif; 

/**
 * Display archive information
 */

if ( is_category() || is_tag() || is_author() || is_date() ) {
	?>
	<h6 class="title-archive">
		<?php 
		if ( is_day() ) : 
			printf( __( 'Daily Archives: %s', 'innovative' ), '<span>' . get_the_date() . '</span>' ); 
		elseif ( is_month() ) : 
			printf( __( 'Monthly Archives: %s', 'innovative' ), '<span>' . get_the_date( 'F Y' ) . '</span>' ); 
		elseif ( is_year() ) : 
			printf( __( 'Yearly Archives: %s', 'innovative' ), '<span>' . get_the_date( 'Y' ) . '</span>' ); 
		else : 
			_e( 'Blog Archives', 'innovative' ); 
		endif; 
		?>
	</h6>
	<?php
}

/**
 * Display Search information
 */

if( is_search() ) {
    ?>
    <h6 class="title-search-results"><?php printf(__('Search results for: %s', 'innovative' ), '<span>' . get_search_query() . '</span>'); ?></h6>
    <?php
}