<?php 
    // Headers 
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization,X-Requested-With');


    // Set ID to update 
    $record->id = $record_id;
    $record->user_id = $user_id;


    // Delete post
    if($record->delete()) {
        echo json_encode(
            array('message' => 'Post Deleted'));
        }else {
            echo json_encode(
                array('message' => 'Post not Deleted'));
        }
    
