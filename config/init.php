<?php


$database = new Database();
$db = $database->connect();

$n = new Note($db);

?>