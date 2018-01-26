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
                    $login = htmlspecialchars($_POST['receiver']);
                } 
                $sendOn = date('Y-m-d H:i:s');
                if(in_array($login, listElement('Login','user'))){
                    sendThisMessage($_SESSION['ID'], $login, htmlspecialchars($_POST['object']), htmlspecialchars($_POST['text']), $sendOn);
                }else{
                    $_SESSION['errorLogin'] = true;
                    messenger($_SESSION['ID']);
                }
                
                
            }else{
                throw new Exception("Une erreur est survenu lors du chargement de cette page. Veuillez vous rediriger vers la page précédente");
                
            }
        }


        else if(isset($_GET['action']) && $_GET['action'] == 'addNewUserToDb'){
            if(issetList($_POST, ['firstLogin', 'firstPassword', 'name', 'mail']) && notEmptyList($_POST)){
                if(strlen($_POST['firstPassword'])>=6){
                    if(!in_array($_POST['firstLogin'], listElement('Login','user'))){
                        $subject = "Création de votre compte";
                        $text = "Domisep vous souhaite la bienvenue dans son réseau. Pour pouvoir bénéficier de nos services rendez-vous
                        sur notre page, section première visite, en cliquant sur le lien ci-dessous. Voici votre identifiant provisoire: <br>
                        Login: ".htmlspecialchars($_POST['firstLogin'])." <br>Mot de passe: ".htmlspecialchars($_POST['firstPassword'])." <br>
                        <a href=\"sweetom\">www.sweetom.fr</a>";

                        sendMail(htmlspecialchars($_POST['name']),htmlspecialchars($_POST['mail']) , $subject, $text);
                        addNewUserToDb(htmlspecialchars($_POST['firstLogin']),$_POST['firstPassword'],htmlspecialchars($_POST['mail']));
                    }else{
                        $_SESSION['error'] = 'Cet identifiant existe déja veuillez choisir un autre identifiant';
                        require('./View/createNewUserPage.php');
                    }
                }else{
                    $_SESSION['error'] = 'Votre mot de passe doit contenir au mois 6 caractères.';
                    require('./View/createNewUserPage.php');
                }
            }else{
                throw new Exception("Une erreur est survenu lors du chargement de cette page. Veuillez vous rediriger vers la page précédente");
            }
        }


        else if(isset($_GET['action']) && $_GET['action'] == 'modifyDomisep'){
            if(issetList($_POST, ['address', 'cp', 'city', 'phoneNumber', 'mail']) && notEmptyList($_POST) && is_numeric($_POST['phoneNumber'])){
                $address = $_POST['address'].'__'.$_POST['cp'].'__'.$_POST['city'];
                modifyDomisep($_POST['phoneNumber'],$address,$_POST['mail']);
            }else{
                throw new Exception("Une erreur est survenu lors du chargement de cette page. Veuillez vous rediriger vers la page précédente");
                
            }
        }

        else if(isset($_GET['action']) && $_GET['action'] == 'modifyUserProfil'){
            if(issetList($_POST, ['address', 'cp', 'city', 'phoneNumber', 'mail']) && notEmptyList($_POST) && is_numeric($_POST['phoneNumber'])){
                $address = htmlspecialchars($_POST['address']).'__'.htmlspecialchars($_POST['cp']).'__'.htmlspecialchars($_POST['city']);
                modifyUserProfil(htmlspecialchars($_POST['phoneNumber']),$address,htmlspecialchars($_POST['mail']));
            }else{
                throw new Exception("Une erreur est survenu lors du chargement de cette page. Veuillez vous rediriger vers la page précédente");
                
            }
        }


        else if(isset($_GET['action']) && $_GET['action'] == 'houseInfo'){
            if(issetList($_POST,['nbrHabitant', 'nbrBedroom', 'nbrToilet', 'nbrLivingRoom']) && notEmptyList($_POST)){
                loadHouseInfo($_POST['nbrHabitant'],$_POST['nbrBedroom'],$_POST['nbrToilet'],$_POST['nbrLivingRoom']);
            }else{
                throw new Exception("Une erreur est survenu lors du chargement de cette page. Veuillez vous rediriger vers la page précédente");
                
            }
        }


        else if(isset($_GET['action']) && $_GET['action'] == 'bedroomRenaming'){
            $test = 0;
            $nbrRoom = $_SESSION['nbrBedroom'];
            $listRoom = array();
            for ($c=0; $c<$nbrRoom; $c++) { 
                $i = $c+1;
                $room = 'room'.$i;
                $surface = 'surface'.$i;
                if(!isset($_POST[$room]) OR !isset($_POST[$surface]) OR !is_numeric($_POST[$surface]) ){
                    $test++;
                }
                $listRoom[]=$_POST[$room];
        
            }
            if($test == 0  && notEmptyList($_POST)){
                $type = 'Chambre';
                $_SESSION['listBedroom'] = $listRoom;
                insertThisRoomTypeToDb($type, $_SESSION['nbrBedroom'], $_POST);
                setCemacByRoom($_SESSION['nbrBedroom'],$_POST);
                connectedBedroom();
            }else{
                throw new Exception("Une erreur est survenu lors du chargement de cette page. Veuillez vous rediriger vers la page précédente");
                
            }
        }


        else if(isset($_GET['action']) && $_GET['action'] == 'toiletRenaming'){
            $test = 0;
            $listToilet = array();
            for ($c=0; $c<$_SESSION['nbrToilet'] ; $c++) {
                $i = $c+1;
                $room = 'room'.$i;
                $surface = 'surface'.$i;
                if(!isset($_POST[$room]) OR !isset($_POST[$surface]) OR !is_numeric($_POST[$surface])){
                    $test++;
                }

                $listToilet[] = $_POST[$room];                
            }
            if($test == 0  && notEmptyList($_POST)){
                echo'oui';
                $type = 'Salle de bain';
                $_SESSION['listToilet'] = $listToilet;
                insertThisRoomTypeToDb($type, $_SESSION['nbrToilet'], $_POST);
                setCemacByRoom($_SESSION['nbrToilet'],$_POST);
                connectedToilet();
            }else{
                throw new Exception("Une erreur est survenu lors du chargement de cette page. Veuillez vous rediriger vers la page précédente");
                
            }
        }


        else if(isset($_GET['action']) && $_GET['action'] == 'livingRoomRenaming'){
            $test = 0;
            $nbrLivingRoom = $_SESSION['nbrLivingRoom'];
            $listLivingRoom = array();
            for ($c=0; $c <$nbrLivingRoom ; $c++) {
                $i = $c+1;
                $room = 'room'.$i;
                $surface = 'surface'.$i;
                if(!isset($_POST[$room]) OR !isset($_POST[$surface]) OR !is_numeric($_POST[$surface])){
                    $test++;
                }
                $listLivingRoom[] = $_POST[$room]; 
            }
            if($test == 0  && notEmptyList($_POST)){
                $type = 'Séjour';
                $_SESSION['listLivingRoom'] = $listLivingRoom;
                insertThisRoomTypeToDb($type, $_SESSION['nbrLivingRoom'], $_POST);
                setCemacByRoom($_SESSION['nbrLivingRoom'],$_POST);
                connectedLivingRoom();
            }else{
                throw new Exception("Une erreur est survenu lors du chargement de cette page. Veuillez vous rediriger vers la page précédente");
                
            }
        }


        else if (isset($_GET['action']) && $_GET['action'] == 'updateNewUser'){
            
            if (issetList($_POST,['firstName','lastName','login','password','passwordValidate','mail','cellphone','phone','address','postCode','city']) 
                 && notEmptyList($_POST) && is_numeric($_POST['cellphone']) && is_numeric($_POST['postCode']) && is_numeric($_POST['phone'])){
                $_SESSION['firstNameTemp'] = $_POST['firstName'];
                $_SESSION['lastNameTemp'] = $_POST['lastName'];
                $_SESSION['loginTemp'] = $_POST['login'];
                $_SESSION['mailTemp'] = $_POST['mail'];
                $_SESSION['cellphoneTemp'] = $_POST['cellphone'];
                $_SESSION['phoneTemp'] = $_POST['phone'];
                $_SESSION['addressTemp'] = $_POST['address'];
                $_SESSION['postCodeTemp'] = $_POST['postCode'];
                $_SESSION['cityTemp'] = $_POST['city'];
                $listElement = listElement('Login','user');
                $listElement[array_search($_SESSION['login'], $listElement)] = "_";
                $_SESSION['error']='_';
                if(!in_array($_POST['login'], $listElement)){
                    if($_POST['password'] == $_POST['passwordValidate']){
                        if(strlen($_POST['password'])>=6){
                            unset($_SESSION['firstNameTemp']);
                            unset($_SESSION['lastNameTemp']);
                            unset($_SESSION['loginTemp']);
                            unset($_SESSION['mailTemp']);
                            unset($_SESSION['cellphoneTemp']);
                            unset($_SESSION['phoneTemp']);
                            unset($_SESSION['addressTemp']);
                            unset($_SESSION['postCodeTemp']);
                            unset($_SESSION['cityTemp']);
                            unset($_SESSION['error']);
                            updateNewUser($_POST, $_SESSION['ID']);
                        }else{
                            $_SESSION['error'] = 'Votre mot de passe doit contenir au mois 6 caractères';
                            require("./View/signIn.php");
                        }
                    }else{
                        $_SESSION['error'] = 'Les deux mots de passe ne correspondent pas. Veuillez égualement à avoir 6 caractères au minimum';
                        require("./View/signIn.php");
                    }
                }else{
                    $_SESSION['error'] = 'Cet identifiant existe déjà veuillez choisir un autre identifiant.';
                    require("./View/signIn.php");
                }
                
            }else{
                throw new Exception("Une erreur est survenu lors du chargement de cette page. Veuillez vous rediriger vers la page précédente");
                
            }
        }


        else if(isset($_GET['action']) && $_GET['action']=='insertNewSensorIntoDb'){
            if(issetList($_POST,['name','description','price','type','model']) && notEmptyList($_POST) && isset($_FILES['picture']) && $_FILES['picture']['error']==0
                && is_numeric($_POST['price'])){
                if(!in_array($_POST['model'], listElement('Model','catalog'))){
                    if ($_FILES['picture']['size'] <= 1000000){

                        $infosfichier = pathinfo($_FILES['picture']['name']);
                        $extension_upload = $infosfichier['extension'];
                        $extensions_allowed = array('jpg', 'jpeg', 'gif', 'png');
                        if (in_array($extension_upload, $extensions_allowed)){

                            $urlImg = './Public/Assets/Images_catalog/' . basename($_FILES['picture']['name']) ;
                            move_uploaded_file($_FILES['picture']['tmp_name'], $urlImg);
                            insertNewSensorIntoDb($_POST,$urlImg);
                            echo $urlImg;
                        }else{
                            throw new Exception("Ce type de fichier n'est pas supporté. veuillez choisir une image appropriée.");
                            
                        }
                    }else{
                        throw new Exception("Ce fichier est beaucoup trop lourd. Assurer vous que le fichier fasse minimum 10Mo");
                        
                    }
                
                }else{
                    throw new Exception("Ce Model existe déja. Vous ne pouvez pas l'ajouter au catalogue.");
                    
                }
            }else{
                throw new Exception("Un problème est survenu lors de l'envoi veuillez vous rediriger vers la page. Les champs doivent contenir le bon type. Au cas échant veuillez choisir un autre fichier.");
                
            }      
        }


        else if(isset($_GET['action']) && $_GET['action']=='connectedBedroom'){
            $type = ['Température','Luminosité','Humidité','Fumée','Présence','CO2','Caméra','Pression'];
            $test = 0;
            for ($i=0; $i<$_SESSION['nbrBedroom']; $i++){
                $newType = array();
                foreach ($type as $aType) {
                    $newType[] = $aType.($i+1);
                }
                if(!issetList($_POST,$newType)){
                    $test++;
                }
            }
            if($test==0 && notEmptyList($_POST)){
               addSensorByRoom($_SESSION['listBedroom'],$_POST);
               toiletRenaming();
               
            }else{
                throw new Exception("Une erreur est survenu lors du chargement de cette page. Veuillez vous rediriger vers la page précédente");
                
            }
        }


        else if(isset($_GET['action']) && $_GET['action']=='connectedToilet'){
            $type = ['Température','Luminosité','Humidité','Fumée','Présence','CO2','Caméra','Pression'];
            $test = 0;
            for ($i=0; $i<$_SESSION['nbrToilet']; $i++){
                $newType = array();
                foreach ($type as $aType) {
                    $newType[] = $aType.($i+1);
                }
                if(!issetList($_POST,$newType)){
                    $test++;
                }
            }
            if($test==0 && notEmptyList($_POST)){
               addSensorByRoom($_SESSION['listToilet'],$_POST);
               livingRoomRenaming();
            }else{
                throw new Exception("Une erreur est survenu lors du chargement de cette page. Veuillez vous rediriger vers la page précédente");
                
            }
        }


        else if(isset($_GET['action']) && $_GET['action']=='connectedLivingRoom'){
            $type = ['Température','Luminosité','Humidité','Fumée','Présence','CO2','Caméra','Pression'];
            $test = 0;
            for ($i=0; $i<$_SESSION['nbrLivingRoom']; $i++){
                $newType = array();
                foreach ($type as $aType) {
                    $newType[] = $aType.($i+1);
                }
                if(!issetList($_POST,$newType)){
                    $test++;
                }
            }
            if($test==0 && notEmptyList($_POST)){
               addSensorByRoom($_SESSION['listLivingRoom'],$_POST);
               connectUser($_SESSION['loginTemp'], $_SESSION['passwordTemp']);
               unset($_SESSION['passwordTemp']);
               unset($_SESSION['nbrLivingRoom']);
               unset($_SESSION['nbrBedroom']);
               unset($_SESSION['nbrToilet']);
               unset($_SESSION['listToilet']);
               unset($_SESSION['listBedroom']);
               unset($_SESSION['listLivingRoom']);
            }else{
                throw new Exception("Une erreur est survenu lors du chargement de cette page. Veuillez vous rediriger vers la page précédente");
                
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
    $_SESSION['error'] = $e->getMessage();
    require('./View/errorPage.php');
}
