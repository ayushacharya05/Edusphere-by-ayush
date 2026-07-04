<?php
/**
 * 404 error template - EduSphere by Ayush
 *
 * @package EduSphere_By_Ayush
 */
get_header(); ?>

<div class="s-container">
	<div class="s-error-page">
		<div class="s-code">404</div>
		<h1><?php esc_html_e( 'Page Not Found', 'edusphere-by-ayush' ); ?></h1>
		<p style="color:var(--s-text-muted);max-width:480px;margin:0 auto 26px;"><?php esc_html_e( 'The page you are looking for might have been moved or no longer exists.', 'edusphere-by-ayush' ); ?></p>
		<div style="max-width:420px;margin:0 auto 30px;"><?php get_search_form(); ?></div>
		<a class="s-btn s-btn-navy" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back to Homepage', 'edusphere-by-ayush' ); ?></a>
	</div>
</div>

<?php get_footer(); ?>
