<?php 
$title= "Domisep's Home";
ob_start()?>
	<div>
		<form>
			<input type="search" name="searchUser" id="searchUser"/>
		</form>
	</div>
	 
<?php
$content = ob_get_clean();
require_once("template.php");