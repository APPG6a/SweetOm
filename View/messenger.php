<?php 
$title= "messenger";
ob_start()?>
	<div id="CorpsMessenger">
		<!--Presentation a revoir-->
		<nav id="menuMessage">
			<div></div>
			<a href="#smsEcrit">Ecrire un message</a>
			<a href="#smsEnvoye">Boîte de réception</a>
			<a href="#smsRecu">Messages envoyés</a>
		</nav> 

		<div id="typeMessage">
			<!--afficher qu'au clic d'un des trois liens au dessus, besoin de Javascript-->
			<div id="smsEcrit">
				<form method="POST" action="">
					<div>
						<input id="objetMessage" type="text" name="objetMessage" size="80" placeholder="objet"/> 

						<label for="receverMessage">
							<p>Envoyer à:</p>
							<input id="receverMessage" size="50" type="text" name="receverMessage"/> 
						</label> 

						<textarea id="message" placeholder="Ecrire message" rows="20" cols="80"></textarea>
						<div class="formFoot">
							<input class="boutonSubmit" type="submit" name="submit" value="Envoyer message"/>
						</div>
						
					</div>
					
				</form>
			</div>

			<div id="smsRecu">  
				<!--extraire les 20 derniers messages reçu de la bdd-->	
			</div>	

			<div id="smsEnvoye">
				<!--exttraire les messages envoyées par l'utilisateur de la bdd-->
			</div>
		</div>

	</div>
		
		 
<?php
$content = ob_get_clean();
require_once("template.php");
?>