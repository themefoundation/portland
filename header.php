<?php
/**
 * Header template
 *
 * @package Longview
 * @since 1.0.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php do_action( 'portland_head_top' ); ?>

	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="<?php echo apply_filters( 'portland_viewport', 'width=device-width, initial-scale=1' ); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php do_action( 'portland_head_bottom' ); ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php

/**
 *****************************************************************************
 * Add actions
 *****************************************************************************
 *
 * This section adds actions to their respective action hooks.
 *
 * @see http://codex.wordpress.org/Function_Reference/add_action
 * @since 1.0.0
 */

add_action( 'portland_body_top', 'portland_skip_link' );


add_action( 'portland_header', 'portland_header_open', 1 );
add_action( 'portland_header', 'portland_header_branding', 20 );
add_action( 'portland_header', 'portland_header_menu', 30 );
add_action( 'portland_header', 'portland_header_close', 100 );

add_action( 'portland_header_after', 'portland_main_open', 100 );

/**
 *****************************************************************************
 * Define actions
 *****************************************************************************
 *
 * This section defines the actions associated with each hook.
 *
 * @since 1.0.0
 */

if ( !function_exists( 'portland_skip_link' ) ) {
	/**
	 * Skip link
	 *
	 * The "Skip to content" link allows people using screen readers to jump
	 * straight to the page content without being forced to listen to the
	 * header and menu text on every page load.
	 *
	 * @since 1.0.0
	 */
	function portland_skip_link() {
		echo '<a class="' . apply_filters( 'portland_skip_link_class', 'skip-link screen-reader-text' ) . '" href="' . apply_filters( 'portland_skip_link_href', '#content' ) . '">' . __( 'Skip to content', 'portland_textdomain' ) . '</a>';
	}
}

if ( !function_exists( 'portland_header_open' ) ) {
	/**
	 * Header opening
	 *
	 * Opens the header div and wrapper.
	 *
	 * @since 1.0.0
	 */
	function portland_header_open() {
		echo '<header id="' . apply_filters( 'portland_header_id', 'header' ) . '" class="' . apply_filters( 'portland_header_class', 'site-header row' ) . '">';
		echo '    <div class="' . apply_filters( 'portland_header_wrap_class', 'wrap' ) . '">';
	}
}

if ( !function_exists( 'portland_header_branding' ) ) {
	/**
	 * Branding
	 *
	 * Displays branding, including site title and site description.
	 *
	 * @since 1.0.0
	 */
	function portland_header_branding() {
		echo '<div id="' . apply_filters( 'portland_branding_id', 'branding' ) . '" class="' . apply_filters( 'portland_branding_class', '' ) . '" role="banner">';
		echo 	apply_filters( 'portland_site_name', '<p class="site-title"><a href="' . esc_url( home_url( '/' ) ) . '">' . get_bloginfo('name') . '</a></p>' );
		echo '</div><!--#branding-->';
	}
}

if ( !function_exists( 'portland_header_menu' ) ) {
	/**
	 * Header Menu
	 *
	 * Displays the header menu. However, if there are widgets present in the
	 * Inside Header widget area, that widget area overrides this menu.
	 *
	 * @since 1.0.0
	 */
	function portland_header_menu() {
		wp_nav_menu( array(
			'theme_location' => 'header_menu',
			'fallback_cb' => false
		) );
	}
}

if ( !function_exists( 'portland_header_close' ) ) {
	/**
	 * Header closing
	 *
	 * Opens the header div and wrapper.
	 *
	 * @since 1.0.0
	 */
	function portland_header_close() {
		echo '</div><!--.wrap-->';
		echo '</header><!--#header-->';
	}
}

if ( !function_exists( 'portland_main_open' ) ) {
	/**
	 * Main opening
	 *
	 * Opens the main div and wrapper.
	 *
	 * @since 1.0.0
	 */
	function portland_main_open() {
		echo '<div id="' . apply_filters( 'portland_main_id', 'main' ) . '" class="' . apply_filters( 'portland_main_class', 'row' ) . '">';
		echo '<div class="' . apply_filters( 'portland_main_wrap_class', 'wrap' ) . '">';
	}
}

/**
 *****************************************************************************
 * Do actions
 *****************************************************************************
 *
 * This section runs the actions associated with each hook.
 *
 * @see http://codex.wordpress.org/Function_Reference/do_action
 * @since 1.0.0
 */

// Use this hook to add and remove actions from header hooks.
do_action( 'portland_header_setup' );

do_action( 'portland_body_top' );

do_action( 'portland_header_before' );
do_action( 'portland_header' );
do_action( 'portland_header_after' );
