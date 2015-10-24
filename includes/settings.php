<?php
/**
 * Settings
 *
 * This file contains common settings for the THMFDN theme.
 *
 * @package Portland
 * @since 1.0.0
 */

/**
 * Runs the theme initialization routine
 *
 * Theme setup process. Does things like add support for various features
 * built into WordPress core.
 *
 * @since 1.0.0
 */
function portland_init() {

	// Adds title tag support: https://codex.wordpress.org/Title_Tag
	add_theme_support( 'title-tag' );

	// Adds automatic feed link support: https://codex.wordpress.org/Automatic_Feed_Links
	add_theme_support( 'automatic-feed-links' );

	// Adds featured image support: https://codex.wordpress.org/Post_Thumbnails
	add_theme_support( 'post-thumbnails' );

	// Adds HTML5 support: https://codex.wordpress.org/Theme_Markup
	$html5_support = array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption'
	);
	add_theme_support( 'html5', $html5_support );

	// Sets the default content width.
	if ( ! isset( $content_width ) ) $content_width = 1000;

	// Sets additional image sizes
	add_image_size( 'grid', 350, 200, true );
	add_image_size( 'portfolio', 500, 250, true );

}
add_action( 'init', 'portland_init' );

/**
 * Sets layout defaults
 *
 * These are the supported layouts:
 * - content-only (Content takes up center column, no sidebars present)
 * - content-full-width (Content takes up all columns, no sidebars present)
 * - content-sidebar (Content on the left, single sidebar on the right)
 * - content-sidebar-sidebar (Content on the left, double sidebars on the right)
 * - sidebar-content (Single sidebar on the left, content on the right)
 * - sidebar-sidebar-content (Double sidebars on the left, content on the right)
 * - sidebar-content-sidebar (First sidebar on the left, content in the center, and second sidebar on the iis_get_server_rights(server_instance, virtual_path))
 *
 * @since 1.0.0
 * @return string Layout class name.
 */
function portland_get_layout() {

	// Sets default layout
	$layout_class = 'content-sidebar';

	// Overrides default layout for pages.
	if ( is_page() ) {
		$layout_class = 'content-only';
	}

	// Overrides default layout for tag archives.
	if ( is_tag() ) {
		$layout_class = 'content-full-width';
	}

	// Overrides default layout for attachment pages.
	if ( is_attachment() ) {
		if ( wp_attachment_is_image() ) {
			$layout_class = 'content-full-width';
		} else {
			$layout_class = 'content-only';
		}
	}

	return apply_filters( 'portland_layout_class', $layout_class );
}

/**
 * Sets content format defaults
 *
 * Content formats define the layout/format of the content portion the page.
 * Simply put, this controls the format of the primary column. While this
 * could be put into use on any type of page, it is primarily used on
 * archive pages.
 *
 * These are the supported content formats:
 * - content (Standard blog format, single column of posts)
 * - grid (Rows of content, multiple columns)
 * - portfolio (Rows of images, multiple columns)
 *
 * @since 1.0.0
 * @return string Layout class name.
 */
function get_portland_content_format( $format = '' ) {

	// Sets default content format.
	if ( empty( $format ) ) {
		$format = get_post_format();
	}

	// Overrides default content format for search pages.
	if ( is_search() ) {
		$format = 'search';
	}

	// Overrides default content format for tag archives.
	if ( is_tag() ) {
		$format = 'grid';
	}

	return apply_filters( 'portland_content_format', $format );
}
add_filter( 'portland_template_part_name', 'get_portland_content_format' );

/**
 * Sets default image size
 *
 * @since 1.0.0
 * @return string Name of image size to use as default.
 */
function theme_default_image_size() {
    return 'large';
}
add_filter( 'pre_option_image_default_size', 'theme_default_image_size' );

/**
 * Sets the default thumbnail size.
 *
 * This doesn't set the exact dimensions of the image. It only sets which of the
 * default WordPress sizes are used. To set the exact dimenstion of the default
 * image sizes, use the Settings > Media page of the WordPress dashboard.
 *
 * Available sizes:
 * - thumbnail
 * - medium
 * - large
 * - full
 * - any custom image size introduced by the theme or a plugin
 *
 * @since 1.0
 * @param string $thumbnail_size Existing image size.
 * @return string $thumbnail_size Image size to use.
 */
function portland_thumbnail_size( $thumbnail_size ) {

	// Overrides default layout for single posts.
	if ( is_single () ) {
		$thumbnail_size = 'large';
	}

	// Overrides default layout for pages.
	if ( is_page() ) {
		$thumbnail_size = 'medium';
	}

	return $thumbnail_size;
}
add_filter( 'portland_thumbnail_size', 'portland_thumbnail_size' );
