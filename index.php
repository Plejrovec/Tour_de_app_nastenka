<?php
include "includes/head.php";
?>
<body>

        

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
<button class="button" onclick="openForm()">+</button>
<ul>
    <?php while($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
  <li>
    <a href="#">
    <br>
      <p wrap="soft" style="overflow:hidden; resize:none; overflow-wrap: break-word;"><?=$row["text"]?></p>
      <br><br><br>
      <p wrap="soft" style="text-align:right;"><?=$row["signature"]?></p>
    </a>
    <br><br>
    <div class=close2>
        <button style="background-color: yellow; width:3rem ;" onclick="editForm()">Edit</button>
        <button style="background-color: red; width:3rem ;" onclick="DeleteForm()">Del</button>
    </div>
  </li>
  <?php endwhile?>
</ul>
    
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
        function DeleteEntry(id){
            data={"id":id}
            jQuery,ajax({
                url: "parsers/deleteneco.php",
                method:'post',
                data:data,
                success:function(d){
                    location:reload()},
                error:function(){
                    alert("nelze smazat záznam")
                
                }
            })
        }


    </script>
</body>

</html>