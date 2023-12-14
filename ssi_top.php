<?
if ($security) {
    require 'ssi_security.php';
} else {
  require 'init.php';
  session_start();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>ORM/AR Application</title>
		<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">

</head>
	<body>
	  <div id="page_wrapper">
      <div id="header">
        <!--add the session check to top.php. if null then this table doesnt show -->
				<h1> CSCI 488 - Senior Seminar in Computer Science</h1>
				<h2> Final Project</h2>
				<br>
      </div>

      <div id="content">  <!-- Start of Main Page Content -->
