<?php 
$title = "Ajouter un nouvel utilisateur";
$style = "style.css";
ob_start(); ?>

 <div class= "myBody">
 	<?php
	if (array_key_exists('send',$_SESSION)) {
		echo "<div id=\"ok\">".$_SESSION['send']."</div>";
		unset($_SESSION['send']);
	}
	?>

 	<form method="POST" id="creationNewUser" action="/index.php?action=addNewUserToDb">
 		<?php if(array_key_exists('error', $_SESSION)){
	 		echo "<div class=\"error\">".$_SESSION["error"]."</div>";
	 		unset($_SESSION['error']);
 		}?>
 		<label for="firstLogin">
 			<p>Identifiant provisoire : </p>
 			<input type="text" name="firstLogin" id="firstLogin" placeholder="login" required>
 		</label for="firstPasword">
 		<label>
 			<p>Mot de passe provisoire : </p>
 			<input type="password" name="firstPassword" id="firstPasword" placeholder="6 caractères minimum" required>
 		</label>
 		<label for="name">
 			<p>Nom du client </p>
 			<input type="text" name="name" id="name" required>
 		</label for="firstPasword">
 		<label for="mail">
 			<p>Adresse mail du client </p>
 			<input type="mail" name="mail" id="mail" required>
 		</label>
 		<div class="send">
 			<input type="submit" name="submit" value=">>Envoyer" class="sendData">
 		</div>
 		
 	</form>

 </div>
 <script type="text/javascript" src="/Public/Js/dataSendScript.js"></script>
 <?php 
 $content = ob_get_clean();
 require("template.php");