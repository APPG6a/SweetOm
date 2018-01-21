<?php
session_start();
require_once("./Controller/frontend.php");

try
{
    if (array_key_exists('connected', $_SESSION) && $_SESSION['connected'] == true)
    {
        // In this part only functions which request a connection. Never trust user input.

        if (isset($_GET['action']) && $_GET['action'] == "dashboard"){
                dashboard();
        }else if(isset($_GET['action']) && $_GET['action']== 'createNewUserPage'){
            createNewUserPage();
        }
        else if(isset($_GET['action']) && $_GET['action'] == 'showDashbord'){
            showDashbord($_SESSION['ID_Domicile']);
        }else if (isset($_GET['action']) && $_GET['action'] == 'logout'){
            logout();
        }else if (isset($_GET['action']) && $_GET['action'] == 'editDomisepProfil'){
            editDomisepProfil();
        }else if(isset($_GET['action']) && $_GET['action'] == 'addNewUserToDb'){
            if(isset($_POST['firstLogin']) && !empty($_POST['firstLogin']) &&
            isset($_POST['firstPassword']) && !empty($_POST['firstPassword']) &&
            isset($_POST['name']) && !empty($_POST['name']) &&
            isset($_POST['mail']) && !empty($_POST['mail'])){
                if(strlen($_POST['firstPassword'])>=6){
                    echo 'hum';
                    $text = "Domisep vous souhaite la bienvenue dans son réseau. Pour pouvoir bénéficier de nos services rendez-vous
                    sur notre page en cliquant sur le lien ci-dessous. Voici votre identifiant provisoir: <br>
                    Login: ".$_POST['firstLogin']." <br>Mot de passe: ".$_POST['firstPassword']." <br>
                    <a href=\"/sweetom\">www.sweetom.fr</a>";
                    sendMail($_POST['name'],$_POST['mail'],$text);
                    addNewUserToDb($_POST['firstLogin'],$_POST['firstPassword'],$_POST['mail']);
                }
            }
        }

        else if(isset($_GET['action']) && $_GET['action'] == 'modifyDomisep'){
            if(isset($_POST['address']) && !empty($_POST['address'])&&
                isset($_POST['cp']) && !empty($_POST['cp'])&&
                isset($_POST['city']) && !empty($_POST['city'])&&
                isset($_POST['phoneNumber']) && !empty($_POST['phoneNumber'])&&
                isset($_POST['mail']) && !empty($_POST['mail'])){
                $address = $_POST['address'].'__'.$_POST['cp'].'__'.$_POST['city'];
                modifyDomisep($_POST['phoneNumber'],$address,$_POST['mail']);
            }

        }
        else{
            dashboard();
        }
    }

    
    



    else{
        if (isset($_GET['action']) && $_GET['action'] == 'login'){
            login();
        }else if (isset($_GET['action']) && $_GET['action'] == 'connectUser')
        {
            if (isset($_POST['login']) && isset($_POST['password']))
            {
                connectUser($_POST['login'], $_POST['password']);
            }
        }else if (isset($_GET['action']) && $_GET['action'] == 'signInUser') {
            if (isset($_POST['IdDomisep'])){
                signInUser();
            }
        }else if (isset($_GET['action']) && $_GET['action'] == 'create'){

        }else if (isset($_GET['action']) && $_GET['action'] == 'read'){

        }else if (isset($_GET['action']) && $_GET['action'] == 'update'){

        }else if (isset($_GET['action']) && $_GET['action'] == 'delete'){

        }else if (isset($_GET['action']) && $_GET['action'] == 'addNewUser'){

            if (!empty($_POST['nom']) &&
                !empty($_POST['prenom']) &&
                !empty($_POST['mail']) &&
                !empty($_POST['numPort']) &&
                !empty($_POST['numFix']) &&
                !empty($_POST['adresse']) &&
                !empty($_POST['cp']) &&
                !empty($_POST['ville']) &&
                !empty($_POST['pays']) &&
                !empty($_SESSION['ID']))
            {
                modifyUser($_POST, $_SESSION['ID']);
            }
        }
        else{
            login();
        }
    }
}
catch (Exception $e)
{
    echo "Message : ".$e->getMessage();
}
