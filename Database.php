<?php

require_once(dirname(__FILE__) . '/config.php');

class Database{

	public static function query($sql){
		$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DB);
		$res = $conn->query($sql);
		$conn->close();
		Database::formatResults($res);
	}

	public static function formatResults($res){
		$results = array();
		foreach($res as $r){
			array_push($results, $r);
		}
		//echo count($results);
		echo json_encode($results);
	}

}

$username = $_GET['username'];
Database::query("SELECT * FROM admin_user WHERE admin_user.`username` LIKE '$username'");

?>