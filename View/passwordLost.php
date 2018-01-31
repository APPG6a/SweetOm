<?php
$title = 'Mot de passe oublié';
$style = 'style.css';
ob_start(); 
?>
<div class="myBody">
	<?php
	if (array_key_exists('send',$_SESSION)) {
		echo "<div id=\"ok\">".$_SESSION['send']."</div>";
		unset($_SESSION['send']);
	}
	?>
	<div id="passwordLostBlock">
		

		<div id="passwordLost">
			<form method="POST"  action="/index.php?action=getMyPassword">
				<p>Mot de passe Oublié</p>
				<label>
					<input type="text" placeholder= "identifiant" name="myLogin">
				</label>
				<label>
					<input type="mail" placeholder="adresse mail" name="myMail">
				</label>
				<div>
					<input type="submit" name="submit">
				</div>
				<p><i>Un mot de passe provisoire vous sera envoyez par mail.</i></p>
				<?php if (array_key_exists('error', $_SESSION)) { ?>
					<div class="error"><?php echo $_SESSION['error'] ;?></div>
				  
				<?php unset($_SESSION['error']);
				}?>
			</form>
			<form method="POST" id="passwordLostLeft" action="/index.php?action=updatePassword">
				<p>Rénitialiser Mot de passe</p>
				<label>
					<input type="text"  name="myLogin" placeholder= "identifiant">
				</label>
				<label>
					<input type="password" name="passwordDomisep" placeholder="mot de passe domisep">
				</label>
				<label>
					<input type="password" name="newPassword" placeholder="nouveau mot de passe">
				</label>
				<label>
					<input type="password" name="newPasswordValidate" placeholder="confirmer nouveau mot de passe">
				</label>
				<div>
					<input type="submit" name="submit" value="rénitialiser">
				</div>
				<?php if (array_key_exists('error1', $_SESSION)) { ?>
					<div class="error"><?php echo $_SESSION['error1'] ;?></div>
				  
				<?php unset($_SESSION['error1']);
				}?>
				<?php if (array_key_exists('error2', $_SESSION)) { ?>
					<div class="error"><?php echo $_SESSION['error2'] ;?></div>
				  
				<?php unset($_SESSION['error2']);
				}?>
			</form>
		</div>
		<a href="/index.php?action=login">Se connecter</a>

	</div>
<script type="text/javascript" src="/Public/Js/dataSendScript.js"></script> 
</div>
<?php
$content = ob_get_clean();
require('template.php');