<?php
/**
 * Created by PhpStorm.
 * User: THEOPHILE
 * Date: 17/11/2017
 * Time: 11:22
 */

/**
 *
 */




function addNewSensorView(){
    require_once('./Model/EquipmentManager.php');
    $catalogObject = new \SweetIt\SweetOm\Model\EquipmentManager();
    $listTypesSensors = $catalogObject->listTypesSensors();
    require('./View/newSensor.php');
}
function addNewUserToDb($login,$password,$mail){
    require_once('./Model/UserManager.php');
    $userObject = new \SweetIt\SweetOm\Model\UserManager();
    $userObject->addNewUserToDb($login,$password,$mail);
}
function addSensorByRoom($arrayRoom, $array){
    require_once('./Model/EquipmentManager.php');
    $equipmentObject = new SweetIt\SweetOm\Model\EquipmentManager();
    $equipmentObject->addSensorByRoom($arrayRoom, $array);
}

function addDelivery($arrayRoom, $array){
    require_once('./Model/DeliveryManager.php');
    $equipmentObject = new SweetIt\SweetOm\Model\DeliveryManager();
    $equipmentObject->addDelivery($arrayRoom, $array);
}

function connectedBedroom(){
    $listCatalog = getCatalogByType();
    require('./View/connectedBedroom.php');
}
function connectedLivingRoom(){
    $listCatalog = getCatalogByType();
    require('./View/connectedLivingRoom.php');
}
function connectedToilet(){
    echo "im here";
    $listCatalog = getCatalogByType();
    require('./View/connectedToilet.php');
}
function connectUser($login, $pass){
    require_once('Model/ConnectionManager.php');
    $connectionObject = new \SweetIt\SweetOm\Model\ConnectionManager();

    $connectionObject->connect($login, $pass);
    if($_SESSION['connected'] && !$_SESSION['waitingForSignIn']){
        if($_SESSION['userType']=='admin'){
                getAllDelivery();
        }else{
            require('./View/homeUser.php');
        }
    }else{
        loguut();
        $_SESSION['errorConnectionMessage1'] = "!Login ou mot de passe incorrrect veuillez réessayer";
        require('./View/loginView.php');
    }
}


function contact(){
    require_once("./Model/UserManager.php");
    $userObject = new \SweetIt\SweetOm\Model\UserManager();
    $domisepInfo = $userObject->getDomisepInfo($id);
    require('./View/contact.php');
}
function createNewUserPage(){
    require('./View/createNewUserPage.php');
}
function dashboard()
{
    require('./View/homeUser.php');
}
function delivered($login){
    require_once('./Model/DeliveryManager.php');
    $deliveryObject = new \SweetIt\SweetOm\Model\DeliveryManager();
    $deliveryObject->delivered($login);
    getAllDelivery();
}
function editDomisepProfil(){
    require_once("./Model/UserManager.php");
    $userObject = new \SweetIt\SweetOm\Model\UserManager();
    $domisepInfo = $userObject->getDomisepInfo();
    require("./View/editDomisepProfil.php");
}
function editUserProfil($id){
    require_once("/Model/UserManager.php");
    $userObject = new \SweetIt\SweetOm\Model\UserManager();
    $user = $userObject->getUserInfo($id);
    require("./View/editUserProfil.php");
}
function getCatalogByType(){
    require_once('./Model/CatalogManager.php');
    $catalogObject = new \SweetIt\SweetOm\Model\CatalogManager();
    $listCatalog = $catalogObject->listCatalog();
    return $listCatalog;
}
function getDomisepProfil(){
    require_once("./Model/UserManager.php");
    $userObject = new \SweetIt\SweetOm\Model\UserManager();
    $domisepInfo = $userObject->getDomisepInfo();
    $_SESSION['domisepPhoneNumber'] = $domisepInfo['phoneNumber'];
    $_SESSION['domisepMail'] = $domisepInfo['mail'];
    $_SESSION['domisepAddress'] = $domisepInfo['address'];
}
function getAllDelivery(){
    require_once('./Model/DeliveryManager.php');
    $deliveryObject = new SweetIt\SweetOm\Model\DeliveryManager();
    $listDeliveryByUser = $deliveryObject->getAllDelivery();
    require('./View/showDelivery.php');
}
function getADelivery($id){
    require_once('./Model/DeliveryManager.php');
    $deliveryObject = new SweetIt\SweetOm\Model\DeliveryManager();
    $listDelivery = $deliveryObject->getADelivery($id);
    require('./View/myDelivery.php');
}
function insertNewSensorIntoDb($array,$urlImg){
    require_once('./Model/CatalogManager.php');
    $catalogObject = new \SweetIt\SweetOm\Model\CatalogManager();
    $catalogObject->insertNewSensorIntoDb($array,$urlImg);
    showCatalog();
}
function insertThisRoomTypeToDb($type, $nbr, $array){
    require_once('./Model/RoomManager.php');
    $roomObject = new \SweetIt\SweetOm\Model\RoomManager();
    $roomObject->insertThisRoomTypeToDb($type, $nbr, $array);
}

function listElement($elt,$table){
    require_once('./Model/UserManager.php');
    $userObject = new \SweetIt\SweetOm\Model\UserManager();
    $listElement = $userObject->listElement($elt,$table);
    return $listElement;
}

function listLogin(){
    require_once('./Model/UserManager.php');
    $userObject = new \SweetIt\SweetOm\Model\UserManager();
    $listLogin = $userObject->listLogin();
    return $listLogin;
}

function livingRoomRenaming(){
    require('./View/livingRoomRenaming.php');
}

function loadHouseInfo($nbrHabitant,$nbrBedroom,$nbrToilet,$nbrLivingRoom){
    $_SESSION['nbrBedroom'] = $nbrBedroom;
    $_SESSION['nbrToilet']= $nbrToilet;
    $_SESSION['nbrLivingRoom']= $nbrLivingRoom;

    require('./View/bedroomRenaming.php');
}

function login(){
    require('./View/loginView.php');
}

function logout(){
    require('./View/logout.php');
}

function messenger($id){
    require_once('./Model/MessengerManager.php');
    $messageObject = new \SweetIt\SweetOm\Model\MessengerManager();
    $listReceivedMessage = $messageObject->receivedMessage($id);
    $listSentMessage = $messageObject->sentMessage($id);
    require('./View/messenger.php');
}

function modifyDomisep($phoneNumber,$address,$mail){
    require_once("./Model/UserManager.php");
    $userObject = new \SweetIt\SweetOm\Model\UserManager();
    $userObject->updateDomisep($phoneNumber, $address, $mail);
    editDomisepProfil($_SESSION['ID']);
}

function modifyUserProfil($phoneNumber,$address,$mail){
    require_once("./Model/UserManager.php");
    $userObject = new \SweetIt\SweetOm\Model\UserManager();
    $userObject->updateUserProfil($phoneNumber, $address, $mail);
    editUserProfil($_SESSION['ID']);
}

function updateNewUser($Array, $ID){
    require_once('./Model/UserManager.php');
    $newUser = new \SweetIt\SweetOm\Model\UserManager();

    $login = $Array['login'];
    $password = $Array['password'];
    $surname = $Array['firstName'];
    $name = $Array['lastName'];
    $mail = $Array['mail'];
    $cell = $Array['cellphone'];
    $phone = $Array['phone'];
    $address = $Array['address']."__".$Array['postCode']."__".$Array['city'];

    $newUser->updateNewUser($ID, $login, $password, $surname, $name, $cell, $phone, $mail);
    $newUser->setHome($ID, $address);

    $_SESSION['loginTemp'] = $login;
    $_SESSION['passwordTemp'] = $password;
    require('./View/houseInfo.php');
}


function sendMail($name, $mailReceiver,$subject, $text){


    if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn|gmail).[a-z]{2,4}$#", $mailReceiver)) {
        $nextLine = "\r\n";
    }else{
        $nextLine = "\n";
    }

    $message_html = "<html>
                        <head></head>
                        <body>
                            <p>Bonjour ".$name.",</p>
                            <div>".$text."</div>
                        </body>
                    </html>";
  
    $boundary = "-----=".md5(rand());
   
    $header = "From: \"domisep\"<domisep.sweetom@gmail.com>".$nextLine;
    $header.= "Reply-to: \"".$name."\" <".$mailReceiver.">".$nextLine;
    $header.= "MIME-Version: 1.0".$nextLine;
    $header.= "Content-Type: multipart/alternative;".$nextLine." boundary=\"$boundary\"".$nextLine;
 
    $message = $nextLine."--".$boundary.$nextLine;

    $message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$nextLine;
    $message.= "Content-Transfer-Encoding: 8bit".$nextLine;
    $message.= $nextLine.$message_html.$nextLine;
   
    $message.= $nextLine."--".$boundary."--".$nextLine;
    $message.= $nextLine."--".$boundary."--".$nextLine;

    mail($mailReceiver,$subject,$message,$header);
}


function sendThisMessage($idSender, $login, $object, $text, $sendOn){
    require_once('./Model/MessengerManager.php');
    $messageObject = new \SweetIt\SweetOm\Model\MessengerManager();
    $messageObject->sendThisMessage($idSender, $login, $object, $text, $sendOn);
    messenger($_SESSION['ID']);
}

function setCemacByRoom($nbr,$array){
    require_once('./Model/CeMacManager.php');
    $CeMacManager = new \SweetIt\SweetOm\Model\CeMacManager();
    $CeMacManager->setCemacByRoom($nbr,$array);
}

function showDasboard($ID_user){
    require_once('./Model/RoomManager.php');
    $roomObject = new SweetIt\SweetOm\Model\RoomManager();
    $listRoom = $roomObject->showDasboard($ID_user);
    require("./View/dashboard.php");
}

function showCatalog(){
    require_once('./Model/CatalogManager.php');
    $catalogObject = new \SweetIt\SweetOm\Model\CatalogManager();
    $listCatalog = $catalogObject->listCatalog();
    require('./View/Catalog.php');
}

function signInUser($login,$pass){
    require_once('./Model/ConnectionManager.php');
    $connectionObject = new \SweetIt\SweetOm\Model\ConnectionManager();
    $connectionObject->connect($login, $pass);
    if($_SESSION['connected'] && $_SESSION['waitingForSignIn']){
        require('./View/signIn.php');
    }else{
        $_SESSION['errorConnectionMessage2'] = "!Login ou mot de passe incorrrect veuillez réessayer";
        require('./View/loginView.php');
    }
}

function toiletRenaming(){
    require('./View/toiletRenaming.php');
}
















   