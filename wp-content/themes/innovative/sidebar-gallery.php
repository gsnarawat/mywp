<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Gallery Widget Template
 *
 *
 * @file           sidebar-gallery.php
 * @package        innovative 
 * @author         Cyberspeclab
 * @copyright      cyberspeclab.com 2013
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/innovative/sidebar-gallery.php
 * @link           http://codex.wordpress.org/Theme_Development#Widgets_.28sidebar.php.29
 * @since          available since Release 1.0
 */
?>
		<?php innovative_widgets_before(); // above widgets container hook ?>
        <div id="widgets" class="grid col-300 fit gallery-meta">
        <?php innovative_widgets(); // above widgets hook ?>
            <div class="widget-wrapper">
        
                <div class="widget-title"><?php _e('Image Information', 'innovative'); ?></div>
                    <ul>
						<?php
						$innovative_data = get_post_meta($post->ID, '_wp_attachment_metadata', true);
						
						if( is_array( $innovative_data ) ) {
						?>
							<span class="full-size"><?php _e('Full Size:','innovative'); ?> <a href="<?php echo wp_get_attachment_url($post->ID); ?>"><?php echo $innovative_data['width'] . '&#215;' . $innovative_data['height']; ?></a>px</span>
							
							<?php
							if( is_array( $innovative_data['image_meta'] ) ) {
							?>
								<?php if ($innovative_data['image_meta']['aperture']) { ?>
								<span class="aperture"><?php _e('Aperture: f&#47;','innovative'); ?><?php echo $innovative_data['image_meta']['aperture']; ?></span>
								<?php } ?>

								<?php if ($innovative_data['image_meta']['focal_length']) { ?>
								<span class="focal-length"><?php _e('Focal Length:','innovative'); ?> <?php echo $innovative_data['image_meta']['focal_length']; ?><?php _e('mm','innovative'); ?></span>
								<?php } ?>

								<?php if ($innovative_data['image_meta']['iso']) { ?>
								<span class="iso"><?php _e('ISO:','innovative'); ?> <?php echo $innovative_data['image_meta']['iso']; ?></span>
								<?php } ?>

								<?php if ($innovative_data['image_meta']['shutter_speed']) { ?>
								<span class="shutter"><?php _e('Shutter:','innovative'); ?>
								<?php
									if ((1 / $innovative_data['image_meta']['shutter_speed']) > 1) {
										echo "1/";
									if (number_format((1 / $innovative_data['image_meta']['shutter_speed']), 1) == number_format((1 / $innovative_data['image_meta']['shutter_speed']), 0)) {
										echo number_format((1 / $innovative_data['image_meta']['shutter_speed']), 0, '.', '') . ' sec';
									} else {
										echo number_format((1 / $innovative_data['image_meta']['shutter_speed']), 1, '.', '') . ' sec';
									}
									} else {
										echo $innovative_data['image_meta']['shutter_speed'] . ' sec';
									}
								?>
								</span>
								<?php } ?>

								<?php if ($innovative_data['image_meta']['camera']) { ?>
								<span class="camera"><?php _e('Camera:','innovative'); ?> <?php echo $innovative_data['image_meta']['camera']; ?></span>
								<?php
								}
							}	
						}
						?>
                    </ul>

            </div><!-- end of .widget-wrapper -->
        </div><!-- end of #widgets -->

            <?php if (!is_active_sidebar('gallery-widget')) return; ?>

            <?php if (is_active_sidebar('gallery-widget')) : ?>

        <div id="widgets" class="grid col-300 fit">
        
			<?php innovative_widgets(); // above widgets hook ?>
            
                <?php dynamic_sidebar('gallery-widget'); ?>
                
			<?php innovative_widgets_end(); // after widgets hook ?>
        </div><!-- end of #widgets -->
		<?php innovative_widgets_after(); // after widgets container hook ?>
        
        <?php endif; ?>