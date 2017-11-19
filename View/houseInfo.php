<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8 /'>
	<style type="text/css">
		.corps
		{
		background: url("/Public/Assets/Images/sweetomHouseImage4.png") rgba(0,0,0,0.5) no-repeat;
		background-size: 100%;
		padding: 20px;
		}
	</style>

	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Inscription</title>
</head>
<body>
	<?php include("header.php"); ?>

	<div class="corps">

		<form  id="form_inscription" method="POST" action="myHouse.php">

       		
			<div id=tete_form></div>
			
			<input class="info" type="number" name="Superficie" placeholder="Superficie en m²">
			<input class="info" type="number" name="Nb_habt" placeholder="Nombre d'habitants" required/></br>
			<input class="info" type="number" name="Nb_chambre" placeholder="Nombre de chambres" required/>
			<input class="info" type="number" name="Nb_toilette" placeholder="Nombre de salle(s) de bain"></br>
			<input class="info" type="number" name="Nb_sejour" placeholder="Nombre de séjour(s)">
			<input class= "centrer" type="submit" value="j'enregistre mes données">

		</form>
		
	</div>
	

	

	<?php include("footer.php"); ?>


</body>
</html> 