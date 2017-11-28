<?php 
$title= "House connection";
ob_start()?>

	<div class="Corps">
		<?php 
			// Vérifier que les variables sont biens arrivées//
			echo "<form  id=user_info method=\"POST\" action=\"accueil_utilisateur.php\">";


			$_i=0;
			$_j=0;

			echo"<div id=corps_chambre>
				<p>Connecter chambre(s)</p>";
			while($_i != $_SESSION["nbrChambre"])  // Récupérer chaque nom de chambre enregistrer dans la base 
			{
				echo "<fieldset class=piece_chambre>
		
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

				echo "</select>
					</br> <input type=\"checkbox\" name=\"capteur-lum\" > <label for=\"capteur-lum\">capteur lumière </label> <br/>
					<input  type=\"checkbox\" name=\"capteur-fum\" > <label for=\"capteur-fum\">capteur fumée </label> <br/>
					<input  type=\"checkbox\" name=\"capteur-hum\" > <label for=\"capteur-hum\">capteur humidité </label> <br/>
					<input  type=\"checkbox\" name=\"capteur-int\" > <label for=\"capteur-int\">capteur intrusion </label> <br/>
					<input  type=\"checkbox\" name=\"capteur-tem\" > <label for=\"capteur-tem \">capteur température </label> <br/>";
			

				$_i=$_i+1;
				echo " </br> Associer habitant(s)</br>";
				while($_j!=$_SESSION["nbrHabt"]) //pareil pour les habitant
				{	
					echo "<input  type=\"checkbox\" name=\"habitant".($_j+1)."\" > 
					<label for=\"habitant".($_j+1)."\"> ".$_POST["habitant".($_j+1).""]." </label> <br/>";
						$_j=$_j+1;
				}
				$_j=0;
				echo"</fieldset>";
			}
			$_i=0;

			echo"</div>";

			echo "<div id=corps_toilette>
			<p> Connecter toillete(s) </p>";
			while($_i!=$_SESSION["nbrToilette"])  //Idem pour les toilettes
			{
				echo "<fieldset class=piece_toilette>
			
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
				</br> <input type=\"checkbox\" name=\"capteur-lum\" > <label for=\"capteur-lum\">capteur lumière </label> <br/>
				<input  type=\"checkbox\" name=\"capteur-fum\" > <label for=\"capteur-fum\">capteur fumée </label> <br/>
				<input  type=\"checkbox\" name=\"capteur-hum\" > <label for=\"capteur-hum\">capteur humidité </label> <br/>
				<input  type=\"checkbox\" name=\"capteur-int\" > <label for=\"capteur-int\">capteur intrusion </label> <br/>
				<input  type=\"checkbox\" name=\"capteur-tem\" > <label for=\"capteur-tem \">capteur température </label> <br/>";

				$_i=$_i+1;
				echo "</br> Associer habitant-s) </br>";
				
				while($_j!=$_SESSION["nbrHabt"]) //pareil pour les habitant
				{	
					echo "<input  type=\"checkbox\" name=\"habitant".($_j+1)."\" > 
					<label for=\"habitant ".($_j+1)."\"> ".$_POST["habitant ".($_j+1).""]." </label> <br/>";
					$_j=$_j+1;
				}
				$_j=0;
				echo"</fieldset>";
			}
			$_i=0;
			
			echo "</div>";


	
			echo "<div id=corps_sejour>
		 	<p>Connecter séjour(s)</p>";
			while( $_i != $_SESSION["nbrSejour"])  // Idem pour le(s) sejour(s)
			{
				echo "<fieldset class=piece_sejour> 
					
					</br> <select  name=\"sejour_".($_i+1)."\" >
					<option> Mon séjour </option>
					<option> séjour 1 </option>
					<option> séjour 2 </option>
					<option> séjour 3 </option>";
			

				echo "</select>
				</br> <input type=\"checkbox\" name=\"capteur-lum\" > <label for=\"capteur-lum\">capteur lumière </label> <br/>
				<input  type=\"checkbox\" name=\"capteur-fum\" > <label for=\"capteur-fum\">capteur fumée </label> <br/>
				<input  type=\"checkbox\" name=\"capteur-hum\" > <label for=\"capteur-hum\">capteur humidité </label> <br/>
				<input  type=\"checkbox\" name=\"capteur-int\" > <label for=\"capteur-int\">capteur intrusion </label> <br/>
				<input  type=\"checkbox\" name=\"capteur-tem\" > <label for=\"capteur-tem \">capteur température </label> <br/>";

				$_i=$_i+1;
				echo "</br> Associer habitant(s) <br/>";
				while($_j!=$_SESSION["nbrHabt"]) //pareil pour les habitant
				{	
					echo "<input  type=\"checkbox\" name=\"habitant ".($_j+1)."\" > 
					<label for=\"habitant ".($_j+1)."\"> ".$_POST["habitant".($_j+1).""]." </label> <br/>";
					$_j=$_j+1;
				}
				$_j=0;
				echo"</fieldset>";
			$_i=0;
			}


			echo "</div>";
			echo "<input class=centrer type=\"submit\" value=\"J'enregistre mes données\">";
					
			echo "</form>";
		?>
	</div>
<?php
$content = ob_get_clean();
require_once("template.php");