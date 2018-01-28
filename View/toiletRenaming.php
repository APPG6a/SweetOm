<?php 
$title= "Renommer les pièces";
$style = "style.css";
ob_start()?>
<?php  $i=0;?>
<div class="myBody">
	<div id=toiletRenaming>
		<?php if(array_key_exists('error', $_SESSION)){
			echo "<div class='error'>".$_SESSION["error"]."</div>";
			unset($_SESSION['error']);
		}?>
		<p>Renommez le(s) Salle(s) de bain(s)</p>
		<form class="renamingForm" method="POST" action="/index.php?action=toiletRenaming">
		<?php
			while($i < $_SESSION['nbrToilet']){
				$c=$i+1
		?>
			<label for=<?php echo "room".($i+1); ?> class="mySlide">
				<p>Nom de la Sdb <?php echo ($i+1); ?> :</p>
				<input type="text" class="inputForm" id=<?php echo "room".($i+1) ?> name=<?php echo "room".($i+1); ?> required>
				<input type="number" num=1 name=<?php echo "surface".($i+1); ?> placeholder="Superficie en m²" required>
				<div class="send">
					<?php if($i!=$_SESSION['nbrToilet']-1){?>
					<a href="#" class="go" <?php echo "onclick=\"showNextSlides(".$c.")\""?>>Suivant</a>
					<?php } ?>
					<?php if($i==$_SESSION['nbrToilet']-1){?>
						<input type="submit"  value="Valider">
					<?php } ?>
					<?php if($i!=0){?>
					<a href="#" class="go" <?php echo "onclick=\"showPreventSlides(".$i.")\""?>>Précédent</a>
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