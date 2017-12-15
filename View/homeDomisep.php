<?php 
$title= "Domisep's Home";
$style = "style.css";
ob_start()?>
	<div id="corps">
		<div id="domisepFunction">
			<a href="editDomisepProfil.php">Editer le profil Domisep</a>
			<a href="">Gérer les utilisateurs</a>
			<a href="">Afficher les données</a>
			<a href="messenger.php">Messagerie</a>
			<a href="">Editer catalogue</a>
			<a href="">Effectuer des tests</a>		
		</div>
	</div>
<?php
$content = ob_get_clean();
require_once("template.php");