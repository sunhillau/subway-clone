<?php get_header() ?>









		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>    

			<h1><?php the_title(); ?></h1>
			<p><?php the_content(); ?></p>        

		<?php endwhile; else :  ?>

			<p><?php echo 'sorry, no content' ?></p>
		
		<?php endif; ?>







<?php get_footer() ?>