<?php
/**
 * Search form template - EduSphere by Ayush
 *
 * @package EduSphere_By_Ayush
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text" for="s"><?php esc_html_e( 'Search for:', 'edusphere-by-ayush' ); ?></label>
	<input type="search" id="s" name="s" placeholder="<?php esc_attr_e( 'Search the site&hellip;', 'edusphere-by-ayush' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" />
	<button type="submit"><?php esc_html_e( 'Search', 'edusphere-by-ayush' ); ?></button>
</form>
