<?php
$title = "Edit Profil 1";
ob_start()
?>
<div class="CorpsHouseInfo">

    <form  id="form_inscription" method="POST" action="myHouse.php">


        <div id=tete_form></div>

        <input class="info" type="number" name="Superficie" placeholder="Superficie en m²">
        <input class="info" type="number" name="Nb_habt" placeholder="Nombre d'habitants" required/></br>
        <input class="info" type="number" name="Nb_chambre" placeholder="Nombre de chambres" required/>
        <input class="info" type="number" name="Nb_toilette" placeholder="Nombre de salle(s) de bain"></br>
        <input class="info" type="number" name="Nb_sejour" placeholder="Nombre de séjour(s)">
        <input class= "centrer" type="submit" value="j'enregistre mes données">

    </form>

</div>
<?php
$content = ob_get_clean();
require_once("template.php");