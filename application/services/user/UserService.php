<?php

class UserService implements UserServiceInterface {

	function __construct() {

	}

	function checkUserAuthentication($username, $password) {
		$mapper = new UserMapper();
		return $mapper->logUserIn($username, $password);
	}

	function createNewUser() {

	}

	public function deleteUser() {

	}

	public function saveUser() {

	}

	public function view() {

		$mapper = new UserMapper();

		return $mapper->getUser('paul');
	}

	public function viewall() {

	}

}

?>
