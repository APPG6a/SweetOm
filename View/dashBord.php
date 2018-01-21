<?php 
$title= "messenger";
$style = "/Public/Style/style.css";
ob_start()?>
	<?php
		$typeRoom = array();
		foreach ($listRoom as $aRomm) {
			$typeRoom[] = $aRoom[0];
		}

	?>
	<div id="listSensors">
	<?php
		if( in_array('Température',$typeRoom) ){?>
			<div><img src="/Public/Assets/Images/temperature.png"/><p>Température</p></div>
		<?php } ?>
		<?php
		if( in_array('Luminosité',$typeRoom) ){?>
			<div><img src="/Public/Assets/Images/luminosite.png"/><p>Luminosité</p></div>
		<?php } ?>
		<?php
		if( in_array('Humidité',$typeRoom) ){?>
			<div><img src="/Public/Assets/Images/humidite.png"/><p>Humidité</p></div>
		<?php } ?>
		<?php
		if( in_array('Sécurité',$typeRoom)){?>
			<div><img src="/Public/Assets/Images/securite.png"/><p>Sécurité</p></div>
		<?php } ?>
		<?php
		if( in_array('Co2',$typeRoom)){?>
			<div><img src="/Public/Assets/Images/co2.png"/><p>Co2</p></div>
		<?php } ?>
		<?php
		if( in_array('Fumée',$typeRoom)){?>
			<div><img src="/Public/Assets/Images/fumee.png"/><p>Fumée</p></div>
		<?php } ?>
		<?php
		if( in_array('Caméra',$typeRoom)){?>
			<div><img src="/Public/Assets/Images/camera.png"/><p>Caméra</p></div>
		<?php } ?>
		<?php
		if( in_array('Présence',$typeRoom)){?>
			<div><img src="/Public/Assets/Images/presence.png"/><p>Présence</p></div>
		<?php } ?>
	
</div>

    <div class="listSensorsInfo">
        <div class="aSensor"></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>

<?php
$content = ob_get_clean();
require_once("template.php");
