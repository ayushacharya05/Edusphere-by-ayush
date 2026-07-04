<?php
/**
 * One-click demo content installer for EduSphere by Ayush.
 * Adds a "EduSphere Setup" admin page under Appearance to seed
 * sample Notices, Events, Faculty, Programs and Testimonials
 * so a new install doesn't look empty.
 *
 * @package EduSphere_By_Ayush
 */

if ( ! defined( 'ABSPATH' ) ) exit;

function edusphere_add_setup_page() {
	add_theme_page(
		__( 'EduSphere Setup', 'edusphere-by-ayush' ),
		__( 'EduSphere Setup', 'edusphere-by-ayush' ),
		'manage_options',
		'edusphere-setup',
		'edusphere_render_setup_page'
	);
}
add_action( 'admin_menu', 'edusphere_add_setup_page' );

function edusphere_render_setup_page() {
	if ( isset( $_POST['edusphere_install_demo'] ) && check_admin_referer( 'edusphere_install_demo_action' ) ) {
		edusphere_install_demo_content();
		echo '<div class="notice notice-success"><p>' . esc_html__( 'Demo content installed! Visit your homepage to see it in action.', 'edusphere-by-ayush' ) . '</p></div>';
	}
	?>
	<div class="wrap">
		<h1><?php esc_html_e( 'EduSphere by Ayush &mdash; Quick Setup', 'edusphere-by-ayush' ); ?></h1>
		<p><?php esc_html_e( 'Welcome! This will create sample Notices, Events, Faculty, Programs and Testimonials so you can see the theme fully populated. You can edit or delete these anytime from their respective menus.', 'edusphere-by-ayush' ); ?></p>
		<form method="post">
			<?php wp_nonce_field( 'edusphere_install_demo_action' ); ?>
			<p><button type="submit" name="edusphere_install_demo" class="button button-primary"><?php esc_html_e( 'Install Sample Content', 'edusphere-by-ayush' ); ?></button></p>
		</form>
		<hr />
		<p>
			<?php esc_html_e( 'Need help setting up your site?', 'edusphere-by-ayush' ); ?>
			<a href="mailto:<?php echo esc_attr( EDUSPHERE_SUPPORT_EMAIL ); ?>"><?php echo esc_html( EDUSPHERE_SUPPORT_EMAIL ); ?></a>
			&middot;
			<a href="<?php echo esc_url( EDUSPHERE_THEME_WEBSITE ); ?>" target="_blank" rel="noopener"><?php echo esc_html( EDUSPHERE_THEME_WEBSITE ); ?></a>
		</p>
	</div>
	<?php
}

function edusphere_install_demo_content() {

	// Notices
	$notices = array(
		array( 'title' => 'Admissions Open for Academic Year 2026-27', 'important' => true ),
		array( 'title' => 'Mid-Term Examination Routine Published', 'important' => true ),
		array( 'title' => 'Annual Sports Week Registration Now Open', 'important' => false ),
		array( 'title' => 'Parent-Teacher Meeting Scheduled', 'important' => false ),
		array( 'title' => 'Library Hours Extended During Exam Season', 'important' => false ),
	);
	foreach ( $notices as $n ) {
		$id = wp_insert_post( array(
			'post_title'   => $n['title'],
			'post_content' => 'Please find the complete details regarding this notice from the school administration office or download the attached circular.',
			'post_status'  => 'publish',
			'post_type'    => 'edu_notice',
		) );
		if ( $id && ! is_wp_error( $id ) && $n['important'] ) {
			update_post_meta( $id, 'edu_notice_important', '1' );
		}
	}

	// Events
	$events = array(
		array( 'title' => 'Annual Science Exhibition', 'date' => date( 'Y-m-d', strtotime( '+10 days' ) ), 'location' => 'Main Auditorium' ),
		array( 'title' => 'Inter-School Debate Competition', 'date' => date( 'Y-m-d', strtotime( '+20 days' ) ), 'location' => 'Conference Hall' ),
		array( 'title' => 'Graduation Ceremony 2026', 'date' => date( 'Y-m-d', strtotime( '+45 days' ) ), 'location' => 'Campus Ground' ),
	);
	foreach ( $events as $e ) {
		$id = wp_insert_post( array(
			'post_title'   => $e['title'],
			'post_content' => 'Join us for this exciting event. All students, parents and faculty members are cordially invited to attend.',
			'post_status'  => 'publish',
			'post_type'    => 'edu_event',
		) );
		if ( $id && ! is_wp_error( $id ) ) {
			update_post_meta( $id, 'edu_event_date', $e['date'] );
			update_post_meta( $id, 'edu_event_time', '10:00 AM' );
			update_post_meta( $id, 'edu_event_location', $e['location'] );
		}
	}

	// Faculty
	$faculty = array(
		array( 'name' => 'Dr. Sarah Mitchell', 'role' => 'Principal', 'dept' => 'Administration' ),
		array( 'name' => 'Prof. Daniel Reed', 'role' => 'Head of Science Dept.', 'dept' => 'Science' ),
		array( 'name' => 'Ms. Priya Sharma', 'role' => 'Senior Mathematics Teacher', 'dept' => 'Mathematics' ),
		array( 'name' => 'Mr. James Carter', 'role' => 'Sports Coordinator', 'dept' => 'Physical Education' ),
	);
	foreach ( $faculty as $f ) {
		$id = wp_insert_post( array(
			'post_title'   => $f['name'],
			'post_content' => 'An experienced and dedicated educator committed to student growth and academic excellence.',
			'post_status'  => 'publish',
			'post_type'    => 'edu_faculty',
		) );
		if ( $id && ! is_wp_error( $id ) ) {
			update_post_meta( $id, 'edu_faculty_designation', $f['role'] );
			update_post_meta( $id, 'edu_faculty_qualification', 'M.Ed / Ph.D' );
		}
	}

	// Programs
	$programs = array(
		array( 'title' => 'Primary School Program', 'level' => 'Grade 1 - 5', 'duration' => '5 Years' ),
		array( 'title' => 'Secondary Education Program', 'level' => 'Grade 6 - 10', 'duration' => '5 Years' ),
		array( 'title' => 'Higher Secondary (Science)', 'level' => 'Grade 11 - 12', 'duration' => '2 Years' ),
		array( 'title' => 'Bachelor of Business Studies', 'level' => 'Undergraduate', 'duration' => '4 Years' ),
	);
	foreach ( $programs as $p ) {
		$id = wp_insert_post( array(
			'post_title'   => $p['title'],
			'post_content' => 'A comprehensive curriculum designed to build strong foundations and prepare students for future success.',
			'post_excerpt' => 'A comprehensive curriculum designed to build strong foundations for future success.',
			'post_status'  => 'publish',
			'post_type'    => 'edu_program',
		) );
		if ( $id && ! is_wp_error( $id ) ) {
			update_post_meta( $id, 'edu_program_level', $p['level'] );
			update_post_meta( $id, 'edu_program_duration', $p['duration'] );
			update_post_meta( $id, 'edu_program_seats', '40' );
		}
	}

	// Testimonials
	$testimonials = array(
		array( 'name' => 'Anita Gurung', 'role' => 'Parent', 'quote' => 'The teachers here genuinely care about every child. My daughter has grown so much in confidence.' ),
		array( 'name' => 'Ramesh Thapa', 'role' => 'Alumni, Class of 2020', 'quote' => 'This school gave me the foundation I needed to succeed in university and beyond.' ),
		array( 'name' => 'Kabita Rai', 'role' => 'Parent', 'quote' => 'A safe, nurturing and academically strong environment. Highly recommended.' ),
	);
	foreach ( $testimonials as $t ) {
		$id = wp_insert_post( array(
			'post_title'   => $t['name'],
			'post_content' => $t['quote'],
			'post_status'  => 'publish',
			'post_type'    => 'edu_testimonial',
		) );
		if ( $id && ! is_wp_error( $id ) ) {
			update_post_meta( $id, 'edu_testimonial_role', $t['role'] );
			update_post_meta( $id, 'edu_testimonial_rating', '5' );
		}
	}
}
