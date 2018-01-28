<?php
$title="Premiere Visite";
$style="form.css";
ob_start();
?>
    <form id="regForm" action="/index.php?action=updateNewUser" method="post">

        <h1>Première Visite</h1>
         <?php if (array_key_exists('error', $_SESSION)){
                echo "<div class=\"error\">".$_SESSION['error']."</div>";} ?>

        <div class="tab">Vos informations:
           
            <p><input type="text" name="firstName" placeholder="Prénom" oninput="this.className = ''" <?php if (array_key_exists('error', $_SESSION)){
                echo "value='".$_SESSION['firstNameTemp']."'";} ?>></p>
            <p><input type="text" name="lastName" placeholder="Nom" oninput="this.className = ''"<?php if (array_key_exists('error', $_SESSION)){
                echo "value=".$_SESSION['lastNameTemp']."";} ?>></p>
            <p><input type="text" name="login" placeholder="identifiant" oninput="this.className = ''" <?php if (array_key_exists('error', $_SESSION)){
                echo "value='".$_SESSION['loginTemp']."'";} ?>></p>
            <p><input type="password" name="password" placeholder="Mot de passe" oninput="this.className = ''"></p>
            <p><input type="password" name="passwordValidate" placeholder="Confirmez votre mot de passe" oninput="this.className = ''"></p>
        </div>

        <div class="tab">Informations de contact:
            <p><input type="email" name="mail" placeholder="e-Mail" oninput="this.className = ''" <?php if (array_key_exists('error', $_SESSION)){
                echo "value='".$_SESSION['mailTemp']."'";} ?>></p>
            <p><input type="tel" name="cellphone" placeholder="Téléphone portable" oninput="this.className = ''" <?php if (array_key_exists('error', $_SESSION)){
                echo "value='".$_SESSION['cellphoneTemp']."'";} ?>></p>
            <p><input type="tel" name="phone" placeholder="Téléphone fixe" oninput="this.className = ''" <?php if (array_key_exists('error', $_SESSION)){
                echo "value='".$_SESSION['phoneTemp']."'";} ?>></p>
        </div>

        <div class="tab">Adresse Principale:
            <p><input type="text" name="address" placeholder="Adresse" oninput="this.className = ''" <?php if (array_key_exists('error', $_SESSION)){
                echo "value='".$_SESSION['addressTemp']."'";} ?>></p>
            <p><input type="text" name="postCode" placeholder="Code postal" oninput="this.className = ''" <?php if (array_key_exists('error', $_SESSION)){
                echo "value='".$_SESSION['postCodeTemp']."'";} ?>></p>
            <p><input type="text" name="city" placeholder="Ville" oninput="this.className = ''" <?php if (array_key_exists('error', $_SESSION)){
                echo "value='".$_SESSION['cityTemp']."'";} ?>></p>
        </div>

        <div style="overflow:auto;">
            <div style="float:right;">
                <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
            </div>
        </div>

        <!-- Circles which indicates the steps of the form: -->
        <div style="text-align:center;margin-top:40px;">
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
        </div>
        <script type="text/javascript" src="/Public/Js/signInFormScript.js"></script>
    </form>
<?php
$content = ob_get_clean();
require_once("template.php");