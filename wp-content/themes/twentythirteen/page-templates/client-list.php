
<?php
/**
 * Template Name: client-list Page Template
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


<div class="srvices-div">
	<div class="client-line">
    	<img src="<?php bloginfo('template_url'); ?>/img/client-list-line.png" />
    </div>
    <div class="service-text client-bar-text">
    	<h1>clients list</h1>
    </div>
    <div class="client-line1">
    	<img src="<?php bloginfo('template_url'); ?>/img/client-list-line.png" />
    </div>
    <div class="clearfixed"></div>
    <div class="client-text">
    	<p>Our primary focus is to make the customer's project a success; our portfolio of services, accelerators and engagement models are tailored to make our partnership relevant to your specific needs. We understand that your charter is to add value to your business by providing a stable and scalable operational system and surround it with strategic assets that allow business innovation.

IsoTech Systems leadership team and consultants have proudly been involved in some of the most successful SAP implementations throughout the United States and Canada.</p>
    </div>
    <div class="clearfixed"></div>
    <div class="select-list">
    	<ul class="list-contain">
        <li><a href="javascript:void(0);" class="filter " data-filter="all">all</a></li>
        <li><a href="javascript:void(0);" class="filter" data-filter="category_1">Energy & Chemicals</a></li>
        <li><a href="javascript:void(0);" class="filter" data-filter="category_2">Aerospace & Defense</a></li>
        <li><a href="javascript:void(0);" class="filter" data-filter="category_3">Consumer & Industrial</a></li>
        <li><a href="javascript:void(0);" class="filter" data-filter="category_4">echnology</a></li>
        <li><a href="javascript:void(0);" class="filter" data-filter="category_5">Life Science</a></li>
        <li><a href="javascript:void(0);" class="filter" data-filter="category_6">Public Sector</a></li>
        </ul>
    </div>
    <div class="clearfixed"></div>
    <ul class="clients-list-div" id="Grid">
    	<li class="list list1 category_1 mix" data-cat="1">
        	<a href="javascript:void(0);"><img src="<?php bloginfo('template_url'); ?>/img/clients-list1.png" /></a>
        </li>
        <li class="list list2 category_2 mix" data-cat="2">
        	<a href="javascript:void(0);"><img src="<?php bloginfo('template_url'); ?>/img/clients-list1.png" /></a>
        </li>
        <li class="list list2 category_3 mix" data-cat="3">
        	<a href="javascript:void(0);"><img src="<?php bloginfo('template_url'); ?>/img/clients-list1.png" /></a>
        </li>
        <li class="list list1 category_1 mix" data-cat="1">
        	<a href="javascript:void(0);"><img src="<?php bloginfo('template_url'); ?>/img/clients-list1.png" /></a>
        </li>
        <li class="list list2 category_2 mix" data-cat="2">
        	<a href="javascript:void(0);"><img src="<?php bloginfo('template_url'); ?>/img/clients-list1.png" /></a>
        </li>
        <li class="list list2 category_3 mix" data-cat="3">
        	<a href="javascript:void(0);"><img src="<?php bloginfo('template_url'); ?>/img/clients-list1.png" /></a>
        </li>
        <li class="list list1 category_1 mix" data-cat="1">
        	<a href="javascript:void(0);"><img src="<?php bloginfo('template_url'); ?>/img/clients-list1.png" /></a>
        </li>
        <li class="list list2 category_2 mix" data-cat="2">
        	<a href="javascript:void(0);"><img src="<?php bloginfo('template_url'); ?>/img/clients-list1.png" /></a>
        </li>
        <li class="list list2 category_3 mix" data-cat="3">
        	<a href="javascript:void(0);"><img src="<?php bloginfo('template_url'); ?>/img/clients-list1.png" /></a>
        </li>
    </ul>
</div>
         <div class="clearfixed"></div>
         <div class="break-img"><img src="<?php bloginfo('template_url'); ?>/img/break-img.png" /></div>
    <div class="clearfixed"></div>
    <div class="client-lists">
    	<div class="clients-bar">
    		<img src="<?php bloginfo('template_url'); ?>/img/clients.png" />
        </div>
    </div>
    </div>

    <div class="clearfixed"></div>

<script>

$(function(){
    $('#Grid').mixitup();
	$('.carousel').carousel()

});
</script>

<?php get_footer(); ?>
