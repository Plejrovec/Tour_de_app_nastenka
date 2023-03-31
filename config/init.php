<?php

include "models/database.php";
include "models/note.php";

$database = new Database();
$db = $database->connect();

$n = new Note($db);

?>