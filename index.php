<?php
/**
 * Index template
 *
 * @package Portland
 * @since 1.0.0
 */

/**
 * Adds Actions and Filters
 *
 * @since 1.0.0
 */
function portland_index() {

	add_action( 'portland_content_top', 'portland_content_open', 100);
	add_action( 'portland_content_top', 'portland_archive_title', 200 );
	add_action( 'portland_content_top', 'portland_loop_open', 300 );

	add_action( 'portland_content_bottom', 'portland_loop_close', 100 );
	add_action( 'portland_content_bottom', 'portland_pagination', 200 );
	add_action( 'portland_content_bottom', 'portland_content_close', 300 );

}
add_action( 'portland_template_setup', 'portland_index', 100 );

/**
 * Primary opening
 *
 * Opens the .primary div column and the #content div. This theme supports
 * up to three columns, .primary, .secondary, and .tertiary.
 *
 * @since 1.0.0
 */
function portland_content_open() {
	?>
		<div id="content" class="<?php echo apply_filters( 'portland_content_class', 'primary hfeed' ) ?>" role="main">
	<?php
}

/**
 * Archive title
 *
 * Displays the title for archive pages.
 *
 * @since 1.0.0
 * @see https://developer.wordpress.org/reference/functions/the_archive_title/
 */
function portland_archive_title() {

	$portland_archive_title = get_the_archive_title();
	if ( 'Archives' != $portland_archive_title ) {
		echo '<h1 class="page-title">' . $portland_archive_title . '</h1>';
	}
	the_archive_description( '<p class="page-description">', '</p>' );
}

/**
 * Loop wrapper
 *
 * Opens the .loop div.
 *
 * @since 1.0.0
 */
function portland_loop_open() {
	?>
		<div class="<?php echo apply_filters( 'portland_loop_class', 'loop' ) ?>">
	<?php
}

/**
 * Loop wrapper closing
 *
 * Closes the .loop div.
 *
 * @since 1.0.0
 */
function portland_loop_close() {
	?>
		</div><!-- .loop -->
	<?php
}

/**
 * Posts pagination
 *
 * @since 1.0.0
 */
function portland_pagination() {
	the_posts_pagination();
}

/**
 * Content closing
 *
 * Closes the #content div.
 *
 * @since 1.0.0
 */
function portland_content_close() {
	?>
		</div><!-- #content -->
	<?php
}


/**
 * Do actions
 */

get_header();

// Use this hook to add and remove actions.
do_action( 'portland_template_setup' );

do_action( 'portland_content_before' );
do_action( 'portland_content_top' );

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		do_action( 'portland_entry_before' );

		get_template_part(
			apply_filters( 'portland_template_part_slug', 'template-parts/content' ),
			apply_filters( 'portland_template_part_name', '' )
		);

		do_action( 'portland_entry_after' );
	}
} else {
	do_action( 'portland_entry_before' );

	get_template_part(
		apply_filters( 'portland_404_template_part_slug', 'template-parts/404' ),
		apply_filters( 'portland_404_template_part_name', '' )
	);

	do_action( 'portland_entry_after' );
}

do_action( 'portland_content_bottom' );
do_action( 'portland_content_after' );

get_sidebar();
get_footer();
