<?php
/**
 * Single Program/Course template - EduSphere by Ayush
 *
 * @package EduSphere_By_Ayush
 */
get_header(); ?>

<div class="s-page-header">
	<div class="s-container">
		<?php edusphere_breadcrumbs(); ?>
	</div>
</div>

<div class="s-container">
	<div class="s-content-area">
		<main id="main" class="site-main">
			<?php while ( have_posts() ) : the_post();
				$level    = get_post_meta( get_the_ID(), 'edu_program_level', true );
				$duration = get_post_meta( get_the_ID(), 'edu_program_duration', true );
				$seats    = get_post_meta( get_the_ID(), 'edu_program_seats', true );
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1><?php the_title(); ?></h1>

					<?php if ( has_post_thumbnail() ) : ?>
						<div style="margin:20px 0 28px;border-radius:var(--s-radius-lg);overflow:hidden;">
							<?php the_post_thumbnail( 'edusphere-wide' ); ?>
						</div>
					<?php endif; ?>

					<div style="display:flex;gap:14px;flex-wrap:wrap;margin-bottom:28px;">
						<?php if ( $level ) : ?><span class="s-eyebrow" style="background:var(--s-bg-soft);">&#127891; <?php echo esc_html( $level ); ?></span><?php endif; ?>
						<?php if ( $duration ) : ?><span class="s-eyebrow" style="background:var(--s-bg-soft);">&#8987; <?php echo esc_html( $duration ); ?></span><?php endif; ?>
						<?php if ( $seats ) : ?><span class="s-eyebrow" style="background:var(--s-bg-soft);">&#128101; <?php echo esc_html( $seats ); ?> <?php esc_html_e( 'Seats', 'edusphere-by-ayush' ); ?></span><?php endif; ?>
					</div>

					<div class="s-entry-content"><?php the_content(); ?></div>

					<div class="s-cta-banner" style="margin-top:36px;">
						<div>
							<h3><?php esc_html_e( 'Interested in this program?', 'edusphere-by-ayush' ); ?></h3>
							<p><?php esc_html_e( 'Get in touch with our admissions office to learn more.', 'edusphere-by-ayush' ); ?></p>
						</div>
						<a class="s-btn s-btn-navy" href="<?php echo esc_url( get_theme_mod( 'edusphere_admission_link', '#' ) ); ?>"><?php esc_html_e( 'Apply Now', 'edusphere-by-ayush' ); ?></a>
					</div>
				</article>
			<?php endwhile; ?>
		</main>
		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>
