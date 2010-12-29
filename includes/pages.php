<?php
/**
 * Xenlus
 * Copyright 2010 Xenlus Group. All Rights Reserved.
 **/
 
if (!isset($_GET['p'])) {
	$_GET['p'] = "home";
}

if ($_GET['p'] == "login") {
	include('functions_user.php');
	include('pages/login.php');
} else if ($_GET['p'] == "do_login") {
	include('functions_user.php');
	include('pages/do_login.php');
} else if ($_GET['p'] == "register") {
	include('functions_user.php');
	include('register.php');
} else {
	include('pages/index_page.php');
}

?>
