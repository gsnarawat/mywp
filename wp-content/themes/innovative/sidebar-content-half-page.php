<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Sidebar/Content Half Template
 *
   Template Name:  Sidebar/Content Half Page
 *
 * @file           sidebar-content-half-page.php
 * @package        innovative 
 * @author         Cyberspeclab 
 * @copyright      cyberspeclab.com 2013
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/innovative/sidebar-content-half-page.php
 * @link           http://codex.wordpress.org/Theme_Development#Pages_.28page.php.29
 * @since          available since Release 1.0
 */
?>
<?php get_header(); ?>

        <div id="content" class="grid-right col-460 fit">
        
<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
        
        <?php $options = get_option('innovative_theme_options'); ?>
		<?php if ($options['breadcrumb'] == 0): ?>
		<?php echo innovative_breadcrumb_lists(); ?>
        <?php endif; ?>
        
			<?php innovative_entry_before(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>       
				<?php innovative_entry_top(); ?>

                <h1 class="post-title"><?php the_title(); ?></h1>
 
                <?php if ( comments_open() ) : ?>               
                <div class="post-meta">
                <?php innovative_post_meta_data(); ?>
                
				    <?php if ( comments_open() ) : ?>
                        <span class="comments-link">
                        <span class="mdash">&mdash;</span>
                    <?php comments_popup_link(__('No Comments &darr;', 'innovative'), __('1 Comment &darr;', 'innovative'), __('% Comments &darr;', 'innovative')); ?>
                        </span>
                    <?php endif; ?> 
                </div><!-- end of .post-meta -->
                <?php endif; ?> 
                
                <div class="post-entry">
                    <?php the_content(__('Read more &#8250;', 'innovative')); ?>
                    <?php wp_link_pages(array('before' => '<div class="pagination">' . __('Pages:', 'innovative'), 'after' => '</div>')); ?>
                </div><!-- end of .post-entry -->
                
                <?php if ( comments_open() ) : ?>
                <div class="post-data">
				    <?php the_tags(__('Tagged with:', 'innovative') . ' ', ', ', '<br />'); ?> 
                    <?php the_category(__('Posted in %s', 'innovative') . ', '); ?> 
                </div><!-- end of .post-data -->
                <?php endif; ?>             
            
				<div class="post-edit"><?php edit_post_link(__('Edit', 'innovative')); ?></div> 
				               
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

<?php get_sidebar('left-half'); ?>
<?php get_footer(); ?>
