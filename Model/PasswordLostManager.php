<?php
namespace SweetIt\SweetOm\Model;
require_once('Manager.php');

class PasswordLostManager extends Manager{

	public function insertPasswordTemp($login,$passwordTemp){
		$db = $this->dbConnect();
		$passwordHashed = password_hash($passwordTemp, PASSWORD_DEFAULT);
		$req = $db->prepare('INSERT INTO password_lost(Login,PasswordTemp) VALUES(?,?)');
		$req->execute(array($login,$passwordHashed));
		$req->closeCursor();
	}

	public function connect($login,$password){
		$db = $this->dbConnect();
        $req = $db->prepare("SELECT * FROM password_lost WHERE Login = ?");
        $req->execute(array($login));
        $value = $req->fetch();
        if(PASSWORD_VERIFY($password,$value['PasswordTemp'])){
			$req->closeCursor();
			$req2 = $db->prepare('DELETE FROM password_lost WHERE Login = ?');
			$req2->execute(array($login));
			$req2->closeCursor();
        	return true;
        }
        return false;
       
	}
} 