<?php 
$title= "Edit profil";
$style = "style.css";
ob_start()?>
	<div id="Corps">
        <div id="domisepInfo">
            <div>Adresse: <?php echo $domisepInfo["address"]; ?></div>
            <div>Numéro de télephone: <?php echo $domisepInfo["phoneNumber"];?></div>
            <div>Adresse Mail: <?php echo $domisepInfo["mail"];?></div>
            <button onclick="openForm()">Mettre à jour</button>
        </div>

    <?php $address = preg_split("/[__]+/",$domisepInfo['address']);?>
		<form id="editDomisepProfil" method="POST" action="/index.php?action=modifyDomisep">
	
			<div id="editDomisepProfilHead">Informations de Domisep</div>
			<div class="formBody">
				<label for="adresseDomisep">
					<p>Adresse</p>
					 <?php echo"<input type=\"text\"  name=\"address\" id=\"adresseDomisep\" value='".$address["0"]."' required/>"; ?>
				</label>
				<label for="villeDomisep">
					<p>Ville</p>
					 <?php echo"<input type=\"text\"  name=\"city\" id=\"villeDomisep\" value='".$address["2"]."' required/>"; ?>
				</label>
				<label for="codePostalDomisep">
					<p>Code postal</p>
					  <?php echo"<input type=\"tel\"  name=\"cp\" id=\"codePostalDomisep\" value='".$address["1"]."' required/>"; ?>
				</label><br/>  

				<label for="numTelDomisep">
					<p>Numéro de téléphone</p>
					<?php echo "<input type=\"tel\"  name=\"phoneNumber\" id=\"numTelDomisep\" value='".$domisepInfo["phoneNumber"]."' required/>"; ?>
				</label>
				<label for="mailDomisep">
					<p>adresse mail</p>
					<?php echo "<input id=\"mailDomisep\" type=\"mail\" name=\"mail\" value='".$domisepInfo["mail"]."' required/>"; ?>
				</label>  
				<div class="send">
					<input type="submit"  name="submit" value=">>soumettre" class="sendData">
				</div>
			</div>

		</form>
		
	</div>
<script type="text/javascript" src="/Public/Js/editDomisepScript.js"></script>
<?php
$content = ob_get_clean();
require("template.php");