<?php
$title = "SweetOm";
$style = "style.css";
ob_start();
?>

<div id="accueil">
    <a id="tabDeBord">Tableau de bord </a>
    <a href="myHouse.php" id="editProfil">Editer profil</a>

</div>
<?php
$content = ob_get_clean();
require("template.php");