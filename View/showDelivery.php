<?php
$title = 'Les commandes';
$style = "style.css";
ob_start();
?>

    <div class="myBody">
        <div id="delivery">
            <?php if ($listDeliveryByUser != null){
            $i = 1; ?>
            <form method="post">
                <input id="searchBar" type="text" name="search" placeholder="Tapez l'identifiant">
            </form>

            <table>
                <div>Information du client</div>
                <tr id="userDeliveryInfoHead">
                    <th>Login</th>
                    <th>Nom</th>
                    <th>Téléphone</th>
                </tr>


                <?php for ($j = count($listDeliveryByUser) - 1;
                $j >= 0;
                $j--){
                $aUser = $listDeliveryByUser[$j]; ?>


                <tr class="userDeliveryInfo" <?php echo "onclick=\"showSlides(" . $i . ")\""; ?>>
                    <?php

                    if (isset($_POST['search']) && !empty($_POST["search"])) {
                        $searchManager = new \SweetIt\SweetOm\Model\DeliveryManager();
                        $data = $searchManager->collectData($_POST["search"]);

                        //var_dump($data);

                        if ($data != null) {
                            foreach ($data as $aUser) {

                                //if (in_array($aUser, array('FirstName', 'LastName', 'PhoneNumber', 'CellNumber', 'Mail'))) {
                                //if ($aUser != '0')*/

                                echo "<td> " . $aUser . "</td>";
                            }
                        }
                    }


                    ?>
                </tr>
                <?php
                $i++;
                ?>


            </table>

        <div id="allDelivery">
        <?php for ($j = count($listDeliveryByUser) - 1; $j >= 0; $j--) {
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
                    <?php for ($i = 1; $i < count($aUser); $i++) { ?>
                        <tr class="deliveryInfo">
                            <td><?php echo $aUser[$i]['place']; ?></td>
                            <td><?php echo $aUser[$i]['name']; ?></td>
                            <td><?php echo $aUser[$i]['model']; ?></td>
                            <td><?php echo $aUser[$i]['price']; ?></td>
                                <?php $totalPrice += $aUser[$i]['price'] ?>
                        </tr>

                    <?php } ?>
                </table>
                <p>Prix Total: <?php echo $totalPrice; ?></p>
                <form method="POST" action="/index.php?action=delivered">
                    <input type="hidden" name="userDelivery" <?php echo "value='" . $aUser[0]['login'] . "'"; ?>>
                    <div class="send">
                        <input type="submit" name="submit" value="valider la commande" class="sendData">
                        <a href="#" class="go" onclick="goBack()">retour</a>
                    </div>
                </form>
            </div>


            </div>
        <?php }
        } ?>
        </div>
        <script type="text/javascript" src="/Public/Js/showDeliveryScript.js"></script>
        <?php } else { ?>
            <div class="noMessage">Vous n'avez aucune commande. Vous serez informé à la demande des clients.</div>
        <?php } ?>
    </div>
<?php
$content = ob_get_clean();
require('template.php');