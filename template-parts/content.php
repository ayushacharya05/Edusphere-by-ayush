<?php
/**
 * Template part for displaying a post card in listings
 *
 * @package EduSphere_By_Ayush
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 's-card' ); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<a href="<?php the_permalink(); ?>" class="s-card-thumb"><?php the_post_thumbnail(); ?></a>
	<?php endif; ?>
	<div class="s-card-body">
		<div class="s-card-meta">
			<span><?php echo esc_html( get_the_date() ); ?></span>
			<?php if ( get_post_type() === 'post' ) : ?><span><?php the_category( ', ' ); ?></span><?php endif; ?>
		</div>
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<div class="s-card-excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 16 ) ); ?></div>
		<div class="s-card-footer"><a href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read More &rarr;', 'edusphere-by-ayush' ); ?></a></div>
	</div>
</article>
