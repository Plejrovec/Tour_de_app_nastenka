<?php 
// Headers 
header('Content-Type: application/json');


// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate record object
$record = new Record($db);

// Get id
$record->id =  $record_id;
$record->user_id = $user_id;
// Get post
$record->read_single();

//create array 
$record_arr = array(
    'id'=> $record->id,
    'date' =>$record->date,
    'time_spent' =>$record->time_spent,
    'programming_language' =>$record->programming_language,
    'rating' =>$record->rating,
    'description' =>$record->description,
    'user_id' => $user_id
);

// Make JSON 
print_r(json_encode(($record_arr)));