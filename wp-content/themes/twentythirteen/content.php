<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>


<?php
 
/*
*  get all custom fields and dump for texting
*/
 
 
/*
*  get all custom fields, loop through them and load the field object to create a label => value markup
*/
?>
<div class='breadcrumb'>

<a href='<?php the_permalink() ?>'
rel='bookmark' title='<?php the_title(); ?>'>
<?php the_title(); ?></a> »
</div>

<?php

if ( has_post_thumbnail() ) {
	the_post_thumbnail();
} 
 
$fields = get_fields();


 
if( $fields )
{  
    PRINT '<form id="cart_add" action="" method="post">';
    ?> <input type="hidden" value="<?php echo get_the_ID(); ?>" name="post_id">
   <?php	
   foreach( $fields as $field_name => $value )
	{
		// get_field_object( $field_name, $post_id, $options )
		// - $value has already been loaded for us, no point to load it again in the get_field_object function
		$field = get_field_object($field_name, false, array('load_value' => false));
 
		echo '<div>';
                 
			 if ( $field_name  == "quantity")
                         {
   			   echo '<h3>' . $field_name . '</h3>';
 			 
   		PRINT '<input type="button" id="minus" value="-" onClick="textb.value = (textb.value-1)" style="margin:2px 11px 0 19px;">';
   			PRINT ' <input type="text" id="textb" name="' . $field_name . '" value="'. $value .'" style="width:90px; height:30px;" />';
  		       PRINT '<input type="button" value="+" onClick="textb.value = (+textb.value+1)" style="margin:2px 11px 0 19px;">';
			
                          }
                        elseif ( $field_name  == "color")
                         {
 			    echo '<h3>' . $field_name . '</h3>';
                             PRINT '<select name="colors">';
 
                     // for each value of the array assign a variable name word
			FOREACH($value AS $color){
   			 PRINT '<option value="'.$color.'">'.$color.'</option>';
				}
			PRINT '</select>';
                          }
                   else
 			{

			echo '<h3>' . $field_name . '</h3>';
			PRINT  $value . '$';
                        PRINT '<input type="hidden" name="' . $field_name . '" value="' . $value . '">';

 			}

          
           
		echo '</div>';
	}
 
  PRINT '<input type="submit" value="Add to Cart" name="submit">';
  PRINT '</form>';
         
}

 
if (isset($_POST['submit']))

{
   
   $_SESSION["products"][$_POST['post_id']] = array ('price' => $_POST['price'], 'quantity' => $_POST['quantity'], 'color' => $_POST['colors']); 
echo '<pre>';
var_dump($_SESSION);
   
}

 

global $wpdb;
 

echo "Details of user Table : <br/>";
$myrows = $wpdb->get_results( "SELECT id, user_nicename FROM wp_users" );

 foreach($myrows as $record)
 {
   echo "user " . $record->id . " : " . $record->user_nicename;
   echo '<br/>';
   
 }



echo "Details of posts Table of type Product :-) :-D : <br/> <br/>";

 $myrows = $wpdb->get_results("SELECT id, post_title, post_status, post_name, post_date FROM wp_posts where post_type='product'");

 if(!empty($myrows))
 {
  ?>
  <table id="product_posts"  border="2">
   <tr>
   <th> ID 
   <th> Title 
   <th> Status 
   <th> Name
   <th> Date
  </tr>
 
 <?php
  foreach($myrows as $record)
 {
   PRINT '<tr> <td>' . $record->id;
   echo '<td>' . $record->post_title;
   echo '<td>' . $record->post_status;
   echo '<td>' . $record->post_name;
   echo '<td>' . $record->post_date . '</tr>';
   
  }
 PRINT '</table>';
 }


$myrows = $wpdb->get_results("SELECT DISTINCT * FROM wp_posts, wp_postmeta WHERE wp_posts.ID = wp_postmeta.post_id AND  wp_posts.post_type='product'");

 if(!empty($myrows))
 {
  
  echo "<br/><br/> Fetching data from posts and post_meta , details are:";
   ?>
  
  
  
  <table id="postnpostmeta"  border="2">
   <tr>
   <th> ID 
   <th> Post_Meta_ID
   <th> Status   
  </tr>
 
 <?php
  foreach($myrows as $record)
 {
   echo '<tr> <td>' . $record->ID;
   echo '<td>' . $record->meta_id;
   echo '<td>' . $record->post_status . '</tr>';
   
  }
 PRINT '</table>';
 }

?>


<script type="text/javascript">
var input = document.getElementById('textb');

input.addEventListener('change', function(e) {
    var num = parseInt(this.value, 10),
        min = 1;

    if (isNaN(num)) {
        this.value = min;
        return;
    }
    if (num <= 0)
  {
    alert("minimum quantity will be 1 ");
    this.value = min;
 }
});
</script>

