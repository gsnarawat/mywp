<?php
/**
 * Template Name: Contact Page Template
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

	 <div class="leadership-div">
	<div class="content loc-content">	
        <div class="service-line">
    	<img src="<?php bloginfo('template_url');?>/img/service-line.png" />
    </div>
    <div class="service-text location-text">
    	<h1>Locations</h1>
    </div>
    <div class="service-line1">
    	<img src="<?php bloginfo('template_url');?>/img/service-line.png" />
    </div>
    <div class="blank-bar"></div>
		 <!--<h2>Bulki Bartz, Founder, CEO &amp; Board Member</h2>-->
     <div class="contact-location">
     <div class="location">
	<img src="<?php bloginfo('template_url');?>/img/houston.jpg" alt="SAP Houston, Dallas, Toronto" />
	<div class="location_info">
		<h3>Corporate Headquarters</h3>
		<h4>Houston, Texas</h4>
		<p>713-965-7922</p>
		<p>12808 W. Airport<br />Ste 329<br />Sugar Land TX 77478</p>
	</div>
</div>

<div class="location">
	<img src="<?php bloginfo('template_url');?>/img/new-york-1.jpg" alt="" />
	<div class="location_info">
		<h3>New York</h3>
		<p>2255 Centre Avenue<br />Bellmore, NY 11710</p>
	</div>
</div>

<div class="location">
	<img src="<?php bloginfo('template_url');?>/img/new-york-2.jpg" alt="" />
	<div class="location_info">
		<h3>New York City</h3>
		<p>419 Park Avenue South<br />2nd Floor<br />New York, NY 10016</p>
	</div>
</div>

<div class="location">
	<img src="<?php bloginfo('template_url');?>/img/india-1.jpg" alt="" />
	<div class="location_info">
		<h3>Ahmedabad</h3>
		<p>226-227,Sangath Mall-1,<br />
Opp.Engineering College,<br />
Sabarmati-Gandhinagar Highway,<br />
Ahmedabad- 382 424<br />
Gujarat,India</p>
	</div>
</div>
<div class="location">
	<img src="<?php bloginfo('template_url');?>/img/india-2.jpg" alt="" />
	<div class="location_info">
		<h3>Noida</h3>
		<p>B-88, Second Floor<br />
Sector-64<br />
Noida (India)</p>
	</div>
</div>

<div class="location">
	<img src="<?php bloginfo('template_url');?>/img/india-3.jpg" alt="" />
	<div class="location_info">
		<h3>Jaipur</h3>
		<p>A-23, Swej Farm, Opposite Park,<br />
Reliance Fresh Lane, New Sanganer Road,<br />
Jaipur, Rajasthan 302019</p>
	</div>
</div>
</div>
</div>
</div>
<div class="clearfixed"></div>


<?php get_footer(); ?>
