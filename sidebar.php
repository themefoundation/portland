<?php
/**
 *  Sidebar template
 *
 * @package Portland
 * @since 1.0.0
 */

$sidebar_layout = portland_get_layout();
$sidebar_id = 'sidebar-1';

// Is the first sidebar active and does the layout call for at least one sidebar?
if ( is_active_sidebar( $sidebar_id ) && substr_count( $sidebar_layout, 'sidebar' ) > 0 ) {

	/**
	 * Fires before the sidebar is rendered.
	 *
	 * @since 1.0.0
	 *
	 * @param int|string $sidebar_id Sidebar ID.
	 */
	do_action( 'portland_sidebar_before', $sidebar_id );

	/**
	 * Filter the outer container for given sisdebar.
	 *
	 * The dynamic portion of the hook name, `$sidebar_id`, refers to the sidebar ID.
	 *
	 * @since 1.0.0
	 */
	echo '<div class="' . apply_filters( "portland_{$sidebar_id}", 'secondary sidebar' ) . '" role="complementary">';

	/**
	 * Fires at the top of the rendered sidebar.
	 *
	 * @since 1.0.0
	 *
	 * @param int|string $sidebar_id Sidebar ID.
	 */
	do_action( 'portland_sidebar_top', $sidebar_id );

	dynamic_sidebar( 'sidebar-1' );

	/**
	 * Fires at the bottom of the rendered sidebar.
	 *
	 * @since 1.0.0
	 *
	 * @param int|string $sidebar_id Sidebar ID.
	 */
	do_action( 'portland_sidebar_bottom', $sidebar_id );
	
	echo '</div><!--.secondary-->';

	/**
	 * Fires after the sidebar has been rendered.
	 *
	 * @since 1.0.0
	 *
	 * @param int|string $sidebar_id Sidebar ID.
	 */
	do_action( 'portland_sidebar_after', $sidebar_id );
}
