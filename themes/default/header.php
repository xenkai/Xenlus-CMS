<!DOCTYPE html>
<html lang=en>
<head>
	<meta charset=UTF-8> 

	<title>{SITENAME} &bull; {SITEPAGE}</title>
	
	<!--[if lt IE 9]><script src=http://html5shiv.googlecode.com/svn/trunk/html5.js></script><![endif]-->
	
	<link rel="stylesheet" href="{THEMEPATH}style.css" />
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>

</head>
<body>

<header>
	<hgroup>
		<a href="{SITEURL}" id="logo">{SITENAME}</a>
		<div id=searchbar>
			<p><form method=post action=?p=search><input type=text size=30 name=searchbox /></form></p>
		</div>
	</hgroup>
	<nav id=global>
		<ul>
				<li><a href=/?p=home>Home</a></li>
				<li><a href=/?p=blog>Blog</a></li>
				<li><a href=/?p=forum>Forum</a></li>
				<li id=services>
					<a href=/?p=services>Services</a>
					<ul id=subMenu>
						<li><a href=/?p=webhosting>Free Blog</a></li>
						<li><a href=/?p=webdev>Develop Web</a></li>
					</ul>
				</li>
				<li><a href=/?p=about>About</a></li>
		</ul>
		<p>Howdy, Guest &#124; <a href=/?p=register>Register</a> or <a href=/?p=login>Login</a>?</p>
	</nav>
</header>
<div id=wrapper>
