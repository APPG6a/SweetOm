<header>
	<?php if(array_key_exists("firstName",$_SESSION) && array_key_exists('lastName', $_SESSION) && array_key_exists('userType', $_SESSION)
	&& array_key_exists('waitingForSignIn', $_SESSION) && !$_SESSION['waitingForSignIn']){
		echo "<div id=\"head1\">
			<div></div>";
		if($_SESSION['userType'] == 'admin'){
			echo "<a href=\"/index.php?action=editDomisepProfil\">Domisep</a>";
		}else{
			echo "<a href=\"/index.php?action=editUserProfil\">".$_SESSION["firstName"]." ".$_SESSION["lastName"]."</a>";
		}
	
			
	echo "</div>";

	}?>
	
	<div id="head2">
		<img src="/Public/Assets/Images/logo.png" alt="logo sweetom" id="logo" width="100px"/>
		<?php if(array_key_exists("firstName",$_SESSION) && array_key_exists('lastName', $_SESSION) && array_key_exists('userType', $_SESSION)){
			echo "<div>
				<a id=\"Déconnexion\" href=\"index.php?action=logout\">Déconnexion</a> 
			</div>"; 
		}?>
	</div>

</header>


