<?php
/**
 * Main blog index - EduSphere by Ayush
 *
 * @package EduSphere_By_Ayush
 */
get_header(); ?>

<div class="s-page-header">
	<div class="s-container">
		<?php edusphere_breadcrumbs(); ?>
		<h1><?php is_home() && ! is_front_page() ? single_post_title() : esc_html_e( 'Blog & News', 'edusphere-by-ayush' ); ?></h1>
	</div>
</div>

<div class="s-container">
	<div class="s-content-area">
		<main id="main" class="site-main">
			<div class="s-grid-3">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', get_post_type() );
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
