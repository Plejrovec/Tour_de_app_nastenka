<?php 
    // Headers 
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization,X-Requested-With');




    // Get raw posted data 
    $data = json_decode(file_get_contents("php://input"));
    $record->date = $data->date;
    $record->time_spent = $data->time_spent;
    $record->programming_language = $data->programming_language;
    $record->rating = $data->rating;
    $record->description = $data->description;
    $record->user_id = $user_id;

    // Create post
    if($record->create()) {
        echo json_encode(
            array('message' => 'Post Created'));
        }else {
            echo json_encode(
                array('message' => 'Post not Created'));
        }
    
