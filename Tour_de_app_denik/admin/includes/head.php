<?php ob_start(); ?>

<!DOCTYPE html>
<html>

<head>
  <title>Projekt Deník</title>
</head>
<link rel="stylesheet" href="../css/styles.css">
<link rel = "icon" href ="../icon.png" 
        type = "image/x-icon">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<body>
<?php

session_start();



if ($_SESSION['loggedIn'] == "false") {
  header("Location: ../index.php");
}else if($_SESSION['IsAdmin']!="true") {
  header("Location: ../user/records.php");
}

?>

<div class="logout-div2">
  <a class="b_outlog2" href="../core/logout.php">Logout</a>
</div>
<div class="nav-bar">
  <a class="tablink" href="index.php" id="defaultOpen">Home</a>
  <a class="tablink" href="users.php">Uživatelé</a>
  <a class="tablink" href="records.php">Zápisy</a>
</div>
<h1>Deník</h1>