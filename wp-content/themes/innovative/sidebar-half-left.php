<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Main Widget Template
 *
 *
 * @file           sidebar-half.php
 * @package        innovative 
 * @author         Cyberspeclab 
 * @copyright      cyberspeclab.com 2013
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/innovative/sidebar.php
 * @link           http://codex.wordpress.org/Theme_Development#Widgets_.28sidebar.php.29
 * @since          available since Release 1.0
 */
?>
		<?php innovative_widgets_before(); // above widgets container hook ?>
        <div id="widgets" class="grid-right col-300">
        <?php innovative_widgets(); // above widgets hook ?>
            
            <?php if (!dynamic_sidebar('right-left')) : ?>
            <div class="widget-wrapper">
            
                <div class="widget-title"><?php _e('In Archive', 'innovative'); ?></div>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
					</ul>

            </div><!-- end of .widget-wrapper -->
            <?php endif; //end of right-left ?>

        <?php innovative_widgets_end(); // after widgets hook ?>
        </div><!-- end of #widgets -->
		<?php innovative_widgets_after(); // after widgets container hook ?>