<?php
ob_start();
require_once "../../core/init.php" ;

$id = isset($_POST['id'])?mysqli_real_escape_string($db,$_POST['id']):'';

var_dump($id);

$sql = ("DELETE FROM users WHERE id = '{$id}'");
$db->query($sql);
