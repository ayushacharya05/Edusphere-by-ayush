<?php
/**
 * Template part for displaying a message when no content is found
 *
 * @package EduSphere_By_Ayush
 */
?>
<div style="grid-column:1/-1;text-align:center;padding:60px 0;">
	<h2><?php esc_html_e( 'Nothing Found', 'edusphere-by-ayush' ); ?></h2>
	<p style="color:var(--s-text-muted);"><?php esc_html_e( 'It looks like there is no content here yet. Please check back soon.', 'edusphere-by-ayush' ); ?></p>
	<?php get_search_form(); ?>
</div>
