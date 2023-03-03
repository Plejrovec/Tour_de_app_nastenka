<?php
ob_start();
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT');

include_once 'settings/Database.php';
include_once 'models/Record.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate record object
$record = new Record($db);

$method = $_SERVER['REQUEST_METHOD'];

$request_uri = $_SERVER['REQUEST_URI'];
$url = rtrim($request_uri, '/');
$url = filter_var($url, FILTER_SANITIZE_URL);
$url = explode('/', $url);
$user_id = isset($url[2]) ? $url[2] : "";
$record_id = isset($url[4]) ? $url[4] : "";
if ($url[1] = 'users' && !empty($user_id) && $url[3] == 'records') {
    switch ($method) {
        case 'GET':
            if (!empty($record_id)) {
                include_once 'record/read_single.php';
            } else {
                include_once 'record/read.php';
            }
            break;
        case 'POST':
            include_once 'record/create.php';
            break;
        case 'PUT':
            if (!empty($record_id)) {
                include_once 'record/update.php';
            }else {
                json_encode(
                    array('message' => 'Prosím zadejte id zápisu ve formátu api/user/{user_id}/records/{record_id}'));
            }
            break;
        case 'DELETE':
            if (!empty($record_id)) {
                include_once 'record/delete.php';
            }else {
                json_encode(
                    array('message' => 'Prosím zadejte id zápisu ve formátu api/user/{user_id}/records/{record_id}'));
            }
            break;
    }
}else {
    json_encode(
        array('message' => 'Prosím zadejte id zápisu ve formátu api/user/{user_id}/records/{record_id}'));
}
