<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Index Template
 *
 *
 * @file           index.php
 * @package        innovative 
 * @author         Cyberspeclab
 * @copyright      cyberspeclab.com 2013
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/innovative/index.php
 * @link           http://codex.wordpress.org/Theme_Development#Index_.28index.php.29
 * @since          available since Release 1.0
 */

get_header(); ?>

<div id="content" class="grid col-620">
        
	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
        
			<?php innovative_entry_before(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>       
				<?php innovative_entry_top(); ?>

				<?php get_template_part( 'post-meta-page' ); ?>
				
				<div class="post-entry">
					<?php if ( has_post_thumbnail()) : ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
							<?php the_post_thumbnail(); ?>
						</a>
					<?php endif; ?>
					<?php the_content(__('Read more &#8250;', 'innovative')); ?>
					<?php wp_link_pages(array('before' => '<div class="pagination">' . __('Pages:', 'innovative'), 'after' => '</div>')); ?>
				</div><!-- end of .post-entry -->
				
				<?php get_template_part( 'post-data' ); ?>
				               
				<?php innovative_entry_bottom(); ?>      
			</div><!-- end of #post-<?php the_ID(); ?> -->       
			<?php innovative_entry_after(); ?>
            
			<?php innovative_comments_before(); ?>
			<?php comments_template( '', true ); ?>
			<?php innovative_comments_after(); ?>
            
        <?php 
		endwhile; 

		get_template_part( 'loop-nav' ); 

	else : 

		get_template_part( 'loop-no-posts' ); 

	endif; 
	?>  
      
</div><!-- end of #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
