<!DOCTYPE html>
<html>
<head>
  <title>Subway, Eat Fresh</title>
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" />
  <meta name="description" content="" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<?php wp_head(); ?>

</head>
<body>
<!--[if lt IE 9]>
<p>You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<header>
<!--
////////////////////////////////
	Header Section
////////////////////////////////
-->

<!-- Mobile Screen Header Max-width 699px -->
<section class="head_mobile">
<div class="cevc head_container_mobile" id="headerMobile">
	
<!-- LEFT side pop up menu -->
	<div class="menu_left_mobile" id="menu_left_button">
		<i class="fa fa-navicon pointer"></i>
		<div class="menu_left_container_mobile" id="menuMobileLeft">
			<div class="search_mobile">
				<form>
					<i class="fa fa-search"></i>
					<input type="text" id="Mobile_FindStore" placeholder="Search Store">
				</form>
			</div>

			<div class="menu_left_pop">
				<?php 
					$defaults = array(
						'container' => false,
						'theme_location'  => 'primary-menu',
					);

					wp_nav_menu( $defaults );
				?>
			</div>
		</div>
	</div>
<!-- MIDDLE logo -->
	<div class="cevc logo_mobile">
		<a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.gif" /></a>
	</div>
<!-- RIGHT side pop up menu -->
	<div class="menu_right_mobile" id="menu_right_button">
		<i class="fa fa-user pointer"></i>
			<div class="menu_right_pop" id="menuMobileRight">
				<form>
					<div class="log_on_input">
					<label for="user_log"></label><input type="text" id="user_log" placeholder="User Email" /><i class="fa fa-user"></i>
					</div>
					<div class="log_on_password">
						<label for="user_password"></label><input type="password" id="user_password" placeholder="Password" /><i class="fa fa-lock"></i>
						<button>Login</button>
					</div>
					<div class="cevc log_on_text">
						<span><a href="#">Forget Password?</a></span>
						<span><a href="#">Sign Up Now!</a></span>
					</div>
				</form>
			</div>
	</div>
</div>
</section>
<div class="overlay" id="pnl_MobileMenuOverlay"></div>
<div class="clear_fix_nav_mobile"></div>
<!-- / Mobile Screen Header Max-width 699px / -->

<!-- Desktop Screen Header Min-width 700px -->
<section class="head_desktop">
<div class="headertoolbar_container">
	<div class="cevc headerToolbar">
		<div class="cevc toolbar_home">
			<span><a href="<?php echo home_url(); ?>"><i class="fa fa-home"></i></a></span>
			<span><i class="fa fa-search"></i></span>
			<form>
				<input type="text" id="FindStore" placeholder="Search Store">
			</form>
		</div>
		<div class="toolbar_login">
			<form class="cevc">
					<div>
					<i class="fa fa-user"></i><input type="text" id="user_log" placeholder="User Email" />
					<i class="fa fa-lock"></i><input type="password" id="user_password" placeholder="Password" />
					<button>Login</button>
					</div>
					<div>
						<span><a href="#">Forget Password?</a></span>
						<span><a href="#">Sign Up Now!</a></span>
					</div>	
			</form>
		</div>
	</div>
</div>
	<div class="clear_fix_nav"></div>
<!-- Navigation -->
	<nav id="header">
		<div class="cevc nav_ul">
			<a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.gif" /></a>
				<?php 
					$defaults = array(
						'container' => false,
						'theme_location'  => 'primary-menu',
					);
					
					wp_nav_menu( $defaults );
				?>
			<div class="header_social_icon social_icon pnl_Social">
				<a href="#"><i class="fa fa-facebook social_icon_style"></i></a>
				<a href="#"><i class="fa fa-youtube-play social_icon_style"></i></a>
				<a href="#"><i class="fa fa-twitter social_icon_style"></i></a>
			</div>
		</div>

	</nav>

</section>
<!-- / Desktop Screen Header Min-width 700px / -->
<div class="clear_fix"></div>
</header>