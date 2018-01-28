<?php
$title = 'Ma commande';
$style = "style.css";
ob_start();
$totalPrice = 0; ?>

<div class="myBody">
	<div id="delivery">
		<?php if($listDelivery!=null){   
			$i = 1; ?>
			<div id="allDelivery">
				<table>
					<div>Commande(s)</div>
					<tr id="deliveryGroupedHead">
						<th>Lieu d'installation</th>
						<th>nom du capteur</th>
						<th>Model</th>
						<th>Prix</th>
					</tr>

					<?php foreach($listDelivery as $aDelivery) { ?>
						<tr class="deliveryInfo">
							<td><?php echo $aDelivery['place'];  ?></td>
							<td><?php echo $aDelivery['name'];  ?></td>
							<td><?php echo $aDelivery['model'];  ?></td>
							<td><?php echo $aDelivery['price'];
							$totalPrice+= $aDelivery['price'] ?></td>
						</tr>
						
							<?php  } ?>
					</table>
					<p>Prix Total: <?php echo $totalPrice;  ?></p>
			</div>
				
				
			</div>
		</div>
	<?php }else{ ?>
		<div class="noMessage">Vous n'avez plus de commande.</div>
	<?php } ?>
</div>
<?php 
//
$content = ob_get_clean();
require('template.php');