<?php
/**
 * Plugin Name: Import Calander
 * Plugin URI: http://ronaksethi.com
 * Version: The Plugin's Version Number, e.g.: 1.0
 * Author: Ronak Sethi
 * Author URI: http://ronaksethi.com
 * License: A "Slug" license name e.g. GPL2
 */

add_action( 'admin_menu', 'register_my_custom_menu_page' );

function register_my_custom_menu_page(){
     add_menu_page( 'custom menu title', 'custom menu', 'manage_options', 'custompage', 'my_custom_menu_page', plugins_url( 'images/icon.png' , __FILE__ ), 6 ); 
}

function my_custom_menu_page(){
   include  'import-csv.php';
}


