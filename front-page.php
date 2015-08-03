<?php get_header(); ?>



<!--
////////////////////////////////
	Slider Carousel
////////////////////////////////
-->

<section class="carousel_home">
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="<?php echo get_template_directory_uri(); ?>/images/bannerGolder.jpg" alt="...">
      <div class="carousel-caption">
        slider 1
      </div>
    </div>
    <div class="item">
      <img src="<?php echo get_template_directory_uri(); ?>/images/banner10lunch.jpg" alt="...">
      <div class="carousel-caption">
        slider 2
      </div>
    </div>
		<div class="item">
      <img src="<?php echo get_template_directory_uri(); ?>/images/bannerInsideOut.jpg" alt="...">
      <div class="carousel-caption">
        slider 3
      </div>
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</section>

<!--
////////////////////////////////
	Featured Image Post Section
////////////////////////////////
-->
<secion class="container_feature_post">
	<div class="post_item">
		<h4 class="h4_mobile">Store Locator</h4>
		<div class="text_img">
			<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/img_storelocator.jpg" alt="Store Location" /></a>
			<h4 class="h4_desktop">Store Locator</h4>
			<div class="little_green_line"></div>
			<p><a href="#">Are you in the mood for your favourite Subway® Sub? Use our Store Locator to quickly find your nearest Subway® Restaurant!</a></p>
		</div>
		<a href="#"><p class="more_button">MORE <span>></span></p></a>
	</div>
	<div class="post_item">
		<h4 class="h4_mobile">Subway® Eat Fresh Club</h4>
		<div class="text_img">
			<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/img_home_swefc.gif" alt="Subway® Eat Fresh Club" /></a>
			<h4 class="h4_desktop">Subway® Eat Fresh Club</h4>
			<div class="little_green_line"></div>
			<p><a href="#">Join the Subway Eat Fresh® Club today for exclusive offers. Plus get a free Subway 6-Inch® Sub & drink on your birthday!</a></p>
		</div>
		<a href="#"><p class="more_button">MORE <span>></span></p></a>
	</div>
	<div class="post_item">
		<h4 class="h4_mobile">Subway Catering™</h4>
		<div class="text_img">
			<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/img_home_catering.jpg" alt="Store Location" /></a>
			<h4 class="h4_desktop">Subway Catering™</h4>
			<div class="little_green_line"></div>
			<p><a href="#">SUBWAY® Sandwich Platters are made on freshly baked breads with a selection of delicious ingredients. Order online today.</a></p>
		</div>
		<a href="#"><p class="more_button">MORE <span>></span></p></a>
	</div>
	<div class="post_item">
		<h4 class="h4_mobile">Franchisee Information</h4>
		<div class="text_img">
			<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/img_fran.jpg" alt="Subway® Eat Fresh Club" /></a>
			<h4 class="h4_desktop">Franchisee Information</h4>
			<div class="little_green_line"></div>
			<p><a href="#">Are you interested in owning your own Subway® Franchise? If you have the passion to succeed we would love to hear from you!</a></p>
		</div>
		<a href="#"><p class="more_button">MORE <span>></span></p></a>
	</div>

</secion>






<!-- 		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>    

			<h1><?php the_title(); ?></h1>
			<p><?php the_content(); ?></p>        

		<?php endwhile; else :  ?>

			<p><?php echo 'sorry, no content' ?></p>
		
		<?php endif; ?> -->







<?php get_footer(); ?>