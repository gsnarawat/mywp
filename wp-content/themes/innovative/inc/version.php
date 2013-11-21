<?php

/**
 * Version Control
 *
 *
 * @file           version.php
 * @package        Innovative
 */
?>
<?php
if ( function_exists('wp_get_theme')) {
	
function innovative_template_data() {
    echo '<!-- We need this for debugging -->' . "\n";
    echo '<!-- ' . get_innovative_template_name() . ' ' . get_innovative_template_version() . ' -->' . "\n";
}
 
add_action('wp_head', 'innovative_template_data');

function innovative_theme_data() {
    if ( is_child_theme() ) {
        echo '<!-- ' . get_innovative_theme_name() . ' ' . get_innovative_theme_version() . ' -->' . "\n";
    }
}

add_action('wp_head', 'innovative_theme_data');

function get_innovative_theme_name() {
	$theme = wp_get_theme();
	return $theme->Name;
}

function get_innovative_theme_version() {
	$theme = wp_get_theme();
	return $theme->Version;	
}

function get_innovative_template_name() {
	$theme = wp_get_theme();
	$parent = $theme->parent();
	if ( $parent )
		$theme = $parent;
	
	return $theme->Name;
}

function get_innovative_template_version() {
	$theme = wp_get_theme();
	$parent = $theme->parent();
	if ( $parent )
		$theme = $parent;

	return $theme->Version;	
}

} else {
	
/**
 * < 3.4 Backward Compatibility
 *
 * Konstantin Kovshenin Contribution
 *
 */
	
$theme_data = get_theme_data(STYLESHEETPATH . '/style.css');
define('innovative_current_theme', $theme_name = $theme_data['Name']);

function innovative_template_data() {

    $theme_data = get_theme_data(TEMPLATEPATH . '/style.css');
    $innovative_template_name = $theme_data['Name'];
    $innovative_template_version = $theme_data['Version'];

    echo '<!-- We need this for debugging -->' . "\n";
    echo '<meta name="template" content="' . $innovative_template_name . ' ' . $innovative_template_version . '" />' . "\n";
}

add_action('wp_head', 'innovative_template_data');

function innovative_theme_data() {
    if (is_child_theme()) {
        $theme_data = get_theme_data(STYLESHEETPATH . '/style.css');
        $innovative_theme_name = $theme_data['Name'];
        $innovative_theme_version = $theme_data['Version'];

        echo '<meta name="theme" content="' . $innovative_theme_name . ' ' . $innovative_theme_version . '" />' . "\n";
    }
}

add_action('wp_head', 'innovative_theme_data');
}