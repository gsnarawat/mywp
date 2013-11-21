<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>
<?php
session_start();
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/style.css"  media="screen" />
        <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css" rel="stylesheet"/>
        <script src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.9.1.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/script.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.mixitup.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/functions.js"></script>
        
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php
if ( is_user_logged_in() ) {
   
    ?> <a href="<?php echo wp_logout_url(); ?>" title="Logout" style="float:right; margin-right:100px; margin-top:50px; font-size:20px;">Logout</a> <?php

} else {
   
    PRINT '<a href="/gopal/wordpress/login" style="float:right; margin-right:100px; margin-top:50px; font-size:20px;"> login </a>';
}
?>
  
     

      <!--logo-image-->
        <div class="logo-div">
            <a href="javascript:void(0);"></a>
        </div>
        <!--/logo-image-->
        
  
       

     <!----- <ul class="tab-container">
            <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" class="div-tab tab-sprite tab1 active"></a></li>
            <li><a href="<?php echo site_url("/about/"); ?> " class="div-tab tab-sprite about"></a>
                <div class="sub-subdiv">
                    <a href="boardofdirector.html" class="drop-list">Board of Directors</a>
                    <a href="leadership.html" class="drop-list">Leadership</a>
                </div>
            </li>
            <li><a href="services.html" class="div-tab tab-sprite service"></a>
                <div class="sub-subdiv">
                    <a href="services.html" class="drop-list">sap service</a>
                    <a href="microsoft-solutions.html" class="drop-list">Microsoft Solutions</a>
                </div>
            </li>
            <li><a href="client_list.html" class="div-tab tab-sprite client"></a>
                <div class="sub-subdiv">
                    <a href="client_list.html" class="drop-list">client list</a>
                    <a href="client-testimonials.html" class="drop-list">client Testimonials</a>
                </div>
            </li>
            <li><a href="javascript:void(0);" class="div-tab tab-sprite consultant"></a>
                <div class="sub-subdiv sub-subdiv3">
                    <a href="about.html" class="drop-list">Consultant Testimonials</a>
                    <a href="about.html" class="drop-list">Featured Consultant</a>
                    <a href="about.html" class="drop-list">faqs</a>
                </div>
            </li>
            <li><a href="javascript:void(0);" class="div-tab tab-sprite partners"></a></li>
            <li><a href="javascript:void(0);" class="div-tab tab-sprite contact"></a>
                <div class="sub-subdiv">
                    <a href="contact-locations.html" class="drop-list">Location</a>
                    <a href="" class="drop-list">locations</a>
                </div>
            </li>
            <li><a href="javascript:void(0);" class="div-tab tab-sprite search"><input type="text" value="" placeholder="Search"></a></li>
        </ul>  --->


 <div style="clear: both;"></div>
        <div class="tab-c">
            <ul class="tab-container" style="border-right: medium none;">
                <li class="tab-1"><a href="<?php echo site_url(); ?>" class="div-tab  tab1 <?php if ( is_front_page() ) { echo "active"; }  ?>"></a></li>
            </ul>
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'tab-container' , 'container' => 'none' ) ); ?>
        </div>
        


 <!--tab-->

        <!--slider-images-->
        <div class="slide-container">
            <div id="myCarousel" class="carousel slide">
                <ol class="carousel-indicators opt-bar">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"><a href="javascript:void(0);" class="people">People</a></li>
                    <li data-target="#myCarousel" data-slide-to="1" ><a href="javascript:void(0);" class="people">Process</a></li>
                    <li data-target="#myCarousel" data-slide-to="2"><a href="javascript:void(0);" class="people">Result</a></li>
                </ol>
                <!-- Carousel items -->
                <div class="carousel-inner">
                    <div class="active item"><img src="<?php echo get_template_directory_uri(); ?>/img/slid-img.png" /></div>
                    <div class="item"><img src="<?php echo get_template_directory_uri(); ?>/img/slid-img.png" /></div>
                    <div class="item"><img src="<?php echo get_template_directory_uri(); ?>/img/slid-img.png" /></div>
                </div>
                <!-- Carousel nav -->
            </div>
        </div>

        <!--/slider-images-->
       



