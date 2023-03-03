<?php 
    // Headers 
    header('Content-Type: application/json');


    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate record object
    $record = new Record($db);

    $record->user_id = $user_id;

    // Blog record query 
    $result = $record->read();
    // get row count
    $num = $result->rowCount();

    // Check if any posts
    if($num > 0) {
        // Record array 
        $records = array();
        $records['data'] = array();

         while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $record_item = array(
                'id' => $id,
                'date' => $date,
                'time_spent' => $time_spent,
                'programming_language' => $language,
                'rating' => $rating,
                'description' => $description,
                'user_id' => $user_id
            );

            // push to 'data'
            array_push($records['data'],$record_item);
         }

         // turn to JSON & output
         echo json_encode($records);
    }else {
        // no records
        echo json_encode(
            array('message' => 'No Records Found')
        );
    }

