<?php 
ob_start();
require_once "../../core/init.php";
 
 $date=isset($_POST['input_date'])? mysqli_real_escape_string($db,$_POST['input_date']):'';
 $lang=isset($_POST['input_lang'])? mysqli_real_escape_string($db,$_POST['input_lang']):'';
 $time=isset($_POST['input_time'])? mysqli_real_escape_string($db,$_POST['input_time']):'';
 $rate=isset($_POST['input_rate'])? mysqli_real_escape_string($db,$_POST['input_rate']):'';
 $word=isset($_POST['input_word'])? mysqli_real_escape_string($db,$_POST['input_word']):'';
 

 $sql = "INSERT INTO record (date, time_spent, language, rating, description,  user_id) VALUES ('$date',  '$time', '$lang', '$rate', '$word', '$user_id')";
 $db->query($sql);
 header("Location: ../records.php");




















































 ?>