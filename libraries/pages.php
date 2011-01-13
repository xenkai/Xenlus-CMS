<?php
/**
 * Xenlus
 * Copyright 2010 Xenlus Group. All Rights Reserved.
 **/

// No direct access to anyone.
defined('_XEXEC') or die;

include('database/table/user.php');
 
if (!isset($_GET['p'])) {
	$_GET['p'] = "home";
}

if ($_GET['p'] == "login") {
	include('pages/login.php');
} else if ($_GET['p'] == "register") {
	include('pages/register.php');
} else {
	include('pages/index_page.php');
}

?>
