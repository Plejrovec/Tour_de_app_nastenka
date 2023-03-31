<?php 
require "../models/database.php";
require "../models/note.php";
include "../config/init.php";
$n->text = isset($_POST["text"])?$_POST['text']:'';
$n->signature = isset($_POST['sign'])?$_POST['sign']:'';

$n->create();

header("location ../index.php");