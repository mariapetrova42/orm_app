<?php
session_start();

// Unset the mps_token session variable
unset($_SESSION['mps_token']);

// Redirect to index.php
header("Location: index.php");
exit();
?>
