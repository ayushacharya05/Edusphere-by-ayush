<?php
/**
 * Default page template - EduSphere by Ayush
 *
 * @package EduSphere_By_Ayush
 */
get_header(); ?>

<div class="s-page-header">
	<div class="s-container">
		<?php edusphere_breadcrumbs(); ?>
		<h1><?php the_title(); ?></h1>
	</div>
</div>

<div class="s-container">
	<div class="s-content-area <?php echo is_active_sidebar( 'sidebar-1' ) ? '' : 'no-sidebar'; ?>">
		<main id="main" class="site-main">
			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php if ( has_post_thumbnail() ) : ?>
						<div style="margin-bottom:28px;border-radius:var(--s-radius-lg);overflow:hidden;">
							<?php the_post_thumbnail( 'edusphere-wide' ); ?>
						</div>
					<?php endif; ?>
					<div class="s-entry-content">
						<?php the_content(); ?>
					</div>
				</article>
				<?php if ( comments_open() || get_comments_number() ) : ?>
					<div class="s-comments"><?php comments_template(); ?></div>
				<?php endif; ?>
			<?php endwhile; ?>
		</main>
		<?php if ( is_active_sidebar( 'sidebar-1' ) ) get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>
