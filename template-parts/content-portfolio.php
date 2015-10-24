<?php
/**
 * Content for portfolio archives
 *
 * @package Portland
 * @since 1.0.0
 */

// Use this hook to add and remove actions.
do_action( 'portland_template_part_setup' );
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php do_action( 'portland_entry_top' ); ?>

	<?php do_action( 'portland_entry_title_before' ); ?>
	<?php do_action( 'portland_entry_title_after' ); ?>

	<?php do_action( 'portland_entry_content_before' ); ?>
	<div class="<?php echo apply_filters( 'portland_entry_content_class', 'entry-content' ); ?>">
		<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail( apply_filters( 'portland_thumbnail_size', 'portfolio' ) ); ?>
		</a>
	</div><!--.entry-content-->
	<?php do_action( 'portland_entry_content_after' ); ?>

	<?php do_action( 'portland_entry_bottom' ); ?>
</div><!-- #post-number -->
