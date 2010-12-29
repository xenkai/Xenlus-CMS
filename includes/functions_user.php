<?php
/**
 * Xenlus
 * Copyright 2010 Xenlus Group. All Rights Reserved.
 */

class Xen_User {
	function check_user($un, $pwd) {
		$dbc = new Database_Conn();
		$check_details = $dbc->verify_user($un, md5($pwd));
		if ($check_details) {
			$_SESSION['status'] = 'authorized';
			header("location: ?p=home");
		} else {
			return "Please enter a correct username and password";
		}
	}
	function logout_user() {
		if(isset($_SESSION['status'])) {
			unset($_SESSION['status']);
			if(isset($_COOKIE[session_name()])) {
				setcookie(session_name(), '', time() - 1000);
				session_destroy();
			}
		}
	}
}

?>