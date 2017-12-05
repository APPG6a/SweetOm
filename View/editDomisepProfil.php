<?php 
$title= "Edit profil";
ob_start()?>
	<div id="Corps">
		<form id="editDomisepInfo" method="POST" action="">
			<p>
				<label for="adresse_domisep">Adresse</label><br/>  <input type="text" id="adresse_domisep" name="adresseDomisep"/><br/><br/>
				<label for="ville_domisep">Ville</label><br/>  <input type="text" id="ville_domisep" name="VilleDomisep"/><br/><br/>
				<label for="codePostal_domisep">Code postal</label><br/>  <input type="tel" id="codePostal_domisep" name="codePostalDomisep"/><br/><br/>
				<label for="numTel_domisep">Numéro de téléphone</label><br/>  <input type="tel" id="numTel_domisep" name="numTelDomisep"/><br/><br/>
				<label for="mail_domisep">Adresse mail</label><br/>  <input id="mail_domisep" type="mail" name="mailDomisep"/><br/><br/>
				<input type="submit" id="center" name="submit" value="soumettre">
			</p>
			
		</form>
		<div id=infoDomisepProfil>

			<!--a extraire de la bdd-->

		</div>
		
	</div>
<?php
$content = ob_get_clean();
require_once("template.php");