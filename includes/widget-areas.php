<?php
/**
 * Widget areas
 *
 * This file registers the widget areas and provides functions related to
 * displaying the widget areas.
 *
 * @package Portland
 * @since 1.0.0
 */

/**
 * Registers sidebars
 *
 * @since 1.0.0
 */
function portland_register_sidebars() {

	// Registers the main sidebar widget area.
	register_sidebar(
		array(
			'name' => __( 'Main Sidebar', 'portland_textdomain' ),
			'id' => 'sidebar-1',
			'description' => __( 'This is the main sidebar.', 'portland_textdomain' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);

}
add_action( 'widgets_init', 'portland_register_sidebars' );
