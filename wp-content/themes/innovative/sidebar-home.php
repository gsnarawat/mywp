<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Home Widgets Template
 *
 *
 * @file           sidebar-home.php
 * @package        innovative 
 * @author         Cyberspeclab 
 * @copyright      cyberspeclab.com 2013
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/innovative/sidebar-home.php
 * @link           http://codex.wordpress.org/Theme_Development#Widgets_.28sidebar.php.29
 * @since          available since Release 1.0
 */
?>  

	<?php innovative_widgets_before(); // above widgets container hook ?>
    <div id="widgets" class="home-widgets">
        <div class="grid col-300">
        <?php innovative_widgets(); // above widgets hook ?>
            
            <?php if (!dynamic_sidebar('home-widget-1')) : ?>
            <div class="widget-wrapper">
            
                <div class="widget-title-home"><h3><?php _e('Featured page', 'innovative'); ?></h3></div>
                <div class="textwidget"><?php _e('Resize your browser to see how Innovative will adjust for desktops, tablets and handheld devices.','innovative'); ?></div>
            
			</div><!-- end of .widget-wrapper -->
			<?php endif; //end of home-widget-1 ?>

        <?php innovative_widgets_end(); // innovative after widgets hook ?>
        </div><!-- end of .col-300 -->

        <div class="grid col-300">
        <?php innovative_widgets(); // innovative above widgets hook ?>
            
			<?php if (!dynamic_sidebar('home-widget-2')) : ?>
            <div class="widget-wrapper">
            
                <div class="widget-title-home"><h3><?php _e('Featured page', 'innovative'); ?></h3></div>
                <div class="textwidget"><?php _e('Resize your browser to see how Innovative will adjust for desktops, tablets and handheld devices.','innovative'); ?></div>
            
			</div><!-- end of .widget-wrapper -->
			<?php endif; //end of home-widget-2 ?>
            
        <?php innovative_widgets_end(); // after widgets hook ?>
        </div><!-- end of .col-300 -->

        <div class="grid col-300 fit">
        <?php innovative_widgets(); // above widgets hook ?>
            
			<?php if (!dynamic_sidebar('home-widget-3')) : ?>
            <div class="widget-wrapper">
            
                <div class="widget-title-home"><h3><?php _e('Featured page', 'innovative'); ?></h3></div>
                <div class="textwidget"><?php _e('Resize your browser to see how Innovative will adjust for desktops, tablets and handheld devices.','innovative'); ?></div>
        
			</div><!-- end of .widget-wrapper -->
			<?php endif; //end of home-widget-3 ?>
            
        <?php innovative_widgets_end(); // after widgets hook ?>
        </div><!-- end of .col-300 fit -->
    </div><!-- end of #widgets -->
	<?php innovative_widgets_after(); // after widgets container hook ?>