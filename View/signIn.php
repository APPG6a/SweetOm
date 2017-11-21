<?php
$title = "SignIn";
ob_start();
?>
	<div class="CorpsSignIn">

		<form id="form_inscription" method="POST" action="houseInfo.php">

       		
			<div id=tete_form></div>
			<input class="info" type="text" name="nom" placeholder="Nom" required/>
			<input class="info" type="text" name="prenom" placeholder="Prénom" required/><br />
			<input class="info" type="mail" name="mail" placeholder="Mail" required/><br />
			<input class="info" type="tel" name="NumPort" placeholder="Numéro de portable" required/>
			<input class="info" type="tel" name="Numfix" placeholder="Numéro fixe"><br />
			<input class="info" type="text" name="adresse" placeholder="Adresse" required/>
			<input class="info" type="text" name="cmp_adresse" placeholder="Complément d'adresse"><br />
			<input class="info" type="number" name="cp" placeholder="Code postal" required/>
			<input class="info" type="text" name="ville" placeholder="Ville" required/><br />
			<input class="info" type="text" name="pays" placeholder="Pays" required/><br />
			<div class="centrer"><label><input  type="checkbox" name="a_coche"/>  j'accepte les CGU </label> </div><br />
			<input class= "centrer" type="submit" value="j'enregistre mes données">
		</form>
		
	</div>
<?php
$content = ob_get_clean();
require_once("template.php");
?>