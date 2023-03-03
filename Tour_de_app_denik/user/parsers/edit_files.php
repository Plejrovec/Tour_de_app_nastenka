<?php
ob_start();
require_once "../../core/init.php";
$id=isset($_GET['id'])?mysqli_real_escape_string($db,$_GET['id']):'';
$date=isset($_POST['input_date'])? mysqli_real_escape_string($db,$_POST['input_date']):'';
$lang=isset($_POST['input_lang'])? mysqli_real_escape_string($db,$_POST['input_lang']):'';
$time=isset($_POST['input_time'])? mysqli_real_escape_string($db,$_POST['input_time']):'';
$rate=isset($_POST['input_rate'])? mysqli_real_escape_string($db,$_POST['input_rate']):'';
$word=isset($_POST['input_word'])? mysqli_real_escape_string($db,$_POST['input_word']):'';

$sql = "UPDATE record SET date = '$date',  time_spent = '$time',language ='$lang', rating = '$rate', description = '$word' WHERE id = '{$id}'";
$db->query($sql);

header("Location: ../records.php"); 


?>