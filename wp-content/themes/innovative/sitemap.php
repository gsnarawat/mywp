<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Sitemap Template
 *
   Template Name: Sitemap
 *
 * @file           sitemap.php
 * @package        innovative 
 * @author         Cyberspeclab 
 * @copyright      cyberspeclab.com 2013
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/innovative/sitemap.php
 * @link           http://codex.wordpress.org/Templates
 * @since          available since Release 1.0
 */
?>
<?php get_header(); ?>

<div id="content-sitemap" class="grid col-940">
        
	<?php get_template_part( 'loop-header' ); ?>
        
	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
        
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h1 class="post-title"><?php the_title(); ?></h1> 
                
                <div class="post-entry">
                <div id="widgets">
                
                    <div class="grid col-300">
                        <div class="widget-title"><?php _e('Categories', 'innovative'); ?></div>
                            <ul><?php wp_list_categories('sort_column=name&optioncount=1&hierarchical=0&title_li='); ?></ul>
                    </div><!-- end of .col-300 -->
                    
                    <div class="grid col-300">
                        <div class="widget-title"><?php _e('Latest Posts', 'innovative'); ?></div>
                            <ul><?php $archive_query = new WP_Query('posts_per_page=-1');
                                    while ($archive_query->have_posts()) : $archive_query->the_post(); ?>
                                        <li>
                                            <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'innovative'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a>
                                        </li>
                                    <?php endwhile; ?>
                            </ul>  
                    </div><!-- end of .col-300 -->
                     
                    <div class="grid col-300 fit">
                          <div class="widget-title"><?php _e('Pages', 'innovative'); ?></div>
                            <ul><?php wp_list_pages("title_li=" ); ?></ul>               
                    </div><!-- end of .col-300 fit -->
                
                </div><!-- end of #widgets --> 
                <?php wp_link_pages(array('before' => '<div class="pagination">' . __('Pages:', 'innovative'), 'after' => '</div>')); ?>     
                </div><!-- end of .post-entry -->             
            
            <div class="post-edit"><?php edit_post_link(__('Edit', 'innovative')); ?></div>  
            </div><!-- end of #post-<?php the_ID(); ?> -->
            
        <?php 
		endwhile; 

		get_template_part( 'loop-nav' ); 

	else : 

		get_template_part( 'loop-no-posts' ); 

	endif; 
	?>  
      
</div><!-- end of #content-sitemap -->

<?php get_footer(); ?>