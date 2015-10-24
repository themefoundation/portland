<?php
/**
* Single post template
*
* @package Longview
* @since 1.0.0
*/

/**
 * Adds Actions and Filters
 *
 * Adds actions and filters to hooks in the index.php file.
 *
 * @since 1.0.0
 */
function portland_single() {

	add_action( 'portland_content_top', 'portland_single_featured_image', 50 );

	add_filter( 'portland_template_part_name', 'portland_template_part_single' );

}
add_action( 'portland_template_setup', 'portland_single', 200 );

/**
 * Featured image
 *
 * Displays the featured image (formerly called the post thumbnail).
 */
function portland_single_featured_image() {
	if ( has_post_thumbnail() ) {
		?>
			<div class="row portland-featured-image">
				<div class="wrap">
					<div>
						<?php the_post_thumbnail( apply_filters( 'portland_thumbnail_size', '' ) ); ?>
					</div>
				</div>
			</div>
		<?php
	}
}

/**
 * Single template part
 *
 * Filters the default template part to use.
 */
function portland_template_part_single() {
	return 'single';
}

/**
 * Load template
 */
locate_template( array( 'index.php' ), true );

