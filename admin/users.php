<?php
require_once '../core/init.php';

$sql = "SELECT * FROM users";
$users = $db->query($sql);
$edit_user;
$sql = "SELECT * FROM record where user_id ='" . $user_id . "'";
$zápisy = $db->query($sql);

include 'includes/head.php';

?>
<?php
$sql = "SELECT * FROM record where user_id ='" . $user_id . "'";
$zápisy = $db->query($sql);
$edit_record;

if (!empty($_GET['status'])) {
  switch ($_GET['status']) {
    case 'succ1' : 
      $type = 'warning-succ';
      $statusMsg = 'uživatel byl úspěšně přidán.';
      break;
    case 'succ2':
      $type = 'warning-succ';
      $statusMsg = 'uživatel byl úspěšně upraven.';
      break;
    case 'err':
      $type = 'warning-dang';
      $statusMsg = 'Uživatelské jméno a email musí být unikátní.';
      break;
    default:
      $statusMsg = '';
      break;
  }
}


?>


<div id="Uzivatele" class="tabcontent">
  <h2>Uživatelé</h2>
  <button class="button1" onclick="open_user_form()" type="button">
    Vytvořit uživatele
  </button>
  <br>
  <TABLE class="middle">
  <?php if (!empty($statusMsg)) {
    echo '<div class='.$type.'>'. $statusMsg; '</div>';
  }

  ?>
    <tr>
      <th>ID</th>
      <th>Username</th>
      <th>Jméno</th>
      <th>Příjmení</th>
      <th>Email</th>
      <th>Status</th>
      <th>Úpravy</th>
    </tr>

    <?php while ($user = mysqli_fetch_assoc($users)) : ?>


      <tr>
        <td class="user-td">
          <?= $user['id'] ?>
        </td>
        <td class="user-td">
          <?= $user['username'] ?>
        </td>
        <td class="user-td">
          <?= $user['name'] ?>
        </td>
        <td class="user-td">
          <?= $user['surname'] ?>
        </td>
        <td class="user-td">
          <?= $user['email'] ?>
        </td class="user-td">
        <td>
          <?php if ($user['IsAdmin'] == 1) {
            echo "admin";
          } else {
            echo "uživatel";
          }
          ?>
        </td>

        <td>
          <div class="table-buttons-div">
            <button class="table-button" onclick="editUser(<?= $user['id'] ?>)">
              <img src="https://icons.veryicon.com/png/o/miscellaneous/linear-small-icon/edit-246.png" width="15px" height="15px">
            </button>
            <?php if ($user['id'] != $user_id) : ?>
              <button class="table-button" type="submit" onclick="Show_popup('user')">
                <img src="https://cdn-icons-png.flaticon.com/512/1345/1345874.png" width="15px" height="15px">
              </button>
              <div class="popup" id="user-popup">
                <div>
                  <p id="warning-p">Opravdu si přejete odstranit užiatele <strong><?=$user['username'] ?></strong> </p>
                  <button id="input-submit-btn" class="button2" style="width: 4rem;" onclick="deleteUser(<?= $user['id'] ?>)">Ano</button>
                  <button class="button2" onclick="Show_popup('user')" style="width: 4rem;">Ne</button>
                </div>
              </div>
          </div>
        <?php endif ?>
        </td>
      </tr>

    <?php endwhile; ?>
  </TABLE>

</div>





<?php
include "includes/create_user_form.php";

include "includes/edit_user_form.php";

include 'includes/footer.php';

