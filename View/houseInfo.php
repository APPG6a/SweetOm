<?php
$title = "Edit Profil 1";
$style = "style.css";
ob_start()
?>
<div class="corpsHouseInfo">

    <form  id="formInscription" method="POST" action="loadUser.php">


        <div id=teteForm></div>
        <p>Nous allons enregistrer vos données. Veuillez indiquer ci-dessous le nombre des différentes pièces que vous souhaitez connecter.</p>
        <div class="info">
        	<label for="superficie">
        		<p>Superficie en m²: </p>
        		<input class="info" type="number" name="superficie" id="superficie" />
        	</label>
        	 <label for="nbrHabt"> 
        	 	<p>Nombre d'habitant(s)</p> 
        	 	<input class="info" type="number" name="nbrHabt" id="nbrHabt"  required/>
        	 </label>
        </div>

        
        <div class="info">
        	<label for="nbrChambre">
        		<p>Nombre de chambre(s):</p>
        		<input class="info" type="number" name="nbrChambre" id="nbrChambre" required/>
        	</label>
        	<label for="nbrToilette">
        		<p>Nombre de salle de bain(s):</p>
        		<input class="info" type="number" name="nbrToilette" id="nbrToilette" />
        	</label>
        </div>

        <div class="info">
        	<label for="nbrSejour">
        		<p>Nombre de séjour(s)</p>
        		<input class="info" type="number" name="nbrSejour" id="nbrSejour" />
        	</label>
        </div>
        
       <div class="formFoot">
          <input class= "boutonSubmit" type="submit" value="j'enregistre mes données"/> 
       </div>
        




    </form>

</div>
<?php
$content = ob_get_clean();
require_once("template.php");