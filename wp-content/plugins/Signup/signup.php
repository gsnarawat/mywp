<?php
/*
Plugin Name:Sign up
Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
Description: A brief description of the Plugin.
Version: The Plugin's Version Number, e.g.: 1.0
Author: Ravi Khandelwal
Author URI: http://URI_Of_The_Plugin_Author
License: A "Slug" license name e.g. GPL2
*/

?><script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

<script>
function change()
{
	
	$(document).ready(function(e) 
	{
       $("#check").show();  
	   $("#cname").hide(); 
    });
	}
</script>

<script>
function crname()
{
	$(document).ready(function(e) 
	{
       $("#cname").show(); 
	   $("#check").hide();   
    });
	}
</script>

<script>
function bhide()
{
	
	$(document).ready(function(e) 
	{
       $("#check").hide();  
	   $("#cname").hide(); 
    });
	}
</script>


<?php


add_action('register_form','register_extra_fields');
function register_extra_fields(){
	
	global $wpdb; 
?>

<p>

<label class="label01"><?php _e('Title') ?></label>
<select name="user_sal" class="text-input" style="height:30px;width:263px" tabindex="7">
     <option value="" >select</option>
     <option value="Mr" <?php if($_POST['user_sal']=='Mr')
{ ?> selected="selected" <?Php } ?>>Mr</option>
      <option value="Miss"  <?php
if($_POST['user_sal']=='Miss'){ ?> selected="selected" <?Php }
?>>Miss</option>
   </select>
</p>
<p>
   <label class="label01"><?php _e('First Name') ?></label>
   <input id="user_fname"  type="text" size="25" value="<?php echo $_POST['first_name']; ?>" name="first_name"  class="text-input" tabindex="8"/>
</p>
<p>
   <label class="label01"><?php _e('Last Name') ?></label>
   <input id="user_lname" type="text"  size="25" value="<?php echo $_POST['last_name']; ?>" name="last_name"  class="text-input" tabindex="9"/>
</p>
<p><label class="label01"><?php _e('Sign Up AS:') ?></label></p>
<p><input type="radio" name="sup" value="Company"onclick="crname();" />Company<br />
<input type="radio" name="sup" value="Individual" onclick="bhide();"/>Individual<br />
<input type="radio" name="sup" value="Under a company" onclick="change();"/>Register under a company 
</p>
<div style="display:none;" id="check">
<p><br/>
<label class="label01"><?php _e( 'Please Select Company' ); ?>
<?php  $results = $wpdb->get_results("SELECT VALUE FROM wp_cimy_uef_data");?>
			<select class="text-input" style="height:30px;width:263px" name="company"><?php foreach($results as $result): ?>
		<option value="<?php echo $result->VALUE; ?>"><?php echo $result->VALUE;?></option><?php endforeach;?>
		</select></label><br/><p></p>
  <input type="hidden" name="status" value="0" />
</p></div>

<div style="display:none;" id="cname">
<p><br/>
<label class="label01"><?php _e( 'Please Enter your Company Name' ); ?></label>
<input type="text"  size="25" value="<?php echo $_POST['cname']; ?>" name="cname"  class="text-input"/><br/><p></p>
  <input type="hidden" name="status" value="0" />
</p></div>
<?php
} 


add_action('register_post','check_fields_errors',10,3);
function check_fields_errors($login, $email, $errors) {
    global $firstname, $lastname;
    if ($_POST['first_name'] == '') {
        $errors->add('empty_realname', '<strong>Error</strong>: Please enter First name');
    } else {
        $firstname = $_POST['first_name'];
    }
    if ($_POST['last_name'] == '') {
        $errors->add('empty_realname',
'<strong>Error</strong>: Please enter Last name');
    } else {    
        $firstname = $_POST['last_name'];
    }
}



add_action('user_register', 'register_post_fields');
function register_post_fields($user_id, $password='', $meta=array())  {
    $userdata = array();
    $userdata['ID'] = $user_id;
    $userdata['first_name'] = $_POST['first_name'];
    $userdata['last_name'] = $_POST['last_name'];
    $userdata['user_sal'] = $_POST['user_sal'];
	$userdata['company'] = $_POST['company'];
	$userdata['sup'] = $_POST['sup'];
	$userdata['cname'] = $_POST['cname'];
    wp_update_user($userdata);
    update_usermeta( $user_id, 'first_name', $_POST['first_name'] );
    update_usermeta( $user_id, 'last_name', $_POST['last_name'] );
    update_usermeta( $user_id, 'user_sal', $_POST['user_sal'] );  
	update_usermeta( $user_id, 'company', $_POST['company'] );   
	update_usermeta( $user_id, 'sup', $_POST['sup'] );
	update_usermeta( $user_id, 'sup', $_POST['cname'] );
}



add_action( 'show_user_profile', 'display_extra_profile_fields' );
add_action( 'edit_user_profile', 'display_extra_profile_fields' );
function display_extra_profile_fields( $user ) {  
    global $current_user;  
    get_currentuserinfo();
?>
<h3  class="head_title"><?php _e('Extra Profile Information', 'frontendprofile'); ?></h3>
    <table class="form-table">
        <tr>
            <th><label for="label01" class="lable_profile"><?php _e('Title', 'frontendprofile'); ?></label></th>
            <td>
              <select name="user_sal">
                    <option value="" >select</option>
                    <option value="Mr"  <?php if(esc_attr( get_the_author_meta( 'user_sal', $user->ID ) )=='Mr'){ ?> selected="selected" <?Php } ?>>Mr</option>
                    <option value="Miss"  <?php if(esc_attr( get_the_author_meta( 'user_sal', $user->ID ) )=='Miss'){ ?> selected="selected" <?Php } ?>>Miss</option>
               </select>        
            <span class="description"><h3><?php _e('Please select your Title.', 'frontendprofile'); ?></h3></span>
            </td>
        </tr>  
        <?php if(esc_attr( get_the_author_meta( 'sup', $user->ID ) )=='Under a company'){ ?>  
		
		 <tr>
            <th><label for="label01" class="lable_profile"><?php _e('Company Name', 'frontendprofile'); ?></label></th>
            <td>
            
            <input type="text" value="<?php echo get_the_author_meta( 'company', $user->ID )?>" readonly="readonly" />
            
                      
           
            </td>
        </tr>  
		<?Php } ?>
       
        
        <tr>
            <th><label for="label01" class="lable_profile"><?php _e('Profile Role', 'frontendprofile'); ?></label></th>
            <td>
            
            <input type="text" value="<?php echo get_the_author_meta( 'sup', $user->ID )?>" readonly="readonly" />
            
                      
           
            </td>
        </tr>  
    </table>
<?php
} 


add_action( 'personal_options_update', 'update_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'update_extra_profile_fields' );
function update_extra_profile_fields( $user_id ) {
    global $current_user,$wpdb;
    get_currentuserinfo();
    if ( !current_user_can( 'edit_user', $user_id ) )
        return false;
    if (in_array('administrator', $current_user->roles) || $current_user->data->ID==$user_id){
                    $userdata = array();
                    $userdata['ID'] = $user_id;                    
                    $userdata['user_sal'] = $_POST['user_sal'];
                    update_usermeta( $user_id, 'user_sal', $_POST['user_sal'] );
    }
 
}



