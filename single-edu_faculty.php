<?php
/**
 * Single Faculty Profile template - EduSphere by Ayush
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
			<?php while ( have_posts() ) : the_post();
				$designation   = get_post_meta( get_the_ID(), 'edu_faculty_designation', true );
				$qualification = get_post_meta( get_the_ID(), 'edu_faculty_qualification', true );
				$email         = get_post_meta( get_the_ID(), 'edu_faculty_email', true );
				$linkedin      = get_post_meta( get_the_ID(), 'edu_faculty_linkedin', true );
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="display:grid;grid-template-columns:260px 1fr;gap:40px;">
					<div>
						<div style="border-radius:var(--s-radius-lg);overflow:hidden;">
							<?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'edusphere-square' ); } else { edusphere_placeholder_thumb( '&#128100;' ); } ?>
						</div>
						<?php if ( $email || $linkedin ) : ?>
							<div style="margin-top:16px;display:flex;flex-direction:column;gap:10px;">
								<?php if ( $email ) : ?><a href="mailto:<?php echo esc_attr( $email ); ?>">&#9993; <?php echo esc_html( $email ); ?></a><?php endif; ?>
								<?php if ( $linkedin ) : ?><a href="<?php echo esc_url( $linkedin ); ?>" target="_blank" rel="noopener noreferrer">&#128279; LinkedIn</a><?php endif; ?>
							</div>
						<?php endif; ?>
					</div>
					<div>
						<h1 style="margin-bottom:4px;"><?php the_title(); ?></h1>
						<?php if ( $designation ) : ?><div class="s-faculty-role" style="margin-bottom:4px;"><?php echo esc_html( $designation ); ?></div><?php endif; ?>
						<?php
						$terms = get_the_terms( get_the_ID(), 'edu_department' );
						if ( $terms && ! is_wp_error( $terms ) ) : ?>
							<div class="s-faculty-dept" style="margin-bottom:18px;"><?php echo esc_html( $terms[0]->name ); ?> <?php esc_html_e( 'Department', 'edusphere-by-ayush' ); ?></div>
						<?php endif; ?>
						<?php if ( $qualification ) : ?><p><strong><?php esc_html_e( 'Qualification:', 'edusphere-by-ayush' ); ?></strong> <?php echo esc_html( $qualification ); ?></p><?php endif; ?>
						<div class="s-entry-content"><?php the_content(); ?></div>
					</div>
				</article>
				<p style="margin-top:36px;"><a href="<?php echo esc_url( get_post_type_archive_link( 'edu_faculty' ) ); ?>">&larr; <?php esc_html_e( 'Back to Faculty', 'edusphere-by-ayush' ); ?></a></p>
			<?php endwhile; ?>
		</main>
	</div>
</div>

<?php get_footer(); ?>
