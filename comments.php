<?php
/**
 * Comments template - EduSphere by Ayush
 *
 * @package EduSphere_By_Ayush
 */
if ( post_password_required() ) return;
?>
<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
			$count = get_comments_number();
			printf( esc_html( _n( '%1$s Comment', '%1$s Comments', $count, 'edusphere-by-ayush' ) ), number_format_i18n( $count ) );
			?>
		</h2>
		<ol class="comment-list">
			<?php wp_list_comments( array( 'style' => 'ol', 'short_ping' => true ) ); ?>
		</ol>
		<?php the_comments_pagination( array( 'class' => 's-pagination' ) ); ?>
	<?php endif; ?>

	<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'edusphere-by-ayush' ); ?></p>
	<?php endif; ?>

	<?php
	comment_form( array(
		'class_submit' => 's-btn s-btn-navy',
		'title_reply'  => esc_html__( 'Leave a Comment', 'edusphere-by-ayush' ),
	) );
	?>
</div>
