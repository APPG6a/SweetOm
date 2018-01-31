<?php
$title = "SweetOm";
$style = "style.css";
ob_start();
?>

<div id="accueil">
    <a id="tabDeBord" index="index.php?action=showDashbord">Tableau de bord </a>
    <a href="/index.php?action=updateUserRoom" id="editProfil">Editer profil</a>

</div>
<?php
$content = ob_get_clean();
require("template.php");