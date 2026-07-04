<?php
/**
 * The header for EduSphere by Ayush
 *
 * @package EduSphere_By_Ayush
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

	<div class="s-topbar">
		<div class="s-container s-topbar-inner">
			<div class="s-topbar-info">
				<?php if ( get_theme_mod( 'edusphere_phone' ) ) : ?>
					<a href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', get_theme_mod( 'edusphere_phone' ) ) ); ?>">&#128222; <?php echo esc_html( get_theme_mod( 'edusphere_phone' ) ); ?></a>
				<?php endif; ?>
				<?php if ( get_theme_mod( 'edusphere_email' ) ) : ?>
					<a href="mailto:<?php echo esc_attr( get_theme_mod( 'edusphere_email' ) ); ?>">&#9993; <?php echo esc_html( get_theme_mod( 'edusphere_email' ) ); ?></a>
				<?php endif; ?>
				<?php if ( get_theme_mod( 'edusphere_address' ) ) : ?>
					<span>&#128205; <?php echo esc_html( get_theme_mod( 'edusphere_address' ) ); ?></span>
				<?php endif; ?>
			</div>
			<div class="s-topbar-right">
				<?php if ( has_nav_menu( 'topbar' ) ) : ?>
					<?php wp_nav_menu( array( 'theme_location' => 'topbar', 'container' => false, 'menu_class' => '', 'depth' => 1, 'items_wrap' => '<div class="s-topbar-links">%3$s</div>' ) ); ?>
				<?php endif; ?>
				<div class="s-topbar-socials">
					<?php
					$socials = array(
						'edusphere_facebook'  => '&#402;',
						'edusphere_twitter'   => '&#120143;',
						'edusphere_instagram' => '&#9679;',
						'edusphere_youtube'   => '&#9654;',
					);
					foreach ( $socials as $mod => $icon ) :
						$url = get_theme_mod( $mod );
						if ( $url ) : ?>
							<a href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr( $mod ); ?>"><?php echo $icon; ?></a>
						<?php endif;
					endforeach; ?>
				</div>
			</div>
		</div>
	</div>

	<header id="masthead" class="s-site-header">
		<div class="s-container s-header-inner">
			<div class="s-logo-wrap">
				<?php if ( has_custom_logo() ) :
					the_custom_logo();
				else : ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="s-logo">
						<?php echo edusphere_school_icon(); ?>
						<span>
							<?php bloginfo( 'name' ); ?>
							<?php $desc = get_bloginfo( 'description', 'display' ); if ( $desc ) : ?>
								<span class="s-logo-sub"><?php echo esc_html( $desc ); ?></span>
							<?php endif; ?>
						</span>
					</a>
				<?php endif; ?>
			</div>

			<nav id="site-navigation" class="s-primary-nav">
				<?php wp_nav_menu( array(
					'theme_location' => 'primary',
					'container'      => false,
					'menu_id'        => 'primary-menu',
					'fallback_cb'    => 'edusphere_fallback_menu',
				) ); ?>
			</nav>

			<div class="s-header-actions">
				<button class="s-search-toggle" aria-label="<?php esc_attr_e( 'Toggle search', 'edusphere-by-ayush' ); ?>" aria-expanded="false">&#128269;</button>
				<?php if ( get_theme_mod( 'edusphere_admission_link' ) ) : ?>
					<a class="s-btn s-btn-sm" href="<?php echo esc_url( get_theme_mod( 'edusphere_admission_link' ) ); ?>"><?php esc_html_e( 'Apply Now', 'edusphere-by-ayush' ); ?></a>
				<?php endif; ?>
				<button class="s-menu-toggle" aria-label="<?php esc_attr_e( 'Toggle menu', 'edusphere-by-ayush' ); ?>" aria-expanded="false" aria-controls="site-navigation">&#9776;</button>
			</div>
		</div>

		<div class="s-search-panel">
			<div class="s-container">
				<?php get_search_form(); ?>
			</div>
		</div>
	</header>

	<?php
	$important_notices = new WP_Query( array(
		'post_type'      => 'edu_notice',
		'posts_per_page' => 6,
		'meta_key'       => 'edu_notice_important',
		'meta_value'     => '1',
	) );
	if ( $important_notices->have_posts() ) : ?>
		<div class="s-ticker">
			<div class="s-container s-ticker-inner">
				<span class="s-ticker-label"><?php esc_html_e( 'Notices', 'edusphere-by-ayush' ); ?></span>
				<div class="s-ticker-track">
					<div class="s-ticker-list">
						<?php while ( $important_notices->have_posts() ) : $important_notices->the_post(); ?>
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						<?php endwhile; ?>
						<?php $important_notices->rewind_posts(); while ( $important_notices->have_posts() ) : $important_notices->the_post(); ?>
							<a href="<?php the_permalink(); ?>" aria-hidden="true"><?php the_title(); ?></a>
						<?php endwhile; wp_reset_postdata(); ?>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<div id="content" class="site-content">
