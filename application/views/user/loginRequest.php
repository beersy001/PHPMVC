<h2><?php echo $title ?></h2>


<form name="loginform" method="post" action="/PBSiteMVC/user/loginResponse">
	<table>
		<tr>
			<td>Username</td>
			<td><input name="username" type="text" id="username"</input></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input name="password" type="password" id="password"</input></td>
		</tr>
		<tr>
			<td>Remember Me</td>
			<td><input name="rememberme" type="checkbox" id="rememberme" style="float:left"></input></td>
		</tr>
		<tr>
			<td><input type="submit" name="login" value="login"></td>
		</tr>
	</table>
</form>