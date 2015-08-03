<footer>
<!--
////////////////////////////////
	Footer Section
////////////////////////////////
-->
<div class="clear_fix"></div>
<div class="footer_container">
	<div class="social_icon social_icon_mobile">
		<a href="#"><i class="fa fa-facebook social_icon_style"></i></a>
		<a href="#"><i class="fa fa-youtube-play social_icon_style"></i></a>
		<a href="#"><i class="fa fa-twitter social_icon_style"></i></a>
	</div>
	<div>
		<a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.gif" alt="logo" /></a>
	</div>
	<div><p>©<?php echo date('Y'); ?> Doctor's Associates Inc. <a href="/wordpress/wp-admin" target="_blank">SUBWAY®</a>, SUBWAY EAT FRESH®, SUBWAY FOOTLONG® and SUBWAY SIX INCH® are registered trademarks of Doctor's Associates Inc.</p></div>
	<div class="secondary_menu">
				<?php 
					$defaults = array(
						'container' => false,
						'theme_location'  => 'footer-menu',
					);
					
					wp_nav_menu( $defaults );
				?>
	</div>
</div>
<?php wp_footer(); ?>
</footer>

</body>
</html>