<?php
/**
 * Xenlus
 * Copyright 2010 Xenlus Group. All Rights Reserved.
 **/

// No direct access to anyone.
defined('_XEXEC') or die;

function mres($input) {
	$input = mysql_real_escape_string($input);

	return $input;
}

function clean($clear) {
	$cleared = htmlspecialchars(mres(strip_tags($clear)));
	
	return $cleared;
}

function executeSelectQuery($query) {
    $result = mysqli_query($GLOBALS['link'], $query) or die(mysqli_error($GLOBALS['link']));
    while($row=mysqli_fetch_array($result)) {
        $returnArray[] = $row;
    }
    return $returnArray;
}

function executeInsertQuery($query) {
    return mysqli_query($GLOBALS['link'], $query) or die(mysqli_error($GLOBALS['link']));
}

function PageURL() {
	$pageURL = 'http';
	if ($_SERVER["HTTPS"] == "on") {
		$pageURL .= "s";
	}

	$pageURL .= "://";

	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}

	return $pageURL;
}

function anchor($link, $text, $title, $extras)//1
{
	$domain = get_domain();
	$link = $domain . $link;
	$data = '<a href="' . $link . '"';

	if ($title)
	{
		$data .= ' title="' . $title . '"';
	}
	else
	{
		$data .= ' title="' . $text . '"';
	}

	if (is_array($extras))//2
	{
		foreach($extras as $rule)//3
		{
			$data .= parse_extras($rule);//4
		}
	}

	if (is_string($extras))//5
	{
		$data .= parse_extras($extras);//6
	}

	$data.= '>';

	$data .= $text;
	$data .= "</a>";

	return $data;
}

function parse_extras($rule)
{
	if ($rule[0] == "#") //1
	{
		$id = substr($rule,1,strlen($rule)); //2
		$data = ' id="' . $id . '"'; //3
		return $data;
	}

	if ($rule[0] == ".") //4
	{
		$class = substr($rule,1,strlen($rule));
		$data = ' class="' . $class . '"';
		return $data;
	}

	if ($rule[0] == "_") //5
	{
		$data = ' target="' . $rule . '"';
		return $data;
	}
}

?>
