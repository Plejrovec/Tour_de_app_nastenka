<div class="form-popup" id="myForm">
  <form  class="form-container" action="/admin/parsers/save_files.php" method="post" >
    <h1 id="zapis" >Zápis</h1>
    <div class="user-div">
        <label for="input_username"><b>Username</b></label><br>
        <input class="date-inp"id="input_username" type="text" placeholder="Nickname" name="input_username" required>
        <label for="input_name"><b>Jméno</b></label>
        <input id="input_name" type="text" name="input_name" required>

        <label for="input_surname"><b>Přijmení</b></label>
        <input id="input_surname" type="text"  name="input_surname" required >
        <label for="input_email"><b>Email</b></label>
        <input id="input_email" type="email" placeholder="admin@gmail.com" name="input_email" required>
        <label for="input_password"><b>Heslo</b></label>
        <input id="input_password" type="password"  name="input_password" required >
        <label for="input_admin"><b>admin</b></label> <!-- dej sem checkbox nebo něco -->
        <input id="input_admin" type="checkbox" name="input_admin">
    </div>
    <input class="btn" type="submit"  ></input>
    <button type="button" class="btn cancel" onclick="closeForm()">Ukončit</button>
  </form>
</div>

