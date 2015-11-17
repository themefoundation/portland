<?php
/**
*  Single page template
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
function portland_page() {

	add_action( 'portland_content_top', 'portland_page_featured_image', 50 );

	add_filter( 'portland_template_part_name', 'portland_template_part_page' );

}
add_action( 'portland_template_setup', 'portland_page', 200 );

/**
 * Featured image
 *
 * Displays the featured image (formerly called the post thumbnail).
 *
 * @since 1.0.0
 */
function portland_page_featured_image() {
	if ( has_post_thumbnail() ) {
		?>
			<div class="row portland-featured-image">
				<div class="wrap">
					<div>
						<?php
						/**
						 * Filters the thumbnail size.
						 *
						 * @since 1.0.0
						 */
						the_post_thumbnail( apply_filters( 'portland_thumbnail_size', 'small' );
						?>
					</div>
				</div>
			</div>
		<?php
	}
}

/**
 * Page template part
 *
 * Filters the default template part to use.
 *
 * @since 1.0.0
 */
function portland_template_part_page() {
	return '';
}
	

/**
 * Load template
 */
locate_template( array( 'index.php' ), true );
