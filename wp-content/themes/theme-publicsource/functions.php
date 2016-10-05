<?php

define( 'INN_MEMBER', true );

/**
 * Include theme files
 *
 * Based off of how Largo loads files: https://github.com/INN/Largo/blob/master/functions.php#L358
 *
 * 1. hook function Largo() on after_setup_theme
 * 2. function Largo() runs Largo::get_instance()
 * 3. Largo::get_instance() runs Largo::require_files()
 *
 * This function is intended to be easily copied between child themes, and for that reason is not prefixed with this child theme's normal prefix.
 *
 * @link https://github.com/INN/Largo/blob/master/functions.php#L145
 */
function largo_child_require_files() {
	require_once( get_stylesheet_directory() . '/homepages/layouts/publicsource.php' );
}
add_action( 'after_setup_theme', 'largo_child_require_files' );

/**
 * Include compiled style.css
 */
function publicsource_stylesheet() {
	wp_dequeue_style( 'largo-child-styles' );
	$suffix = (LARGO_DEBUG)? '' : '.min';
	wp_enqueue_style( 'rr', get_stylesheet_directory_uri() . '/css/style' . $suffix . '.css' );
}
add_action( 'wp_enqueue_scripts', 'publicsource_stylesheet', 20 );