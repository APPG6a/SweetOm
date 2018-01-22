<header>
	<?php if(array_key_exists("connected",$_SESSION)){
	echo "<div id=\"head1\">
			<div></div>
			<p>".$_SESSION["firstName"]." ".$_SESSION["lastName"]."</p>
	</div>";

	}?>
	
	<div id="head2">
		<img src="/Public/Assets/Images/logo.png" alt="logo sweetom" id="logo" width="100px"/>
		<a href="index.php?action=logout">Déconnexion </a> 
	</div>
</header>


