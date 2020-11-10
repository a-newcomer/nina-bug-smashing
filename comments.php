<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nina_Magon
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>


<div id="comments" class="comments-area">
	<div class="comment-subtitle">Join the Conversation</div>

    <?php
    $comments_args = array(
		// Change the fields that show in the form
		'fields' => array(
			'author' => '<div class="flex align-center justify-between"><div class="comment-form-author comment-input-wrap comment-input-half"><input id="author" name="author" type="text" value="" size="30" maxlength="245" aria-required="true" required="required" placeholder="Name"></div>',
			'email' => '<div class="comment-form-email comment-input-wrap comment-input-half"><input id="email" name="email" type="email" value="" size="30" maxlength="100" aria-describedby="email-notes" aria-required="true" required="required" placeholder="Email"></div></div>'
		),
		'class_submit' => __('btn btn-secondary', 'nina_magon'),
        // Change the title of send button 
        'label_submit' => __( 'Submit', 'nina_magon' ),
        // Change the title of the reply section
        'title_reply' => __( '', 'nina_magon' ),
        'title_reply_before' => __( '' ),
        'title_reply_after' => '',
        // Remove "Text or HTML to be displayed after the set of comment fields".
        'comment_notes_before' => '',
        'comment_notes_after' => '',
        // Redefine your own textarea (the comment body).
        'comment_field' => '<div class="comment-form-comment comment-input-wrap"><textarea id="comment" rows="8" name="comment" aria-required="true" placeholder="Your Comment"></textarea></div>',
	);
	comment_form( $comments_args );


	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			<?php
			$nina_magon_comment_count = get_comments_number();
			if ( '1' === $nina_magon_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'nina_magon' ),
					'<span>' . get_the_title() . '</span>'
				);
			} else {
				printf( // WPCS: XSS OK.
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $nina_magon_comment_count, 'comments title', 'nina_magon' ) ),
					number_format_i18n( $nina_magon_comment_count ),
					'<span>' . get_the_title() . '</span>'
				);
			}
			?>
		</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
			wp_list_comments( array(
				'style'      => 'ol',
				'short_ping' => true,
			) );
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'nina_magon' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().
	?>

</div><!-- #comments -->
