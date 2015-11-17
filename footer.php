<?php
/**
 * Footer template
 *
 * @package Portland
 * @since 1.0.0
 */

/**
 *****************************************************************************
 * Add actions
 *****************************************************************************
 *
 * This section adds actions to their respective action hooks.
 *
 * @see http://codex.wordpress.org/Function_Reference/add_action
 * @since 1.0
 */

add_action( 'portland_footer_before', 'portland_main_close' );

add_action( 'portland_footer', 'portland_footer_open', 1 );
add_action( 'portland_footer', 'portland_footer_menu', 20 );
add_action( 'portland_footer', 'portland_footer', 50 );
add_action( 'portland_footer', 'portland_footer_close', 100 );

/**
 *****************************************************************************
 * Define actions
 *****************************************************************************
 *
 * This section defines the actions associated with each hook.
 *
 * @since 1.0.0
 */

if ( !function_exists( 'portland_main_close' ) ) {
	/**
	 * Main closing
	 *
	 * Closes the main div and wrapper.
	 */
	function portland_main_close() {
		echo '</div><!--.wrap-->';
		echo '</div><!--#main-->';
	}
}

if ( !function_exists( 'portland_footer_open' ) ) {
	/**
	 * Footer opening
	 *
	 * Opens the footer and wrapper.
	 *
	 * @since 1.0.0
	 */
	function portland_footer_open() {
		echo '<footer id="' . apply_filters( 'portland_footer_id', 'footer' ) . '" class="' . apply_filters( 'portland_footer_class', 'site-footer row' ) . '">';
		echo '<div class="' . apply_filters( 'portland_footer_wrap_class', 'wrap' ) . '">';
	}
}

if ( !function_exists( 'portland_footer_menu' ) ) {
	/**
	 * Footer Menu
	 *
	 * Displays the footer menu. However, if there are widgets present in the
	 * Inside Footer widget area, that widget area overrides this menu.
	 *
	 * @since 1.0.0
	 */
	function portland_footer_menu() {

		// Is the Inside Footer widget area currently empty?
		if ( ! is_active_sidebar( 'footer-inside' ) ) {
			wp_nav_menu( array(
				'theme_location' => 'footer_menu',
				'container' => 'div',
				'container_class' => 'portland-footer-menu',
				'fallback_cb' => false
			) );
		}
	}
}

if ( !function_exists( 'portland_footer' ) ) {
	/**
	 * Footer
	 *
	 * Displays the site footer.
	 *
	 * @since 1.0.0
	 */
	function portland_footer() {
		if ( ! is_active_sidebar( 'footer-inside' ) ) {
			echo apply_filters( 'site_credits', '<p class="site-credits">&copy;  <a href="' . esc_url( home_url( '/' ) ) . '">' . get_bloginfo('name') . '</a></p>' );
		}
	}
}

if ( !function_exists( 'portland_footer_close' ) ) {
	/**
	 * Footer closing
	 *
	 * Closes the footer and wrapper.
	 *
	 * @since 1.0.0
	 */
	function portland_footer_close() {
		echo '</div><!--.wrap-->';
		echo '</footer><!--#footer-->';
	}
}

/**
 *****************************************************************************
 * Do actions
 *****************************************************************************
 *
 * This section runs the actions associated with each hook.
 *
 * @see http://codex.wordpress.org/Function_Reference/do_action
 * @since 1.0.0
 */

/**
 * Fires before the footer has been set up.
 *
 * Use this hook to add and remove actions from the footer hooks.
 *
 * @since 1.0.0
 */
do_action( 'portland_footer_setup' );

/**
 * Fires just before the footer is rendered.
 *
 * @since 1.0.0
 */
do_action( 'portland_footer_before' );

/**
 * Fires when the footer is rendered.
 *
 * @since 1.0.0
 */
do_action( 'portland_footer' );

/**
 * Fires just after the footer is rendered.
 *
 * @since 1.0.0
 */
do_action( 'portland_footer_after' );

/**
 * Fires at the bottom of the page body, after the footer has rendered.
 *
 * @since 1.0.0
 */
do_action( 'portland_body_bottom' );

wp_footer();

?>

</body>
</html>
