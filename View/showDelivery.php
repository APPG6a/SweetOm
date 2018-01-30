<?php
$title = 'Les commandes';
$style = "style.css";
ob_start();
?>

<div class="myBody">
	<div id="delivery">
		<?php if($listDeliveryByUser!=null){   
			$i = 1; ?>

			<table>
				<div>Informmation du client</div>
				<tr id="userDeliveryInfoHead">
					<th>Login</th>
					<th>Nom</th>
					<th>Téléphone</th>
				</tr>
			<?php for($j=count($listDeliveryByUser)-1 ; $j>=0;  $j--){ 
				$aUser = $listDeliveryByUser[$j]; ?>


				<tr class="userDeliveryInfo" <?php echo "onclick=\"showSlides(".$i.")\"";?>>
					<td><?php echo $aUser[0]['login'];  ?></td>
					<td><?php echo $aUser[0]['name'];  ?></td>
					<td><?php echo $aUser[0]['phone'];  ?></td>
				</tr>
			<?php 
			$i++;
			} ?>
				
			
			</table>	

			<div id="allDelivery">
			<?php for($j=count($listDeliveryByUser)-1 ; $j>=0;  $j--) {
				$totalPrice = 0; 
				$aUser = $listDeliveryByUser[$j]; ?>
				
			<div class="deliveryGrouped">
				<table>
					<div>Commande(s)</div>
					<tr id="deliveryGroupedHead">
						<th>Lieu d'installation</th>
						<th>nom du capteur</th>
						<th>Model</th>
						<th>Prix</th>
					</tr>
				<?php for ($i=1; $i<count($aUser)  ; $i++) { ?>
				<tr class="deliveryInfo">
					<td><?php echo $aUser[$i]['place'];  ?></td>
					<td><?php echo $aUser[$i]['name'];  ?></td>
					<td><?php echo $aUser[$i]['model'];  ?></td>
					<td><?php echo $aUser[$i]['price'];
					$totalPrice+= $aUser[$i]['price'] ?></td>
				</tr>
				
					<?php  } ?>
				</table>
				<p>Prix Total: <?php echo $totalPrice;  ?></p>
				<form method="POST" action="/index.php?action=delivered">
					<input type="hidden" name="userDelivery" <?php echo "value='".$aUser[0]['login']."'";?>>
					<div class="send">
						<input type="submit" name="submit" value="valider la commande" class="sendData">
						<a href="#" class="go" onclick="goBack()">retour</a>
					</div>
				</form>
			</div>
				
				
			</div>
			<?php } ?>
		</div>
	<script type="text/javascript" src="/Public/Js/showDeliveryScript.js"></script>
	<?php }else{ ?>
		<div class="noMessage">Vous n'avez aucunne commande. Vous serrez informé à la demande des clients.</div>
	<?php } ?>
</div>
<?php 
$content = ob_get_clean();
require('template.php');