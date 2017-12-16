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

function connectUser($login, $pass)
{
    $user = new \SweetIt\SweetOm\Model\ConnectionManager();

    $userInfo = $user->connect($login, $pass);

    $_SESSION['ID'] = $userInfo['ID'];
    $_SESSION['connected'] = true;

    require_once('/View/homeUser.php');

}

function signInUser()
{
    require_once('/View/signIn.php');
}

function login()
{
    require_once('/View/loginView.php');
}

function logout()
{
    require_once('View/logout.php');
}

function dashboard()
{
    require_once('View/homeUser.php');
}