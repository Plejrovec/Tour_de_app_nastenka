<?php
error_reporting(E_ERROR);
include "../../core/init.php";
if(isset($_POST['id_edit'])):
$id=isset($_POST["id_edit"])?mysqli_real_escape_string($db,$_POST["id_edit"]):'';
$id = (int)$id;
$sql = "SELECT * FROM users WHERE id = '{$id}'";
$edit_user = mysqli_fetch_assoc($db->query($sql));




?>
<div class="form-popup" id="myForm1">
  <form  class="form-container" action="/admin/parsers/edit_files.php?id=<?=$edit_user['id']?>" method="post" >
    <h1 id="edit">Úprava</h1>

    <label for="input_username">
      <b>Username</b>
    </label><br>
    <input id="input_username" type="text" placeholder="Nickname" name="input_username" required value="<?=$edit_user['username']?>"><br><br>
    <label for="input_name">
      <b>Jméno</b>
    </label>
    <input id="input_name" type="text"  name="input_name" required value="<?=$edit_user['name']?>">

    <label for="input_surname">
      <b>Přijmení</b>
    </label>
    <input id="input_surname" type="text"  name="input_surname" required value="<?=$edit_user['surname']?>">

    <label for="input_email">
      <b>Email</b>
    </label>
    <input id="input_email" type="email" placeholder="admin@gmail.com" name="input_email" required value="<?=$edit_user['email']?>"> 
    <label for="input_password">
      <b>Heslo</b>
    </label>
    <input id="input_password" type="password"  name="input_password">
    <label for="input_admin">
      <b>admin</b>
    </label> <!-- dej sem checkbox nebo něco -->
    <input id="input_admin" type="checkbox" name="input_admin" <?php if($edit_user['IsAdmin']==1) echo "checked" ?>>
  

    <input class="btn" type="submit" onclick="edit_files()"></input>
    <button type="button" class="btn cancel" onclick="closeForm(<?=$edit_record['id']?>)">Ukončit</button>
  </form>
</div>
<?php endif?>

