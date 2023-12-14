<?
$navbar=true;
$security = true;
require 'ssi_top.php';


require 'class_pageable_list.php'; // Include the provided class definition

$query = $query = "SELECT * FROM " . SIGNINS_TABLE . " WHERE mps_mpa_id = $mpa_id ";

$listing = new pg_list($query, 'mps_mpa_id', 'mps_time_edit', 'DESC', '', '', 1, 5, true,    4,'even_row_css','odd_row_css','highlight_css');

$listing->add_column('mps_time_init', 'Past Signins');
$listing->add_column('mps_ipad', 'IP Address');

$listing->init_list();


$page_title = "Logins Listing"

?>

<br>
<h2>Your Past Logins:</h2>
<center>
<?=$listing->get_html()?>
</center>
<br><br>
<a href="page_home.php">Go back to account home.</a>
<br><br>
<? require_once 'ssi_bottom.php' ?>
