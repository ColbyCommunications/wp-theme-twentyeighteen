<?php

namespace ColbyComms\TwentyEighteen\Functions;

function get_site_menu_items()
{
    return wp_get_nav_menu_items('Site Menu') ?: [];
}

function render_sticky_nav()
{
    ob_start();

    foreach ( get_site_menu_items() as $item ) {
        ?>
   <a href="<?php echo $item->url; ?>" class="sticky-nav-item primary text-uppercase btn <?php echo implode(' ', array_map('trim', $item->classes)); ?>">
    <?php echo $item->title; ?>
   </a>
        <?php
    }

    $sticky_nav_items = ob_get_clean();

    return "<nav class=\"sticky-nav small-5\">
	$sticky_nav_items
</nav>";
}


function get_main_sidebar()
{
    ob_start();
    if (is_active_sidebar('main-sidebar') ) {
        echo '<ul class="list-unstyled">';
        dynamic_sidebar('main-sidebar');
        echo '</ul>';
    }

    return ob_get_clean();
}

function get_image_sizes()
{
    return [
    'Big Thumbnail' => [
    'big-thumbnail',
    400,
    400,
    true,
    ],
    ];
}

function get_buffer( $cb )
{
    ob_start();
    $cb();
    return ob_get_clean();
}

function get_global_menu()
{
    if (is_multisite() ) {
        switch_to_blog(1);
    }

    $items = is_nav_menu('Global Menu') ? wp_get_nav_menu_items('Global Menu') : [];

    if (is_multisite() ) {
        restore_current_blog();
    }

    return '<ul class="columned-list text-uppercase small-2">' . implode(
        '', array_map(
            function ( $item ) {
                return "<li><a href=\"$item->url\">{$item->title}</a></li>";
            },
            $items
        )
    ) . '</ul>';
}

function get_address_block()
{
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

function get_parent_page_link()
{
    $parent = wp_get_post_parent_id(get_the_id());
    if (! $parent ) {
        return '';
    }

    ob_start();
    ?>
<div class="parent-page-link">
    <a href="<?php echo get_the_permalink($parent); ?>">
    <?php echo get_the_title($parent); ?>
    </a>
</div>

    <?php
    return ob_get_clean();
}



function get_archive_header()
{
    ob_start();
    ?>

    <header class="container-fluid largest primary pt-7 pb-2 mb-4">
        <div class="container text-center">
            <div class="large-1 large-md-6">
                <h1><?php the_archive_title(); ?></h1>
            </div>
        </div>
    </header>

    <?php
    return ob_get_clean();
}
