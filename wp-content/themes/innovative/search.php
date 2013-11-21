<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Search Template
 *
 *
 * @file           search.php
 * @package        innovative 
 * @author         Cyberspeclab 
 * @copyright      cyberspeclab.com 2013
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/innovative/search.php
 * @link           http://codex.wordpress.org/Theme_Development#Search_Results_.28search.php.29
 * @since          available since Release 1.0
 */

get_header(); ?>

<div id="content-search" class="<?php echo implode( ' ', innovative_get_content_classes() ); ?>">

<?php if (have_posts()) : ?>

    <?php get_template_part( 'loop-header' ); ?>

		<?php while (have_posts()) : the_post(); ?>  
        
			<?php innovative_entry_before(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>       
				<?php innovative_entry_top(); ?>
                
                <?php get_template_part( 'post-meta' ); ?>
                
                <div class="post-entry">
                    <?php the_excerpt(); ?>
                    <?php wp_link_pages(array('before' => '<div class="pagination">' . __('Pages:', 'innovative'), 'after' => '</div>')); ?>
                </div><!-- end of .post-entry -->

				<?php get_template_part( 'post-data' ); ?>
				               
				<?php innovative_entry_bottom(); ?>      
			</div><!-- end of #post-<?php the_ID(); ?> -->       
			<?php innovative_entry_after(); ?>
            
        <?php 
		endwhile; 

		get_template_part( 'loop-nav' ); 

	else : 

		get_template_part( 'loop-no-posts' ); 

	endif; 
	?>  
      
</div><!-- end of #content-search -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
