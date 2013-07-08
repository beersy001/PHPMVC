<?php

class User {

	private $_firstname;
	private $_surname;
	private $_username;
	private $_password;

	function getFirstname() {
		return $this->_firstname;
	}

	function setFirstname($var) {
		$this->_firstname = $var;
	}

	function getSurname() {
		return $this->_surname;
	}

	function setSurname($var) {
		$this->_surname = $var;
	}

	function getUsername() {
		return $this->_username;
	}

	function setUsername($var) {
		$this->_username = $var;
	}

	function getPassword() {
		return $this->_password;
	}

	function setPassword($var) {
		$this->_password = $var;
	}

}
