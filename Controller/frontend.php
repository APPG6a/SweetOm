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
function addNewUserToDb($login,$password,$mail){
    require_once('Model/UserManager.php');
    $userObject = new \SweetIt\SweetOm\Model\UserManager();
    $userObject->addNewUserToDb($login,$password,$mail);
}
function connectUser($login, $pass)
{
    require_once('Model/ConnectionManager.php');
    $connectionObject = new \SweetIt\SweetOm\Model\ConnectionManager();

    $connectionObject->connect($login, $pass);
    if($_SESSION['connected'] && !$_SESSION['waitingForSignIn']){
        require('/View/homeUser.php');
    }else{
        $_SESSION['errorConnectionMessage1'] = "!Login ou mot de passe incorrrect veuillez réessayer";
        require('/view/loginView.php');
    }
}
function createNewUserPage(){
    require('view/createNewUserPage.php');
}
function dashboard()
{
    require('View/homeUser.php');
}
function editDomisepProfil(){
    require_once("/Model/UserManager.php");
    $userObject = new SweetIt\SweetOm\Model\UserManager();
    $domisepInfo = $userObject->getDomisepInfo();
    require("view/editDomisepProfil.php");
}
function login()
{
    require('View/loginView.php');
}

function logout()
{
    require('View/logout.php');
}
function modifyDomisep($phoneNumber,$address,$mail){
    require_once("/Model/UserManager.php");
    $userObject = new \SweetIt\SweetOm\Model\UserManager();
    $userObject->updateDomisep($phoneNumber, $address, $mail);
    editDomisepProfil();
}
function modifyUser($Array, $ID)
{
    require_once('Model/UserManager.php');
    $newUser = new \SweetIt\SweetOm\Model\UserManager();

    $login = $Array['login'];
    $password = $Array['password'];
    $surname = $Array['firstName'];
    $name = $Array['lastName'];
    $mail = $Array['mail'];
    $cell = $Array['cellphone'];
    $phone = $Array['phone'];
    $address = $Array['address']." ".$Array['postCode']." ".$Array['city']." ".$Array['country'];

    $newUser->updateUser($ID, $login, $password, $surname, $name, $cell, $phone, $mail);
    $newUser->setHome($ID, $address);
}
function showDasboard($ID_user){
    require_once('Model/RoomManager.php');
    $roomObject = new SweetIt\SweetOm\Model\RoomManager();
    $listRoom = $roomObject->showDasboard($ID_user);
    require("/view/dashboard.php");
}

function signInUser($login,$pass){
    require_once('Model/ConnectionManager.php');
    $connectionObject = new \SweetIt\SweetOm\Model\ConnectionManager();
    $connectionObject->connect($login, $pass);
    if($_SESSION['connected'] && $_SESSION['waitingForSignIn']){
        require('/View/signIn.php');
    }else{
        $_SESSION['errorConnectionMessage2'] = "!Login ou mot de passe incorrrect veuillez réessayer";
        require('/view/loginView.php');
    }
}



function sendMail($name, $mailReceiver, $text){

    echo 'oui';
    if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn|gmail).[a-z]{2,4}$#", $mailReceiver)) {
        $nextLine = "\r\n";
    }else{
        $nextLine = "\n";
    }

    $message_txt = $text;
    $message_html = "<html>
                        <head></head>
                        <body>
                            <p>Bonjour ".$name. "</p>,
                            <div>".$text."</div>
                        </body>
                    </html>";
  
    $boundary = "-----=".md5(rand());

    $subject = "Création de votre compte";
   
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

