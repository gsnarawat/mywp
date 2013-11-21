<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Post Data Template-Part File
 *
 * @file           post-data.php
 * @package        innovative 
 * @author         Cyberspeclab
 * @copyright      cyberspeclab.com 2013
 * @license        license.txt
 * @version        Release: 1.1.0
 * @filesource     wp-content/themes/innovative/post-data.php
 * @link           http://codex.wordpress.org/Templates
 * @since          available since Release 1.0
 */
?>

<?php if ( ! is_page() && ! is_search() ) { ?>

	<div class="post-data">
		<?php the_tags(__('Tagged with:', 'innovative') . ' ', ', ', '<br />'); ?> 
		<?php printf(__('Posted in %s', 'innovative'), get_the_category_list(', ')); ?> 
	</div><!-- end of .post-data --> 
 
<?php } ?>           

<div class="post-edit"><?php edit_post_link(__('Edit', 'innovative')); ?></div>  