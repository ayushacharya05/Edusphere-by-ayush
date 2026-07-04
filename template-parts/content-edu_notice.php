<?php
/**
 * Template part for displaying a notice list item
 *
 * @package EduSphere_By_Ayush
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 's-notice-item' ); ?> style="grid-column:1/-1;">
	<div class="s-notice-date">
		<strong><?php echo esc_html( get_the_date( 'd' ) ); ?></strong>
		<span><?php echo esc_html( get_the_date( 'M' ) ); ?></span>
	</div>
	<div class="s-notice-content">
		<h4>
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			<?php if ( get_post_meta( get_the_ID(), 'edu_notice_important', true ) ) : ?><span class="s-notice-badge"><?php esc_html_e( 'Important', 'edusphere-by-ayush' ); ?></span><?php endif; ?>
		</h4>
		<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 20 ) ); ?></p>
	</div>
</article>
