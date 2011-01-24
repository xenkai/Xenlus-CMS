<?php

// No direct access to anyone.
defined('_XEXEC') or die;

// Create a new instance of the Template class
$template = new template_parse;

// Set the testing template file location
$template->template_file = 'register.php';

$template->entries[] = (object) array('SITEURL' => './');

$extra = (object) array('header' => (object) array('SITEURL' => './', 'THEMEPATH' => $template_path, 'SITENAME' => 'Xenlus', 'SITEPAGE' => 'Register'), 'footer' => $footer);

// Output the template markup
echo $template->generate_markup($extra);

?>
