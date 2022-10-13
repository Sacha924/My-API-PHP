<?php
ob_start();
?>
<h1>Bienvenue sur le site de Sacha :)</h1>
<?php
$content = ob_get_clean();
require_once("template.php");