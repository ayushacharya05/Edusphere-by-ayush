<?php
/**
 * EduSphere by Ayush - Theme Functions
 *
 * @package EduSphere_By_Ayush
 * @author  Ayush Acharya
 * @link    https://ayushacharya.info.np
 * @support contact@ayushacharya.np.np
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'EDUSPHERE_VERSION', '1.0.0' );
define( 'EDUSPHERE_SUPPORT_EMAIL', 'contact@ayushacharya.info.np' );
define( 'EDUSPHERE_THEME_WEBSITE', 'https://ayushacharya.info.np' );

/* =========================================================
   1. THEME SETUP
========================================================= */
function edusphere_setup() {
	load_theme_textdomain( 'edusphere-by-ayush', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'custom-logo', array( 'height' => 60, 'width' => 220, 'flex-height' => true, 'flex-width' => true ) );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'customize-selective-refresh-widgets' );

	set_post_thumbnail_size( 800, 500, true );
	add_image_size( 'edusphere-square', 500, 500, true );
	add_image_size( 'edusphere-wide', 1400, 700, true );

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'edusphere-by-ayush' ),
		'topbar'  => __( 'Top Bar Menu', 'edusphere-by-ayush' ),
		'footer'  => __( 'Footer Menu', 'edusphere-by-ayush' ),
	) );
}
add_action( 'after_setup_theme', 'edusphere_setup' );

function edusphere_content_width() {
	$GLOBALS['content_width'] = 800;
}
add_action( 'after_setup_theme', 'edusphere_content_width', 0 );

/* =========================================================
   2. SCRIPTS & STYLES
========================================================= */
function edusphere_scripts() {
	wp_enqueue_style( 'edusphere-google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700;800&family=Inter:wght@400;500;600;700&display=swap', array(), null );
	wp_enqueue_style( 'edusphere-style', get_stylesheet_uri(), array(), EDUSPHERE_VERSION );
	wp_enqueue_script( 'edusphere-main', get_template_directory_uri() . '/js/main.js', array(), EDUSPHERE_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'edusphere_scripts' );

/* =========================================================
   3. WIDGET AREAS
========================================================= */
function edusphere_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog / Page Sidebar', 'edusphere-by-ayush' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	foreach ( array( 1, 2, 3, 4 ) as $i ) {
		register_sidebar( array(
			'name'          => sprintf( __( 'Footer Column %d', 'edusphere-by-ayush' ), $i ),
			'id'            => 'footer-' . $i,
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );
	}
}
add_action( 'widgets_init', 'edusphere_widgets_init' );

/* =========================================================
   4. CUSTOM POST TYPES: Notices, Events, Faculty, Programs, Testimonials
========================================================= */
function edusphere_register_cpts() {

	register_post_type( 'edu_notice', array(
		'labels' => array(
			'name' => __( 'Notices', 'edusphere-by-ayush' ), 'singular_name' => __( 'Notice', 'edusphere-by-ayush' ),
			'add_new_item' => __( 'Add New Notice', 'edusphere-by-ayush' ), 'menu_name' => __( 'Notices', 'edusphere-by-ayush' ),
		),
		'public' => true, 'menu_icon' => 'dashicons-megaphone', 'has_archive' => true,
		'rewrite' => array( 'slug' => 'notices' ), 'show_in_rest' => true,
		'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
	) );

	register_post_type( 'edu_event', array(
		'labels' => array(
			'name' => __( 'Events', 'edusphere-by-ayush' ), 'singular_name' => __( 'Event', 'edusphere-by-ayush' ),
			'add_new_item' => __( 'Add New Event', 'edusphere-by-ayush' ), 'menu_name' => __( 'Events', 'edusphere-by-ayush' ),
		),
		'public' => true, 'menu_icon' => 'dashicons-calendar-alt', 'has_archive' => true,
		'rewrite' => array( 'slug' => 'events' ), 'show_in_rest' => true,
		'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
	) );

	register_post_type( 'edu_faculty', array(
		'labels' => array(
			'name' => __( 'Faculty & Staff', 'edusphere-by-ayush' ), 'singular_name' => __( 'Faculty Member', 'edusphere-by-ayush' ),
			'add_new_item' => __( 'Add New Faculty Member', 'edusphere-by-ayush' ), 'menu_name' => __( 'Faculty', 'edusphere-by-ayush' ),
		),
		'public' => true, 'menu_icon' => 'dashicons-groups', 'has_archive' => true,
		'rewrite' => array( 'slug' => 'faculty' ), 'show_in_rest' => true,
		'supports' => array( 'title', 'editor', 'thumbnail' ),
	) );

	register_post_type( 'edu_program', array(
		'labels' => array(
			'name' => __( 'Programs & Courses', 'edusphere-by-ayush' ), 'singular_name' => __( 'Program', 'edusphere-by-ayush' ),
			'add_new_item' => __( 'Add New Program', 'edusphere-by-ayush' ), 'menu_name' => __( 'Programs', 'edusphere-by-ayush' ),
		),
		'public' => true, 'menu_icon' => 'dashicons-welcome-learn-more', 'has_archive' => true,
		'rewrite' => array( 'slug' => 'programs' ), 'show_in_rest' => true,
		'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
	) );

	register_post_type( 'edu_testimonial', array(
		'labels' => array(
			'name' => __( 'Testimonials', 'edusphere-by-ayush' ), 'singular_name' => __( 'Testimonial', 'edusphere-by-ayush' ),
			'add_new_item' => __( 'Add New Testimonial', 'edusphere-by-ayush' ), 'menu_name' => __( 'Testimonials', 'edusphere-by-ayush' ),
		),
		'public' => true, 'menu_icon' => 'dashicons-format-quote', 'has_archive' => false,
		'rewrite' => array( 'slug' => 'testimonials' ), 'show_in_rest' => true,
		'supports' => array( 'title', 'editor', 'thumbnail' ),
	) );

	register_taxonomy( 'edu_department', array( 'edu_faculty', 'edu_program' ), array(
		'labels' => array( 'name' => __( 'Departments', 'edusphere-by-ayush' ), 'singular_name' => __( 'Department', 'edusphere-by-ayush' ) ),
		'hierarchical' => true, 'show_in_rest' => true, 'rewrite' => array( 'slug' => 'department' ),
	) );

	register_taxonomy( 'edu_notice_category', array( 'edu_notice' ), array(
		'labels' => array( 'name' => __( 'Notice Categories', 'edusphere-by-ayush' ), 'singular_name' => __( 'Notice Category', 'edusphere-by-ayush' ) ),
		'hierarchical' => true, 'show_in_rest' => true, 'rewrite' => array( 'slug' => 'notice-category' ),
	) );
}
add_action( 'init', 'edusphere_register_cpts' );

/* =========================================================
   5. META BOXES (simple custom fields, no ACF dependency)
========================================================= */
function edusphere_add_meta_boxes() {
	add_meta_box( 'edu_event_details', __( 'Event Details', 'edusphere-by-ayush' ), 'edusphere_event_meta_box', 'edu_event', 'side', 'default' );
	add_meta_box( 'edu_faculty_details', __( 'Faculty Details', 'edusphere-by-ayush' ), 'edusphere_faculty_meta_box', 'edu_faculty', 'side', 'default' );
	add_meta_box( 'edu_program_details', __( 'Program Details', 'edusphere-by-ayush' ), 'edusphere_program_meta_box', 'edu_program', 'side', 'default' );
	add_meta_box( 'edu_testimonial_details', __( 'Testimonial Details', 'edusphere-by-ayush' ), 'edusphere_testimonial_meta_box', 'edu_testimonial', 'side', 'default' );
	add_meta_box( 'edu_notice_details', __( 'Notice Details', 'edusphere-by-ayush' ), 'edusphere_notice_meta_box', 'edu_notice', 'side', 'default' );
}
add_action( 'add_meta_boxes', 'edusphere_add_meta_boxes' );

function edusphere_field_row( $id, $label, $value, $type = 'text' ) {
	echo '<p><label for="' . esc_attr( $id ) . '"><strong>' . esc_html( $label ) . '</strong></label><br />';
	if ( $type === 'textarea' ) {
		echo '<textarea style="width:100%;" id="' . esc_attr( $id ) . '" name="' . esc_attr( $id ) . '">' . esc_textarea( $value ) . '</textarea>';
	} else {
		echo '<input style="width:100%;" type="' . esc_attr( $type ) . '" id="' . esc_attr( $id ) . '" name="' . esc_attr( $id ) . '" value="' . esc_attr( $value ) . '" />';
	}
	echo '</p>';
}

function edusphere_event_meta_box( $post ) {
	wp_nonce_field( 'edusphere_save_meta', 'edusphere_meta_nonce' );
	edusphere_field_row( 'edu_event_date', __( 'Event Date', 'edusphere-by-ayush' ), get_post_meta( $post->ID, 'edu_event_date', true ), 'date' );
	edusphere_field_row( 'edu_event_time', __( 'Event Time', 'edusphere-by-ayush' ), get_post_meta( $post->ID, 'edu_event_time', true ), 'text' );
	edusphere_field_row( 'edu_event_location', __( 'Location', 'edusphere-by-ayush' ), get_post_meta( $post->ID, 'edu_event_location', true ), 'text' );
}

function edusphere_faculty_meta_box( $post ) {
	wp_nonce_field( 'edusphere_save_meta', 'edusphere_meta_nonce' );
	edusphere_field_row( 'edu_faculty_designation', __( 'Designation', 'edusphere-by-ayush' ), get_post_meta( $post->ID, 'edu_faculty_designation', true ) );
	edusphere_field_row( 'edu_faculty_qualification', __( 'Qualification', 'edusphere-by-ayush' ), get_post_meta( $post->ID, 'edu_faculty_qualification', true ) );
	edusphere_field_row( 'edu_faculty_email', __( 'Email', 'edusphere-by-ayush' ), get_post_meta( $post->ID, 'edu_faculty_email', true ), 'email' );
	edusphere_field_row( 'edu_faculty_linkedin', __( 'LinkedIn URL', 'edusphere-by-ayush' ), get_post_meta( $post->ID, 'edu_faculty_linkedin', true ), 'url' );
}

function edusphere_program_meta_box( $post ) {
	wp_nonce_field( 'edusphere_save_meta', 'edusphere_meta_nonce' );
	edusphere_field_row( 'edu_program_duration', __( 'Duration', 'edusphere-by-ayush' ), get_post_meta( $post->ID, 'edu_program_duration', true ) );
	edusphere_field_row( 'edu_program_level', __( 'Level (e.g. Grade 1-10, Bachelor)', 'edusphere-by-ayush' ), get_post_meta( $post->ID, 'edu_program_level', true ) );
	edusphere_field_row( 'edu_program_seats', __( 'Seats Available', 'edusphere-by-ayush' ), get_post_meta( $post->ID, 'edu_program_seats', true ) );
}

function edusphere_testimonial_meta_box( $post ) {
	wp_nonce_field( 'edusphere_save_meta', 'edusphere_meta_nonce' );
	edusphere_field_row( 'edu_testimonial_role', __( 'Role (e.g. Parent, Alumni, Student)', 'edusphere-by-ayush' ), get_post_meta( $post->ID, 'edu_testimonial_role', true ) );
	edusphere_field_row( 'edu_testimonial_rating', __( 'Rating (1-5)', 'edusphere-by-ayush' ), get_post_meta( $post->ID, 'edu_testimonial_rating', true ), 'number' );
}

function edusphere_notice_meta_box( $post ) {
	wp_nonce_field( 'edusphere_save_meta', 'edusphere_meta_nonce' );
	echo '<p><label><input type="checkbox" name="edu_notice_important" value="1" ' . checked( get_post_meta( $post->ID, 'edu_notice_important', true ), '1', false ) . ' /> ' . esc_html__( 'Mark as Important', 'edusphere-by-ayush' ) . '</label></p>';
	edusphere_field_row( 'edu_notice_file', __( 'Attachment URL (PDF link, optional)', 'edusphere-by-ayush' ), get_post_meta( $post->ID, 'edu_notice_file', true ), 'url' );
}

function edusphere_save_meta_boxes( $post_id ) {
	if ( ! isset( $_POST['edusphere_meta_nonce'] ) || ! wp_verify_nonce( $_POST['edusphere_meta_nonce'], 'edusphere_save_meta' ) ) return;
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	$fields = array(
		'edu_event_date', 'edu_event_time', 'edu_event_location',
		'edu_faculty_designation', 'edu_faculty_qualification', 'edu_faculty_email', 'edu_faculty_linkedin',
		'edu_program_duration', 'edu_program_level', 'edu_program_seats',
		'edu_testimonial_role', 'edu_testimonial_rating',
		'edu_notice_file',
	);
	foreach ( $fields as $field ) {
		if ( isset( $_POST[ $field ] ) ) {
			update_post_meta( $post_id, $field, sanitize_text_field( $_POST[ $field ] ) );
		}
	}
	update_post_meta( $post_id, 'edu_notice_important', isset( $_POST['edu_notice_important'] ) ? '1' : '' );
}
add_action( 'save_post', 'edusphere_save_meta_boxes' );

/* =========================================================
   6. HELPERS
========================================================= */
function edusphere_excerpt_length( $length ) { return 22; }
add_filter( 'excerpt_length', 'edusphere_excerpt_length' );

function edusphere_excerpt_more( $more ) { return '&hellip;'; }
add_filter( 'excerpt_more', 'edusphere_excerpt_more' );

function edusphere_breadcrumbs() {
	echo '<nav class="s-breadcrumbs" aria-label="Breadcrumb"><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', 'edusphere-by-ayush' ) . '</a>';
	if ( is_singular() ) {
		$post_type = get_post_type();
		if ( $post_type !== 'post' && $post_type !== 'page' ) {
			$pto = get_post_type_object( $post_type );
			if ( $pto && $pto->has_archive ) {
				echo ' &rsaquo; <a href="' . esc_url( get_post_type_archive_link( $post_type ) ) . '">' . esc_html( $pto->labels->name ) . '</a>';
			}
		}
		echo ' &rsaquo; ' . esc_html( get_the_title() );
	} elseif ( is_post_type_archive() ) {
		echo ' &rsaquo; ' . esc_html( post_type_archive_title( '', false ) );
	} elseif ( is_category() || is_tag() || is_tax() ) {
		echo ' &rsaquo; ' . esc_html( single_term_title( '', false ) );
	} elseif ( is_search() ) {
		echo ' &rsaquo; ' . esc_html__( 'Search Results', 'edusphere-by-ayush' );
	} elseif ( is_404() ) {
		echo ' &rsaquo; ' . esc_html__( '404', 'edusphere-by-ayush' );
	}
	echo '</nav>';
}

function edusphere_star_rating( $rating ) {
	$rating = max( 1, min( 5, intval( $rating ) ? intval( $rating ) : 5 ) );
	echo '<div class="s-stars">' . str_repeat( '&#9733;', $rating ) . str_repeat( '&#9734;', 5 - $rating ) . '</div>';
}

function edusphere_pagination() {
	the_posts_pagination( array(
		'mid_size'  => 1,
		'prev_text' => __( '&larr; Prev', 'edusphere-by-ayush' ),
		'next_text' => __( 'Next &rarr;', 'edusphere-by-ayush' ),
		'class'     => 's-pagination',
	) );
}

/* =========================================================
   7. CUSTOMIZER: contact info, social links, footer text
========================================================= */
function edusphere_customize_register( $wp_customize ) {
	$wp_customize->add_section( 'edusphere_contact', array( 'title' => __( 'School Contact Info', 'edusphere-by-ayush' ), 'priority' => 30 ) );

	$fields = array(
		'edusphere_phone'    => __( 'Phone Number', 'edusphere-by-ayush' ),
		'edusphere_email'    => __( 'Contact Email', 'edusphere-by-ayush' ),
		'edusphere_address'  => __( 'Address', 'edusphere-by-ayush' ),
		'edusphere_facebook' => __( 'Facebook URL', 'edusphere-by-ayush' ),
		'edusphere_twitter'  => __( 'Twitter / X URL', 'edusphere-by-ayush' ),
		'edusphere_instagram'=> __( 'Instagram URL', 'edusphere-by-ayush' ),
		'edusphere_youtube'  => __( 'YouTube URL', 'edusphere-by-ayush' ),
		'edusphere_admission_link' => __( 'Admissions Page URL', 'edusphere-by-ayush' ),
	);
	foreach ( $fields as $id => $label ) {
		$wp_customize->add_setting( $id, array( 'default' => '', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( $id, array( 'label' => $label, 'section' => 'edusphere_contact', 'type' => 'text' ) );
	}
}
add_action( 'customize_register', 'edusphere_customize_register' );

/* =========================================================
   8. MISC
========================================================= */
function edusphere_placeholder_thumb( $icon = '&#127891;' ) {
	echo '<div class="s-thumb-placeholder"><span>' . $icon . '</span></div>';
}

function edusphere_footer_credit() {
	printf(
		esc_html__( '&copy; %d EduSphere by Ayush. All rights reserved.', 'edusphere-by-ayush' ),
		date_i18n( 'Y' )
	);
}

function edusphere_admin_footer_text( $text ) {
	return sprintf(
		/* translators: %s: theme name */
		__( 'Thank you for using %s &mdash; developed by Ayush Acharya. Need help? Email %s or visit %s.', 'edusphere-by-ayush' ),
		'<strong>EduSphere by Ayush</strong>',
		'<a href="mailto:' . esc_attr( EDUSPHERE_SUPPORT_EMAIL ) . '">' . esc_html( EDUSPHERE_SUPPORT_EMAIL ) . '</a>',
		'<a href="' . esc_url( EDUSPHERE_THEME_WEBSITE ) . '" target="_blank" rel="noopener">' . esc_html( str_replace( array( 'https://', 'http://' ), '', EDUSPHERE_THEME_WEBSITE ) ) . '</a>'
	);
}
add_filter( 'admin_footer_text', 'edusphere_admin_footer_text' );

function edusphere_body_classes( $classes ) {
	if ( is_front_page() ) $classes[] = 'is-front-page';
	return $classes;
}
add_filter( 'body_class', 'edusphere_body_classes' );

function edusphere_school_icon() {
	return '<svg width="34" height="34" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M12 2L1 8L12 14L21 9.09V16H23V8L12 2Z" fill="#d9a441"/><path d="M5 10.91V16.91C5 19.36 8.13 21.5 12 21.5C15.87 21.5 19 19.36 19 16.91V10.91L12 14.68L5 10.91Z" fill="#0d2c54"/></svg>';
}

function edusphere_fallback_menu() {
	echo '<ul id="primary-menu"><li><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', 'edusphere-by-ayush' ) . '</a></li>';
	if ( post_type_exists( 'edu_program' ) ) echo '<li><a href="' . esc_url( get_post_type_archive_link( 'edu_program' ) ) . '">' . esc_html__( 'Programs', 'edusphere-by-ayush' ) . '</a></li>';
	if ( post_type_exists( 'edu_faculty' ) ) echo '<li><a href="' . esc_url( get_post_type_archive_link( 'edu_faculty' ) ) . '">' . esc_html__( 'Faculty', 'edusphere-by-ayush' ) . '</a></li>';
	if ( post_type_exists( 'edu_notice' ) ) echo '<li><a href="' . esc_url( get_post_type_archive_link( 'edu_notice' ) ) . '">' . esc_html__( 'Notices', 'edusphere-by-ayush' ) . '</a></li>';
	if ( post_type_exists( 'edu_event' ) ) echo '<li><a href="' . esc_url( get_post_type_archive_link( 'edu_event' ) ) . '">' . esc_html__( 'Events', 'edusphere-by-ayush' ) . '</a></li>';
	echo '<li><a href="' . esc_url( home_url( '/blog' ) ) . '">' . esc_html__( 'Blog', 'edusphere-by-ayush' ) . '</a></li></ul>';
}

require get_template_directory() . '/inc/demo-content.php';
