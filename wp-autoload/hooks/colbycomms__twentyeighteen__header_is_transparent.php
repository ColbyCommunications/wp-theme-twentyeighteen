<?php

use ColbyComms\TwentyEighteen\TwentyEighteen as T18;

add_filter( 'colbycomms__twentyeighteen__header_is_transparent', function( $bool ) {
    global $post;

    if ( ! is_page() ) {
        return $bool;
    }

    if ( empty( $post ) ) {
        return $bool;
    }

} );