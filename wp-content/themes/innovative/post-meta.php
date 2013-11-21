<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) )
	exit ;

/**
 * Post Meta-Data Template-Part File
 *
 * @file           post-meta.php
 * @package        innovative
 * @author         Cyberspeclab
 * @copyright      cyberspeclab.com 2013
 * @license        license.txt
 * @version        Release: 1.1.0
 * @filesource     wp-content/themes/innovative/post-meta.php
 * @link           http://codex.wordpress.org/Templates
 * @since          available since Release 1.0
 */
?>

<?php if ( is_single() ): ?>
				<h1 class="entry-title post-title"><?php the_title( ); ?></h1>
<?php else: ?>
				<h1 class="entry-title post-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title( ); ?></a></h1>
<?php endif; ?>

<div class="post-meta">
<?php innovative_post_meta_data(); ?>

	<?php if ( comments_open() ) : ?>
		<span class="comments-link">
		<span class="mdash">&mdash;</span>
	<?php comments_popup_link( __( 'No Comments &darr;', 'innovative' ), __( '1 Comment &darr;', 'innovative' ), __( '% Comments &darr;', 'innovative' ) ); ?>
		</span>
	<?php endif; ?> 
</div><!-- end of .post-meta -->
