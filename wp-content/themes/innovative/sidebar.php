<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Main Widget Template
 *
 *
 * @file           sidebar.php
 * @package        innovative 
 * @author         Cyberspeclab 
 * @copyright      cyberspeclab.com 2013
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/innovative/sidebar.php
 * @link           http://codex.wordpress.org/Theme_Development#Widgets_.28sidebar.php.29
 * @since          available since Release 1.0
 */

/*
 * If this is a full-width page, exit
 */
if ( 'full-width-page' == innovative_get_layout() ) {
	return;
}
?>

<?php innovative_widgets_before(); // above widgets container hook ?>
<div id="widgets" class="<?php echo implode( ' ', innovative_get_sidebar_classes() ); ?>">
	<?php innovative_widgets(); // above widgets hook ?>
		
		<?php if (!dynamic_sidebar('main-sidebar')) : ?>
		<div class="widget-wrapper">
		
			<div class="widget-title"><?php _e('In Archive', 'innovative'); ?></div>
				<ul>
					<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
				</ul>

		</div><!-- end of .widget-wrapper -->
		<?php endif; //end of main-sidebar ?>

	<?php innovative_widgets_end(); // after widgets hook ?>
</div><!-- end of #widgets -->
<?php innovative_widgets_after(); // after widgets container hook ?>