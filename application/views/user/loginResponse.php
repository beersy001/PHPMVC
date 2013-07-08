<?php
if ($authenticated) {
	?>
	<h2>Login successful!</h2>
	<?php
} else {
	?>
	<h2>Login unsuccessful</h2>
	<a href="/PBSiteMVC/user/loginRequest">Try Again</a>
	<br>
	<br>

	<?php
}
?>

<a href="/PBSiteMVC/">Return Home</a>
