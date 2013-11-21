<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Footer Template
 *
 *
 * @file           footer.php
 * @package        innovative 
 * @author         Cyberspeclab 
 * @copyright      cyberspeclab.com 2013
 * @license        license.txt
 * @version        Release: 1.2
 * @filesource     wp-content/themes/innovative/footer.php
 * @link           http://codex.wordpress.org/Theme_Development#Footer_.28footer.php.29
 * @since          available since Release 1.0
 */

/* 
 * Globalize Theme options
 */
global $innovative_options;
$innovative_options = innovative_get_options();
?>
		<?php innovative_wrapper_bottom(); // after wrapper content hook ?>
    </div><!-- end of #wrapper -->
    <?php innovative_wrapper_end(); // after wrapper hook ?>
</div><!-- end of #container -->
<?php innovative_container_end(); // after container hook ?>

<div id="footer" class="clearfix">
	<?php innovative_footer_top(); ?>

    <div id="footer-wrapper">
    
        <div class="grid col-940">
        
        <div class="grid col-540">
		<?php if (has_nav_menu('footer-menu', 'innovative')) { ?>
	        <?php wp_nav_menu(array(
				    'container'       => '',
					'fallback_cb'	  =>  false,
					'menu_class'      => 'footer-menu',
					'theme_location'  => 'footer-menu')
					); 
				?>
         <?php } ?>
         </div><!-- end of col-540 -->

         </div><!-- end of col-940 -->
         <?php get_sidebar('colophon'); ?>
                
        <div class="grid col-300 copyright">
            <?php esc_attr_e('&copy;', 'innovative'); ?> <?php _e(date('Y')); ?><a href="<?php echo home_url('/') ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
                <?php bloginfo('name'); ?>
            </a>
        </div><!-- end of .copyright -->
        
        <div class="grid col-300 scroll-top"><a href="#scroll-top" title="<?php esc_attr_e( 'scroll to top', 'innovative' ); ?>"><?php _e( '&uarr;', 'innovative' ); ?></a></div>
        
        <div class="grid col-300 fit powered">
            <a href="<?php echo esc_url(__('http://cyberspeclab.com/themes/innovative/','innovative')); ?>" title="<?php esc_attr_e('innovative Theme', 'innovative'); ?>">
                    <?php printf('innovative Theme'); ?></a>
            <?php esc_attr_e('powered by', 'innovative'); ?> <a href="<?php echo esc_url(__('http://wordpress.org/','innovative')); ?>" title="<?php esc_attr_e('WordPress', 'innovative'); ?>">
                    <?php printf('WordPress'); ?></a>
        </div><!-- end .powered -->
        
    </div><!-- end #footer-wrapper -->
    
	<?php innovative_footer_bottom(); ?>
</div><!-- end #footer -->
<?php innovative_footer_after(); ?>

<?php wp_footer(); ?>
</body>
</html>