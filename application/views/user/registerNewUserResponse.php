
<?php

print '<h2>' . $title . '</h2>';

foreach ($registeredUser as $singleUserArray) {
	print '<br>';

	echo '<br>First name: ' . $singleUserArray['firstName'];
	echo '<br>Surname: ' . $singleUserArray['surname'];
	echo '<br>Username: ' . $singleUserArray['username'];
	echo '<br>Password: ' . $singleUserArray['password'];
}
?>