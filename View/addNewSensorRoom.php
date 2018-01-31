<?php
$title = 'Edition du prpofil';
$style = 'style.css';
ob_start(); 
?>
<div class = 'connection'>
	
	<div id="connectedRoom">
		<form class="renamingForm" method="POST" action="/index.php?action=connectedRoom">
				<div>
					<strong>Connecté la pièce: <?php echo $_SESSION['roomName']; ?> </strong>
					<div class="sensor">
			<?php foreach ($listCatalog as $capteurType){ ?>
						
					<label class="sensorByType" for=<?php echo $capteurType[0]; ?>>
						<p><?php echo $capteurType[0]  ?></p>
						<select name=<?php echo $capteurType[0];?>>
							<option>Aucun</option>
							<?php for ($j = count($capteurType)-1; $j>0; $j=$j-1){?>
							<option><?php echo $capteurType[$j]['Model']; ?></option>
							<?php } ?>
						</select>
					</label>
					
					
			<?php } ?>
			 		</div>
					 <div class="send">
						<input type="submit"  value="Valider">
					</div>
				</div>
		</form>
	</div>


	<div id="catalog2">

    <?php
    $i=1;
    echo "<div class=\"menuType\">";
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
                            <div class="capteurInfoByType2">
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
<script type="text/javascript" src="./Public/Js/Catalog.js"></script>
<?php
$content = ob_get_clean();
require('template.php');