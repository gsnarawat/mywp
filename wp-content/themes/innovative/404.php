<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Error 404 Template
 *
 *
 * @file           404.php
 * @package        innovative 
 * @author         Cyberspeclab 
 * @copyright      cyberspeclab.com 2013
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/innovative/404.php
 * @link           http://codex.wordpress.org/Creating_an_Error_404_Page
 * @since          available since Release 1.0
 */
?>
<?php get_header(); ?>

        <div id="content-full" class="grid col-940">
        
			<?php innovative_entry_before(); ?>
			<div id="post-0" class="error404">       
				<?php innovative_entry_top(); ?>

                <div class="post-entry">
                
                    <?php get_template_part( 'loop-no-posts' ); ?>
                    
                </div><!-- end of .post-entry -->
				               
				<?php innovative_entry_bottom(); ?>      
			</div><!-- end of #post-0 -->       
			<?php innovative_entry_after(); ?>

        </div><!-- end of #content-full -->

<?php get_footer(); ?>
