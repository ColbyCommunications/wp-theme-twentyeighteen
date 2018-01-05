<?php

function render_accordion_shortcode( $atts, $content = '' ) {
	if ( ! isset( $atts['heading'] ) ) {
		return '';
	}

	$hidden = isset( $atts['open'] ) && 'true' === $atts['open'] ? 'false' : 'true';
	$pressed = $hidden === 'true' ? 'false' : 'true';
	$content = str_replace( '<br />', '', apply_filters( 'the_content', trim( $content ) ) );

	return "
<div class=\"accordion\" data-accordion>
	<button class=\"accordion-heading btn primary\" type=\"button\" aria-pressed=\"$pressed\">
		{$atts['heading']}
	</button>
	<div class=\"accordion-panel\" aria-hidden=\"$hidden\">
		$content
	</div>
</div>
";
}

function add_accordion_shortcode() {
	if ( ! shortcode_exists( 'accordion' ) ) {
		add_shortcode( 'accordion', 'render_accordion_shortcode' );
	}
}

add_action( 'init', 'add_accordion_shortcode' );
