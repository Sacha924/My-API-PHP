<?php
$formation = json_decode(file_get_contents("http://localhost/API-PHP-TEST/API/formation/".$_GET['numero']));
ob_start();
?>
<h1>Formation : <?= $formation[0]->libelle ?> - <?= $formation[0]->id ?></h1>
<?php
$content = ob_get_clean();
require_once("template.php");