<?php
/**
 * Content for search archives
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

	<?php
	/** This filter is documented in template-parts/content.php */
	do_action( 'portland_entry_content_before' );
	?>

	<div class="entry-content">
		<?php the_excerpt(); ?>
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
