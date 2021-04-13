<?php
/**
 * Enqueue scripts and styles.
 */

$theme_data = wp_get_theme();
define( 'THEME_VERSION', $theme_data->Version );

function simply_scripts() {
	wp_enqueue_style( 'simply-style-min', get_template_directory_uri() . '/dist/css/style.min.css' );
	wp_enqueue_script( 'simply-scripts', get_template_directory_uri() . '/dist/js/scripts.js', ['jquery']);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'simply_scripts' );