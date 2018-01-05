<?php
/**
 * Search form template.
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

use ColbyComms\SVG\SVG;

?>
 <form role="search" method="get" class="search-form mb-3" action="<?php echo esc_url( home_url( '/' ) ); ?>">
 	<label>
 		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ); ?></span>
 		<input
 			type="search"
 			class="search-field"
 			placeholder="<?php echo 'Search ' . esc_attr( get_bloginfo() ); ?>"
 			value="<?php echo get_search_query(); ?>"
 			name="s" />
 	</label>
 	<button type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>">
 		<?php SVG::show( 'search' ); ?>
 	</button>
 </form>
