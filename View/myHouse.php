<?php session_start()?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta  charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../Public/Style/style.css">
</head>
<body>
	<div class="Corps">
		<?php 
			$jour=date('d');
			$mois=date('m');
			$annee=date('Y');
			
			// Veuillez afficher le nom de l'utilisateur//
			echo "<form  id=user_info method=\"POST\" action=\"accueil_utilisateur.php\">";

				if (isset($_POST["Nb_habt"]) and isset($_POST["Nb_chambre"])  and isset($_POST["Nb_sejour"]) and isset($_POST["Nb_toilette"])) // on teste si ces données sont bien arrivées
				{	
					if ( $_POST["Nb_habt"]>=1 and $_POST["Nb_chambre"]>=1  and $_POST["Nb_sejour"]>=0 and $_POST["Nb_toilette"]>=0) 
					{
						$_i=0;
						$_j=0;

						echo"<div id=corps_chambre>
							<p>Connecter chambre(s)</p>";
						while($_i!=$_POST["Nb_chambre"])  // Récupérer chaque nom de chambre enregistrer dans la base 
						{
							echo "<div class=piece_chambre>
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
								</br> <input type=\"checkbox\" name=\"c_lum\" > <label for=\"c_lum ".($_j+1)."\">capteur lumière </label> </br>
								<input  type=\"checkbox\" name=\"c_fum\" > <label for=\"c_fum ".($_j+1)."\">capteur fumée </label> </br>
								<input  type=\"checkbox\" name=\"c_hum\" > <label for=\"c_hum ".($_j+1)."\">capteur humidité </label> </br>
								<input  type=\"checkbox\" name=\"c_lum\" > <label for=\"c_int ".($_j+1)."\">capteur intrusion </label> </br>
								<input  type=\"checkbox\" name=\"c_lum\" > <label for=\"c_tem ".($_j+1)."\">capteur température </label> </br>";
						

							$_i=$_i+1;
							echo " </br> Associer habitant(s)</br>";
							while($_j!=$_POST["Nb_habt"]) //pareil pour les habitant
							{	
								echo "<input  type=\"checkbox\" name=\"habitant ".($_j+1)."\" > <label for=\"habitant ".($_j+1)."\">habitant ".($_j+1)."</label> </br>";
								$_j=$_j+1;
							}
							$_j=0;
							echo"</div>";
						}
						$_i=0;

						echo"</div>";

						if ($_POST["Nb_toilette"]>0)
						{
							echo "<div id=corps_toilette>
							<p> Connecter toillete(s) </p>";
							while($_i!=$_POST["Nb_toilette"])  //Idem pour les toilettes
							{
								echo "<div class=piece_toilette>
									</br> <select name=\"salle_de_bain ".($_i+1)."\" >
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
									</br> <input  type=\"checkbox\" name=\"c_lum\" > <label for=\"c_lum ".($_j+1)."\">capteur lumière </label> </br>
									<input  type=\"checkbox\" name=\"c_fum\" > <label for=\"c_fum ".($_j+1)."\">capteur fumée </label> </br>
									<input  type=\"checkbox\" name=\"c_hum\" > <label for=\"c_hum ".($_j+1)."\">capteur humidité </label> </br>
									<input  type=\"checkbox\" name=\"c_lum\" > <label for=\"c_int ".($_j+1)."\">capteur intrusion </label> </br>
									<input  type=\"checkbox\" name=\"c_lum\" > <label for=\"c_tem ".($_j+1)."\">capteur température </label> </br>";
							
				
								$_i=$_i+1;
								echo "</br> Associer habitant-s) </br>";
								
								while($_j!=$_POST["Nb_habt"]) 
								{	
									echo "<input  type=\"checkbox\" name=\"habitant ".($_j+1)."\" > <label for=\"habitant ".($_j+1)."\">habitant ".($_j+1)."</label> </br>";
									$_j=$_j+1;
								}
								$_j=0;
								echo"</div>";
						}
						$_i=0;
						
						echo "</div>";

						}
						
						if ($_POST["Nb_sejour"]>0)
						{
							echo "<div id=corps_sejour>
						 	<p>Connecter séjour(s)</p>";
							while($_i!=$_POST["Nb_sejour"])  // Idem pour le(s) sejour(s)
							{
								echo "<div class=piece_sejour> 
									</br> <select  name=\"sejour ".($_i+1)."\" >
									<option> Mon séjour </option>
									<option> séjour 1 </option>
									<option> séjour 2 </option>
									<option> séjour 3 </option>";
							

								echo "</select>
									</br> <input  type=\"checkbox\" name=\"c_lum\" > <label for=\"c_lum ".($_j+1)."\">capteur lumière </label> </br>
									<input  type=\"checkbox\" name=\"c_fum\" > <label for=\"c_fum ".($_j+1)."\">capteur fumée </label> </br>
									<input  type=\"checkbox\" name=\"c_hum\" > <label for=\"c_hum ".($_j+1)."\">capteur humidité </label> </br>
									<input  type=\"checkbox\" name=\"c_lum\" > <label for=\"c_int ".($_j+1)."\">capteur intrusion </label> </br>
									<input  type=\"checkbox\" name=\"c_lum\" > <label for=\"c_tem ".($_j+1)."\">capteur température </label> </br>";
							

								$_i=$_i+1;
								echo "</br> Associer habitant(s) </br>";
								while($_j!=$_POST["Nb_habt"]) 
								{	
									echo "<input  type=\"checkbox\" name=\"habitant ".($_j+1)."\" > <label for=\"habitant ".($_j+1)."\">habitant ".($_j+1)."</label> </br>";
									$_j=$_j+1;
								}
								$_j=0;
								echo"</div>";
						    }
					
						}
						$_i=0;


						echo "</div>";
						echo "<input class=centrer type=\"submit\" value=\"J'enregistre mes données\">";
						}
						else
						{
							echo "> ici </a>";
						}
					
					}
				else
				{
					echo "> ici </a>";
				}
		echo "</form>";
		?>
	</div>
</body>
</html>