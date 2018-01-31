<footer>

	<div id="footer1">
		<?php if(array_key_exists("firstName",$_SESSION) && array_key_exists('lastName', $_SESSION) && array_key_exists('userType', $_SESSION)){
			echo "<div id=\"deconnection\">
					<a id=\"Déconnexion\" href=\"/index.php?action=logout\"> Déconnexion </a><br/>
				</div>";
			}?>

	<?php  $address= preg_split("/[__]+/",$_SESSION['domisepAddress']);?>
		<div id="Informations">
			<h1>Informations pratiques</h1>
			<p>DOMISEP<br/>
			<?php echo $address[0]; ?><br/>
			<?php echo $address[1]." ".$address[2];?><br/>
			<?php echo $_SESSION['domisepPhoneNumber']; ?></p>
		</div>

		<div id="CGU">
			<a id="CGU" href="/index.php?action=cgu">Conditions générales d'utilisation </a><br/>
		</div>
		</div>
	<div id="Designed">
		<p id="SweetIt">Designed by SweetIT<em>©</em></p><br/>
	</div>
	
</footer>

