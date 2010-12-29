<?php

/**
 * Xenlus
 * Copyright 2010 Xenlus Group. All Rights Reserved.
 * */

function bb ($str) {

	global $weburl;

	$str = stripslashes($str);

	$strip = array('http://www.youtube.com/watch?v=');

	$str = str_replace ($strip, '', $str);

	$code = array(

'/\[mad]/is',

'/\[grin]/is',    

'/\[blink]/is',    

'/\[cool]/is',    

'/\[dry]/is',    

'/\[huh]/is',    

'/\[laugh]/is',    

'/\[ohmy]/is',        

'/\[b\](.*?)\[\/b\]/is',                             

'/\[i\](.*?)\[\/i\]/is',                                

'/\[u\](.*?)\[\/u\]/is',

'/\[img\](.*?)\[\/img\]/is',

'/\[line\]/is',

'#\[url=(.*?)\](.*?)\[/url\]#i', 

'#\[size=([1-9]|1[0-9]|20)\](.*?)\[/size\]#is', 

'#\[color=\#?([A-F0-9]{3}|[A-F0-9]{6})\](.*?)\[/color\]#is', 

'/\[youtube\](.*?)\[\/youtube\]/is', 

'#\n#si'

	);

	$replace = array(

'<img src="'.$weburl.'images/smiley/mad.gif" border="0" alt="" />',

'<img src="'.$weburl.'images/smiley/biggrin.gif" border="0" alt="" />',

'<img src="'.$weburl.'images/smiley/blink.gif" border="0" alt="" />',

'<img src="'.$weburl.'images/smiley/cool.gif" border="0" alt="" />',

'<img src="'.$weburl.'images/smiley/dry.gif" border="0" alt="" />',

'<img src="'.$weburl.'images/smiley/huh.gif" border="0" alt="" />',

'<img src="'.$weburl.'images/smiley/laugh.gif" border="0" alt="" />',

'<img src="'.$weburl.'images/smiley/ohmy.gif" border="0" alt="" />',

'<strong>$1</strong>',

'<em>$1</em>',

'<u>$1</u>',

'<img src="$1" border="0" alt="" />',	

'<hr>',

'<a href="$1" target="_blank">$2</a>',

'<span style="font-size: $1px;">$2</span>',

'<span style="color: #$1;">$2</span>',

'<object width="640" height="385"><param name="movie" value="http://www.youtube.com/v/$1"></param><embed src="http://www.youtube.com/v/$1" type="application/x-shockwave-flash" width="640" height="385"></embed></object>',

'<br />'

	);

	$str = preg_replace ($code, $replace, $str);

	return $str;

}

?>
