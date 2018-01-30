<?php 
$title= "Renommer les pièces";
$style = "style.css";
ob_start()?>
	<div class="myBody">
			<div id=roomRenaming>
				<?php if(array_key_exists('error', $_SESSION)){
					echo "<div class='error'>".$_SESSION["error"]."</div>";
					unset($_SESSION['error']);
				}  ?>
				<p>Donnez un nom à cette pièce</p>
				<form class="renamingForm" method="POST" action="/index.php?action=newRoomRenaming">
						<p>Nom de la pièce :</p>
						<div class="newRoom">
							<input type="text" class="inputForm"  name="room1" required>
							<input type="number" min=1 name="surface1" placeholder="Superficie en m²" required>
						</div>
			
						<div class="send">
							<input type="submit"  value="Valider">
						</div>
				</form>
			</div>
	</div>
<?php
$content = ob_get_clean();
require('template.php');

