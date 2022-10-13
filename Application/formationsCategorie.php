<?php
$formations = json_decode(file_get_contents("http://localhost/API-PHP-TEST/API/formations/".$_GET['categorie']));//on récupère les infos en utilisant l'api. The file_get_contents() reads a file into a string. So with this function we get our data, but remember that these data are in a json format. That's why we also use the json_decode function
ob_start();
?>
<h1>Les formations de la catégorie <?= $_GET['categorie']; ?></h1>

<table class="table">
    <tr>
        <td>Id</td>
        <td>libelle</td>
        <td>Catégorie</td>
    </tr>
    <?php foreach ($formations as $formation) : //A chaque itération de boucle on a une nouvelle formation?>
    <tr>
        <td><?= $formation->id ?></td>
        <td><?= $formation->libelle ?></td>
        <td><?= $formation->categorie ?></td>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php
$content = ob_get_clean();
require_once("template.php");