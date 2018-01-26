<?php 
$title= "roomRenaming";
$style = "style.css";
ob_start()?>

		

		<?php  $i=0;?>
			<div id=roomRenaming>
				<p>Renommez les chambres</p>
				<form class="renamingForm" method="POST" action="/index.php?action=bedroomRenaming">
				<?php
					while($i < $_SESSION['nbrBedroom']){
						$c=$i+1
				?>
					<label for=<?php echo "room".($i+1); ?> class="mySlide">
						<p>Nom de la chambre <?php echo ($i+1); ?> :</p>
						<input type="text" class="inputForm" id=<?php echo "room".($i+1) ?> name=<?php echo "room".($i+1); ?> required>
						<input type="text" name=<?php echo "surface".($i+1); ?>>
						<div class="send">
							<?php if($i!=$_SESSION['nbrBedroom']-1){?>
							<p class="next" <?php echo "onclick=\"showNextSlides(".$c.")\""?>>Next</p>
							<?php } ?>
							<?php if($i==$_SESSION['nbrBedroom']-1){?>
								<input type="submit"  value="valider">
							<?php } ?>
							<?php if($i!=0){?>
							<p class="back" <?php echo "onclick=\"showPreventSlides(".$i.")\""?>>Back</p>
							<?php } ?>

						</div>
					</label> 
			
				<?php
					$i++;
					}
				?>
					

				</form>
			</div>
<script type="text/javascript" src="/Public/Js/roomRenamingScript.js"></script> 
<?php
$content = ob_get_clean();
require('template.php');