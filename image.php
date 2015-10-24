<?php
/**
 * Image attachment template
 *
 * @package Portland
 * @since 1.0.0
 */

/**
 * Adds Actions and Filters
 *
 * Adds actions and filters to hooks in the index.php file.
 *
 * @since 1.0.0
 */
function portland_image() {

	add_filter( 'the_content', 'portland_attachment_content' );

	add_action( 'portland_entry_content_after', 'portland_attachment_template' );

}
add_action( 'portland_template_setup', 'portland_image', 200 );

/**
 * Replaces typical post content with the image attachment
 *
 * @since 1.0.0
 * @param string $content Post content.
 */
function portland_attachment_content( $content ) {
	global $post;

	return wp_get_attachment_image( $post->ID, 'large' );
}

/**
 * Adds link back to attached post
 *
 * @since 1.0.0
 */
function portland_attachment_template() {
	the_post_navigation();
}

/**
 * Load template
 */
locate_template( array( 'page.php' ), true );
