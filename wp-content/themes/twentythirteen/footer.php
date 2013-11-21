<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>
     

		</div><!-- #main -->



 <div class="footer">
            <div class="footer-div">
                <div class="footer-data company">
                    <h6>company</h6>
                    <a href="javascript:void(0);">mission and vision</a><br />
                    <a href="javascript:void(0);l">insotech snapshot</a><br />
                    <a href="javascript:void(0);;">our guarantees</a><br />
                    <a href="javascript:void(0);">executive team</a><br/>
                    <a href="javascript:void(0);">board of directors</a>
                </div>
                <div class="footer-data service-foot">
                    <h6>services</h6>
                    <a href="javascript:void(0);">Industries Served</a><br />
                    <a href="javascript:void(0);l">Delivery Excellence</a><br />
                    <a href="javascript:void(0);;">Delivery Capabilities</a><br />
                    <a href="javascript:void(0);">Resources Available</a>
                </div>
                <div class="footer-data clients-foot">
                    <h6>clients</h6>
                    <a href="javascript:void(0);">Clients</a><br />
                    <a href="javascript:void(0);l">Client Successes</a><br />
                    <a href="javascript:void(0);;">Client Testimonials</a>
                </div>
                <div class="footer-data clients-foot">
                    <h6>clients</h6>
                    <a href="javascript:void(0);">Why Isotech</a><br />
                    <a href="javascript:void(0);l">Consultant Testimonials</a><br />
                    <a href="javascript:void(0);;">Featured Consultants</a><br />
                    <a href="javascript:void(0);">FAQ’s</a>
                </div>
                <div class="footer-data contact-foot">
                    <h6>contact</h6>
                    <p>12808 W. Airport<br /> Ste 329<br /> Sugar Land TX 77478.</p>
                </div>
            </div>
        </div>
        <script>
            $('.carousel').carousel()
        </script>

<?php /*
		<footer id="colophon" class="site-footer" role="contentinfo">
			<?php get_sidebar( 'main' ); ?>

			<div class="site-info">
				<?php do_action( 'twentythirteen_credits' ); ?>
				<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'twentythirteen' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'twentythirteen' ); ?>"><?php printf( __( 'Proudly powered by %s', 'twentythirteen' ), 'WordPress' ); ?></a>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
	</div><!-- #page -->
*/
?>
	<?php wp_footer(); ?>
</body>
</html>
