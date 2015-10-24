<?php
/**
 * Actions
 *
 * @package Portland
 * @since 1.0.0
 */

/**
 * Loads the default scripts and stylesheets
 *
 * @since 1.0.0
 */
function portland_enqueue() {

	wp_enqueue_style( 'portland_stylesheet', get_stylesheet_uri() );

	// Loads the comment script if a single post is being displayed.
	if ( is_singular() && comments_open() ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'portland_enqueue' );

/**
 * Registers menus
 *
 * @since 1.0.0
 */
function portland_menus() {
	register_nav_menus(
		array(
			'header_menu' => __( 'Header Menu' ),
			'footer_menu' => __( 'Footer Menu' )
		)
	);
}
add_action( 'init', 'portland_menus' );
