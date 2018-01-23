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
        }else if (isset($_GET['action']) && $_GET['action'] == 'messenger'){
            messenger($_SESSION['ID']);
        }
        else if (isset($_GET['action']) && $_GET['action'] == 'sendMessage'){
            if(isset($_POST['object']) && !empty($_POST['object']) &&
                isset($_POST['receiver']) && !empty($_POST['receiver'])&&
                isset($_POST['text']) && !empty($_POST['text'])){
                if(array_key_exists('userType', $_SESSION) && $_SESSION['userType']!='admin'){
                    $login = "domisep";
                }else if(array_key_exists('userType', $_SESSION) && $_SESSION['userType']=='admin'){
                    $login = $_POST['receiver'];
                } 
                $sendOn = date('Y-m-d H:i:s');
                sendThisMessage($_SESSION['ID'], $login, $_POST['object'], $_POST['text'], $sendOn);
            }
        }
        else if(isset($_GET['action']) && $_GET['action'] == 'addNewUserToDb'){
            if(isset($_POST['firstLogin']) && !empty($_POST['firstLogin']) &&
            isset($_POST['firstPassword']) && !empty($_POST['firstPassword']) &&
            isset($_POST['name']) && !empty($_POST['name']) &&
            isset($_POST['mail']) && !empty($_POST['mail'])){
                if(strlen($_POST['firstPassword'])>=6){

                    $subject = "Création de votre compte";
                    $text = "Domisep vous souhaite la bienvenue dans son réseau. Pour pouvoir bénéficier de nos services rendez-vous
                    sur notre page, section première visite, en cliquant sur le lien ci-dessous. Voici votre identifiant provisoir: <br>
                    Login: ".$_POST['firstLogin']." <br>Mot de passe: ".$_POST['firstPassword']." <br>
                    <a href=\"sweetom\">www.sweetom.fr</a>";

                    sendMail($_POST['name'], $_POST['mail'], $subject, $text);
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
        else if (isset($_GET['action']) && $_GET['action'] == 'updateNewUser'){
            
            if (!empty($_POST['firstName']) &&
                !empty($_POST['lastName']) &&
                !empty($_POST['login']) &&
                !empty($_POST['password']) &&
                !empty($_POST['passwordValidate']) &&
                !empty($_POST['mail']) &&
                !empty($_POST['cellphone']) &&
                !empty($_POST['phone']) &&
                !empty($_POST['address']) &&
                !empty($_POST['postCode']) &&
                !empty($_POST['city']) &&
                !empty($_POST['country'])){
                modifyUser($_POST, $_SESSION['ID']);
            }
        }else{
            dashboard();
        }
    }

    
    



    else{
        if (isset($_GET['action']) && $_GET['action'] == 'login'){
            login();
        }else if (isset($_GET['action']) && $_GET['action'] == 'connectUser'){
            if (isset($_POST['login']) &&  !empty($_POST['login']) &&
                isset($_POST['password']) && !empty($_POST['password'])){
                connectUser($_POST['login'], $_POST['password']);
            }
        }else if (isset($_GET['action']) && $_GET['action'] == 'signInUser') {
            if (isset($_POST['IdDomisep']) && !empty($_POST['IdDomisep'])&&
                isset($_POST['passwordDomisep']) && !empty($_POST['passwordDomisep'])){
                signInUser($_POST['IdDomisep'],$_POST['passwordDomisep']);
            }
        }else if (isset($_GET['action']) && $_GET['action'] == 'create'){

        }else if (isset($_GET['action']) && $_GET['action'] == 'read'){

        }else if (isset($_GET['action']) && $_GET['action'] == 'update'){

        }else if (isset($_GET['action']) && $_GET['action'] == 'delete'){

        }
        else{
            login();
        }
    }
}
catch (Exception $e){
    echo "Message : ".$e->getMessage();
}
