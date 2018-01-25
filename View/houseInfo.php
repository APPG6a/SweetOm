<?php
$title = "Edit Profil 1";
$style = "style.css";
ob_start()
?>
<div class="corpsHouseInfo">

    <form  id="formInscription" method="POST" action="/index.php?action=houseInfo">


        <div id=teteForm></div>
        
    
        <div class="formBody">
            <p>Nous allons enregistrer vos données. Veuillez indiquer ci-dessous le nombre des différentes pièces que vous souhaitez connecter.</p>
        	 <label for="nbrHabitant"> 
        	 	<p>Nombre d'habitant(s):</p> 
        	 	<input class="info" type="number" min=1 max=10 name="nbrHabitant" id="nbrHabitant"  required/>
        	 </label>
        

        
    
        	<label for="nbrBedroom">
        		<p>Nombre de chambre(s):</p>
        		<input class="info" type="number" min=1 max=10 name="nbrBedroom" id="nbrBedroom" required/>
        	</label>

        	<label for="nbrToilet">
        		<p>Nombre de salle de bain(s):</p>
        		<input class="info" type="number" min=1 max=10 name="nbrToilet" id="nbrToilet" />
        	</label>
   

    
        	<label for="nbrLivingRoom">
        		<p>Nombre de séjour(s):</p>
        		<input class="info" type="number" min=1 max=10 name="nbrLivingRoom" id="nbrLivingRoom" />
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