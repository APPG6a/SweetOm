<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 11/01/2018
 * Time: 09:52
 */

require_once('Model/UserManager.php');

/**
 * @param $login
 * @param $pass
 */
function connectUser($login, $pass)
{
    $user = new \SweetIt\SweetOm\Model\ConnectionManager();

    $userInfo = $user->connect($login, $pass);

    $_SESSION['ID'] = $userInfo['ID'];
    $_SESSION['connected'] = true;

    require_once('../View/homeUser.php');

}