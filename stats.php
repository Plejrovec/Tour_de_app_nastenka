<?php
include "includes/head.php";
?>

  <link rel="stylesheet" href="css/stats.css">
</head>
<body>
  
<?php 
  include "includes/topnav.php";
  require "models/api.php";

  $p = new Api();

?>
  <div class="top">
    <p>Up-time serveru: <?= $p->ServerUptime?></p>
    <p>Verze produkčního serveru: <?= $p->ServerPlatform?> </p>
  </div> 
  <div class="container">
    <div class="section">
      <h2>Dnešní statistika: </h2>
      <p>Počet dnešních commitů: <?= $p->TodaysData['number_of_comms']?></p>
      <p>Počet přidaných dnes: <?= $p->TodaysData['number_of_added']?></p>
      <p>Počet odebraných dnes: <?= $p->TodaysData['number_of_deleted']?></p>
      <p>Nejlepší programátor dne:</p>
    </div>
    <div class="section">
      <h2>Dlouhodobá statistika: </h2>
      <p>Počet commitů: <?= $p->AllData['number_of_comms']?></p>
      <p>Počet přidaných: <?= $p->AllData['number_of_added']?></p>
      <p>Počet odebraných: <?= $p->AllData['number_of_deleted']?></p>
      <p>Nejlepší programátor:</p>
    </div>
  </div>
  <div class="container">
		<div class="section">
			<h2>Programátoři: </h2>
        <?php foreach($p->Programmers as $pro): ?>
      <div class="programatori">
        <p>Jméno: <?=$pro->name?></p>
        <p>Příjmení: <?=$pro->surname?> </p>
        <p>Přezdívka: <?=$pro->nick?> </p>
      </div>
      <?php endforeach ?>
		</div>
		<div class="section">
			<h2>Poslední commity:</h2>
            <?php foreach($p->LastComms as $last): ?>
      <div class="commity">
        <p>Jméno: <?= $last['nick'] ?></p>
        <p>Čas: <?= $last['time'] ?></p>
        <p>Popis: <?= $last['description'] ?></p>
      </div>
      <?php endforeach ?>
		</div>
	</div>
</body>
</html>