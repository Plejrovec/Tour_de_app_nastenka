<?php 
require "../models/database.php";
require "../models/note.php";
include "../config/init.php";
$n->id = isset($_POST['id'])?$_POST['id']:'';
$n->delete();


header("location ../index.php");