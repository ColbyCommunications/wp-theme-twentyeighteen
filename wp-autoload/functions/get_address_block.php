<?php
/**
 * Function get_address_block
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

namespace ColbyComms\TwentyEighteen\Functions;

/**
 * Get a string represeting the organization address.
 *
 * To-do: Provide hooks to modify.
 *
 * @return string The rendered HTML.
 */
function get_address_block() {
	return '
<address>
	<div class="mb-1">
		<span class="h3 strong text-sans">
			<a href="//colby.edu">Colby College</a>
		</span>
	</div>
	<div>
		4000 Mayflower Hill Drive <br>Waterville, Maine 04901
	</div>
	<div>
		207-859-4000
	</div>
	<div>
		<a href="//colby.edu/contact">Contact Us</a>
	</div>
</address>';
}
