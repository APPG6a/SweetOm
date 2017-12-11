<?php

namespace SweetIt\SweetOm\Model;

/**
* Class Manager which provides a method to connect to a database
*
* Manager uses PDO to connect to a database
*
* @return PDO Object
*/
class Manager
{
	
	function dbConnect()
	{
		$engine = "mysql";
		$host = "localhost";
		$dbname = "sweeTom";
		$charset = "utf8";
		$login = "root";
		$password = "";

		try {
			$db = new \PDO($engine.":host=".$host.";dbname=".$dbname.";charset=".$charset, $login, $password);

			return $db;
		} catch (Exception $e) {
			die("Message ".$e->getMessage());
		}
		
	}
}