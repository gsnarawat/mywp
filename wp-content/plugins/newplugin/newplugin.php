<?php
/**
 * Plugin Name: NewPlugin
 * Plugin URI: http://rorblogtemplate.herokuapp.com/
 * Description: this is my first plugin to learn how to write a wordpress plugin, step by step
 * Version: 1.0
 * Author: Gopal Singh
 * Author URI: http://rorblogtemplate.herokuapp.com/
 * License: A2Z
 */





    add_filter( 'the_content', 'tfr_the_content' );
     
    function tfr_the_content( $content ) {
      return $content . '<p>Thanks for Reading!</p>';
    }



   add_action( 'admin_menu', 'register_my_plugin_shortcode' );

    function register_my_plugin_shortcode(){
     add_menu_page( 'custom menu title', 'shortcode', 'manage_options', 'custompage', 'my_plugin_shortcode', plugins_url( 'images/icon.png' , __FILE__ ), 6 ); 
  }

  function my_plugin_shortcode(){
    include 'mypage.php';
  }

  

  function sButton($atts, $content = null) {
   extract(shortcode_atts(array('link' => '#'), $atts));
   return '<a class="buttonw" href="'.$link.'"><span>' . do_shortcode($content) . '</span></a>';
   }

 add_shortcode('buttonw', 'sButton');






  add_action('before_delete_post', 'do_stuffs_before_deleting_post' );
  $postid = get_the_ID();
  function do_stuffs_before_deleting_post($postid)
  {   
     global $post_type;
     if ($post_type != 'product') return; 
      echo "hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh";
  }

?>
