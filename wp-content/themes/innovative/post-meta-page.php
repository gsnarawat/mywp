<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Page Meta-Data Template-Part File
 *
 * @file           post-meta-page.php
 * @package        innovative 
 * @author         Cyberspeclab 
 * @copyright      cyberspeclab.com 2013
 * @license        license.txt
 * @version        Release: 1.1.0
 * @filesource     wp-content/themes/innovative/post-meta-page.php
 * @link           http://codex.wordpress.org/Templates
 * @since          available since Release 1.0
 */
?>

<h1 class="entry-title post-title"><?php the_title(); ?></h1>

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