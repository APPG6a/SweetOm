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





function signInUser()
{
    require_once('View/signIn.php');
}

function login()
{
    require_once('View/loginView.php');
}

function logout()
{
    require_once('View/logout.php');
}

function dashboard()
{
    require_once('View/homeUser.php');
}