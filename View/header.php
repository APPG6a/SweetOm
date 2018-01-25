<header>
	<?php if(array_key_exists("firstName",$_SESSION) && array_key_exists('lastName', $_SESSION) && array_key_exists('userType', $_SESSION)
	&& array_key_exists('waitingForSignIn', $_SESSION) && !$_SESSION['waitingForSignIn']){
		echo "<div id=\"head1\">
			<div></div>";
		if($_SESSION['userType'] == 'admin'){
			echo "<p>Domisep</p>";
		}else{
			echo "<p>".$_SESSION["firstName"]." ".$_SESSION["lastName"]."</p>";
		}
	
			
	echo "</div>";

	}?>
	
	<div id="head2">
		<img src="/Public/Assets/Images/logo.png" alt="logo sweetom" id="logo" width="100px"/>
		<a href="index.php?action=logout">Déconnexion </a> 
	</div>
</header>


