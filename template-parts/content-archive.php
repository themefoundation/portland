<?php
/**
 * Content for archives
 *
 * @package Portland
 * @since 1.0.0
 */

// Use this hook to add and remove actions.
do_action( 'portland_template_part_setup' );
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php do_action( 'portland_entry_top' ); ?>

	<?php the_post_thumbnail( apply_filters( 'portland_thumbnail_size', '' ) ); ?>

	<?php do_action( 'portland_entry_title_before' ); ?>
	<h2 class="<?php echo apply_filters( 'portland_entry_title_class', 'entry-title' ); ?>">
		<a href="<?php the_permalink(); ?>">
			<?php the_title(); ?>
		</a>
	</h2>
	<?php do_action( 'portland_entry_title_after' ); ?>

	<?php portland_post_meta( array( 'date' ), array( 'display_titles' => false ) ); ?>

	<?php do_action( 'portland_entry_content_before' ); ?>
	<div class="<?php echo apply_filters( 'portland_entry_content_class', 'entry-content' ); ?>">
		<?php the_content(); ?>
	</div><!--.entry-content-->
	<?php do_action( 'portland_entry_content_after' ); ?>

	<?php do_action( 'portland_entry_bottom' ); ?>
</div><!-- #post-number -->
