<?php
/**
 * Comments template
 *
 * @package Portland
 * @since 1.0.0
 */

// Exits if password is required, but has not been entered.
if ( post_password_required() ) {
	return;
}

?>

<div id="comments">
	<?php if ( have_comments() ) { ?>

		<h2 class="comments-title">
			<?php
				printf(
					_n(
						'One Comment',
						'%1$s Comments',
						get_comments_number(),
						'portland-textdomain' ),
						number_format_i18n( get_comments_number()
					),
					'<span>' . get_the_title() . '</span>'
				);
			?>
		</h2>

		<ol class="comment-list">
			<?php
				$comment_args = array(
					'avatar_size' => 66,
					'callback' => 'portland_comment',
				);
				wp_list_comments( $comment_args );
			?>
		</ol><!-- .comment-list -->

		<?php paginate_comments_links(); ?>

	<?php } ?>

	<?php if ( !comments_open() && get_comments_number() ) { ?>
		<p class="no-comments">
			<?php _e( 'Comments are closed', 'portland-textdomain' ); ?>
		</p>
	<?php } ?>

	<?php comment_form(); ?>
</div>

<?php

/**
 * Single comment callback template
 *
 * This is based on the html5_comment() function in the
 * wp-includes/comments-template.php file.
 *
 * @since 1.0.0
 * @param object $comment Object holding the comment data.
 * @param array $args Array of settings for displaying comment data.
 * @param integer $depth Nested comment depth.
 */
function portland_comment( $comment, $args, $depth ) {
	$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
	?>
		<<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $args['has_children'] ? 'parent' : '' ); ?>>
			<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
				<footer class="comment-meta">
					<div class="comment-author vcard">
						<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
						<?php printf( __( '%s <span class="says">says:</span>' ), sprintf( '<b class="fn">%s</b>', get_comment_author_link() ) ); ?>
					</div><!-- .comment-author -->

					<div class="comment-metadata">
						<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID, $args ) ); ?>">
							<time datetime="<?php comment_time( 'c' ); ?>">
								<?php echo get_comment_date(); ?>
							</time>
						</a>
						<?php edit_comment_link( __( 'Edit' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .comment-metadata -->

					<?php if ( '0' == $comment->comment_approved ) : ?>
					<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></p>
					<?php endif; ?>
				</footer><!-- .comment-meta -->

				<div class="comment-content">
					<?php comment_text(); ?>
				</div><!-- .comment-content -->

				<?php
				comment_reply_link( array_merge( $args, array(
					'add_below' => 'div-comment',
					'depth'     => $depth,
					'max_depth' => $args['max_depth'],
					'before'    => '<div class="reply">',
					'after'     => '</div>'
				) ) );
				?>
			</article><!-- .comment-body -->
	<?php
}
