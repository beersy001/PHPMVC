<?php

interface UserServiceInterface {

	function checkUserAuthentication($username, $password);

	function saveUser();

	function deleteUser();

	function view();

	function viewall();
}

?>
