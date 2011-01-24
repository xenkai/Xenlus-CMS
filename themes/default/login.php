{loop}

<div class=clearfix>
	<div id=content>
		<article>
			<form method="post" action="./?p=login">
				<h1>Please enter your credentials</h1>
				<dt>
				<p>
					<dd><label for="name">Username</label></dd>
					<dd><input type="text" name="username" size="30"></dd>
				</p>
				<p>
					<dd><label for="pwd">Password</label></dd>
					<dd><input type="password" name="pwd" size="30"></dd>
				</p>
				</dt>
				<p>
					<label for="signup">Not a Member?</label>
					<label for="register"><a href="/?p=register">Register</a></label> or 
					<input type="submit" id="submit" value="Login" name="submit">
				</p>
			</form>
			<footer>
				{MESSAGE}
			</footer>
		</article>
	</div>
