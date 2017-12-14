<?php
$title = "SweetOm";
ob_start();
?>
<p>
    Vos données ont bien été enregistrées!
    <?php 
    if ($_SESSION['connected']==true){
    	echo $_SESSION['ID'];
    }
    else
    {
    	echo "faux";
    	
    }
	?>
</p>

<div id="accueil">
    <a id="tabDeBord">Tableau de bord </a>
    <a href="myHouse.php" id="editProfil">Editer profil</a>

</div>
<?php
$content = ob_get_clean();
require_once("template.php");