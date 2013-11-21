<?php

/*
Plugin Name: latest-plugin
Description: Create something extra
Version: 1.0
Author: Gopal Singh
Author URI: http://google.com/
Plugin URI: http://google.com/
*/



/**
 * Define some useful constants
 **/

define('LATEST_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('LATEST_PLUGIN_URL', plugin_dir_url(__FILE__));



/**
 * Load files
 * 
 **/
function latest_plugin_load(){
		
    if(is_admin()) //load admin files only in admin
        require_once(LATEST_PLUGIN_DIR.'includes/admin.php');
        
    require_once(LATEST_PLUGIN_DIR.'includes/core.php');
}

latest_plugin_load();


?>
