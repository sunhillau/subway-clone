<?php

//创建ADMIN下的菜单选项(注意menus拼写)
add_theme_support('menus');
//创建POST的featured image
add_theme_support('post-thumbnails');

//创建POST第一个图像为Featured image;
function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches[1][0];

  if(empty($first_img)) {
    $first_img = "/images/Bread_Flatbread.jpg";
  }
  return $first_img;
}


//BLOG页面的缩略文字只有16个字。
function wpt_excerpt_length($length) {
	return 16;
}
add_filter ('excerpt_length', 'wpt_excerpt_length');



//创建Manage Locations可设定选定的MENU分类
function register_theme_menus() {
	register_nav_menus(
		array(
				'primary-menu' => __('Primary Menu'),
				'footer-menu' => __('Footer Menu')
			)
	);
}
add_action('init','register_theme_menus');

//带入各种CSS
function wpt_theme_styles() {
	wp_enqueue_style('bootstrap_css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css');
	wp_enqueue_style('font_awesome', 'http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
	wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css' );
}

add_action('wp_enqueue_scripts', 'wpt_theme_styles');




//带入各种JS，wp_enqueue_script('name', url, array('jquery')//需要其他JS协同, 'version', false//header or true means footer);
function wpt_theme_js() {
	wp_enqueue_script('bootstrap_js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'),'null', false);
	wp_enqueue_script('handlebars_js', get_template_directory_uri() . '/js/handlebars.min.js', array('jquery'),'null', false);
	wp_enqueue_script('google_map_js', 'https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places', '','',false);
	wp_enqueue_script('storelocator_js', get_template_directory_uri() . '/js/jquery.storelocator.js', array('jquery','handlebars_js'),'null', false);
	wp_enqueue_script('subway_main_js', get_template_directory_uri() . '/js/header.js', array('jquery'),'null', false);
}

add_action('wp_enqueue_scripts', 'wpt_theme_js');





//创建Widget

// function wpt_create_widget( $name, $id, $description ) {

// 	register_sidebar(array(
// 		'name' => __( $name ),	 
// 		'id' => $id, 
// 		'description' => __( $description ),
// 		'before_widget' => '<div class="widget">',
// 		'after_widget' => '</div>',
// 		'before_title' => '<h2 class="module-heading">',
// 		'after_title' => '</h2>'
// 	));

// }

// wpt_create_widget( 'Page Sidebar', 'page', 'Displays on the side of pages with a sidebar' );
// wpt_create_widget( 'Blog Sidebar', 'blog', 'Displays on the side of pages in the blog section' );


// ?>