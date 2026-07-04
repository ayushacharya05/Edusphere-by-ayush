<?php
/**
 * Notice Board archive - EduSphere by Ayush
 *
 * @package EduSphere_By_Ayush
 */
get_header(); ?>

<div class="s-page-header">
	<div class="s-container">
		<?php edusphere_breadcrumbs(); ?>
		<h1><?php esc_html_e( 'Notice Board', 'edusphere-by-ayush' ); ?></h1>
		<p style="color:var(--s-text-muted);max-width:640px;"><?php esc_html_e( 'Stay up to date with the latest announcements, circulars and important updates from the school administration.', 'edusphere-by-ayush' ); ?></p>
	</div>
</div>

<div class="s-container">
	<div class="s-content-area">
		<main id="main" class="site-main">
			<ul class="s-notice-list">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', 'edu_notice' );
				endwhile; else :
					get_template_part( 'template-parts/content', 'none' );
				endif; ?>
			</ul>
			<?php edusphere_pagination(); ?>
		</main>
		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>
