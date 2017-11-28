<?php 
$title= "Edit profil";
ob_start()?>
	<div id="Corps">
		<div id="domisep_info">
			<input type="text" name="adresse"><label for="adresse">Adresse</label>
			<input type="text" name="Ville"><label for="ville">Ville</label>
			<input type="tel" name="codePostal"><label for="codePostal">Code postal</label>
			<input type="tel" name="numTel"><label for="numTel">Numéro de téléphone</label>
			<input type="mail" name="mail"><label for="mail">Aadresse mail</label>
		</div>
		
	</div>
<?php
$content = ob_get_clean();
require_once("template.php");