<?php
/**
 * Helpers
 *
 * This file contains functions to extend the functionality of the
 * Portland theme.
 *
 * @package Longview
 * @since 1.0.0
 */

/**
 * Displays post meta based on $meta_data
 *
 * @since 1.0.0
 * @param array $meta_data Array of meta data to display.
 * @param array $args Array of display settings.
 */
function portland_post_meta( $meta_data = array(), $args = array() ) {
	$defaults = array(
		'class_name' => '',
		'separator' => '&bull;',
		'display_titles' => true
	);

	$args = array_merge( $defaults, $args );

	echo '<div class="portland-meta ' . $args['class_name'] . '">';

	if ( !empty( $meta_data ) ) {
		$display_separator = false;
		foreach ( $meta_data as $meta ) {
			switch ( $meta ) {
				case 'author':
					if ( $display_separator ) {
						echo '<span class="portland-meta-separator"> ' . $args['separator'] . ' </span>';
					}
					echo '<span class="meta author-wrap">';
					if ( $args['display_titles'] ) {
						_e( 'By ', 'portland_textdomain' );
					}
					echo '<span class="author">';
					the_author();
					echo '</span>';
					echo '</span> ';
					$display_separator = true;
					break;
				case 'author_website':
					if ( $display_separator ) {
						echo '<span class="portland-meta-separator"> ' . $args['separator'] . ' </span>';
					}
					echo '<span class="meta author-wrap">';
					if ( $args['display_titles'] ) {
						_e( 'By ', 'portland_textdomain' );
					}
					echo '<span class="author">';
					the_author_link();
					echo '</span>';
					echo '</span> ';
					$display_separator = true;
					break;
				case 'author_posts':
					if ( $display_separator ) {
						echo '<span class="portland-meta-separator"> ' . $args['separator'] . ' </span>';
					}
					echo '<span class="meta author-wrap">';
					if ( $args['display_titles'] ) {
						_e( 'By ', 'portland_textdomain' );
					}
					echo '<span class="author">';
					the_author_posts_link();
					echo '</span>';
					echo '</span> ';
					$display_separator = true;
					break;
				case 'categories':
					if ( has_category() ) {
						if ( $display_separator ) {
							echo '<span class="portland-meta-separator"> ' . $args['separator'] . ' </span>';
						}
						echo '<span class="meta categories-wrap">';
						if ( $args['display_titles'] ) {
							_e( 'Posted in: ', 'portland_textdomain' );
						}
						echo '<span class="categories">';
						the_category( ', ' );
						echo '</span>';
						echo '</span> ';
						$display_separator = true;
					}
					break;
				case 'date':
					if ( $display_separator ) {
						echo '<span class="portland-meta-separator"> ' . $args['separator'] . ' </span>';
					}
					echo '<span class="meta date-wrap">';
					if ( $args['display_titles'] ) {
						_e( 'Published: ', 'portland_textdomain' );
					}
					echo '<span class="date">';
					the_time( get_option( 'date_format' ) );
					echo '</span>';
					echo '</span> ';
					$display_separator = true;
					break;
				case 'tags':
					if ( $display_separator ) {
						echo '<span class="portland-meta-separator"> ' . $args['separator'] . ' </span>';
					}
					echo '<span class="meta tags-wrap">';
					if ( $args['display_titles'] ) {
						the_tags( __( 'Tags: ', 'portland_textdomain' ) );
					} else {
						the_tags();
					}
					echo '</span> ';
					$display_separator = true;
					break;

				default:
					# code...
					break;
			}
		}
	}

	echo '</div>';
}

/**
 * Checks if a sidebar is registered
 *
 * This is a workaround for is_active_sidebar(), which returns true for every
 * sidebar that has been registered, EVEN IF IT HAS BEEN UNREGISTERED. This
 * function is partially based on patch #24878 to WordPress core submitted
 * by GaryJ.
 *
 * @since  1.0.0
 * @see https://core.trac.wordpress.org/ticket/24878
 * @param string $name The ID of the sidebar when it was registered.
 * @return boolean True if the sidebar is registered, false otherwise.
 */
function portland_is_registered_sidebar( $name ) {
	global $wp_registered_sidebars;

	if ( ! is_active_sidebar( $name ) ) {
		return false;
	} else {
		return isset( $wp_registered_sidebars[$name] );
	}
}

/**
 * Writes $message to the WordPress log file
 *
 * This funciton checks if debugging is turned on. If it is, this function can
 * be use to wrote to the log file. This is helpful when trying to find the
 * contents of a variable. This is especially helpful when working in a context
 * that doesn't let the variable be printed to the screen.
 *
 * @since 1.0.0
 * @param string|array|object $message The data to write to the log file.
 */
function portland_log( $message ) {
	if( WP_DEBUG === true ){
		if( is_array( $message ) || is_object( $message ) ){
			error_log( print_r( $message, true ) );
		} else {
			error_log( $message );
		}
	}
}
