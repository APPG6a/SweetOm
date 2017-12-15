<?php 
$title= "House connection";
$style = "style.css";
ob_start()?>

	<div class="corps">
		<?php 
			// On devra vérifier que les variables sont biens arrivées//
			echo "<form  id=userInfo method=\"POST\" action=\"homeUser.php\">";


			$_i=0;
			$_j=0;

			echo"<div id=corpsChambre>
				<p>Connecter chambre(s)</p>";
			while($_i != $_SESSION["nbrChambre"])  
			// on personalise la chambre i+1 en fonction du nom de la chambre des capteurs et des habitants associés
			{
				echo "<fieldset class=pieceChambre>
		
					</br> <select  name=\"chambre ".($_i+1)."\" >  
					<option> chambre des parents </option>
					<option> chambre enfant(s) 1 </option>
					<option> chambre enfant(s) 2 </option>
					<option> chambre enfant(s) 3 </option>
					<option> chambre enfant(s) 4 </option>
					<option> chambre hôte 1 </option>
					<option> chambre hôte 2 </option>
					<option> chambre hôte 3 </option>
					<option> Ma chambre </option>"; 
					//choisir un com de chambre spécifique pour la chambre i+1 

				echo "</select> 
					</br> <input type=\"checkbox\" id=\"capteur-lum\" name=\"capteur-lum\" > <label for=\"capteur-lum\">capteur lumière </label> <br/>
					<input  type=\"checkbox\" id=\"capteur-fum\" name=\"capteur-fum\" > <label for=\"capteur-fum\">capteur fumée </label> <br/>
					<input  type=\"checkbox\" id=\"capteur-hum\" name=\"capteur-hum\" > <label for=\"capteur-hum\">capteur humidité </label> <br/>
					<input  type=\"checkbox\" id=\"capteur-int\" name=\"capteur-int\" > <label for=\"capteur-int\">capteur intrusion </label> <br/>
					<input  type=\"checkbox\" id=\"capteur-tem\" name=\"capteur-tem\" > <label for=\"capteur-tem \">capteur température </label> <br/>"; 
					//choisir des capteurs pour chaque pièce
			

				
				echo " </br> Associer habitant(s)</br>";
				while($_j!=$_SESSION["nbrHabt"])
				// associé ou non l'habitant j+1 à la chambre i+1
				{	
					echo "<input  type=\"checkbox\" id=\"habitant".($_j+1)."\" name=\"habitant".($_j+1)."\" > 
					<label for=\"habitant".($_j+1)."\"> ".$_POST["habitant".($_j+1).""]." </label> <br/>";
						$_j=$_j+1; // le procédé recommence jusqu'à atteidre le nombre d'habitant prédéfinit
				}
				$_j=0;
				echo"</fieldset>";
				$_i=$_i+1; // fin la chambre i+1, le procédé reprend jusqu'à atteindre le nombre de chambre prédéfinit
			}
			$_i=0;

			echo"</div>";

			echo "<div id=corpsToilette>
			<p> Connecter toillete(s) </p>";
			while($_i!=$_SESSION["nbrToilette"])  //Idem pour les toilettes
			{
				echo "<fieldset class=pieceToilette>
			
					</br> <select name=\"toilette-".($_i+1)."\" >
					<option> toillete chambre des parents </option>
					<option> toillete pour enfant(s) 1 </option>
					<option> toillete pour enfant(s) 2 </option>
					<option> toillete pour enfant(s) 3 </option>
					<option> toillete pour enfant(s) 4 </option>
					<option> toillete pour hôte 1 </option>
					<option> toillete pour hôte 2 </option>
					<option> toillete pour hôte 3 </option>
					<option> Mes toilletes </option>";

				echo "</select>
				</br> <input type=\"checkbox\" id=\"capteur-lum\" name=\"capteur-lum\" > <label for=\"capteur-lum\">capteur lumière </label> <br/>
				<input  type=\"checkbox\" id=\"capteur-fum\" name=\"capteur-fum\" > <label for=\"capteur-fum\">capteur fumée </label> <br/>
				<input  type=\"checkbox\" id=\"capteur-hum\" name=\"capteur-hum\" > <label for=\"capteur-hum\">capteur humidité </label> <br/>
				<input  type=\"checkbox\" id=\"capteur-int\" name=\"capteur-int\" > <label for=\"capteur-int\">capteur intrusion </label> <br/>
				<input  type=\"checkbox\" id=\"capteur-tem\" name=\"capteur-tem\" > <label for=\"capteur-tem \">capteur température </label> <br/>";
		
				$_i=$_i+1;
				echo "</br> Associer habitant-s) </br>";
				
				while($_j!=$_SESSION["nbrHabt"])
				{	
					echo "<input  type=\"checkbox\" id=\"habitant".($_j+1)."\" name=\"habitant".($_j+1)."\" > 
					<label for=\"habitant ".($_j+1)."\"> ".$_POST["habitant ".($_j+1).""]." </label> <br/>";
					$_j=$_j+1;
				}
				$_j=0;
				echo"</fieldset>";
			}
			$_i=0;
			
			echo "</div>";


	
			echo "<div id=corpsSejour>
		 	<p>Connecter séjour(s)</p>";
			while( $_i != $_SESSION["nbrSejour"])  // Idem pour le(s) sejour(s)
			{
				echo "<fieldset class=pieceSejour> 
					
					</br> <select  name=\"sejour_".($_i+1)."\" >
					<option> Mon séjour </option>
					<option> séjour 1 </option>
					<option> séjour 2 </option>
					<option> séjour 3 </option>";
			

				echo "</select>
				</br> <input type=\"checkbox\" id=\"capteur-lum\" name=\"capteur-lum\" > <label for=\"capteur-lum\">capteur lumière </label> <br/>
				<input  type=\"checkbox\" id=\"capteur-fum\" name=\"capteur-fum\" > <label for=\"capteur-fum\">capteur fumée </label> <br/>
				<input  type=\"checkbox\" id=\"capteur-hum\" name=\"capteur-hum\" > <label for=\"capteur-hum\">capteur humidité </label> <br/>
				<input  type=\"checkbox\" id=\"capteur-int\" name=\"capteur-int\" > <label for=\"capteur-int\">capteur intrusion </label> <br/>
				<input  type=\"checkbox\" id=\"capteur-tem\" name=\"capteur-tem\" > <label for=\"capteur-tem \">capteur température </label> <br/>";
			
				$_i=$_i+1;
				echo "</br> Associer habitant(s) <br/>";
				while($_j!=$_SESSION["nbrHabt"]) 
				{	
					echo "<input  type=\"checkbox\" id=\"habitant".($_j+1)."\" name=\"habitant ".($_j+1)."\" > 
					<label for=\"habitant ".($_j+1)."\"> ".$_POST["habitant".($_j+1).""]." </label> <br/>";
					$_j=$_j+1;
				}
				$_j=0;
				echo"</fieldset>";
			$_i=0;
			}


			echo "</div>";
			echo "<input class=\"boutonSubmit\" type=\"submit\" value=\"J'enregistre mes données\">";
					
			echo "</form>";
		?>
	</div>
<?php
$content = ob_get_clean();
require_once("template.php");