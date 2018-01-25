<?php
$title = "SweetOm";
$style = "style.css";
ob_start();
?>
<div class="wrapper">
    <div class="wrapper-left">

        <h2>Se connecter</h2>
        <form method="post" action="/index.php?action=connectUser">
            
            <label class=label_form>
                <input type="text" name="login" requiered id="login"/>
                <div class="label-text">Identifiant</div>
            </label>
            <label class="label_form">
                <input type="password" name="password" required id="password" />
                <div class="label-text">Mot de passe</div>
            </label>
            <?php if(array_key_exists('errorConnectionMessage1', $_SESSION)){
                echo "<div class=\"error\">".$_SESSION["errorConnectionMessage1"]."</div>";
                unset($_SESSION["errorConnectionMessage1"]);
            }  ?>
            <button>VALIDER</button>
        </form>
    </div>
    <div class="wrapper-right">

        <h2>Première visite?</h2>
        <form method="post" onsubmit="verifyFirstVisit(this.value)" action="/index.php?action=signInUser">
            
            <label class="label_form">
                <input type="text" name="IdDomisep" required id="IdDomisep" />
                <div class="label-text">Numéro Domisep</div>
            </label>
            <label class="label_form">
                <input type="password" name="passwordDomisep" required id="passwordDomisep" />
                <div class="label-text">Mot de Passe</div>
            </label>
            <?php if(array_key_exists('errorConnectionMessage2', $_SESSION)){
                echo "<div class=\"error\">".$_SESSION["errorConnectionMessage2"]."</div>";
                unset($_SESSION["errorConnectionMessage2"]);
            }  ?>
            <button>VALIDER</button>
        </form>
    </div>
</div>

<script type="text/javascript" src="/Public/Js/loginScript.js"></script>
<?php
$content = ob_get_clean();
require_once("template.php");

