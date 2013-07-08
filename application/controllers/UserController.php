<?php

require LIBRARY . DS . 'Controller.class.php';

class UserController extends Controller {

// ----- View all users --------------------------------------------------------------------------
	function viewall() {

		$this->setTemplateVars('title', 'All Users');
		$this->setTemplateVars('firstname', $this->_service->view()->getFirstname());
		$this->setTemplateVars('surname', $this->_service->view()->getSurname());
		$this->setTemplateVars('username', $this->_service->view()->getUsername());
		$this->setTemplateVars('password', $this->_service->view()->getPassword());
	}

// ----- Display user login page -----------------------------------------------------------------
	function loginRequest() {
		$this->setTemplateVars('title', 'Log In');
	}

// ----- Check user's authentication (login) ------------------------------------------------------
	function loginResponse() {

		$username = $_POST['username'];
		$password = $_POST['password'];


		$authenticated = $this->_service->checkUserAuthentication($username, $password);
		$_SESSION['authenticated'] = $authenticated;


		if ($authenticated) {
			if (isset($_POST['rememberme'])) {
				setcookie('username', $_POST['username'], time() + 60 * 60 * 24 * 365, '/');
				setcookie('password', $_POST['password'], time() + 60 * 60 * 24 * 365, '/');
			}
		}

		$this->setTemplateVars('title', 'Log In');
		$this->setTemplateVars('authenticated', $authenticated);
	}

// ----- Log current user OUT --------------------------------------------------------------------
	function logoutResponse() {

		$this->setTemplateVars('authenticated', false);

		if (isset($_COOKIE['username']) AND isset($_COOKIE['password'])) {
			setcookie('username', $_COOKIE['username'], time() - 99999999, '/');
			setcookie('password', $_COOKIE['password'], time() - 99999999, '/');
		}

		session_destroy();
	}

// ----- Display user registration page ----------------------------------------------------------
	function registerNewUserRequest() {
		$this->setTemplateVars('title', 'Register New User');
	}

// ----- create new user -------------------------------------------------------------------------
	function registerNewUserResponse() {

		$username = $_POST['username'];
		$username = mysql_real_escape_string($username);
		$username = stripcslashes($username);

		$firstname = $_POST['firstname'];
		$firstname = mysql_real_escape_string($firstname);
		$firstname = stripcslashes($firstname);

		$surname = $_POST['surname'];
		$surname = mysql_real_escape_string($surname);
		$surname = stripcslashes($surname);

		$password = $_POST['password'];
		$password = mysql_real_escape_string($password);
		$password = stripcslashes($password);

		$verificationResult = $this->_model->registerNewUser($username, $password, $firstname, $surname);

		$this->setTemplateVars('title', 'New User');
		$this->setTemplateVars('registeredUser', $verificationResult);
	}

}

?>