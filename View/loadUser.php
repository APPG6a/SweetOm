<?php 
$title= "messenger";
ob_start()?>
	<div id=CorpsloadUser.php>
		<!--vérifier si Nb_habt bien arrivé par la méthode POST-->
		<?php
		$_SESSION["superficie"]=$_POST["supreficie"];
		$_SESSION["nb-habt"]=$_POST["nb-habt"];
		$_SESSION["nb-chambre"]=$_POST["nb-chambre"];
		$_SESSION["nb-toilette"]=$_POST["nb-toilette"];
		$_SESSION["nb-sejour"]=$_POST["nb-sejour"];
		?>


		<form id="form_inscription" aaction="myHouse.php">
			<div id=tete_form></div>
			<p>Pour pouvoir permettre la bonne gestion des pièces veuillez inscrire ci dessous le(s) nom(s) des différents habitants.</p>
			<?php 
				$i=0;
				while ($i!=$_POST["Nb_habt"])
				{
					echo "<input type=\"text\" name=\"habitant ".$i+1."\"> <label for= \"habitant ".$i+1."\"> habitant ".$i+1."</label> <br>";
					$i=$i+1;
				}
					
				echo"<input type=\"submit\" name=\"submit\" value=\"soumettre\">";
			?>
		</form>	
	</div>
<?php
$content = ob_get_clean();
require_once("template.php");