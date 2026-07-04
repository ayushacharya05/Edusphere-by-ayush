<?php
/**
 * Search results template - EduSphere by Ayush
 *
 * @package EduSphere_By_Ayush
 */
get_header(); ?>

<div class="s-page-header">
	<div class="s-container">
		<?php edusphere_breadcrumbs(); ?>
		<h1><?php printf( esc_html__( 'Search Results for: %s', 'edusphere-by-ayush' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
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
