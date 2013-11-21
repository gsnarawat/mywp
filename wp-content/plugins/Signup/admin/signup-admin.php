<?php require_once('/../myplugin.php');
require('D:/xampp/htdocs/new/wp-load.php');


add_action( 'admin_menu', 'register_my_custom_menu_page' );
function register_my_custom_menu_page(){
    add_menu_page( 'custom menu title', 'Myplugin', 'manage_options', 'custompage', 'my_custom_menu_page'); 
}

function my_custom_menu_page(){
	$url = plugins_url();?>
<form action="<?php echo $url?>/myplugin/myplugin.php"  method="get">
<h1>Myplugin</h1>

<table>
<tr>
<td>No of post to show :</td><td><input type="text" name="noofpost"/></td></tr>
<tr><td></td><td><input type="submit" name="noof" value="Save" /></td></tr>

</table></form>


	   <?php    }  
    
      ?>
    