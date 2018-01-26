<?php
session_start();

require_once("./Controller/frontend.php");

function issetList($aArray,$arrayKey){
        foreach ($arrayKey as $value) {
            if(!isset($aArray[$value])){
                return false;
            }
        }
        return true;
}

function notEmptyList($aArray){
    foreach ($aArray as $value){
        if(empty($value)){
            return false;
        }
    }
    return true;
}

try
{   
    if (array_key_exists('connected', $_SESSION) && $_SESSION['connected'] == true)
    {
        // In this part  functions which request a connection. Never trust user input.
        if (isset($_GET['action']) && $_GET['action'] == 'cgu'){
        require('./View/cgu.php');
        }
        else if (isset($_GET['action']) && $_GET['action'] == 'contact'){
        contact();
        }
        else if (isset($_GET['action']) && $_GET['action'] == 'addNewSensorView'){
            addNewSensorView();
        }
        else if (isset($_GET['action']) && $_GET['action'] == "dashboard"){
                dashboard();
        }else if(isset($_GET['action']) && $_GET['action']== 'createNewUserPage'){
            createNewUserPage();
        }
        else if(isset($_GET['action']) && $_GET['action'] == 'showDashbord'){
            showDashbord($_SESSION['ID_Domicile']);
        }
        else if (isset($_GET['action']) && $_GET['action'] == 'showCatalog'){
            showCatalog();
        }
        else if (isset($_GET['action']) && $_GET['action'] == 'logout'){
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
            if(issetList($_POST,['object','receiver','text']) && notEmptyList($_POST)){
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
            if(issetList($_POST, ['firstLogin', 'firstPassword', 'name', 'mail']) && notEmptyList($_POST)){
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
                        require('./View/createNewUserPage.php');
                    }
                }else{
                    $_SESSION['error'] = 'Votre mot de passe doit contenir au mois 6 caractères.';
                    require('./View/createNewUserPage.php');
                }
            }
        }

        else if(isset($_GET['action']) && $_GET['action'] == 'modifyDomisep'){
            if(issetList($_POST, ['address', 'cp', 'city', 'phoneNumber', 'mail']) && notEmptyList($_POST)){
                $address = $_POST['address'].'__'.$_POST['cp'].'__'.$_POST['city'];
                modifyDomisep($_POST['phoneNumber'],$address,$_POST['mail']);
            }else{
                echo 'boom';
            }

        }else if(isset($_GET['action']) && $_GET['action'] == 'modifyUserProfil'){
            if(issetList($_POST, ['address', 'cp', 'city', 'phoneNumber', 'mail']) && notEmptyList($_POST)){
                $address = $_POST['address'].'__'.$_POST['cp'].'__'.$_POST['city'];
                modifyUserProfil($_POST['phoneNumber'],$address,$_POST['mail']);
            }else{
                echo 'boom';
            }
        }
        else if(isset($_GET['action']) && $_GET['action'] == 'houseInfo'){
            if(issetList($_POST,['nbrHabitant', 'nbrBedroom', 'nbrToilet', 'nbrLivingRoom']) && notEmptyList($_POST)){
                loadHouseInfo($_POST['nbrHabitant'],$_POST['nbrBedroom'],$_POST['nbrToilet'],$_POST['nbrLivingRoom']);
            }
        }
        else if(isset($_GET['action']) && $_GET['action'] == 'bedroomRenaming'){
            $test = 0;
            for ($c=0; $c<$_SESSION['nbrBedroom'] ; $c++) { 
                $i = $c+1;
                $room = 'room'.$i;
                if($c%2==0 && !isset($_POST[$room])){
                    $test++;
                }
                $surface = 'surface'.$i;
                if($c%2!=0 && !isset($_POST[$surface])){
                    $test++;
                }
            }
            if($test == 0  && notEmptyList($_POST)){
                $type = 'Chambre';
                insertThisRoomTypeToDb($type, $_SESSION['nbrBedroom'], $_POST);
                setCemacByRoom($_SESSION['nbrBedroom'],$_POST);
                toiletRenaming();
            }
        }
        else if(isset($_GET['action']) && $_GET['action'] == 'toiletRenaming'){
            $test = 0;
            for ($c=0; $c <$_SESSION['nbrToilet'] ; $c++) {
                           $i = $c+1;
                $room = 'room'.$i;
                if($c%2==0 && !isset($_POST[$room])){
                    $test++;
                }
                $surface = 'surface'.$i;
                if($c%2!=0 && !isset($_POST[$surface])){
                    $test++;
                }
            }
            if($test == 0  && notEmptyList($_POST)){
                $type = 'Salle de bain';
                insertThisRoomTypeToDb($type, $_SESSION['nbrToilet'], $_POST);
                livingRoomRenaming();
            }
        }
        else if(isset($_GET['action']) && $_GET['action'] == 'livingRoomRenaming'){
            $test = 0;
            for ($c=0; $c <$_SESSION['nbrLivingRoom'] ; $c++) {
                             $i = $c+1;
                $room = 'room'.$i;
                if($c%2==0 && !isset($_POST[$room])){
                    $test++;
                }
                $surface = 'surface'.$i;
                if($c%2!=0 && !isset($_POST[$surface])){
                    $test++;
                }
            }
            if($test == 0  && notEmptyList($_POST)){
                $type = 'Séjour';
                insertThisRoomTypeToDb($type, $_SESSION['nbrLivingRoom'], $_POST);
                livingRoomRenaming();
            }
        }
        else if (isset($_GET['action']) && $_GET['action'] == 'updateNewUser'){
            
            if (issetList($_POST,['firstName','lastName','login','password','passwordValidate','mail','cellphone','phone','address','postCode','city','country']) 
                 && notEmptyList($_POST)){
                updateNewUser($_POST, $_SESSION['ID']);
            }
        }

        else if(isset($_GET['action']) && $_GET['action']=='insertNewSensorIntoDb'){
            if(issetList($_POST,['name','description','price','type','model']) && notEmptyList($_POST) && isset($_FILES['picture'])){
                if ($_FILES['picture']['size'] <= 1000000){

                    $infosfichier = pathinfo($_FILES['picture']['name']);
                    $extension_upload = $infosfichier['extension'];
                    $extensions_allowed = array('jpg', 'jpeg', 'gif', 'png');
                    if (in_array($extension_upload, $extensions_allowed)){

                        $urlImg = './Public/Assets/Images_catalog/' . basename($_FILES['picture']['name']) ;
                        move_uploaded_file($_FILES['picture']['tmp_name'], $urlImg);
                        insertNewSensorIntoDb($_POST,$urlImg);
                        echo $urlImg;
                    }
                }
            }      
        }



        else{
            dashboard();
        }
    }

    
    



    else{
        if (isset($_GET['action']) && $_GET['action'] == 'login'){
            login();
        }else if (isset($_GET['action']) && $_GET['action'] == 'connectUser'){
            if (issetList($_POST, ['login', 'password']) && notEmptyList($_POST)){
                connectUser($_POST['login'], $_POST['password']);
            }
        }else if (isset($_GET['action']) && $_GET['action'] == 'signInUser') {
            if (issetList($_POST, ['IdDomisep', 'passwordDomisep']) && notEmptyList($_POST)){
                signInUser($_POST['IdDomisep'],$_POST['passwordDomisep']);
            }
        }else if (isset($_GET['action']) && $_GET['action'] == 'create'){

        }else if (isset($_GET['action']) && $_GET['action'] == 'read'){

        }else if (isset($_GET['action']) && $_GET['action'] == 'update'){

        }else if (isset($_GET['action']) && $_GET['action'] == 'delete'){

        }else if (isset($_GET['action']) && $_GET['action'] == 'cgu'){
            require('./View/cgu.php');
        }else if (isset($_GET['action']) && $_GET['action'] == 'contact'){
            contact();
        }
        else{
            login();
        }
    }

}
catch (Exception $e){
    echo "Message : ".$e->getMessage();
}
