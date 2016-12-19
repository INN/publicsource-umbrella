<?php

include_once get_template_directory() . '/homepages/homepage-class.php';

class PublicSourceLayout extends Homepage {
	function __construct( $options = array() ) {
		$defaults = array(
			'name' => __( 'PublicSource.org Custom Layout', 'publicsource' ),
			'description' => __( 'A custom homepage layout for PublicSource based loosely on the Largo top stories homepage layout', 'publicsource' ),
			'template' => get_stylesheet_directory() . '/homepages/templates/publicsource-layout.php',
			'prominenceTerms' 	=> array(
				array(
					'name' 			=> __( 'Homepage Top Story', 'largo' ),
					'description' 	=> __( 'This is the top story on the homepage.', 'largo' ),
					'slug' 			=> 'top-story'
				),
				array(
					'name' 			=> __( 'Homepage Middle Feature', 'largo' ),
					'description' 	=> __( 'Posts assigned to this prominence term should appear in the Featured area in the middle of the homepage.', 'largo' ),
					'slug' 			=> 'home-middle-feature'
				),
				array(
					'name' 			=> __( 'Homepage Bottom Feature', 'largo' ),
					'description' 	=> __( 'Posts assigned to this prominence term should appear in the Largo Recent Posts widget in the Home Bottom Feature widget area.', 'largo' ),
					'slug' 			=> 'home-bottom-feature'
				),
			),
			'assets' => array(
				array( 'homepage-single', get_stylesheet_directory_uri() . '/homepages/assets/css/homepage' . $suffix . '.css', array() ),
			)
		);
		$options = array_merge( $defaults, $options );
		parent::__construct( $options );
	}
}

function register_my_custom_homepage_layout() {
	    register_homepage_layout('PublicSourceLayout');
}
add_action('init', 'register_my_custom_homepage_layout', 0);

/**
 *  Add publicsource homepage widget areas
 */
function publicsource_add_homepage_widget_areas() {
	$sidebars = array(
		array(
			'name' => __( 'Home Below Top Stories', 'publicsource' ),
			'id' => 'home-below-topstory',
			'description' => __( 'This area should be used by a newsletter signup widget, or other such call to action', 'publicsource' ),
			'before_widget' => '<aside id="%1$s" class="%2$s clearfix home-below-topstory">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		),
		array(
			'name' => __( 'Home Category Grid', 'publicsource' ),
			'id' => 'home-category-grid',
			'description' => __( 'This area should be filled with two Largo Recent Posts widgets.', 'publicsource' ),
			'before_widget' => '<aside id="%1$s" class="%2$s span3 clearfix">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		),
		array(
			'name' => __( 'Home Bottom Feature', 'publicsource' ),
			'id' => 'home-bottom-feature',
			'description' => __( 'This area should be filled with one Largo Recent Posts widgets.', 'publicsource' ),
			'before_widget' => '<aside id="%1$s" class="%2$s clearfix">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		),
	);

	foreach ( $sidebars as $sidebar ) {
		register_sidebar( $sidebar );
	}
}
add_action( 'widgets_init', 'publicsource_add_homepage_widget_areas' );
