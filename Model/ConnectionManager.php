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

        $req = $db->prepare("SELECT * FROM `utilisateurs` WHERE `Login` = ? AND `Password` = ?");
        $req->execute(array($login, $password));

        $info = $req->fetch();

        if (!empty($info))
        {
            return $info;
        }
        else
        {
            throw new \Exception("Invalid User or Password");
        }
    }
}