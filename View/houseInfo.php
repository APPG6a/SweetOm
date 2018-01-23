<?php
$title = "Edit Profil 1";
$style = "style.css";
ob_start()
?>
<div class="corpsHouseInfo">

    <form  id="formInscription" method="POST" action="loadUser.php">


        <div id=teteForm></div>
        
    
        <div class="formBody">
            <p>Nous allons enregistrer vos données. Veuillez indiquer ci-dessous le nombre des différentes pièces que vous souhaitez connecter.</p>
        	 <label for="nbrHabt"> 
        	 	<p>Nombre d'habitant(s):</p> 
        	 	<input class="info" type="number" min=1 max=10 name="nbrHabt" id="nbrHabt"  required/>
        	 </label>
        

        
    
        	<label for="nbrChambre">
        		<p>Nombre de chambre(s):</p>
        		<input class="info" type="number" min=1 max=10 name="nbrChambre" id="nbrChambre" required/>
        	</label>

        	<label for="nbrToilette">
        		<p>Nombre de salle de bain(s):</p>
        		<input class="info" type="number" min=1 max=10 name="nbrToilette" id="nbrToilette" />
        	</label>
   

    
        	<label for="nbrSejour">
        		<p>Nombre de séjour(s):</p>
        		<input class="info" type="number" min=1 max=10 name="nbrSejour" id="nbrSejour" />
        	</label>
        
           <div class="send">
              <input class= "sendData" type="submit" min=1 max=10 value=">>valider"/> 
           </div>

       </div>
    </form>

</div>
<?php
$content = ob_get_clean();
require_once("template.php");