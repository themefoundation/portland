<?php
/**
 * Content for archives
 *
 * @package Portland
 * @since 1.0.0
 */

/**
 * Fires before a template part is set up.
 *
 * Use this hook to add and remove actions inside the template part.
 *
 * @since 1.0.0
 */
do_action( 'portland_template_part_setup' );
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	/**
	 * Fires at the top of an entry in a given template part.
	 *
	 * @since 1.0.0
	 */
	do_action( 'portland_entry_top' );
	?>

	<?php
	/**
	 * Fires just before the title element in an entry in a template part.
	 *
	 * @since 1.0.0
	 */
	do_action( 'portland_entry_title_before' );
	?>

	<?php if ( is_singular() ) { ?>
		<h1 class="<?php echo apply_filters( 'portland_entry_title_class', 'entry-title' ); ?>">
			<?php the_title(); ?>
		</h1>
	<?php } else { ?>
		<h2 class="<?php echo apply_filters( 'portland_entry_title_class', 'entry-title' ); ?>">
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h2>
	<?php } ?>

	<?php
	/**
	 * Fires just after the title element in an entry in a template part.
	 *
	 * @since 1.0.0
	 */
	do_action( 'portland_entry_title_after' );
	?>

	<?php
	/**
	 * Fires just before the content div in an entry in a template part.
	 *
	 * @since 1.0.0
	 */
	do_action( 'portland_entry_content_before' );
	?>

	<div class="<?php echo apply_filters( 'portland_entry_content_class', 'entry-content' ); ?>">
		<?php the_content(); ?>
		<?php wp_link_pages(); ?>
	</div><!--.entry-content-->

	<?php
	/**
	 * Fires just after the content div in an entry in a template part.
	 *
	 * @since 1.0.0
	 */
	do_action( 'portland_entry_content_after' );
	?>

	<?php
	/**
	 * Fires at the bottom of an entry in a given template part.
	 *
	 * @since 1.0.0
	 */
	do_action( 'portland_entry_bottom' );
	?>

</div><!-- #post-number -->
