<?php
/**
 * Single Event template - EduSphere by Ayush
 *
 * @package EduSphere_By_Ayush
 */
get_header();
$edate = get_post_meta( get_the_ID(), 'edu_event_date', true );
$etime = get_post_meta( get_the_ID(), 'edu_event_time', true );
$eloc  = get_post_meta( get_the_ID(), 'edu_event_location', true );
?>

<div class="s-page-header">
	<div class="s-container">
		<?php edusphere_breadcrumbs(); ?>
	</div>
</div>

<div class="s-container">
	<div class="s-content-area no-sidebar">
		<main id="main" class="site-main">
			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1><?php the_title(); ?></h1>

					<div style="display:flex;gap:16px;flex-wrap:wrap;margin:20px 0 30px;">
						<?php if ( $edate ) : ?>
							<div class="s-feature" style="background:var(--s-bg-soft);padding:16px 20px;border-radius:var(--s-radius);flex:1;min-width:180px;">
								<div class="s-feature-icon">&#128197;</div>
								<div><h4 style="margin-bottom:2px;"><?php esc_html_e( 'Date', 'edusphere-by-ayush' ); ?></h4><p><?php echo esc_html( date_i18n( 'F j, Y', strtotime( $edate ) ) ); ?></p></div>
							</div>
						<?php endif; ?>
						<?php if ( $etime ) : ?>
							<div class="s-feature" style="background:var(--s-bg-soft);padding:16px 20px;border-radius:var(--s-radius);flex:1;min-width:180px;">
								<div class="s-feature-icon">&#128337;</div>
								<div><h4 style="margin-bottom:2px;"><?php esc_html_e( 'Time', 'edusphere-by-ayush' ); ?></h4><p><?php echo esc_html( $etime ); ?></p></div>
							</div>
						<?php endif; ?>
						<?php if ( $eloc ) : ?>
							<div class="s-feature" style="background:var(--s-bg-soft);padding:16px 20px;border-radius:var(--s-radius);flex:1;min-width:180px;">
								<div class="s-feature-icon">&#128205;</div>
								<div><h4 style="margin-bottom:2px;"><?php esc_html_e( 'Location', 'edusphere-by-ayush' ); ?></h4><p><?php echo esc_html( $eloc ); ?></p></div>
							</div>
						<?php endif; ?>
					</div>

					<?php if ( has_post_thumbnail() ) : ?>
						<div style="margin-bottom:28px;border-radius:var(--s-radius-lg);overflow:hidden;">
							<?php the_post_thumbnail( 'edusphere-wide' ); ?>
						</div>
					<?php endif; ?>

					<div class="s-entry-content"><?php the_content(); ?></div>
				</article>
				<p style="margin-top:36px;"><a href="<?php echo esc_url( get_post_type_archive_link( 'edu_event' ) ); ?>">&larr; <?php esc_html_e( 'Back to Events', 'edusphere-by-ayush' ); ?></a></p>
			<?php endwhile; ?>
		</main>
	</div>
</div>

<?php get_footer(); ?>
