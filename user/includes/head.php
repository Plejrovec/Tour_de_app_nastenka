<?php ob_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Projekt Deník</title>
</head>
<link rel="stylesheet" href="../css/styles.css">
<script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<link rel = "icon" href ="../icon.png" 
        type = "image/x-icon">
<body>
	<?php
session_start();



if ($_SESSION['loggedIn'] == "false") {
  header("Location: ../index.php");
}else if($_SESSION['IsAdmin']!="false") {
  header("Location: ../admin/records.php");
}

?>
<div class="logout-div2">
  <a class="b_outlog2" href="../core/logout.php" >Logout</a>
</div>
<div class="nav-bar">
	<a class="tablink" href="index.php" id="defaultOpen">Home</a>
	<a class="tablink" href="records.php">Zápisy</a>
	

</div>
<br>