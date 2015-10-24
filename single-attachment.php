<?php
/**
 * Single attachment template
 *
 * This file forces the attachment page to use the page.php template
 * instead of the of the single.php template. This is to prevent the
 * meta data and comment form from being displayed.
 *
 * @package Portland
 * @since 1.0.0
 */

// Loads the default single post template.
locate_template( array( 'page.php' ), true );
