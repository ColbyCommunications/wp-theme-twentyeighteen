<?php

require dirname( __DIR__ ) . '/vendor/autoload.php';

$dist = '../dist/';

use ColbyComms\WhosComing\{DataFetcher, WhosComing};

$csv_data = include 'demo-data.php';
$demo_data = DataFetcher::format_csv( $csv_data );
$fields = include 'fields.php';

?><!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, user-scalable=0" />
<link rel="stylesheet" href="<?php echo $dist; ?>whos-coming.css" />
<title>
	Who's Coming demo
</title>
<style>
main {
	font-family: sans-serif;
	max-width: 992px;
	margin: 0 auto;
	padding: 3rem 0;
}
</style>
<main>
	<?php echo WhosComing::render( $demo_data, $fields, 'name', 'class_year' ); ?>
</main>
<script src="<?php echo $dist; ?>whos-coming.js"></script>