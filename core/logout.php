<?php

session_start();
$_SESSION['loggedIn']="false";
unset($_COOKIE['user_id']);
setcookie('user_id', '', time() - 3600, '/');
header("Location: ../index.php");
ob_clean();
?>