<?php
/**
 * Template Name: Services Page Template
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
	<div class="service-line">
    	<img src="<?php bloginfo('template_url');?>/img/service-line.png" />
    </div>
    <div class="service-text">
    	<h1>services</h1>
    </div>
    <div class="service-line1">
    	<img src="<?php bloginfo('template_url');?>/img/service-line.png" />
    </div>
    <div class="clearfixed"></div>
    <div class="service-para">
    	<p>IsoTech Systems has very successfully supported it's clients by responding to the ever-changing business and technological environments by offering services ranging from ERP implementations, post-implementation support and outsourcing.</p>
    </div>
    <div class="service-text-para">
    	<p>IsoTech Systems leverages the following Practice Areas</p>
    </div>
    <div class="service-type g-service">
    	<div class="service-typ-img">
        	<img src="<?php bloginfo('template_url');?>/img/global-service.png" />
        </div>
        <div class="service-typ-text">
        	<h6>Global Enterprise Services</h6>
        	<p>Encompassing the entire SAP ecosystem including upgrades, SAP ERP, Netweaver, Supply Chain Management, CRM, SRM and Business Intelligence.</p>
        </div>
    </div>
    <div class="service-type web-service">
    	<div class="service-typ-img">
        	<img src="<?php bloginfo('template_url');?>/img/web.png" />
        </div>
        <div class="service-typ-text">
        	<h6>web Services</h6>
        	<p>Enterprise Application Integration and web development to integrate into the overall SAP solution.</p>
        </div>
    </div>
    <div class="clearfixed"></div>
    <div class="service-type sap-service">
    	<div class="service-typ-img">
        	<img src="<?php bloginfo('template_url');?>/img/sap.png" />
        </div>
        <div class="service-typ-text">
        	<h6>SAP Business Process Optimization</h6>
        	<p>Business Intelligence: integration of information and analytics; Change Management and Communication - translating strategy into operational reality; and IS Strategy - streamlining and improving the execution of IS strategies.</p>
        </div>
    </div>
    <div class="service-type sap-service web-service">
    	<div class="service-typ-img">
        	<img src="<?php bloginfo('template_url');?>/img/sap.png" />
        </div>
        <div class="service-typ-text">
        	<h6>SAP Business objects</h6>
        	<p>Helping companies bridge the information divide between BI Power users and everyday users. Organizations gain better insight - improving decision making and enterprise performance.</p>
        </div>
    </div>
    <div class="clearfixed"></div>
    <div class="break-img"><img src="<?php bloginfo('template_url');?>/img/break-img.png" /></div>
</div>
<div class="clearfixed"></div>
<div class="area-div">
	<div class="area-divbar">
        <div class="service-text1">
            <p>By leveraging the above Practice Areas, IsoTech Systems provides Service Offerings in the following Areas</p>
        </div>
        <div class="area-type project">
            <div class="area-typ-img">
                <img src="<?php bloginfo('template_url');?>/img/project-img.png" />
            </div>
            <div class="area-typ-text">
                <h6>Project Augmentation</h6>
                <p>Complement your existing team with the simple belief of the right people for the right roles.</p>
            </div>
        </div>
        <div class="area-type project strategy">
            <div class="area-typ-img">
                <img src="<?php bloginfo('template_url');?>/img/Strategy.png" />
            </div>
            <div class="area-typ-text">
                <h6>Strategic Consulting</h6>
                <p>Project Ownership, IT Technology Strategy, Project Management, Change Management, Continued Business Improvement, and Resource Management.</p>
            </div>
        </div>
        <div class="clearfixed"></div>
        <div class="area-type project">
            <div class="area-typ-img">
                <img src="<?php bloginfo('template_url');?>/img/remote.png" />
            </div>
            <div class="area-typ-text">
                <h6>Remote Support</h6>
                <p>Providing the right solutions quicker and less expensively than possible in an internal organization.</p>
            </div>
        </div>
    </div>
    <div class="clearfixed"></div>
    <div class="client-lists">
    	<div class="clients-bar">
    		<img src="<?php bloginfo('template_url');?>/img/clients.png" />
        </div>
    </div>
</div>


<?php get_footer(); ?>
