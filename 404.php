<?php
/**
 * 404 template
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

use ColbyComms\TwentyEighteen\TwentyEighteen as T18;

get_header();

?>
<main <?php T18::main_class( 'main pt-6' ); ?>>
	<article class="container pt-6 pb-4">
		<p>No posts found.</p>
	</article>
</main>
<?php

get_footer();
