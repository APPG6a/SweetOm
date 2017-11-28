<?php 
$title= "messenger";
ob_start()?>
	<div id=CorpsLoadUser.php>
		<!--vérifier si Nb_habt bien arrivé par la méthode POST-->
		<?php
		$_SESSION["superficie"]=$_POST["superficie"];
		$_SESSION["nbrHabt"]=$_POST["nbrHabt"];
		$_SESSION["nbrChambre"]=$_POST["nbrChambre"];
		$_SESSION["nbrToilette"]=$_POST["nbrToilette"];
		$_SESSION["nbrSejour"]=$_POST["nbrSejour"];
		?>


		<form id="form_inscription" method="POST" action="myHouse.php">
			<div id=tete_form></div>
			<p>Pour pouvoir permettre la bonne gestion des pièces veuillez inscrire ci dessous un nom à chaque habitant.</p>
			<?php 
				$_i=0;
				while ($_i!=$_POST["nbrHabt"])
				{
					echo "<input type=\"text\" name=\"habitant".($_i+1)."\"/>";
					echo"<label for=name=\"habitant".($_i+1)."\"/> habitant ".($_i+1)."</label> </br>";
					$_i=$_i+1;
				}
					
				echo"<input type=\"submit\" name=\"submit\" value=\"soumettre\"/>";
			?>
		</form>	
	</div>
<?php
$content = ob_get_clean();
require_once("template.php");