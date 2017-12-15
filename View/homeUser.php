<?php
$title = "SweetOm";
$style = "style.css";
ob_start();
?>
<p>
    Vos données ont bien été enregistrées!
    <?php echo $_SESSION['ID']?>
</p>

<div id="accueil">
    <a id="tabDeBord">Tableau de bord </a>
    <a href="myHouse.php" id="editProfil">Editer profil</a>

</div>
<?php
$content = ob_get_clean();
require_once("template.php");