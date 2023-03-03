<?php
error_reporting(E_ERROR);
include "../../core/init.php";
if(isset($_POST['id_edit'])):
$id=isset($_POST["id_edit"])?mysqli_real_escape_string($db,$_POST["id_edit"]):'';
$id = (int)$id;
$sql = "SELECT * FROM record WHERE id = '{$id}'";
$edit_record = mysqli_fetch_assoc($db->query($sql));
 



?>
<div class="form-popup" id="edit-entry-form">
  <form  class="form-container" action="/admin/parsers/edit_files.php?id=<?=$edit_record['id']?>" method="post" >
    <h1 id="edit">Úprava</h1>

    <label for="psw"><b>Datum</b></label><br>
    <input class="date-inp"id="input_date" type="date" placeholder="dd.mm.yyyy" name="input_date" required value="<?=$edit_record['date']?>"><br><br>
    <label for="input_lang"><b>Jazyk</b></label>
    <input id="input_lang" type="text" placeholder="Python" name="input_lang" required value="<?=$edit_record['language']?>">
    <label for="input_time"><b>Straveny cas v minutach</b></label>
    <input id="input_time" type="text" placeholder="60" name="input_time" required value="<?=$edit_record['time_spent']?>" >
    <label for="input_rate"><b>Hodnocení</b></label>
    <input id="input_rate" type="text" placeholder="1-5" name="input_rate" required value="<?=$edit_record['rating']?>">
    <label for="input_word"><b>Jaký z toho máš pocit</b></label>
    <input id="input_word" type="text" placeholder="dobrý" name="input_word" required value="<?=$edit_record['description']?>">

    <input class="btn" onclick="edit_files()" type="submit"></input>
    <button type="button" class="btn cancel" onclick="closeForm()">Ukončit</button>
  </form>
</div>
<?php endif?>

