<?php 
$title = "Ajouter un nouvel utilisateur";
$style = "style.css";
ob_start(); ?>

 <div>
 	<form method="POST" id="creationNewUser" action="/index.php?action=addNewUserToDb">
 		<label for="firstLogin">
 			<p>Identifiant provisoire : </p>
 			<input type="text" name="firstLogin" id="firstLogin" placeholder="login">
 		</label for="firstPasword">
 		<label>
 			<p>Mot de passe provisoir : </p>
 			<input type="password" name="firstPassword" id="firstPasword" placeholder="6 caractères minimum">
 		</label>
 		<label for="name">
 			<p>Nom du client </p>
 			<input type="text" name="name" id="name">
 		</label for="firstPasword">
 		<label for="mail">
 			<p>Adresse Mail du client </p>
 			<input type="mail" name="mail" id="mail">
 		</label>
 		<div class="send">
 			<input type="submit" name="submit" value=">>envoyer" class="sendData">
 		</div>
 		
 	</form>

 </div>
 <?php 
 $content = ob_get_clean();
 require("template.php");