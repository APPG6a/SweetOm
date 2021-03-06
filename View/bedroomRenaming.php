<?php 
$title= "Renommer les pièces";
$style = "style.css";
ob_start()?>

	<div class="myBody">

		<?php  $i=0;?>
			<div id=roomRenaming>
				<?php if(array_key_exists('error', $_SESSION)){
					echo "<div class='error'>".$_SESSION["error"]."</div>";
					unset($_SESSION['error']);
				}  ?>
				<p>Renommez les chambres</p>
				<form class="renamingForm" method="POST" action="/index.php?action=bedroomRenaming">
				<?php
					while($i < $_SESSION['nbrBedroom']){
						$c=$i+1;
				?>
					<label for=<?php echo "room".($i+1); ?> class="mySlide">
						<p>Nom de la chambre <?php echo ($i+1); ?> :</p>
						<input type="text" class="inputForm" id=<?php echo "room".($i+1) ?> name=<?php echo "room".($i+1); ?> required>
						<input type="number" min=1 name=<?php echo "surface".($i+1); ?> placeholder="Superficie en m²" required>
						<div class="send">
							<?php if($i!=$_SESSION['nbrBedroom']-1){?>
							<a href="#" class="go" <?php echo "onclick=\"showNextSlides(".$c.")\""?>>Suivant</a>
							<?php } ?>
							<?php if($i==$_SESSION['nbrBedroom']-1){?>
								<input type="submit"  value="Valider">
							<?php } ?>
							<?php if($i!=0){?>
							<a  href="#" class="go" <?php echo "onclick=\"showPreventSlides(".$i.")\""?>>Précédent</a>
							<?php } ?>

						</div>
					</label> 
			
				<?php
					$i++;
					}
				?>
					

				</form>
			</div>
	</div>
<script type="text/javascript" src="/Public/Js/roomRenamingScript.js"></script> 
<?php
$content = ob_get_clean();
require('template.php');