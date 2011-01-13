<?php
/**
 * Xenlus
 * Copyright 2010 Xenlus Group. All Rights Reserved.
 */

// No direct access to anyone.
defined('_XEXEC') or die;

$xen_user = new Xen_User();

if (!empty($_POST['username']) && !empty($_POST['pwd'])) {
	$xen_message = $xen_user->check_user($_POST['username'], $_POST['pwd']);
}

function putmessage() {
	global $xen_message;
	if(isset($xen_message)) {
		return "<h4>$xen_message</h4>";
	}
}

// Create a new instance of the Template class
$template = new template_parse;

// Set the testing template file location
$template->template_file = 'login.php';

$template->entries[] = (object) array('LOGIN_ACTION' => '?p=login', 'MESSAGE' => putmessage());

$extra = (object) array('header' => (object) array('siteurl' => '/', 'sitename' => "Xenlus", 'themepath' => $template_path, 'sitepage' => 'Login'));

// Output the template markup
echo $template->generate_markup($extra);

?>
