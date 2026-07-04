<?php
/**
 * Single Notice template - EduSphere by Ayush
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
	<div class="s-content-area no-sidebar">
		<main id="main" class="site-main">
			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="s-card-meta" style="margin-bottom:14px;">
						<span>&#128197; <?php echo esc_html( get_the_date() ); ?></span>
						<?php if ( get_post_meta( get_the_ID(), 'edu_notice_important', true ) ) : ?><span class="s-notice-badge"><?php esc_html_e( 'Important', 'edusphere-by-ayush' ); ?></span><?php endif; ?>
					</div>
					<h1><?php the_title(); ?></h1>
					<div class="s-entry-content" style="margin-top:24px;">
						<?php the_content(); ?>
					</div>
					<?php $file = get_post_meta( get_the_ID(), 'edu_notice_file', true ); if ( $file ) : ?>
						<p style="margin-top:24px;"><a class="s-btn s-btn-navy" href="<?php echo esc_url( $file ); ?>" target="_blank" rel="noopener noreferrer">&#128206; <?php esc_html_e( 'Download Attachment', 'edusphere-by-ayush' ); ?></a></p>
					<?php endif; ?>
				</article>
				<p style="margin-top:36px;"><a href="<?php echo esc_url( get_post_type_archive_link( 'edu_notice' ) ); ?>">&larr; <?php esc_html_e( 'Back to Notice Board', 'edusphere-by-ayush' ); ?></a></p>
			<?php endwhile; ?>
		</main>
	</div>
</div>

<?php get_footer(); ?>
