<?php
/**
 *  Sidebar template
 *
 * @package Longview
 * @since 1.0.0
 */

$sidebar_layout = portland_get_layout();

// Is the first sidebar active and does the layout call for at least one sidebar?
if ( is_active_sidebar( 'sidebar-1' ) && substr_count( $sidebar_layout, 'sidebar' ) > 0 ) {
	do_action( 'portland_sidebar_before' );

	echo '<div class="' . apply_filters( 'portland_sidebar-1', 'secondary sidebar' ) . '" role="complementary">';
	do_action( 'portland_sidebar_top' );
	dynamic_sidebar( 'sidebar-1' );
	do_action( 'portland_sidebar_bottom' );
	echo '</div><!--.secondary-->';

	do_action( 'portland_sidebar_after' );
}
