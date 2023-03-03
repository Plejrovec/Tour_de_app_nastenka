<?php

$db=mysqli_connect('sql7.freemysqlhosting.net','sql7602650','sUzblCqDsV','sql7602650'); // připojí se na databázi
if(mysqli_connect_errno()) { // pokud je error
    echo "Database connection failed with following errors: ". mysqli_connect_error(); // vypíše aktuální error
    die(); // vypne 
    
}
if(isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} 
else {
    $user_id = null;
}
?>