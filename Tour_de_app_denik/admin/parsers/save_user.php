<?php
ob_start();
require_once "../../core/init.php";

$username = isset($_POST['input_username']) ? mysqli_real_escape_string($db, $_POST['input_username']) : '';
$name = isset($_POST['input_name']) ? mysqli_real_escape_string($db, $_POST['input_name']) : '';
$surname = isset($_POST['input_surname']) ? mysqli_real_escape_string($db, $_POST['input_surname']) : '';
$email = isset($_POST['input_email']) ? mysqli_real_escape_string($db, $_POST['input_email']) : '';
$password = isset($_POST['input_password']) ? mysqli_real_escape_string($db, $_POST['input_password']) : '';
$admin = isset($_POST['input_admin']) ? mysqli_real_escape_string($db, $_POST['input_admin']) : '';

$sql = "SELECT * FROM users where username = '{$username}' or email = '{$email}'";
$result = $db->query($sql);
$messege;
if ($result->num_rows == 0) {

    $password = md5($password);
    if ($admin == "on") {
        $admin = 1;
    } else {
        $admin = 0;
    }
    $sql = "INSERT INTO users (username, name, surname, email, password, IsAdmin) VALUES ('$username',  '$name', '$surname', '$email', '$password', '$admin')";
    $db->query($sql);
    $messege = '?status=succ1';
    header("Location: ../users.php".$messege);
}else {
    $messege = '?stauts=err';
    header("Location: ../users.php".$messege);
}
