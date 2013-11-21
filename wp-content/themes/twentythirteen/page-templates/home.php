<?php
/**
 * Template Name: Home Page Template
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
                <img src="<?php echo get_template_directory_uri(); ?>/img/service-line.png" />
            </div>
            <div class="service-text">
                <h1>services</h1>
            </div>
            <div class="service-line1">
                <img src="<?php echo get_template_directory_uri(); ?>/img/service-line.png" />
            </div>
            <div class="clearfixed"></div>
            <div class="srvices-contaner">
                <img src="<?php echo get_template_directory_uri(); ?>/img/div1.png" />
                <h1>industries served</h1>
                <p>For the first time,St.Xaviers College,Mumbai, Malhar 2013 will be accepting online registrations of pariticipants from colleges across India.</p>
                <div class="services-img">
                    <a href="javascript:void(0);"><img src="<?php echo get_template_directory_uri(); ?>/img/learn-more.png" /></a>
                </div>
            </div>
            <div class="srvices-contaner service-gap">
                <img src="<?php bloginfo('template_url'); ?>/img/div2.png" />
                <h1>delivery excellence</h1>
                <p>For the first time,St.Xaviers College,Mumbai, Malhar 2013 will be accepting online registrations of pariticipants from colleges across India.</p>
                <div class="services-img">
                    <a href="javascript:void(0);"><img src="<?php bloginfo('template_url'); ?>/img/learn-more.png" /></a>
                </div>
            </div>

            <div class="srvices-contaner service-gap">
                <img src="<?php bloginfo('template_url'); ?>/img/div3.png" />
                <h1>delivery capabilities</h1>
                <p>For the first time,St.Xaviers College,Mumbai, Malhar 2013 will be accepting online registrations of pariticipants from colleges across India.</p>
                <div class="services-img">
                    <a href="javascript:void(0);"><img src="<?php bloginfo('template_url'); ?>/img/learn-more.png" /></a>
                </div>
            </div>
            <div class="srvices-contaner service-gap">
                <img src="<?php bloginfo('template_url'); ?>/img/div4.png" />
                <h1>resources available</h1>
                <p>For the first time,St.Xaviers College,Mumbai, Malhar 2013 will be accepting online registrations of pariticipants from colleges across India.</p>
                <div class="services-img">
                    <a href="javascript:void(0);"><img src="<?php bloginfo('template_url'); ?>/img/learn-more.png" /></a>
                </div>
                <div class="clearfixed"></div>
            </div>
            <div class="clearfixed"></div>
            <div class="client-lists">
                <div class="clients-bar">
                    <img src="<?php bloginfo('template_url');?>/img/clients-home.jpg" />
                </div>
            </div>
        </div>


<script>
            $('.carousel').carousel()
        </script>
<?php  get_footer(); ?>

      
