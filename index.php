<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/index.css">
    <script src="app.js" defer></script>
    <title>Nástěnka</title>
</head>

<body>
<div class="topnav">
        <div class="topnav-centered">
            <a class="active" href="/index.php">Sticky Notes</a>
            <a href="/stats.php">Statistics</a>

        </div>
        

</div>
<?php 
require "models/database.php";
require "models/note.php";
require "config/init.php";

$result = $n->read();
    // get row count
    $num = $result->rowCount();

    // Check if any posts
    if($num > 0) {
        // Record array 
        $notes = array();
        $notes['data'] = array();
        }
?>

<ul>
    <?php while($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
  <li>
    <a href="#">
      <h2><?=$row["text"]?></h2>
      <p><?=$row["signature"]?></p>
    </a>
  </li>
  <?php endwhile?>
</ul>
<button class="button" onclick="openForm()">+</button>
    
    <form class="form" action="/parsers/savenote.php" method="post" id=myForm>
        <div class=sticky-note>
            <button class=close onclick="closeForm()">x</button>
            <textarea name="text" class="text" rows="14" cols="10" wrap="soft" maxlength="120"
                style="overflow:hidden; resize:none;"></textarea>
            <textarea name = "sign" class="sign" rows="3" cols="10" wrap="soft" maxlength="20"
                style="overflow:hidden; resize:none;"></textarea>
            <button class="button2">Submit</button>
        </div>

    </form>
    <form class="form" action="" method="post" id=EditForm1>
        <div class=sticky-note>
            <textarea name="text" class="text" rows="14" cols="10" wrap="soft" maxlength="120"
                style="overflow:hidden; resize:none;"></textarea>
            <textarea name = "sign" class="sign" rows="3" cols="10" wrap="soft" maxlength="20"
                style="overflow:hidden; resize:none;"></textarea>
            <input class="button2" value="Submit">
        </div>

    </form>

    <script>
        function openForm() {
            document.getElementById("myForm").style.display = "block";
        } function editForm() {
            document.getElementById("myForm1").style.display = "block";
        } function closeForm() {
            document.getElementById("myForm").style.display = "none";
        }


    </script>
</body>

</html>