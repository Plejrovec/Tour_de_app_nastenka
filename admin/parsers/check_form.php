<?php
ob_start();
    require_once '../../core/init.php';
    $date =isset($_POST['date'])? mysqli_real_escape_string($db,$_POST['date']):'';
    $lang =isset($_POST['lang'])? mysqli_real_escape_string($db,$_POST['lang']):'';
    $time =isset($_POST['time'])? mysqli_real_escape_string($db,$_POST['time']):'';
    $rate =isset($_POST['rate'])? mysqli_real_escape_string($db,$_POST['rate']):'';
    $desc =isset($_POST['desc'])? mysqli_real_escape_string($db,$_POST['desc']):'';
    $program =isset($_POST['program'])? mysqli_real_escape_string($db,$_POST['program']):'';
    $errors = array();
    $required = array(
        'date' => 'Datum',
        'lang'     => 'Jazyk',
        'time'    => 'Čas',
        'rate'      => 'Hodnocení',
        'desc'     => 'Jaký z toho máš pocit',
        'program'  => 'Popis programu',
        );

    foreach($required as $f => $d){
        if(empty($_POST[$f]) || $_POST[$f]==''){
            $errors[] = $d.' je povinné pole';
        }
    }
    
    //check if email valid
    if(!intval($time) && !empty($_POST['time'])){
        $errors[] = 'Čas musí být číslo'  ;
    }
    if((!intval($rate) || $rate>5) && !empty($_POST['rate'])) {
        $errors[] = 'Hodnocení musí být číslo od 1 do 5';
    }

    if(!empty($errors)){
        //echo display_errors($errors);
        foreach($errors as $i){
            echo '<li>'.$i.'</li>' ;       
        }
    }
    else{
        echo 'passed';
    }




?>