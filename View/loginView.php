<?php
$title = "SweetOm";
ob_start();
?>
<div class="wrapper">
    <div class="wrapper-left">

        <h2>Se connecter</h2>
        <form method="post" action="../index.php?action=connectUser">
            <label>
                <input type="text" name="login" requiered id="login">
                <div class="label-text">Identifiant</div>
            </label>
            <label>
                <input type="password" name="password" required id="password" />
                <div class="label-text">Mot de passe</div>
            </label>
            <button>Submit</button>
        </form>
    </div>
    <div class="wrapper-right">

        <h2>Première visite?</h2>
        <form method="post" action="">
            <label>
                <input type="text" name="IdDomisep" required id="IdDomisep" />
                <div class="label-text">Numéro Domisep</div>
            </label>
            <button>Submit</button>
        </form>
    </div>
</div>

<script type="text/javascript" src="/Public/Js/loginScript.js"></script>
<?php
$content = ob_get_clean();
require_once("template.php");

