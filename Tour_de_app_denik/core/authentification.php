<?php 
    session_start();
    
    require_once 'init.php';
   

    $username = $_POST['user'];  
    $password = $_POST['pass'];  
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($db, $username);  
        $password = mysqli_real_escape_string($db, $password);  
      
        $sql = "SELECT * FROM users where username = '".$username."' or email = '".$username."' and password = '".md5($password)."'";  
        $result = $db->query($sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            $_SESSION['loggedIn']="true";
            $cookie_name = "user_id";
            $cookie_value = $row['id'];
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); 
            if($row['IsAdmin'] == 1){
                $_SESSION['IsAdmin']="true";
                header("Location: ../admin/index.php");
             } else {
                $_SESSION['IsAdmin']="false";
                header("Location: ../user/index.php");
             }
        }  
        else{  
            $_SESSION['loggedIn']="false";
            header("Location: ../index.php");  
        }     
?>  