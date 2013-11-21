

<link rel="stylesheet" type="text/css" href="<?php echo plugins_url( 'css/mycss.css' , __FILE__ ) ; ?>" media="all">
<script src="<?php echo plugins_url( 'js/myjs.js' , __FILE__ ) ; ?>"></script>

<br/> <br/> <br/>
<?php
  echo "I am going to Implement a short code from this plugin";
  echo '<br/>';
  echo do_shortcode('[buttonw link="http://google.com"]Go to Google[/buttonw]');
 ?>


