<?php

require_once LIBRARY . DS . 'Mapper.class.php';

class UserMapper extends Mapper {

	// ----- Register a new User ----------------------------------------------------------------------------------
	function registerNewUser($username, $password, $firstname, $surname) {

		$insertQuery = "INSERT INTO users (username,firstName,surname,password)
					VALUES ('$username','$firstname','$surname','$password')";

		$numberOfRows = (int) $this->sqlInsert($insertQuery);

		print '<br> Rows inserted: ' . $numberOfRows;

		$selectQuery = "SELECT * FROM users WHERE username = '" . $username . "'";

		return $this->_sqlQuery($selectQuery);
	}

	// ----- Log the user in ----------------------------------------------------------------------------------
	function logUserIn($username, $password) {

		$authenticated = false;

		$query = 'select true as result' .
				' from users' .
				' where username = "' . $username . '"' .
				' and password = "' . $password . '"';



		if (sizeof($this->_sqlQuery($query)) > 0) {
			$authenticated = true;
		}

		return $authenticated;
	}

	// ----- View all users ----------------------------------------------------------------------------------
	function viewAllUsers() {

		$selectQuery = "SELECT * FROM users WHERE username = '" . $username . "'";

		return $this->_sqlQuery($selectQuery);
	}

	// ----- Return a single user ----------------------------------------------------------------------------------
	public function getUser($username) {
		$user = new User();

		$selectQuery = "SELECT * FROM users WHERE username = '" . $username . "'";

		$result = mysql_query($selectQuery, $this->_connection);

		while ($db_field = mysql_fetch_assoc($result)) {
			$user->setUsername($db_field['username']);
			$user->setFirstname($db_field['firstName']);
			$user->setSurname($db_field['surname']);
			$user->setPassword($db_field['password']);
		}

		return $user;
	}

}
