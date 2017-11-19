<?php
/**
 * Created by PhpStorm.
 * User: THEOPHILE
 * Date: 14/11/2017
 * Time: 12:22
 */

namespace SweetIt\SweetOm\Model;

require_once("Model/Manager.php");

class ConnectionManager extends Manager
{
    function connect($login, $password)
    {
        $db = $this->dbConnect();

        $req = $db->prepare("SELECT * FROM utilisateurs WHERE login = ? AND password = ?");
        $user = $req->execute(array($login, $password));

        if (!$info = $user->fetch()){
            return $info;
        }
        else {
            throw new \Exception("UserName or Password invalid");
        }
    }
}