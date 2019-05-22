<?php
/**
 * Templage for a post footer.
 *
 * @package colbycomms/colby-wp-theme-twentyeighteen
 */

?>

<footer class="footer container-fluid px-0">
	<div class="date small-4 text-right">
		<?php the_time( get_option( 'date_format' ) ); ?>
	</div>
</footer>
