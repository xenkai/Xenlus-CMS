<!DOCTYPE html>
<html lang=en>
<head>
	<meta charset=UTF-8> 

	<title>{sitename} &bull; {sitepage}</title>
	
	<!--[if lt IE 9]><script src=http://html5shiv.googlecode.com/svn/trunk/html5.js></script><![endif]-->
	
	<link rel="stylesheet" href="{themepath}style.css" />
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>

</head>
<body>

<header>
	<hgroup>
		<a href="{siteurl}" id="logo">{sitename}</a>
		<div id=browser>
			<p><form method=post action=?p=search><input type=text size=30 name=searchbox /></form></p>
		</div>
	</hgroup>
	<nav id=global>
		<ul>
			<div id=navbar>
				<li><a href=/?p=home>Home</a></li>
				<li><a href=/?p=blog>Blog</a></li>
				<li><a href=/?p=forum>Forum</a></li>
				<li id=services>
					<a href=/?p=services>Services</a>
					<ul id=subMenu>
						<li><a href=/?p=webhosting>Web hosting</a></li>
						<li><a href=/?p=webdev>Web Development</a></li>
					</ul>
				</li>
				<li><a href=/?p=about>About</a></li>
			</div>
		</ul>
	</nav>
</header>
<div id=wrapper>