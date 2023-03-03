<?php
require_once '../core/init.php';

require "includes/head.php";

if ($_SESSION['loggedIn'] == "false") {
  header("Location: ../login.php");
}
?>

<?php

$sql = "SELECT * FROM record where user_id ='" . $user_id . "'";
$zápisy = $db->query($sql);
$edit_record;
?>

<body>
  
  <div>
    <h1>Deník</h1>
    


    <div class="middle">

      <p>Vítej ve svém deníku k zápisu tvého programování</p>
      <p>Tento deník vznikl na základě projektu Tour De App</p>

    </div>
  </div>





  
  <?php

  include "includes/footer.php";
  ?>

  </html>