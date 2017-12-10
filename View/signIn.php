<?php
$title = "SignIn";
ob_start();
?>
	<div class="corpsSignIn">

		<form id="formInscription" method="POST" action="../index.php?action=addNewUser">

       		
			<div id=teteForm></div>
			<!-- chaque classe info subiront un flexblox avec les contenus séparés-->
			<div class="info">
				<label for="nom">
					<p>Nom:</p> 
					<input  type="text" name="nom" id="nom" required/> 
				</label>
				
				<label for="prenom">
					<p>prénom:</p> 
					<input  type="text" name="prenom" id="prenom" required/> 
				</label>
				
			</div>

			<div class="info">
				<label for="mail">
					<p>e-mail:</p>
					<input  type="mail" name="mail" id="mail" required/> 
				</label>
				
			</div>

			<div class="info">
				<label for="numPort">
					<p>n° Tel: </p>
					<input  type="tel" name="numPort" id="numPort" required/>
				</label>
				
				<label for="numFix">
					<p>n° Fix: </p>
					<input  type="tel" name="numFix" id="numFix"/>
				</label>
				
			</div>

			<div class="info">
				<label for="adresse">
					<p>Adresse: </p>
					<input  type="text" name="adresse" id="adresse" required/>
				</label>
				<label for="cmpAdresse">
					<p>Complément d'adresse: </p>
					<input  type="text" name="cmpAdresse"  id="cmpAdresse" />
				</label>
				
			</div>

			<div class="info">
				<label for="cp">
					<p>Code postal: </p>
					<input  type="number" name="cp" id="cp" required/>
				</label>	
			</div>

			<div class="info">
				<label for="pays">
					<p>Pays: </p>
					<input  type="text" name="pays" id="pays" required/>
				</label>
				
				<label for="ville">
					<p>Ville: </p>
					<input  type="text" name="ville" id="ville" required/>
				</label>
			</div>
			<div class="formFoot">
				<label class="centrer"><input  type="checkbox" name="a_coche"/>  j'accepte les CGU </label>
				<input class= "boutonSubmit" type="submit" value="j'enregistre mes données">
			</div>
		</form>
		
	</div>
<?php
$content = ob_get_clean();
require_once("template.php");
?>