<?php
/**
 * Template part for displaying a faculty member card
 *
 * @package EduSphere_By_Ayush
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 's-card s-faculty-card' ); ?>>
	<div class="s-card-thumb">
		<?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'edusphere-square' ); } else { edusphere_placeholder_thumb( '&#128100;' ); } ?>
	</div>
	<div class="s-card-body">
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<div class="s-faculty-role"><?php echo esc_html( get_post_meta( get_the_ID(), 'edu_faculty_designation', true ) ); ?></div>
		<?php $terms = get_the_terms( get_the_ID(), 'edu_department' ); if ( $terms && ! is_wp_error( $terms ) ) : ?>
			<div class="s-faculty-dept"><?php echo esc_html( $terms[0]->name ); ?></div>
		<?php endif; ?>
	</div>
</article>
