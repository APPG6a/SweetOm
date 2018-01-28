<?php 
$title= "Erreur";
$style = "style.css";
ob_start()?>

<div class="myBody">
	<div id="errorBlock">
		<p id="errorHead">Message d'erreur</p>
		<div id="errorBody">
			<div id="errorLogo">
				!
			</div>
			
			<div id="errorText">
				<div>
					<?php
					if(array_key_exists('error', $_SESSION)){
						echo $_SESSION['error'];
					} 
					unset($_SESSION['error']);?>
				</div>
			
			</div>
		</div>
</div>
	</div>
	
<?php
$content = ob_get_clean();
require("template.php");