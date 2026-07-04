<?php
/**
 * Template part for displaying a program/course card
 *
 * @package EduSphere_By_Ayush
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 's-card' ); ?>>
	<div class="s-card-thumb">
		<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } else { edusphere_placeholder_thumb( '&#127891;' ); } ?>
	</div>
	<div class="s-card-body">
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<p class="s-card-excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 16 ) ); ?></p>
		<div class="s-program-meta">
			<?php $level = get_post_meta( get_the_ID(), 'edu_program_level', true ); if ( $level ) : ?><span>&#127891; <?php echo esc_html( $level ); ?></span><?php endif; ?>
			<?php $dur = get_post_meta( get_the_ID(), 'edu_program_duration', true ); if ( $dur ) : ?><span>&#8987; <?php echo esc_html( $dur ); ?></span><?php endif; ?>
		</div>
		<div class="s-card-footer"><a href="<?php the_permalink(); ?>"><?php esc_html_e( 'Learn More &rarr;', 'edusphere-by-ayush' ); ?></a></div>
	</div>
</article>
