<?php
$title = 'Les commandes';
$style = "style.css";
ob_start();
?>

    <div class="myBody">
        <div id="delivery">
            <form method="post" action="/index.php?action=getAllSensors">
                <input id="searchBar" type="text" name="search" placeholder="Tapez l'identifiant">
            </form>
            <?php if (array_key_exists('find', $_SESSION)){
            $i = 1; ?>
            

            <table>
                <div>Information du client</div>
                <tr id="userDeliveryInfoHead">
                    <th>Login</th>
                    <th>Nom</th>
                    <th>Téléphone</th>
                    <th>Addresse</th>
                </tr>


                <tr class="userDeliveryInfo" <?php echo "onclick=\"showSlides(" . $i . ")\""; ?>>
                    <td><?php echo $listDeliveredByUser[0]['login']?></td>
                    <td><?php echo $listDeliveredByUser[0]['name']?></td>
                    <td><?php echo $listDeliveredByUser[0]['phone']?></td>
                    <td><?php echo $listDeliveredByUser[0]['address']?></td>
                </tr>
                


            </table>

        <div id="allDelivery">
            <div class="deliveryGrouped">
                <table>
                    <div>Commande(s)</div>
                    <tr id="deliveryGroupedHead">
                        <th>Lieu d'installation</th>
                        <th>nom du capteur</th>
                        <th>Model</th>
                        <th>Prix</th>
                    </tr>
                    <?php for ($j = count($listDeliveredByUser) - 1; $j > 0; $j--) {
                        $totalPrice = 0;
                        $aUser = $listDeliveredByUser[$j]; ?>
                        <tr class="deliveryInfo">
                            <td><?php echo $aUser['place']; ?></td>
                            <td><?php echo $aUser['name']; ?></td>
                            <td><?php echo $aUser['model']; ?></td>
                            <td><?php echo $aUser['price']; ?></td>
                            <?php $totalPrice += $aUser['price'] ?>
                        </tr>


        </div>
        <?php }
         ?>
            </table>
                <p>Prix Total: <?php echo $totalPrice; ?></p>
            </div>
        </div>
        
        <?php  
        unset($_SESSION['find']);}else { ?>
            <div class="noMessage">Aucun client trouvé.</div>
        <?php } ?>
    </div>
    <script type="text/javascript" src="/Public/Js/showDeliveryScript.js"></script>
<?php
$content = ob_get_clean();
require('template.php');