<?php
/**
 * Xenlus
 * Copyright 2010 Xenlus Group. All Rights Reserved.
 */

// Create a new instance of the Template class
$template = new template_parse;

// Set the testing template file location
$template->template_file = 'index_page.php';

$template->entries[] = '';

$extra = (object) array('header' => (object) array('siteurl' => '/', 'themepath' => $template_path, 'sitename' => 'Xenlus', 'sitepage' => 'Index Page'), 'footer' => (object) array('themepath' => $template_path));

// Output the template markup
echo $template->generate_markup($extra);

?>
