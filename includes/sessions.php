<?php
/**
 * Xenlus
 * Copyright 2009 Xenlus Group. All Rights Reserved.
 **/
 
$session_name = siteconfig("session");
session_name($session_name);
session_start();

date_default_timezone_set(UTC);
$clockup = date("YmdHis", time() - date("Z")) ;

$site_url = siteconfig(url);
$sitepath = siteconfig(path);

if ($sitepath) {
	$weburl = "$site_url/$sitepath/";
} else {
	$weburl = "$site_url/";
}

if (!$site_url) {
	echo '<a href="./install/index.php">Click here to install</a>';
	
	exit;
}

$sitename = stripslashes(siteconfig(sitename));
$tpath = "./themes/$template/";
 
 ?>
