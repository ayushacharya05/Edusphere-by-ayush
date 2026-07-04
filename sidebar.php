<?php
/**
 * Sidebar template - EduSphere by Ayush
 *
 * @package EduSphere_By_Ayush
 */
if ( ! is_active_sidebar( 'sidebar-1' ) ) return;
?>
<aside id="secondary" class="s-sidebar" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>
