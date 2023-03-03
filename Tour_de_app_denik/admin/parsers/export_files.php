<?php
ob_start();
require_once "../../core/init.php";

$query = $db->query("SELECT * From record where user_id ='{$user_id}' ");

if($query->num_rows > 0) {
    $delimiter = ",";
    $filename = "records¨_". date('Y-m-d') . ".csv";

    $f = fopen('php://memory', 'w' );

    $fields = array('id','date','time-spent','language','rating','description');
    fputcsv($f, $fields, $delimiter);

    while($row = $query->fetch_assoc()) {
        $lineData = array($row['id'],$row['date'],$row['time_spent'],$row['language'],$row['rating'],$row['description']);
        fputcsv($f,$lineData,$delimiter);
    }

    fseek($f,0);

    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');

    fpassthru($f);

}else {
    header("Location: ../records.php"); }
exit;
