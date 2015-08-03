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
		<div>	
			<h4>Our Menu</h4>
			<p>So you know exactly what you are eating at Subway® Restaurants and to help you make a healthier choice, we've created this interactive menu for you. Simply select your favourite Sub, Side or individual ingredient and view its nutritional breakdown. You can customise your selected sub with your choice of bread, sauces and salads and the nutritional data will be automatically updated!</p>
		</div>

		<!-- Chef's Suggestion -->
		<div class="chef_suggestion">
			<h4>6 Grams of Fat or Less Subs</h4>
			<div class="menu_items">
					<?php 

					$args = array(
					'post_type' => 'submenu',
					'posts_per_page' => $num_posts
					);
					$query = new WP_Query( $args );

					?>

		<ul>
			<?php 
				if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); 

				$title = get_post(get_post_thumbnail_id())->post_title; //The Title
				$default_attr = array (
					'src' => $src,
					'alt' => trim( strip_tags( $wp_postmeta->_wp_attachment_image_alt ) )
				);
			?>

			<li>
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail',''); ?><p><?php echo $title; ?></p></a>
			</li>

			<?php endwhile; endif; wp_reset_postdata(); ?>
		</ul>
			</div>


		<div class="clear_fix"></div>
		<!-- Bread Types -->
			<h4>Breads</h4>
			<div class="menu_items">
				<ul>
			<?php 
				if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); 
					$title = get_post(get_post_thumbnail_id())->post_title; //The Title
			?>

					<li>
						<?php if ( get_the_post_thumbnail($post_id) != '' ) {

  echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper">';
   the_post_thumbnail();
  echo '<p>';
  echo $title;
  echo '</p></a>';

} else {

 echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper">';
 echo '<img src="';
 echo catch_that_image();
 echo '" alt="" />';
 echo '</a>';

} ?>
					</li>
						<?php endwhile; endif; wp_reset_postdata(); ?>
				</ul>
			</div>
		<!-- CMS AREA Types -->
				<div class="clear_fix"></div>
			
		</div>
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