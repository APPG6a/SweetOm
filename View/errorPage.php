<?php 
$title= "Erreur";
$style = "style.css";
ob_start()?>

<div class="myBody">
	<div id="errorBlock">
		<div>
			<img src="./Public/Assets/Images/error.jpg">
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
<?php
$content = ob_get_clean();
require("template.php");