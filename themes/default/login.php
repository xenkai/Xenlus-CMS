{loop}

<div class=clearfix>
	<div id=content>
		<article>
			<form method="post" action="{LOGIN_ACTION}">
				<h1>Please enter your credentials</h1>
				<dt>
				<p>
					<dd><label for="name">Username</label></dd>
					<dd><input type="text" name="username"></dd>
				</p>
				<p>
					<dd><label for="pwd">Password</label></dd>
					<dd><input type="password" name="pwd"></dd>
				</p>
				</dt>
				<p>
					<label for="signup">Not a Member?</lable>
					<a href="/?p=register">Register</a> or 
					<input type="submit" id="submit" value="Login" name="submit">
				</p>
			</form>
			<footer>
				{MESSAGE}
			</footer>
		</article>
	</div>
