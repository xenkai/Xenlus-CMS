<?php
/**
 * Xenlus
 * Copyright 2010 Xenlus Group. All Rights Reserved.
 */

session_start();

ini_set("display_errors",1);
ERROR_REPORTING(E_ALL);

// includes Configuration File
require('config.php');

// includes core components needed for running the website
require('dbc.php');
require('bbcode.php');
require('functions.php');
$template_path = "./themes/default/";
require('functions_template.php');
#require('sessions.php');
require('pages.php');

// We do not need this any longer, unset for safety purposes
unset($dbpasswd);

?>
