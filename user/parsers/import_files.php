<?php
ob_start();
require_once "../../core/init.php";

if(isset($_POST['importSubmit'])) {
    $csvMimes = array('text/x-comma-separated-values','text/comma-separated-values','application/octet-stream','text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel','text/plain');

    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes)) {
        if(is_uploaded_file($_FILES['file']['tmp_name'])) {
            $cvsFile = fopen($_FILES['file']['tmp_name'],'r');

            fgetcsv($cvsFile);

            while(($line = fgetcsv($cvsFile)) !== FALSE) {
                //id = $line[0];
                $date = $line[1];
                $time_spent = $line[2];
                $language = $line[3];
                $rating = $line[4];
                $description = $line[5];
                /*
                $prevQuery = "SELECT * FROM record WHERE id = '{$id}'";
                $prevResult = $db->query($prevQuery);
                if($prevResult->num_rows > 0) {
                    break;
                }else { */
                $db->query("INSERT INTO record (date, time_spent, language, rating, description, user_id) VALUES ('{$date}','{$time_spent}','{$language}','{$rating}','{$description}','{$user_id}')");
                

            }
            fclose($cvsFile);

            $qstring = '?status=succ';
        }else{
            $qstring = '?status=err';
        }
        
    }else{
        $qstring = '?status=invalid_file';
    }
}


header("Location: ../records.php".$qstring);
?>