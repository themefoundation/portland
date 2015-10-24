<?php
/**
 * Filters
 *
 * @package Portland
 * @since 1.0.0
 */

/**
 * Adds layout class to body element
 *
 * @since 1.0.0
 * @param array $classes Array of class names used for the <body> tag.
 * @return array $classes Updated array of class names used for the <body> tag.
 */
function portland_body_class_layout( $classes ) {

	// Gets the layout class.
	$layout_class = portland_get_layout();

	// Adds the layout class to the existing array of classes.
	$classes[] = $layout_class;

	return $classes;
}
add_filter( 'body_class', 'portland_body_class_layout' );

/**
 * Adds format class to .primary column
 *
 * @since 1.0.0
 * @param string $classes String of class names used for the .primary column.
 * @return string $classes Updated string of class names used for the .primary column.
 */
function portland_content_class_format( $classes ) {

	// Gets the layout class.
	$format_class = get_portland_content_format();

	// Adds the layout class to the existing string of classes.
	if ( ! empty( $format_class ) ) {
		$classes .= ' ' . 'portland-' . $format_class;
	}

	return $classes;
}
add_filter( 'portland_content_class', 'portland_content_class_format' );

/**
 * Sets the default "more" text at the end of excerpts
 *
 * @since 1.0.0
 * @param string $more Default "more" text.
 * @return string Custom "more" text.
 */
function portland_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'portland_excerpt_more' );