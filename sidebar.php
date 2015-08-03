<div class="side_bar_menu">
		<ul>
							<?php 

					$args = array(
					'post_type' => 'submenu',
					'posts_per_page' => $num_posts
					);
					$query = new WP_Query( $args );

					?>
			<li class="cevc pointer"><a href="<?php echo home_url(); ?>/our-menu">Chef's Suggestion</a></li>
			<li class="cevc pointer" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapse_breads" href="#collapse_breads"><a href="#">Breads</a>
			</li>				
				<ul class="menu_breads collapse" id="collapse_breads">
				<?php 
				if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); 

				$title = get_post(get_post_thumbnail_id())->post_title; //The Title
				$default_attr = array (
					'src' => $src,
					'alt' => trim( strip_tags( $wp_postmeta->_wp_attachment_image_alt ) )
				);
			?>

			<li class="cevc pointer">
			<a href="<?php the_permalink(); ?>"><?php echo $title; ?></a>
			</li>

			<?php endwhile; endif; wp_reset_postdata(); ?>

				</ul>
			<li class="cevc pointer"  role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapseSalad" href="#collapseSalad"><a href="#">Salad</a>
			</li>
				<ul class="menu_salad collapse" id="collapseSalad">
					<li class="cevc pointer"><a href="#">Spinach</a></li>
					<li class="cevc pointer"><a href="#">Carrot</a></li>
					<li class="cevc pointer"><a href="#">Onion</a></li>
				</ul>
			<li class="cevc pointer"><a href="#">Drinks</a></li>
		</ul>
	</div>