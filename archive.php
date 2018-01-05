<?php
/**
 * Template for post archives.
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

use function ColbyComms\TwentyEighteen\Functions\get_archive_header;

get_header();

if (! have_posts() ) {
    include '404.php';
    return;
}

?>
<div class="row">
<?php
echo get_archive_header();
while ( have_posts() ) :
    the_post();

    get_template_part('parts/article', 'excerpt');
endwhile;
?>
</div>
<?php echo get_post_pagination(); ?>

<?php
get_footer();
