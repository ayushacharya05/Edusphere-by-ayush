<?php
/**
 * Programs & Courses archive - EduSphere by Ayush
 *
 * @package EduSphere_By_Ayush
 */
get_header(); ?>

<div class="s-page-header">
	<div class="s-container">
		<?php edusphere_breadcrumbs(); ?>
		<h1><?php esc_html_e( 'Programs & Courses', 'edusphere-by-ayush' ); ?></h1>
		<p style="color:var(--s-text-muted);max-width:640px;"><?php esc_html_e( 'Discover the full range of academic programs offered, from early education to higher studies.', 'edusphere-by-ayush' ); ?></p>
	</div>
</div>

<div class="s-container">
	<main id="main" class="site-main">
		<div class="s-grid-4">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', 'edu_program' );
			endwhile; else :
				get_template_part( 'template-parts/content', 'none' );
			endif; ?>
		</div>
		<?php edusphere_pagination(); ?>
	</main>
</div>

<?php get_footer(); ?>
