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

/**
 * Fires before the templates are set up.
 *
 * Use this hook to add and remove actions.
 *
 * @since 1.0.0
 */
do_action( 'portland_template_setup' );

/**
 * Fires just prior to rendering the content.
 *
 * @since 1.0.0
 */
do_action( 'portland_content_before' );

/**
 * Fires at the top of the rendered page content.
 *
 * @since 1.0.0
 */
do_action( 'portland_content_top' );

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		/**
		 * Fires just before an entry is rendered in The Loop.
		 *
		 * @since 1.0.0
		 */
		do_action( 'portland_entry_before' );

		get_template_part(
			/**
			 * Filter the template part slug for an entry in The Loop.
			 *
			 * @since 1.0.0
			 */
			apply_filters( 'portland_template_part_slug', 'template-parts/content' ),

			/**
			 * Filter the template part name for an entry in The Loop.
			 *
			 * @since 1.0.0
			 */
			apply_filters( 'portland_template_part_name', '' )
		);

		/**
		 * Fires just after an entry is rendered in The Loop.
		 *
		 * @since 1.0.0
		 */
		do_action( 'portland_entry_after' );
	}
} else {
	/** This action is documented in index.php */
	do_action( 'portland_entry_before' );

	get_template_part(
		/** This filter is documented in index.php */
		apply_filters( 'portland_template_part_slug', 'template-parts/404' ),

		/** This filter is documented in index.php */
		apply_filters( 'portland_template_part_name', '' )
	);

	/** This action is documented in index.php */
	do_action( 'portland_entry_after' );
}

/**
 * Fires at the bottom of the rendered page content.
 *
 * @since 1.0.0
 */
do_action( 'portland_content_bottom' );

/**
 * Fires immediately following the rendered page content.
 *
 * @since 1.0.0
 */
do_action( 'portland_content_after' );

get_sidebar();
get_footer();
