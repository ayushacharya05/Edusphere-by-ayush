<?php
/**
 * Single blog post template - EduSphere by Ayush
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
	<div class="s-content-area">
		<main id="main" class="site-main">
			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="s-card-meta" style="margin-bottom:20px;">
						<span><?php echo esc_html( get_the_date() ); ?></span>
						<span><?php the_category( ', ' ); ?></span>
					</div>
					<?php if ( has_post_thumbnail() ) : ?>
						<div style="margin-bottom:28px;border-radius:var(--s-radius-lg);overflow:hidden;">
							<?php the_post_thumbnail( 'edusphere-wide' ); ?>
						</div>
					<?php endif; ?>
					<div class="s-entry-content">
						<?php the_content(); ?>
					</div>
					<?php
					$tags = get_the_tags();
					if ( $tags ) : ?>
						<div style="margin-top:30px;display:flex;gap:8px;flex-wrap:wrap;">
							<?php foreach ( $tags as $tag ) : ?>
								<a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" class="s-tag" style="font-size:.8rem;padding:.4em 1em;border-radius:999px;border:1px solid var(--s-border);color:var(--s-text-muted);"><?php echo esc_html( $tag->name ); ?></a>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</article>

				<div class="s-post-nav" style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin:40px 0;">
					<div><?php previous_post_link( '%link', '&larr; %title' ); ?></div>
					<div style="text-align:right;"><?php next_post_link( '%link', '%title &rarr;' ); ?></div>
				</div>

				<?php if ( comments_open() || get_comments_number() ) : ?>
					<div class="s-comments"><?php comments_template(); ?></div>
				<?php endif; ?>
			<?php endwhile; ?>
		</main>
		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>
