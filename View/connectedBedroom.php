<?php
$title = 'Connecter les pièces';
$style = "style.css";
ob_start();

?>
<div class = 'connection'>
	
	<div id="connectedRoom">
		<form class="renamingForm" method="POST" action="/index.php?action=connectedBedroom">
			<?php
			$i = 0;
			foreach ($_SESSION['listBedroom'] as $aRoom) {
				$c= $i+1; ?>
				<div class = "mySlide">
					<strong>Connecté la chambre : <?php echo $aRoom; ?></strong>
					<div class="sensor">
			<?php foreach ($listCatalog as $capteurType){
						$d = 1;
				?>
						
						<label class="sensorByType" for=<?php echo $capteurType[0]; ?>>
							<p><?php echo $capteurType[0]  ?></p>
							<select name=<?php echo $capteurType[0].($i+1);?>>
								<option>Aucun</option>
								<?php for ($j = count($capteurType)-1; $j>0; $j=$j-1){?>
								<option><?php echo $capteurType[$j]['Model']; ?></option>
								<?php } ?>
							</select>
						</label>
					
					
			<?php } ?>
			 		</div>
					 <div class="send">
						<?php if($i!=count($_SESSION['listBedroom'])-1){?>
						<a href="#" class="go" <?php echo "onclick=\"showNextSlides(".$c.")\""; ?>>Next</a>
						<?php } ?>
						<?php if($i== count($_SESSION['listBedroom'])-1){?>
							<input type="submit"  value="Valider">
						<?php } ?>
						<?php if($i!=0){?>
						<a href="#" class="go" <?php echo "onclick=\"showPreventSlides(".$i.")\""; ?>>Back</a>
						<?php } ?>
					</div>
				</div>
				
			<?php 
			$i++;
			} ?>
		</form>
	</div>


	<div id="catalog2">

    <?php
    $i=1;
    echo "<div class=\"menuType2\">";
    foreach ($listCatalog as $capteurType) {


        echo "<div class=typeLinks onclick=\"openSensors(" . $i . ")\">" . $capteurType[0] . "</div>";
        $i++;
    }
    echo "</div>";
    if (isset($capteurType[0])) {
        ?>
        <div id="typeInfo">
            <?php
            foreach ($listCatalog as $capteurType) { ?>
                <div class="capteurType">
                    <?php for ($j = count($capteurType)-1; $j>0; $j=$j-1) {
                        if (array_key_exists($j, $capteurType)) {
                            ?>
                            <div class="capteurInfoByType">
                                <div>
                                    <img src=../<?php echo $capteurType[$j]['PhotoUrl'] ?> class="imageCatalog">
                                </div>
                                <div id="capteurInfo">
                                    <p>Nom: <?php echo $capteurType[$j]['Name']
                                        ?></p>
                                    <p>Description: <?php echo $capteurType[$j]['Description']
                                        ?></p>
                                    <p>Prix: <?php echo $capteurType[$j]['Price']
                                        ?></p>
                                    <p>Modèle: <?php echo $capteurType[$j]['Model']
                                        ?></p>

                                </div>
                            </div>
                            <?php
                        }
                    }

                    ?>
                </div>
                <?php
            } ?>
        </div>
        <?php
    }
    ?>
	</div>

</div>
<script type="text/javascript" src="/Public/Js/roomRenamingScript.js"></script> 
<?php 
$content = ob_get_clean();
require('template.php');