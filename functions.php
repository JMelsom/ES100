<?php

add_theme_support('menus');
add_theme_support('custom-header');
add_theme_support('post-thumbnails');

register_nav_menu('primary_nav', 'Primary Navigation');

register_sidebar(array('name' => 'MySidebar'));
register_sidebar(array('name' => 'Footer Left'));

////////////////////////////////////
//
//	REGISTER GALLERY POST TYPE
//
///////////////////////////////////
add_action('init', 'create_gallery_type');
function create_gallery_type() {
	register_post_type('gallery', 
					  array(
					  	'labels' => array(
							'name' => 'Gallery',
							'singular_name' => 'Era',
							'add_new' => 'Create Gallery',
							'edit_item' => 'Edit Gallery',
							'add_new_item' => 'Add Gallery'
						),
						'public' => true,
						'has_archive' => true,
						'menu_position' => 4,
						'hierarchical' => true,
						'capability_type' => 'post',
						'supports' => array(
							'title',
							'editor',
							'excerpt',
							'author',
							'comments',
							'thumbnail',
							'page-attributes'
						)
					  )
	);
	flush_rewrite_rules();
}

////////////////////////////////////
//
//	REGISTER GALLERY TAXONOMY
//
///////////////////////////////////
add_action('init', 'create_gallery_taxonomy');
function create_gallery_taxonomy(){
	register_taxonomy('eras', 'gallery',
					  array(
						  'hierarchical' => true,
						  'labels' => array(
						  	'name' => 'Eras',
							'singular_name' => 'Era'
						  )
					  )
					 );
	flush_rewrite_rules();
}


///////////////////////
///	Slideshow
///////////////////////

function slideshow_post_type(){
	$args = array(
			'public' => true,
			'label' => 'Slideshow',
			'supports' => array('title', 'thumbnail')
	);
	
	register_post_type('slideshow', $args);
}
add_action('init', 'slideshow_post_type');


include_once('theme-options.php');

include_once('jm_widgets.php');

?>
