<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Ribbon Lite
 */

?>
	<footer id="site-footer" role="contentinfo">
		<?php if ( is_active_sidebar( 'footer-first' ) || is_active_sidebar( 'footer-second' ) || is_active_sidebar( 'footer-third' ) ) { ?>
	    	<div class="container">
	    	    <div class="footer-widgets">
		    		<div class="footer-widget">
			    		<?php if ( is_active_sidebar( 'footer-first' ) ) : ?>
			        		<?php dynamic_sidebar( 'footer-first' ); ?>
						<?php endif; ?>
					</div>
					<div class="footer-widget">
						<?php if ( is_active_sidebar( 'footer-second' ) ) : ?>
			        		<?php dynamic_sidebar( 'footer-second' ); ?>
						<?php endif; ?>
					</div>
					<div class="footer-widget last">
						<?php if ( is_active_sidebar( 'footer-third' ) ) : ?>
			        		<?php dynamic_sidebar( 'footer-third' ); ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		<?php }
		ribbon_lite_copyrights_credit(); ?>
	</footer><!-- #site-footer -->

<!-- Google Analytic -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-105782427-1', 'auto');
  ga('send', 'pageview');

</script>
<!-- Google Analytic -->
<script async defer src="//assets.pinterest.com/js/pinit.js"></script>

<?php wp_footer(); ?>

</body>
</html>
