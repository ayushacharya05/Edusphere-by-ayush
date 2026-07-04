<?php
/**
 * Events / Academic Calendar archive - EduSphere by Ayush
 *
 * @package EduSphere_By_Ayush
 */
get_header(); ?>

<div class="s-page-header">
	<div class="s-container">
		<?php edusphere_breadcrumbs(); ?>
		<h1><?php esc_html_e( 'Academic Calendar & Events', 'edusphere-by-ayush' ); ?></h1>
		<p style="color:var(--s-text-muted);max-width:640px;"><?php esc_html_e( 'Explore upcoming school events, ceremonies, competitions and important academic dates.', 'edusphere-by-ayush' ); ?></p>
	</div>
</div>

<div class="s-container">
	<div class="s-content-area">
		<main id="main" class="site-main">
			<div style="display:flex;flex-direction:column;gap:18px;">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', 'edu_event' );
				endwhile; else :
					get_template_part( 'template-parts/content', 'none' );
				endif; ?>
			</div>
			<?php edusphere_pagination(); ?>
		</main>
		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>
