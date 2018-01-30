<?php

use ColbyComms\TwentyEighteen\TwentyEighteen as T18;

add_filter( 'colbycomms__wp_schedule__after_schedule_archive', function() {
	ob_start();
	?>
	</div>
</main>
	<?php
	return ob_get_clean();
} );