<div class="form-popup" id="create-entry-form">
  <form  class="form-container" action="/admin/parsers/save_files.php" method="post"  >
    <h1 id="zapis" >Zápis</h1>
    <span id="form_errors"></span>
        <div class="data-div">
            <label for="psw"><b>Datum</b></label>
            <input class="date-inp"id="input_date" type="date" placeholder="dd.mm.yyyy" name="input_date" required>
            <label for="input_lang"><b>Jazyk</b></label>
            <input id="input_lang" type="text" placeholder="Python" name="input_lang" required>

            <label for="input_time"><b>Straveny cas v minutach</b></label>
            <input id="input_time" type="number" min="0" placeholder="60" name="input_time" required >
            <label for="input_rate"><b>Hodnocení</b></label>
            <input id="input_rate" type="number" min="1" max="5" placeholder="1-5" name="input_rate" required>
            <label for="input_word"><b>Jaký z toho máš pocit</b></label>
            <input id="input_word" type="text" placeholder="dobrý" name="input_word" required>
        </div>
    <input class="btn"  type="submit" ></input>
    <button type="button" class="btn cancel" onclick="closeForm()">Ukončit</button>
  </form>
</div>

<?php


?>