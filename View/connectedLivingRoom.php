<?php
$title = 'Connecter  le(s) salles de séjour';
$style = "style.css";
ob_start();

?>
<div>
	
	<div id="connectedRoom">
		<form class="renamingForm" method="POST" action="/index.php?action=connectedLivingRoom">
			<?php
			$i = 0;
			foreach ($_SESSION['listLivingRoom'] as $aRoom) {
				$c= $i+1; ?>
				<div class = "mySlide">
					<strong>Connecté la Séjour : <?php echo $aRoom; ?></strong>
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
						<?php if($i!=count($_SESSION['listLivingRoom'])-1){?>
						<p class="next" <?php echo "onclick=\"showNextSlides(".$c.")\""; ?>>Next</p>
						<?php } ?>
						<?php if($i== count($_SESSION['listLivingRoom'])-1){?>
							<input type="submit"  value="valider">
						<?php } ?>
						<?php if($i!=0){?>
						<p class="back" <?php echo "onclick=\"showPreventSlides(".$i.")\""; ?>>Back</p>
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