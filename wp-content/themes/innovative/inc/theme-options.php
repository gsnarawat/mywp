<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Theme Options
 *
 *
 * @file           theme-options.php
 * @package        innovative 
 * @author         Cyberspeclab 
 * @copyright      cyberspeclab.com 2013
 * @license        license.txt
 * @version        Release: 1.8.0
 * @filesource     wp-content/themes/innovative/inc/theme-options.php
 * @since          available since Release 1.0
 */

/**
 * A safe way of adding JavaScripts to a WordPress generated page.
 */
function innovative_admin_enqueue_scripts( $hook_suffix ) {
	$template_directory_uri = get_template_directory_uri();
	
	wp_enqueue_style('innovative-theme-options', $template_directory_uri . '/inc/theme-options.css', false, '1.0');
	wp_enqueue_script('innovative-theme-options', $template_directory_uri . '/inc/theme-options.js', array('jquery'), '1.0');
}
add_action('admin_print_styles-appearance_page_theme_options', 'innovative_admin_enqueue_scripts');

/**
 * Init plugin options to white list our options
 */
function innovative_theme_options_init() {
    register_setting('innovative_options', 'innovative_theme_options', 'innovative_theme_options_validate');
}

/**
 * Load up the menu page
 */
function innovative_theme_options_add_page() {
    add_theme_page(__('Theme Options', 'innovative'), __('Theme Options', 'innovative'), 'edit_theme_options', 'theme_options', 'innovative_theme_options_do_page');
}


function innovative_inline_css() {
    global $innovative_options;
    if (!empty($innovative_options['innovative_inline_css'])) {
		echo '<!-- Custom CSS Styles -->' . "\n";
        echo '<style type="text/css" media="screen">' . "\n";
		echo $innovative_options['innovative_inline_css'] . "\n";
		echo '</style>' . "\n";
	}
}

add_action('wp_head', 'innovative_inline_css', 110 );

function innovative_inline_js_head() {
    global $innovative_options;
    if (!empty($innovative_options['innovative_inline_js_head'])) {
		echo '<!-- Custom Scripts -->' . "\n";
        echo $innovative_options['innovative_inline_js_head'];
		echo "\n";
	}
}

add_action('wp_head', 'innovative_inline_js_head');

function innovative_inline_js_footer() {
    global $innovative_options;
    if (!empty($innovative_options['innovative_inline_js_footer'])) {
		echo '<!-- Custom Scripts -->' . "\n";
        echo $innovative_options['innovative_inline_js_footer'];
		echo "\n";
	}
}

add_action('wp_footer', 'innovative_inline_js_footer');
	
/**
 * Create the options page
 */
function innovative_theme_options_do_page() {

	if (!isset($_REQUEST['settings-updated']))
		$_REQUEST['settings-updated'] = false;
	
	// Set confirmaton text for restore default option as attributes of submit_button().
	$attributes['onclick'] = 'return confirm("' . __( 'Do you want to restore? \nAll theme settings will be lost! \nClick OK to Restore.', 'innovative' ) .  '")';
	?>
    
    <div class="wrap">
        <?php
        /**
         * < 3.4 Backward Compatibility
         */
        ?>
        <div class="theme_option_title">
        <?php $theme_name = function_exists('wp_get_theme') ? wp_get_theme() : get_current_theme(); ?>
        <?php screen_icon(); echo "<h2>" . $theme_name ." ". __('Theme Options', 'innovative') . "</h2>"; ?></div>
        <div style="margin: 20px 20px 0px 0px; float:right; font-size: 13px; font-weight: bold;">
			<?php _e( 'Confused about something? See', 'innovative' ); ?> 
			<a href="<?php echo esc_url( 'http://cyberspeclab.com/guides/' ); ?>" title="<?php esc_attr_e( 'Innovative Theme Instructions', 'innovative' ); ?>" target="_blank"><?php _e( 'Theme Instructions', 'innovative' ); ?></a> &nbsp; | &nbsp; 
			<a class="support" href="<?php echo esc_url( 'http://cyberspeclab.com/forum/' ); ?>" title="<?php esc_attr_e( 'Support Forum', 'innovative' ); ?>" target="_blank"><?php _e( 'Support Forum', 'innovative' ); ?></a>
		</div>

		<?php if (false !== $_REQUEST['settings-updated']) : ?>
		<div class="updated fade"><p><strong><?php _e('Options Saved', 'innovative'); ?></strong></p></div>
		<?php endif; ?>
        
        <?php innovative_theme_options(); // Theme Options Hook ?>
        
        <form method="post" action="options.php">
            <?php settings_fields('innovative_options'); ?>
            <?php global $innovative_options; ?>
            
            <div id="rwd" class="grid col-940">

            <h3 class="rwd-toggle"><a href="#"><?php _e('Theme Elements', 'innovative'); ?></a></h3>
            <div class="rwd-container">
                <div class="rwd-block"> 
                               
                <?php
                /**
                 * Breadcrumb Lists
                 */
                ?>
                <div class="grid col-300"><?php _e('Disable Breadcrumb Lists?', 'innovative'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
					    <input id="innovative_theme_options[breadcrumb]" name="innovative_theme_options[breadcrumb]" type="checkbox" value="1" <?php isset($innovative_options['breadcrumb']) ? checked( '1', $innovative_options['breadcrumb'] ) : checked('0', '1'); ?> />
						<label class="description" for="innovative_theme_options[breadcrumb]"><?php _e('Check to disable', 'innovative'); ?></label>
                        <p class="submit">
						<?php submit_button( __( 'Save Options', 'innovative' ), 'primary', 'innovative_theme_options[submit]', false ); ?>
						<?php submit_button( __( 'Restore Defaults', 'innovative' ), 'secondary', 'innovative_theme_options[reset]', false, $attributes ); ?>
                        </p>
                    </div><!-- end of .grid col-620 -->
                                    
                </div><!-- end of .rwd-block -->
            </div><!-- end of .rwd-container -->

            <h3 class="rwd-toggle"><a href="#"><?php _e('Logo Upload', 'innovative'); ?></a></h3>
            <div class="rwd-container">
                <div class="rwd-block">
                <?php
                /**
                 * Logo Upload
                 */
                ?>
                <div class="grid col-300"><?php _e('Custom Header', 'innovative'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        
                        <p><?php printf(__('Need to replace or remove default logo?','innovative')); ?> <?php printf(__('<a href="%s">Click here</a>.', 'innovative'), admin_url('themes.php?page=custom-header')); ?></p>
                     			
                    </div><!-- end of .grid col-620 -->
                    
                </div><!-- end of .rwd-block -->
            </div><!-- end of .rwd-container -->
                        
            <h3 class="rwd-toggle"><a href="#"><?php _e('Home Page', 'innovative'); ?></a></h3>
            <div class="rwd-container">
                <div class="rwd-block">
                <?php
                /**
                 * Front Page Override Checkbox
                 */
                ?>
                <div class="grid col-300"><?php _e('Enable Custom Front Page', 'innovative'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="innovative_theme_options[front_page]" name="innovative_theme_options[front_page]" type="checkbox" value="1" <?php checked( '1', $innovative_options['front_page'], true ); ?> />
                        <label class="description" for="innovative_theme_options[home_headline]"><?php printf( __('Overrides the WordPress %1sfront page option%2s', 'innovative'), '<a href="options-reading.php">', '</a>'); ?></label>
                    </div><!-- end of .grid col-620 -->
                <?php
                /**
                 * Homepage Headline
                 */
                ?>
                <div class="grid col-300"><?php _e('Headline', 'innovative'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="innovative_theme_options[home_headline]" class="regular-text" type="text" name="innovative_theme_options[home_headline]" placeholder="<?php _e( 'Modern, Elegant, Responsive Design', 'innovative' ); ?>" value="<?php if (!empty($innovative_options['home_headline'])) echo esc_attr($innovative_options['home_headline']); ?>" />
                        <label class="description" for="innovative_theme_options[home_headline]"><?php _e('Enter your headline', 'innovative'); ?></label>
                    </div><!-- end of .grid col-620 -->
    
                <?php
                /**
                 * Homepage Content Area
                 */
                ?>
                <div class="grid col-300"><?php _e('Content Area', 'innovative'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <textarea id="innovative_theme_options[home_content_area]" class="large-text" cols="50" rows="10" name="innovative_theme_options[home_content_area]" placeholder="<?php _e( "Welcome to the Innovative theme. In this text area make a statement and get your visitor's attention right away.",'innovative' ); ?>"><?php if (!empty($innovative_options['home_content_area'])) echo esc_html($innovative_options['home_content_area']); ?></textarea>
                        <label class="description" for="innovative_theme_options[home_content_area]"><?php _e('Enter your content', 'innovative'); ?></label>
                    </div><!-- end of .grid col-620 -->

                <?php
                /**
                 * Homepage Featured Content
                 */
                ?>
                <div class="grid col-300">
				    <?php _e('Featured Content', 'innovative'); ?>
                    <a class="help-links" href="<?php echo esc_url('http://cyberspeclab.com/guides/'); ?>" title="<?php esc_attr_e('See Guides', 'innovative'); ?>" target="_blank">
                    <?php printf(__('See Guides','innovative')); ?></a>
                </div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <textarea id="innovative_theme_options[featured_content]" class="large-text" cols="50" rows="10" name="innovative_theme_options[featured_content]" placeholder="<img class='aligncenter' src='<?php get_template_directory_uri(); ?>/inc/img/featured.jpg' width='940' height='420' alt='' />"><?php if (!empty($innovative_options['featured_content'])) echo esc_html($innovative_options['featured_content']); ?></textarea>
                        <label class="description" for="innovative_theme_options[featured_content]"><?php _e('Paste your shortcode, video or image source', 'innovative'); ?></label>
                        <p class="submit">
						<?php submit_button( __( 'Save Options', 'innovative' ), 'primary', 'innovative_theme_options[submit]', false ); ?>
						<?php submit_button( __( 'Restore Defaults', 'innovative' ), 'secondary', 'innovative_theme_options[reset]', false, $attributes ); ?>
						</p>
                    </div><!-- end of .grid col-620 -->
                    
                </div><!-- end of .rwd-block -->
            </div><!-- end of .rwd-container -->

            <h3 class="rwd-toggle"><a href="#"><?php _e('Default Layouts', 'innovative'); ?></a></h3>
            <div class="rwd-container">
                <div class="rwd-block"> 
                               
                <?php
                /**
                 * Default Static Page Layout
                 */
                ?>
                <div class="grid col-300"><?php _e( 'Default Static Page Layout', 'innovative' ); ?></div><!-- end of .grid col-300 -->
				<div class="grid col-620 fit">
					<?php $valid_options = innovative_get_valid_layouts(); 	?>
					<select id="innovative_theme_options[static_page_layout_default]" name="innovative_theme_options[static_page_layout_default]">
					<?php 
					foreach ( $valid_options as $slug => $name ) {
						?>
						<option <?php selected( $slug == $innovative_options['static_page_layout_default'] ); ?> value="<?php echo $slug; ?>"><?php echo $name; ?></option>
						<?php
					}
					?>
					</select>
				</div><!-- end of .grid col-620 -->
                               
                <?php
                /**
                 * Default Single Blog Post Layout
                 */
                ?>
                <div class="grid col-300"><?php _e( 'Default Single Blog Post Layout', 'innovative' ); ?></div><!-- end of .grid col-300 -->
				<div class="grid col-620 fit">
					<?php $valid_options = innovative_get_valid_layouts(); 	?>
					<select id="innovative_theme_options[single_post_layout_default]" name="innovative_theme_options[single_post_layout_default]">
					<?php 
					foreach ( $valid_options as $slug => $name ) {
						?>
						<option <?php selected( $slug == $innovative_options['single_post_layout_default'] ); ?> value="<?php echo $slug; ?>"><?php echo $name; ?></option>
						<?php
					}
					?>
					</select>
				</div><!-- end of .grid col-620 -->
                               
                <?php
                /**
                 * Default Blog Posts Index Layout
                 */
                ?>
                <div class="grid col-300"><?php _e( 'Default Blog Posts Index Layout', 'innovative' ); ?></div><!-- end of .grid col-300 -->
				<div class="grid col-620 fit">
					<?php $valid_options = innovative_get_valid_layouts(); 	?>
					<select id="innovative_theme_options[blog_posts_index_layout_default]" name="innovative_theme_options[blog_posts_index_layout_default]">
					<?php 
					foreach ( $valid_options as $slug => $name ) {
						?>
						<option <?php selected( $slug == $innovative_options['blog_posts_index_layout_default'] ); ?> value="<?php echo $slug; ?>"><?php echo $name; ?></option>
						<?php
					}
					?>
					</select>
                        <p class="submit">
						<?php submit_button( __( 'Save Options', 'innovative' ), 'primary', 'innovative_theme_options[submit]', false ); ?>
						<?php submit_button( __( 'Restore Defaults', 'innovative' ), 'secondary', 'innovative_theme_options[reset]', false, $attributes ); ?>
						</p>
				</div><!-- end of .grid col-620 -->
                                    
                </div><!-- end of .rwd-block -->
            </div><!-- end of .rwd-container -->

            <h3 class="rwd-toggle"><a href="#"><?php _e('Social Icons', 'innovative'); ?></a></h3>
            <div class="rwd-container">
                <div class="rwd-block">
                            
                <?php
                /**
                 * Social Media
                 */
                ?>
                <div class="grid col-300"><?php _e('Twitter', 'innovative'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="innovative_theme_options[twitter_uid]" class="regular-text" type="text" name="innovative_theme_options[twitter_uid]" value="<?php if (!empty($innovative_options['twitter_uid'])) echo esc_url($innovative_options['twitter_uid']); ?>" />
                        <label class="description" for="innovative_theme_options[twitter_uid]"><?php _e('Enter your Twitter URL', 'innovative'); ?></label>
                    </div><!-- end of .grid col-620 -->

                <div class="grid col-300"><?php _e('Facebook', 'innovative'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="innovative_theme_options[facebook_uid]" class="regular-text" type="text" name="innovative_theme_options[facebook_uid]" value="<?php if (!empty($innovative_options['facebook_uid'])) echo esc_url($innovative_options['facebook_uid']); ?>" />
                        <label class="description" for="innovative_theme_options[facebook_uid]"><?php _e('Enter your Facebook URL', 'innovative'); ?></label>
                    </div><!-- end of .grid col-620 -->
                
                <div class="grid col-300"><?php _e('LinkedIn', 'innovative'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="innovative_theme_options[linkedin_uid]" class="regular-text" type="text" name="innovative_theme_options[linkedin_uid]" value="<?php if (!empty($innovative_options['linkedin_uid'])) echo esc_url($innovative_options['linkedin_uid']); ?>" /> 
                        <label class="description" for="innovative_theme_options[linkedin_uid]"><?php _e('Enter your LinkedIn URL', 'innovative'); ?></label>
                    </div><!-- end of .grid col-620 -->
                    
                <div class="grid col-300"><?php _e('YouTube', 'innovative'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="innovative_theme_options[youtube_uid]" class="regular-text" type="text" name="innovative_theme_options[youtube_uid]" value="<?php if (!empty($innovative_options['youtube_uid'])) echo esc_url($innovative_options['youtube_uid']); ?>" /> 
                        <label class="description" for="innovative_theme_options[youtube_uid]"><?php _e('Enter your YouTube URL', 'innovative'); ?></label>
                    </div><!-- end of .grid col-620 -->
                    
                <div class="grid col-300"><?php _e('StumbleUpon', 'innovative'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="innovative_theme_options[stumble_uid]" class="regular-text" type="text" name="innovative_theme_options[stumble_uid]" value="<?php if (!empty($innovative_options['stumble_uid'])) echo esc_url($innovative_options['stumble_uid']); ?>" /> 
                        <label class="description" for="innovative_theme_options[youtube_uid]"><?php _e('Enter your StumbleUpon URL', 'innovative'); ?></label>
                    </div><!-- end of .grid col-620 -->
                    
                <div class="grid col-300"><?php _e('RSS Feed', 'innovative'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="innovative_theme_options[rss_uid]" class="regular-text" type="text" name="innovative_theme_options[rss_uid]" value="<?php if (!empty($innovative_options['rss_uid'])) echo esc_url($innovative_options['rss_uid']); ?>" /> 
                        <label class="description" for="innovative_theme_options[rss_uid]"><?php _e('Enter your RSS Feed URL', 'innovative'); ?></label>
                    </div><!-- end of .grid col-620 -->
                
                <div class="grid col-300"><?php _e('Google+', 'innovative'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="innovative_theme_options[google_plus_uid]" class="regular-text" type="text" name="innovative_theme_options[google_plus_uid]" value="<?php if (!empty($innovative_options['google_plus_uid'])) echo esc_url($innovative_options['google_plus_uid']); ?>" />  
                        <label class="description" for="innovative_theme_options[google_plus_uid]"><?php _e('Enter your Google+ URL', 'innovative'); ?></label>
                    </div><!-- end of .grid col-620 -->
                    
                <div class="grid col-300"><?php _e('Instagram', 'innovative'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="innovative_theme_options[instagram_uid]" class="regular-text" type="text" name="innovative_theme_options[instagram_uid]" value="<?php if (!empty($innovative_options['instagram_uid'])) echo esc_url($innovative_options['instagram_uid']); ?>" />  
                        <label class="description" for="innovative_theme_options[instagram_uid]"><?php _e('Enter your Instagram URL', 'innovative'); ?></label>
                    </div><!-- end of .grid col-620 -->
                    
                <div class="grid col-300"><?php _e('Pinterest', 'innovative'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="innovative_theme_options[pinterest_uid]" class="regular-text" type="text" name="innovative_theme_options[pinterest_uid]" value="<?php if (!empty($innovative_options['pinterest_uid'])) echo esc_url($innovative_options['pinterest_uid']); ?>" />  
                        <label class="description" for="innovative_theme_options[pinterest_uid]"><?php _e('Enter your Pinterest URL', 'innovative'); ?></label>
                    </div><!-- end of .grid col-620 -->
                    
                <div class="grid col-300"><?php _e('Yelp!', 'innovative'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="innovative_theme_options[yelp_uid]" class="regular-text" type="text" name="innovative_theme_options[yelp_uid]" value="<?php if (!empty($innovative_options['yelp_uid'])) echo esc_url($innovative_options['yelp_uid']); ?>" />  
                        <label class="description" for="innovative_theme_options[yelp_uid]"><?php _e('Enter your Yelp! URL', 'innovative'); ?></label>
                    </div><!-- end of .grid col-620 -->
                    
                <div class="grid col-300"><?php _e('Vimeo', 'innovative'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="innovative_theme_options[vimeo_uid]" class="regular-text" type="text" name="innovative_theme_options[vimeo_uid]" value="<?php if (!empty($innovative_options['vimeo_uid'])) echo esc_url($innovative_options['vimeo_uid']); ?>" />  
                        <label class="description" for="innovative_theme_options[vimeo_uid]"><?php _e('Enter your Vimeo URL', 'innovative'); ?></label>
                    </div><!-- end of .grid col-620 -->
                    
                <div class="grid col-300"><?php _e('foursquare', 'innovative'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="innovative_theme_options[foursquare_uid]" class="regular-text" type="text" name="innovative_theme_options[foursquare_uid]" value="<?php if (!empty($innovative_options['foursquare_uid'])) echo esc_url($innovative_options['foursquare_uid']); ?>" />  
                        <label class="description" for="innovative_theme_options[foursquare_uid]"><?php _e('Enter your foursquare URL', 'innovative'); ?></label>
                        <p class="submit">
						<?php submit_button( __( 'Save Options', 'innovative' ), 'primary', 'innovative_theme_options[submit]', false ); ?>
						<?php submit_button( __( 'Restore Defaults', 'innovative' ), 'secondary', 'innovative_theme_options[reset]', false, $attributes ); ?>
						</p>
                    </div><!-- end of .grid col-620 -->

                </div><!-- end of .rwd-block -->
            </div><!-- end of .rwd-container -->
            
            <h3 class="rwd-toggle"><a href="#"><?php _e('Custom CSS Styles', 'innovative'); ?></a></h3>
            <div class="rwd-container">
                <div class="rwd-block"> 

                <?php
                /**
                 * Custom Styles
                 */
                ?>
                <div class="grid col-300">
				    <?php _e('Custom CSS Styles', 'innovative'); ?>
                </div><!-- end of .grid col-300 -->
                
                    <div class="grid col-620 fit">
                        <textarea id="innovative_theme_options[innovative_inline_css]" class="inline-css large-text" cols="50" rows="30" name="innovative_theme_options[innovative_inline_css]"><?php if (!empty($innovative_options['innovative_inline_css'])) echo esc_textarea($innovative_options['innovative_inline_css']); ?></textarea>
                        <label class="description" for="innovative_theme_options[innovative_inline_css]"><?php _e('Enter your custom CSS styles.', 'innovative'); ?></label>
                        <p class="submit">
						<?php submit_button( __( 'Save Options', 'innovative' ), 'primary', 'innovative_theme_options[submit]', false ); ?>
						<?php submit_button( __( 'Restore Defaults', 'innovative' ), 'secondary', 'innovative_theme_options[reset]', false, $attributes ); ?>
                        </p>
                    </div><!-- end of .grid col-620 -->
                                    
                </div><!-- end of .rwd-block -->
            </div><!-- end of .rwd-container -->
            
            <h3 class="rwd-toggle"><a href="#"><?php _e('Custom Scripts', 'innovative'); ?></a></h3>
            <div class="rwd-container">
                <div class="rwd-block"> 

                <?php
                /**
                 * Custom Styles
                 */
                ?>
                <div class="grid col-300">
				    <?php _e('Custom Scripts for Header and Footer', 'innovative'); ?>
                </div><!-- end of .grid col-300 -->
                
                    <div class="grid col-620 fit">
                        <p><?php printf(__('Embeds to header.php &darr;','innovative')); ?></p>
                        <textarea id="innovative_theme_options[innovative_inline_js_head]" class="inline-css large-text" cols="50" rows="30" name="innovative_theme_options[innovative_inline_js_head]"><?php if (!empty($innovative_options['innovative_inline_js_head'])) echo esc_textarea($innovative_options['innovative_inline_js_head']); ?></textarea>
                        <label class="description" for="innovative_theme_options[innovative_inline_js_head]"><?php _e('Enter your custom header script.', 'innovative'); ?></label>
                        
                        <p><?php printf(__('Embeds to footer.php &darr;','innovative')); ?></p>
                        <textarea id="innovative_theme_options[innovative_inline_js_footer]" class="inline-css large-text" cols="50" rows="30" name="innovative_theme_options[innovative_inline_js_footer]"><?php if (!empty($innovative_options['innovative_inline_js_footer'])) echo esc_textarea($innovative_options['innovative_inline_js_footer']); ?></textarea>
                        <label class="description" for="innovative_theme_options[innovative_inline_js_footer]"><?php _e('Enter your custom footer script.', 'innovative'); ?></label>
                        <p class="submit">
						<?php submit_button( __( 'Save Options', 'innovative' ), 'primary', 'innovative_theme_options[submit]', false ); ?>
						<?php submit_button( __( 'Restore Defaults', 'innovative' ), 'secondary', 'innovative_theme_options[reset]', false, $attributes ); ?>
						</p>
                    </div><!-- end of .grid col-620 -->
                                    
                </div><!-- end of .rwd-block -->
            </div><!-- end of .rwd-container -->
			
			<?php
			// Call action to add pro theme options.
			do_action( 'innovative_pro_options' );
			?>

            </div><!-- end of .grid col-940 -->
        </form>
    </div>
    <?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function innovative_theme_options_validate($input) {

	global $innovative_options;
	$defaults = innovative_get_option_defaults();

	if ( isset( $input['reset'] ) ) {

		$input = $defaults;

	} else {

		// checkbox value is either 0 or 1
		foreach (array(
			'breadcrumb',
			'front_page'
			) as $checkbox) {
			if (!isset($input[$checkbox]))
				$input[$checkbox] = null;
				$input[$checkbox] = ( $input[$checkbox] == 1 ? 1 : 0 );
		}
		foreach ( array(
			'static_page_layout_default',
			'single_post_layout_default',
			'blog_posts_index_layout_default'
			) as $layout ) {
			$input[$layout] = ( isset( $input[$layout] ) && array_key_exists( $input[$layout], innovative_get_valid_layouts() ) ? $input[$layout] : $innovative_options[$layout] );
		}
		foreach ( array(
			'home_headline',
			'home_content_area',
			'featured_content',
			) as $content ) {
			$input[$content] = ( in_array( $input[$content], array( $defaults[$content], '' ) ) ? $defaults[$content] :  wp_kses_stripslashes($input[$content] ) );
		}
		$input['twitter_uid'] = esc_url_raw($input['twitter_uid']);
		$input['facebook_uid'] = esc_url_raw($input['facebook_uid']);
		$input['linkedin_uid'] = esc_url_raw($input['linkedin_uid']);
		$input['youtube_uid'] = esc_url_raw($input['youtube_uid']);
		$input['stumble_uid'] = esc_url_raw($input['stumble_uid']);
		$input['rss_uid'] = esc_url_raw($input['rss_uid']);
		$input['google_plus_uid'] = esc_url_raw($input['google_plus_uid']);
		$input['instagram_uid'] = esc_url_raw($input['instagram_uid']);
		$input['pinterest_uid'] = esc_url_raw($input['pinterest_uid']);
		$input['yelp_uid'] = esc_url_raw($input['yelp_uid']);
		$input['vimeo_uid'] = esc_url_raw($input['vimeo_uid']);
		$input['foursquare_uid'] = esc_url_raw($input['foursquare_uid']);
		$input['innovative_inline_css'] = wp_kses_stripslashes($input['innovative_inline_css']);
		$input['innovative_inline_js_head'] = wp_kses_stripslashes($input['innovative_inline_js_head']);
		$input['innovative_inline_js_footer'] = wp_kses_stripslashes($input['innovative_inline_js_footer']);

	}
	
    return $input;
}
