<?php 
$title= "messenger";
ob_start()?>
	<div id="corpsLoadUser">
		<!--vérifier si Nb_habt bien arrivé par la méthode POST-->
		<?php
		$_SESSION["superficie"]=$_POST["superficie"];
		$_SESSION["nbrHabt"]=$_POST["nbrHabt"];
		$_SESSION["nbrChambre"]=$_POST["nbrChambre"];
		$_SESSION["nbrToilette"]=$_POST["nbrToilette"];
		$_SESSION["nbrSejour"]=$_POST["nbrSejour"];
		?>


		<form id="formInscription" method="POST" action="myHouse.php">
			<div id=teteForm></div>
			<p>Pour pouvoir permettre la bonne gestion des pièces veuillez inscrire ci dessous un nom à chaque habitant.</p>
			<div id="hbt">
			<?php 
				
				$_i=0;
				// Une boucle pour afficher des champs de texte en fonction du nombre d'habitant posté nous allons donner des noms à chaque habitant.
				while ($_i!=$_POST["nbrHabt"]){
					$_c=$_i+1;
					echo "<label for=\"habitant".($_c)."\"> 
						<p> habitant ".($_c)."</p>
						<input type=\"text\" name=\"habitant".($_c)."\" id=\"habitant".($_c)."\" required/>
						</label>";
					$_i++;
				}?>
			</div>
			<div class="formFoot">
				<input class=\"boutonSubmit\" type=\"submit\" name=\"submit\" value=\"Envoyer\"/>"
			</div>
					
		</form>	
		
	</div>
<?php
$content = ob_get_clean();
require_once("template.php");