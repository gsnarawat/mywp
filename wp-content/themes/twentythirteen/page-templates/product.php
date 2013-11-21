<?php
/**
 * Template Name: Product Page Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in Twenty Twelve consists of a page content area for adding text, images, video --
 * anything you'd like -- followed by front-page-only widgets in one or two columns.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

<?php
		$args = array(
			'post_type' => 'product', 'posts_per_page' => 4
		);
		$products = new WP_Query( $args );
               
		if( $products->have_posts() ) {
			while( $products->have_posts() ) {
				$products->the_post();
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
	foreach( $fields as $field_name => $value )
	{
		// get_field_object( $field_name, $post_id, $options )
		// - $value has already been loaded for us, no point to load it again in the get_field_object function
		$field = get_field_object($field_name, false, array('load_value' => false));
 
		echo '<div>';
                 
			 if ( $field_name  == "quantity")
                         {
   			   echo '<h3>' . $field_name . '</h3>';
                           if ($value >= 1)
                            {
                             echo "Stock status : Available";
			    }
 		           else{
                             echo "Stock status : Sold Out!";
                             }
                          }
                        elseif ( $field_name  == "color")
                         {
 			   
                          }
                   else
 			{

			echo '<h3>' . $field_name . '</h3>';
			PRINT  $value .'$';
                        PRINT '<input type="hidden" name="' . $field_name . '" value="' . $value . '">';

 			}

          
           
		echo '</div>';
	}
 
  
  PRINT '</form>';
         
}
                                ?>
				<?php
			}
		}
		else {
			echo 'Oh ohm no products!';
		}
	?>



	

	

       
<?php get_footer(); ?>
