<?php
$title = 'Edition du prpofil';
$style = 'style.css';
ob_start(); ?>

<div class="myBody">
	<div class = "updateUserRoom">
		<a href="/index.php?action=updateARoom">Ajouter des capteurs à une pièce</a>
		<a href="/index.php?action=addNewRoom">Connecter une nouvelle pièce</a>
	</div>
	
</div>

<?php
$content = ob_get_clean();
require('template.php');