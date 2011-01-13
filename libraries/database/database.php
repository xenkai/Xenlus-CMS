<?php
/**
 * Xenlus
 * Copyright 2010 Xenlus Group. All Rights Reserved.
 */
// Using this as temporary because we might be creating a multi
// database type support in the future.

// No direct access to anyone.
defined('_XEXEC') or die;

class Database_Conn {
	private $conn;
	function __construct() {
		global $dbhost,$dbname,$dbuser,$dbpasswd;
		$this->conn = new mysqli($dbhost, $dbuser, $dbpasswd, $dbname) or die('There was a problem connecting to the database.');
	}
	// verifying username and password
	function verify_user($un,$pwd) {
		global $table_prefix;
		$query = "SELECT * FROM " . $table_prefix . "user WHERE username = ? AND password = ? LIMIT 1";
		if($stmt = $this->conn->prepare($query)) {
			$stmt->bind_param('ss', $un, $pwd);
			$stmt->execute();
			if($stmt->fetch()) {
				$stmt->close();
				return true;
			}
		}
	}
}

?>
 
