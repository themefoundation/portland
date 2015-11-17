<?php
/**
 * Content for archives
 *
 * @package Portland
 * @since 1.0.0
 */

/** This filter is documented in template-parts/content.php */
do_action( 'portland_template_part_setup' );
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	/** This filter is documented in template-parts/content.php */
	do_action( 'portland_entry_top' );
	?>

	<?php
	/** This filter is documented in template-parts/content.php */
	$portland_thumbnail_size = apply_filters( 'portland_thumbnail_size', '' );

	the_post_thumbnail( $portland_thumbnail_size ); ?>
	?>

	<?php
	/** This filter is documented in template-parts/content.php */
	do_action( 'portland_entry_title_before' );
	?>

	<h2 class="entry-title">
		<a href="<?php the_permalink(); ?>">
			<?php the_title(); ?>
		</a>
	</h2>

	<?php
	/** This filter is documented in template-parts/content.php */
	do_action( 'portland_entry_title_after' );
	?>

	<?php portland_post_meta( array( 'date' ), array( 'display_titles' => false ) ); ?>

	<?php
	/** This filter is documented in template-parts/content.php */
	do_action( 'portland_entry_content_before' );
	?>

	<div class="entry-class">
		<?php the_content(); ?>
	</div><!--.entry-content-->

	<?php
	/** This filter is documented in template-parts/content.php */
	do_action( 'portland_entry_content_after' );
	?>

	<?php
	/** This filter is documented in template-parts/content.php */
	do_action( 'portland_entry_bottom' );
	?>
</div><!-- #post-number -->
