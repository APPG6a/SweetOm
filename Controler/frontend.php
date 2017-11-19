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

function login()
{
    require('View/signIn.php');
}

function logout()
{
    session_destroy();
    $_SESSION = array();
    require('/index.php');
}