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
            editDomisepProfil($_SESSION['ID']);
        }else if (isset($_GET['action']) && $_GET['action'] == 'editUserProfil'){
            editUserProfil($_SESSION['ID']);
        }
        else if (isset($_GET['action']) && $_GET['action'] == 'messenger'){
            messenger($_SESSION['ID']);
        }
        else if (isset($_GET['action']) && $_GET['action'] == 'sendMessage'){
            if(isset($_POST['object']) && 
                isset($_POST['receiver']) &&
                isset($_POST['text']) && notEmptyList($_POST)){
                if(array_key_exists('userType', $_SESSION) && $_SESSION['userType']!='admin'){
                    $login = "domisep";
                }else if(array_key_exists('userType', $_SESSION) && $_SESSION['userType']=='admin'){
                    $login = $_POST['receiver'];
                } 
                $sendOn = date('Y-m-d H:i:s');
                if(in_array($login, listLogin())){
                    sendThisMessage($_SESSION['ID'], $login, $_POST['object'], $_POST['text'], $sendOn);
                }else{
                    $_SESSION['errorLogin'] = true;
                    messenger($_SESSION['ID']);
                }
                
            }
        }
        else if(isset($_GET['action']) && $_GET['action'] == 'addNewUserToDb'){
            if(isset($_POST['firstLogin']) &&
            isset($_POST['firstPassword'])  &&
            isset($_POST['name']) &&
            isset($_POST['mail']) && notEmptyList($_POST)){
                if(strlen($_POST['firstPassword'])>=6){
                    if(!in_array($_POST['firstLogin'], listLogin())){
                        $subject = "Création de votre compte";
                        $text = "Domisep vous souhaite la bienvenue dans son réseau. Pour pouvoir bénéficier de nos services rendez-vous
                        sur notre page, section première visite, en cliquant sur le lien ci-dessous. Voici votre identifiant provisoir: <br>
                        Login: ".$_POST['firstLogin']." <br>Mot de passe: ".$_POST['firstPassword']." <br>
                        <a href=\"sweetom\">www.sweetom.fr</a>";

                        sendMail($_POST['name'], $_POST['mail'], $subject, $text);
                        addNewUserToDb($_POST['firstLogin'],$_POST['firstPassword'],$_POST['mail']);
                    }else{
                        $_SESSION['error'] = 'Cet identifiant existe déja veuillez choisir un autre identifiant';
                        require('/View/createNewUserPage.php');
                    }
                }else{
                    $_SESSION['error'] = 'Votre mot de passe doit contenir au mois 6 caractères.';
                    require('/View/createNewUserPage.php');
                }
            }
        }

        else if(isset($_GET['action']) && $_GET['action'] == 'modifyDomisep'){
            if(isset($_POST['address']) &&
                isset($_POST['cp']) &&
                isset($_POST['city']) &&
                isset($_POST['phoneNumber']) &&
                isset($_POST['mail']) && notEmptyList($_POST)){
                $address = $_POST['address'].'__'.$_POST['cp'].'__'.$_POST['city'];
                modifyDomisep($_POST['phoneNumber'],$address,$_POST['mail']);
            }else{
                echo 'boom';
            }

        }else if(isset($_GET['action']) && $_GET['action'] == 'modifyUserProfil'){
            if(isset($_POST['address']) &&
                isset($_POST['cp']) &&
                isset($_POST['city']) &&
                isset($_POST['phoneNumber']) &&
                isset($_POST['mail']) && notEmptyList($_POST)){
                $address = $_POST['address'].'__'.$_POST['cp'].'__'.$_POST['city'];
                modifyUserProfil($_POST['phoneNumber'],$address,$_POST['mail']);
            }else{
                echo 'boom';
            }
        }
        else if (isset($_GET['action']) && $_GET['action'] == 'updateNewUser'){
            
            if (isset($_POST['firstName']) &&
                isset($_POST['lastName']) &&
                isset($_POST['login']) &&
                isset($_POST['password']) &&
                isset($_POST['passwordValidate']) &&
                isset($_POST['mail']) &&
                isset($_POST['cellphone']) &&
                isset($_POST['phone']) &&
                isset($_POST['address']) &&
                isset($_POST['postCode']) &&
                isset($_POST['city']) &&
                isset($_POST['country']) && notEmptyList($_POST)){
                updateNewUser($_POST, $_SESSION['ID']);
            }
        }else{
            dashboard();
        }
    }

    
    



    else{
        if (isset($_GET['action']) && $_GET['action'] == 'login'){
            login();
        }else if (isset($_GET['action']) && $_GET['action'] == 'connectUser'){
            if (isset($_POST['login']) &&  
                isset($_POST['password']) && notEmptyList($_POST)){
                connectUser($_POST['login'], $_POST['password']);
            }
        }else if (isset($_GET['action']) && $_GET['action'] == 'signInUser') {
            if (isset($_POST['IdDomisep']) && 
                isset($_POST['passwordDomisep']) && notEmptyList($_POST)){
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
