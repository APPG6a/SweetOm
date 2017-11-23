<?php
/**
 * Created by PhpStorm.
 * User: THEOPHILE
 * Date: 17/11/2017
 * Time: 11:22
 */

require_once('Model/ConnectionManager.php');
require_once('Model/UserManager.php');
/**
 *
 */

function modifyUser($Array, $ID)
{
    $newUser = new \SweetIt\SweetOm\Model\UserManager();

    $surname = $Array['nom'];
    $name = $Array['prenom'];
    $mail = $Array['mail'];
    $cell = $Array['numPort'];
    $phone = $Array['numFix'];
    $address = $Array['Adresse']." ".$Array['cp']." ".$Array['ville']." ".$Array['pays'];

    $newUser->updateUser($ID, $surname, $name, $cell, $phone, $mail);
    $newUser->setHome($ID, $address);
}

function connectUser($pass, $login)
{
    $user = new \SweetIt\SweetOm\Model\ConnectionManager();

    $userInfo = $user->connect($login, password_hash($pass, PASSWORD_DEFAULT));

    if (!empty($userInfo))
    {
        $_SESSION['ID'] = $userInfo['ID'];
        $_SESSION['connected'] = true;
    }
}

function login()
{
    require('View/loginView.php');
}

function logout()
{
    session_destroy();
    $_SESSION = array();
    login();
}

function dashboard()
{
    require('View/accueil_utilisateur.php');
}