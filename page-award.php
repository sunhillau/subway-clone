<?php


get_header();
if(have_posts()):
  while (have_posts()) : the_post(); ?>
<!-- Start Customised Cotent -->
<!-- File name as page-filename.php filename is same as page name. -->

<iframe src="https://wokitup.redcat.com.au/login.py" name="hidden_frame" id="hidden_frame" class="award_iframe" ></iframe>

  <?php endwhile;
  else:
    echo "<p>No content found</p>";
  endif;
get_footer( );
?>

