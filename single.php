<?php get_header(); ?>
<!--
////////////////////////////////
	Main Menu Section
////////////////////////////////
-->

<section class="menu_session">
	<?php get_sidebar(); ?>

	<!--
////////////////////////////////
	Menu Content
////////////////////////////////
-->
	<div class="menu_content_container">

 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<!-- <a href="<?php the_permalink(); ?>"> -->
                <h1><?php the_title(); ?></a></h1>
                <ul class="post_meta no-bullet">
                  <li>In Category: <?php the_category( ', ' ); ?></li>
                  <li>Last updated on <?php the_time('F j, Y'); ?></li>
                </ul>
                <div class="post_direction">
                	<div class="post_direction_pre"><?php previous_post_link(); ?></div>
                	<div class="post_direction_next"><?php next_post_link(); ?></div>
                </div>

								<div class="custom_post_content">
                <?php the_content(); ?>
								</div>
     
			
			<?php endwhile; else : ?>
			
			  <p><?php _e( 'Sorry, no posts found.', 'treehouse-portfolio' ); ?></p>
			
			<?php endif; ?>
    
	</div>

		<!--
////////////////////////////////
	3rd Column Section
////////////////////////////////
-->
	<div class="menu_information">
		<img src="<?php echo get_template_directory_uri(); ?>/images/imgNuritional.gif" alt="nutritional info" />
		<p>Download our</p>
		<h3>Nutritional</h3>
		<h3>Guide</h3>
		<div class="download_niu_items">
			<p><a href="#">Download Nutritional Guide per 100g</a></p>
			<p><a href="#">Download Allergen Guide</a></p>
			<p><a href="#">Download Ingredient Guide</a></p>
		</div>
		<div class="adobe_reader">
			<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/adobe.png" alt="adobe" /></a>
			<p>Nutritional values are based on average figures and standard product formulation. Actual serving size and nutrient values may vary including due to special customer requests. This interactive calculator determines values dynamically using scripts that are run within the web browser. As such, calculations may be influenced by browser incompatibility from time to time. If you believe any results from the use of the calculator to be inaccurate, please do contact us so that we may address any concerns. A downloadable Nutritional Information Brochure is also available on the right hand side of this web page for your convenience.</p>
		</div>
	</div>

</section>
<?php get_footer(); ?>