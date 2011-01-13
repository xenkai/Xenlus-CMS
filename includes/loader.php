<?php
/**
 * Xenlus
 * Copyright 2010 Xenlus Group. All Rights Reserved.
 */

// No direct access to anyone.
defined('_XEXEC') or die;

session_start();

require('defines.php');

// includes Configuration File
require(XENPATH_LIBRARIES . '/config.php');

// includes core components required for running the website
require(XENPATH_LIBRARIES . '/database/database.php');
require(XENPATH_LIBRARIES . '/version.php');

if (!defined('XVERSION')) {
	$version = new XVersion();
	define('XVERSION', $version->getShortVersion());
}

require(XENPATH_LIBRARIES . '/factory.php');
$template_path = XENPATH_THEMES . "/default/";
require(XENPATH_LIBRARIES . '/template_parse.php');
require(XENPATH_LIBRARIES . '/pages.php');

// We do not need this any longer, unset for safety purposes
unset($dbpasswd);

?>
