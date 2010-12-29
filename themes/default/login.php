{loop}

<div class=clearfix>
	<div id=content>
		<article>
			<form method="post" action="{LOGIN_ACTION}">
				<h2>Login <small>enter your credentials</small></h2>
				<p>
					<label for="name">Username: </label>
					<input type="text" name="username">
				</p>
				<p>
					<label for="pwd">Password: </label>
					<input type="password" name="pwd">
				</p>
				<p>
					<input type="submit" id="submit" value="Login" name="submit">
				</p>
			</form>
			<footer>
				{MESSAGE}
			</footer>
		</article>
	</div>
	
	<aside>
		<section>
			<blockquote>Sidebar to be up soon</blockquote>
			<a class=twitterHandle href=#>@Xenlus Administrator</a>
		</section>
	</aside>
</div>

{/loop}
