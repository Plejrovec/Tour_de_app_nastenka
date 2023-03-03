<?php 
    // Headers 
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: PUT');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization,X-Requested-With');


    // Get raw posted data 
    $data = json_decode(file_get_contents("php://input"));

    // Set ID to update 
    $record->id = $record_id;

    $record->date = $data->date;
    $record->time_spent = $data->time_spent;
    $record->programming_language = $data->programming_language;
    $record->rating = $data->rating;
    $record->description = $data->description;
    $record->user_id = $user_id;

    // Update post
    if($record->update()) {
        echo json_encode(
            array('message' => 'Post Updated'));
        }else {
            echo json_encode(
                array('message' => 'Post not Updated'));
        }
    
