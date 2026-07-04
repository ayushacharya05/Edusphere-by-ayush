	</div><!-- #content -->

	<footer id="colophon" class="s-site-footer">
		<div class="s-container s-footer-top">
			<div class="s-footer-brand">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="s-logo">
					<?php echo edusphere_school_icon(); ?>
					<span><?php bloginfo( 'name' ); ?></span>
				</a>
				<p>
					<?php
					$tagline = get_bloginfo( 'description', 'display' );
					echo $tagline ? esc_html( $tagline ) : esc_html__( 'Empowering students with quality education, strong values and future-ready skills.', 'edusphere-by-ayush' );
					?>
				</p>
				<div class="s-footer-socials">
					<?php
					$socials = array( 'edusphere_facebook' => 'f', 'edusphere_twitter' => 'x', 'edusphere_instagram' => 'ig', 'edusphere_youtube' => 'yt' );
					foreach ( $socials as $mod => $label ) :
						$url = get_theme_mod( $mod );
						if ( $url ) : ?>
							<a href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr( $label ); ?>"><?php echo esc_html( $label ); ?></a>
						<?php endif;
					endforeach; ?>
				</div>
			</div>

			<div class="s-footer-col">
				<h4><?php esc_html_e( 'Quick Links', 'edusphere-by-ayush' ); ?></h4>
				<?php if ( has_nav_menu( 'footer' ) ) :
					wp_nav_menu( array( 'theme_location' => 'footer', 'container' => false, 'menu_class' => '', 'depth' => 1 ) );
				else : ?>
					<ul>
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'edusphere-by-ayush' ); ?></a></li>
						<?php if ( post_type_exists( 'edu_program' ) ) : ?><li><a href="<?php echo esc_url( get_post_type_archive_link( 'edu_program' ) ); ?>"><?php esc_html_e( 'Admissions', 'edusphere-by-ayush' ); ?></a></li><?php endif; ?>
						<?php if ( post_type_exists( 'edu_notice' ) ) : ?><li><a href="<?php echo esc_url( get_post_type_archive_link( 'edu_notice' ) ); ?>"><?php esc_html_e( 'Notice Board', 'edusphere-by-ayush' ); ?></a></li><?php endif; ?>
						<?php if ( post_type_exists( 'edu_faculty' ) ) : ?><li><a href="<?php echo esc_url( get_post_type_archive_link( 'edu_faculty' ) ); ?>"><?php esc_html_e( 'Faculty', 'edusphere-by-ayush' ); ?></a></li><?php endif; ?>
						<li><a href="<?php echo esc_url( home_url( '/blog' ) ); ?>"><?php esc_html_e( 'Blog / News', 'edusphere-by-ayush' ); ?></a></li>
					</ul>
				<?php endif; ?>
			</div>

			<div class="s-footer-col">
				<h4><?php esc_html_e( 'Contact', 'edusphere-by-ayush' ); ?></h4>
				<ul class="s-footer-contact">
					<?php if ( get_theme_mod( 'edusphere_address' ) ) : ?><li>&#128205; <?php echo esc_html( get_theme_mod( 'edusphere_address' ) ); ?></li><?php endif; ?>
					<?php if ( get_theme_mod( 'edusphere_phone' ) ) : ?><li>&#128222; <a href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', get_theme_mod( 'edusphere_phone' ) ) ); ?>"><?php echo esc_html( get_theme_mod( 'edusphere_phone' ) ); ?></a></li><?php endif; ?>
					<?php if ( get_theme_mod( 'edusphere_email' ) ) : ?><li>&#9993; <a href="mailto:<?php echo esc_attr( get_theme_mod( 'edusphere_email' ) ); ?>"><?php echo esc_html( get_theme_mod( 'edusphere_email' ) ); ?></a></li><?php endif; ?>
				</ul>
			</div>

			<div class="s-footer-col">
				<h4><?php esc_html_e( 'Stay Updated', 'edusphere-by-ayush' ); ?></h4>
				<p style="color:#aebbd1;font-size:.88rem;"><?php esc_html_e( 'Subscribe to receive the latest notices and events in your inbox.', 'edusphere-by-ayush' ); ?></p>
				<form class="s-newsletter-form" onsubmit="return false;">
					<input type="email" placeholder="<?php esc_attr_e( 'Your email address', 'edusphere-by-ayush' ); ?>" required />
					<button type="submit"><?php esc_html_e( 'Join', 'edusphere-by-ayush' ); ?></button>
				</form>
			</div>
		</div>

		<div class="s-container s-footer-bottom">
			<span><?php edusphere_footer_credit(); ?></span>
			<span>
				<?php esc_html_e( 'Theme support:', 'edusphere-by-ayush' ); ?>
				<a href="mailto:<?php echo esc_attr( EDUSPHERE_SUPPORT_EMAIL ); ?>"><?php echo esc_html( EDUSPHERE_SUPPORT_EMAIL ); ?></a>
				&middot;
				<a href="<?php echo esc_url( EDUSPHERE_THEME_WEBSITE ); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html( str_replace( array( 'https://', 'http://' ), '', EDUSPHERE_THEME_WEBSITE ) ); ?></a>
			</span>
		</div>
	</footer>
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
