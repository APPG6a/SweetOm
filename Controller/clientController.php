<?php
namespace Controller;
/**
 * Created by PhpStorm.
 * User: user
 * Date: 11/01/2018
 * Time: 09:52
 */

use SweetIt\SweetOm\Model\UserManager;

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

/**
 * @param $post
 */
function singInUser($post) {
    $user = new UserManager($post);

    create($user->getAll(), 'user');
}