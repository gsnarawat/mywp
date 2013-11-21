
<?php
/**
 * Template Name: ms-solution Page Template
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
	<div class="content ms-content">	
        <div class="bod-line">
    	<img src="<?php bloginfo('template_url'); ?>/img/break-img1.png" />
    </div>
    <div class="service-text ms-bar">
    	<h1>Microsoft Solutions</h1>
    </div>
    <div class="bod-line1">
    	<img src="<?php bloginfo('template_url'); ?>/img/break-img1.png" />
    </div>
		 <!--<h2>Bulki Bartz, Founder, CEO &amp; Board Member</h2>-->
     <p class="ms-div">IsoTech Systems has experience in delivering Microsoft Enterprise Solutions to enterprises ranging from Fortune 500 companies to emerging technology startups. As a Microsoft Enterprise solutions provider, we leverage our global alliances and in-depth knowledge of Microsoft architectures to optimize business processes and models, drive measurable value to the enterprise, and address business challenges with highly available and scalable solutions.</p>
	<p>IsoTech Systems' Microsoft Enterprise Solutions enable the extended enterprise, delivering seamless sharing of mission-critical information between employees, business partners and customers. In the extended enterprise, ERP, legacy systems, transaction systems, customer relationship management and business intelligence are integrated to deliver actionable information among these key business stakeholders.</p>
	<p>We focus our knowledge into distinct service offerings that encompass the key market issues and challenges now facing our clients. Our Microsoft Enterprise Solutions offerings include:</p>

    <div style="float: left; width: 300px; margin: 20px 50px 0 50px;">
        <h2>Technical Expertise</h2>
        <ul>
            <li>.NET Enterprise Architecture</li>
            <li>.NET Deployment and Migration</li>
            <li>Enterprise Application Integration</li>
            <li>Business to Consumer</li>
            <li>Business Intelligence</li>
            <li>ePortal and Content Management</li>
            <li>Mobile Architecture</li>
            <li>Managed Content Hosting</li>
        </ul>
    </div>	
</div>
</div>
<div class="clearfixed"></div>

<script>
$('.carousel').carousel()
</script>


<?php get_footer(); ?>
