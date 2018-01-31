<?php
$title= "Tableau de bord";
$style = "style.css";
ob_start()?>
<div class="wrapper" style="background: rgba(227,227,227, 0.8);">
    <div class="wrapperLeft">
        <div class="icon" onclick="showPanel('air')">
            <p><img src="Public/Assets/Images/co2.png" width="100%"></p>
        </div>
        <div class="icon" onclick="showPanel('all')">
            <p><img src="Public/Assets/Images/house.png" width="100%"></p>
        </div>
        <div class="icon" onclick="showPanel('humidity')">
            <p><img src="Public/Assets/Images/humidity.png" width="100%"></p>
        </div>
        <div class="icon" onclick="showPanel('luminosity')">
            <p><img src="Public/Assets/Images/luminosity.png" width="100%"></p>
        </div>
        <div class="icon" onclick="showPanel('security')">
            <p><img src="Public/Assets/Images/security.png" width="100%"></p>
        </div>
        <div class="icon" onclick="showPanel('temperature')">
            <p><img src="Public/Assets/Images/temperature.png" width="100%"></p>
        </div>
    </div>

    <div class="wrapperRight verticalFlex" id="air">
        <div class="item">
            <?php for ($i = 0; $i < count($contents['air']['header']); $i++) { ?>
                <div class="dashboardHeader">
                    <span class="temperatureMeasure"><?php echo $contents['air']['header'][$i] ?></span>
                </div>
            <?php } ?>
        </div>
        <div class="item">
            <?php for ($i = 0; $i < count($contents['air']['body']); $i++) { ?>
                <div class="dashboardBody">
                    <h3><?php echo $contents['air']['body'][$i]['name'] ?></h3>
                    <?php for ($j = 0; $j < count($contents['air']['body'][$i]['value']); $j++) { ?>
                        <div class="dashboardBody">
                            <span class="temperatureMeasure"><?php echo $contents['air']['body'][$i]['value'][$j] ?></span>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
        <div class="item">
            <?php for ($i = 0; $i < 0; $i++) { ?>

            <?php } ?>
        </div>
    </div>

    <div class="wrapperRight verticalFlex" id="all">
        <div class="item">
            <?php for ($i = 0; $i < count($contents['all']['header']); $i++) { ?>
                <div class="dashboardHeader">
                    <span class="temperatureMeasure"><?php echo $contents['all']['header'][$i] ?></span>
                </div>
            <?php } ?>
        </div>
        <div class="item">
            <?php for ($i = 0; $i < count($contents['all']['body']); $i++) { ?>
                <div class="dashboardBody">
                    <h3><?php echo $contents['all']['body'][$i]['name'] ?></h3>
                    <?php for ($j = 0; $j < count($contents['all']['body'][$i]['value']); $j++) { ?>
                        <div class="dashboardBody">
                            <span class="temperatureMeasure"><?php echo $contents['all']['body'][$i]['value'][$j] ?></span>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
        <div class="item">
            <?php for ($i = 0; $i < 0; $i++) { ?>

            <?php } ?>
        </div>
    </div>
    <div class="wrapperRight verticalFlex" id="humidity">
        <div class="item">
            <?php for ($i = 0; $i < count($contents['humidity']['header']); $i++) { ?>
                <div class="dashboardHeader">
                    <span class="temperatureMeasure"><?php echo $contents['humidity']['header'][$i] ?> % RH</span>
                </div>
            <?php } ?>
        </div>
        <div class="item">
            <?php for ($i = 0; $i < count($contents['humidity']['body']); $i++) { ?>
                <div class="dashboardBody">
                    <h3><?php echo $contents['humidity']['body'][$i]['name'] ?></h3>
                    <span class="temperatureMeasure"><?php echo $contents['humidity']['body'][$i]['value'] ?>
                        % RH</span>
                </div>
            <?php } ?>
        </div>
        <div class="item">
            <?php for ($i = 0; $i < 0; $i++) { ?>

            <?php } ?>
        </div>
    </div>
    <div class="wrapperRight verticalFlex" id="luminosity">
        <div class="item">
            <?php for ($i = 0; $i < count($contents['luminosity']['header']); $i++) { ?>
                <div class="dashboardHeader">
                    <span class="temperatureMeasure"><?php echo $contents['luminosity']['header'][$i] ?> cd</span>
                </div>
            <?php } ?>
        </div>
        <div class="item">
            <?php for ($i = 0; $i < count($contents['luminosity']['body']); $i++) { ?>
                <div class="dashboardBody">
                    <h3><?php echo $contents['luminosity']['body'][$i]['name'] ?></h3>
                    <span class="temperatureMeasure"><?php echo $contents['luminosity']['body'][$i]['value'] ?>
                        cd</span>
                </div>
            <?php } ?>
        </div>
        <div class="item">
            <?php for ($i = 0; $i < 0; $i++) { ?>

            <?php } ?>
        </div>
    </div>
    <div class="wrapperRight verticalFlex" id="security">
        <div class="item">
            <?php for ($i = 0; $i < count($contents['security']['header']); $i++) { ?>
                <div class="dashboardHeader">SECURITY
                    <div class="securityHeader">
                        <ul>
                            <li><?php echo $contents['security']['header'][$i]['name'] ?></li>
                            <li><img src="../Public/Assets/SF<?php echo $contents['security']['header'][$i]['signalForce'] ?>.png" height="15px"></li>
                            <li><img src="../Public/Assets/security.png" height="15px"> <?php echo $contents['security']['header'][$i]['status'] ?></li>
                        </ul>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="item">
            <?php for ($i = 0; $i < count($contents['security']['body']); $i++) { ?>
                <div class="dashboardBody">
                    <h3><?php echo $contents['security']['body'][$i]['name'] ?></h3>
                    <iframe width="100%" height="100%" src="https://www.youtube.com/embed/1ZTTXURL218" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>                </div>
            <?php } ?>
        </div>
        <div class="item">
            <?php for ($i = 0; $i < 0; $i++) { ?>

            <?php } ?>
        </div>
    </div>
    <div class="wrapperRight verticalFlex" id="temperature">
        <div class="item">
            <?php for ($i = 0; $i < count($contents['temperature']['header']); $i++) { ?>
                <div class="dashboardHeader">
                    <span class="temperatureMeasure"><?php echo $contents['temperature']['header'][$i] ?> °C</span>
                </div>
            <?php } ?>
        </div>
        <div class="item">
            <?php for ($i = 0; $i < count($contents['temperature']['body']); $i++) { ?>
                <div class="dashboardBody">
                    <h3><?php echo $contents['temperature']['body'][$i]['name'] ?></h3>
                    <span class="temperatureMeasure"><?php echo $contents['temperature']['body'][$i]['value'] ?>
                        °C</span>
                </div>
            <?php } ?>
        </div>
        <div class="item">
            <?php for ($i = 0; $i < 0; $i++) { ?>

            <?php } ?>
        </div>
    </div>
</div>
<script type="text/javascript">
    showPanel('all');

    function showPanel(idPanel) {
        var panels = document.getElementsByClassName('wrapperRight verticalFlex');
        var panel = document.getElementById(idPanel);
        var i;

        //panels.forEach(function (item) { item.style.display = "none" });
        for (i = 0; i < panels.length; i++) {
            panels[i].style.display = "none";
        }
        panel.style.display = "block";
    }
</script>
<?php
$content = ob_get_clean();
require_once("template.php");