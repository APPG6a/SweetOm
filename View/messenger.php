<?php 
$title= "messenger";
$style = "style.css";
ob_start()?>

	<div class = "myBody">
		<div id="corpsMessenger">
		<!--Presentation a revoir-->
			<div id="menuMessage">
				<div></div>
				<p class="link"  onclick="showSlides(1)">Ecrire un message</p>
				<p class="link"  onclick="showSlides(2)">Boîte de réception</p>
				<p class="link"  onclick="showSlides(3)">Messages envoyés</p>
			</div> 

			<div id="typeMessage">
				<div  class="mySlide">
					<div id="smsEcrit">

						<form method="POST" action="/index.php?action=sendMessage">
							<?php if(array_key_exists('errorLogin', $_SESSION) && $_SESSION['errorLogin']){
							  	echo "<div class=\"error\">Désolé, l'envoi du message à échouer, ce login n'éxiste pas. Veuillez entrer un login valide.</div>";
							  	unset($_SESSION['errorLogin']);
							  } ?>
							<input id="objetMessage" class="inputSendMessage" type="text" name="object" size="80" placeholder="objet" required/> 
							<?php if(array_key_exists('userType', $_SESSION) && $_SESSION['userType']=='admin'){?>
							<label for="receverMessage" class="inputSendMessage">
								<p>Envoyer à:</p>
								<input id="receverMessage" type="text" size="60" name="receiver" placeholder="identifiant" required/> 
							</label> <?php }else if(array_key_exists('userType', $_SESSION) && $_SESSION['userType']!='admin'){?>
							  <input id="receverMessage" class="inputSendMessage" type="hidden" size="60" name="receiver" placeholder="identifiant" value="domisep" required/> <?php } ?>
				
							<textarea id="message" class="inputSendMessage" name="text" placeholder="Ecrire message" rows="20" cols="80" required></textarea>

							<div class="send">
								<input class="sendData" type="submit" name="submit" value=">>Envoyer"/>
							</div>
						
						</form>
					</div>
				</div>

				<div  class="mySlide">
					<div id="smsEnvoye">
						<?php
						if($listSentMessage!=null){
							$i=1;
							foreach ($listReceivedMessage as $aMessage) {
								echo "<div class=\"aMessageReceived\" onclick=\"openContentR(".$i.")\"> 
									<div>".$aMessage["object"]."</div> 
									<div>".$aMessage["name"]."</div>
									<div>".$aMessage["sendOn"]."</div>
									</div>
									<div class=\"aContentReceived\">
										<p>".$aMessage["content"]."</p>
										<div class=\"goBack\" onclick=\"goBackR()\">Retour</div>
									</div>";
									$i++;}
						}else{
							echo "Vous n'avez aucun  message reçu";
						}?>
					</div>

				</div>
				<div  class="mySlide">
					<div id="smsRecu">  
						<?php
						if($listSentMessage!=null){
							$j=1;
							foreach ($listSentMessage as $aMessage) {
								echo "<div class=\"aMessageSent\" onclick=\"openContentS(".$j.")\"> 
									<div>".$aMessage["object"]."</div> 
									<div>".$aMessage["name"]."</div>
									<div>".$aMessage["sendOn"]."</div>
									</div>
									<div class=\"aContentSent\">
										<p>".$aMessage["content"]."</p>
										<div class=\"goBack\" onclick=\"goBackS()\">Retour</div>
									</div>";
									$j++;}

						}else{
							echo "<div> Vous n'avez aucun message envoyé</div>";
						}?>
					</div>	
				</div>
			</div>
			<div id= "showContent">
				
			</div>
		</div>
	</div>
<script type="text/javascript" src="/Public/Js/messengerScript.js"></script> 
<?php
$content = ob_get_clean();
require_once("template.php");
?>