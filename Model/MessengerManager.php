<?php
namespace SweetIt\SweetOm\Model;

require_once("Manager.php");

class MessengerManager extends Manager{
	public function sendThisMessage($idSender, $login, $object, $text, $sendOn){
		$db = $this->dbConnect();
		$req1 = $db->prepare('SELECT ID FROM user WHERE Login=?');
		$req1->execute(array($login));
		$idReceiver = $req1->fetch();
		$req1->closeCursor();
		$db = $this->dbConnect();
		$req2 = $db->prepare('INSERT INTO messenger(ID_Sender, ID_Receiver, Object, Content, SendOn) VALUES(?,?,?,?,?)' );
		$req2->execute(array($idSender, $idReceiver[0], $object, $text, $sendOn));
		$req2->closeCursor();
	}
	public function receivedMessage($id){
		$db = $this->dbConnect();
		$req1 = $db->prepare('SELECT * FROM messenger WHERE ID_Receiver = ? ORDER BY SendOn DESC');
		$req1->execute(array($id));
		$listReceivedMessage = array();
		$messageInfo = array();
		while ($value1 = $req1->fetch()){
			$db = $this->dbConnect();
			$messageInfo['object'] = $value1['Object'];
			$messageInfo['content'] = $value1['Content'];
			$req2 = $db->prepare('SELECT Login ,FirstName,LastName FROM user WHERE ID = ?');
			$req2->execute(array($value1['ID_Sender']));
			$value2 = $req2->fetch();
			if($value2['Login'] == 'domisep'){
				$messageInfo['name'] = ''; 
			}else{
				$messageInfo['name'] = $value2['Login']."    ".$value2['FirstName']." ".$value2['LastName'];
			}
			$req2->closeCursor();
			$messageInfo['sendOn'] = $value1['SendOn'];
			$listReceivedMessage[] = $messageInfo;
		}
		$req1->closeCursor();
		return $listReceivedMessage;
	}
	public function sentMessage($id){
		$db = $this->dbConnect();
		$req1 = $db->prepare('SELECT * FROM messenger WHERE ID_Sender = ? ORDER BY SendOn DESC');
		$req1->execute(array($id));
		$listSentMessage = array();
		$messageInfo = array();
		while ($value1 = $req1->fetch()){
			$db = $this->dbConnect();
			$messageInfo['object'] = $value1['Object'];
			$messageInfo['content'] = $value1['Content'];
			$req2 = $db->prepare('SELECT Login ,FirstName, LastName FROM user WHERE ID = ?');
			$req2->execute(array($value1['ID_Receiver']));
			$value2 = $req2->fetch();
			if($value2['Login'] == 'domisep'){
				$messageInfo['name'] = ''; 
			}else{
				$messageInfo['name'] = $value2['Login']."    ".$value2['FirstName']." ".$value2['LastName'];
			}
			$req2->closeCursor();
			$messageInfo['sendOn'] = $value1['SendOn'];
			$listSentMessage[] = $messageInfo;
		}
		$req1->closeCursor();
		return $listSentMessage;
	}
}