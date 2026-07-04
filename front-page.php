<?php
/**
 * Homepage template - EduSphere by Ayush
 *
 * @package EduSphere_By_Ayush
 */
get_header(); ?>

<!-- HERO -->
<section class="s-hero">
	<div class="s-container s-hero-inner">
		<div class="s-hero-text">
			<h1><?php esc_html_e( 'Shaping Bright Futures Through', 'edusphere-by-ayush' ); ?> <em><?php esc_html_e( 'Quality Education', 'edusphere-by-ayush' ); ?></em></h1>
			<p><?php esc_html_e( 'A nurturing environment where academic excellence meets character building, preparing every student for lifelong success.', 'edusphere-by-ayush' ); ?></p>
			<div class="s-hero-cta">
				<a class="s-btn" href="<?php echo esc_url( get_theme_mod( 'edusphere_admission_link', '#' ) ); ?>"><?php esc_html_e( 'Apply for Admission', 'edusphere-by-ayush' ); ?></a>
				<a class="s-btn s-btn-outline" href="<?php echo esc_url( post_type_exists( 'edu_program' ) ? get_post_type_archive_link( 'edu_program' ) : '#' ); ?>"><?php esc_html_e( 'Explore Programs', 'edusphere-by-ayush' ); ?></a>
			</div>
		</div>
		<div class="s-hero-media">
			<div class="s-hero-media-inner">
				<?php if ( has_post_thumbnail() ) : the_post_thumbnail( 'edusphere-wide' ); else : ?>
					<div class="s-hero-media-placeholder">
						<span class="s-placeholder-icon">&#127891;</span>
						<p><?php esc_html_e( 'Set a Featured Image on this page to display your campus photo here.', 'edusphere-by-ayush' ); ?></p>
					</div>
				<?php endif; ?>
			</div>
			<div class="s-hero-badge">
				<span class="s-badge-icon">&#127891;</span>
				<div>
					<?php esc_html_e( 'Admissions Open', 'edusphere-by-ayush' ); ?><br />
					<small style="font-weight:400;color:var(--s-text-muted);"><?php esc_html_e( '2026 - 27 Session', 'edusphere-by-ayush' ); ?></small>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- STATS -->
<section class="s-stats">
	<div class="s-container">
		<div class="s-stats-inner">
			<div class="s-stat"><strong>2,400+</strong><span><?php esc_html_e( 'Students', 'edusphere-by-ayush' ); ?></span></div>
			<div class="s-stat"><strong>150+</strong><span><?php esc_html_e( 'Faculty Members', 'edusphere-by-ayush' ); ?></span></div>
			<div class="s-stat"><strong>98%</strong><span><?php esc_html_e( 'Graduation Rate', 'edusphere-by-ayush' ); ?></span></div>
			<div class="s-stat"><strong>25+</strong><span><?php esc_html_e( 'Years of Excellence', 'edusphere-by-ayush' ); ?></span></div>
		</div>
	</div>
</section>

<!-- WHY CHOOSE US -->
<section class="s-section">
	<div class="s-container">
		<div class="s-head">
			<span class="s-eyebrow"><?php esc_html_e( 'Why Choose Us', 'edusphere-by-ayush' ); ?></span>
			<h2><?php esc_html_e( 'A Complete Learning Experience', 'edusphere-by-ayush' ); ?></h2>
			<p><?php esc_html_e( 'From modern classrooms to dedicated mentors, everything is designed around student success.', 'edusphere-by-ayush' ); ?></p>
		</div>
		<div class="s-grid-4">
			<div class="s-feature">
				<div class="s-feature-icon">&#127979;</div>
				<div><h4><?php esc_html_e( 'Modern Campus', 'edusphere-by-ayush' ); ?></h4><p><?php esc_html_e( 'Smart classrooms, science labs and digital libraries.', 'edusphere-by-ayush' ); ?></p></div>
			</div>
			<div class="s-feature">
				<div class="s-feature-icon">&#128218;</div>
				<div><h4><?php esc_html_e( 'Expert Faculty', 'edusphere-by-ayush' ); ?></h4><p><?php esc_html_e( 'Experienced educators dedicated to every learner.', 'edusphere-by-ayush' ); ?></p></div>
			</div>
			<div class="s-feature">
				<div class="s-feature-icon">&#127942;</div>
				<div><h4><?php esc_html_e( 'Extracurriculars', 'edusphere-by-ayush' ); ?></h4><p><?php esc_html_e( 'Sports, arts and clubs that build well-rounded students.', 'edusphere-by-ayush' ); ?></p></div>
			</div>
			<div class="s-feature">
				<div class="s-feature-icon">&#128101;</div>
				<div><h4><?php esc_html_e( 'Safe Community', 'edusphere-by-ayush' ); ?></h4><p><?php esc_html_e( 'A secure, inclusive and supportive environment.', 'edusphere-by-ayush' ); ?></p></div>
			</div>
		</div>
	</div>
</section>

<!-- PROGRAMS -->
<?php if ( post_type_exists( 'edu_program' ) ) :
	$programs = new WP_Query( array( 'post_type' => 'edu_program', 'posts_per_page' => 4 ) );
	if ( $programs->have_posts() ) : ?>
<section class="s-section s-section-alt">
	<div class="s-container">
		<div class="s-head">
			<span class="s-eyebrow"><?php esc_html_e( 'Academics', 'edusphere-by-ayush' ); ?></span>
			<h2><?php esc_html_e( 'Our Programs & Courses', 'edusphere-by-ayush' ); ?></h2>
			<p><?php esc_html_e( 'Structured academic pathways from early years through higher education.', 'edusphere-by-ayush' ); ?></p>
		</div>
		<div class="s-grid-4">
			<?php while ( $programs->have_posts() ) : $programs->the_post(); ?>
				<div class="s-card">
					<div class="s-card-thumb">
						<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } else { edusphere_placeholder_thumb( '&#127891;' ); } ?>
					</div>
					<div class="s-card-body">
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<p class="s-card-excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 14 ) ); ?></p>
						<div class="s-program-meta">
							<?php $level = get_post_meta( get_the_ID(), 'edu_program_level', true ); if ( $level ) : ?><span>&#127891; <?php echo esc_html( $level ); ?></span><?php endif; ?>
							<?php $dur = get_post_meta( get_the_ID(), 'edu_program_duration', true ); if ( $dur ) : ?><span>&#8987; <?php echo esc_html( $dur ); ?></span><?php endif; ?>
						</div>
					</div>
				</div>
			<?php endwhile; wp_reset_postdata(); ?>
		</div>
		<p style="text-align:center;margin-top:36px;"><a class="s-btn s-btn-navy" href="<?php echo esc_url( get_post_type_archive_link( 'edu_program' ) ); ?>"><?php esc_html_e( 'View All Programs', 'edusphere-by-ayush' ); ?></a></p>
	</div>
</section>
	<?php endif;
endif; ?>

<!-- NOTICES + EVENTS -->
<section class="s-section">
	<div class="s-container s-grid-2" style="align-items:start;">
		<?php if ( post_type_exists( 'edu_notice' ) ) :
			$notices = new WP_Query( array( 'post_type' => 'edu_notice', 'posts_per_page' => 5 ) );
			if ( $notices->have_posts() ) : ?>
			<div>
				<div class="s-head s-head-left">
					<span class="s-eyebrow"><?php esc_html_e( 'Notice Board', 'edusphere-by-ayush' ); ?></span>
					<h2><?php esc_html_e( 'Latest Notices', 'edusphere-by-ayush' ); ?></h2>
				</div>
				<ul class="s-notice-list">
					<?php while ( $notices->have_posts() ) : $notices->the_post(); ?>
						<li class="s-notice-item">
							<div class="s-notice-date">
								<strong><?php echo esc_html( get_the_date( 'd' ) ); ?></strong>
								<span><?php echo esc_html( get_the_date( 'M' ) ); ?></span>
							</div>
							<div class="s-notice-content">
								<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><?php if ( get_post_meta( get_the_ID(), 'edu_notice_important', true ) ) : ?><span class="s-notice-badge"><?php esc_html_e( 'Important', 'edusphere-by-ayush' ); ?></span><?php endif; ?></h4>
								<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 12 ) ); ?></p>
							</div>
						</li>
					<?php endwhile; wp_reset_postdata(); ?>
				</ul>
				<p style="margin-top:20px;"><a class="s-btn s-btn-outline" style="color:var(--s-navy);" href="<?php echo esc_url( get_post_type_archive_link( 'edu_notice' ) ); ?>"><?php esc_html_e( 'View All Notices', 'edusphere-by-ayush' ); ?></a></p>
			</div>
		<?php endif; endif; ?>

		<?php if ( post_type_exists( 'edu_event' ) ) :
			$events = new WP_Query( array( 'post_type' => 'edu_event', 'posts_per_page' => 3, 'meta_key' => 'edu_event_date', 'orderby' => 'meta_value', 'order' => 'ASC' ) );
			if ( $events->have_posts() ) : ?>
			<div>
				<div class="s-head s-head-left">
					<span class="s-eyebrow"><?php esc_html_e( 'What\'s Happening', 'edusphere-by-ayush' ); ?></span>
					<h2><?php esc_html_e( 'Upcoming Events', 'edusphere-by-ayush' ); ?></h2>
				</div>
				<div style="display:flex;flex-direction:column;gap:16px;">
					<?php while ( $events->have_posts() ) : $events->the_post();
						$edate = get_post_meta( get_the_ID(), 'edu_event_date', true );
						$eloc  = get_post_meta( get_the_ID(), 'edu_event_location', true );
						$etime = get_post_meta( get_the_ID(), 'edu_event_time', true );
						?>
						<div class="s-event-card">
							<div class="s-event-date-block">
								<?php if ( $edate ) : ?>
									<strong><?php echo esc_html( date_i18n( 'd', strtotime( $edate ) ) ); ?></strong>
									<span><?php echo esc_html( date_i18n( 'M', strtotime( $edate ) ) ); ?></span>
								<?php endif; ?>
							</div>
							<div class="s-event-info">
								<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
								<div class="s-event-meta">
									<?php if ( $etime ) : ?><span>&#128337; <?php echo esc_html( $etime ); ?></span><?php endif; ?>
									<?php if ( $eloc ) : ?><span>&#128205; <?php echo esc_html( $eloc ); ?></span><?php endif; ?>
								</div>
							</div>
						</div>
					<?php endwhile; wp_reset_postdata(); ?>
				</div>
				<p style="margin-top:20px;"><a class="s-btn s-btn-outline" style="color:var(--s-navy);" href="<?php echo esc_url( get_post_type_archive_link( 'edu_event' ) ); ?>"><?php esc_html_e( 'View Academic Calendar', 'edusphere-by-ayush' ); ?></a></p>
			</div>
		<?php endif; endif; ?>
	</div>
</section>

<!-- CTA BANNER -->
<section class="s-section-tight">
	<div class="s-container">
		<div class="s-cta-banner">
			<div>
				<h3><?php esc_html_e( 'Ready to Join Our School Family?', 'edusphere-by-ayush' ); ?></h3>
				<p><?php esc_html_e( 'Applications for the new academic year are now open. Limited seats available.', 'edusphere-by-ayush' ); ?></p>
			</div>
			<a class="s-btn s-btn-navy" href="<?php echo esc_url( get_theme_mod( 'edusphere_admission_link', '#' ) ); ?>"><?php esc_html_e( 'Start Application', 'edusphere-by-ayush' ); ?></a>
		</div>
	</div>
</section>

<!-- FACULTY -->
<?php if ( post_type_exists( 'edu_faculty' ) ) :
	$faculty = new WP_Query( array( 'post_type' => 'edu_faculty', 'posts_per_page' => 4 ) );
	if ( $faculty->have_posts() ) : ?>
<section class="s-section">
	<div class="s-container">
		<div class="s-head">
			<span class="s-eyebrow"><?php esc_html_e( 'Meet the Team', 'edusphere-by-ayush' ); ?></span>
			<h2><?php esc_html_e( 'Our Dedicated Faculty', 'edusphere-by-ayush' ); ?></h2>
		</div>
		<div class="s-grid-4">
			<?php while ( $faculty->have_posts() ) : $faculty->the_post(); ?>
				<div class="s-card s-faculty-card">
					<div class="s-card-thumb">
						<?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'edusphere-square' ); } else { edusphere_placeholder_thumb( '&#128100;' ); } ?>
					</div>
					<div class="s-card-body">
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<div class="s-faculty-role"><?php echo esc_html( get_post_meta( get_the_ID(), 'edu_faculty_designation', true ) ); ?></div>
					</div>
				</div>
			<?php endwhile; wp_reset_postdata(); ?>
		</div>
	</div>
</section>
	<?php endif;
endif; ?>

<!-- TESTIMONIALS -->
<?php if ( post_type_exists( 'edu_testimonial' ) ) :
	$testimonials = new WP_Query( array( 'post_type' => 'edu_testimonial', 'posts_per_page' => 3 ) );
	if ( $testimonials->have_posts() ) : ?>
<section class="s-section s-section-navy">
	<div class="s-container">
		<div class="s-head">
			<span class="s-eyebrow" style="background:rgba(255,255,255,.12);color:var(--s-gold);"><?php esc_html_e( 'Testimonials', 'edusphere-by-ayush' ); ?></span>
			<h2><?php esc_html_e( 'What Our Community Says', 'edusphere-by-ayush' ); ?></h2>
		</div>
		<div class="s-grid-3">
			<?php while ( $testimonials->have_posts() ) : $testimonials->the_post(); ?>
				<div class="s-testimonial">
					<?php edusphere_star_rating( get_post_meta( get_the_ID(), 'edu_testimonial_rating', true ) ); ?>
					<p class="s-testimonial-quote">&ldquo;<?php echo esc_html( wp_strip_all_tags( get_the_content() ) ); ?>&rdquo;</p>
					<div class="s-testimonial-person">
						<?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'thumbnail' ); } ?>
						<div>
							<strong><?php the_title(); ?></strong>
							<span><?php echo esc_html( get_post_meta( get_the_ID(), 'edu_testimonial_role', true ) ); ?></span>
						</div>
					</div>
				</div>
			<?php endwhile; wp_reset_postdata(); ?>
		</div>
	</div>
</section>
	<?php endif;
endif; ?>

<!-- LATEST NEWS / BLOG -->
<?php
$news = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 3 ) );
if ( $news->have_posts() ) : ?>
<section class="s-section s-section-alt">
	<div class="s-container">
		<div class="s-head">
			<span class="s-eyebrow"><?php esc_html_e( 'From the Blog', 'edusphere-by-ayush' ); ?></span>
			<h2><?php esc_html_e( 'Latest News & Stories', 'edusphere-by-ayush' ); ?></h2>
		</div>
		<div class="s-grid-3">
			<?php while ( $news->have_posts() ) : $news->the_post(); ?>
				<div class="s-card">
					<div class="s-card-thumb">
						<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } else { edusphere_placeholder_thumb( '&#128240;' ); } ?>
					</div>
					<div class="s-card-body">
						<div class="s-card-meta"><span><?php echo esc_html( get_the_date() ); ?></span></div>
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<p class="s-card-excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 14 ) ); ?></p>
					</div>
				</div>
			<?php endwhile; wp_reset_postdata(); ?>
		</div>
	</div>
</section>
<?php endif; ?>

<?php get_footer(); ?>
