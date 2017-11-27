<?php
$title = "SweetOm";
ob_start();
?>
<p>
    Vos données ont bien été enregistrées!
    <?php echo $_SESSION['ID']?>
</p>

<div id="Accueil">
    <div id=tab_de_bord>   <p>Tableau de bord</p>    </div>
    <a href="myHouse.php" id="edit_profil">Editer profil</a>

</div>
<?php
$content = ob_get_clean();
require_once("template.php");