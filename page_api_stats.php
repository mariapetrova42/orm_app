<?
$navbar=true;
$security = true;
require 'ssi_top.php';
require 'class_pageable_list.php'; // Include the provided class definition

$query = $query = "SELECT * FROM " . LOGS_TABLE . " WHERE mpl_mpa_id = $mpa_id ";

$listing = new pg_list($query, 'mpl_mpa_id', 'mpl_timestamp', 'DESC', '', '', 1, 5, true,    4,'even_row_css','odd_row_css','highlight_css');

$listing->add_column('mpl_id', 'id');
$listing->add_column('mpl_timestamp', 'Time');
$listing->add_column('mpl_ipad', 'IP Address');
$listing->add_column('mpl_query', 'Query');

$listing->init_list();

$total_count = $listing->num_rows;
$recentest_hit = $listing->get_top_item('mpl_timestamp', 'mpl_timestamp');
$most_recent_date = null;
//need breakdown of api hits
//need most recent date


$page_title = "API Hits Listing"

?>

<br>
<h2>Your API Hits:</h2>
<h4>Overview:</h4>
Total hits: <?=$total_count ?>
<br>Most recent hit: <?=$recentest_hit ?>
<h4>Details:</h4>
<center>
<?=$listing->get_html()?>
</center>
<br><br>
<a href="page_home.php">Go back to account home.</a>
<br><br>
<? require_once 'ssi_bottom.php' ?>
