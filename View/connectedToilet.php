<?php
$title = 'Connecter les chambres';
$style = "style.css";
ob_start();

?>
<div class= "myBody">
	
	<div id="connectedRoom">
		<form class="renamingForm" method="POST" action="/index.php?action=connectedToilet">
			<?php
			$i = 0;
			foreach ($_SESSION['listToilet'] as $aRoom) {
				$c= $i+1; ?>
				<div class = "mySlide">
					<strong>Connecté la Salle de bain : <?php echo $aRoom; ?></strong>
					<div class="sensor">
			<?php foreach ($listCatalog as $capteurType){
						$d = 1;
				?>
						
						<label class="sensorByType" for=<?php echo $capteurType[0]; ?>>
							<p><?php echo $capteurType[0]  ?></p>
							<select name=<?php echo $capteurType[0].($i+1);?>>
								<option>Aucun</option>
								<?php for ($j = count($capteurType)-1; $j>0; $j=$j-1){?>
								<option><?php echo $capteurType[$j]['Model']; ?></option>
								<?php } ?>
							</select>
						</label>
					
					
			<?php } ?>
			 		</div>
					 <div class="send">
						<?php if($i!=count($_SESSION['listToilet'])-1){?>
						<a href="#" class="next" <?php echo "onclick=\"showNextSlides(".$c.")\""; ?>>Next</a>
						<?php } ?>
						<?php if($i== count($_SESSION['listToilet'])-1){?>
							<input type="submit"  value="valider">
						<?php } ?>
						<?php if($i!=0){?>
						<a href="#" class="back" <?php echo "onclick=\"showPreventSlides(".$i.")\""; ?>>Back</a>
						<?php } ?>
					</div>
				</div>
				
			<?php 
			$i++;
			} ?>
		</form>
	</div>
</div>
<script type="text/javascript" src="/Public/Js/roomRenamingScript.js"></script> 
<?php 
$content = ob_get_clean();
require('template.php');