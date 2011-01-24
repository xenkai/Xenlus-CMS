<?php
/**
 * Xenlus
 * Copyright 2010 Xenlus Group. All Rights Reserved.
 */

// No direct access to anyone.
defined('_XEXEC') or die;

// Create a new instance of the Template class
$template = new template_parse;

// Set the testing template file location
$template->template_file = 'index_page.php';

$template->entries[] = '';

$extra = (object) array('header' => (object) array('SITEURL' => './', 'THEMEPATH' => $template_path, 'SITENAME' => 'Xenlus', 'SITEPAGE' => 'Index Page'), 'footer' => (object) array('THEMEPATH' => $template_path));

// Output the template markup
echo $template->generate_markup($extra);

?>
