<?php
$title = 'Edition du catalogue';
$style = 'style.css';
ob_start();?>



<div id="newSensor">
   <form id="newSensorForm" action="/index.php?action=insertNewSensorIntoDb" method="post" enctype="multipart/form-data">
      <div id="newSensorFormHead">Ajout d'un nouveau capteur</div>

      <div id="newSensorFormBody">
         <label for="picture">
            <p>Photo</p> 
            <input type="file" id="picture" name="picture" required/> 
         </label>
 
         <input type="hidden" name="max_file_size" value="3145728" required>

         <label for="name">
            <p>Nom</p>
            <input type="text" id="nom_catalog" name="name" required/>
         </label> 

         <label for="description">
            <p>Description</p>
            <textarea id="description" name="description" rows=10 cols=50 required></textarea>
         </label> 
         

         <label for="price">
            <p>Price</p> 
            <input id="price" min=0 type="number" name="price" placeholder="prix en euros" required/>
         </label>
            
      
         <label for="type">
            <p>Type de capteur</p>
            <select name="type">
            <?php foreach ($listTypesSensors as $aType) {
            echo "<option value=" . $aType . ">" . $aType . "</option>";}?>
            </select>
         </label>

      
         <label for="modele">
            <p>Modèle</p>
            <input  id="modele" type="text" name="model" required/>
         </label>  

         <div class="send">
            <input class="sendData" type="submit" value = ">>Envoyer" required/> <br/>
         </div>
      </div>
   
     
    
   </form>
</div>
<?php 

$content = ob_get_clean();
require('template.php'); 