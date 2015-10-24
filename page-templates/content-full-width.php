<?php

/**
 * Single page template with no sidebars and full width content
 *
 * @package Portland
 * @since 1.0
 */

/*
Template Name: Full Width
*/

/**
 * Adds Actions and Filters
 *
 * Adds actions and filters to hooks in the index.php file.
 *
 * @since 1.0.0
 */
add_filter( 'portland_layout_class', 'portland_full_width_page' );

/**
 * Sets the layout class
 *
 * @since 1.0
 * @return string Layout class.
 */
function portland_full_width_page() {
	return 'content-full-width';
}

/**
 * Load template
 */
locate_template( array( 'page.php' ), true );
