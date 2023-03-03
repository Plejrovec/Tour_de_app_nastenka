<?php
ob_start();
require_once "../../core/init.php";
$id = isset($_GET['id']) ? mysqli_real_escape_string($db, $_GET['id']) : '';
$username = isset($_POST['input_username']) ? mysqli_real_escape_string($db, $_POST['input_username']) : '';
$name = isset($_POST['input_name']) ? mysqli_real_escape_string($db, $_POST['input_name']) : '';
$surname = isset($_POST['input_surname']) ? mysqli_real_escape_string($db, $_POST['input_surname']) : '';
$email = isset($_POST['input_email']) ? mysqli_real_escape_string($db, $_POST['input_email']) : '';
$password = isset($_POST['input_password']) ? mysqli_real_escape_string($db, $_POST['input_password']) : '';
$admin = isset($_POST['input_admin']) ? mysqli_real_escape_string($db, $_POST['input_admin']) : '';

$sql = "SELECT * FROM users where username = '{$username}' or email = '{$email}'";
$result = $db->query($sql);
$messege;
if ($result->num_rows ==1) {

    if ($admin == "") {
        $admin = 0;
    } else {
        $admin = 1;
    }
    var_dump($admin);
    if ($password == '') {
        $sql = "UPDATE users SET username = '$username',  name = '$name', surname ='$surname', email = '$email', IsAdmin = '$admin' WHERE id = '{$id}'";
    } else {
        $password = md5($password);
        $sql = "UPDATE users SET username = '$username',  name = '$name', surname ='$surname', email = '$email', password = '$password', IsAdmin = '$admin' WHERE id = '{$id}'";
    }
    $db->query($sql);

    $messege = '?status=succ2';
    header("Location: ../users.php".$messege);
} else {
    $messege = '?status=err';
    header("Location: ../users.php" . $messege);
}
