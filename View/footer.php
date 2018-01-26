<footer>

	<?php if(array_key_exists("firstName",$_SESSION) && array_key_exists('lastName', $_SESSION) && array_key_exists('userType', $_SESSION)){
			echo "<div id=\"deconnection\">
					<a id=\"Déconnexion\" href=\"/index.php?action=logout\"> Déconnexion </a><br/>
				</div>";
			}?>


	<div id="Informations">
		<h1>Informations pratiques</h1>
		<p>DOMISEP<br/>
		10 rue de Vanves<br/>
		92170 Issy-Les-Moulineaux<br/>
		09 87 65 43 21</p>
	</div>

	<div id="Designed">
		<p id="SweetIt">Designed by SweetIT<em>©</em></p><br/>
	</div>

	
	<div id="CGU">
		<a id="CGU" href="/index.php?action=cgu">Conditions générales d'utilisation </a><br/>
	</div>
	
</footer>

