<?php
$title ="Mise à jour des pièces";
$style = "style.css";
ob_start();  ?>

<div class="myBody">
	<div id="updateARoom">
		<?php
		if($listRoom!=null){
			foreach ($listRoom as $aRoom) {?>
				<div class="eachRoom">
					<div><?php echo $aRoom['roomName'] ?></div>
					<form method="POST" action="/index.php?action=addSensorHere">
						<input type="hidden" name="roomName" <?php echo "value='".$aRoom['roomName']."'"  ?>>
						<input type="submit" name="submit" value="Ajouter des capteurs">
					</form>
				</div>
			<?php }
		}else{
			echo "<div class=\"noMessage\">Aucune pièce connectée.</div>";}?>
		 
	</div>
	
</div>

<?php
$content = ob_get_clean();
require('template.php');