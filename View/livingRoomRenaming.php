<?php 
$title= "roomRenaming";
$style = "style.css";
ob_start()?>
<?php  $i=0;?>
<div class= "myBody">
	<div id=livingRoomRenaming>
		<p>Renommez le(s) Séjour(s)</p>
		<form class="renamingForm" method="POST" action="/index.php?action=livingRoomRenaming">
		<?php
			while($i < $_SESSION['nbrLivingRoom']){
				$c=$i+1
		?>
			<label for=<?php echo "room".($i+1); ?> class="mySlide">
				<p>Nom du séjour <?php echo ($i+1); ?> :</p>
				<input type="text" class="inputForm" id=<?php echo "room".($i+1) ?> name=<?php echo "room".($i+1); ?> required>
				<input type="number" min=1 name=<?php echo "surface".($i+1); ?> placeholder="Superficie en m²" required>
				<div class="send">
					<?php if($i!=$_SESSION['nbrLivingRoom']-1){?>
					<a href="#" class="next" <?php echo "onclick=\"showNextSlides(".$c.")\""?>>Suivant</a>
					<?php } ?>
					<?php if($i==$_SESSION['nbrLivingRoom']-1){?>
						<input type="submit"  value="valider">
					<?php } ?>
					<?php if($i!=0){?>
					<a href="#" class="back" <?php echo "onclick=\"showPreventSlides(".$i.")\""?>>Précédent</a>
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

