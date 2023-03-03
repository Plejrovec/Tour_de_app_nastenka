<?php
require_once '../core/init.php';
include 'includes/head.php';
?>
<?php

$sql = "SELECT * FROM record where user_id ='" . $user_id . "'";
$zápisy = $db->query($sql);
$edit_record;

if (!empty($_GET['status'])) {
    switch ($_GET['status']) {
        case 'succ':
            $statusType = 'alert-success';
            $statusMsg = 'Data byla úspěšně importována.';
            break;
        case 'err':
            $statusType = 'alert-danger';
            $statusMsg = 'Chyba, Zkuste to prosím později.';
            break;
        case 'invalid_file':
            $statusType = 'alert-danger';
            $statusMsg = 'Prosím nahrajte správný CSV soubor.';
            break;
        default:
            $statusType = '';
            $statusMsg = '';
            break;
    }
}

?>



<div id="Zapisy" class="tabcontent">
    <br>
    <h1>Zápisy</h1>
    <p>Zde můžeš provádět záznamy a úpravy v zápiscích</p>
    <?php if (!empty($statusMsg)) {
        echo $statusMsg;
    }

    ?>



    <h2 class="zápisy">Data</h2>

    <div>
        <button class="middle button3 " onclick="openForm()" type="button">
            Zápis
        </button>
        <button class="button2_1" onclick="Show_pop('import')">Import</button>
        <a href="parsers/export_files.php" id="export-submit-btn" class="button2_1">Exportovat</a>
    </div>
    <TABLE class="middle">
        <tr>
            <th>Datum</th>
            <th>Jazyk</th>
            <th>Strávený čas</th>
            <th>Sebehodnocení</th>
            <th>Popis</th>
            <th>Úprava</th>
        </tr>
        <?php while ($zápis = mysqli_fetch_assoc($zápisy)): ?>
            <tr>
                <td>
                    <?= $zápis['date'] ?>
                </td>
                <td>
                    <?= $zápis['language'] ?>
                </td>
                <td>
                    <?= $zápis['time_spent'] ?> min
                </td>
                <td>
                    <?= $zápis['rating'] ?>
                </td>
                <td><textarea readonly><?= $zápis['description'] ?></textarea></td>

                <td>
                    <div class="table-buttons-div">
                        <button class="table-button" onclick="editEntry(<?= $zápis['id'] ?>)">
                            <img src="https://icons.veryicon.com/png/o/miscellaneous/linear-small-icon/edit-246.png"
                                width="15px" height="15px">
                        </button>
                        <button class="table-button" onclick="deleteEntry(<?= $zápis['id'] ?>)">
                            <img src="https://cdn-icons-png.flaticon.com/512/1345/1345874.png" width="15px" height="15px">
                        </button>
                    </div>
                </td>
            </tr>
        <?php endwhile; ?>
    </TABLE>




 


</div>


<div class="popup" id="ano-popup">
  <div>
    <form action="/user/parsers/import_files.php" method="post" enctype="multipart/form-data">
      <label class="importlabel" for="file">Vyber soubor pro import</label>
      <input type="file" name="file" class="custom-file-input">
      <input type="submit" id="input-submit-btn" class="button2" name="importSubmit" value="Import">
      <button class="button2" onclick="Show_pop('import')"> Zavřít</button>
    </form>
  </div>
</div>


<?php
include 'includes/create_form.php';

include 'includes/edit_form.php';

include 'includes/footer.php';