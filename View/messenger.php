<?php 
$title= "messenger";
ob_start()?>
	<div id="CorpsMessenger">
		<!--Presentation a revoir-->
		<div id="menu_message">
			<div></div>
			<a href="#sms_ecrit">Ecrire un message</a>
			<a href="#sms_envoye">Boîte de réception</a>
			<a href="#sms_recu">Messages envoyés</a>
		</div> 

		<div id="type_message">
			<!--afficher qu'au clic d'un des trois liens au dessus besoin de Javascript-->
			<div id="sms_ecrit">
				<form method="POST">
					<input id="objet_message" type="text" name="objetmessage" placeholder="objet"/> <br/>
					<p>Envoyer à:</p> <input id="recever_message" type="text" name="recever_message"/> <br/>
					<textarea id="message" placeholder="Ecrire message" rows="20" cols="80"></textarea><br/>
					<input id="centrer" type="submit" name="submit" value="Envoyer">
				</form>
			</div>

			<div id="sms_recu">  
				<!--extraire les 20 derniers messages reçu de la bdd-->	
			</div>	

			<div id="sms_envoye">
				<!--exttraire les messages envoyées par l'utilisateur de la bdd-->
			</div>
		</div>

	</div>
		
		 
<?php
$content = ob_get_clean();
require_once("template.php");
?>